<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // No direct access
}

class ThzCore_Update_Theme{
	/**
	 * URL to update theme
	 * @var string
	 */
	private $url;
	/**
	 * Theme to check for update
	 * @var string
	 */
	private $theme;
	/**
	 * @var ThzCore_Activation_Option
	 */
	private $option;
	/**
	 * Store server response to avoid multiple requests
	 * @var array
	 */
	private $theme_details;

	/**
	 * ThzCore_Update_Theme constructor.
	 *
	 * @param $url
	 * @param $theme
	 * @param ThzCore_Activation_Option $option
	 */
	public function __construct( $url, $theme, ThzCore_Activation_Option $option ) {
		$this->url = $url;
		$this->theme = $theme;
		$this->option = $option;

		add_filter( 'pre_set_site_transient_' . 'update_themes', array( $this, 'check_update' ), 10/*, 2*/ );
	}

	/**
	 * Transient callback
	 * @param stdClass $value
	 *
	 * @return mixed
	 */
	public function check_update( $value/*, $transient*/ ){
		if( isset( $value->checked[ $this->theme ] ) ){
			if( isset( $value->response[ $this->theme ] ) ){
				unset( $value->response[ $this->theme ] );
			}
		}

		if ( isset( $value->checked[ $this->theme ] ) ) {

			$theme = $this->get_details( $value->checked[ $this->theme ] );

			if ( $theme ) {
				// if theme needs CP, prevent the update
				if( ThzCore_Update_Helper::needs_cp( $theme['version'] ) && !ThzCore_Update_Helper::has_cp() ){
					unset( $value->response[ $this->theme ] );
					ThzCore_Update_Helper::register_update( $theme );
				}elseif ( isset( $theme['version'] ) && version_compare( $value->checked[ $this->theme ], $theme['version'], '<' ) ) {
					ThzCore_Update_Helper::unregister_update();
					$value->response[ $this->theme ] = array(
						'theme'       => $this->theme,
						'new_version' => $theme['version'],
						'url'         => $theme['homepage_url'],
						'package'     => $theme['package_url']
					);
				}
			}
		}


		return $value;
	}

	/**
	 * Get theme details
	 * @param $current_version
	 *
	 * @return array|bool/false
	 */
	private function get_details( $current_version ){
		// avoid making subsequent requests if the request was already made
		if( $this->theme_details ){
			return $this->theme_details;
		}

		if( ThzCore_Update_Helper::has_cp() ){
			$t = CreatusPro_Plugin::get_instance()->get_cpac();
		}

		// make request
		$request = wp_remote_post(
			$this->url,
			array(
				'timeout' => 15,
				'body' => array(
					'url' => home_url(),
					'token' => isset( $t ) ? $t : $this->option->get_option(),
					'active_version' => $current_version
				)
			)
		);

		if( is_wp_error( $request ) || 200 != wp_remote_retrieve_response_code( $request ) ){
			return false;
		}

		$this->theme_details = json_decode( wp_remote_retrieve_body( $request ), true );

		return $this->theme_details;
	}
}
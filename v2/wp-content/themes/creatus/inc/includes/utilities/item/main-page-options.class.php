<?php
/**
 * Class Thz_Main_Page_Options
 */
class Thz_Main_Page_Options{
	/**
	 * @var Thz_Main_Page_Utility
	 */
	private $main_page;
	/**
	 * Holds currently displaying page options
	 * @var array|null
	 */
	private $options = null;
	/**
	 * Thz_Main_Page_Options constructor.
	 *
	 * @param Thz_Main_Page_Utility $main_page
	 */
	public function __construct( Thz_Main_Page_Utility $main_page ) {
		$this->main_page = $main_page;
	}
	/**
	 * @internal
	 * Get currently displaying page options
	 * @return array|null
	 */
	protected function get_options(){
		if( is_array( $this->options ) ){
			return $this->options;
		}
		$this->options = array();
		$options = array(
			'post' => 'custom_post_options/0',
			'pagetitle' => 'custom_pagetitle_options/0',
			'site' => 'custom_site_options/0',
			'header' => 'custom_header_options/0',
			'mainmenu' => 'custom_mainmenu_options/0',
			'footer' => 'custom_footer_options/0'
		);
		foreach( $options as $key => $option_id ){
			$option = $this->main_page->get_option( $option_id, array() );
			if( $option ){
				$this->options[ $key ] = $option;
			}
		}
		return $this->options;
	}
	/**
	 * Get currently displaying page option
	 *
	 * @param string $option_id
	 * @param string $default
	 *
	 * @return mixed|null
	 */
	public function get_option( $option_id = null, $default = null ){
		$options = $this->get_options();
		// try to get option from post options
		foreach( $options as $single_options ){
			$opt = $this->array_key_get( $option_id, $single_options );
			if( !is_null( $opt ) ){
				return $opt;
			}
		}
		return new WP_Error('not_found');
	}
	/**
	 * Get a value for a key from an array/object
	 * @param $key
	 * @param $array
	 *
	 * @return mixed|null
	 */
	private function array_key_get( $key, $array ){
		return thz_akg( $key, $array );
	}
}
<?php
/**
 * @package      Thz Framework
 * @author       Themezly
 * @license      http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 * @websites     http://www.themezly.com | http://www.youjoomla.com | http://www.yjsimplegrid.com
 */
 
if ( ! defined( 'ABSPATH' ) ) {
	exit; // No direct access
}

/**
 * Class that verifies if a plugin should be updated from a third party source.
 * Class constructor accepts 4 parameters:
 * @param string $update_url - the URL where to check if an update is available
 * @param string $plugin - the plugin file (plugin_dir/plugin_file.php) usually retrieved by using plugin_basename()
 * @param string $slug - the plugin slug, usually the plugin folder name
 * @param array $request_params - additional third party request parameters that you might need to send over
 *
 * The remote response returned by the hosting server queried by this class should be a serialized array
 * having the following keys:
 *
 * Array
(
[version] => the current plugin version
[package] => the plugin download URL (in case a package isn't available, give key package value (boolean) false)
)
 *
 * @author CodeFlavors
 *
 */
class ThzCore_Update_Plugin{
	/**
	 * Script version
	 * @var string - version
	 */
	const VERSION = '2.0';
	/**
	 * URL to make the request to
	 * @var string
	 */
	private $url;
	/**
	 * Plugin slug determined from $this->plugin
	 * @var string
	 */
	private $plugin_slug;
	/**
	 * The plugin ( retrieved with plugin_basename() )
	 * @var string
	 */
	private $plugin;
	/**
	 * Plugin main file
	 * @var string
	 */
	private $plugin_file;

	private $cached_response = null;

	/**
	 * Store additional request params. These params will be send as POST variables
	 * with all requests made to url specified in $this->url
	 * @var array
	 */
	private $params = array();

	/**
	 * Constructor, sets up the class variables
	 * @param string $url - URL to make the request for the upgrade
	 * @param string $plugin_slug - the plugin to require the upgrade for
	 * @param array $request_params - additional parameters to be send on remote request POST
	 */
	public function __construct( $update_url, $plugin_file, ThzCore_Activation_Option $option, $request_params = array() ){
		// second parameter for filter was added in WP v4.4.0
		add_filter( 'pre_set_site_transient_' . 'update_plugins', array(
			$this,
			'set_update_transient'
		), 10/*, 2*/ );

		$this->url = $update_url;
		$this->plugin = plugin_basename( $plugin_file );
		$this->plugin_slug = dirname( $this->plugin );
		$this->plugin_file = $plugin_file;

		$this->params = (array) $request_params;

		$this->params['api_ver'] = self::VERSION;
	}

	/**
	 * Filter "pre_set_site_transient_update_plugins" callback. Will replace the plugin's information
	 * if found in transient
	 * @param object $value - transient value
	 * @param string $transient - transient name (added since WP v4.4.0)
	 */
	public function set_update_transient( $value/*, $transient*/ ){
		if( !isset( $value->checked ) || ( isset( $value->checked[ $this->plugin_slug ] ) || isset( $value->checked[ $this->plugin ] ) ) ){
			$slug = isset( $value->checked[ $this->plugin_slug ] ) ? $this->plugin_slug : $this->plugin;
			$version = isset( $value->checked[ $slug ] ) ? $value->checked[ $slug ] : false;
			if( !$version ){
				$plugin = get_plugin_data( $this->plugin_file );
				if( isset( $plugin['Version'] ) ){
					$version = $plugin['Version'];
				}
			}

			//*
			// 1. Get plugin details from the host
			// 2. Compare local plugin version to remote plugin version
			// 3. Check if $value->response is array
			// 4. If plugin versions are different, add plugin to $value->response

			if( null === $this->cached_response ) {
				$http_args = array(
					'timeout' => 15,
					'body'    => (array) $this->params
				);
				$this->cached_response = $request   = wp_remote_post( $this->url, $http_args );
			}else{
				$request = $this->cached_response;
			}

			if( !is_wp_error( $request ) ){
				$res = maybe_unserialize( wp_remote_retrieve_body( $request ) );
				if( isset( $res['version'] ) && version_compare( $version, $res['version'], '<' ) ){
					if( !is_array( $value->response ) ){
						$value->response = array();
					}

					$value->response[ $slug ] = (object) array(
						//'id' => '',
						'slug' 			=> $this->plugin_slug,
						'plugin' 		=> $this->plugin,
						'new_version' 	=> $res['version'],
						'url' 			=> isset( $res['url'] ) ? $res['url'] : '',
						'package' 		=> $res['package'],
						'tested'		=> isset( $res['tested'] ) ? $res['tested'] : 'Latest',
						'icons' 		=> isset( $res['icons'] ) ? $res['icons'] : array()
					);

				}
				// remove the filter to avoid double checks
				//remove_filter( 'pre_set_site_transient_' . 'update_plugins', array( $this, 'set_update_transient' ), 10 );
			}
			//*/
		}

		return $value;
	}

}



/**
 * Class that will display the plugin update details from a custom plugin source
 * when a plugin is to be updated.
 *
 * Class constructor accepts 4 parameters:
 * @param string $changelog_url - the URL where to query the update details
 * @param string $plugin - the plugin file (plugin_dir/plugin_file.php) usually retrieved by using plugin_basename()
 * @param string $slug - the plugin slug, usually the plugin folder name
 * @param array $request_params - additional third party request parameters that you might need to send over
 *
 * The complete remote response returned when a query for plugin information is made is under the form of an Object.
 * Cetain details can be ommited. Below is the object containing all details.
stdClass Object
(
[name] => Plugin name
[slug] => Plugin slug (usually the folder name of the plugin)
[version] => Current plugin version
[author] => Author link with name
[author_profile] => An URL to an author profile
[contributors] => Array
(
contributor_ID => contributor profile URL,
contributor_ID => contributor profile URL
)

[requires] => Minimum WP version required by the plugin
[tested] => Maximum WP version the plugin has been tested for
[compatibility] => Array
(
)

[rating] =>
[num_ratings] =>
[ratings] => Array
(
)

[active_installs] => 0
[last_updated] => 2016-01-22 12:21pm GMT
[added] => 2012-08-29
[homepage] => Plugin homepage URL
[sections] => Array
(
[description] => Plugin description (can contain HTML)
[installation] => Plugin installation instructions (can contain HTML)
[screenshots] => Plugin screenshots arranged as unordered list
[changelog] => Plugin changelog (can contain HTML)
[other_notes] => Additional plugin notes (can contain HTML)
[reviews] => HTML formatted reviews
)

[download_link] => The link where the update can be downloaded from
[tags] => Plugin tags
[donate_link] => Plugin donate link
[banners] => URL to plugin banner image (772 x 250 px)
)
 *
 * @author CodeFlavors
 *
 */
class ThzCore_Plugin_Update_Details{
	/**
	 * Script version
	 * @var string - version
	 */
	const VERSION = '2.0';
	/**
	 * URL to make the request to
	 * @var string
	 */
	private $url;
	/**
	 * The plugin ( retrieved with plugin_basename() )
	 * @var string
	 */
	private $plugin;
	/**
	 * Plugin slug determined from $this->plugin
	 * @var string
	 */
	private $plugin_slug;
	/**
	 * Store additional request params. These params will be send as POST variables
	 * with all requests made to url specified in $this->url
	 * @var array
	 */
	private $params = array();

	/**
	 * Constructor, sets up the class variables
	 * @param string $changelog_url - URL to make the request for the changelog to
	 * @param string $plugin - the plugin to require the information for
	 */
	public function __construct( $changelog_url, $plugin, $slug = '', ThzCore_Activation_Option $option, $request_params = array()  ){
		// if theme is last version from tf or higher (coming from WP.org)
		/*
		if( ThzCore_Update_Helper::not_uses_cp() ){
			return;
		}
		*/

		$this->url = $changelog_url;
		$this->plugin_slug = !empty( $slug ) ? $slug : dirname( $plugin );
		$this->plugin = $plugin;
		$this->params = $request_params;

		$this->params['api_ver'] = self::VERSION;

		// override plugins api to display our changelog
		add_filter( 'plugins_api', array( $this, 'plugins_filter' ), 10, 3);

	}

	/**
	 * Filter "plugins_api" callback function. Intercepts the requests made for our plugin and
	 * make the remote call to the custom URL provided in class constructor
	 *
	 * @param boolean $result - defaults to false
	 * @param string $action - the action performed by WP
	 * @param object $args - request args
	 */
	public function plugins_filter( $result, $action, $args ){
		// look for our plugin
		if( 'plugin_information' == $action && isset( $args->slug ) && $this->plugin_slug == $args->slug ){
			$result = $this->request( $args );
		}
		return $result;
	}

	/**
	 * Make the request for information and process the response
	 * @param object $args - WP request args
	 */
	private function request( $args ){
		$http_args = array(
			'timeout' => 15,
			'body' => (array) $this->params
		);
		$request = wp_remote_post( $this->url, $http_args );

		if ( is_wp_error( $request ) ) {
			$res = new WP_Error('themezly_plugins_api_failed', __( 'An unexpected error occurred. Something may be wrong with your server configuration. If you continue to have problems, please contact us.' ), $request->get_error_message() );
		} else {
			$res = maybe_unserialize( wp_remote_retrieve_body( $request ) );
			if ( ! is_object( $res ) && ! is_array( $res ) )
				$res = new WP_Error('themezly_plugins_api_failed', __( 'An unexpected error occurred. Something may be wrong with your server configuration. If you continue to have problems, please contact us.' ), wp_remote_retrieve_body( $request ) );
		}

		return $res;
	}
}
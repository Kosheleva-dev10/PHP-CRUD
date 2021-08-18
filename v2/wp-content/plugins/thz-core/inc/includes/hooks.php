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
 * Set proper media element scripts order
 * @ref https://core.trac.wordpress.org/ticket/44484
 */
function _thz_core_action_fix_mediaelement_scripts_order(){
	
	wp_deregister_script('mediaelement');
	wp_register_script( 'mediaelement', false, array( 'jquery', 'mediaelement-core', 'mediaelement-migrate' ), '4.2.6-78496d1', 1 );
	
}


if ( ! is_admin() ) {
	add_action( 'wp_enqueue_scripts', '_thz_core_action_fix_mediaelement_scripts_order',10 );
}


/*
 * Disable emojis if set by theme option
 */
function _thz_core_filter_disable_emoji_tinymce( $plugins ) {
	if ( is_array( $plugins ) ) {
		return array_diff( $plugins, array(
			 'wpemoji' 
		) );
	} else {
		return array();
	}
}

function _thz_core_action_disable_emoji() {
	
	if(!function_exists('thz_get_theme_option')){
		return;
	}
	
	if( function_exists('thz_get_theme_option_early') ){
		
		$emojis = thz_get_theme_option_early('emojis','inactive');
	
	}else{
		
		$emojis = thz_get_theme_option('emojis','inactive');
	}
	
	if('inactive' == $emojis ){
		
		// all actions related to emojis
		remove_action( 'admin_print_styles', 'print_emoji_styles' );
		remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
		remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
		remove_action( 'wp_print_styles', 'print_emoji_styles' );
		remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
		remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
		remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
		
		// filter to remove TinyMCE emojis
		add_filter( 'tiny_mce_plugins', '_thz_core_filter_disable_emoji_tinymce' );
		
		//remove emojis DNS prefetch
		add_filter( 'emoji_svg_url', '__return_false' );
	}
}

if ( ! is_admin() ) {
	add_action( 'init', '_thz_core_action_disable_emoji' );
}


/**
 * Remove ver query string from CSS/JS files
 */
function _thz_core_filter_remove_query_strings($src){

	if( !function_exists('thz_get_theme_option') ){
		return $src;
	}
	
	if( 'remove' == thz_get_theme_option('thzopt/remqs','donotremove')){
	 
		if( is_preview() ){
			return $src;
		}
	
		$uri 		= explode( '?ver', $src );
		$new_uri 	= explode( '&ver', $uri[0] );
		
		return $new_uri[0];	 	
	}

	return $src;
}

if ( !is_admin() ) {
	add_filter( 'script_loader_src', '_thz_core_filter_remove_query_strings', 15, 1 );
	add_filter( 'style_loader_src', '_thz_core_filter_remove_query_strings', 15, 1 );
}



/**
 * Frontend admin links
 * @internal
 */

function _thz_core_action_frontend_admin_links() {
	
	if ( ! is_super_admin() || ! is_admin_bar_showing() || !function_exists('thz_fw_loaded')) {
		return;
	}
	
	if ( current_user_can( 'edit_theme_options' ) ) {
		
		global $wp_admin_bar;
		
		$settings_link = self_admin_url( 'themes.php');
		
		if(thz_fw_loaded()  && thz_fw_active()){
			
			$settings_link = self_admin_url( 'themes.php?page=' . fw()->backend->_get_settings_page_slug() );
		}
		
		$wp_admin_bar->add_node( array(
			'parent' => 'appearance',
			'id' => 'thz_theme_settings',
			'title' => ucfirst( wp_get_theme() ),
			'href' => $settings_link,
			'meta' => false 
		));
		
		
		if(thz_fw_loaded()  && thz_fw_active()){
			
			$wp_admin_bar->add_node( array(
				'parent' => 'thz_theme_settings',
				'id' => 'thz_theme_settings_link',
				'title' => esc_html__( 'Theme Settings', 'thz-core' ),
				'href' => self_admin_url( 'themes.php?page=' . fw()->backend->_get_settings_page_slug() ),
				'meta' => false 
			));
		
			if (fw_ext('backups')){
				
				$wp_admin_bar->add_node( array(
					'parent' => 'thz_theme_settings',
					'id' => 'thz_theme_backup',
					'title' => esc_html__( 'Backup & Restore', 'thz-core' ),
					'href' => self_admin_url('tools.php?page=fw-backups'),
					'meta' => false 
				));
				
				
				$wp_admin_bar->add_node( array(
					'parent' => 'thz_theme_settings',
					'id' => 'thz_theme_demo_installs',
					'title' => esc_html__( 'Demo Install', 'thz-core' ),
					'href' => self_admin_url( 'tools.php?page=fw-backups-demo-content'),
					'meta' => false 
				));
			}
			
			$wp_admin_bar->add_node( array(
				'parent' => 'thz_theme_settings',
				'id' => 'thz_theme_export_import_link',
				'title' => esc_html__( 'Export/Import', 'thz-core' ),
				'href' => self_admin_url( 'admin.php?page=fw-settings#fw-options-tab-exportimport'),
				'meta' => false 
			));
		
		}

		$wp_admin_bar->add_node( array(
			'parent' => 'thz_theme_settings',
			'id' => 'thz_import_fonts_link',
			'title' => esc_html__( 'Import Fonts', 'thz-core' ),
			'href' => self_admin_url( 'themes.php?page=thz-import-fonts'),
			'meta' => false 
		));
		
		$wp_admin_bar->add_node( array(
			'parent' => 'thz_theme_settings',
			'id' => 'thz_theme_system_link',
			'title' => esc_html__( 'System Info', 'thz-core' ),
			'href' => self_admin_url( 'admin.php?page=system_info'),
			'meta' => false 
		));
			
		$wp_admin_bar->add_node( array(
			'parent' => 'thz_theme_settings',
			'id' => 'thz_theme_support_links',
			'title' => esc_html__( 'Support', 'thz-core' ),
			'href' => esc_url( 'http://www.themezly.com/support'),
			'meta' => array(
				 'target' => '_blank' 
			) 
		));
		
		$wp_admin_bar->add_node( array(
			'parent' => 'thz_theme_settings',
			'id' => 'thz_theme_docs_links',
			'title' => esc_html__( 'Documentation', 'thz-core' ),
			'href' => esc_url( 'http://www.themezly.com/documentation'),
			'meta' => array(
				 'target' => '_blank' 
			) 
		));
		
	}
	
	

}
add_action( 'admin_bar_menu', '_thz_core_action_frontend_admin_links', 2000 );


/**
 * Backend Admin links
 * @internal
 */

function _thz_core_action_backend_admin_links() {

	if ( ! is_super_admin() || thz_theme_version() <= '1.1.3' ) {
		return;
	}
	
	if ( current_user_can( 'edit_theme_options' ) ) {
		
		global $submenu;
		
		$settings_link = 'themes.php';
		
		if( thz_fw_loaded()  && thz_fw_active() ){
			
			$settings_link = 'themes.php?page=' . fw()->backend->_get_settings_page_slug();
		}

		add_menu_page(
			ucfirst( wp_get_theme() ), // page title
			ucfirst( wp_get_theme() ), // menu title
			'manage_options', //capability
			'creatus-menu' , // menu_slug
			'__return_false', //function
			'none', // icon
			3 // position
		);

		add_submenu_page(
			'creatus-menu', //parent_slug
			esc_html__('Theme Settings','thz-core'), // page_title
			esc_html__('Theme Settings','thz-core'), // menu_title
			'manage_options' , //capability
			$settings_link //menu_slug
		);
		
		if(thz_fw_loaded()  && thz_fw_active()){

			if (fw_ext('backups')){

 				add_submenu_page( 
					'creatus-menu',
					esc_html__('Backup & Restore','thz-core'),
					esc_html__('Backup & Restore','thz-core'),
					'manage_options' ,
					'tools.php?page=fw-backups'
				);
				
 				add_submenu_page( 
					'creatus-menu',
					esc_html__('Demo Install','thz-core'),
					esc_html__('Demo Install','thz-core'),
					'manage_options' ,
					'tools.php?page=fw-backups-demo-content'
				);

			}
			
			add_submenu_page( 
				'creatus-menu',
				esc_html__('Export/Import','thz-core'),
				esc_html__('Export/Import','thz-core'),
				'manage_options' ,
				$settings_link.'#fw-options-tab-exportimport'
			);

		}

		add_submenu_page( 
			'creatus-menu',
			esc_html__('Import Fonts','thz-core'), 
			esc_html__('Import Fonts','thz-core'),
			'manage_options' ,
			'themes.php?page=thz-import-fonts'
		);
						
		add_submenu_page( 
			'creatus-menu', //parent_slug
			esc_html__('Creatus System Info','thz-core'), // page_title
			esc_html__('System Info','thz-core'), // menu_title
			'manage_options' , //capability
			'system_info' , //menu_slug
			'_thz_system_info' //function
		);

		/**
		 * Allow plugin to hook to menu
		 *
		 * @param $slug - Theme main page menu slug
		 */
		do_action( 'creatus_admin_menu', 'creatus-menu' );

		// creatus sub link link to theme options or themes
		$submenu['creatus-menu'][0][2] = $settings_link;
		
		$submenu['creatus-menu'][] = array(
			esc_html__('Support','thz-core'), 
			'manage_options', 
			esc_url( 'https://www.themezly.com/support')
		);
		
		$submenu['creatus-menu'][] = array(
			esc_html__('Documentation','thz-core'), 
			'manage_options', 
			esc_url( 'https://www.themezly.com/documentation'),
		);

	}
	
}
add_action( 'admin_menu', '_thz_core_action_backend_admin_links');


/**
 * Add the fullsize image to the scrset attribute.
 */
function _thz_core_filter_srcset_largest_image_size( $sources, $size_array, $image_src, $image_meta, $attachment_id ) {
	
	$full_size = array( 
		'url' => $image_src,
		'descriptor' => 'w',
		'value' => $image_meta['width']
	);
	
	$sources[$image_meta['width']] = $full_size;
	
	return $sources;
} 
add_filter( 'wp_calculate_image_srcset', '_thz_core_filter_srcset_largest_image_size', '10', '5' );




/**
 * Add user social contacts
 */
if ( ! function_exists( '_thz_core_filter_user_contacts' ) ){
	
	function _thz_core_filter_user_contacts( $contactmethods ) {
		
	   $contactmethods['twitter']  		= 'Twitter'; 
	   $contactmethods['facebook'] 		= 'Facebook'; 
	   $contactmethods['googleplus'] 	= 'Google+'; 
	   $contactmethods['linkedin'] 		= 'Linkedin';
	   $contactmethods['dribbble'] 		= 'Dribbble';
	   $contactmethods['github']  		= 'GitHub'; 
			
	   return $contactmethods;
	}

}
add_filter('user_contactmethods','_thz_core_filter_user_contacts',10,1);
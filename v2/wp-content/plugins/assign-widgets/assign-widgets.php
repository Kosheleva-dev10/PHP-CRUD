<?php
if(!defined('ABSPATH')){
	 exit;
}
/*
Plugin Name: Assign Widgets
Plugin URI: https://github.com/Themezly/Assign-Widgets
Description: Assign widgets to selected pages or create widget areas
Author: Themezly
Author URI: http://themezly.com
Version: 1.0.4
License: GNU/GPLv2
License URI: http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2
*/

class ThzAssignWidgets{

	
	function __construct(){
		
		
		// actions
		add_action( 'in_widget_form', array(&$this, 'thz_aw_in_widget_form' ), 10, 3);
		add_action( 'admin_enqueue_scripts', array(&$this, 'thz_aw_scripts'));	
		add_action( 'wp_ajax_thz_aw_get_ajax_posts',array(&$this, 'thz_aw_get_ajax_posts' ) );
		add_action( 'wp_ajax_thz_aw_generate_sidebar',array(&$this, 'thz_aw_generate_sidebar' ) );
		add_action( 'wp_ajax_thz_aw_remove_sidebar',array(&$this, 'thz_aw_remove_sidebar' ) );
		add_action('widgets_init', array(&$this, 'thz_aw_register_sidebars') , 1000 );
		add_action('plugins_loaded', array(&$this, 'thz_aw_load_textdomain'));

		// filters
		add_filter('widget_update_callback', array(&$this, 'thz_aw_update_callback'), 10, 3);
		add_filter('sidebars_widgets', array(&$this, 'thz_aw_sidebars_widgets'), 10, 2 );		
		
	}
	


	/**
	 * ThzAssignWidgets scripts
	 */
	public function thz_aw_scripts() {
		
		global $pagenow;
		
		if($pagenow !== 'widgets.php' && $pagenow !== 'customize.php') {
			return;
		}
		
		$uri = plugin_dir_url( __FILE__ );
		
		
		wp_enqueue_style(
			'assign-widgets',
			$uri . 'css/styles.css' 
		);
		
		
		wp_enqueue_style(
			'thz_aw_widgets_selectize',
			$uri . 'assets/selectize/css/selectize.default.css' 
		);

		
		wp_enqueue_script(
			'thz_aw_widgets_selectize',
			$uri . 'assets/selectize/js/selectize.min.js',
			array('jquery')
		);	
		
		wp_enqueue_script(
			'assign-widgets',
			$uri . 'js/scripts.js',
			array(  'jquery', 'thz_aw_widgets_selectize' )
		);	
		
		
		wp_localize_script('assign-widgets', 'thz_aw_var', array(
				'thz_aw_nonce' => wp_create_nonce( 'thz_aw_nonce' ),
				'thz_aw_1'=> __('Widget Area Generator','assign-widgets'),
				'thz_aw_2'=> __('New widget area name ','assign-widgets'),
				'thz_aw_3'=> __('Add new widget area','assign-widgets'),
				'thz_aw_4'=> __('Please add new widget area name','assign-widgets'),
				'thz_aw_5'=> __('Creating widget area ','assign-widgets'),
				'thz_aw_6'=> __(' please wait...','assign-widgets'),
				'thz_aw_7'=> __('All done! Reloading...','assign-widgets'),
				'thz_aw_8'=> __('Your are about to delete this widget area. Click ok to continue.','assign-widgets')
			)
		);
		
	}

	/**
	 * Load languages
	 */
	public function thz_aw_load_textdomain(){

		load_plugin_textdomain( 'assign-widgets', false, dirname(plugin_basename(__FILE__)).'/languages/');
		
	}	

	/**
	 * Render view
	 */
	public function thz_aw_in_widget_form( $instance, $empty, $options  ) {


		echo $this->thz_aw_widgets_backend_render(dirname(__FILE__) .'/view/backend-view.php', array(
			'instance' 			=> $instance,
			'options' 			=> $options,
			'miscellaneous' 	=> $this->thz_list_miscellaneous(),
			'post_types' 		=> $this->thz_list_post_types(),
			'taxonomies' 		=> $this->thz_list_taxonomies(),
			'archives' 			=> $this->thz_list_archives(),
			'usergroups'		=> $this->thz_list_user_groups(),
			'devices'			=> $this->thz_list_devices(),
		));
		
	}
	
	
	/**
	 * Update form
	 * @return array
	 */
	public function thz_aw_update_callback ( $instance, $new_instance) {

		$instance['view_type'] 			= $new_instance['view_type'];
		$instance['assigned_pages'] 	= isset($new_instance['assigned_pages']) ? $new_instance['assigned_pages'] : array();
		
		return $instance;
	}
	
	
	/**
	 * Load render
	 * @return string
	 */	
	public function thz_aw_widgets_backend_render($file_path, $view_variables = array(), $return = true) {
		extract($view_variables, EXTR_REFS);
		unset($view_variables);
		if ($return) {
			ob_start();
			require $file_path;
			return ob_get_clean();
		} else {
			require $file_path;
		}
	}
	
	/**
	 * List post types
	 * @return array
	 */	
	protected function thz_list_post_types(){
		
		$post_types = array();
		$all_post_types = get_post_types( array(
                'public' => true,
            ), 'object');
            
		foreach ( array( 'revision', 'link_category', 'attachment', 'nav_menu_item' ) as $unset ) {
			unset($all_post_types[$unset]);
		}
		foreach ($all_post_types as $type => $post_type ){
			
			
			$label = $post_type->label;
			if($type =='post'){
				$label = __('Blog ','assign-widgets').$label;
			}
			$post_types['pt_'.$type] = __('Single ','assign-widgets').$label;
		}
		
		unset($all_post_types);
		unset($post_type);
		
		return $post_types;
	}
	
	/**
	 * List taxonomies
	 * @return array
	 */	
	protected function thz_list_taxonomies(){
		
		$taxonomies = array();
		
		$all_taxonomies = get_taxonomies(array(
				'public' => true
		));
		
		foreach ($all_taxonomies as $taxonomy ){
			
			
			if($taxonomy == 'post_tag' || $taxonomy == 'post_format'){
				continue;
			}
			
			$taxonomy_details = get_taxonomy( $taxonomy );
			$label = $taxonomy_details->label;
			
			if($taxonomy =='category'){
				$label = __('Blog ','assign-widgets').$label;
			}
			
			$taxonomies['tx_'.$taxonomy] = $label;
		}		
		
		unset($all_taxonomies);
		unset($taxonomy);
		
		return $taxonomies;
	}
	
	/**
	 * List miscellaneous
	 * @return array
	 */	
	protected function thz_list_miscellaneous(){
		
		$miscellaneous = array(
			'is_front_page' => __('Front Page', 'assign-widgets'),
			'is_home' 		=> __('Blog Home Page', 'assign-widgets'),
			'is_postspage' 	=> __('Posts page', 'assign-widgets'),
			'is_attachment' => __('Attachment Page', 'assign-widgets'),
			'is_search' 	=> __('Search Page', 'assign-widgets'),
			'is_404' 		=> __('404 Page', 'assign-widgets'),
			'is_author' 	=> __('Author Archive', 'assign-widgets'),
			'is_tag' 		=> __('Tags Archive', 'assign-widgets'),
		);
		
		if(function_exists('bp_is_my_profile')){
			$miscellaneous['buddy_press'] = __('BuddyPress','assign-widgets');
		}
		
		if ( class_exists( 'WooCommerce' )  ) {
			$pageid = get_option( 'woocommerce_shop_page_id' );
			$miscellaneous['pt_page_'.$pageid] = __('Shop Homepage','creatus');
		}		
		
		
		return $miscellaneous;
		
	}
	
	/**
	 * List archives
	 * @return array
	 */	
	protected function thz_list_archives(){
		
		$archives = array();
		$allarchives = get_post_types(
			array(
				'public' => true,
				'has_archive' => true
			),
			'objects'
		);
		
		
		$archives['ar_post'] = __('Posts Archive', 'assign-widgets');
		foreach ($allarchives as $type => $archive ){
			
			$label = $archive->label;

			$archives['ar_'.$type] = $label.__(' Archive','assign-widgets');
		}
		
		unset($allarchives);
		unset($archive);
		
		return $archives;
	}

	/**
	 * List specific posts via ajax
	 * @return JSON
	 */		
	public static function thz_aw_get_ajax_posts(){


		if ( ! wp_verify_nonce( $_POST['thz_aw_nonce'], 'thz_aw_nonce' ) ) {
			 die(-1);
		}
		
		if(!isset($_POST['searchTerm'])) {
			return;
		}
		
		$all_posts = array();
		
		$search_term = esc_sql( $_POST['searchTerm'] );
		
		if( empty( $search_term ) ) {
			return;
		}

		global $wpdb;
		
		$all_post_types = get_post_types();
		foreach ( array( 'revision', 'link_category', 'attachment', 'nav_menu_item','bp-email' ) as $unset ) {
			unset($all_post_types[$unset]);
		}
		
		$posts = $wpdb->get_results(
			"SELECT posts.ID, posts.post_title, posts.post_type " .
			"FROM $wpdb->posts as posts " .
			"WHERE post_type IN ('" . implode( "', '", $all_post_types ) . "') " .
			"AND post_status IN ( 'publish', 'private' ) " .
			"AND post_title LIKE  '%".$search_term."%' " .
			"ORDER BY post_date DESC LIMIT 100"
		);
		
		unset($all_post_types);
		
		if ( ! empty( $posts ) || ! is_wp_error( $posts ) ) {

			foreach ($posts as $key=> $post ){
				
				$title = $post->post_title;
				$title = empty( $title ) ? $post->ID .__('-no title','assign-widgets') : $title;
				$slug  = 'pt_'.$post->post_type;

				$all_posts[] = array(
					'text'   => $title,
					'value'  => $slug.'_'.$post->ID,
				);

			}
			
			unset($posts);
			unset($post);
		}
		
		
		$taxonimies = get_taxonomies(array(
			'public' => true
		));	
		
			
		$items = get_terms( $taxonimies, array(
			'name__like' => $search_term,
			'hide_empty' => false,
			'number'     => 100
		));
		
		foreach ( $items as $key => $item ) {
			$slug = 'tx_'.$item->taxonomy;

			$all_posts[] = array(
				'text'   => $item->name,
				'value' =>  $slug.'_'.$item->term_id,
			);
			
		}
		unset($items);	
		unset($item);	

		wp_send_json_success( $all_posts );
		
	}
	
	
	/**
	 * List users
	 * @return array
	 */	
	protected function thz_list_user_groups(){
		
		$usergroups = array(
			'is_logged_in' 	=> __('Logged in users', 'assign-widgets'),
			'is_logged_out' => __('Logged out users', 'assign-widgets'),
		);

		return $usergroups;
	}	
	
	/**
	 * List devices
	 * @return array
	 */	
	protected function thz_list_devices(){
		
		$devices = array(
			'is_mobile' 	=> __('Mobile', 'assign-widgets'),
			'is_desktop' 	=> __('Desktop', 'assign-widgets'),
		);

		return $devices;
	}

	/**
	 * Get widgets
	 * logic by sswells
	 * modified by themezly
	 * @return array
	 */	
   public function thz_aw_sidebars_widgets( $sidebars ) { 
	   
        if ( is_admin() ) {
            return $sidebars;
        }

        global $wp_registered_widgets;
		
        foreach ( $sidebars as $s => $sidebar ) {
			
			if ( empty($sidebar) || 'wp_inactive_widgets' == $s || 0 === strpos($s, 'orphaned_widgets') ) {
                continue;
            }

            foreach ( $sidebar as $w => $widget_id ) {
				
                if ( !isset($wp_registered_widgets[$widget_id]) ) {
                    continue;
                }

				$atts	 = $wp_registered_widgets[$widget_id];
				$id_base = is_array($atts['callback']) ? $atts['callback'][0]->id_base : $atts['callback'];

				if ( !$id_base ) {
					continue;
				}

				$instance = get_option('widget_' . $id_base);

				if ( !$instance || !is_array($instance) ) {
					continue;
				}

				if ( isset($instance['_multiwidget']) && $instance['_multiwidget'] ) {
					$number = $atts['params'][0]['number'];
					if ( !isset($instance[$number]) ) {
						continue;
					}

					$instance = $instance[$number];
					unset($number);
				}

				unset($atts);
				
				$view_type		= isset($instance['view_type']) ? $instance['view_type'] : null;
				$assigned_pages	= isset($instance['assigned_pages']) ? $instance['assigned_pages'] : null;
				$hide 			= $this->thz_aw_hide_widget($view_type,$assigned_pages,$instance);
				
				if($hide){
					unset($sidebars[$s][$w]);
				}

                unset($widget_id);
            }
            unset($sidebar);
        }

        return $sidebars;
    }

	
	
	/**
	 * Hide/show widgets
	 * @return bool
	 */		
	public function thz_aw_hide_widget($view_type,$assigned_pages,$instance){
		
		if(empty($assigned_pages)) {
			 return;
		}
		if(!$view_type){
			 return;
		}
		
		$hide 		= ($view_type == 'hide') ? false : true;

		$pageinfo 	= $this->thz_get_page_type_info( $assigned_pages );
		$sub_type 	= isset($pageinfo['sub_type']) ? $pageinfo['sub_type'] : null;
		
		foreach($assigned_pages as $this_page){

			if($this_page ==  $pageinfo['slug'] && $view_type == 'hide'){
				$hide = true;
				break;
			}
			
			if($this_page == $sub_type && $view_type == 'hide'){
				$hide = true;
				break;
			}
			
			if($this_page == $pageinfo['slug'] && $view_type == 'show'){
				$hide = false;	
				break;
				
			}
			
			if($this_page == $sub_type && $view_type == 'show'){
				$hide = false;	
				break;
			}

			
		}
		
		unset($this_page);

		return $hide;
	}
	
	/**
	 * Get page info
	 * @return array
	 */	
	protected function thz_get_page_type_info( $assigned_pages = array() ) {
				
		$data =  array();

		if( is_user_logged_in() ){
			
			$data['type']     = 'is_logged_in';
			$data['sub_type'] = 'is_logged_in';
			$data['id']       = '';
			$data['slug']	  = 'is_logged_in';
			$data['setby']	  = 'is_user_logged_in()';
			
			if(in_array($data['slug'],$assigned_pages)){			
				return $data;
			}
		}
		
		
		if( $this->thz_aw_is_logged_out() ){
			
			$data['type']     = 'is_logged_out';
			$data['sub_type'] = 'is_logged_out';
			$data['id']       = '';
			$data['slug']	  = 'is_logged_out';
			$data['setby']	  = 'thz_aw_is_logged_out()';			
			
			if(in_array($data['slug'],$assigned_pages)){			
				return $data;
			}
		}
		
		if( wp_is_mobile() ){
			
			$data['type']     = 'is_mobile';
			$data['sub_type'] = 'is_mobile';
			$data['id']       = '';
			$data['slug']	  = 'is_mobile';
			$data['setby']	  = 'wp_is_mobile()';			
			
			if(in_array($data['slug'],$assigned_pages)){			
				return $data;
			}			
			
		}
		
		if( $this->thz_aw_is_desktop() ){
			
			$data['type']     = 'is_desktop';
			$data['sub_type'] = 'is_desktop';
			$data['id']       = '';
			$data['slug']	  = 'is_desktop';
			$data['setby']	  = 'thz_aw_is_desktop()';			
			
			if(in_array($data['slug'],$assigned_pages)){			
				return $data;
			}
		}
		
		
	
		if ( 'page' == get_option( 'show_on_front' ) && is_front_page() && !is_home()  ) {
			$data['type']     = 'is_front_page';
			$data['sub_type'] = get_post_type();
			$data['id']       = get_queried_object_id();
			$data['slug']	  = 'is_front_page';
			$data['setby']	  = 'is_front_page()';
			
			if(in_array($data['slug'],$assigned_pages)){			
				return $data;
			}
		}

		if ( 'posts' == get_option( 'show_on_front' ) && is_home() && is_front_page()  ) {
			
			$data['type']     = 'is_home';
			$data['slug']	  = 'is_home';
			$data['setby']	  = 'is_home()';			
			
			if(in_array($data['slug'],$assigned_pages)){			
				return $data;
			}
		}
		
		
		if ( 'page' == get_option( 'show_on_front' ) && is_home() && !is_front_page()  ) {
			
			$data['type']     = 'is_postspage';
			$data['slug']	  = 'is_postspage';
			$data['setby']	  = 'is_postspage';			
			
			if(in_array($data['slug'],$assigned_pages)){			
				return $data;
			}
		}
				
		if ( is_attachment() ) {
			
			$data['type']     = 'is_attachment';
			$data['slug']	  = 'is_attachment';
			$data['setby']	  = 'is_attachment()';
			
			if(in_array($data['slug'],$assigned_pages)){			
				return $data;
			}
		}				

		if ( is_author() ) {
			
			$data['type']     = 'is_author';
			$data['slug']	  = 'is_author';
			$data['setby']	  = 'is_author()';
			
			if(in_array($data['slug'],$assigned_pages)){			
				return $data;
			}
		}
		
				
		if ( is_category() ) {
			
			$data['type']     = 'tx';
			$data['sub_type'] = $data['type'].'_category';
			$data['id']       = get_queried_object_id();
			$data['slug']	  = $data['sub_type'].'_'.$data['id'] ;
			$data['setby']	  = 'is_category()';
			
			if(in_array($data['slug'],$assigned_pages) || in_array($data['sub_type'],$assigned_pages)){			
				return $data;
			}
			
		}
		
		if ( is_tag() ) {
			
			$data['type']     = 'is_tag';
			$data['slug']	  = 'is_tag';
			$data['setby']	  = 'is_tag()';
	
			if(in_array($data['slug'],$assigned_pages)){		
				return $data;
			}
		}

		if ( is_tax() ) {
			$data['type']     ='tx';
			$data['sub_type'] = $data['type'].'_'.get_queried_object()->taxonomy;
			$data['id']       = get_queried_object_id();
			$data['slug']	  = $data['sub_type'].'_'.$data['id'];
			$data['setby']	  = 'is_tax()';
			
			if(in_array($data['slug'],$assigned_pages) || in_array($data['sub_type'],$assigned_pages)){			
				return $data;
			}
		}
		

		if ( is_archive() && ! is_tax() ) {
			
			$data['type']     = 'ar';
			$data['sub_type'] = get_post_type();
			$data['slug']	  = $data['type'].'_'.$data['sub_type'];
			$data['setby']	  = 'is_archive()';
			
			if(in_array($data['slug'],$assigned_pages)){			
				return $data;
			}
		}
		
		if ( function_exists('bp_is_my_profile') && bp_is_my_profile()) {
			
			$data['type']     = 'is_bp';
			$data['sub_type'] = 'buddy_press';
			$data['slug']	  = 'buddy_press';
			$data['setby']	  = 'bp_is_my_profile()';
			
			if(in_array($data['slug'],$assigned_pages)){			
				return $data;
			}
		}
		
		if ( is_404() ) {
			
			$data['type']     = 'is_404';
			$data['slug']	  = 'is_404';
			$data['setby']	  = 'is_404()';
			
			if(in_array($data['slug'],$assigned_pages)){			
				return $data;
			}
		}
		
		if ( is_search() ) {
			
			$data['type']     = 'is_search';
			$data['slug']	  = 'is_search';
			$data['setby']	  = 'is_search()';
			
			if(in_array($data['slug'],$assigned_pages)){			
				return $data;
			}
			
		}

		if ( class_exists( 'WooCommerce' )  ) {
			if(	is_shop() ){
				$pageid = get_option( 'woocommerce_shop_page_id' );
				
				$data['type']     = 'pt';
				$data['sub_type'] = $data['type'].'_page';
				$data['id']       = $pageid ;
				$data['slug']	  = $data['sub_type'].'_'.$pageid ;	
				$data['setby']	  = 'is_shop()';
				
				if(in_array($data['slug'],$assigned_pages) || in_array($data['sub_type'],$assigned_pages)){			
					return $data;
				}			
				
			}	
		}


		if ( $this->is_thz_post_type() ){
			
			$data['type']     = 'pt';
			$data['sub_type'] = $data['type'].'_'.get_post_type();
			$data['id']       = get_queried_object_id();
			$data['slug']	  = $data['sub_type'].'_'.$data['id'];	
			$data['setby']	  = 'is_thz_post_type()';	
			
			if(in_array($data['slug'],$assigned_pages) || in_array($data['sub_type'],$assigned_pages)){			
				return $data;
			}		
		}
			
	}
	
	
	
	/**
	 * User not loged in
	 * @return bool
	 */	
	public function thz_aw_is_logged_out(){
		
		if(!is_user_logged_in()) {
			return true;
		}
		
	}
	
	/**
	 * Is desktop
	 * @return bool
	 */	
	public function thz_aw_is_desktop(){
		
		if(!wp_is_mobile()){
			 return true;
		}
		
	}

	/**
	 * Get post types for page info
	 * @return bool
	 */		
	protected function is_thz_post_type( $post = null )	{
		
		if( !is_singular() ){
			return false;
		}
		
		$all_post_types = get_post_types();
	
		if ( empty ( $all_post_types ) ) {
			return false;
		}
	
		$all_types      = array_keys( $all_post_types );
		$current_post_type = get_post_type( $post );
	
		if ( ! $current_post_type ) {
			return false;
		}
	
		return in_array( $current_post_type, $all_types );
		
	}
	
	
	/**
	 * Generate widget area
	 * @return JSON
	 */		
	public function thz_aw_generate_sidebar(){
		
		
		if ( ! wp_verify_nonce( $_POST['thz_aw_nonce'], 'thz_aw_nonce' ) ){
			 die(-1);
		}
		
		if(!isset($_POST['newSidebarName'])) {
			return;
		}
		
		$new_sidebar_name 	= sanitize_text_field( $_POST['newSidebarName'] );
		if(empty( $new_sidebar_name )){
			 return;
		}
		
		$thz_aw_sidebars 	= get_theme_mod( 'thz_aw_sidebars' );
		
		
		$suffix = $thz_aw_sidebars ? $this->thz_aw_check_suffix( $thz_aw_sidebars['areas'] ) : 1;
		
		$thz_aw_sidebars['areas']['thz_aw_widget_area' . $suffix] = $new_sidebar_name ;
		$thz_aw_sidebars['suffix'] = $suffix;
		
		set_theme_mod( 'thz_aw_sidebars', $thz_aw_sidebars );

		wp_send_json_success( array(
			'created' => 1,
			'sidebar'=> $new_sidebar_name  
		));
		
	}

	/**
	 * Remove widget area
	 * @return JSON
	 */		
	public function thz_aw_remove_sidebar(){
		
		if ( ! wp_verify_nonce( $_POST['thz_aw_nonce'], 'thz_aw_nonce' ) ) {
			die(-1);
		}
		
		if(!isset($_POST['oldSidebarName'])) {
			return;
		}
		
		$thz_aw_sidebars 	= get_theme_mod( 'thz_aw_sidebars' );
		$old_sidebar_name 	= $_POST['oldSidebarName'];
		
		
		$suffix = $thz_aw_sidebars ? $this->thz_aw_check_suffix( $thz_aw_sidebars['areas'] ) : 1;
		
		unset( $thz_aw_sidebars['areas'][$old_sidebar_name] );
		
		$thz_aw_sidebars['suffix'] = $suffix;
		
		set_theme_mod( 'thz_aw_sidebars', $thz_aw_sidebars );
		
		wp_send_json_success( array(
			'removed' => 1,
			'sidebar'=> $old_sidebar_name  
		));	
	}
	
	/**
	 * Check/generate widget area suffix
	 * @return string
	 */	
	public function thz_aw_check_suffix ($a){
		for($i=1; $i<=count($a)+1; $i++ ){
			if( ! array_key_exists("thz_aw_widget_area$i", $a) ){
				return $i;    
			}    
		}
	}	
	
	/**
	 * Register widget areas
	 */	
	public function thz_aw_register_sidebars(){
		
		
		$thz_aw_sidebars = get_theme_mod( 'thz_aw_sidebars' );
		
		if(empty($thz_aw_sidebars) ){
			 return;
		}
		
		foreach ($thz_aw_sidebars['areas'] as $id => $name){

			register_sidebar(array(
				'name' 			=> $name,
				'id' 			=> $id,
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget' 	=> '</div>',
				'before_title' 	=> '<div class="widget_title_holder"><h3 class="widget-title">',
				'after_title' 	=> '</h3></div>'
			));			
			
		}
		
		
	}

}

$ThzAssignWidgets = new ThzAssignWidgets();
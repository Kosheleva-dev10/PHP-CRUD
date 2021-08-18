<?php
/*
Plugin Name: Thz Core
Plugin URI: https://github.com/Themezly/Thz-Core
Description: Thz Core Plugin for Creatus Theme
Author: Themezly
Author URI: http://themezly.com
Version: 1.1.15
License: GNU/GPLv2
License URI: http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2
*/

if(!defined('ABSPATH')){
	 exit;
}

if( ! class_exists( 'ThzCore_Plugin' ) ) {
	
	class ThzCore_Plugin{
	
	
		const VERSION = '1.1.15';
		protected static $_instance = null;
		/**
		 * @var ThzCore_Activation_Option
		 */
		private $option;

		private function __construct() {
			
			// run only if creatus
			if ( !$this->is_creatus() ) {
				return;
			}
			
			// actions
			add_action( 'init', array( $this, 'init' ) );
			add_action( 'admin_init', array( $this, 'admin_init' ) );
			add_action( 'manage_thz-pageblock_posts_custom_column', array( $this, 'thz_action_set_pageblocks_columns_data' ), 10, 2 );
			add_action( 'pre_get_posts', array( $this, 'thz_action_sort_pageblocks' ) );
			add_action( 'save_post', array( $this, 'thz_action_update_pageblock_meta' ), 10, 2 );
			add_action( 'in_widget_form', array(&$this, 'thz_core_in_widget_form' ), 10, 3);
			
			// filters
			add_filter( 'manage_thz-pageblock_posts_columns', array( $this, 'thz_filter_set_pageblocks_columns' ) );
			add_filter( 'manage_edit-thz-pageblock_sortable_columns', array( $this, 'thz_filter_pageblock_set_sortable_columns' ) );
			add_filter( 'widget_update_callback', array(&$this, 'thz_core_widget_update_callback'), 10, 3);
			add_filter( 'widget_display_callback', array(&$this, 'thz_core_widget_display_callback'), 10, 3);
			
			// theme libs
			$this->load_libs();
			
			// theme helpers
			$this->load_helpers();
			
			// theme activation
			$this->load_activation();
		}

		/**
		 * Check if creatus theme
		 */	
		public function is_creatus() {
			
			$is_creatus = false;
			
			if ( 'creatus' == get_option( 'template' ) ) {
				$is_creatus = true;
			}
			
			if ( isset($_GET['theme']) ){
				
				if( strpos($_GET['theme'], 'creatus') !== false ){
					$is_creatus = true;
				}else{
					$is_creatus = false;
				}
			}
			
			if ( isset($_GET['customize_theme']) ){
				
				if( strpos($_GET['customize_theme'], 'creatus') !== false ){
					$is_creatus = true;
				}else{
					$is_creatus = false;
				}
			}

			return $is_creatus;
		}
		
		/**
		 * Init
		 * @since   1.0.0
		 */	
		public function init() {
			
			$this->thz_action_taxonomies_register();
			$this->thz_action_pageblocks_register();

		}
		
		/**
		 * Admin init
		 * @since   1.0.0
		 */		
		public function admin_init(){
	
			load_plugin_textdomain( 'thz-core', false, dirname(plugin_basename(__FILE__)).'/languages/');
			
			$this->thz_action_editor_shortcodes_buttons();
			
			
			$path = plugin_dir_path( __FILE__ );
			require_once $path . 'inc/includes/update/update-plugin.class.php';
			
			$plugin 	= plugin_basename( __FILE__ );
			$slug 		= dirname( $plugin );

			// @todo - Version published on WordPress.org must have this removed since it's not needed
			new ThzCore_Update_Plugin( thz_core_plugin_update_url( array( 'update_notification' => 1 ) ), __FILE__, $this->option );
			new ThzCore_Plugin_Update_Details( thz_core_plugin_update_url( array( 'plugin_details' => 1) ), $plugin, $slug, $this->option );
		}
		
		/**
		 * Add editor shortcodes button
		 */		
		public function thz_filter_add_editor_buttons( $plugin_array ) {
			$plugin_array['thz_editor_shortcodes'] = plugin_dir_url( __FILE__ ) . 'assets/js/thz-core-editor-plugin.js';
			return $plugin_array;
		}

		/**
		 * Add button to the editor
		 */			
		public function thz_filter_register_editor_buttons( $buttons ) {
			array_push( $buttons, 'thz_editor_shortcodes'); 
			return $buttons;
		}

		/**
		 * Register and add editor buttons
		 */			
		protected function thz_action_editor_shortcodes_buttons() {
			
			if ( current_user_can( 'edit_posts' ) && current_user_can( 'edit_pages' ) ) {
				add_filter( 
					'mce_external_plugins', 
					array($this, 'thz_filter_add_editor_buttons')
				);
				
				add_filter( 
					'mce_buttons', 
					array($this, 'thz_filter_register_editor_buttons') 
				);
			}
			
		}

		/**
		 * Include theme helpers
		 * @since 1.1.1
		 */
		public static function load_helpers() {
			
			$path = plugin_dir_path( __FILE__ );
			require_once $path . 'inc/includes/helpers.php';
			require_once $path . 'inc/includes/hooks.php';
			require_once $path . 'inc/includes/shortcodes.php';
			require_once $path . 'inc/includes/helpers/update-helper.class.php';
			
			define( 'THZHELPERS', true);
			
		}
		
		/**
		 * Include libraries
		 * @since 1.1.1
		 */
		public static function load_libs() {
			$path = plugin_dir_path( __FILE__ );
			
			require_once $path . 'inc/includes/parsedown/parsedown.php';
			require_once $path . 'inc/includes/parsedown/parsedownextra.php';
			require_once $path . 'inc/includes/twitteroauth/twitteroauth.php';
		}
	
		/**
		 * Include activation class
		 * @since   1.0.5.1
		 */	
		public function load_activation(){
			$path = plugin_dir_path( __FILE__ );

			require_once $path . 'inc/includes/activate/option.class.php';
			$this->option = new ThzCore_Activation_Option( 'thz_registration' );
			// activation functionality
			require_once $path . 'inc/includes/activate/page.class.php';
			new ThzCore_Activation_Page( thz_core_activation_url(), $this->option );
			// theme update
			require_once $path . 'inc/includes/update/update-theme.class.php';
			new ThzCore_Update_Theme( thz_core_theme_update_url(), 'creatus', $this->option );
		}
	

		/**
		 * Returns the class instance
		 * @return  ThzCore_Plugin instance
		 * @since   1.0.0
		 */
		public static function get_instance() {
	
			if ( null == self::$_instance ) {
				self::$_instance = new self;
			}
	
			return self::$_instance;
		}

		/**
		 *  Check if Unyson is active
		 * @internal
		 */
		public function thz_fw_active() {
		
			$active = false;
		
			$active_plugins = get_option( 'active_plugins' );
		
			if ( in_array( 'unyson/unyson.php', $active_plugins, true ) ) {
				$active = true;
			}
		
			if ( ! function_exists( 'is_plugin_active_for_network' ) ) {
				require_once( ABSPATH . '/wp-admin/includes/plugin.php' );
			}
		
			if ( is_plugin_active_for_network( 'unyson/unyson.php' ) ) {
				$active = true;
			}
		
			return $active;
		
		}
		
		/**
		 * Register taxonimies
		 * @since   1.0.0
		 */
		function thz_action_taxonomies_register() {
			
			$thz_taxonomies = array();
			
			// Page category
			$args = array(
				'hierarchical' => true,
				'public' => true,
				'show_ui' => true,
				'show_admin_column' => true,
				'show_in_nav_menus' => true,
				'show_tagcloud' => false,
			);
			
			$thz_taxonomies []= array(
				'taxonomy'  => 'page_category',
				'post_type' => 'page',
				'args'      => $args
			);
				
        	$thz_taxonomies = apply_filters( 'thz_filter_taxonomies_register', $thz_taxonomies );
			
			if( !empty($thz_taxonomies)){
				
				foreach( $thz_taxonomies as $thz_tax ){
					
					register_taxonomy(
						$thz_tax['taxonomy'],
						$thz_tax['post_type'],
						$thz_tax['args']
					);				
				}
				
				unset($thz_taxonomies,$thz_tax);
			}

		}
		
		
		/**
		 * Register pageblock post type and tax
		 * @since   1.0.1
		 */
		function thz_action_pageblocks_register() {

			// post type
			$pt_labels = array(
				'name'                  => _x( 'Page Blocks', 'Post Type General Name', 'thz-core' ),
				'singular_name'         => _x( 'Page Block', 'Post Type Singular Name', 'thz-core' ),
				'menu_name'             => esc_html__( 'Page Blocks', 'thz-core' ),
				'name_admin_bar'        => esc_html__( 'Page Block', 'thz-core' ),
				'archives'              => esc_html__( 'Item Archives', 'thz-core' ),
				'attributes'            => esc_html__( 'Item Attributes', 'thz-core' ),
				'parent_item_colon'     => esc_html__( 'Parent Item:', 'thz-core' ),
				'all_items'             => esc_html__( 'All Blocks', 'thz-core' ),
				'add_new_item'          => esc_html__( 'Add New Block', 'thz-core' ),
				'add_new'               => esc_html__( 'Add New Block', 'thz-core' ),
				'new_item'              => esc_html__( 'New Block', 'thz-core' ),
				'edit_item'             => esc_html__( 'Edit Block', 'thz-core' ),
				'update_item'           => esc_html__( 'Update Block', 'thz-core' ),
				'view_item'             => esc_html__( 'View Block', 'thz-core' ),
				'view_items'            => esc_html__( 'View Blocks', 'thz-core' ),
				'search_items'          => esc_html__( 'Search Blocks', 'thz-core' ),
				'not_found'             => esc_html__( 'Not found', 'thz-core' ),
				'not_found_in_trash'    => esc_html__( 'Not found in Trash', 'thz-core' ),
				'items_list'            => esc_html__( 'Blocks list', 'thz-core' ),
				'items_list_navigation' => esc_html__( 'Blocks list navigation', 'thz-core' ),
				'filter_items_list'     => esc_html__( 'Filter items list', 'thz-core' ),
			);
		
		
			$pt_args = array(
				'label'                 => esc_html__( 'Page block', 'thz-core' ),
				'description'           => esc_html__( 'Page block for Creatus theme', 'thz-core' ),
				'labels'                => $pt_labels,
				'supports'              => array( 'title', 'editor','revisions', 'author'),
				'rewrite' 				=> false,
				'hierarchical'          => true,
				'public'                => is_user_logged_in() ? true : false,
				'show_ui'               => true,
				'show_in_menu'          => true,
				'menu_position'         => 4,
				'menu_icon' 			=> 'dashicons-welcome-widgets-menus',
				'show_in_admin_bar'     => true,
				'show_in_nav_menus'     => true,
				'has_archive'           => false,     
				'exclude_from_search'   => true,
				'publicly_queryable'    => is_user_logged_in() ? true : false,
				'capability_type'       => 'post',
				'query_var'             => true
		
			);
			
			register_post_type( 'thz-pageblock', $pt_args );
			
			
			// tax
			$tx_labels = array(
				'name'                          => _x( 'Categories','taxonomy general name', 'thz-core' ),
				'singular_name'                 => _x( 'Category','taxonomy singular name', 'thz-core' ),
				'search_items'                  => esc_html__( 'Search Categories', 'thz-core' ),
				'popular_items'                 => esc_html__( 'Popular Categories', 'thz-core' ),
				'all_items'                     => esc_html__( 'All Categories', 'thz-core' ),
				'parent_item'                   => esc_html__( 'Parent Category', 'thz-core' ),
				'edit_item'                     => esc_html__( 'Edit Category', 'thz-core' ),
				'update_item'                   => esc_html__( 'Update Category', 'thz-core' ),
				'add_new_item'                  => esc_html__( 'Add New Category', 'thz-core' ),
				'new_item_name'                 => esc_html__( 'New Category', 'thz-core' ),
				'separate_items_with_commas'    => esc_html__( 'Separate categories with commas', 'thz-core' ),
				'add_or_remove_items'           => esc_html__( 'Add or removecategories', 'thz-core' ),
				'choose_from_most_used'         => esc_html__( 'Choose from most used categories', 'thz-core' )
			);
		
			$rewrite = array( 
				'slug' => 'thz-pageblock-category', 
				'hierarchical' => true, 
				'with_front' => false 
			);
		
			$tx_args = array(
				'label'                         => esc_html__('Page Blocks Categories', 'thz-core' ),
				'labels'                        => $tx_labels,
				'public'                        => false,
				'hierarchical'                  => true,
				'show_ui'                       => true,
				'show_in_nav_menus'             => true,
				'show_admin_column' 			=> true,
				'rewrite'                       => $rewrite,
			);
		
			register_taxonomy( 'thz-pageblock-category', 'thz-pageblock', $tx_args );


		}

		/**
		 * Set pageblocks columns
		 * @since   1.0.2
		 */		
		function thz_filter_set_pageblocks_columns( $columns ) {

			$columns = array(
				'cb' => '<input type="checkbox" />',
				'title' => __( 'Title' ),
				'taxonomy-thz-pageblock-category' => __( 'Categories' ),
				'position' => __( 'Position' ),
				'assignment' => __( 'Assignment' ),
				'visibility' => __( 'Visibility' ),
				'date' => __( 'Date' ),
				'id' => __( 'ID' )
			);
		
			return $columns;
		}
		
		/**
		 * Set pageblock column data
		 * @since   1.0.2
		 */		
		function thz_action_set_pageblocks_columns_data( $column, $post_id  ){
			
			switch ( $column ) {

				case 'position' :
					
					$position = get_post_meta($post_id,'thz_page_block_position', true);

					echo $position;
					break;
							
				case 'assignment' :
					
					if( $this->thz_fw_active() ){
					
						$assignment 	= fw_get_db_post_option( $post_id, 'assignment', 'all');
						$assignto 		= fw_get_db_post_option( $post_id, 'assignto', array() );
						$assignment_txt = '';
						
						if( 'show' == $assignment ){
							$assignment_txt = esc_html__('Shown only on these pages;', 'thz-core').'</br>';
						}
						
						elseif( 'hide' == $assignment ){
							$assignment_txt = esc_html__('Hidden on these pages;', 'thz-core').'</br>';
						}	
						
						if(!empty ( $assignto ) && 'all' != $assignment ){
	
							echo $this->thz_pageblocks_assigned_names( $assignto );
							
						}else{
							
							echo esc_html__('All pages', 'thz-core' );
							
						}
						
					}else{
						
						echo esc_html__('To display data please enable Unyson plugin', 'thz-core' );
						
					}
					
					break;
		
				case 'visibility' :
					
					if( $this->thz_fw_active() ){
						
						$visibility = fw_get_db_post_option( $post_id, 'visibility', 'everyone' ); 				
						$visibleto 	= fw_get_db_post_option( $post_id, 'visibleto', array() );
						
						if( 'custom' == $visibility && !empty ( $visibleto ) ){
							
							echo implode(', ', array_keys( $visibleto ) );
							
						}else{
							
							echo esc_html__('Everyone', 'thz-core' );
							
						}
							
					}else{
						
						echo esc_html__('To display data please enable Unyson plugin', 'thz-core' );
						
					}
									
					break;
					
				case 'id' :
				
					echo $post_id ;
				
				break;
			}			
			
		}
		

		/**
		 * Set pageblock meta on save
		 * @since   1.0.2
		 */	
		public function thz_action_update_pageblock_meta( $post_id, $post){

			if ( 'trash' === $post->post_status ) {
				return;
			}
						
			if( $this->thz_fw_active() ){
				
				$position = fw_get_db_post_option( $post_id, 'position', 'unassigned');
				
			}else{
				
				$position = 'unassigned';
			}
						
			update_post_meta($post_id, 'thz_page_block_position', $position);		
			
		}
		
		
		/**
		 * Sort pageblocks
		 * @since   1.0.2
		 */			
		function thz_action_sort_pageblocks( $query ) {
			
			if( ! is_admin() || ! $query->is_main_query() ){
				return;
			}
			
		   $orderby = $query->get( 'orderby' );  
		
			if( 'position' == $orderby ) {  
				
				$query->set('meta_key','thz_page_block_position');  
				$query->set('orderby','meta_value'); 
			}  			
			
		}
		
		
		/**
		 * Set sortable columns
		 * @since   1.0.2
		 */	
		function thz_filter_pageblock_set_sortable_columns( $columns ) {
		
			$columns['position'] = 'position';
		
			return $columns;
		}
		
		/**
		 * Get term by ID
		 * @return object
		 */
		static function thz_get_term_by_id( $term_id, $output = OBJECT, $filter = 'raw' ) {
			
			if( !is_numeric($term_id) ){
				return false;
			}
			
			global $wpdb;
		
			$_tax     = $wpdb->get_row( $wpdb->prepare( "SELECT t.* FROM $wpdb->term_taxonomy AS t WHERE t.term_id = %s LIMIT 1", $term_id ) );
			$taxonomy = $_tax->taxonomy;
		
			return get_term( $term_id, $taxonomy, $output, $filter );
		
		}
		
		/**

		 * Get pageblock assigned names
		 * @since   1.0.2
		 */		
		static function thz_pageblocks_assigned_names( $assignto ){
			
			$output = array();
			
			// miscellaneous
			$all_names = array(
				'is_front_page' => esc_html__('Front Page', 'thz-core'),
				'is_home' => esc_html__('Blog Home Page', 'thz-core'),
				'is_postspage' => esc_html__('Posts page', 'thz-core'),
				'is_attachment' => esc_html__('Attachment Page', 'thz-core'),
				'is_search' => esc_html__('Search Page', 'thz-core'),
				'is_404' => esc_html__('404 Page', 'thz-core'),
				'is_author' => esc_html__('Author Archive', 'thz-core'),
				'is_tag' => esc_html__('Tags Archive', 'thz-core'),
			);	

			// post types 
			$all_post_types = get_post_types( array(
					'public' => true,
				), 'object');
				
			foreach ( array( 'revision', 'link_category', 'attachment', 'nav_menu_item' ) as $unset ) {
				unset($all_post_types[$unset]);
			}
			
			foreach ($all_post_types as $type => $post_type ){
				
				$label = $post_type->label;
				if($type =='post'){
					$label = esc_html__('Blog ','thz-core').$label;
				}
				$all_names['pt_'.$type] = esc_html__('Single ','thz-core').$label;
			}
			unset($all_post_types);
		
			// archives
			$allarchives = get_post_types(
				array(
					'public' => true,
					'has_archive' => true
				),
				'objects'
			);
			
			$all_names['ar_post'] = esc_html__('Posts Archive', 'thz-core');
			foreach ($allarchives as $type => $archive ){
				
				$label = $archive->label;
	
				$all_names['ar_'.$type] = '<a href="'.get_post_type_archive_link($type).'" target="_blank">'.$label.__(' Archive','thz-core').'</a>';
			}
			
			unset($allarchives);
			
			if(function_exists('bp_is_my_profile')){
				$all_names['buddy_press'] = esc_html__('BuddyPress','thz-core');
			}
			
			if ( class_exists( 'WooCommerce' )  ) {
				$pageid = get_option( 'woocommerce_shop_page_id' );
				$all_names['pt_page_'.$pageid] = '<a href="'.get_permalink( $pageid ).'" target="_blank">'.esc_html__('Shop Homepage','thz-core').'</a>';
			}
			
			foreach( $assignto as $id ){
				
				if( isset( $all_names[$id] )){
					
					$output[$id] = $all_names[$id];
					
				}else{
				
					$pageinfo = explode('_',$id);
					
					if(isset($pageinfo[2])){
						
						$pageid = end($pageinfo);

						if( 'tx' == $pageinfo[0] ){
							
							$name = self::thz_get_term_by_id( $pageid );
							
							if( $name ){
								
								$name = $name->name;
								
							}else{
								
								$name = $pageid;
							}
							
							$title = '<a href="'.get_category_link( $pageid ).'" target="_blank">'.$name.'</a>';
							
						}else{
							
							$title = '<a href="'.get_permalink( $pageid ).'" target="_blank">'.get_the_title( $pageid ).'</a>';
						}
						
						$output[$id] = $title;
					
					}else{
						
						$output[$id] = $id;
					}
				
				}
				
			}
			
			unset ( $all_names );
			
			return implode(', ', $output );
			
		}

		
		/**
		 * Render widget form ID and class options
		 */
		public function thz_core_in_widget_form( $instance, $empty, $options  ) {

			$value_id 		= isset( $options['thz_wi_id']) ?  $options['thz_wi_id'] : '';
			$value_class 	= isset( $options['thz_wi_class']) ?  $options['thz_wi_class'] : '';
	
			echo $this->thz_core_backend_render(dirname(__FILE__) .'/inc/includes/views/widgets-view.php', array(
				'instance' 			=> $instance,
				'options' 			=> $options,
				'value_id' 			=> $value_id,
				'value_class' 		=> $value_class,
			));
			
		}
				
		/**
		 * Update widget form
		 * @return array
		 */
		public function thz_core_widget_update_callback ( $instance, $new_instance) {

			$instance['thz_wi_id'] 		= $new_instance['thz_wi_id'];
			$instance['thz_wi_class'] 	= $new_instance['thz_wi_class'];
									
			return $instance;
		}

		/**
		 * Replace widget ID or add class
		 * @return object
		 */		
		public function thz_core_widget_display_callback ( $instance, $widget, $args ) {
			
			$id_changed 	= false;
			$class_changed 	= false;
			
			if(isset($instance['thz_wi_id']) && $instance['thz_wi_id'] !=''){
				
				$widget_id = $widget->id;
				$new_id = $instance['thz_wi_id'];
				$args['before_widget'] = str_replace($widget_id, "{$new_id}", $args['before_widget']);
				$id_changed = true;
			}
						
			if(isset($instance['thz_wi_class']) && $instance['thz_wi_class'] !=''){
				
				$classname = $widget->widget_options['classname'];
				$add_class = $instance['thz_wi_class'];
				$args['before_widget'] = str_replace($classname, "{$classname} {$add_class}", $args['before_widget']);
				$class_changed = true;
			
			}
			
			if( $id_changed || $class_changed){
				
				$widget->widget($args, $instance);
				return false;
				
			}else{
				return  $instance;
			}

		}
				
		/**
		 * Load render
		 * @return string
		 */	
		public function thz_core_backend_render($file_path, $view_variables = array(), $return = true) {
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

	}
}

add_action( 'plugins_loaded', array( 'ThzCore_Plugin', 'get_instance' ) );
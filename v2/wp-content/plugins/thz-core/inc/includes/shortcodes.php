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
 * Return current year
 * within span tag
 * @since   1.0.6
 */	
if ( ! function_exists( 'thz_shortcode_current_year' ) ) {	
	
	function thz_shortcode_current_year(){
		
		return '<span class="thz-current-year">'.( Date( "Y" ) ).'</span>';
	}
}

add_shortcode( 'thz_current_year', 'thz_shortcode_current_year');


/**
 * Return current page title
 * @since   1.1.11
 */	
if ( ! function_exists( 'thz_shortcode_get_page_title' ) ) {	

	function thz_shortcode_get_page_title() {
	
		$title ='';
		
		if ( class_exists( 'Breadcrumbs_Builder' ) ) {
	
			$build_breadcrumbs = new Breadcrumbs_Builder;
			if( isset($build_breadcrumbs->settings['labels']) ){
				$build_breadcrumbs->settings['labels']	= fw_get_db_ext_settings_option('breadcrumbs');
			}
			$get_breadcrumbs   = $build_breadcrumbs->get_breadcrumbs();
			$current           = end( $get_breadcrumbs );
			$title           	= $current['name'];
	
		}else{
						
		  if (is_home()) {
			  
			if (get_option('page_for_posts', true)) {
			  $title = get_the_title(get_option('page_for_posts', true));
			} else {
			 $title = __('Latest Posts', 'thz-core');
			}
			
		  } elseif (is_archive()) {
			
			$term = get_term_by('slug', get_query_var('term'), get_query_var('taxonomy'));
			
			if ($term) {
				
			 $title = $term->name;
			 
			} elseif (is_post_type_archive()) {
				
			  $title = get_queried_object()->labels->name;
			  
			} elseif (is_day()) {
				
			  $title = sprintf(__('Daily Archives: %s', 'thz-core'), get_the_date());
			  
			} elseif (is_month()) {
				
			  $title = sprintf(__('Monthly Archives: %s', 'thz-core'), get_the_date('F Y'));
			  
			} elseif (is_year()) {
				
			  $title = sprintf(__('Yearly Archives: %s', 'thz-core'), get_the_date('Y'));
			  
			} elseif (is_author()) {
				
			  $author 	= get_queried_object();
			  $title 	=  sprintf(__('Author Archives: %s', 'thz-core'), $author->display_name);
			 
			} else {
			  $title = get_single_cat_title();
			}
			
		  } elseif (is_search()) {
			  
			$title = sprintf(__('Searching for: %s', 'thz-core'), get_search_query());
			
		  } elseif (is_404()) {
			  
			$title = __('Nothing Found', 'thz-core');
			
		  } else {
			  
			$title = get_the_title();
			
		  }	
		}
		
		return $title;
	}
}


add_shortcode( 'thz_get_page_title','thz_shortcode_get_page_title');
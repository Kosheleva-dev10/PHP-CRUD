<?php if (!defined('FW')) die('Forbidden');

/*
	custom css for section slider

*/
if(!function_exists('_thz_sections_slider_css')){
	
	function _thz_sections_slider_css($data) {
	
		$atts 					= _thz_shortcode_options($data,'sections_slider');
		$id 					= thz_akg('id',$atts);
		$css_id 				= thz_akg('cmx/i',$atts);
		$id_out					= !empty($css_id) ? str_replace(' ','',$css_id): 'thz-sections-slider-'.$id;
		$add_css 				= '';
	
		// boxstyle
		$section_box_style 	   		= thz_akg('bs',$atts);
		$section_boxstyle_print		= thz_print_box_css(thz_akg('bs',$atts));
		
		if(!empty($section_boxstyle_print)){
			$add_css .= '#'.$id_out.' > .thz-sections-slider-holder {'.$section_boxstyle_print.'}';
			
			$z_index = thz_akg('layout/z-index',$section_box_style);
			
			if($z_index && $z_index !='auto'){
				$add_css .= '#'.$id_out.'{';
				$add_css .=	'z-index:'.(int) $z_index.';';
				$add_css .=	'}';
			}
		}

		// background layers
		$background_layers			= thz_akg('bl',$atts); 
		if(!empty($background_layers)){
			
			$add_css .= thz_background_layers_css($background_layers);
		}
		
		// navigations
		$nav_ar	  = thz_akg('nav',$atts,null);
		$arr_ar	  = thz_akg('arr',$atts,null);
		$add_css .= _thz_slider_navigations_css($nav_ar,$arr_ar,'#thz-ses-'.$id.'.thz-slick-slider');

		if(!empty($add_css)){
			Thz_Doc::set( 'cssinhead', $add_css );
		}
	
	
	
	}
	add_action('fw_ext_shortcodes_enqueue_static:sections_slider','_thz_sections_slider_css');

}
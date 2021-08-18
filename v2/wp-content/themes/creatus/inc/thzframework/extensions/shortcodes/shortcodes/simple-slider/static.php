<?php if (!defined('FW')) die('Forbidden');


if(!function_exists('_thz_simple_slider_css')){
	
	function _thz_simple_slider_css ($data) {

		$atts 				= _thz_shortcode_options($data,'simple_slider');
		$id 				= thz_akg('id',$atts);
		$css_id 			= thz_akg('cmx/i',$atts);
		$id_out				= !empty($css_id) ? str_replace(' ','',$css_id): 'thz-simple-slider-'.$id;
		$slider_show    	= thz_akg('slider/show',$atts,null);
		$slider_space   	= thz_akg('slider/space',$atts,null);
		$slider_vertical	= thz_akg('san/vertical',$atts,null);
		$bs					= thz_print_box_css(thz_akg('bs',$atts));
		$add_css			='';

		if($bs !=''){
			$add_css .= '#'.$id_out.'.thz-slick-holder.thz-shc{';
			$add_css .= $bs;
			$add_css .='}';
		}
		
		if($slider_show > 1){

			$add_css .= thz_slick_multiple_css('#'.$id_out, $slider_show, $slider_space, $slider_vertical );

		}

			
		if($add_css !=''){
			Thz_Doc::set( 'cssinhead', $add_css );
		}
		
	}
	
	add_action('fw_ext_shortcodes_enqueue_static:simple_slider','_thz_simple_slider_css');
}
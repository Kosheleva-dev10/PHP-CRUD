<?php if (!defined('FW')) die('Forbidden');

/*
	custom css for parse shortcode

*/
if(!function_exists('_thz_parse_shortcode_css')){
	
	function _thz_parse_shortcode_css ($data) {
	
		$atts 					= _thz_shortcode_options($data,'parse_shortcode');
		$id						= thz_akg('id',$atts);
		$css_id 				= thz_akg('cmx/i',$atts);
		$id_out					= !empty($css_id) ? str_replace(' ','',$css_id): 'thz-parse-shortcode-block-'.$id; 
		$add_css 				= '';
		$bs						= thz_print_box_css(thz_akg('bs',$atts));

		if($bs !=''){

			$add_css .= '#'.$id_out.'.thz-parse-shortcode-block.thz-shc{';
			$add_css .= $bs;
			$add_css .='}';
	
			Thz_Doc::set( 'cssinhead', $add_css );
		}
	}
	
	add_action('fw_ext_shortcodes_enqueue_static:parse_shortcode','_thz_parse_shortcode_css');

}
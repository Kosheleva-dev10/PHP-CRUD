<?php if (!defined('FW')) die('Forbidden');
/*
	custom css for typist

*/
if(!function_exists('_thz_typist_css')){
	
	function _thz_typist_css ($data) {
	
		$atts 		= _thz_shortcode_options($data,'typist');
		$id 		= thz_akg('id',$atts);
		$css_id 	= thz_akg('cmx/i',$atts);
		$id_out		= !empty($css_id) ? str_replace(' ','',$css_id): 'thz-typist-'.$id;
		$font		= thz_akg('font',$atts,null);  
		$bs			= thz_print_box_css(thz_akg('bs',$atts));
		$add_css	= '';

		if($bs !=''){
			$add_css .= '#'.$id_out.'.thz-typist-container.thz-shc{';
			$add_css .= $bs;
			$add_css .='}';
		}
				
		$add_css .= '#'.$id_out.' .thz-typist-holder{';
		$add_css .=  thz_typo_css($font);
		$add_css .= '}';
		
		$gr_css	= _thz_gradient_text_css(thz_akg('gr',$atts));
			
		if($gr_css){
			
			$add_css .='#'.$id_out.' .thz-gradient-text{';
			$add_css .= $gr_css;
			$add_css .='}';
			
			$add_css .='#'.$id_out.' .thz-gradient-text .typed-cursor{';
			$add_css .= '-webkit-text-fill-color: '.thz_akg('gr/color2',$atts).';';
			$add_css .= 'text-fill-color: transparent: '.thz_akg('gr/color2',$atts).';';
			$add_css .='}';
		}
			
		if(!empty($add_css)){
			Thz_Doc::set( 'cssinhead', $add_css );
		}
		
	}
	
	add_action('fw_ext_shortcodes_enqueue_static:typist','_thz_typist_css');
}
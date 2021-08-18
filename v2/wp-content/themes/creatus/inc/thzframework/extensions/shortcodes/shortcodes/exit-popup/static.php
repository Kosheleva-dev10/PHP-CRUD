<?php if (!defined('FW')) die('Forbidden');
/*
	custom css for exit popup

*/
if(!function_exists('_thz_exit_popup_css')){
	
	function _thz_exit_popup_css ($data) {
	
		$atts 					= _thz_shortcode_options($data,'exit_popup');
		$id						= thz_akg('id',$atts);
		$css_id 				= thz_akg('cmx/i',$atts);
		$id_out					= !empty($css_id) ? str_replace(' ','',$css_id): 'thz-popupid-'.$id; 
		$add_css 				= '';
		$bs						= thz_print_box_css(thz_akg('bs',$atts));
		$cbc					= thz_akg('cb_mx/c',$atts);
		$cbh					= thz_akg('cb_mx/h',$atts);
		$background_layers		= thz_akg('bl',$atts); 

		if($bs !=''){
			$add_css .= '#'.$id_out.'{';
			$add_css .= $bs;
			$add_css .='}';
		}
		if($cbc !=''){
			$add_css .= '#'.$id_out.' .mfp-close{';
			$add_css .= 'color:'.$cbc.';';
			$add_css .='}';
		}
		
		if($cbh !=''){
			$add_css .= '#'.$id_out.' .mfp-close:hover{';
			$add_css .= 'color:'.$cbh.';';
			$add_css .='}';
		}


		if(!empty($background_layers)){
			$add_css .= thz_background_layers_css($background_layers);
		}
				
		if(!empty($add_css)){
			Thz_Doc::set( 'cssinhead', $add_css );
		}
	}
	
	add_action('fw_ext_shortcodes_enqueue_static:exit_popup','_thz_exit_popup_css');
}
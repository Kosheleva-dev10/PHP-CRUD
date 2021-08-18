<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}


if ( ! is_admin() ) {

	if(!function_exists('_thz_magnific_popup_css')){
		
		function _thz_magnific_popup_css ($data) {
		
			$atts 		= _thz_shortcode_options($data,'magnific_popup');
			$instyle	= thz_akg('instyle',$atts);
			
			if( $instyle !=''){
				return;
			}
			
			$id 		= thz_akg('id',$atts);
			$css_id 	= thz_akg('cmx/i',$atts);
			$fnot		= ':not(#♥)';
			$id_out		= !empty($css_id) ? str_replace(' ','',$css_id).$fnot: 'thz-magnific-popup-'.$id.$fnot;
			$bs			= thz_print_box_css(thz_akg('bs',$atts));
			$tbs		= thz_print_box_css(thz_akg('tbs',$atts));
			$add_css 	= '';
			
			
			if($bs !=''){
				$add_css .= '.thz-mfp-'.$id_out.'.thz-magnific-container.thz-shc{';
				$add_css .= $bs;
				$add_css .='}';
			}
			
			if($tbs !=''){
				$add_css .= '.thz-mfp-'.$id_out.' .thz-mfp-shortcode{';
				$add_css .= $tbs;
				$add_css .='}';
			}
					
			if(!empty($add_css)){
				Thz_Doc::set( 'cssinhead', $add_css );
			}
		}
		
		add_action('fw_ext_shortcodes_enqueue_static:magnific_popup','_thz_magnific_popup_css');
	}
	
}
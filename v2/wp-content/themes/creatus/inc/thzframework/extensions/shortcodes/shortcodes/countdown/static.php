<?php if (!defined('FW')) die('Forbidden');

/*
	custom css for countdown

*/
if(!function_exists('_thz_countdown_css')){
	
	function _thz_countdown_css ($data) {
	
		$atts 				= _thz_shortcode_options($data,'countdown');
		$id 				= thz_akg('id',$atts);
		$css_id 			= thz_akg('cmx/i',$atts);
		$id_out				= !empty($css_id) ? str_replace(' ','',$css_id): 'thz-countdown-holder-'.$id;
		$date_numbers_font	= thz_typo_css( thz_akg('date_numbers_font',$atts) );
		$date_text_font		= thz_typo_css( thz_akg('date_text_font',$atts) );
		
		$container_bs		= thz_print_box_css( thz_akg('bs',$atts) );
		$countdown_bs		= thz_print_box_css( thz_akg('cbs',$atts) );
		$date_bs			= thz_print_box_css( thz_akg('dbs',$atts) );
		$number_bs			= thz_print_box_css( thz_akg('nbs',$atts) );
		$text_bs			= thz_print_box_css( thz_akg('tbs',$atts) );
		
		$spacer_settings	= thz_akg('spacer_settings',$atts);
		$spacer_nudge		= thz_akg('nudge',$spacer_settings);
		$spacer_space		= thz_akg('space',$spacer_settings);
		$spacer_color		= thz_akg('color',$spacer_settings);
		
		$add_css 			= '';
		
		if( $container_bs !='' ){
			$add_css .= '#'.$id_out	.'.thz-countdown-holder.thz-shc{'.$container_bs.'}';
		}
		
		if( $countdown_bs !='' ){
			$add_css .= '#'.$id_out	.' .thz-countdown{'.$countdown_bs.'}';
		}
		
		if( $date_bs !='' ){
			$add_css .= '#'.$id_out	.' .thz-cd-cell{'.$date_bs.'}';
		}
		
		$add_css .= '#'.$id_out	.' .thz-cd-numbers{'.$date_numbers_font.$number_bs.'}';
		$add_css .= '#'.$id_out	.' .thz-cd-text{'.$date_text_font.$text_bs.'}';
		
		if($spacer_nudge !== 0 || $spacer_space > 100 || $spacer_color !=''){
			$add_css .= '#'.$id_out	.' .thz-cd-sep{';
			if($spacer_nudge !== 0){
				$add_css .='top:'.thz_property_unit( $spacer_nudge,'px').';';
			}
			if($spacer_space > 100){
				$add_css .='width:'.thz_property_unit( $spacer_space,'px').';';
			}
			if($spacer_color !=''){
				$add_css .='color:'.$spacer_color.';';
			}
			$add_css .='}';
		}

		if($add_css  !=''){
			Thz_Doc::set( 'cssinhead', $add_css );
		}
	}
	
	add_action('fw_ext_shortcodes_enqueue_static:countdown','_thz_countdown_css');

}
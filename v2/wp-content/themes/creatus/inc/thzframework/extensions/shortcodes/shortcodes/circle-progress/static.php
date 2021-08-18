<?php if (!defined('FW')) die('Forbidden');

/*
	custom css for circle progress

*/
if(!function_exists('_thz_circle_progress_css')){
	
	function _thz_circle_progress_css ($data) {
	
		$atts 				= _thz_shortcode_options($data,'circle_progress');
		$id 				= thz_akg('id',$atts);
		$css_id 			= thz_akg('cmx/i',$atts);
		$id_out				= !(empty($css_id)) ? $css_id : 'thz-circle-progress-'.$id;
		$box_model 			= thz_akg('box_style',$atts);
		$progress			= thz_akg('progress',$atts);
		$progress_size		= esc_attr ( thz_akg('size',$progress));
		$box_style			= thz_akg('box_style',$atts);
		$progress_value_type = thz_akg('progress_value/picked',$atts);
		
		
		$outer_background	= thz_akg('outer_background',$atts);
		$outer_settings		= thz_akg('outer_settings',$atts);
		$outer_padding		= thz_akg('padding',$outer_settings);
		$outer_border_size	= esc_attr( thz_akg('border_size',$outer_settings));
		$outer_border_style	= thz_akg('border_style',$outer_settings);
		$outer_border_color	= esc_attr( thz_akg('border_color',$outer_settings));
		
		
		
		$inner_background	= thz_akg('inner_background',$atts);
		$inner_border		= thz_akg('inner_border',$atts);
		$inner_border_size	= esc_attr( thz_akg('border_size',$inner_border));
		$inner_border_style	= thz_akg('border_style',$inner_border);
		$inner_border_color	= esc_attr( thz_akg('border_color',$inner_border));
		
		$title_settings 	= thz_akg('title_settings',$atts);
		$text_settings 		= thz_akg('text_settings',$atts);
		
		
		$title_separator	= thz_akg('title_separator',$atts);
		$separator_width	= esc_attr( thz_akg('width',$title_separator));
		$separator_height	= esc_attr( thz_akg('height',$title_separator));
		$separator_margin	= esc_attr( thz_akg('margin',$title_separator));
		$separator_color	= esc_attr( thz_akg('color',$title_separator));
		
		
		$title_color 		= esc_attr( thz_akg('color',$title_settings));
		$text_color 		= esc_attr( thz_akg('color',$text_settings));

		
		
		
		$add_css = '';
		
		if(thz_print_box_css($box_style) !=''){
			$add_css .= '#'.$id_out.'.thz-circle-progress-holder.thz-shc{';
			$add_css .= thz_print_box_css($box_style);
			$add_css .='}';	
		}
		
		if(thz_print_box_css($outer_background) !='' || $outer_padding > 0){
			$add_css .= '#'.$id_out.' .thz-circle-progress{';
			$add_css .= thz_print_box_css($outer_background);
			if($outer_padding > 0 ){
				$add_css .= 'padding:'.$outer_padding.'px;';
			}
			$add_css .='}';
		}
		
		if($outer_border_size > 0 && $outer_border_color !=''){
			$add_css .= '#'.$id_out.' .thz-circle-progress:after{';
			$add_css .= 'border:'.$outer_border_size.'px '.$outer_border_style.' '.$outer_border_color.';';
			$add_css .='}';		
		}
		
		
		
		$add_css .= '#'.$id_out.' .thz-circle-progress-inner{';
		$add_css .= thz_print_box_css($inner_background);
		$add_css .='width:'.$progress_size.'px;';
		$add_css .='height:'.$progress_size.'px;';
		$add_css .='}';
		
		
		if($inner_border_size > 0 && $inner_border_color !=''){
			$add_css .= '#'.$id_out.' .thz-circle-progress-inner:after{';
			$add_css .= 'border:'.$inner_border_size.'px '.$inner_border_style.' '.$inner_border_color.';';
			$add_css .='}';		
		}

		
		
		if($progress_value_type == 'percent'){
			$percent_settings = thz_akg('progress_value/percent/percent_settings',$atts);
			$percent_color = thz_akg('color',$percent_settings);
			
			if($percent_color !=''){
				
				$add_css .= '#'.$id_out.' .thz-circle-progress-value,';
				$add_css .= '#'.$id_out.' .thz-circle-progress-unit{';
				$add_css .= 'color:'.$percent_color.';';
				$add_css .='}';			
			}
			
		}

		
		if($progress_value_type == 'text'){
			
			$percent_text_settings 	= thz_akg('progress_value/text/text_settings',$atts);
			$icon_settings			= thz_akg('progress_value/text/icon_settings',$atts);
			$icon_color 			= esc_attr( thz_akg('color',$icon_settings));
			$percent_text_color 	= esc_attr( thz_akg('color',$percent_text_settings));			
			
			if($icon_color !=''){
				$add_css .= '#'.$id_out.' .thz-circle-progress .thz-circle-progress-icon{';
				$add_css .= 'color:'.$icon_color.';';
				$add_css .='}';		
			}
			
			if($percent_text_color !=''){
				$add_css .= '#'.$id_out.' .thz-circle-progress .thz-circle-progress-value-text{';
				$add_css .= 'color:'.$percent_text_color.';';
				$add_css .='}';		
			}
		}
		
		if($title_color !=''){
			
			$add_css .= '#'.$id_out.' .thz-circle-progress-title{';
			$add_css .= 'color:'.$title_color.';';
			$add_css .='}';			
		}
		
		
		if($text_color !=''){
			
			$add_css .= '#'.$id_out.' .thz-circle-progress-text{';
			$add_css .= 'color:'.$text_color.';';
			$add_css .='}';			
		}

		if($separator_height > 0){
			
			$add_css .= '#'.$id_out.' .thz-circle-progress-title:after{';
			$add_css .= 'width:'.thz_property_unit( $separator_width ,'px').';';
			$add_css .= 'height:'.thz_property_unit ( $separator_height ,'px' ).';';
			$add_css .= 'margin-top:'.$separator_margin.'px;';
			if($separator_color !=''){
				$add_css .= 'background:'.$separator_color.';';
			}
			$add_css .='}';				
		}			
		
		if($add_css  !=''){
			Thz_Doc::set( 'cssinhead', $add_css );
		}
	}
	
	add_action('fw_ext_shortcodes_enqueue_static:circle_progress','_thz_circle_progress_css');

}
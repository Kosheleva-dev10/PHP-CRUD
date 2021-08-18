<?php if (!defined('FW')) die('Forbidden');
/*
	custom css for counter

*/
if(!function_exists('_thz_counter_css')){
	
	function _thz_counter_css ($data) {
	
		$atts 				= _thz_shortcode_options($data,'counter');
		$id 				= thz_akg('id',$atts);
		$css_id 			= thz_akg('cmx/i',$atts);
		$id_out				= !empty($css_id) ? str_replace(' ','',$css_id): 'thz-counter-'.$id;
		$box_style 			= thz_print_box_css(thz_akg('box_style',$atts));

		$unit_type			= thz_akg('unit_mx/ty',$atts); 
		$unit				= $unit_type == 'textual' ? thz_akg('unit_mx/t',$atts) : thz_akg('unit_mx/i',$atts);
		$unit_size			= thz_akg('unit_mx/s',$atts);
		$unit_space			= thz_akg('unit_mx/sp',$atts);
		$unit_color			= thz_akg('unit_mx/c',$atts);
		$unit_position		= thz_akg('unit_mx/p',$atts);
		
		$text_align			= thz_akg('f/align',$atts);
		
		$add_css = '';
		
		if( $box_style !=''){
			$add_css .= '#'.$id_out.'.thz-counter.thz-shc{';
			$add_css .= $box_style;
			$add_css .='}';
		}
		
		if($text_align =='left'){
			$add_css .= '#'.$id_out.' .thz-counter-count-to,';
			$add_css .= '#'.$id_out.' .thz-counter-unit-top .thz-counter-unit{';
			$add_css .= 'margin:0;';
			$add_css .= 'text-align:left;';
			$add_css .='}';				
		}
		
		if($text_align =='right'){
			$add_css .= '#'.$id_out.' .thz-counter-count-to,';
			$add_css .= '#'.$id_out.' .thz-counter-unit-top .thz-counter-unit{';
			$add_css .= 'margin:0 0 0 auto;';
			$add_css .= 'text-align:right;';
			$add_css .='}';				
		}
		

		$add_css .= '#'.$id_out.' .thz-counter-count{';
		$add_css .= thz_typo_css(thz_akg('f',$atts));
		$add_css .='}';	
		
		if($unit !=''){
			$add_css .= '#'.$id_out.' .thz-counter-unit{';
			$add_css .= 'font-size:'.thz_property_unit($unit_size,'px').';';
			if($unit_color !=''){
				$add_css .= 'color:'.$unit_color.';';
			}
			
			if($unit_position =='top'){
				$add_css .='margin-bottom:'.thz_property_unit($unit_space,'px').';';
			}
			$add_css .='}';	
		}


		if($add_css  !=''){
			Thz_Doc::set( 'cssinhead', $add_css );
		}
	}
	
	add_action('fw_ext_shortcodes_enqueue_static:counter','_thz_counter_css');

}
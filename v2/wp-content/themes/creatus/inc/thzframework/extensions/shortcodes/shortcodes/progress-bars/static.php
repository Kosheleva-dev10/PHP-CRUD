<?php if (!defined('FW')) die('Forbidden');

/*
	custom css for progress bars

*/

if(!function_exists('_thz_progress_bars_css')){
	
	function _thz_progress_bars_css ($data) {
	
		$atts 				= _thz_shortcode_options($data,'progress_bars');
		$id 				= thz_akg('id',$atts);
		$css_id 			= thz_akg('cmx/i',$atts);
		$id_out				= !empty($css_id) ? str_replace(' ','',$css_id): 'thz-progress-bars-'.$id;
		$progressbars		= thz_akg('progressbars',$atts);
		$cbs				= thz_print_box_css(thz_akg('cbs',$atts));

		$add_css = '';

		if($cbs !=''){
			$add_css .= '#'.$id_out.'.thz-progress-bars-set.thz-shc{';
			$add_css .= $cbs;
			$add_css .='}';
		}		

		if(!empty($progressbars)){
			foreach($progressbars as $bar){
					
					$barid = $bar['id'];
					$progress_holder_box_style = $bar['phbs'];
					$progress_box_style		   = $bar['pbs'];
					$title_color   			   = esc_attr ( $bar['tic']);
					$percent_color   		   = esc_attr( $bar['pec'] );
					
					
					$add_css .= '#thz-progress-bar-'.$barid.'{';
					$add_css .= thz_print_box_css($progress_holder_box_style);
					$add_css .='}';
					
					$add_css .= '#thz-progress-bar-'.$barid.' .thz-progress-bar-progress{';
					$add_css .= thz_print_box_css($progress_box_style);
					$add_css .='}';
					
					if($title_color !=''){
						$add_css .= '#'.$id_out.' .thz-pbt-'.$barid.'{';
						$add_css .= 'color:'.$title_color.';';
						$add_css .='}';
					}
					if($percent_color !=''){
						$add_css .= '#'.$id_out.' .thz-pbp-'.$barid.'{';
						$add_css .= 'color:'.$percent_color.';';
						$add_css .='}';
					}
				
			}
		}
		
		
		
		if($add_css  !=''){
			Thz_Doc::set( 'cssinhead', $add_css );
		}
	}
	
	add_action('fw_ext_shortcodes_enqueue_static:progress_bars','_thz_progress_bars_css');

}
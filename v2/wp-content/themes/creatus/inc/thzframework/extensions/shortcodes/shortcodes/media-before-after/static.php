<?php if (!defined('FW')) die('Forbidden');
/*
	custom css for before after

*/

if(!function_exists('_thz_media_before_after_css')){
	
	function _thz_media_before_after_css ($data) {
	
		$atts 			= _thz_shortcode_options($data,'media_before_after');
		$id 			= thz_akg('id',$atts);
		$css_id 		= thz_akg('cmx/i',$atts);
		$id_out			= !empty($css_id) ? str_replace(' ','',$css_id): 'thz-before-after-'.$id;

		$add_css		= '';
		$bs 			= thz_print_box_css( thz_akg('bs',$atts,null));
		$handle			= thz_akg('mx/handle',$atts,null);
		$arrows			= thz_akg('mx/arrows',$atts,null);
		$orientation	= thz_akg('mx/orientation',$atts,null);

		if(!empty($bs)){
			$add_css .= '#'.$id_out.'.thz-before-after-container.thz-shc{'.$bs.'}';
		}		
		
		if($handle !=''){
			$add_css	.= '#'.$id_out.' .twentytwenty-handle{';
			$add_css	.='border-color:'.$handle.';';
			$add_css	.='background:'.$handle.';';
			$add_css	.='}';
			
			$add_css	.= '#'.$id_out.' .twentytwenty-handle:before,';
			$add_css	.= '#'.$id_out.' .twentytwenty-handle:after{';
			$add_css	.='background:'.$handle.';';
			$add_css	.='}';
		}
		
		if($arrows !=''){
			
			if('vertical' == $orientation){
			
				$add_css	.= '#'.$id_out.' .twentytwenty-up-arrow{';
				$add_css	.='border-bottom-color:'.$arrows.';';
				$add_css	.='}';
				
				$add_css	.= '#'.$id_out.' .twentytwenty-down-arrow{';
				$add_css	.='border-top-color:'.$arrows.';';
				$add_css	.='}';
			
			}else{
			
				$add_css	.= '#'.$id_out.' .twentytwenty-left-arrow{';
				$add_css	.='border-right-color:'.$arrows.';';
				$add_css	.='}';
				
				$add_css	.= '#'.$id_out.' .twentytwenty-right-arrow{';
				$add_css	.='border-left-color:'.$arrows.';';
				$add_css	.='}';
				
			}
		}

		if($add_css !=''){
			Thz_Doc::set( 'cssinhead', $add_css );
		}
		
	}
	
	add_action('fw_ext_shortcodes_enqueue_static:media_before_after','_thz_media_before_after_css');
}
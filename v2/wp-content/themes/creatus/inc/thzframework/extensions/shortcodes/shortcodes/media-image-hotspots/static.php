<?php if (!defined('FW')) die('Forbidden');
/*
	custom css for image

*/

if(!function_exists('_thz_media_image_hotspots_css')){
	
	function _thz_media_image_hotspots_css ($data) {
	
		$atts 			= _thz_shortcode_options($data,'media_image_hotspots');
		$id 			= thz_akg('id',$atts);
		$css_id 		= thz_akg('cmx/i',$atts);
		$id_out			= !empty($css_id) ? str_replace(' ','',$css_id): 'thz-hotspots-'.$id;

		$add_css		= '';
		$bs 			= thz_print_box_css( thz_akg('bs',$atts,null));
		$hotspots  		= thz_akg('hotspots/hotspots',$atts,null); 
		
		$gbg 			= thz_akg('mx/gbg',$atts);
		$gmark 			= thz_akg('mx/gmark',$atts);
		$ghalo 			= thz_akg('mx/ghalo',$atts);
		
		if(!empty($bs)){
			$add_css .= '#'.$id_out.'.thz-hotspots-container.thz-shc{'.$bs.'}';
		}		
		
		if($gbg !='' || $gmark !=''){

			$add_css	.= '#'.$id_out.' .thz-hotspot-mark{';
			if($gbg !=''){
				$add_css	.='background:'.$gbg.';';
			}
			if($gmark !=''){
				$add_css	.='color:'.$gmark.';';
			}
			$add_css	.='}';
			
		}
		if($ghalo !=''){
			$add_css	.= '#'.$id_out.' .thz-hotspot-halo{';
			$add_css	.='background:'.$ghalo.';';
			$add_css	.='}';
		}
		
		$add_css .= thz_get_hotspots(array('hotspots'=> $hotspots),true,'#'.$id_out);
		
		if($add_css !=''){
			Thz_Doc::set( 'cssinhead', $add_css );
		}
		
	}
	
	add_action('fw_ext_shortcodes_enqueue_static:media_image_hotspots','_thz_media_image_hotspots_css');
}
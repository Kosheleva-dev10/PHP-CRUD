<?php if (!defined('FW')) die('Forbidden');
/*
	custom css for divider

*/
if(!function_exists('_thz_social_links_css')){
	
	function _thz_social_links_css ($data) {
	
		$atts 			= _thz_shortcode_options($data,'social_links');
		$id				= thz_akg('id',$atts);
		$css_id 		= thz_akg('cmx/i',$atts);
		$id_out			= !empty($css_id) ? str_replace(' ','',$css_id): 'thz-socials-shortcode-'.$id;
		$links			= thz_akg('links',$atts,null);
		$metrics		= thz_akg('im',$atts,null);
		$space			= thz_akg('im/sp',$atts,20);
		$align			= thz_akg('im/a',$atts,'left');
		$class			= 'thz-socials-'.$id;
		$socials_css 	= thz_social_links_print($metrics,'ic',$class,true,false,$links); 
		$bs				= thz_print_box_css(thz_akg('bs',$atts));
		$add_css		= '';

		if($bs !=''){
			$add_css .= '#'.$id_out.'.thz-socials-shortcode.thz-shc{';
			$add_css .= $bs;
			$add_css .='}';
		}
				
		$add_css	.= '#'.$id_out.' .thz-social-links a{';
		if($align =='center'){
			$add_css	.= 'margin: 0 '.thz_property_unit(($space/2),'px').';';
		}elseif($align =='left'){
			$add_css	.= 'margin: 0 '.thz_property_unit($space,'px').' 0 0;';
		}else{
			$add_css	.= 'margin: 0 0 0 '.thz_property_unit($space,'px').';';
		}
		$add_css	.= '}';
		
		$add_css	.= $socials_css;
		
		Thz_Doc::set( 'cssinhead', $add_css );
		
	}
	
	add_action('fw_ext_shortcodes_enqueue_static:social_links','_thz_social_links_css');
}
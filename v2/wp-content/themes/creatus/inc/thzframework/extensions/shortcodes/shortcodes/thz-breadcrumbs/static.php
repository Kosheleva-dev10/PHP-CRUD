<?php if (!defined('FW')) die('Forbidden');
/*
	custom css for code snippet

*/
if(!function_exists('_thz_breadcrumbs_css')){
	
	function _thz_breadcrumbs_css ($data) {
	
		$atts 				= _thz_shortcode_options($data,'code_snippet');
		$id					= thz_akg('id',$atts);
		$css_id 			= thz_akg('cmx/i',$atts);
		$id_out				= !empty($css_id) ? str_replace(' ','',$css_id): 'thz-breadcrumbs-'.$id;
		$add_css 			= '';
		$bs					= thz_print_box_css(thz_akg('bs',$atts));
		$lbs				= thz_print_box_css(thz_akg('lbs',$atts));
		$breadcrumb_tc 		= thz_akg('colors/text',$atts,null);							
		$breadcrumb_lc 		= thz_akg('colors/link',$atts,null);
		$breadcrumb_hc 		= thz_akg('colors/hover',$atts,null);
		$breadcrumb_sep 	= thz_akg('colors/sep',$atts,null);
		$breadcrumb_font 	= thz_akg('font',$atts,null);
		
		if($bs !=''){
			$add_css .= '#'.$id_out.'.thz-breadcrumbs.thz-shc{';
			$add_css .= $bs;
			$add_css .='}';
		}

		$add_css .= '#'.$id_out.' .thz-breadcrumbs-links{';
		$add_css .= thz_typo_css($breadcrumb_font);
		if($lbs !=''){
			$add_css .= $lbs;
		}
		if($breadcrumb_tc !=''){
			$add_css .= 'color:'.$breadcrumb_tc .';';
		}
		$add_css .= '}';

		if($breadcrumb_lc !=''){
			$add_css .= '#'.$id_out.' .thz-breadcrumbs-links a{';
			$add_css .= 'color:'.$breadcrumb_lc .';';
			$add_css .= '}';	
		}
		
		if($breadcrumb_hc !=''){
			$add_css .= '#'.$id_out.' .thz-breadcrumbs-links a:hover{';
			$add_css .= 'color:'.$breadcrumb_hc .';';
			$add_css .= '}';	
		}
		
		if( $breadcrumb_sep !=''){
			
			$add_css .= '#'.$id_out.' .thz-breadcrumbs-separator{';
			$add_css .='color:'.esc_attr($breadcrumb_sep).';';
			$add_css .='}';	
			
		}
		
		if(!empty($add_css)){
			Thz_Doc::set( 'cssinhead', $add_css );
		}
	}
	
	add_action('fw_ext_shortcodes_enqueue_static:thz_breadcrumbs','_thz_breadcrumbs_css');
}
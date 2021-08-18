<?php if (!defined('FW')) die('Forbidden');

/*
	custom css for sharing_links

*/
if(!function_exists('_thz_sharing_links_css')){
	
	function _thz_sharing_links_css ($data) {
	
		$atts 			= _thz_shortcode_options($data,'sharing_links');
		$id				= thz_akg('id',$atts);
		$css_id 		= thz_akg('cmx/i',$atts);
		$id_out			= !empty($css_id) ? str_replace(' ','',$css_id): 'thz-post-share-'.$id;
		$icon_metrics 	= thz_akg('im',$atts,null); 
		$sl_f   		= thz_akg('sl/show/f',$atts,'');
		$add_css		= '';

		$postshares_bs 	   	 = thz_akg('bs',$atts,null);
		$postshares_bs_print = thz_print_box_css($postshares_bs);
		if(!empty($postshares_bs_print)){
			$add_css .= '#'.$id_out.'.thz-post-shares.thz-shc{'.$postshares_bs_print.'}';
		}
		
		$add_css .= thz_social_shares_css(false,'#'.$id_out.'.thz-post-shares',$icon_metrics);
		
		$show_sharing_label   = thz_akg('sl/picked',$atts,'show');
		
		if($show_sharing_label =='show'){
			
			$add_css .= '#'.$id_out.'.thz-post-shares .thz-post-share-label{';
			$add_css .=  thz_typo_css($sl_f);
			$add_css .= '}';
			
		}		
		
		Thz_Doc::set( 'cssinhead', $add_css );
		
	}
	
	add_action('fw_ext_shortcodes_enqueue_static:sharing_links','_thz_sharing_links_css');
}
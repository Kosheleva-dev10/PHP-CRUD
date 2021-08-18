<?php if (!defined('FW')) die('Forbidden');
/*
	custom css for accordion

*/
if(!function_exists('_thz_items_grid_shortcode_css')){
	
	function _thz_items_grid_shortcode_css ($data) {
	
		$atts 					= _thz_shortcode_options($data,'items_grid');
		$id						= thz_akg('id',$atts);
		$css_id 				= thz_akg('cmx/i',$atts);
		$id_out					= !empty($css_id) ? str_replace(' ','',$css_id): 'thz-items-grid-'.$id; 
		$bs						= thz_print_box_css(thz_akg('bs',$atts));
		$abs					= thz_print_box_css(thz_akg('abs',$atts));
		$aebs					= thz_print_box_css(thz_akg('aebs',$atts));
		
		$columns				= thz_akg('grid/columns',$atts,null);
		$gutter					= esc_attr( thz_akg('grid/gutter',$atts,null) );
		
		$add_css 				= '';

		if($bs !=''){
			$add_css .= '#'.$id_out.'.thz-items-grid-holder.thz-shc{';
			$add_css .= $bs;
			$add_css .='}';
		}
		
		if($abs !=''){
			$add_css .= '#'.$id_out.' .thz-grid-item-in{';
			$add_css .= $abs;
			$add_css .='}';
		}
		
		if($aebs !=''){
			$add_css .= '#'.$id_out.' .thz-grid-item-element{';
			$add_css .= $aebs;
			$add_css .='}';
		}
		
		$add_css .='#'.$id_out.' .thz-items-grid-row{';
		$add_css .='margin-left:-'.($columns > 1 ? $gutter : 0).'px;';
		$add_css .='}';
	
		$add_css .='#'.$id_out.' .thz-grid-item{';
		$add_css .='padding-left:'.($columns > 1 ? $gutter : 0).'px;';
		$add_css .='}';	

		$add_css .='#'.$id_out.' .thz-grid-item .thz-grid-item-in {';
		$add_css .='margin-bottom:'.$gutter.'px;';
		$add_css .='}';
		
		$add_css .='#'.$id_out.' .thz-items-gutter-adjust {';
		$add_css .='margin-bottom:-'.$gutter.'px;';
		$add_css .='}';

		
		if(!empty($atts['items'])){
			foreach ( $atts['items'] as $item ){
				
				$item_id 	= thz_akg('id',$item);
				$in_bs		= thz_print_box_css(thz_akg('bs',$item));
				$el_bs		= thz_print_box_css(thz_akg('ebs',$item));
				
				if($in_bs !=''){
					$add_css .= '#thz-grid-item-in-'.$item_id.'.thz-grid-item-in {';
					$add_css .= $in_bs;
					$add_css .='}';
				}
				
				if($el_bs !=''){
					$add_css .= '#thz-grid-item-in-'.$item_id.' .thz-grid-item-element {';
					$add_css .= $el_bs;
					$add_css .='}';
				}			
			}
		}
		
		if(!empty($add_css)){
			Thz_Doc::set( 'cssinhead', $add_css );
		}

	}
	
	add_action('fw_ext_shortcodes_enqueue_static:items_grid','_thz_items_grid_shortcode_css');
}
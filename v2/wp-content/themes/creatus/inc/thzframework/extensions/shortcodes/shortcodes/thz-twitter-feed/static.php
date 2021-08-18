<?php if (!defined('FW')) die('Forbidden');


if(!function_exists('_thz_twitter_feed_css')){
	
	function _thz_twitter_feed_css ($data) {

		$atts 				= _thz_shortcode_options($data,'thz_twitter_feed');
		$id 				= thz_akg('id',$atts);
		$css_id 			= thz_akg('cmx/i',$atts);
		$id_out				= !empty($css_id) ? str_replace(' ','',$css_id): 'thz-twitter-feed-'.$id;
		$slider_show    	= thz_akg('slider/show',$atts,null);
		$slider_space   	= thz_akg('slider/space',$atts,null);
		$slider_vertical	= thz_akg('san/vertical',$atts,null);
		$padding			= thz_akg('tm/padding',$atts,null);
		$bg	   				= thz_akg('tm/bg',$atts,null);
		$bo	   				= thz_akg('tm/bo',$atts,null);
		$br	   				= thz_akg('tm/br',$atts,null);
		$bw	   				= thz_akg('tm/bw',$atts,null);
		$arrow_show  		= thz_akg('tm/ar',$atts,'show-arrow');
		$info_side	  		= thz_akg('tm/info_side',$atts,'center');
		$bs					= thz_print_box_css(thz_akg('bs',$atts));
		$tbs				= thz_print_box_css(thz_akg('tbs',$atts));
		$layout_mode  		= thz_akg('layout_mode',$atts,'slider');
		$add_css			='';

		if($layout_mode == 'grid'){

			$columns		= thz_akg('grid/columns',$atts,null);
			$gutter			= thz_akg('grid/gutter',$atts,null);
			$columns_width 	= 33.33;
			if($columns){
				$columns_width 	= $columns == 0 ? 100 :  (100) / $columns ;
			}
				
			$add_css .='#'.$id_out.' .thz-items-grid{';
			$add_css .='margin-left:-'.($columns > 1 ? $gutter : 0).'px;';
			$add_css .='}';
		
			$add_css .='#'.$id_out.' .thz-grid-item{';
			$add_css .='padding-left:'.($columns > 1 ? $gutter : 0).'px;';
			$add_css .='}';	
		
			$add_css .='#'.$id_out.' .thz-grid-item-in{';
			$add_css .='margin-bottom:'.$gutter.'px;';
			$add_css .='}';
			$add_css .='#'.$id_out.' .thz-items-gutter-adjust{';
			$add_css .='margin-bottom:-'.$gutter.'px;';
			$add_css .='}';	
			
			
			$add_css .='#'.$id_out.' .thz-grid-item,#'.$id_out.' .thz-items-sizer {width:'.$columns_width.'%;}';
		
		}else{

			if($slider_show > 1){

				$add_css .= thz_slick_multiple_css( '#'.$id_out, $slider_show, $slider_space, $slider_vertical );
	
			}
			
			// navigations
			$nav_ar	  = thz_akg('nav',$atts,null);
			$arr_ar	  = thz_akg('arr',$atts,null);
			$add_css .= _thz_slider_navigations_css($nav_ar,$arr_ar,'#'.$id_out.' > .thz-slick-slider');
		}
		
		if($bs !=''){
			$add_css .= '#'.$id_out.'.thz-twitter-feed-holder.thz-shc{';
			$add_css .= $bs;
			$add_css .='}';
		}
		
		if($tbs !=''){
			$add_css .= '#'.$id_out.' .thz-tw-tweet{';
			$add_css .= $tbs;
			$add_css .='}';
		}

		$tf		= thz_akg('tf',$atts,null);
		$add_css .='#'.$id_out.' .thz-tw-tweet-quote{';
		$add_css .= thz_typo_css($tf);
		if($bg !=''){
			$add_css .='background:'.$bg.';';
		}
		if($bo !='' && $bw > 0){
			$add_css .='border:'.thz_property_unit($bw,'px').' solid '.$bo.';';
		}
		if($br > 0 ){
			$add_css .='border-radius:'.thz_property_unit($br,'px').';';
		}
		$add_css .='padding:'.thz_property_unit($padding,'px').';';
		$add_css .='}';	
		
		$add_css .='#'.$id_out.' .thz-tw-tweet-quote a,';
		$add_css .='#'.$id_out.' .thz-tw-tweet-quote a:hover{';
		$add_css .= thz_typo_css($tf);
		$add_css .='}';	
		
		if($arrow_show =='show-arrow'){
			
			$move = $bw >= 3 ? $bw - 1 : $bw;
			$add_css .='#'.$id_out.' .thz-tw-tweet-quote:after{';
			$add_css .= 'bottom:-'.(8 + $move).'px;';
			if($info_side =='center'){
				$add_css .='margin-left:-'.(8 + ($bw/2)).'px;';		
			}
			$add_css .='}';				
		}

		$uf		= thz_akg('uf',$atts,null);
		
		if(thz_typo_css($uf)){
			$add_css .='#'.$id_out.' .thz-tw-tweet-user{';
			$add_css .= thz_typo_css($uf);
			$add_css .='}';	
		}
		
		$lf		= thz_akg('lf',$atts,null);
		$lfa	= thz_akg('lf/color',$atts,null);
		$lfh	= thz_akg('lf/hovered',$atts,null);
		
		if(thz_typo_css($lf)){
			$add_css .='#'.$id_out.' .thz-tw-tweet-link{';
			$add_css .= thz_typo_css($lf);
			$add_css .='}';	
		}
		
		if($lfa !=''){
			$add_css .='#'.$id_out.' .thz-tw-tweet-link a{';
			$add_css .= 'color:'.$lfa.';';
			$add_css .='}';	
		}
		
		if($lfh !=''){
			$add_css .='#'.$id_out.' .thz-tw-tweet-link a:hover{';
			$add_css .= 'color:'.$lfh.';';
			$add_css .='}';	
		}
		
		// avatar 
		
		$avatar_type		= thz_akg('tm/av',$atts);
		
		if($avatar_type =='i'){
			
			$icon_size		= thz_akg('tm/as',$atts);
			$icon_color		= thz_akg('tm/ic',$atts);
			
			$add_css .='#'.$id_out.' .av-icon i{';
			$add_css .= 'font-size:'.thz_property_unit($icon_size,'px').';';
			if($icon_color !=''){
				$add_css .= 'color:'.$icon_color.';';
			}
			$add_css .='}';				
		}
		
		
		if($avatar_type =='u'){
			
			$avatar_size	= thz_akg('tm/as',$atts);
			
			$add_css .='#'.$id_out.' .av-image{';
			$add_css .= 'width:'.thz_property_unit($avatar_size,'px').';';
			$add_css .= 'height:'.thz_property_unit($avatar_size,'px').';';
			$add_css .='}';				
		}
		
			
		if($add_css !=''){
			Thz_Doc::set( 'cssinhead', $add_css );
		}
		
	}
	
	add_action('fw_ext_shortcodes_enqueue_static:thz_twitter_feed','_thz_twitter_feed_css');
}
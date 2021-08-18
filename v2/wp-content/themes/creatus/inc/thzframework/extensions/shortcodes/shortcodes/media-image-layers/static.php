<?php if (!defined('FW')) die('Forbidden');
/*
	custom css for image

*/

if(!function_exists('_thz_media_image_layers_css')){
	
	function _thz_media_image_layers_css ($data) {
	
		$atts 				= _thz_shortcode_options($data,'media_image_layers');
		$id 				= thz_akg('id',$atts);
		$css_id 			= thz_akg('cmx/i',$atts);
		$id_out				= !empty($css_id) ? str_replace(' ','',$css_id): 'thz-image-layers-'.$id;
		$med_over_bg 		= thz_akg('med_over/background',$atts,array());
		$over_mode			= thz_akg('over_mode',$atts,'thzhover');
		$distance			= thz_akg('distance',$atts,0);
		$con_box_style		= thz_print_box_css(thz_akg('con_bs',$atts,null));
		$l_con_bs			= thz_print_box_css(thz_akg('l_con_bs',$atts,null));
		$layers  			= thz_akg('l',$atts,array());
		$layers_arr			= $layers; 
		$add_css			= '';
		
		unset($layers_arr['c~s']);
		
		// container
		if(!empty($con_box_style)){
			$add_css .='#'.$id_out.'.thz-image-layers-container.thz-shc{';
			$add_css .= $con_box_style;
			$add_css .='}';
		}
		
		// layers container
		if(!empty($l_con_bs)){
			
			$height 		= thz_akg('l_con_bs/boxsize/height',$atts,null);
			$max_height 	= thz_akg('l_con_bs/boxsize/max-height',$atts,null);
			
			$add_css .='#'.$id_out.' .thz-image-layers{';
			$add_css .= $l_con_bs;
			$add_css .='}';
			
			if( $height || $max_height ){
				
				$container_size = thz_akg('l/c~s',$atts,'thz-ratio-1-1');
				$add_css .='#'.$id_out.' .thz-aspect.'.$container_size.'{';
				$add_css .= 'padding-bottom:0px;';
				if( $height ){
					$add_css .='height:'.thz_property_unit($height,'px').';';	
				}
				if( !$height && $max_height ){
					$add_css .='height:'.thz_property_unit($max_height,'px').';';	
				}
				$add_css .='}';				
			}
		}
		
		if($over_mode !='none'){
			if($over_mode =='thzhover'){
	
				$add_css .='#'.$id_out.' .thz-hover-mask{';
				$add_css .= _thz_media_overlay_background_css_print($med_over_bg).';';
				
				if($distance > 0){
					$add_css .='margin:'.thz_property_unit($distance,'px').';';
				}
				
				$add_css .='}';
				
				
			}else{
				
				$add_css .='#'.$id_out.' .thz-overlay-box{';
				$add_css .= _thz_media_overlay_background_css_print($med_over_bg).';';
				
				if($distance > 0){
					$add_css .='top:'.thz_property_unit($distance,'px').';';
					$add_css .='right:'.thz_property_unit($distance,'px').';';
					$add_css .='bottom:'.thz_property_unit($distance,'px').';';
					$add_css .='left:'.thz_property_unit($distance,'px').';';				
				}
				
				$add_css .='}';
				
				$add_css .='#'.$id_out.' .thz-hover-mask{';
				$add_css .='background:none;';
				$add_css .='}';				
			}
			
			// media element
			$show_media_el	= thz_akg('mi/picked',$atts,'show'); 
			
			if($show_media_el =='show'){
				$etype		= thz_akg('mi/show/etype',$atts,'icon');
				
				if('icon' == $etype ){
					$icon_co 	= thz_akg('mi/show/icon_metrics/co',$atts);
					$icon_bg 	= thz_akg('mi/show/iconbg_metrics/bg',$atts);
					$icon_bs 	= thz_akg('mi/show/iconbg_metrics/bs',$atts);
					$icon_bsi 	= thz_akg('mi/show/iconbg_metrics/bsi',$atts);
					$icon_bc 	= thz_akg('mi/show/iconbg_metrics/bc',$atts);
					$icon_fs 	= thz_akg('mi/show/icon_metrics/fs',$atts,16);
					
					if($icon_co !='' || $icon_bg !='' || ($icon_bsi > 0 && $icon_bc !='')){
						
						$add_css .='#'.$id_out.' .thz-hover-icon,';
						$add_css .='#'.$id_out.' .thz-hover-icon:focus{';
						if($icon_co !=''){
							$add_css .='color:'.esc_attr($icon_co).';';
						}
						if($icon_bg !=''){
							$add_css .='background:'.esc_attr($icon_bg).';';
						}
						if($icon_bsi > 0 && $icon_bc !=''){
							$add_css .='border:'.esc_attr($icon_bsi).'px '.esc_attr($icon_bs).' '.esc_attr($icon_bc).';';
						}
						$add_css .='}';	
						
						$add_css .='#'.$id_out.' .thz-hover-icon span{';
						$add_css .='width:'.thz_property_unit($icon_fs,'px').';';
						$add_css .='height:'.thz_property_unit($icon_fs,'px').';';	
						$add_css .='}';					
						
					}
				}else{
					
					$ehbs 	= thz_print_box_css(thz_akg('mi/show/ehbs',$atts));
					$tbs 	= thz_print_box_css(thz_akg('mi/show/tbs',$atts));
					$tf 	= thz_typo_css(thz_akg('mi/show/tf',$atts));
					$stbs 	= thz_print_box_css(thz_akg('mi/show/stbs',$atts));
					$stf 	= thz_typo_css(thz_akg('mi/show/stf',$atts));		
					
					
					if(!empty($ehbs)){
						$add_css .='#'.$id_out.' .thz-el-holder{';
						$add_css .= $ehbs;	
						$add_css .='}';							
					}
					
					if(!empty($tbs) || $tf != ''){
						
						$add_css .='#'.$id_out.' .thz-el-text{';
						if(!empty($tbs)){
							$add_css .= $tbs;	
						}
						if($tf != ''){
							$add_css .= $tf;	
						}
						$add_css .='}';							
					}
					
					if(!empty($stbs) || $stf != ''){
						
						$add_css .='#'.$id_out.' .thz-el-subtext{';
						if(!empty($stbs)){
							$add_css .= $stbs;	
						}
						if($stf != ''){
							$add_css .= $stf;	
						}
						$add_css .='}';							
					}
				}
	
				
			}
		}
		
		
		// layers
		if(!empty($layers_arr)){
			
			
			foreach( $layers_arr as $l_id => $layer ){
	
				$l_css_id 		= thz_akg('o/cmx/i',$layer);
				$l_id_out		= !empty($l_css_id) ? str_replace(' ','',$l_css_id): 'thz-img-layer-'.$l_id;	
				$instyle		= thz_akg('o/instyle',$layer);		
				$l_x 			= thz_akg('layer_data/x',$layer,null);
				$l_y 			= thz_akg('layer_data/y',$layer,null);
				$l_w 			= thz_akg('layer_data/w',$layer,null);
				$l_h 			= thz_akg('layer_data/h',$layer,null);
				$l_r 			= thz_akg('layer_data/r',$layer,null);
				$l_r			= $l_r == 0 ? '0.001' : $l_r;
				$l_z 			= thz_akg('layer_data/z',$layer,null);

				$transform = 'transform: rotate('.$l_r.'deg) translateZ(0);';
				
				$add_css .='#'.$id_out.' #'.$l_id_out.'{';
				$add_css .='left:'.thz_property_unit($l_x,'%').';';
				$add_css .='top:'.thz_property_unit($l_y,'%').';';
				$add_css .='width:'.thz_property_unit($l_w,'%').';';
				$add_css .='height:'.thz_property_unit($l_h,'%').';';
				$add_css .='z-index:'.esc_attr($l_z).';';
				$add_css .= thz_property_prefix( $transform );
				$add_css .='}';	
				
				if( empty( $instyle ) ){
					$l_bs = thz_print_box_css(thz_akg('o/bs',$layer,null));
					if(!empty($l_bs)){
						$add_css .='#'.$id_out.' .'.$l_id_out.' .thz-img-layer-in{';
						$add_css .= $l_bs;	
						$add_css .='}';	
					}
				}
									
				
			}
			
		}		
		
		if($add_css !=''){
			Thz_Doc::set( 'cssinhead', $add_css );
		}
		
	}
	
	add_action('fw_ext_shortcodes_enqueue_static:media_image_layers','_thz_media_image_layers_css');
}
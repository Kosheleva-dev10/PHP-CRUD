<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
/**
 * @var array $atts
 */
$layers  			= thz_akg('l',$atts,array()); 
$layers_arr			= $layers; 

unset($layers_arr['c~s']);

if(empty($layers_arr)){
	
	$n_title 	= esc_html__('Missing layers','creatus');
	$n_msg 		= esc_html__('Please go in shortcode settings and add few layers','creatus');
	thz_notify('yellow thz-shc',$n_title,$n_msg);
	return;	
}

$id 				= thz_akg('id',$atts);
$css_id 			= thz_akg('cmx/i',$atts);
$id_out				= !empty($css_id) ? str_replace(' ','',$css_id): 'thz-image-layers-'.$id;
$css_class 			= thz_akg('cmx/c',$atts);
$css_class			= $css_class !='' ? $css_class.' ':'';
$res_class			= _thz_responsive_classes(thz_akg('cmx',$atts));
$animate			= thz_akg('animate',$atts);
$animate_data		= thz_print_animation($animate);
$animation_class	= thz_print_animation($animate,true);
$cpx				= thz_akg('cpx',$atts);
$cpx_data			= thz_print_cpx($cpx);
$cpx_class			= thz_print_cpx($cpx,true);
$animate_parent		= thz_akg('animate',$animate) == 'active' ? ' thz-animate-parent ' :'';
$hover_bgtype		= thz_akg('med_over/background/type',$atts,'solid');
$hover_ef 			= thz_akg('med_over/oeffect',$atts,'thz-hover-fadein');
$hover_tr 			= thz_akg('med_over/oduration',$atts,'thz-transease-04');
$img_ef				= thz_akg('med_over/ieffect',$atts,'thz-img-zoomin');
$img_tr 			= thz_akg('med_over/iduration',$atts,'thz-transease-04');
$over_mode			= thz_akg('over_mode',$atts,'thzhover');
$show_media_el		= thz_akg('mi/picked',$atts,'show'); 
$mode_class			= 'thz-media-mode-'.$over_mode;
$holder_classes 	= array($css_class.'thz-shc thz-image-layers-container','thz-lightbox-gallery-simple',$mode_class.$animate_parent.$cpx_class.$res_class);
$aspect_ratio		= thz_akg('l/c~s',$atts,'thz-ratio-1-1'); 


if($show_media_el =='show'){
	$etype				= thz_akg('mi/show/etype',$atts,'icon');  
	$icons_ef 			= thz_akg('med_over/iceffect',$atts,'thz-comein-bottom');
	$icons_tr 			= thz_akg('med_over/icduration',$atts,'thz-transease-05');
	$icon_shape			= thz_akg('mi/show/iconbg_metrics/sh',$atts,'square');
	$icon_pa			= thz_akg('mi/show/icon_metrics/pa',$atts,10);
	$icon_fs			= thz_akg('mi/show/icon_metrics/fs',$atts,16);
	$overlay_icon		= thz_akg('mi/show/icon',$atts,'thzicon thzicon-plus');
	$media_el_ali		= thz_akg('mi/show/el_ali',$atts,'thz-va-middle'); 
	$media_el_ali		= $etype == 'icon' ? '' : ' '.$media_el_ali;
	$icon_classes		= $icon_shape.' thz-fs-'.$icon_fs.' thz-vp-'.$icon_pa.' thz-hp-'.$icon_pa;	
	$iconef_classes 	= ' '.$icons_ef.' '.$icons_tr.$media_el_ali;
}

if($over_mode == 'reveal' || $over_mode == 'directional'){

	if($over_mode == 'reveal'){
		
		$reveal_effect 	= thz_akg('reveal_effect/effect',$atts,'thz-reveal-goleft'); 
		$transition 	= thz_akg('reveal_effect/transition',$atts,'thz-transease-04'); 
		$reveal_class	= 'thz-overlay-box '.$reveal_effect.' '.$transition;
		
	}else{
		
		$reveal_class = 'thz-overlay-box'; 
	}
	
}

if($over_mode != 'none'){
	$holder_classes[] = thz_akg('lightbox_slider',$atts,'thz-mfp-show-slider');
}


$layers_html = '<div id="'.esc_attr($id_out).'" class="'.thz_sanitize_class($holder_classes).'"'.thz_sanitize_data($cpx_data).'>';
$layers_html .='<div class="thz-image-layers'.$animation_class.'"'.thz_sanitize_data($animate_data).'>'; 
$layers_html .='<div class="thz-aspect '.$aspect_ratio.'">'; 
$layers_html .='<div class="thz-ratio-in">'; 

foreach( $layers_arr as $l_id => $layer ){

	$style			= '';
	$l_css_id 		= thz_akg('o/cmx/i',$layer);
	$l_id_out		= !empty($l_css_id) ? str_replace(' ','',$l_css_id): 'thz-img-layer-'.$l_id;
	$l_css_class 	= thz_akg('o/cmx/c',$layer);
	$l_css_class	= $l_css_class !='' ? $l_css_class.' ':'';
	$instyle		= thz_akg('o/instyle',$layer);
	$instyle		= $instyle !='' ? $instyle.' ':'';
	$l_res_class	= _thz_responsive_classes(thz_akg('o/cmx',$layer));
	$attachment_id	= thz_akg('o/image/attachment_id',$layer,false);
	$l_an			= thz_akg('o/animate',$layer);
	$l_an_d			= thz_print_animation($l_an);
	$l_an_c			= thz_print_animation($l_an,true);
	$l_cpx			= thz_akg('o/cpx',$layer);
	$l_cpx_d		= thz_print_cpx($l_cpx);
	$l_cpx_c		= thz_print_cpx($l_cpx,true);
	$click			= thz_akg('o/click',$layer,'none');
	$layer_overlay	= $over_mode =='none' ? false : $over_mode;
	$link			= thz_akg('o/link',$layer,null);
	$layer_clases 	= array($instyle.$l_css_class.$l_id_out,'thz-img-layer','thz-media-item'.$l_res_class);
	$hover_classes	= array('thz-hover thz-hover-img-mask');
	$in_clases		= array('thz-img-layer-in');
	$link_output	= null;
	$etext			= thz_akg('o/etext',$layer,'');
	$etext			= !empty($etext) ? $etext : false;
	$esubtext		= thz_akg('o/esubtext',$layer,'');
	$esubtext		= !empty($esubtext) ? $esubtext : false;
	$element_out	= '';
	$overlay_box 	= '';
	
	
	if($show_media_el =='show' ){
		
		if('icon' == $etype ){
			$element_out .= '<div class="thz-hover-icon '.thz_sanitize_class($icon_classes).'">';
			$element_out .= '<span class="'.thz_sanitize_class($overlay_icon).'">';
			$element_out .= '</span>';
			$element_out .= '</div>';
		}
		
		if('text' == $etype ){
			
			if($etext){
				$element_out .= '<div class="thz-el-text">';
				$element_out .= thz_html_trans(esc_textarea(do_shortcode( $etext )));	
				$element_out .= '</div>';	
			}
			
			if($esubtext){
				$element_out .= '<div class="thz-el-subtext">';
				$element_out .= thz_html_trans(esc_textarea(do_shortcode( $esubtext )));	
				$element_out .= '</div>';	
			}
			
		}
	}
	

	if($over_mode == 'reveal' || $over_mode == 'directional'){

		if($over_mode == 'directional'){
			$overlay_box .='<div class="thz-overlay-box-directional">';
		}
		
		$overlay_box .='<div class="'.thz_sanitize_class($reveal_class).'">';
		if($show_media_el =='show'){
			
			if($over_mode == 'reveal'){
				$overlay_box .='<div class="thz-overlay-table">';
				$overlay_box .='<div class="thz-overlay-cell'.$media_el_ali.'">';
			}
			
			$overlay_box .='<div class="thz-el-holder thz-el-type-'.$etype.'">';
			$overlay_box .= $element_out;
			$overlay_box .='</div>';
			
			if($over_mode == 'reveal'){
				$overlay_box .='</div>';
				$overlay_box .='</div>';
			}
		}
		
		$overlay_box .='</div>';
		
		if($over_mode == 'directional'){
			 $overlay_box .='</div>';
		}
		
			
	}

	if($l_cpx_d){
		$layer_clases[] = $l_cpx_c;
	}
		
	if($l_an_d){
		$in_clases[] = $l_an_c;
	}
	
	if( $attachment_id ){
		
		$image  			= thz_akg('o/image',$layer,null);
		$img_meta 			= wp_prepare_attachment_for_js($attachment_id); 
		$img_title 			= esc_attr( $img_meta['title'] ); 
		$size 				= thz_akg('o/img_mx/size',$layer);
		$position 			= thz_akg('o/img_mx/position',$layer,'center-center');
		$style 				= thz_print_img_style( $attachment_id , $size );
		$grayscale			= thz_akg('o/img_mx/grayscale',$layer,'none');
		
		$layer_clases[] 	= 'has-img';
		$hover_classes[] 	= 'thz-'.$position;
		
		if( $over_mode != 'none'){
			
			$hover_classes[] = 'thz-hover-bg-'.$hover_bgtype;
			$hover_classes[] = $hover_ef;
			$hover_classes[] = $img_ef;
			$hover_classes[] = $img_tr;
			$mask_classes	 = array('thz-hover-mask',$hover_tr);
		}
		
		if( 'none' != $grayscale ){
			
			$hover_classes[] = $grayscale;
			if( !$layer_overlay ){
				$hover_classes[] = 'thz-transease-04';
			}
		}
		
		if($click =='lightbox'){
			
			$link_output .='<a class="thz-hover-link thz-lightbox mfp-image" href="#" '.thz_lightbox_data($atts).'';
			$link_output .=' data-mfp-src="'.esc_url( $image['url'] ).'" data-mfp-title="'.esc_attr( $img_title ).'">';
			$link_output .='</a>';
		}
		
	}

	if($link && $click =='link'){
		$link_output ='<a ';
		if($link['type'] == 'normal'){
			
			$link_output .='class="thz-hover-link" href="'.esc_url( $link['url'] ).'" target="'.esc_attr($link['target']).'">';
			
		}else{
			
			$link_output .='class="thz-hover-link thz-trigger-lightbox" href="'.esc_url($link['magnific']).'">';
		}
		$link_output .='</a>';
	}
		
	$layers_html .='<div id="'.$l_id_out.'" class="'.thz_sanitize_class($layer_clases).'"'.thz_sanitize_data($l_cpx_d).'>';
	$layers_html .='<div id="thz-img-layer-in" class="'.thz_sanitize_class($in_clases).'"'.thz_sanitize_data($l_an_d).'>'; 
	
	if( $attachment_id ){
		
		//thz-hover
		$layers_html .='<div class="'.thz_sanitize_class($hover_classes).'"'.thz_sanitize_data($style).'>'; 
		
		if ( $layer_overlay ) {
			$layers_html .= $overlay_box;
		}

		if ( $over_mode =='none' ) {
			$layers_html .= $link_output;
		}
		
		//thz-hover-mask
		if( $over_mode != 'none'){
			$layers_html .= '<div class="'.thz_sanitize_class($mask_classes).'">';
			
			// thz-hover-mask-table
			if($show_media_el =='show' && $over_mode =='thzhover'){
				$layers_html .= '<div class="thz-hover-mask-table">';
			}
			
			$layers_html .= $link_output;
			if($show_media_el =='show' && $over_mode =='thzhover'){
				$layers_html .= '<div class="thz-hover-icons '.thz_sanitize_class($iconef_classes).'">';
				$layers_html .= $element_out;	
				$layers_html .= '</div>';
			}
			
			// thz-hover-mask-table
			if($show_media_el =='show' && $over_mode =='thzhover'){
				$layers_html .= '</div>';
			}
			
			$layers_html .= '</div>';
			
		}
		
		// thz-hover
		$layers_html .= '</div>';
	}

	$layers_html .='</div>';
	$layers_html .='</div>'; 
}


$layers_html .='</div>';
$layers_html .='</div>'; 
$layers_html .='</div>'; 
$layers_html .='</div>'; 



echo $layers_html;
?>
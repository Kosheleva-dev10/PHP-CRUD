<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
$id					= thz_akg('id',$atts);
$css_id 			= thz_akg('cmx/i',$atts);
$id_out				= !empty($css_id) ? str_replace(' ','',$css_id): 'thz-popupid-'.$id;
$css_class 			= thz_akg('cmx/c',$atts);
$css_class			= $css_class !='' ? $css_class.' ':'';
$res_class			= _thz_responsive_classes(thz_akg('cmx',$atts));

$expire				= thz_akg('expire',$atts,7);

if (!isset($_COOKIE['#'.$id_out]) || $expire == 0) {
	
	$modal_size  		= thz_akg('modal_size',$atts);
	$modal_content  	= thz_akg('modal_content',$atts); 
	$style				= thz_akg('style',$atts);
	$opacity			= thz_akg('opacity',$atts);
	$effect				= thz_akg('effect',$atts);
	$background_layers	= thz_akg('bl',$atts);
	
	$popupdata	 		= 'data-expire="'.esc_attr($expire).'" data-bgclickoff="1"';
	$popupdata			.=' data-effect="'.esc_attr( $effect ).'"';
	$popupdata			.=' data-bg="'.esc_attr( $style ).'"';
	$popupdata			.=' data-opacity="'.esc_attr( $opacity ).'"';
	$popupdata			.=' data-modal-size="'.esc_attr( $modal_size ).'"';
	
	$classes 			= $css_class.'thz-exit-popup-box thz-popup-box pbox-'.$modal_size.$res_class;
	
	
	$html ='<a class="thz-exit-popup thz-lightbox mfp-inline mfp-hide" href="#'.esc_attr( $id_out ).'" '.thz_sanitize_data($popupdata).'>';
	$html .='</a>';
	$html .='<div id="'.esc_attr( $id_out ).'" class="'.thz_sanitize_class($classes).'">';
	if(!empty($background_layers)){
		$html .='<div class="thz-exit-popup-in thz-css-block">';
	}
	$html .= thz_html_trans( thz_remove_sh_wraps($modal_content, true) );
	if(!empty($background_layers)){
		$html .='</div>';
		$html .= thz_background_layers_print($background_layers);
	}
	$html .='</div>';
	
	echo $html;
}
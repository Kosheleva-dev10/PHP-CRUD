<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$id 				= thz_akg('id',$atts);
$css_id 			= thz_akg('cmx/i',$atts);
$id_out				= !empty($css_id) ? str_replace(' ','',$css_id): 'thz-typist-'.$id;
$css_class 			= thz_akg('cmx/c',$atts);
$css_class			= $css_class !='' ? $css_class.' ':'';
$res_class			= _thz_responsive_classes(thz_akg('cmx',$atts));
$strings 			= thz_akg('strings',$atts,null);
$gr_mode 			= thz_akg('gr/mode',$atts,'inactive');
$animate			= thz_akg('animate',$atts);
$animation_data		= thz_print_animation($animate);
$animation_class	= thz_print_animation($animate,true);
$cpx				= thz_akg('cpx',$atts);
$cpx_data			= thz_print_cpx($cpx);
$cpx_class			= thz_print_cpx($cpx,true);
$brakes				= thz_akg('brakes',$atts);


if($strings){
	
	$metrics 	= thz_akg('metrics',$atts,null);
	$strings 	= thz_words_to_tags( $strings,'span','','thz-typist-string');
	$options 	= json_encode($metrics,true);
	$before		= thz_akg('before',$atts,null);
	$after		= thz_akg('after',$atts,null);
	$tag		= thz_akg('tag',$atts,'h2'); 
	$class		= $css_class.'thz-shc thz-typist-container'.$animation_class.$cpx_class.$res_class;

	
	$output		='<div id="'.esc_attr($id_out).'" class="'.thz_sanitize_class($class).'"'.thz_sanitize_data($animation_data.$cpx_data).'>';
	$output		.='<'.esc_attr($tag).' class="thz-typist-holder">';
	
	if('active' == $gr_mode){
		$output .= '<span class="thz-gradient-text">';
	}
	
	if($before !=''){
		$output		.= esc_attr( $before );
	}
	
	if($brakes =='before' || $brakes=='both'){
		$output		.='<br />';
	}
	
	$output		.='<span id="thz-typed-strings-'.esc_attr($id).'" class="thz-typist-strings">';
	$output		.= $strings;
	$output		.='</span>';
	$output		.='<span id="thz-typed-'.esc_attr($id).'" class="thz-typist" data-id="'.esc_attr($id).'" data-options="'.thz_htmlspecialchars($options).'">';
	$output		.='</span>';
	
	if($brakes =='after' || $brakes=='both'){
		$output		.='&nbsp;<br />';
	}
	if($after !=''){	
		$output		.= esc_attr( $after );
	}
	$output		.='</'.esc_attr($tag).'>';

	if('active' == $gr_mode){
		$output .= '</span>';
	}
	
	
	
	$output		.='</div>';
	echo $output;
}
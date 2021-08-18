<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
/**
 * @var array $atts
 */
$id 					= thz_akg('id',$atts);
$css_id 				= thz_akg('cmx/i',$atts);
$id_out					= !empty($css_id) ? str_replace(' ','',$css_id): 'thz-circle-progress-'.$id;
$css_class 				= thz_akg('cmx/c',$atts);
$css_class				= $css_class !='' ? $css_class.' ':'';
$res_class				= _thz_responsive_classes(thz_akg('cmx',$atts));


$html					= '';
$value_html 			= '';
$progress				= thz_akg('progress',$atts);
$thickness				= esc_attr (thz_akg('thickness',$progress));
$tipshape				= thz_akg('tipshape',$progress);
$percent				= esc_attr ( thz_akg('percent',$progress));
$duration				= esc_attr (thz_akg('duration',$progress));
$direction				= thz_akg('direction',$progress);
$progress_colors		= thz_akg('progress_colors',$atts);
$empty_fill				= esc_attr (thz_akg('empty_fill',$progress_colors));
$empty_fill				= $empty_fill == '' ? 'rgba(0,0,0,0)' : $empty_fill;
$colors 				= array();
$title					= esc_attr( thz_akg('title',$atts));
$text 					= do_shortcode(thz_akg('text',$atts));
$title_settings 		= thz_akg('title_settings',$atts);
$text_settings			= thz_akg('text_settings',$atts);
$title_fs 				= ' thz-fs-'.esc_attr ( thz_akg('font_size',$title_settings)) ;
$text_fs 				= ' thz-fs-'.esc_attr ( thz_akg('font_size',$text_settings)) ;
$title_fw 				= ' '.esc_attr ( thz_akg('font_weight',$title_settings)) ;
$text_fw 				= ' '.esc_attr ( thz_akg('font_weight',$text_settings)) ;
$title_fst 				= thz_akg('font_style',$title_settings) == 'normal' ? '' :' '.thz_akg('font_style',$title_settings);
$text_fst 				= thz_akg('font_style',$text_settings) == 'normal' ? '' :' '.thz_akg('font_style',$text_settings);
$title_margin			= ' thz-mt-'.thz_akg('margin',$title_settings);
$text_margin			= ' thz-mt-'.thz_akg('margin',$text_settings);
$title_classes			= $title_fs.$title_fw.$title_fst.$title_margin;
$text_classes			= $text_fs.$text_fw.$text_fst.$text_margin;
$progress_value_type 	= thz_akg('progress_value/picked',$atts);
$animate				= thz_akg('animate',$atts);
$animation_data			= thz_print_animation($animate);
$animation_class		= thz_print_animation($animate,true);
$cpx					= thz_akg('cpx',$atts);
$cpx_data				= thz_print_cpx($cpx);
$cpx_class				= thz_print_cpx($cpx,true);

if($progress_value_type == 'percent'){
	
	$percent_settings 	= thz_akg('progress_value/percent/percent_settings',$atts);
	$pfs 				= ' thz-fs-'.thz_akg('font_size',$percent_settings);
	$pfw 				= ' '.thz_akg('font_weight',$percent_settings);
	$pfst 				= thz_akg('font_style',$percent_settings) == 'normal' ? '' :' '.thz_akg('font_style',$percent_settings);
	$show_unit 			= thz_akg('show_unit',$percent_settings);
	$value_html 		.= '<span class="thz-circle-progress-value'.thz_sanitize_class($pfs.$pfw.$pfst).'">0</span>';
	if($show_unit == 'show'){
		$value_html .= '<span class="thz-circle-progress-unit'.thz_sanitize_class($pfs.$pfw.$pfst).'">%</span>';
	}
	
}else{
	
	$percent_text_settings 	= thz_akg('progress_value/text/text_settings',$atts);
	
	$pfs 					= ' thz-fs-'.thz_akg('font_size',$percent_text_settings);
	$pfw 					= ' '.thz_akg('font_weight',$percent_text_settings);
	$pfst 					= thz_akg('font_style',$percent_text_settings) == 'normal' ? '' :' '.thz_akg('font_style',$percent_text_settings);
	
	
	$percent_text_text		= thz_akg('text',$percent_text_settings);
	$icon_settings			= thz_akg('progress_value/text/icon_settings',$atts);
	$icon					= thz_akg('progress_value/text/icon',$atts);
	$icon_size				= thz_akg('size',$icon_settings);
	$icon_position			= thz_akg('position',$icon_settings);
	$icon_spacer			= thz_akg('space',$icon_settings);

	
	if($icon_size == 'inherit'){
		$icon_size = $pfs;
	}else{
		$icon_size = ' '.$icon_size;
	}
	
	$icon_html 				='';
	
	if($icon !=''){
		$icon_html .='<span class="thz-circle-progress-icon '.thz_sanitize_class($icon.$icon_size).'"></span>';
	}
	
	if($percent_text_text !='' || $icon !=''){
		
		if($percent_text_text !=''){
			$icon_spacer	='<span class="thz-circle-progress-spacer thz-spacer-'.thz_sanitize_class($icon_spacer).'"></span>';
		}else{
			$icon_spacer	='';
		}
		
		$value_html 	.='<div class="thz-circle-progress-value-holder">';
	
		if($icon_position == 'left'){
			$value_html .= $icon_html.$icon_spacer;
		}
		
		
		if($percent_text_text !=''){
			$value_html 	.= '<span class="thz-circle-progress-value-text'.thz_sanitize_class( $pfs.$pfw.$pfst ).'">';
			$value_html 	.= thz_html_trans(esc_textarea( $percent_text_text ));
			$value_html 	.= '</span>';
		}
	
		if($icon_position == 'right'){
			$value_html .= $icon_spacer.$icon_html;
		}
		$value_html 	.='</div>';
	}
	
}

foreach($progress_colors as $key => $color){
	if($key == 'empty_fill' || $color ==''){
		continue;
	}
	$colors[]= thz_replace_palette_colors($color);
}


$data =' data-value="'.esc_attr(($percent/ 100 )).'"';
$data .=' data-thickness="'.esc_attr($thickness).'"';
$data .=' data-reverse="'.esc_attr($direction).'"';
$data .=' data-line-cap="'.esc_attr($tipshape).'"';
$data .=' data-empty-fill="'.esc_attr(thz_replace_palette_colors( $empty_fill )).'"';
$data .=' data-duration="'.esc_attr($duration).'"';

$data_fill = array('gradient' => $colors );
$data .=' data-fill="'.thz_htmlspecialchars(json_encode($data_fill)).'"';


$html .='<div class="thz-circle-progress"'.$data.'>';
$html .='<div class="thz-circle-progress-inner">';
$html .= $value_html;
$html .='</div>';
$html .='</div>';
if($title !=''){
	$html .='<div class="thz-circle-progress-title'.thz_sanitize_class( $title_classes ).'">';
	$html .= esc_attr($title);
	$html .='</div>';
}
if($text !=''){
	$html .='<div class="thz-circle-progress-text'. thz_sanitize_class( $text_classes ).'">';
	$html .= thz_html_trans(esc_textarea($text));
	$html .='</div>';
}

$classes = $css_class.'thz-shc thz-circle-progress-holder'.$animation_class.$cpx_class.$res_class;

?>
<div id="<?php echo esc_attr($id_out) ?>" class="<?php echo thz_sanitize_class($classes) ?>"<?php echo thz_sanitize_data($animation_data.$cpx_data)?>>
	<?php echo $html ?>
</div>
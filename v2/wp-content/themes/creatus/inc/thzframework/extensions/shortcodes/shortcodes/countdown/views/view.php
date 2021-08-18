<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
/**
 * @var array $atts
 */
$id 				= thz_akg('id',$atts);
$css_id 			= thz_akg('cmx/i',$atts);
$id_out				= !empty($css_id) ? str_replace(' ','',$css_id): 'thz-countdown-holder-'.$id;
$css_class 			= thz_akg('cmx/c',$atts);
$css_class			= $css_class !='' ? $css_class.' ':'';
$res_class			= _thz_responsive_classes(thz_akg('cmx',$atts));

$html				= '';
$animate			= thz_akg('animate',$atts);
$animation_data		= thz_print_animation($animate);
$animation_class	= thz_print_animation($animate,true);
$cpx				= thz_akg('cpx',$atts);
$cpx_data			= thz_print_cpx($cpx);
$cpx_class			= thz_print_cpx($cpx,true);
$countdown 			= thz_akg('countdown',$atts);
$offset 			= thz_akg('offset',$atts);
$date_diff 			= thz_date_diff($countdown,$offset);
$date_singular		= thz_akg('date_singular',$atts);
$date_plural		= thz_akg('date_plural',$atts);
$box_layout			= thz_akg('box_layout',$atts); 
$show_elements		= thz_akg('show_elements',$atts); 
$show_text			= thz_akg('text',$show_elements); 
$show_days			= thz_akg('days',$show_elements); 
$show_hours			= thz_akg('hours',$show_elements); 
$show_minutes		= thz_akg('minutes',$show_elements); 
$show_seconds		= thz_akg('seconds',$show_elements); 
$date_settings		= thz_akg('date_settings',$atts); 
$number_poz			= thz_akg('position',$date_settings); 
$number_va			= thz_akg('number_align',$date_settings); 
$text_va			= thz_akg('text_align',$date_settings);
$text_transform 	= thz_akg('text_transform',$date_settings);

if($number_poz	=='left' || $number_poz	=='right'){
	$layout_type	= 'thz-cd-inline';
}else{
	$layout_type	= 'thz-cd-boxed';
}

$spacer_settings= thz_akg('spacer_settings',$atts); 
$spacer			= ' thz-spacer-'.thz_akg('space',$spacer_settings); 
$spacer_text	= thz_akg('text',$spacer_settings);
$spacer_font	= ' thz-fs-'.thz_akg('font_size',$spacer_settings);
$spacer_html 	='<div class="thz-cd-sep'.thz_sanitize_class( $spacer.$spacer_font ).'">'.esc_attr( $spacer_text ).'</div>';

$settings = array(
	'date'=> $countdown,
	'day' => thz_akg('day',$date_singular),
	'days' => thz_akg('days',$date_plural),
	'hour' => thz_akg('hour',$date_singular),
	'hours' => thz_akg('hours',$date_plural),
	'minute' => thz_akg('minute',$date_singular),
	'minutes' => thz_akg('minutes',$date_plural),
	'second' => thz_akg('second',$date_singular),
	'seconds' =>  thz_akg('seconds',$date_plural),
	'offset' => ''.$offset.'',
);
$settings_data = fw_htmlspecialchars(json_encode($settings));


$days 			= strlen($date_diff->days) == 1? '0'.$date_diff->days: $date_diff->days;
$hours 			= strlen($date_diff->h) == 1? '0'.$date_diff->h: $date_diff->h;
$minutes 		= strlen($date_diff->i) == 1? '0'.$date_diff->i: $date_diff->i;
$seconds 		= strlen($date_diff->s) == 1? '0'.$date_diff->s: $date_diff->s;

if($date_diff->invert == 1 || $countdown ==''){
	
	$days ='00';	
	$hours ='00';
	$minutes ='00';
	$seconds ='00';	
}


$number_classes = ' '.$number_va;
$text_classes = ' '.$text_va.' '.$text_transform;

$datas = ' data-settings="'.esc_attr($settings_data).'"';
$html .='<div class="thz-countdown '.thz_sanitize_class( $layout_type ).'"'.$datas.'>';

if($show_days === 'show'){
	$html .='<div class="thz-cd-cell">';
	$html .='<div class="thz-cd-cell-in">';
	if($number_poz	=='left' || $number_poz	=='above'){
		$html .='<span class="thz-cd-d thz-cd-numbers'.thz_sanitize_class( $number_classes ).'">'.esc_attr($days).'</span>';
	}
	if($show_text === 'show'){
		$html .='<span class="thz-cd-dt thz-cd-text'.thz_sanitize_class( $text_classes ).'">'.esc_attr($settings['days']).'</span>';
	}
	if($number_poz	=='right' || $number_poz =='under'){
		$html .='<span class="thz-cd-d thz-cd-numbers'.thz_sanitize_class( $number_classes ).'">'.esc_attr($days).'</span>';
	}
	$html .='</div>';
	$html .='</div>';
	$html .= $spacer_html;
}

if($show_hours === 'show'){
	$html .='<div class="thz-cd-cell">';
	$html .='<div class="thz-cd-cell-in">';
	if($number_poz	=='left' || $number_poz	=='above'){
		$html .='<span class="thz-cd-h thz-cd-numbers'.thz_sanitize_class( $number_classes ).'">'.esc_attr( $hours ).'</span>';
	}
	if($show_text === 'show'){
		$html .='<span class="thz-cd-ht thz-cd-text'.thz_sanitize_class( $text_classes ).'">'.esc_attr($settings['hours']).'</span>';
	}
	if($number_poz	=='right' || $number_poz	=='under'){
		$html .='<span class="thz-cd-h thz-cd-numbers'.thz_sanitize_class( $number_classes ).'">'.esc_attr($hours).'</span>';
	}
	$html .='</div>';
	$html .='</div>';
}

if($show_minutes === 'show'){
	$html .= $spacer_html;
	$html .='<div class="thz-cd-cell">';
	$html .='<div class="thz-cd-cell-in">';
	if($number_poz	=='left' || $number_poz	=='above'){
		$html .='<span class="thz-cd-m thz-cd-numbers'.thz_sanitize_class( $number_classes ).'">'.esc_attr( $minutes ).'</span>';
	}
	if($show_text === 'show'){
		$html .='<span class="thz-cd-mt thz-cd-text'.thz_sanitize_class( $text_classes ).'">'.esc_attr($settings['minutes']).'</span>';
	}
	if($number_poz	=='right' || $number_poz	=='under'){
		$html .='<span class="thz-cd-m thz-cd-numbers'.thz_sanitize_class( $number_classes ).'">'.esc_attr($minutes).'</span>';
	}
	$html .='</div>';
	$html .='</div>';
}

if($show_seconds === 'show'){
	$html .= $spacer_html;
	$html .='<div class="thz-cd-cell">';
	$html .='<div class="thz-cd-cell-in">';
	if($number_poz	=='left' || $number_poz	=='above'){
		$html .='<span class="thz-cd-s thz-cd-numbers'.thz_sanitize_class( $number_classes ).'">'.esc_attr( $seconds ).'</span>';
	}
	if($show_text === 'show'){
		$html .='<span class="thz-cd-st thz-cd-text'.thz_sanitize_class( $text_classes ).'">'.esc_attr( $settings['seconds'] ).'</span>';
	}
	if($number_poz	=='right' || $number_poz	=='under'){
		$html .='<span class="thz-cd-s thz-cd-numbers'.thz_sanitize_class( $number_classes ).'">'.esc_attr($seconds).'</span>';
	}
	$html .='</div>';
	$html .='</div>';
}


$html .='</div>';

if($countdown ==''){

	$n_title 	= esc_html__('Countdown date is missing','creatus');
	$n_msg 		= esc_html__('Please go in countdown settings and add a countdown date.','creatus');
	$html		= thz_notify('yellow',$n_title,$n_msg, false);
	
}
$classes =  $css_class.'thz-shc thz-countdown-holder'.$animation_class.$cpx_class.$res_class;
?>
<div id="<?php echo esc_attr($id_out) ?>" class="<?php echo thz_sanitize_class( $classes ); ?>"<?php echo thz_sanitize_data($animation_data.$cpx_data) ?>>
	<?php echo $html ?>
</div>

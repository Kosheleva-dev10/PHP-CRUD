<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
/**
 * @var array $atts
 */
$id 				= thz_akg('id',$atts);
$css_id 			= thz_akg('cmx/i',$atts);
$id_out				= !empty($css_id) ? str_replace(' ','',$css_id): 'thz-counter-'.$id;
$css_class 			= thz_akg('cmx/c',$atts);
$css_class			= $css_class !='' ? $css_class.' ':'';
$res_class			= _thz_responsive_classes(thz_akg('cmx',$atts));
$count_from			= esc_attr( thz_akg('counter/count_from',$atts) );
$count_to			= esc_attr( thz_akg('counter/count_to',$atts));
$duration			= esc_attr( thz_akg('counter/duration',$atts));
$unit_type			= thz_akg('unit_mx/ty',$atts); 
$unit				= $unit_type == 'textual' ? thz_akg('unit_mx/t',$atts) : thz_akg('unit_mx/i',$atts);
$unit_position		= thz_akg('unit_mx/p',$atts);
$unit_spacer		= thz_akg('unit_mx/sp',$atts);
$animate			= thz_akg('animate',$atts);
$animation_data		= thz_print_animation($animate);
$animation_class	= thz_print_animation($animate,true);
$cpx				= thz_akg('cpx',$atts);
$cpx_data			= thz_print_cpx($cpx);
$cpx_class			= thz_print_cpx($cpx,true);

$html				= '';
$unit_html			= false;
$decimals 			= thz_count_decimals($count_to);
$unit_spacer		='<span class="thz-counter-spacer thz-spacer-'.thz_sanitize_class( $unit_spacer ).'"></span>';

if($unit !=''){
	$unit_html .='<span class="thz-counter-unit">';
	if($unit_type == 'textual'){
		$unit_html .= esc_attr($unit);
	}else{
		$unit_html .= '<span class="'.esc_attr($unit).'"></span>';
	}
	$unit_html .='</span>';
}

$html .='<div class="thz-counter-count-to thz-counter-unit-'.thz_sanitize_class($unit_position).'">';

if($unit_html && $unit_position == 'top'){
	$html .= $unit_html;
}

if($unit_html && $unit_position =='left'){
	$html .= $unit_html.$unit_spacer;
}

$html .='<span class="thz-counter-count" data-decimals="'.esc_attr($decimals).'" data-from="'.esc_attr($count_from).'" data-to="'.esc_attr($count_to).'" data-duration="'.esc_attr($duration).'">';
$html .=$count_from;
$html .='</span>';


if($unit_html && $unit_position =='right'){
	$html .= $unit_spacer.$unit_html;
}


$html .='</div>';

$classes = $css_class.'thz-shc thz-counter'.$animation_class.$cpx_class.$res_class; 
?>
<div id="<?php echo esc_attr($id_out) ?>" class="<?php echo thz_sanitize_class($classes); ?>"<?php echo thz_sanitize_data($animation_data.$cpx_data);?>>
	<?php echo $html ?>
</div>
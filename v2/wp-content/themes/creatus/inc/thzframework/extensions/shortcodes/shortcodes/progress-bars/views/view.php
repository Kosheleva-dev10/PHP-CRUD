<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
/**
 * @var array $atts
 */
$id 					= thz_akg('id',$atts);
$css_id 				= thz_akg('cmx/i',$atts);
$id_out					= !empty($css_id) ? str_replace(' ','',$css_id): 'thz-progress-bars-'.$id;
$css_class 				= thz_akg('cmx/c',$atts);
$css_class				= $css_class !='' ? $css_class.' ':'';
$res_class				= _thz_responsive_classes(thz_akg('cmx',$atts));
$style					= thz_akg('style',$atts);
$shape					= ' '.thz_akg('shape/picked',$atts);
$shape_padding			= thz_akg('shp',$atts); 
$font_settings			= thz_akg('fset',$atts); 
$font_size				= ' thz-fs-'.thz_akg('fs',$font_settings); 
$letter_spacing			= thz_akg('ls',$font_settings);
$letter_spacing			= $letter_spacing != 0 ? ' thz-lsp'.thz_akg('ls',$font_settings) :''; 
$title_text				= thz_akg('tit',$atts);
$title_text_bold		= thz_akg('bold',$title_text) ? ' thz-fw-600':'';
$title_text_upper		= thz_akg('uppercase',$title_text) ? ' thz-text-uppercase':'';
$title_text_italic		= thz_akg('italic',$title_text) ? ' thz-font-italic':'';
$title_classes			= $title_text_bold.$title_text_upper.$title_text_italic.$font_size.$letter_spacing;
$percent_text			= thz_akg('pet',$atts);
$percent_text_bold		= thz_akg('bold',$percent_text) ? ' thz-fw-600':'';
$percent_text_italic	= thz_akg('italic',$percent_text) ? ' thz-font-italic':'';
$percent_classes		= $percent_text_bold.$percent_text_italic.$font_size.$letter_spacing;
$radius 				='';
$html 					= '';
if($shape == ' thz-progress-rounded'){
	$radius 			=' thz-radius-'.thz_akg('shape/thz-progress-rounded/radius',$atts);	
}
$horizontal				= ' thz-hp-'.thz_akg('hp',$shape_padding);
$vertical				= ' thz-vp-'.thz_akg('vp',$shape_padding);
$progressbars			= thz_akg('progressbars',$atts);
$animate				= thz_akg('animate',$atts);
$animation_data			= thz_print_animation($animate);
$animation_class		= thz_print_animation($animate,true);
$cpx					= thz_akg('cpx',$atts);
$cpx_data				= thz_print_cpx($cpx);
$cpx_class				= thz_print_cpx($cpx,true);
$anim_delay				= $animation_class != '' ? ' thz-anim-auto-delay' :'';

if(!empty($progressbars)){
	foreach($progressbars as $bar){
		
		$percentage = (int) $bar['percentage'];
		$duration = (int) $bar['duration'];
		
		
		$candy_bar			= thz_akg('cab',$bar);
		$candy_show			= thz_akg('show',$candy_bar) ? ' thz-progress-candy' : '';
		$candy_animate		= thz_akg('animate',$candy_bar) ? '-animate' : '';
		$candy_classes		= thz_akg('show',$candy_bar) ? $candy_show.$candy_animate : '';
		
		$ti_class = 'thz-progress-bar-title'.$title_classes.' thz-pbt-'.$bar['id'];
		$pe_class = 'thz-progress-percentage'.$percent_classes.' thz-pbp-'.$bar['id'];
		
		$text ='<span class="'.thz_sanitize_class($ti_class).'">'.esc_attr($bar['title']).($style =='style2' ? ':':'').'</span>';
		$text .='<span class="'.thz_sanitize_class($pe_class).'">'.esc_attr($percentage).'%</span>';
		
		if($style =='style3'){
			$html .= $text;
		}
		$pro_class ='thz-progress-bar'.$shape.$horizontal.$vertical.$animation_class.$radius;
		$html .='<div id="thz-progress-bar-'.esc_attr($bar['id']).'" class="'.thz_sanitize_class($pro_class).'"'.thz_sanitize_data($animation_data).'>';
		if($style =='style1' || $style =='style2'){
			$html .= $text;
		}
		$html .='<span class="thz-progress-bar-progress'.thz_sanitize_class($candy_classes).'" data-percentage="'.esc_attr($percentage).'" data-duration="'.esc_attr($duration).'">';
		$html .='</span>';
		$html .='</div>';
		
	}
}else{

		$n_title 	= esc_html__('Shortcode progress bar missing','creatus');
		$n_msg 		= esc_html__('Please go in progress bars settings and add minimum one progress bar','creatus');
		$html 		= thz_notify('yellow',$n_title,$n_msg,false);
}

$classes = $css_class.'thz-shc thz-progress-bars-set thz-progress-bars-'.$style.$cpx_class.$anim_delay.$res_class;
?>
<div id="<?php echo esc_attr($id_out)?>" class="<?php echo thz_sanitize_class($classes) ?>"<?php echo thz_sanitize_data($cpx_data); ?>>
	<?php echo $html ?>
</div>
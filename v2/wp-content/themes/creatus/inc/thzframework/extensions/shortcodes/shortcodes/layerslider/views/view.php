<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

/**
 * @var array $atts
 */
$id 				= thz_akg('id',$atts);
$css_id 			= thz_akg('cmx/i',$atts);
$id_out				= !empty($css_id) ? str_replace(' ','',$css_id): 'thz-layerslider-'.$id;
$css_class 			= thz_akg('cmx/c',$atts);
$css_class			= $css_class !='' ? $css_class.' ':'';
$res_class			= _thz_responsive_classes(thz_akg('cmx',$atts));

$classes = $css_class.'thz-shc thz-layerslider-container'.$res_class;
?>
<div id="<?php echo esc_attr($id_out) ?>" class="<?php echo thz_sanitize_class($classes) ?>"><?php thz_show_layer_slider($atts['layerslider']); ?></div>
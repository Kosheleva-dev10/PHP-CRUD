<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
if(is_admin()){
	
	return;
}
/**
 * @var array $atts
 */
$id 				= thz_akg('id',$atts);
$css_id 			= thz_akg('cmx/i',$atts);
$id_out				= !empty($css_id) ? str_replace(' ','',$css_id): 'thz-parse-shortcode-block-'.$id;
$css_class 			= thz_akg('cmx/c',$atts);
$css_class			= $css_class !='' ? $css_class.' ':'';
$res_class			= _thz_responsive_classes(thz_akg('cmx',$atts));
$shortcode			= thz_akg('shortcode',$atts);
$short_class		= explode(' ',$shortcode);
$short_class		= str_replace(array(']','['),'',$short_class[0]);
$short_class		= str_replace('_','-',$short_class);
$animate			= thz_akg('animate',$atts);
$animation_data		= thz_print_animation($animate);
$animation_class	= thz_print_animation($animate,true);
$cpx				= thz_akg('cpx',$atts);
$cpx_data			= thz_print_cpx($cpx);
$cpx_class			= thz_print_cpx($cpx,true);

$classes			= $css_class.'thz-shc thz-parse-shortcode-block '.$short_class.$animation_class.$cpx_class.$res_class;
?>
<div id="<?php echo esc_attr( $id_out ) ?>" class="<?php echo thz_sanitize_class($classes); ?>"<?php echo thz_sanitize_data($animation_data.$cpx_data); ?>><?php echo do_shortcode( $shortcode ); ?></div>
<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
$id 				= thz_akg('id',$atts);
$css_id 			= thz_akg('cmx/i',$atts);
$id_out				= !empty($css_id) ? str_replace(' ','',$css_id): 'thz-socials-shortcode-'.$id;
$css_class 			= thz_akg('cmx/c',$atts);
$css_class			= $css_class !='' ? $css_class.' ':'';
$res_class			= _thz_responsive_classes(thz_akg('cmx',$atts));
$animate			= thz_akg('animate',$atts);
$animation_data		= thz_print_animation($animate);
$animation_class	= thz_print_animation($animate,true);
$cpx				= thz_akg('cpx',$atts);
$cpx_data			= thz_print_cpx($cpx);
$cpx_class			= thz_print_cpx($cpx,true);
$links				= thz_akg('links',$atts,null);
$metrics			= thz_akg('im',$atts,null);
$align				= thz_akg('im/a',$atts,'left');
$class				= 'thz-socials-'.$id;
$classes 			= $css_class.'thz-shc thz-socials-shortcode '.$align.$animation_class.$cpx_class.$res_class;

if(!empty($links)):

?>
<div id="<?php echo esc_attr($id_out); ?>" class="<?php echo thz_sanitize_class($classes); ?>"<?php echo thz_sanitize_data($animation_data.$cpx_data); ?>>
	<?php thz_social_links_print($metrics,'ic',$class,false,true,$links); ?>
</div><?php endif; ?>
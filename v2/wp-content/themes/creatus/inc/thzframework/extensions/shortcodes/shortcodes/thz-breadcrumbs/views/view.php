<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

if(!function_exists( 'fw_ext_breadcrumbs' )){
	
	$n_title 	= esc_html__('Breadcrumbs extension is missing','creatus');
	$n_msg 		= esc_html__('Please go in Unyson plugin settings and enable Breadcrumbs Extension','creatus');
	thz_notify('yellow thz-shc',$n_title,$n_msg);
	return;
}

$id					= thz_akg('id',$atts);
$css_id 			= thz_akg('cmx/i',$atts);
$id_out				= !empty($css_id) ? str_replace(' ','',$css_id): 'thz-breadcrumbs-'.$id;
$css_class 			= thz_akg('cmx/c',$atts);
$css_class			= $css_class !='' ? $css_class.' ':'';
$res_class			= _thz_responsive_classes(thz_akg('cmx',$atts));
$code				= thz_akg('code',$atts,null);
$style				= thz_akg('style',$atts,'light');
$height				= thz_akg('height',$atts,'limit');
$animate			= thz_akg('animate',$atts);
$animation_data		= thz_print_animation($animate);
$animation_class	= thz_print_animation($animate,true);
$cpx				= thz_akg('cpx',$atts);
$cpx_data			= thz_print_cpx($cpx);
$cpx_class			= thz_print_cpx($cpx,true);
$holder_classes 	= $css_class.'thz-shc thz-breadcrumbs'.$animation_class.$cpx_class.$res_class;
$separator        	= thz_get_separator( thz_akg( 'sep',$atts, null ), 'thz-breadcrumbs-separator' );

?>
<div id="<?php echo esc_attr($id_out)?>" class="<?php echo thz_sanitize_class($holder_classes)?>"<?php echo thz_sanitize_data($animation_data.$cpx_data); ?>>
<?php  echo fw_ext_get_breadcrumbs( $separator )  ?>
</div>
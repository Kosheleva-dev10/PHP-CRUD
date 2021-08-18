<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
/**
 * @var array $atts
 */


$id 				= thz_akg('id',$atts);
$css_id 			= thz_akg('cmx/i',$atts);
$id_out				= !empty($css_id) ? str_replace(' ','',$css_id): 'thz-hotspots-'.$id;
$css_class 			= thz_akg('cmx/c',$atts);
$css_class			= $css_class !='' ? $css_class.' ':'';
$res_class			= _thz_responsive_classes(thz_akg('cmx',$atts));
$hotspots  			= thz_akg('hotspots/hotspots',$atts,null); 
$hs_size			= thz_akg('mx/size',$atts,null);
$hs_mark			= thz_akg('mx/mark',$atts,null);
$hs_icon			= thz_akg('mx/icon',$atts,null);
$halo_anim 			= thz_akg('mx/anim',$atts,null);
$animate			= thz_akg('animate',$atts);
$animate_data		= thz_print_animation($animate);
$animation_class	= thz_print_animation($animate,true);
$cpx				= thz_akg('cpx',$atts);
$cpx_data			= thz_print_cpx($cpx);
$cpx_class			= thz_print_cpx($cpx,true);
$animate_hotspots	= thz_akg('animateh',$atts);
$animate_parent		= thz_akg('animate',$animate_hotspots) == 'active' ? ' thz-animate-parent ' :'';	

$global_hs_data		= array(
	'hotspots' => $hotspots,
	'size' => $hs_size,
	'mark' => $hs_mark,
	'icon' =>  $hs_icon,
	'animate' =>  $animate_hotspots,
);


$media_size			= thz_akg('media_size',$atts,'thz-img-medium'); 
$image_data			= thz_akg('hotspots/image',$atts,null);
$attachment_id		= thz_akg('hotspots/image/attachment_id',$atts,null);
$image_url			= thz_akg('hotspots/image/url',$atts,null);
$image				= wp_get_attachment_image( $attachment_id,$media_size); 
 
if($image ==''){
	$img_src = $image_url !='' ? $image_url : thz_img_placeholder();
	$image	 = $image !='' ? $image : '<img src="'.$img_src.'" alt="image-placeholer" />';
}

$holder_classes 	= $css_class.'thz-shc thz-hotspots-container'.$animation_class.$cpx_class.$res_class;
$hotspots_classes	= 'thz-hotspots thz-hotspots-'.$halo_anim.$animate_parent;

?>
<div id="<?php echo esc_attr($id_out) ?>" class="<?php echo thz_sanitize_class($holder_classes); ?>"<?php echo thz_sanitize_data($animate_data.$cpx_data); ?>>
    <div class="<?php echo thz_sanitize_class($hotspots_classes); ?>">
          <?php echo $image;?>
          <?php echo thz_get_hotspots($global_hs_data); ?>
    </div>
</div>
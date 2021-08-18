<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
$id 				= thz_akg('id',$atts);
$css_id 			= thz_akg('cmx/i',$atts);
$id_out				= !empty($css_id) ? str_replace(' ','',$css_id): 'thz-post-share-'.$id;
$css_class 			= thz_akg('cmx/c',$atts);
$css_class			= $css_class !='' ? $css_class.' ':'';
$res_class			= _thz_responsive_classes(thz_akg('cmx',$atts));
$links				= thz_akg('sharing_links',$atts,null);
$tips				= thz_akg('sharing_tooltip',$atts,null);
$show_sharing_label = thz_akg('sl/picked',$atts,'show');
$sharing_layout 	= thz_akg('layout',$atts,'separated');
$sharing_label  	= thz_akg('sl/show/l',$atts,''); 
$bps_style 			= thz_akg('im/s',$atts,'simple');
$bps_shape 			= thz_akg('im/sh',$atts,'square');
$animate			= thz_akg('animate',$atts);
$animation_data		= thz_print_animation($animate);
$animation_class	= thz_print_animation($animate,true);
$cpx				= thz_akg('cpx',$atts);
$cpx_data			= thz_print_cpx($cpx);
$cpx_class			= thz_print_cpx($cpx,true);

$bps_shclass 		= $bps_style !='simple' ? ' thz-so-'.$bps_shape :'';
$bps_class 			=' thz-so-'.$bps_style.$bps_shclass;
$classes 			= $css_class.'thz-shc thz-post-shares thz-shares-'.$sharing_layout.$animation_class.$cpx_class.$res_class; 
$left_separator 	= $sharing_layout == 'leftsided' ? '<span class="thz-sharing-sep"></span>' : '' ;
?>
<div id="<?php echo esc_attr($id_out) ?>" class="<?php echo thz_sanitize_class( $classes ) ; ?>"<?php echo thz_sanitize_data($animation_data.$cpx_data); ?>>
    <?php if ($show_sharing_label == 'show' && $sharing_label !='') { ?>
    <div class="thz-post-share-label">
    	<div class="thz-post-share-label-in">
        	<?php echo esc_html($sharing_label).$left_separator; ?>
        </div>
    </div>
    <?php  } ?>
    <div class="thz-post-share-links<?php echo thz_sanitize_class($bps_class) ?>">
    	<div class="thz-post-share-links-in">
       		<?php thz_post_shares(true,$links,$tips); ?>
       </div>
    </div>
</div>
<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
/**
 * @var array $atts
 */


$id 				= thz_akg('id',$atts);
$css_id 			= thz_akg('cmx/i',$atts);
$id_out				= !empty($css_id) ? str_replace(' ','',$css_id): 'thz-before-after-'.$id;
$css_class 			= thz_akg('cmx/c',$atts);
$css_class			= $css_class !='' ? $css_class.' ':'';
$res_class			= _thz_responsive_classes(thz_akg('cmx',$atts));
$animate			= thz_akg('animate',$atts);
$animate_data		= thz_print_animation($animate);
$animation_class	= thz_print_animation($animate,true);
$cpx				= thz_akg('cpx',$atts);
$cpx_data			= thz_print_cpx($cpx);
$cpx_class			= thz_print_cpx($cpx,true);
$media_size			= thz_akg('media_size',$atts,'thz-img-medium'); 
$b_attch_id			= thz_akg('before/attachment_id',$atts,null);
$a_attch_id			= thz_akg('after/attachment_id',$atts,null);
$b_url				= thz_akg('before/url',$atts,null);
$a_url				= thz_akg('after/url',$atts,null);

if(thz_is_dattch($b_attch_id) && !empty($b_url)){
	$before		= '<img src="'.$b_url.'"  alt="image placeholder" />'; 
}else{
	$before		= wp_get_attachment_image( $b_attch_id ,$media_size); 
}

if(thz_is_dattch($a_attch_id) && !empty($a_url)){
	$after		= '<img src="'.$a_url.'"  alt="image placeholder" />';
}else{
	$after		= wp_get_attachment_image( $a_attch_id ,$media_size);
}


$orientation		= thz_akg('mx/orientation',$atts,null); 
$percent			= (int) thz_akg('mx/percent',$atts,null); 
$overlay			= (int) thz_akg('mx/overlay',$atts,null); 
$transition			= (int) thz_akg('mx/transition',$atts,null); 
 
 
$holder_classes 	= $css_class.'thz-shc thz-before-after-container'.$animation_class.$cpx_class.$res_class;
$ba_classes			= 'thz-before-after twentytwenty-container';
$ba_data			= ' data-orientation="'.esc_attr($orientation).'" data-percent="'.esc_attr($percent).'"';
$ba_data			.= ' data-overlay="'.esc_attr($overlay).'" data-transition="'.esc_attr($transition).'"';
?>
<div id="<?php echo esc_attr($id_out) ?>" class="<?php echo thz_sanitize_class($holder_classes); ?>"<?php echo thz_sanitize_data($animate_data.$cpx_data); ?>>
    <div class="<?php echo thz_sanitize_class($ba_classes); ?>"<?php echo thz_sanitize_data($ba_data); ?>>
          <?php echo $before;?><?php echo $after;?>
    </div>
</div>
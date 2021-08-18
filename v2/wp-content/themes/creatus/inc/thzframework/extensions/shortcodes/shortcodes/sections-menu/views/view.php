<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
$id 			= thz_akg('id',$atts);
$css_id 		= thz_akg('cmx/i',$atts);
$id_out			= !empty($css_id) ? str_replace(' ','',$css_id): 'thz-dot-nav-'.$id;
$css_class 		= thz_akg('cmx/c',$atts);
$css_class		= $css_class !='' ? $css_class.' ':'';
$res_class		= _thz_responsive_classes(thz_akg('cmx',$atts));
$tip_poz		= thz_akg('tip/p',$atts,'left'); 
$class			= $css_class.'thz-shc thz-dot-nav thz-dot-navigation thz-dot-nav-block thz-dot-nav-'.$id.' tip-'.$tip_poz.$res_class;
$position		= thz_akg('dotn/p',$atts,'centered');
$pxp			= thz_akg('dotn/pxp',$atts,'centered');  
$position		= $position == 'custom' ? $pxp : 'centered';
$effect			= thz_akg('dotn/e',$atts,'slide');
$appear			= thz_akg('dotn/s',$atts,150);
$add			= thz_akg('add',$atts); 
$add_data		= !empty(array_filter($add)) ? ' data-add='.json_encode($add).'' :'';

?>
<div id="<?php echo esc_attr($id_out) ?>" class="<?php echo thz_sanitize_class($class); ?>" data-hide="yes" data-position="<?php echo esc_attr($position) ?>" data-appear="<?php echo esc_attr($appear)?>" data-effect="<?php echo esc_attr($effect) ?>">
    <ul class="thz-sections-scroll thz-dot-nav type-indicator"<?php echo thz_htmlspecialchars($add_data) ?>></ul>
</div>
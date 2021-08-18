<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
$id 				= thz_akg('id',$atts);
$css_id 			= thz_akg('cmx/i',$atts);
$id_out				= !empty($css_id) ? str_replace(' ','',$css_id): 'thz-search-shortcode-'.$id;
$css_class 			= thz_akg('cmx/c',$atts);
$css_class			= $css_class !='' ? $css_class.' ':'';
$res_class			= _thz_responsive_classes(thz_akg('cmx',$atts));
$animate			= thz_akg('animate',$atts);
$animation_data		= thz_print_animation($animate);
$animation_class	= thz_print_animation($animate,true);
$cpx				= thz_akg('cpx',$atts);
$cpx_data			= thz_print_cpx($cpx);
$cpx_class			= thz_print_cpx($cpx,true);

$placeholder		= thz_akg('placeholder',$atts,null);
$ls					= thz_akg('livesearch/picked',$atts,'inactive');
$livesearch			= $ls == 'active' ? ' thz-live-search' :'';
$ls_data 			= '';

if($ls == 'active'){
	
	$post_types		= thz_akg('livesearch/active/post_types',$atts,null);
	$search_through	= thz_akg('livesearch/active/ls_metrics/search_through',$atts,'post_title');
	$results_limit	= thz_akg('livesearch/active/ls_metrics/results_limit',$atts,5); 
	$show_intro		= thz_akg('livesearch/active/ls_metrics/intro',$atts,'show');
	$show_intro		= $show_intro == 'show' ? true : false;
	$intro_limit	= thz_akg('livesearch/active/ls_metrics/intro_limit',$atts,20);  
	$show_thumbnail	= thz_akg('livesearch/active/ls_metrics/thumbnail',$atts,'show');
	$show_thumbnail	= $show_thumbnail == 'show' ? true : false;
	$ls_data		.= ' data-post-types="'.fw_htmlspecialchars(json_encode(array_keys($post_types))).'"';
	$ls_data 		.=' data-search-through="'.esc_attr ( $search_through ).'"';
	$ls_data 		.=' data-results-limit="'.esc_attr ( $results_limit ).'"';
	$ls_data 		.=' data-show-intro="'.esc_attr ( $show_intro ).'"';
	$ls_data 		.=' data-intro-limit="'.esc_attr ( $intro_limit ).'"';
	$ls_data 		.=' data-show-thumbnail="'.esc_attr ( $show_thumbnail ).'"';
}


$classes 			= $css_class.'thz-shc thz-search-shortcode'.$livesearch.$animation_class.$cpx_class.$res_class;
?>
<div id="<?php echo esc_attr($id_out)?>" class="<?php echo thz_sanitize_class($classes); ?>"<?php echo thz_sanitize_data($animation_data.$cpx_data); ?>>
    <form class="thz-search-form" method="get" action="<?php echo esc_url( home_url( '/' )); ?>">
        <div class="thz-search-form-inner">
            <input id="<?php echo esc_attr($id_out)?>-input" type="text" class="text-input" placeholder="<?php echo esc_html($placeholder); ?>" value="" name="s"<?php echo $ls_data; ?> />
            <input type="submit" class="search-button" value="" />
        </div>
    </form>
</div>
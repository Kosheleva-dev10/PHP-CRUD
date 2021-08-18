<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
$id			= thz_akg('id',$atts);
$css_id 	= thz_akg('cmx/i',$atts);
$id_out		= !empty($css_id) ? str_replace(' ','',$css_id): 'thz-parsed-page-'.$id;
$css_class 	= thz_akg('cmx/c',$atts);
$css_class	= $css_class !='' ? $css_class.' ':'';
$res_class	= _thz_responsive_classes(thz_akg('cmx',$atts));
$url		= thz_akg('url',$atts);
$days		= thz_akg('cache/days',$atts,null);
$hours		= thz_akg('cache/hours',$atts,null);
$auto		= thz_akg('cache/auto',$atts,null);
$markdown	= thz_akg('markdown/parsing',$atts,'active') == 'active' ? true : false;
$escaped	= thz_akg('markdown/escaped',$atts,'active') == 'active' ? true : false;
$mdengine	= thz_akg('markdown/engine',$atts,'parsedownextra');

$parse_atts = array(
	'id' 		=> $id,
	'url' 		=> $url,
	'days' 		=> $days,
	'hours' 	=> $hours,
	'auto' 		=> $auto,
	'markdown' 	=> $markdown,
	'escaped' 	=> $escaped,
	'mdengine' 	=> $mdengine,
);
$classes = $css_class.'thz-shc thz-parsed-page-content'.$res_class;
?>
<div id="<?php echo esc_attr($id_out) ?>" class="<?php echo thz_sanitize_class($classes) ?>">
<?php echo thz_parse_page( $parse_atts ); ?>
</div>
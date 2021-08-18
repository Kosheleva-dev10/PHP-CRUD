<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
/**
 * @var array $atts
 */
$anchor 	= thz_akg('anchor',$atts );
$whentostop = thz_akg('mx/a',$atts);
$stop 		= (int) thz_akg('mx/p',$atts);
$duration	= (int) thz_akg('mx/d',$atts);

?>
<?php if(!empty($anchor)){ ?>
<div id="<?php echo esc_attr($anchor) ?>" class="thz-menu-anchor" data-anchor-<?php echo $whentostop?>="<?php echo esc_attr($stop)?>" data-anchor-duration="<?php echo esc_attr($duration) ?>"></div>
<?php } ?>
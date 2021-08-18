<?php
/**
 * @package      Thz Framework
 * @author       Themezly
 * @websites     http://www.themezly.com | http://www.youjoomla.com | http://www.yjsimplegrid.com
 */
 
if ( ! defined( 'ABSPATH' ) ) {
	exit; // No direct access
}
/**
 * This is header file with centered logo and menu
 * menu location is under the header
 *
 * The inclusion is using get_template_part WP function
 *
 */
$an				= thz_get_option('hea',array());
$and			= thz_print_animation($an);
$anc			= thz_print_animation($an,true); 
$mode 			= ' header-mode-'.thz_get_option('header_mode','stacked');
$header_data 	= ' role="banner" itemscope="itemscope" itemtype="https://schema.org/WPHeader"';
$sticky 		= thz_get_option('sthe/picked','inactive');
$sticky_type 	= 'sticky-'.thz_get_option('sthe/active/type','hide');
$sticky_class 	= $sticky =='active' ? ' thz-sticky-header sticky-wait sticky-early '.$sticky_type :'';
$show_toolbar 	= thz_get_option('htb/picked','show');
$header_c		= 'thz-mobile-hidden thz-tablet-hidden header-split header_holder'.$mode.$anc;
?>
<header id="header_holder" class="<?php echo thz_sanitize_class( $header_c ) ?>"<?php thz_sdata('header'); ?><?php echo thz_sanitize_data($and); ?>>	
<?php thz_toolbar_print( $show_toolbar ); ?>
<?php if($sticky =='active'){ ?>
<div class="thz-mobile-hidden thz-tablet-hidden<?php echo thz_sanitize_class($sticky_class) ?>">
<?php } ?>
	<div id="mainmenu_holder" class="thz-poz-menu-center thzmega<?php thz_contained('tm_contained/picked',true,true) ?><?php echo thz_sanitize_class( $sticky_class) ?>">
		<div class="thz-container thz-menu-holder<?php thz_contained('tm_contained/notcontained/nav_contained',true,true) ?>">
			<?php thz_wp_nav_menu('split'); ?>
		</div>
	</div>
<?php if($sticky =='active'){ ?>
</div>
<?php } ?>
</header>
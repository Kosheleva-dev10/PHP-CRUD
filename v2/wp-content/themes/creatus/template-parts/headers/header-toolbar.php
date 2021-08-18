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
 * Header toolbar
 */
?>
<div class="thz-header-toolbar thz-mobile-hidden thz-tablet-hidden">
	<div class="thz-container<?php thz_contained('header_contained',true,true)?>">
		<div class="thz-toolbar-inner">
			<div class="thz-ht-left">
				<div class="thz-toolbar-block">
				<?php echo thz_toolbar_content('l') ?>
				</div>
			</div>
			<div class="thz-ht-right">
				<div class="thz-toolbar-block">
				<?php echo thz_toolbar_content('r') ?>
				</div>
			</div>
		</div>
	</div>
</div>
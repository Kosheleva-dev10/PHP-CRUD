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
 * This is header file with header on the left
 * menu location is under the logo
 *
 * The inclusion is using get_template_part WP function
 *
 */

$an				= thz_get_option('hea',array());
$and			= thz_print_animation($an);
$anc			= thz_print_animation($an,true); 
$align 			= thz_get_option('toplevel_font/align','left');
$show_socials	= thz_get_option('lhs','show');
$show_branding	= thz_get_option('lhb','show');
$show_overlay 	= thz_get_option('hamx/o','show');
$tm_valign		= thz_get_option('hemmx/a','middle');
$header_c		= 'thz-mobile-hidden thz-tablet-hidden header-mini header-miniright header-is-hidden header-lateral header-lateral-right header_holder'.$anc;
?>
<?php if($show_overlay =='show'){ ?>
<div class="thz-canvas-overlay"></div>
<?php } ?>
<header id="header_holder" class="<?php echo thz_sanitize_class( $header_c ) ?>"<?php thz_sdata('header'); ?><?php echo thz_sanitize_data($and); ?>>
	<div class="header-lateral-in tm-align-<?php echo thz_sanitize_class($tm_valign) ?>">
		<div class="header-lateral-content">
        	<?php _thz_mini_header_items(); ?>
			<button class="thz-burger thz-burger--spin-r thz-burger-offcanvas" type="button">
			<span class="thz-burger-box">
			<span class="thz-burger-inner"></span>
			</span>
			</button>
        	<div class="header-lateral-table">
                <div class="header-lateral-row header-row">
                    <div class="header-lateral-cell">
                        <div id="header">
                            <?php echo thz_logo_print() ?>
                        </div>
                    </div>
                </div>
                <div class="header-lateral-row menu-row">
                    <div class="header-lateral-cell">
                        <div id="mainmenu_holder" class="thzmega">
                            <div class="thz-menu-holder">
                                <?php thz_wp_nav_menu() ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php if (is_active_sidebar( 'lateral-header-sidebar' ) ) : ?>
                <div class="header-lateral-row sidebar-row">
                    <div class="header-lateral-cell">
                        <div class="header-lateral-sidebar thz-align-<?php echo esc_attr($align) ?>">
                            <?php dynamic_sidebar( 'lateral-header-sidebar' ); ?>
                        </div>
                    </div>
                </div>
                <?php endif; ?>
                <?php if ($show_socials == 'show' || $show_branding == 'show'  ) : ?>
                <div class="header-lateral-row footer-row">
                    <div class="header-lateral-cell">
                        <div class="header-lateral-footer thz-align-<?php echo esc_attr($align) ?>">
                            <?php 
                                if($show_socials == 'show' ){
                                    thz_social_links_print('lsim','lc','thz-socials-header-lateral');
                                }
                            ?>
                            <?php 
                                if($show_branding == 'show' ){
                                    thz_print_branding() ;
                                }
                            ?>
                        </div>
                    </div>
                </div>
                <?php endif; ?>
            </div>
		</div>
	</div>
	<?php thz_video_bg_o('header_boxstyle/background') ?>
</header>
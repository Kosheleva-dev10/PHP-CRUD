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
 * This is header file with menu inside the header
 * menu location is right of the logo
 *
 * The inclusion is using get_template_part WP function
 *
 */
$an				= thz_get_option('hea',array());
$and			= thz_print_animation($an);
$anc			= thz_print_animation($an,true);
$sticky 		= thz_get_option('sthe/picked','inactive');
$sticky_type 	= 'sticky-'.thz_get_option('sthe/active/type','hide');
$sticky_class 	=  $sticky == 'active' ? ' thz-sticky-header '. $sticky_type :'';
$align 			= thz_get_option('toplevel_font/align','left');
$mode 			= ' header-mode-'.thz_get_option('header_mode','stacked');
$show_socials	= thz_get_option('lhs','show');
$show_branding	= thz_get_option('lhb','show');
$header_layout	= thz_get_option('hicmx/l','layout1');
$offcanvas_type	= thz_get_option('hofmx/t','push');
$offcanvas_poz  = $offcanvas_type =='overlay' ? $offcanvas_type : thz_get_option('hofmx/p','left');
$tm_valign		= thz_get_option('hemmx/a','middle');
$logo_centered	= array('layout3','layout5','layout6','layout7');
$burger_left	= array('layout2','layout3','layout4','layout7');
$burger_side	= in_array($header_layout, $burger_left) ? ' b-left p-'.$offcanvas_poz.' t-'.$offcanvas_type : ' b-right p-'.$offcanvas_poz.' t-'.$offcanvas_type;
$header_layout	= in_array($header_layout, $logo_centered) ? $header_layout.' thz-offcanvas-center'.$burger_side : $header_layout.$burger_side;
$header_c		= 'thz-mobile-hidden thz-tablet-hidden header-offcanvas header_holder'.$sticky_class.$mode.$anc;
?>
<header id="header_holder" class="<?php echo thz_sanitize_class( $header_c ) ?>"<?php thz_sdata('header'); ?><?php echo thz_sanitize_data($and); ?>>
	<div class="thz-container<?php thz_contained('header_contained',true,true)?>">
		<div id="header" class="thz-header-<?php echo thz_sanitize_class($header_layout) ?>">
			<?php echo thz_offcanvas_header_layout() ?>
		</div>
	</div>
	<?php thz_video_bg_o('header_boxstyle/background') ?>
</header>
<div class="thz-mobile-hidden thz-tablet-hidden thz-offcanvas-menu off-to-<?php echo esc_attr($offcanvas_poz.$burger_side) ?>">
	<div class="header-lateral-in tm-align-<?php echo thz_sanitize_class($tm_valign) ?>">
		<div class="header-lateral-content">
        	<div class="header-lateral-table">
                <div class="header-lateral-row header-row">
                    <div class="header-lateral-cell">
                        <div class="thz-burger-holder">
                            <button class="thz-burger thz-burger--spin-r thz-burger-offcanvas thz-canvas-burger" type="button">
                            <span class="thz-burger-box">
                            <span class="thz-burger-inner"></span>
                            </span>
                            </button>
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
</div>
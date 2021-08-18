<?php
/**
 * @package      Thz Framework
 * @author       Themezly
 * @websites     http://www.themezly.com | http://www.youjoomla.com | http://www.yjsimplegrid.com
 */
 
if ( ! defined( 'ABSPATH' ) ) {
	exit; // No direct access
}

$link_format_link 		= thz_get_post_option('link_format_link','');
$link_format_target 	= thz_get_post_option('link_format_target','self');
$media_height			= thz_akg('media_height/picked',$atts,'thz-ratio-16-9');
$link_height			= thz_akg('pf/0/link_height',$atts,'auto'); 
$ratio_in_class 		='thz-ratio-in';
$has_ratio				= ' thz-has-ratio';
if($media_height == 'custom' || $media_height == 'metro'){
	
	$ratio_class 	= 'thz-media-custom-size';
	
}else{
	
	$ratio_class 	= 'thz-aspect '.$media_height;
}

if('auto' == $link_height || $media_height == 'auto'){
	$ratio_class ='thz-media-link-auto';
	$ratio_in_class ='thz-media-link-auto-in';
	$has_ratio = '';
}
?>
<?php if($link_format_link){ ?>
<div class="thz-post-format-link thz-custom-format-item<?php echo thz_sanitize_class ( $has_ratio ) ?>">
	<div class="<?php echo thz_sanitize_class ( $ratio_class ) ?>">
		<div class="<?php echo thz_sanitize_class ( $ratio_in_class ) ?>">
            <span class="thz-custom-format-item-in">
                <span class="thz-custom-format-main">
                    <span class="thz-custom-format-holder">
                        <a class="thz-custom-format-title" href="<?php echo get_the_permalink() ?>">
                            <?php echo get_the_title() ?>
                        </a>
                        <a class="thz-custom-format-sub thz-post-format-link-url" href="<?php echo esc_url($link_format_link) ?>" target="<?php echo esc_attr($link_format_target) ?>">
                            <?php echo esc_url( $link_format_link ) ?>
                        </a>
                    </span>
                </span>
            </span>
    	</div>
    </div>
</div>
<?php }else{ 

		$n_title 	= esc_html__('Link missing','creatus');
		$n_msg 		= esc_html__('Please check link post format settings and insert a link.','creatus');
		thz_notify('yellow',$n_title,$n_msg);
	} 
?>
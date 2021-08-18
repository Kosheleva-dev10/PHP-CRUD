<?php 
/**
 * @package      Thz Core
 * @copyright    Copyright(C) since 2015  Themezly.com. All Rights Reserved.
 * @author       Themezly
 * @license      http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2
 * @websites     http://www.themezly.com
 */
if(!defined('ABSPATH')){
	 exit;
}

?>
<p>
    <label for="<?php echo esc_attr( $instance->get_field_id( 'thz_wi_id' ) ); ?>"><?php esc_html_e( 'Custom widget ID:', 'thz-core' ); ?></label>
    <input class="widefat" id="<?php echo esc_attr( $instance->get_field_id( 'thz_wi_id' ) ); ?>" name="<?php echo esc_attr( $instance->get_field_name( 'thz_wi_id' ) ); ?>" type="text" value="<?php echo esc_attr( $value_id ); ?>"/>
    <small><?php esc_html_e( 'This option will replace current widget HTML ID. Not used if empty.', 'thz-core' ); ?></small>
</p>
<p>
    <label for="<?php echo esc_attr( $instance->get_field_id( 'thz_wi_class' ) ); ?>"><?php esc_html_e( 'Custom widget class:', 'thz-core' ); ?></label>
    <input class="widefat" id="<?php echo esc_attr( $instance->get_field_id( 'thz_wi_class' ) ); ?>" name="<?php echo esc_attr( $instance->get_field_name( 'thz_wi_class' ) ); ?>" type="text" value="<?php echo esc_attr( $value_class ); ?>"/>
    <small><?php esc_html_e( 'This option will add custom HTML class to widget class names. Not used if empty.', 'thz-core' ); ?></small>
</p>

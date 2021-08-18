<?php if (!defined('FW')) die('Forbidden');
/*
	custom css for slider
*/

add_action('fw_ext_shortcodes_enqueue_static:slider','_thz_slider_css');
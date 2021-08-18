<?php if (!defined('FW')) die('Forbidden');

/*
	custom css for column in

*/

if(!function_exists('_thz_innercolumn_in_css')){
	
	function _thz_innercolumn_in_css($data) {

		return _thz_column_in_css($data);

	}
	add_action('fw_ext_shortcodes_enqueue_static:innercolumn','_thz_innercolumn_in_css');

}
<?php
if (!defined('FW')){
	die('Forbidden');
}
$project_settings = fw()->theme->get_options( 'portfolio_single_settings');
$pf_collected = array();
fw_collect_options($pf_collected, $project_settings);
foreach ($pf_collected as $id => $option) {
    $pf_collected[$id]['value'] = fw_get_db_settings_option($id, isset($option['value']) ? $option['value'] : null);
}

$options = $project_settings;
<?php

if (! defined('FW')) { die('Forbidden'); }

$path 				= fw_ext('shortcodes')->get_shortcode('column')->locate_path('/options.php');
$column_options     = fw_get_variables_from_file($path, array('options' => null));
unset($column_options['options']['columninlayouttab']['options']['spacings']);

$options     		= $column_options['options'];
<?php
if (!defined('FW')){
	die('Forbidden');
}
$site_settings = fw()->theme->get_options( 'site_settings');
$s_collected = array();
fw_collect_options($s_collected, $site_settings);
foreach ($s_collected as $id => $option) {
    $s_collected[$id]['value'] = fw_get_db_settings_option($id, isset($option['value']) ? $option['value'] : null);
}
unset($site_settings['contentlayouttab'],$site_settings['stylingtab']['options']['theme_palette']);


// preloader
$preloader_settings = fw()->theme->get_options('preloader_settings');
$preloader_collected = array();
fw_collect_options($preloader_collected, $preloader_settings);
foreach ($preloader_collected as $id => $option) {
    $preloader_collected[$id]['value'] = fw_get_db_settings_option($id, isset($option['value']) ? $option['value'] : null);
}


// comments
$comments_settings = fw()->theme->get_options('comments_settings');
$comments_collected = array();
fw_collect_options($comments_collected, $comments_settings);
foreach ($comments_collected as $id => $option) {
    $comments_collected[$id]['value'] = fw_get_db_settings_option($id, isset($option['value']) ? $option['value'] : null);
}

$sticky_sidebars = array(

	'stsb' => array(
		'type' => 'thz-multi-options',
		'label' => __('Sticky sidebars', 'creatus'),
		'desc' => esc_html__('Activate/deactive sticky sidebar for left or right sidebar positions.', 'creatus'),
		'value' => array(
			'l' => 'inactive',
			'r' => 'inactive',
		),
		'thz_options' => array(
			'l' => array(
				'type' => 'short-select',
				'title' => esc_html__('Left', 'creatus'),
				'choices' => array(
					'inactive' => esc_html__('Inactive', 'creatus'),
					'active' => esc_html__('Active', 'creatus'),
				),
			),
			'r' => array(
				'type' => 'short-select',
				'title' => esc_html__('Right', 'creatus'),
				'choices' => array(
					'inactive' => esc_html__('Inactive', 'creatus'),
					'active' => esc_html__('Active', 'creatus'),
				),
			),
		)
	),

);

$site_settings['sitemiscellaneous'] = array(
		'title' => __('Miscellaneous', 'creatus'),
		'type' => 'tab',
		'options' => array_merge( $comments_settings, $sticky_sidebars, $preloader_settings )
);

$options = $site_settings;
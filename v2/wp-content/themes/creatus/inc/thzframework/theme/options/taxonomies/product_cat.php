<?php
if (!defined('FW')) {
	die('Forbidden');
}

$cat_options = fw()->theme->get_options( 'taxonomies/category_options');

unset( $cat_options['category_options_tab2']['options']['cat_image']);


$woop_options = fw()->theme->get_options( 'woo_posts_options');
$woop_collected = array();
fw_collect_options($woop_collected, $woop_options);
foreach ($woop_collected as $id => $option) {
	$woop_collected[$id]['value'] = fw_get_db_settings_option($id, isset($option['value']) ? $option['value'] : null);
}


$woom_options = fw()->theme->get_options( 'woo_misc_settings');
$woom_collected = array();
fw_collect_options($woom_collected, $woom_options);
foreach ($woom_collected as $id => $option) {
	$woom_collected[$id]['value'] = fw_get_db_settings_option($id, isset($option['value']) ? $option['value'] : null);
}

unset($woom_options['woocrgrid']);

$extra_cat_options = array(
	'woo_cat' => array(
		'type' => 'addable-popup',
		'value' => array(),
		'label' => __('Custom posts options', 'creatus'),
		'desc'  => esc_html__('Add custom posts options for this page or leave as is for theme defaults.', 'creatus'),
		'template' => esc_html__('Custom posts options are active','creatus'),
		'popup-title' => null,
		'size' => 'large', 
		'limit' => 1,
		'attr' => array(
			'class' => 'custom_options_popup'
		),
		'add-button-text' => esc_html__('Add custom posts options', 'creatus'),
		'sortable' => false,
		'popup-options' => array(
		
			'wooshoptab' => array(
				'title' => __('Shop', 'creatus'),
				'type' => 'tab',
				'lazy_tabs'=> false,
				'options' => array(
					'miscelenousgroup' => array(
						'type' => 'group',
						'attr' => array(
							'class' => 'show-borders'
						),
						'options' => array(
							$woop_options
						)
					)
				)
			),
		
			'woomisctab' => array(
				'title' => __('Miscellaneous', 'creatus'),
				'type' => 'tab',
				'lazy_tabs'=> false,
				'options' => array(
					'miscelenousgroup' => array(
						'type' => 'group',
						'attr' => array(
							'class' => 'show-borders'
						),
						'options' => array(
							$woom_options
						)
					)
				)
			)
		),
	),

);

$options = array(
	'category_options_box' => array(
		'type' => 'box',
		'title'   => __( 'Creatus options', 'creatus' ),
		'options' => array(
			$cat_options,
			$extra_cat_options
		)
	),
);
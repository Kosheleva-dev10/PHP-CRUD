<?php if ( ! defined( 'FW' ) ) die( 'Forbidden' );

$preloader_settings = fw()->theme->get_options( 'preloader_settings');
$comments_settings = fw()->theme->get_options( 'comments_settings');

$options = array(
	$comments_settings,
	
	'ovsrc' => array(
		'type' => 'thz-multi-options',
		'label' => __('Overlay search colors', 'creatus'),
		'desc' => esc_html__('Adjust overlay search colors', 'creatus'),
		'value' => array(
			'o' => '',
			't' => '',
			'b' => '',
		),
		'thz_options' => array(
			'o' => array(
				'type' => 'color',
				'title' => esc_html__('Overlay color', 'creatus'),
				'box' => true
			),
			't' => array(
				'type' => 'color',
				'title' => esc_html__('Text color', 'creatus'),
				'box' => true
			),
			'b' => array(
				'type' => 'color',
				'title' => esc_html__('Input border color', 'creatus'),
				'box' => true
			),
		)
	),

	'emojis' => array(
		'label' => __('Emojis', 'creatus'),
		'desc' => esc_html__('Activate/deactivate emojis.', 'creatus'),
		'type' => 'switch',
		'right-choice' => array(
			'value' => 'inactive',
			'label' => __('Inactive', 'creatus')
		),
		'left-choice' => array(
			'value' => 'active',
			'label' => __('Active', 'creatus')
		),
		'value' => 'inactive'
	),
	
		
	'smoothscroll' => array(
		'label' => __('Smooth scroll', 'creatus'),
		'desc' => esc_html__('Activate/deactivate site smooth scroll effect.', 'creatus'),
		'type' => 'switch',
		'right-choice' => array(
			'value' => 'inactive',
			'label' => __('Inactive', 'creatus')
		),
		'left-choice' => array(
			'value' => 'active',
			'label' => __('Active', 'creatus')
		),
		'value' => 'inactive'
	),

	'sdata' => array(
		'label' => __('Structured data', 'creatus'),
		'desc' => esc_html__('Structured data helps highlight specific website information for search engines.', 'creatus'),
		'type' => 'switch',
		'right-choice' => array(
			'value' => 'inactive',
			'label' => __('Inactive', 'creatus')
		),
		'left-choice' => array(
			'value' => 'active',
			'label' => __('Active', 'creatus')
		),
		'value' => 'active'
	),
	
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
	
	$preloader_settings,
	
);
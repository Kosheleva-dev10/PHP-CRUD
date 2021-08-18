<?php
if (!defined('FW')) {
	die('Forbidden');
}
$options = array(
	'defaults' => array(
		'title' => __('Defaults', 'creatus'),
		'type' => 'tab',
		'options' => array(
			'id' => array(
				'type' => 'unique',
				'length' => 8
			),
			'shortcode' => array(
				'type' => 'textarea',
				'size' => 'large',
				'editor_height' => 200,
				'shortcodes' => true,
				'editor_type' => 'tinymce',
				'wpautop' => false,
				'label' => __('Shortcode', 'creatus'),
				'desc' => esc_html__('Enter any shortcode eg; WooCommerce shortcode', 'creatus'),
				'value' =>''
			),
			
			'bs' => array(
				'type' => 'thz-box-style',
				'label' => __('Container box style', 'creatus'),
				'preview' => true,
				'popup' => true,
				'button-text' => esc_html__('Customize container box style', 'creatus'),
				'desc' => esc_html__('Adjust .thz-parse-shortcode-block box style.', 'creatus'),
				'disable' => array(
					'video',
					'layout',
					'transform',
					'boxsize'
				),
				'units' => array(
					'borderradius',
					'boxsize',
					'padding',
					'margin',
				),
				'value' => array()
			),
			'cmx' => _thz_container_metrics_defaults(),
		)
	),
	'parseshorteffects' => array(
		'title' => __('Effects', 'creatus'),
		'type' => 'tab',
		'options' => array(
			'animate' => array(
				'type' => 'thz-animation',
				'label' => false,
				'value' => array(
					'animate' => 'inactive',
					'effect' => 'thz-anim-fadeIn',
					'duration' => 400,
					'delay' => 0
				)
			),
			'cpx' => _thz_container_parallax_default()
		)
	)
);

<?php
if (!defined('FW')) {
	die('Forbidden');
}
$options = array(
	
	'id' => array(
		'type' => 'unique',
		'length' => 8
	),
	
	'url'    => array(
		'type'  => 'text',
		'label' => __( 'Page url', 'creatus' ),
		'desc'  => esc_html__( 'Insert url of the page you need parsed', 'creatus' ),
		'attr'  => array(
			'class' => 'thz-fetch-parse-page'
		)
	),
	
	'cache' => array(
		'type' => 'thz-multi-options',
		'label' => __('Cache', 'creatus'),
		'desc' => esc_html__('Set default cache time. Hours cache time; 0.5 = 30 minutes. See help for more info.', 'creatus'),
		'help' => esc_html__('Days -1 means keep the data forever. Auto update works for files only and it will check if the remote file has changed and if yes new data is than retrieved. This is perfect for files that might get updated periodically like GitHub md files. Note that new data is fetched on every post update.', 'creatus'),
		'value' => array(
			'days' => -1,
			'hours' => 0,
			'auto' => 'active',
		),
		'thz_options' => array(
			'days' => array(
				'type' => 'spinner',
				'title' => esc_html__('Days', 'creatus'),
				'addon' => 'd',
				'min' => -1,
				'value' => 7,
			),
			'hours' => array(
				'type' => 'spinner',
				'title' => esc_html__('Hours', 'creatus'),
				'addon' => 'h',
				'value' => 0,
				'min' => 0,
				'step' => 0.1
			),
			'auto' => array(
				'type' => 'short-select',
				'title' => esc_html__('Auto update', 'creatus'),
				'choices' => array(
					'active' => esc_html__('Active', 'creatus'),
					'inactive' => esc_html__('Inactive', 'creatus')
				)
			),

		)
	),
	
	'markdown' => array(
		'type' => 'thz-multi-options',
		'label' => __('Markdown language', 'creatus'),
		'desc' => esc_html__('Adjust markdown language parsing. Useful if serving pages that use markup language.', 'creatus'),
		'value' => array(
			'parsing' => 'active',
			'engine' => 'parsedownextra',
			'escaped' => 'active',
		),
		'thz_options' => array(
			'parsing' => array(
				'type' => 'short-select',
				'title' => esc_html__('Parsing', 'creatus'),
				'attr' => array(
					'class' => 'thz-select-switch'
				),
				'choices' => array(
					'active' => array(
						'text' => esc_html__('Active', 'creatus'),
						'attr' => array(
							'data-enable' => '.thz-mh-fw-edit-options-modal-markdown-engine,.thz-mh-fw-edit-options-modal-markdown-escaped'
						)
					),
					'inactive' => array(
						'text' => esc_html__('Inactive', 'creatus'),
						'attr' => array(
							'data-disable' => '.thz-mh-fw-edit-options-modal-markdown-engine,.thz-mh-fw-edit-options-modal-markdown-escaped'
						)
					),
				)
			),
			'engine' => array(
				'type' => 'select',
				'title' => esc_html__('Parsing engine', 'creatus'),
				'choices' => array(
					'parsedown' => esc_html__('Parsedown', 'creatus'),
					'parsedownextra' => esc_html__('Parsedown Extra', 'creatus')
				)
			),
			'escaped' => array(
				'type' => 'select',
				'title' => esc_html__('Escape HTML', 'creatus'),
				'choices' => array(
					'active' => esc_html__('Active', 'creatus'),
					'inactive' => esc_html__('Inactive', 'creatus')
				)
			),

		)
	),
	
	'bs' => array(
		'type' => 'thz-box-style',
		'label' => __('Container box style', 'creatus'),
		'preview' => true,
		'popup' => true,
		'button-text' => esc_html__('Customize container box style', 'creatus'),
		'desc' => esc_html__('Adjust .thz-parsed-page-content box style.', 'creatus'),
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
	
	'cmx' => _thz_container_metrics_defaults()
);
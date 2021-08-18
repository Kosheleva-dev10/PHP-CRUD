<?php
if (!defined('FW')) {
	die('Forbidden');
}
$options = array(
	'counterdefaults' => array(
		'title' => __('Defaults', 'creatus'),
		'type' => 'tab',
		'options' => array(
			'id' => array(
				'type' => 'unique',
				'length' => 8
			),
			'counter' => array(
				'type' => 'thz-multi-options',
				'label' => __('Counter setup', 'creatus'),
				'desc' => esc_html__('Setup your counter.', 'creatus'),
				'value' => array(
					'count_from' => 0,
					'count_to' => 888,
					'duration' => 2000
				),
				'thz_options' => array(
					'count_from' => array(
						'type' => 'short-text',
						'title' => esc_html__('Count from', 'creatus')
					),
					'count_to' => array(
						'type' => 'short-text',
						'title' => esc_html__('Count to', 'creatus')
					),
					'duration' => array(
						'type' => 'spinner',
						'addon' => 'v',
						'min' => 100,
						'max' => 10000000000,
						'step' => 100,
						'title' => esc_html__('Duration', 'creatus')
					)
				)
			),
			'box_style' => array(
				'type' => 'thz-box-style',
				'label' => __('Box style', 'creatus'),
				'preview' => true,
				'popup' => true,
				'button-text' => esc_html__('Customize counter holder box style', 'creatus'),
				'desc' => esc_html__('Adjust .thz-counter box style', 'creatus'),
				'disable' => array('video'),
				'value' => array()
			),
			'f' => array(
				'label' => __('Counter font', 'creatus'),
				'type' => 'thz-typography',
				'value' => array(
					'size' 			=> 50,
				),
				'disable' => array('hovered','transform'),
				'desc' => esc_html__('Adjust counter font metrics', 'creatus')
			),
			
			'cmx' => _thz_container_metrics_defaults()
		)
	),
	'counterunitsettings' => array(
		'title' => __('Unit', 'creatus'),
		'type' => 'tab',
		'options' => array(
			'unit_mx' => array(
				'type' => 'thz-multi-options',
				'label' => __('Counter unit', 'creatus'),
				'desc' => esc_html__('Select counter unit and set its size, space, position and color.', 'creatus'),
				'value' => array(
					'ty' => 'textual',
					't' => '',
					'i' => 'fa fa-dollar',
					's' => 50,
					'c' => '',
					'sp' => 10,
					'p' => 'left'
				),
				'thz_options' => array(
					'ty' => array(
						'title' => esc_html__('Type', 'creatus'),
						'type' => 'short-select',
						'value' => 'show',
						'attr' => array(
							'class' => 'thz-select-switch'
						),
						'choices' => array(
							'textual' => array(
								'text' => esc_html__('Textual', 'creatus'),
								'attr' => array(
									'data-enable' => '.unit_sep-text-parent',
									'data-disable' => '.unit_sep-icon-parent'
								)
							),
							'icon' => array(
								'text' => esc_html__('Icon', 'creatus'),
								'attr' => array(
									'data-enable' => '.unit_sep-icon-parent',
									'data-disable' => '.unit_sep-text-parent'
								)
							)
						)
					),
					't' => array(
						'type' => 'short-text',
						'title' => esc_html__('Unit', 'creatus'),
						'attr' => array(
							'class' => 'unit_sep-text'
						)
					),
					'i' => array(
						'type' => 'icon',
						'title' => esc_html__('Icon', 'creatus'),
						'attr' => array(
							'class' => 'unit_sep-icon'
						)
					),
					's' => array(
						'type' => 'spinner',
						'title' => esc_html__('Size', 'creatus'),
						'addon' => 'px'
					),
					'c' => array(
						'type' => 'color',
						'title' => esc_html__('Color', 'creatus'),
						'box' => true
					),
					'sp' => array(
						'type' => 'spinner',
						'title' => esc_html__('Space', 'creatus'),
						'addon' => 'px',
						'max' => 100
					),
					'p' => array(
						'type' => 'short-select',
						'title' => esc_html__('Position', 'creatus'),
						'choices' => array(
							'top' => esc_html__('Top', 'creatus'),
							'left' => esc_html__('Left', 'creatus'),
							'right' => esc_html__('Right', 'creatus')
						)
					)
				)
			)
		)
	),
	'countereffects' => array(
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
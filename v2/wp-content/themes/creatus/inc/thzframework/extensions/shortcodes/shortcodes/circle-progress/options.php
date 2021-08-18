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
			'box_style' => array(
				'type' => 'thz-box-style',
				'label' => __('Holder box style', 'creatus'),
				'preview' => true,
				'popup' => true,
				'disable' => array('layout','boxsize','transform','video'),
				'units' => array(
					'borderradius',
					'boxsize',
					'padding',
					'margin',
				),
				'button-text' => esc_html__('Customize progress holder box style', 'creatus'),
				'desc' => esc_html__('Adjust .thz-circle-progress-holder  box style', 'creatus'),
				'value' => array()
			),
			'progress' => array(
				'type' => 'thz-multi-options',
				'label' => __('Progress', 'creatus'),
				'desc' => esc_html__('Setup your progress bar size and animation.', 'creatus'),
				'value' => array(
					'size' => 170,
					'thickness' => 8,
					'tipshape' => 'round',
					'percent' => 80,
					'duration' => 1000,
					'direction' => 'false'
				),
				'thz_options' => array(
					'size' => array(
						'type' => 'spinner',
						'title' => esc_html__('Size', 'creatus'),
						'addon' => 'px',
						'min' => 1
					),
					'thickness' => array(
						'type' => 'spinner',
						'title' => esc_html__('Bar width', 'creatus'),
						'addon' => 'px',
						'min' => 1
					),
					'tipshape' => array(
						'type' => 'short-select',
						'title' => 'Bar tip shape',
						'choices' => array(
							'square' => esc_html__('Square', 'creatus'),
							'round' => esc_html__('Round', 'creatus'),
							'butt' => esc_html__('Butt', 'creatus')
						)
					),
					'percent' => array(
						'type' => 'spinner',
						'title' => esc_html__('Percent', 'creatus'),
						'addon' => '%',
						'min' => 1,
						'max' => 100
					),
					'duration' => array(
						'type' => 'spinner',
						'addon' => 'v',
						'min' => 100,
						'max' => 100000,
						'step' => 100,
						'title' => esc_html__('Duration', 'creatus')
					),
					'direction' => array(
						'type' => 'short-select',
						'title' => 'Direction',
						'choices' => array(
							'false' => esc_html__('Clockwise', 'creatus'),
							'true' => esc_html__('Counter clockwise', 'creatus')
						)
					)
				)
			),
			'cmx' => _thz_container_metrics_defaults()
		)
	),
	'progresssettings' => array(
		'title' => __('Progress', 'creatus'),
		'type' => 'tab',
		'options' => array(
			'progress_colors' => array(
				'type' => 'thz-multi-options',
				'label' => __('Progress bar colors', 'creatus'),
				'desc' => esc_html__('Setup your progress bar colors. If multiple fill colors, bar fill becomes a gradient.', 'creatus'),
				'value' => array(
					'empty_fill' => '#eaeaea',
					'fill1' => 'color_1',
					'fill2' => '',
					'fill3' => '',
					'fill4' => ''
				),
				'thz_options' => array(
					'empty_fill' => array(
						'type' => 'color',
						'title' => esc_html__('Background', 'creatus'),
						'box'=> true
					),
					'fill1' => array(
						'type' => 'color',
						'title' => esc_html__('Fill collor 1', 'creatus'),
						'box'=> true
					),
					'fill2' => array(
						'type' => 'color',
						'title' => esc_html__('Fill collor 2', 'creatus'),
						'box'=> true
					),
					'fill3' => array(
						'type' => 'color',
						'title' => esc_html__('Fill collor 3', 'creatus'),
						'box'=> true
					),
					'fill4' => array(
						'type' => 'color',
						'title' => esc_html__('Fill collor 4', 'creatus'),
						'box'=> true
					)
				)
			),
			'progress_value' => array(
				'type' => 'multi-picker',
				'label' => false,
				'desc' => false,
				'picker' => array(
					'picked' => array(
						'label' => __('Progress value', 'creatus'),
						'desc' => esc_html__('Choose progress circle value.', 'creatus'),
						'type' => 'switch',
						'right-choice' => array(
							'value' => 'percent',
							'label' => __('Percent', 'creatus')
						),
						'left-choice' => array(
							'value' => 'text',
							'label' => __('Text', 'creatus')
						),
						'value' => 'percent'
					)
				),
				'choices' => array(
					'percent' => array(
						'percent_settings' => array(
							'type' => 'thz-multi-options',
							'label' => '',
							'desc' => esc_html__('Adjust progress circle value look and feel', 'creatus'),
							'value' => array(
								'show_unit' => 'show',
								'font_size' => 28,
								'font_weight' => 'thz-fw-400',
								'font_style' => 'normal',
								'color' => ''
							),
							'thz_options' => array(
								'show_unit' => array(
									'type' => 'short-select',
									'title' => 'Show percent unit',
									'choices' => array(
										'show' => esc_html__('Show', 'creatus'),
										'hide' => esc_html__('Hide', 'creatus')
									)
								),
								'font_size' => array(
									'type' => 'spinner',
									'title' => esc_html__('Font size', 'creatus'),
									'addon' => 'px',
									'min' => 10,
									'max' => 100
								),
								'font_weight' => array(
									'type' => 'short-select',
									'title' => 'Font weight',
									'choices' => array(
										'thz-fw-100' => esc_html__('100', 'creatus'),
										'thz-fw-200' => esc_html__('200', 'creatus'),
										'thz-fw-300' => esc_html__('300', 'creatus'),
										'thz-fw-400' => esc_html__('400', 'creatus'),
										'thz-fw-500' => esc_html__('500', 'creatus'),
										'thz-fw-600' => esc_html__('600', 'creatus'),
										'thz-fw-700' => esc_html__('700', 'creatus'),
										'thz-fw-800' => esc_html__('800', 'creatus'),
										'thz-fw-900' => esc_html__('900', 'creatus')
									)
								),
								'font_style' => array(
									'type' => 'short-select',
									'title' => 'Font style',
									'choices' => array(
										'normal' => esc_html__('Normal', 'creatus'),
										'thz-font-italic' => esc_html__('Italic', 'creatus')
									)
								),
								'color' => array(
									'type' => 'color',
									'title' => esc_html__('Color', 'creatus'),
									'box'=> true
								)
							)
						)
					),
					'text' => array(
						'text_settings' => array(
							'type' => 'thz-multi-options',
							'label' => '',
							'desc' => esc_html__('Adjust progress text', 'creatus'),
							'value' => array(
								'text' => '',
								'font_size' => 28,
								'font_weight' => 'thz-fw-400',
								'font_style' => 'normal',
								'color' => ''
							),
							'thz_options' => array(
								'text' => array(
									'type' => 'text',
									'title' => esc_html__('Text', 'creatus')
								),
								'font_size' => array(
									'type' => 'spinner',
									'title' => esc_html__('Font size', 'creatus'),
									'addon' => 'px',
									'min' => 10,
									'max' => 100
								),
								'font_weight' => array(
									'type' => 'short-select',
									'title' => 'Font weight',
									'choices' => array(
										'thz-fw-100' => esc_html__('100', 'creatus'),
										'thz-fw-200' => esc_html__('200', 'creatus'),
										'thz-fw-300' => esc_html__('300', 'creatus'),
										'thz-fw-400' => esc_html__('400', 'creatus'),
										'thz-fw-500' => esc_html__('500', 'creatus'),
										'thz-fw-600' => esc_html__('600', 'creatus'),
										'thz-fw-700' => esc_html__('700', 'creatus'),
										'thz-fw-800' => esc_html__('800', 'creatus'),
										'thz-fw-900' => esc_html__('900', 'creatus')
									)
								),
								'font_style' => array(
									'type' => 'short-select',
									'title' => 'Font style',
									'choices' => array(
										'normal' => esc_html__('Normal', 'creatus'),
										'thz-font-italic' => esc_html__('Italic', 'creatus')
									)
								),
								'color' => array(
									'type' => 'color',
									'title' => esc_html__('Color', 'creatus'),
									'box'=> true
								)
							)
						),
						'icon' => array(
							'type' => 'thz-icon',
							'value' => '',
							'label' => __('Select Icon', 'creatus'),
							'desc' => esc_html__('Not used if empty', 'creatus')
						),
						'icon_settings' => array(
							'type' => 'thz-multi-options',
							'label' => __('Icon style', 'creatus'),
							'desc' => esc_html__('Set icon style. Space is the space between the icon and the surrounding elements. If top positioned, space is vertical padding.', 'creatus'),
							'value' => array(
								'size' => 'inherit',
								'position' => 'left',
								'space' => 10,
								'color' => ''
							),
							'thz_options' => array(
								'size' => array(
									'type' => 'select',
									'title' => esc_html__('Icon size', 'creatus'),
									'choices' => array(
										'inherit' => esc_html__('Inherit (text font size)', 'creatus'),
										'thz-is-md' => esc_html__('Medium (em)', 'creatus'),
										'thz-is-lg' => esc_html__('Large (em)', 'creatus'),
										'thz-is-xl' => esc_html__('X-large (em)', 'creatus'),
										'thz-is-x4' => esc_html__('Jumbo (em)', 'creatus'),
										'thz-is-x5' => esc_html__('Mega (em)', 'creatus'),
										'thz-is-sm-px' => esc_html__('Small (px)', 'creatus'),
										'thz-is-md-px' => esc_html__('Medium (px)', 'creatus'),
										'thz-is-lg-px' => esc_html__('Large (px)', 'creatus'),
										'thz-is-x4-px' => esc_html__('X-Large (px)', 'creatus'),
										'thz-is-x5-px' => esc_html__('Jumbo (px)', 'creatus')
									)
								),
								'position' => array(
									'type' => 'short-select',
									'title' => esc_html__('Icon position', 'creatus'),
									'choices' => array(
										'left' => esc_html__('Left', 'creatus'),
										'right' => esc_html__('Right', 'creatus')
									)
								),
								'space' => array(
									'type' => 'spinner',
									'title' => esc_html__('Space', 'creatus'),
									'addon' => 'px',
									'min' => 0,
									'max' => 100
								),
								'color' => array(
									'type' => 'color',
									'title' => esc_html__('Color', 'creatus'),
									'box'=> true
								)
							)
						)
					)
				)
			)
		)
	),
	'progressoutersettings' => array(
		'title' => __('Outer circle', 'creatus'),
		'type' => 'tab',
		'options' => array(
			'outer_background' => array(
				'type' => 'thz-box-style',
				'label' => __('Background', 'creatus'),
				'preview' => true,
				'popup' => true,
				'button-text' => esc_html__('Customize outer circle background', 'creatus'),
				'desc' => esc_html__('Adjust .thz-circle-progress background.', 'creatus'),
				'disable' => array('layout','padding','margin','borders','borderradius','boxsize','transform','boxshadow','video'),
				'value' => array()
			),
			'outer_settings' => array(
				'type' => 'thz-multi-options',
				'label' => __('Metrics', 'creatus'),
				'desc' => esc_html__('Adjust outer circle metrics', 'creatus'),
				'value' => array(
					'padding' => 0,
					'border_size' => 0,
					'border_style' => 'solid',
					'border_color' => ''
				),
				'thz_options' => array(
					'padding' => array(
						'type' => 'spinner',
						'title' => esc_html__('Padding', 'creatus'),
						'addon' => 'px',
						'min' => 0
					),
					'border_size' => array(
						'type' => 'spinner',
						'title' => esc_html__('Border size', 'creatus'),
						'addon' => 'px',
						'min' => 0
					),
					'border_style' => array(
						'type' => 'short-select',
						'title' => 'Border Style',
						'choices' => array(
							'solid' => esc_html__('Solid', 'creatus'),
							'dashed' => esc_html__('Dashed', 'creatus'),
							'dotted' => esc_html__('Dotted', 'creatus')
						)
					),
					'border_color' => array(
						'type' => 'color',
						'title' => esc_html__('Border Color', 'creatus'),
						'box'=> true
					)
				)
			)
		)
	),
	'progressinnersettings' => array(
		'title' => __('Inner circle', 'creatus'),
		'type' => 'tab',
		'options' => array(
			'inner_background' => array(
				'type' => 'thz-box-style',
				'label' => __('Background', 'creatus'),
				'preview' => true,
				'popup' => true,
				'button-text' => esc_html__('Customize inner circle background', 'creatus'),
				'desc' => esc_html__('Adjust .thz-circle-progress-inner background.', 'creatus'),
				'disable' => array('layout','padding','margin','borders','borderradius','boxsize','transform','boxshadow','video'),
				'value' => array(
					'background' => array(
						'type' => 'color',
						'color' => '#ffffff',
					)
				)
			),
			'inner_border' => array(
				'type' => 'thz-multi-options',
				'label' => __('Border', 'creatus'),
				'desc' => esc_html__('Adjust inner circle border', 'creatus'),
				'value' => array(
					'border_size' => 0,
					'border_style' => 'solid',
					'border_color' => ''
				),
				'thz_options' => array(
					'border_size' => array(
						'type' => 'spinner',
						'title' => esc_html__('Size', 'creatus'),
						'addon' => 'px',
						'min' => 0
					),
					'border_style' => array(
						'type' => 'short-select',
						'title' => 'Style',
						'choices' => array(
							'solid' => esc_html__('Solid', 'creatus'),
							'dashed' => esc_html__('Dashed', 'creatus'),
							'dotted' => esc_html__('Dotted', 'creatus')
						)
					),
					'border_color' => array(
						'type' => 'color',
						'title' => esc_html__('Color', 'creatus'),
						'box'=> true
					)
				)
			)
		)
	),
	'progresstitlesettings' => array(
		'title' => __('Title', 'creatus'),
		'type' => 'tab',
		'options' => array(
			'title' => array(
				'type' => 'text',
				'value' => '',
				'label' => __('Title', 'creatus'),
				'desc' => esc_html__('Add progress title.', 'creatus')
			),
			'title_settings' => array(
				'type' => 'thz-multi-options',
				'label' => __('Title style', 'creatus'),
				'desc' => esc_html__('Adjust title look and feel.', 'creatus'),
				'value' => array(
					'font_size' => 18,
					'font_weight' => 'thz-fw-600',
					'font_style' => 'normal',
					'margin' => 15,
					'color' => ''
				),
				'thz_options' => array(
					'font_size' => array(
						'type' => 'spinner',
						'title' => esc_html__('Font size', 'creatus'),
						'addon' => 'px',
						'min' => 0,
						'max' => 100
					),
					'font_weight' => array(
						'type' => 'short-select',
						'title' => 'Font weight',
						'choices' => array(
							'thz-fw-100' => esc_html__('100', 'creatus'),
							'thz-fw-200' => esc_html__('200', 'creatus'),
							'thz-fw-300' => esc_html__('300', 'creatus'),
							'thz-fw-400' => esc_html__('400', 'creatus'),
							'thz-fw-500' => esc_html__('500', 'creatus'),
							'thz-fw-600' => esc_html__('600', 'creatus'),
							'thz-fw-700' => esc_html__('700', 'creatus'),
							'thz-fw-800' => esc_html__('800', 'creatus'),
							'thz-fw-900' => esc_html__('900', 'creatus')
						)
					),
					'font_style' => array(
						'type' => 'short-select',
						'title' => 'Font style',
						'choices' => array(
							'normal' => esc_html__('Normal', 'creatus'),
							'thz-font-italic' => esc_html__('Italic', 'creatus')
						)
					),
					'margin' => array(
						'type' => 'spinner',
						'title' => esc_html__('Top margin', 'creatus'),
						'addon' => 'px',
						'min' => -100,
						'max' => 100
					),
					'color' => array(
						'type' => 'color',
						'title' => esc_html__('Color', 'creatus'),
						'box'=> true
					)
				)
			),
			'title_separator' => array(
				'type' => 'thz-multi-options',
				'label' => __('Title separator', 'creatus'),
				'desc' => esc_html__('Adjust title separator. Separator is located between title and text.', 'creatus'),
				'help' => esc_html__('Width and height can be px or percentage. If no unit used px is default.', 'creatus'),
				'value' => array(
					'width' => '70%',
					'height' => 0,
					'margin' => 15,
					'color' => ''
				),
				'thz_options' => array(
					'width' => array(
						'type' => 'short-text',
						'title' => esc_html__('Width', 'creatus')
					),
					'height' => array(
						'type' => 'short-text',
						'title' => esc_html__('Height', 'creatus')
					),
					'margin' => array(
						'type' => 'spinner',
						'title' => esc_html__('Top margin', 'creatus'),
						'addon' => 'px',
						'min' => 0,
					),
					'color' => array(
						'type' => 'color',
						'title' => esc_html__('Color', 'creatus'),
						'box'=> true
					)
				)
			)
		)
	),
	'progresstextsettings' => array(
		'title' => __('Text', 'creatus'),
		'type' => 'tab',
		'options' => array(
			'text' => array(
				'type' => 'wp-editor',
				'size' => 'large',
				'editor_height' => 100,
				'editor_type' => 'tinymce',
				'wpautop' => false,
				'shortcodes' => false,
				'value' => '',
				'label' => __('Text', 'creatus')
			),
			'text_settings' => array(
				'type' => 'thz-multi-options',
				'label' => __('Text style', 'creatus'),
				'desc' => esc_html__('Adjust text look and feel', 'creatus'),
				'value' => array(
					'font_size' => 16,
					'font_weight' => 'thz-fw-400',
					'font_style' => 'normal',
					'margin' => 10,
					'color' => ''
				),
				'thz_options' => array(
					'font_size' => array(
						'type' => 'spinner',
						'title' => esc_html__('Font size', 'creatus'),
						'addon' => 'px',
						'min' => 10,
						'max' => 100
					),
					'font_weight' => array(
						'type' => 'short-select',
						'title' => 'Font weight',
						'choices' => array(
							'thz-fw-100' => esc_html__('100', 'creatus'),
							'thz-fw-200' => esc_html__('200', 'creatus'),
							'thz-fw-300' => esc_html__('300', 'creatus'),
							'thz-fw-400' => esc_html__('400', 'creatus'),
							'thz-fw-500' => esc_html__('500', 'creatus'),
							'thz-fw-600' => esc_html__('600', 'creatus'),
							'thz-fw-700' => esc_html__('700', 'creatus'),
							'thz-fw-800' => esc_html__('800', 'creatus'),
							'thz-fw-900' => esc_html__('900', 'creatus')
						)
					),
					'font_style' => array(
						'type' => 'short-select',
						'title' => 'Font style',
						'choices' => array(
							'normal' => esc_html__('Normal', 'creatus'),
							'thz-font-italic' => esc_html__('Italic', 'creatus')
						)
					),
					'margin' => array(
						'type' => 'spinner',
						'title' => esc_html__('Top margin', 'creatus'),
						'addon' => 'px',
						'min' => -100,
						'max' => 100
					),
					'color' => array(
						'type' => 'color',
						'title' => esc_html__('Color', 'creatus'),
						'box'=> true
					)
				)
			)
		)
	),
	'progresseffects' => array(
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
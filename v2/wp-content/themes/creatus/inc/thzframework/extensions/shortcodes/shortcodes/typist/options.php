<?php
if (!defined('FW')) {
	die('Forbidden');
}
$options = array(
	'defaulttab' => array(
		'title' => __('Defaults', 'creatus'),
		'type' => 'tab',
		'options' => array(
			'id' => array(
				'type' => 'unique',
				'length' => 8
			),
			'strings' => array(
				'type' => 'addable-option',
				'value' => array(
					'First String'
				),
				'label' => __('Strings', 'creatus'),
				'desc' => esc_html__('Click the button to add new string ', 'creatus'),
				'option' => array(
					'type' => 'text'
				),
				'add-button-text' => esc_html__('Add new string', 'creatus'),
				'sortable' => true
			),
			'before' => array(
				'type' => 'text',
				'label' => __('String before', 'creatus'),
				'desc' => esc_html__('Add a string before typist', 'creatus')
			),
			'after' => array(
				'type' => 'text',
				'label' => __('String after', 'creatus'),
				'desc' => esc_html__('Add a string after the typist', 'creatus')
			),
			'brakes' => array(
				'label' => __('Text brakes', 'creatus'),
				'desc' => __('Add text brake before or after typist', 'creatus'),
				'type' => 'select',
				'value' => 'none',
				'choices' => array(
					'none' => __('Do not add brakes', 'creatus'),
					'before' => __('Add brake before typist', 'creatus'),
					'after' => __('Add brake after typist', 'creatus'),
					'both' => __('Add brake before and after typist', 'creatus'),
				)
			),			
		)
	),
	'dividersettings' => array(
		'title' => __('Metrics & Layout', 'creatus'),
		'type' => 'tab',
		'options' => array(
			'bs' => array(
				'type' => 'thz-box-style',
				'label' => __('Container box style', 'creatus'),
				'preview' => false,
				'popup' => true,
				'desc' => esc_html__('Adjust .thz-typist-container box style', 'creatus'),
				'button-text' => __('Customize container box style', 'creatus'),
				'disable' => array('layout','boxsize','transform','video'),
				'units' => array(
					'borderradius',
					'boxsize',
					'padding',
					'margin',
				),
				'value' => array()
			),
			'metrics' => array(
				'type' => 'thz-multi-options',
				'label' => __('Script settings', 'creatus'),
				'desc' => esc_html__('Adjust typed script settings', 'creatus'),
				'value' => array(
					'typespeed' => 30,
					'startdelay' => 0,
					'backspeed' => 30,
					'fadeout' => 0,
					'loop' => 0,
					'loopcount' => 0,
					'shuffle' => 0,
					'showcursor' => 1,
					'cursorchar' => '|'
				),
				'breakafter' => 'fadeout',
				'thz_options' => array(
					'typespeed' => array(
						'type' => 'spinner',
						'title' => esc_html__('Type speed', 'creatus'),
						'addon' => 'ms',
						'min' => 0,
						'max' => 100000000
					),
					'startdelay' => array(
						'type' => 'spinner',
						'title' => esc_html__('Start delay', 'creatus'),
						'addon' => 'ms',
						'min' => 0,
						'max' => 100000000
					),
					'backspeed' => array(
						'type' => 'spinner',
						'title' => esc_html__('Back speed', 'creatus'),
						'addon' => 'ms',
						'min' => 0,
						'max' => 100000000
					),
					'fadeout' => array(
						'type' => 'short-select',
						'title' => esc_html__('Fade out', 'creatus'),
						'choices' => array(
							0 => esc_html__('False', 'creatus'),
							1 => esc_html__('True', 'creatus')
						)
					),
					'loop' => array(
						'type' => 'short-select',
						'title' => esc_html__('Loop', 'creatus'),
						'attr'=> array(
							'class' => 'thz-select-switch'
						),
						'choices' => array(
							0 => array(
								'text' => esc_html__('False', 'creatus'),
								'attr' => array(
									'data-disable' => '.op-loop-parent'
								)
							),
							1 => array(
								'text' => esc_html__('True', 'creatus'),
								'attr' => array(
									'data-enable' => '.op-loop-parent'
								)
							),
						)
					),
					'loopcount' => array(
						'type' => 'spinner',
						'title' => esc_html__('Loop count', 'creatus'),
						'addon' => '#',
						'min' => 0,
						'attr'=> array(
							'class' => 'op-loop'
						)
					),
					'shuffle' => array(
						'type' => 'short-select',
						'title' => esc_html__('Shuffle', 'creatus'),
						'choices' => array(
							0 => esc_html__('False', 'creatus'),
							1 => esc_html__('True', 'creatus')
						)
					),
					'showcursor' => array(
						'type' => 'short-select',
						'title' => esc_html__('Show cursor', 'creatus'),
						'attr'=> array(
							'class' => 'thz-select-switch'
						),
						'choices' => array(
							0 => array(
								'text' => esc_html__('False', 'creatus'),
								'attr' => array(
									'data-disable' => '.op-curs-parent'
								)
							),
							1 => array(
								'text' => esc_html__('True', 'creatus'),
								'attr' => array(
									'data-enable' => '.op-curs-parent'
								)
							),
						)
					),
					'cursorchar' => array(
						'type' => 'short-text',
						'title' => esc_html__('Cursor char', 'creatus'),
						'attr'=> array(
							'class' => 'op-curs'
						)
					)
				)
			),
			'tag' => array(
				'type' => 'short-select',
				'title' => esc_html__('HTML tag', 'creatus'),
				'desc' => esc_html__('Set .thz-typist-holder HTML tag.', 'creatus'),
				'value' => 'h2',
				'choices' => array(
					'h1' => esc_html__('H1', 'creatus'),
					'h2' => esc_html__('H2', 'creatus'),
					'h3' => esc_html__('H3', 'creatus'),
					'h4' => esc_html__('H4', 'creatus'),
					'h5' => esc_html__('H5', 'creatus'),
					'h6' => esc_html__('H6', 'creatus'),
					'div' => esc_html__('Div', 'creatus'),
					'span' => esc_html__('Span', 'creatus')
				)
			),
			'font' => array(
				'type' => 'thz-typography',
				'label' => __('Font settings', 'creatus'),
				'desc' => esc_html__('Adjust font settings.', 'creatus'),
				'value' => array(),
				'disable' => array('hovered')
			),
			'cmx' => _thz_container_metrics_defaults()
		)
	),
	
	
	'effectstab' => array(
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
					'delay' => 100
				)
			),
			'gr' => array(
				'type' => 'thz-multi-options',
				'label' => __('Gradient text', 'creatus'),
				'desc' => esc_html__('Use gradient as typist text color. See help for more info.', 'creatus'),
				'help' => esc_html__('Fallback is color 1 on non webkit browsers. Typist color from Font settings is not used if gradient is active.', 'creatus'),
				'value' => array(
					'mode' => 'inactive',
					'gradient' => 'horizontal',
					'color1' => '#3f51b5',
					'color2' => '#f44336'
				),
				'thz_options' => array(
					'mode' => array(
						'title' => esc_html__('Mode', 'creatus'),
						'type' => 'short-select',
						'attr' => array(
							'class' => 'thz-select-switch'
						),
						'choices' => array(
							'inactive' => array(
								'text' => esc_html__('Inactive', 'creatus'),
								'attr' => array(
									'data-disable' => '.gr-gradient-parent,.gr-color-1-parent,.gr-color-2-parent'
								)
							),
							'active' => array(
								'text' => esc_html__('Active', 'creatus'),
								'attr' => array(
									'data-enable' => '.gr-gradient-parent,.gr-color-1-parent,.gr-color-2-parent'
								)
							)
						)
					),
					'gradient' => array(
						'type' => 'short-select',
						'title' => esc_html__('Gradient type', 'creatus'),
						'attr' => array(
							'class' => 'gr-gradient'
						),
						'choices' => array(
							'vertical' => esc_html__('Vertical', 'creatus'),
							'horizontal' => esc_html__('Horizontal', 'creatus'),
							'radial' => esc_html__('Radial', 'creatus')
						)
					),
					'color1' => array(
						'type' => 'color',
						'title' => esc_html__('Color 1', 'creatus'),
						'box' => true,
						'attr' => array(
							'class' => 'gr-color-1'
						)
					),
					'color2' => array(
						'type' => 'color',
						'title' => esc_html__('Color 2', 'creatus'),
						'box' => true,
						'attr' => array(
							'class' => 'gr-color-2'
						)
					)
				)
			),
			
			'cpx' => _thz_container_parallax_default()
		)
	)
);
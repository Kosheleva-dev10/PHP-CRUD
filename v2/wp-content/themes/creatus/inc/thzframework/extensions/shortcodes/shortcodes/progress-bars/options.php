<?php
if (!defined('FW')) {
	die('Forbidden');
}
$options = array(
	'progressdefaults' => array(
		'title' => __('Defaults', 'creatus'),
		'type' => 'tab',
		'options' => array(
			'id' => array(
				'type' => 'unique',
				'length' => 8
			),
			'bit' => array(
				'type' => 'text',
				'value' => 'Set 1',
				'label' => __('Set title', 'creatus'),
				'desc' => esc_html__('This is progress bars title used in builder only.', 'creatus')
			),

			'progressbars' => array(
				'type' => 'addable-popup',
				'label' => __('Progress bars', 'creatus'),
				'popup-title' => esc_html__('Add/Edit Progress bar', 'creatus'),
				'desc' => esc_html__('Click on the button to add/edit progress bars', 'creatus'),
				'template' => '{{=title}}',
				'size' => 'large',
				'popup-options' => array(
					'default' => array(
						'title' => __('Defaults', 'creatus'),
						'type' => 'tab',
						'options' => array(
							'id' => array(
								'type' => 'unique',
								'length' => 8
							),
							'title' => array(
								'type' => 'text',
								'label' => __('Title', 'creatus'),
								'value' => 'Progress title',
								'desc' => esc_html__('Set progress title', 'creatus')
							),
							'percentage' => array(
								'type' => 'thz-spinner',
								'label' => __('Percentage', 'creatus'),
								'desc' => esc_html__('Set progress bar percentage', 'creatus'),
								'addon' => '%',
								'min' => 1,
								'max' => 100,
								'value' => '80'
							),
							'duration' => array(
								'type' => 'short-text',
								'label' => __('Duration', 'creatus'),
								'value' => '1000',
								'desc' => esc_html__('Set animation duration in milliseconds. 1000ms = 1s', 'creatus')
							),
							
							'cab' => array(
								'type' => 'checkboxes',
								'value' => array(
									'show' => false,
									'animate' => false,
								),
								'label' => __('Candy bar', 'creatus'),
								'desc' => esc_html__('Adjust progress candy bar', 'creatus'),
								'choices' => array(
									'show' => esc_html__('Show', 'creatus'),
									'animate' => esc_html__('Animate', 'creatus'),
								),
								'inline' => true
							),
						)
					),
					'styling' => array(
						'title' => __('Styling', 'creatus'),
						'type' => 'tab',
						'options' => array(

							'phbs' => array(
								'type' => 'thz-box-style',
								'label' => 'Progress holder',
								'preview' => true,
								'button-text' => esc_html__('Customize progress holder box style', 'creatus'),
								'desc' => esc_html__('Adjust .thz-progress-bar box style','creatus'),
								'popup' => true,
								'disable' => array('layout','padding','margin','borderradius','boxsize','transform','video'),
								'value' => array(
									'background' => array(
										'type' => 'color',
										'color' => '#efefef',
									)
								)
							),
							'pbs' => array(
								'type' => 'thz-box-style',
								'label' => 'Progress',
								'preview' => false,
								'button-text' => esc_html__('Customize progress box style', 'creatus'),
								'desc' => esc_html__('Adjust .thz-progress-bar-progress box style','creatus'),
								'popup' => true,
								'disable' => array('layout','padding','margin','borderradius','boxsize','transform','video'),
								'value' => array(
									'background' => array(
										'type' => 'color',
										'color' => 'color_1',
									)
								)
							),
							'tic' => array(
								'type' => 'thz-color-picker',
								'value' => '',
								'label' => __('Title color', 'creatus'),
								'desc' => esc_html__('Set progress title color', 'creatus')
							),
							'pec' => array(
								'type' => 'thz-color-picker',
								'value' => '',
								'label' => __('Percent color', 'creatus'),
								'desc' => esc_html__('Set progress percent color', 'creatus')
							)
						)
					)
				)
			),
			'cmx' => _thz_container_metrics_defaults()
		)
	),
	'progressstyling' => array(
		'title' => __('Style', 'creatus'),
		'type' => 'tab',
		'options' => array(
		
			'cbs' => array(
				'type' => 'thz-box-style',
				'label' => __('Container box style', 'creatus'),
				'preview' => true,
				'desc' => esc_html__('Adjust .thz-progress-bars-set box style', 'creatus'),
				'button-text' => esc_html__('Customize container box style', 'creatus'),
				'popup' => true,
				'disable' => array('layout','boxsize','transform','video'),
				'units' => array(
					'borderradius',
					'boxsize',
					'padding',
					'margin',
				),
				'value' => array()
			),	
				
			'style' => array(
				'label' => __('Progress bars style', 'creatus'),
				'desc' => esc_html__('Select progress bars style', 'creatus'),
				'type' => 'select',
				'value' => 'thz-progress-style1',
				'choices' => array(
					'style1' => esc_html__('Style 1 ( Text inside progress. Title left, percent right)', 'creatus'),
					'style2' => esc_html__('Style 2 ( Text inside progress. Percent next to title)', 'creatus'),
					'style3' => esc_html__('Style 3 ( Text above progress. Title left, percent right)', 'creatus')
				)
			),
			'shape' => array(
				'type' => 'multi-picker',
				'label' => false,
				'desc' => false,
				'picker' => array(
					'picked' => array(
						'label' => __('Progress shape type', 'creatus'),
						'desc' => esc_html__('Select progress shape type', 'creatus'),
						'type' => 'radio',
						'value' => 'thz-progress-square',
						'inline' => true,
						'choices' => array(
							'thz-progress-square' => esc_html__('Square', 'creatus'),
							'thz-progress-pill' => esc_html__('Pill', 'creatus'),
							'thz-progress-rounded' => esc_html__('Rounded', 'creatus')
						)
					)
				),
				'choices' => array(
					'thz-progress-rounded' => array(
						'radius' => array(
							'type' => 'thz-spinner',
							'addon' => 'px',
							'min' => 2,
							'max' => 100,
							'value' => 8,
							'label' => __('Border radius', 'creatus'),
							'desc' => esc_html__('Set shape border radius', 'creatus')
						)
					)
				)
			),
			'shp' => array(
				'type' => 'thz-multi-options',
				'value' => array(
					'hp' => 10,
					'vp' => 5,
				),
				'thz_options' => array(
					'hp' => array(
						'type' => 'spinner',
						'title' => esc_html__('Horizontal', 'creatus'),
						'addon' => 'px',
						'min' => 0,
						'max' => 100
					),
					'vp' => array(
						'type' => 'spinner',
						'title' => esc_html__('Vertical', 'creatus'),
						'addon' => 'px',
						'min' => 0,
						'max' => 100
					)
				),
				'label' => __('Shape padding', 'creatus'),
				'desc' => esc_html__('Set shape padding.', 'creatus')
			),
			'fset' => array(
				'type' => 'thz-multi-options',
				'value' => array(
					'fs' => 16,
					'ls' => 0,
				),
				'thz_options' => array(
					'fs' => array(
						'type' => 'spinner',
						'title' => esc_html__('Font size', 'creatus'),
						'addon' => 'px',
						'min' => 0,
						'max' => 100
					),
					'ls' => array(
						'type' => 'spinner',
						'title' => esc_html__('Letter spacing', 'creatus'),
						'addon' => 'px',
						'min' => 0,
						'max' => 50
					)
				),
				'label' => __('Font settings', 'creatus'),
				'desc' => esc_html__('Adjust title and percent text', 'creatus')
			),
			'tit' => array(
				'type' => 'checkboxes',
				'value' => array(
					'bold' => false,
					'uppercase' => false,
					'italic' => false
				),
				'label' => __('Title text', 'creatus'),
				'desc' => esc_html__('Adjust title text', 'creatus'),
				'choices' => array(
					'bold' => esc_html__('Bold', 'creatus'),
					'uppercase' => esc_html__('Uppercase', 'creatus'),
					'italic' => esc_html__('Italic', 'creatus')
				),
				'inline' => true
			),
			'pet' => array(
				'type' => 'checkboxes',
				'value' => array(
					'bold' => false,
					'uppercase' => false,
					'italic' => false
				),
				'label' => __('Percent text', 'creatus'),
				'desc' => esc_html__('Adjust percent text', 'creatus'),
				'choices' => array(
					'bold' => esc_html__('Bold', 'creatus'),
					'italic' => esc_html__('Italic', 'creatus')
				),
				'inline' => true
			)
		)
	),
	
	
	'progressbarseffects' => array(
		'title' => __('Effects', 'creatus'),
		'type' => 'tab',
		'options' => array(
			'animate' => array(
				'type' => 'thz-animation',
				'label' => false,
				'value' => array(
					'animate' => 'inactive',
					'effect' => 'thz-anim-slideIn-up',
					'duration' => 400,
					'delay' => 200
				),
				'addlabel' => esc_html__('Animate progress bars', 'creatus'),
				'adddesc' => esc_html__('Add animation to the progress bars HTML container', 'creatus')
			),
			'cpx' => _thz_container_parallax_default()
		)
	)
);
<?php
if (!defined('FW')) {
	die('Forbidden');
}
$options = array(
	'defaultstab' => array(
		'title' => __('Defaults', 'creatus'),
		'type' => 'tab',
		'options' => array(
			'id' => array(
				'type' => 'unique',
				'length' => 8
			),
			'dotn' => array(
				'type' => 'thz-multi-options',
				'label' => __('Menu metrics', 'creatus'),
				'desc' => esc_html__('Adjust menu metrics', 'creatus'),
				'help' => esc_html__('Show after will show the menu after user has scrolled certain amount of pixels. If set to 0 menu is always shown. Custom top position will let you adjust menu top position. If custom top is set to auto, menu is positioned at the bottom of the widnow.', 'creatus'),
				'value' => array(
					'e' => 'slide',
					's' => 0,
					'left' => 'auto',
					'right' => 10,
					'p' => 'centered',
					'pxp' => 0
				),
				'thz_options' => array(
					'e' => array(
						'type' => 'short-select',
						'title' => esc_html__('Effect', 'creatus'),
						'choices' => array(
							'slide' => esc_html__('Slide in', 'creatus'),
							'fade' => esc_html__('Fade in', 'creatus')
						)
					),
					's' => array(
						'type' => 'spinner',
						'title' => esc_html__('Show after', 'creatus'),
						'addon' => 'px',
						'min' => 0
					),
					'left' => array(
						'type' => 'spinner',
						'title' => esc_html__('Left', 'creatus'),
						'units' => array('px','%','auto'),
					),
					'right' => array(
						'type' => 'spinner',
						'title' => esc_html__('Right', 'creatus'),
						'units' => array('px','%','auto'),
					),
					'p' => array(
						'type' => 'short-select',
						'title' => esc_html__('Top', 'creatus'),
						'attr' => array(
							'class' => 'thz-select-switch'
						),
						'choices' => array(
							'centered' => array(
								'text' => esc_html__('Centered', 'creatus'),
								'attr' => array(
									'data-disable' => '.pxp-pos-parent'
								)
							),
							'custom' => array(
								'text' => esc_html__('Custom', 'creatus'),
								'attr' => array(
									'data-enable' => '.pxp-pos-parent'
								)
							)
						)
					),
					'pxp' => array(
						'type' => 'spinner',
						'title' => esc_html__('Custom top', 'creatus'),
						'addon' => 'px',
						'min' => 0,
						'units' => array('px','%','vh','auto'),
						'attr' => array(
							'class' => 'pxp-pos'
						)
					),
				)
			),
			
			'add' => array(
				'type' => 'thz-multi-options',
				'label' => __('Add to menu', 'creatus'),
				'desc' => esc_html__('If not empty these sections will be added to the menu.', 'creatus'),
				'value' => array(
					'he' => '',
					'f' => ''
				),
				'thz_options' => array(
					'he' => array(
						'type' => 'short-text',
						'title' => esc_html__('Hero label', 'creatus'),
						'attr' => array(
							'placeholder' => 'Hero section'
						)
					),
					'f' => array(
						'type' => 'short-text',
						'title' => esc_html__('Footer section label', 'creatus'),
						'attr' => array(
							'placeholder' => 'Footer section'
						)
					)
				)
			),
			
			'cmx' => _thz_container_metrics_defaults()
		)
	),
	'stylestab' => array(
		'title' => __('Style', 'creatus'),
		'type' => 'tab',
		'lazy_tabs' => false,
		'options' => array(
			'bs' => array(
				'type' => 'thz-box-style',
				'label' => __('Menu box style', 'creatus'),
				'desc' => esc_html__('Adjust .thz-sections-scroll box style', 'creatus'),
				'preview' => true,
				'popup' => true,
				'button-text' => esc_html__('Customize navigation box style', 'creatus'),
				'disable' => array('layout','margin','video','image','boxsize','transform'),
				'units' => array(
					'borderradius',
					'boxsize',
					'padding',
					'margin',
				),
				'value' => array()
			),
			'tip' => array(
				'type' => 'thz-multi-options',
				'label' => __('Tooltip metrics', 'creatus'),
				'desc' => esc_html__('Adjust tooltip colors', 'creatus'),
				'value' => array(
					'p' => 'left',
					'bg' => '#ffffff',
					't' => '#121212',
					
				),
				'thz_options' => array(
					'p' => array(
						'type' => 'short-select',
						'title' => esc_html__('Position', 'creatus'),
						'choices' => array(
							'left' => esc_html__('Left', 'creatus'),
							'right' => esc_html__('Right', 'creatus')
						)
					),
					'bg' => array(
						'type' => 'color',
						'title' => esc_html__('Background', 'creatus'),
						'box' => true
					),
					't' => array(
						'type' => 'color',
						'title' => esc_html__('Text', 'creatus'),
						'box' => true
					)
				)
			),
			'im' => array(
				'type' => 'thz-multi-options',
				'label' => __('Indicator metrics', 'creatus'),
				'desc' => esc_html__('Adjust indicator metrics', 'creatus'),
				'value' => array(
					'w' => 8,
					'h' => 8,
					'r' => 8,
					'sh' => 'active',
					'op' => 'active',
					'bw' => '',
					'bs' => 'solid',
					'a' => '#ffffff',
					'i' => 'rgba(198,198,198,0.5)',
					'ab' => '',
					'ib' => '',
					
				),
				'breakafter' => array('r','bs'),
				'thz_options' => array(
					'w' => array(
						'type' => 'spinner',
						'title' => esc_html__('Width', 'creatus'),
						'addon' => 'px',
						'min' => 0,
					),
					'h' => array(
						'type' => 'spinner',
						'title' => esc_html__('Height', 'creatus'),
						'addon' => 'px',
						'min' => 0,
					),
					'r' => array(
						'type' => 'spinner',
						'title' => esc_html__('Border radius', 'creatus'),
						'addon' => 'px',
						'min' => 0,
					),
					'sh' => array(
						'type' => 'select',
						'title' => esc_html__('Shadows', 'creatus'),
						'choices' => array(
							'active' => esc_html__('Active', 'creatus'),
							'inactive' => esc_html__('Inactive', 'creatus')
						),
					),
					'op' => array(
						'type' => 'select',
						'title' => esc_html__('Opacities', 'creatus'),
						'choices' => array(
							'active' => esc_html__('Active', 'creatus'),
							'inactive' => esc_html__('Inactive', 'creatus')
						),
					),		
					'bw' => array(
						'type' => 'spinner',
						'addon' => 'px',
						'title' => esc_html__('Border width', 'creatus'),
					),
					'bs' => array(
						'type' => 'short-select',
						'title' => esc_html__('Border style', 'creatus'),
						'choices' => array(
							'solid' 		=> esc_html__('Solid', 'creatus'),
							'dashed' 		=> esc_html__('Dashed', 'creatus'),
							'dotted' 		=> esc_html__('Dotted', 'creatus'),
							'double' 		=> esc_html__('Double', 'creatus'),
							'groove' 		=> esc_html__('Groove', 'creatus'),
							'inset' 		=> esc_html__('Inset', 'creatus'),
							'outset' 		=> esc_html__('Outset', 'creatus'),
							'ridge' 		=> esc_html__('Ridge', 'creatus'),
						),
					),
					'a' => array(
						'type' => 'color',
						'title' => esc_html__('Active indicator', 'creatus'),
						'box' => true
					),
					'i' => array(
						'type' => 'color',
						'title' => esc_html__('Inactive indicator', 'creatus'),
						'box' => true
					),	
					'ab' => array(
						'type' => 'color',
						'title' => esc_html__('Active border', 'creatus'),
						'box' => true
					),
					'ib' => array(
						'type' => 'color',
						'title' => esc_html__('Inactive border', 'creatus'),
						'box' => true
					)
				)
			)
		)
	)
);
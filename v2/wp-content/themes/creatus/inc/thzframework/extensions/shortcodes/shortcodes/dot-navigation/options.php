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
			'type' => array(
				'label' => __('Navigation Type', 'creatus'),
				'desc' => esc_html__('Select navigation type', 'creatus'),
				'type' => 'short-select',
				'value' => 'indicator',
				'attr' => array(
					'class' => 'thz-select-switch'
				),
				'choices' => array(
					'indicator' => array(
						'text' => esc_html__('Indicator', 'creatus'),
						'attr' => array(
							'data-enable' => '.ind-mx-parent',
							'data-disable' => '.indicon-mx-parent',
						)
					),
					'icons' => array(
						'text' =>esc_html__('Items icons', 'creatus'),
						'attr' => array(
							'data-enable' => '.indicon-mx-parent',
							'data-disable' => '.ind-mx-parent'
						)
					)
				)
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
			'items' => array(
				'type' => 'addable-popup',
				'label' => __('Navigation items', 'creatus'),
				'popup-title' => esc_html__('Add/Edit navigation item', 'creatus'),
				'desc' => esc_html__('Create navigation items', 'creatus'),
				'template' => '{{=title}}',
				'size' => 'large',
				'popup-options' => array(
					'itemid' => array(
						'type' => 'unique',
						'length' => 8
					),
					'title' => array(
						'type' => 'text',
						'label' => __('Title', 'creatus'),
						'value' => 'Item title',
						'desc' => esc_html__('Set item title', 'creatus'),
					),
					'icon' => array(
						'type' => 'thz-icon',
						'value' => '',
						'label' => __('Item Icon', 'creatus'),
						'desc' => esc_html__('Add menu item icon. Visible only if navigation type is "Circle indicator"', 'creatus')
					),
					'link' => array(
						'label' => __('Add link', 'creatus'),
						'desc' => esc_html__('Add link for this item', 'creatus'),
						'type' => 'thz-url',
						'value' => array(
							'type' => 'normal',
							'url' => '',
							'title' => '',
							'target' => '_self',
							'magnific' => ''
						),
						'data-parent' => 'parent',
						'data-type' => '.thz-url-type,.linkType',
						'data-link' => '.thz-url-input,.normalLink',
						'data-title' => '.thz-url-title,.linkTitle',
						'data-target' => '.thz-url-target,.linkTarget',
						'data-magnific' => '.thz-url-magnific,.magnificId',
						'data-hide' => 'hide-title hide-magnific'
					),
					'sm' => array(
						'type' => 'thz-multi-options',
						'label' => __('Scroll to metrics', 'creatus'),
						'desc' => esc_html__('Adjust scroll to metrics. Used only if linking to anchor ID.', 'creatus'),
						'help' => esc_html__('Use any page element ID to scroll to this element by simply adding an ID inside the link URL option eg; #sectionid. Than you can use this option set to adjust the scroll to effect.', 'creatus'),
						'value' => array(
							'ed' => 800,
							'd' => 0,
							's' => 'before'
						),
						'thz_options' => array(
							'ed' => array(
								'type' => 'spinner',
								'title' => esc_html__('Effect duration', 'creatus'),
								'addon' => 'ms',
								'min' => 0
							),
							'd' => array(
								'type' => 'spinner',
								'title' => esc_html__('Stop distance', 'creatus'),
								'addon' => 'px',
								'min' => 0
							),
							's' => array(
								'type' => 'short-select',
								'title' => esc_html__('Stop scroll', 'creatus'),
								'choices' => array(
									'before' => esc_html__('Before the anchor', 'creatus'),
									'after' => esc_html__('After the anchor', 'creatus')
								)
							)
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
				'label' => __('Navigation box style', 'creatus'),
				'desc' => esc_html__('Adjust .thz-dot-nav box style', 'creatus'),
				'preview' => true,
				'popup' => true,
				'button-text' => esc_html__('Customize navigation box style', 'creatus'),
				'disable' => array('layout','margin','video','image','boxsize','transform'),
				'value' => array(
					'borders' => array(
						'all' => 'same',
						'top' => array(
							'w' => 1,
							's' => 'solid',
							'c' => '#eaeaea'
						),
					),
					'borderradius' => array(
						'top-left' => 2,
						'top-right' => 2,
						'bottom-left' => 2,
						'bottom-right' => 2
					),
					'background' => array(
						'type' => 'color',
						'color' => '#ffffff',
					)
				)
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
				'label' => __('Icon/indicator metrics', 'creatus'),
				'desc' => esc_html__('Adjust icon/indicator metrics', 'creatus'),
				'value' => array(
					'f' => 14,
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
					'f' => array(
						'type' => 'spinner',
						'title' => esc_html__('Icon size', 'creatus'),
						'addon' => 'px',
						'min' => 0,
						'attr' => array(
							'class'=>'indicon-mx'
						)
					),
					'w' => array(
						'type' => 'spinner',
						'title' => esc_html__('Width', 'creatus'),
						'addon' => 'px',
						'min' => 0,
						'attr' => array(
							'class'=>'ind-mx'
						)
					),
					'h' => array(
						'type' => 'spinner',
						'title' => esc_html__('Height', 'creatus'),
						'addon' => 'px',
						'min' => 0,
						'attr' => array(
							'class'=>'ind-mx'
						)
					),
					'r' => array(
						'type' => 'spinner',
						'title' => esc_html__('Border radius', 'creatus'),
						'addon' => 'px',
						'min' => 0,
						'attr' => array(
							'class'=>'ind-mx'
						)
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
						'attr' => array(
							'class'=>'ind-mx'
						)
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
						'attr' => array(
							'class'=>'ind-mx'
						)
					),
					'a' => array(
						'type' => 'color',
						'title' => esc_html__('Active color', 'creatus'),
						'box' => true
					),
					'i' => array(
						'type' => 'color',
						'title' => esc_html__('Inactive color', 'creatus'),
						'box' => true
					),	
					'ab' => array(
						'type' => 'color',
						'title' => esc_html__('Active border', 'creatus'),
						'box' => true,
						'attr' => array(
							'class'=>'ind-mx'
						)
					),
					'ib' => array(
						'type' => 'color',
						'title' => esc_html__('Inactive border', 'creatus'),
						'box' => true,
						'attr' => array(
							'class'=>'ind-mx'
						)
					)
				)
			)
		)
	)
);
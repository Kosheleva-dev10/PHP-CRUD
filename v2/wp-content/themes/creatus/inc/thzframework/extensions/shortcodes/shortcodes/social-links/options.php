<?php
if (!defined('FW')) {
	die('Forbidden');
}
$options = array(

	
	'defaults' => array(
		'title' => __('Effects', 'creatus'),
		'type' => 'tab',
		'options' => array(
			'links' => array(
				'type' => 'addable-popup',
				'label' => __('Social media links', 'creatus'),
				'desc' => esc_html__('Click to add new social media link. Drag and drop to reorder.', 'creatus'),
				'template' => '{{- name }}',
				'popup-title' => null,
				'size' => 'large',
				'popup-options' => array(
					'defaultstab' => array(
						'title' => __('Defaults', 'creatus'),
						'type' => 'tab',
						'lazy_tabs' => false,
						'options' => array(
							'name' => array(
								'label' => __('Website name', 'creatus'),
								'type' => 'text',
								'value' => '',
								'desc' => esc_html__('Social website name.eg:Facebook', 'creatus'),
								'help' => esc_html__('This option is used in a social link tooltip so you can do something like; Visit us on Facebook', 'creatus')
							),
							'icon' => array(
								'type' => 'thz-icon',
								'value' => '',
								'label' => __('Social icon', 'creatus'),
								'desc' => esc_html__('Select social icon', 'creatus')
							),
							'link' => array(
								'label' => __('Social Link', 'creatus'),
								'type' => 'text',
								'value' => '',
								'desc' => esc_html__('Social website link.eg: http://www.facebook.com/themezly', 'creatus')
							)
						)
					),
					'styletab' => array(
						'title' => __('Style', 'creatus'),
						'type' => 'tab',
						'lazy_tabs' => false,
						'options' => array(
							'ic' => array(
								'type' => 'thz-multi-options',
								'label' => __('Icon colors', 'creatus'),
								'desc' => esc_html__('Set icon colors. Leave empty for default site link color', 'creatus'),
								'help' => esc_html__('Style color is used depending on the icon style. If outline, color is used for shape outline border, if flat, color is used as shape background color', 'creatus'),
								'value' => array(
									'l' => '',
									'h' => '',
									's' => '',
									'sh' => ''
								),
								'thz_options' => array(
									'l' => array(
										'type' => 'color',
										'title' => esc_html__('Color', 'creatus'),
										'box' => true
									),
									'h' => array(
										'type' => 'color',
										'title' => esc_html__('Hovered', 'creatus'),
										'box' => true
									),
									's' => array(
										'type' => 'color',
										'title' => esc_html__('Style color', 'creatus'),
										'box' => true
									),
									'sh' => array(
										'type' => 'color',
										'title' => esc_html__('Style hovered', 'creatus'),
										'box' => true
									)
								)
							)
						)
					)
				)
			),
			'bs' => array(
				'type' => 'thz-box-style',
				'label' => __('Container box style', 'creatus'),
				'preview' => false,
				'popup' => true,
				'desc' => esc_html__('Adjust .thz-socials-shortcode box style', 'creatus'),
				'button-text' => __('Customize container box style', 'creatus'),
				'disable' => array('layout','boxsize','video','transform'),
				'units' => array(
					'borderradius',
					'boxsize',
					'padding',
					'margin',
				),
				'value' => array()
			),
			'im' => array(
				'type' => 'thz-multi-options',
				'label' => __('Icons metrics', 'creatus'),
				'desc' => esc_html__('Adjust icons metrics', 'creatus'),
				'help' => esc_html__('Style color is used depending on the icon style. If outline, color is used for shape outline border, if flat, color is used as shape background color. Each icon color setting will overide colors set here.', 'creatus'),
				'value' => array(
					'f' => 14,
					'sp' => 20,
					'a' => 'left',
					's' => 'simple',
					'sh' => 'square',
					'r' => 2,
					'dl' => '',
					'dh' => '',
					'ds' => '',
					'dsh' => ''
				),
				'breakafter' => 'r',
				'thz_options' => array(
					'f' => array(
						'type' => 'spinner',
						'title' => esc_html__('Icon size', 'creatus'),
						'addon' => 'px',
						'min' => 0,
					),
					'sp' => array(
						'type' => 'spinner',
						'title' => esc_html__('Icons space', 'creatus'),
						'addon' => 'px',
						'min' => 0
					),
					'a' => array(
						'type' => 'short-select',
						'title' => esc_html__('Align', 'creatus'),
						'choices' => array(
							'left' => esc_html__('Left', 'creatus'),
							'center' => esc_html__('Center', 'creatus'),
							'right' => esc_html__('Right', 'creatus')
						)
					),
					's' => array(
						'type' => 'short-select',
						'title' => esc_html__('Style', 'creatus'),
						'attr' => array(
							'class' => 'thz-select-switch'
						),
						'choices' => array(
							'simple' => array(
								'text' => esc_html__('Simple', 'creatus'),
								'attr' => array(
									'data-disable' => '.socs-s-sh-parent,.socs-s-r-parent,.socs-s-ds-parent,.socs-s-dsh-parent'
								)
							),
							'outline' => array(
								'text' => esc_html__('Outline', 'creatus'),
								'attr' => array(
									'data-enable' => '.socs-s-sh-parent,.socs-s-r-parent,.socs-s-ds-parent,.socs-s-dsh-parent'
								)
							),
							'flat' => array(
								'text' => esc_html__('Flat', 'creatus'),
								'attr' => array(
									'data-enable' => '.socs-s-sh-parent,.socs-s-r-parent,.socs-s-ds-parent,.socs-s-dsh-parent'
								)
							)
						)
					),
					'sh' => array(
						'type' => 'short-select',
						'title' => esc_html__('Shape', 'creatus'),
						'choices' => array(
							'circle' => esc_html__('Circle', 'creatus'),
							'square' => esc_html__('Square', 'creatus'),
							'rounded' => esc_html__('Rounded', 'creatus')
						),
						'attr' => array(
							'class' => 'socs-s-sh'
						),
					),
					'r' => array(
						'type' => 'spinner',
						'title' => esc_html__('Shape ratio', 'creatus'),
						'addon' => 'X',
						'attr' => array(
							'class' => 'socs-s-r'
						),
					),
					
					'dl' => array(
						'type' => 'color',
						'title' => esc_html__('Color', 'creatus'),
						'box' => true
					),
					'dh' => array(
						'type' => 'color',
						'title' => esc_html__('Hovered', 'creatus'),
						'box' => true
					),
					'ds' => array(
						'type' => 'color',
						'title' => esc_html__('Style color', 'creatus'),
						'box' => true,
						'attr' => array(
							'class' => 'socs-s-ds'
						),
					),
					'dsh' => array(
						'type' => 'color',
						'title' => esc_html__('Style hovered', 'creatus'),
						'box' => true,
						'attr' => array(
							'class' => 'socs-s-dsh'
						),
					)
				)
			),
			'id' => array(
				'type' => 'unique',
				'length' => 8
			),
			'cmx' => _thz_container_metrics_defaults(),		
		)
	),
		
	'socialseffects' => array(
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

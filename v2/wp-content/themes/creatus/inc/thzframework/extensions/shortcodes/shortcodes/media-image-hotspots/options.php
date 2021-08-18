<?php
if (!defined('FW')) {
	die('Forbidden');
}
$options = array(
	'defaultstab' => array(
		'title' => __('Hotspots', 'creatus'),
		'type' => 'tab',
		'options' => array(
			'hotspots' => array(
				'type' => 'thz-hotspots',
				'label' => false,
				'desc' => sprintf(esc_html__('Click on hotspots area to create new hotspot.%1$sClick on hotspot to open its settings.%1$sClick and drag hotspot to change its position.', 'creatus'), '<br />'),
				'value' => array(
					'image' => array(),
					'hotspots' => array()
				)
			)
		)
	),
	'stylingtab' => array(
		'title' => __('Settings', 'creatus'),
		'type' => 'tab',
		'lazy_tabs' => false,
		'options' => array(
			'mx' => array(
				'type' => 'thz-multi-options',
				'label' => __('Hotspots metrics', 'creatus'),
				'desc' => esc_html__('Set global hotspots metrics. See help for more info.', 'creatus'),
				'help' => esc_html__('Hotspot mark is disabled if size is small. Global hotspots colors can be set here. Every hotspot also has a color options set wich than takes precedence over these color settings and theme defaults.', 'creatus'),
				'value' => array(
					'size' => 'default',
					'mark' => 'numerical',
					'icon' => 'fa fa-star',
					'anim' => 'radar',
					'gbg' => 'color_1',
					'gmark' => '#ffffff',
					'ghalo' => '#ffffff'
				),
				'breakafter' => 'anim',
				'thz_options' => array(
					'size' => array(
						'type' => 'short-select',
						'title' => esc_html__('Size', 'creatus'),
						'attr' => array(
							'class' => 'thz-select-switch'
						),
						'choices' => array(
							'default' => array(
								'text' => esc_html__('Default (25px x 25px)', 'creatus'),
								'attr' => array(
									'data-enable' => '.sep-mark-parent',
									'data-check' => '.sep-mark'
								)
							),
							'small' => array(
								'text' => esc_html__('Small (15px x 15px)', 'creatus'),
								'attr' => array(
									'data-disable' => '.sep-icon-parent,.sep-mark-parent'
								)
							),
							'medium' => array(
								'text' => esc_html__('Medium (35px x 35px)', 'creatus'),
								'attr' => array(
									'data-enable' => '.sep-mark-parent',
									'data-check' => '.sep-mark'
								)
							),
							'large' => array(
								'text' => esc_html__('Large (50px x 50px)', 'creatus'),
								'attr' => array(
									'data-enable' => '.sep-mark-parent',
									'data-check' => '.sep-mark'
								)
							)
						)
					),
					'mark' => array(
						'type' => 'short-select',
						'title' => esc_html__('Display mark', 'creatus'),
						'attr' => array(
							'class' => 'thz-select-switch sep-mark'
						),
						'choices' => array(
							'none' => array(
								'text' => esc_html__('None', 'creatus'),
								'attr' => array(
									'data-disable' => '.sep-icon-parent'
								)
							),
							'icon' => array(
								'text' => esc_html__('Icon', 'creatus'),
								'attr' => array(
									'data-enable' => '.sep-icon-parent'
								)
							),
							'numerical' => array(
								'text' => esc_html__('Numerical', 'creatus'),
								'attr' => array(
									'data-disable' => '.sep-icon-parent'
								)
							),
							'alphabetical' => array(
								'text' => esc_html__('Alphabetical', 'creatus'),
								'attr' => array(
									'data-disable' => '.sep-icon-parent'
								)
							)
						)
					),
					'icon' => array(
						'type' => 'icon',
						'title' => esc_html__('Icon', 'creatus'),
						'attr' => array(
							'class' => 'sep-icon'
						)
					),
					'anim' => array(
						'type' => 'short-select',
						'title' => esc_html__('Halo animation', 'creatus'),
						'choices' => array(
							'radar' => esc_html__('Radar', 'creatus'),
							'sonar' => esc_html__('Sonar', 'creatus'),
							'pulsate' => esc_html__('Pulsate', 'creatus')
						)
					),
					'gbg' => array(
						'type' => 'color',
						'title' => esc_html__('Background', 'creatus'),
						'box' => true
					),
					'gmark' => array(
						'type' => 'color',
						'title' => esc_html__('Mark', 'creatus'),
						'box' => true
					),
					'ghalo' => array(
						'type' => 'color',
						'title' => esc_html__('Halo', 'creatus'),
						'box' => true
					)
				)
			),
			'media_size' => array(
				'label' => __('Image size', 'creatus'),
				'desc' => esc_html__('Select the image size to be used.', 'creatus'),
				'value' => 'thz-img-medium',
				'type' => 'short-select',
				'choices' => thz_get_image_sizes_list()
			),
			'bs' => array(
				'type' => 'thz-box-style',
				'label' => __('Container box style', 'creatus'),
				'preview' => true,
				'button-text' => esc_html__('Customize container box style', 'creatus'),
				'desc' => esc_html__('Adjust .thz-hotspot-image-container box style', 'creatus'),
				'popup' => true,
				'disable' => array(
					'video'
				),
				'units' => array(
					'borderradius',
					'boxsize',
					'padding',
					'margin',
				),
				'value' => array()
			),
			'id' => array(
				'type' => 'unique',
				'length' => 8
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
					'effect' => 'thz-anim-slideIn-up',
					'duration' => 400,
					'delay' => 200
				),
				'addlabel' => esc_html__('Animate container', 'creatus'),
				'adddesc' => esc_html__('Add animation to the image HTML container', 'creatus')
			),
			'animateh' => array(
				'type' => 'thz-animation',
				'label' => false,
				'value' => array(
					'animate' => 'inactive',
					'effect' => 'thz-anim-slideIn-up',
					'duration' => 400,
					'delay' => 200
				),
				'addlabel' => esc_html__('Animate hotspots', 'creatus'),
				'adddesc' => esc_html__('Add animation to hotspots', 'creatus')
			),
			'cpx' => _thz_container_parallax_default()
		)
	)
);
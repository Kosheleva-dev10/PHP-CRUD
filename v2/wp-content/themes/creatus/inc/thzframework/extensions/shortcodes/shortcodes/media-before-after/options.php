<?php
if (!defined('FW')) {
	die('Forbidden');
}
$options = array(
	'defaultstab' => array(
		'title' => __('Images', 'creatus'),
		'type' => 'tab',
		'options' => array(
			'before' => array(
				'type' => 'upload',
				'label' => __('Before image', 'creatus'),
				'desc' => esc_html__('Select before image', 'creatus'),
				'images_only' => true
			),
			'after' => array(
				'type' => 'upload',
				'label' => __('After image', 'creatus'),
				'desc' => esc_html__('Select after image', 'creatus'),
				'images_only' => true
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
				'label' => __('Compare metrics', 'creatus'),
				'desc' => esc_html__('Set script metrics and handle colors. See help for more info', 'creatus'),
				'help' => sprintf(esc_html__('Orientation: Handle orientation%1$sHandle position: Set the left handle position if horizontal or top if vertical%1$sOverlay: Show hide the overlay on hover%1$sAnimate handle: Animate handle position on page load', 'creatus'), '<br /><br />'),
				'value' => array(
					'orientation' => 'horizontal',
					'percent' => 50,
					'overlay' => 1,
					'transition' => 0,
					'handle' => 'color_1',
					'arrows' => '#ffffff'
				),
				'thz_options' => array(
					'orientation' => array(
						'type' => 'short-select',
						'title' => esc_html__('Orientation', 'creatus'),
						'choices' => array(
							'horizontal' => esc_html__('Horizontal', 'creatus'),
							'vertical' => esc_html__('Vertical', 'creatus')
						)
					),
					'percent' => array(
						'type' => 'spinner',
						'title' => esc_html__('Handle position', 'creatus'),
						'addon' => '%',
						'min' => 1,
						'max' => 100
					),
					'overlay' => array(
						'type' => 'short-select',
						'title' => esc_html__('Overlay', 'creatus'),
						'choices' => array(
							0 => esc_html__('Hide', 'creatus'),
							1 => esc_html__('Show', 'creatus')
						)
					),
					'transition' => array(
						'type' => 'short-select',
						'title' => esc_html__('Animate handle', 'creatus'),
						'choices' => array(
							0 => esc_html__('Do not animate', 'creatus'),
							1 => esc_html__('Animate', 'creatus')
						)
					),
					'handle' => array(
						'type' => 'color',
						'title' => esc_html__('Handle color', 'creatus'),
						'box' => true
					),
					'arrows' => array(
						'type' => 'color',
						'title' => esc_html__('Arrows color', 'creatus'),
						'box' => true
					)
				)
			),
			'media_size' => array(
				'label' => __('Images size', 'creatus'),
				'desc' => esc_html__('Select the images size to be used.', 'creatus'),
				'value' => 'thz-img-medium',
				'type' => 'short-select',
				'choices' => thz_get_image_sizes_list()
			),
			'bs' => array(
				'type' => 'thz-box-style',
				'label' => __('Container box style', 'creatus'),
				'preview' => true,
				'button-text' => esc_html__('Customize container box style', 'creatus'),
				'desc' => esc_html__('Adjust .thz-before-after-container box style', 'creatus'),
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
				'adddesc' => esc_html__('Add animation to the HTML container', 'creatus')
			),
			'cpx' => _thz_container_parallax_default()
		)
	)
);
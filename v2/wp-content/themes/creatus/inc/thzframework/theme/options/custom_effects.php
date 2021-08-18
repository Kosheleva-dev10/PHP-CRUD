<?php
if (!defined('FW'))
	die('Forbidden');

$usefeatured = isset($usefeatured) ? $usefeatured : false;

if ( 'thz-pageblock' === thz_get_current_post_type() ){
  $usefeatured =  true;
}

$options = array(

	// background layers
	'bl' => array(
		'type' => 'addable-popup',
		'label' => __('Background layers', 'creatus'),
		'popup-title' => esc_html__('Add/Edit Background Layer', 'creatus'),
		'desc' => esc_html__('Create background layer. Add parallax, infinity or basic background layer ', 'creatus'),
		'help' => esc_html__('This option adds additional background layer to the HTML container. Note that z-index is assigned per layer position in the order. The layer on top has the highest z-index.', 'creatus'),
		'template' => '{{=layer_title}}',
		'add-button-text' => esc_html__('Add/Edit Background layer', 'creatus'),
		'size' => 'large',
		'popup-options' => array(
			fw()->theme->get_options('background_layers',array('usefeatured' => $usefeatured))
		)
	),
	
	// animation
	'an' => array(
		'type' => 'addable-popup',
		'value' => array(),
		'label' => __('Animation', 'creatus'),
		'desc' => esc_html__('Add animation', 'creatus'),
		'template' => '<b>' . esc_html__('Animation is active', 'creatus') . '</b>',
		'popup-title' => esc_html__('Animation settings', 'creatus'),
		'size' => 'small',
		'add-button-text' => esc_html__('Click to add animation', 'creatus'),
		'help' => esc_html__('This option adds animation effect to the HTML container.', 'creatus'),
		'sortable' => false,
		'limit' => 1,
		'popup-options' => array(
			'effect' => array(
				'type' => 'select',
				'label' => __('Effect', 'creatus'),
				'desc' => esc_html__('Select the animation effect.', 'creatus'),
				'choices' => _thz_animations_list()
			),
			'duration' => array(
				'type' => 'thz-spinner',
				'value' => 700,
				'label' => __('Duration', 'creatus'),
				'desc' => esc_html__('Set duration in milliseconds. 1000ms = 1s', 'creatus'),
				'addon' => 'ms',
				'min' => 0,
				'max' => 2000,
				'step' => 100
			),
			'delay' => array(
				'type' => 'thz-spinner',
				'value' => 0,
				'label' => __('Delay', 'creatus'),
				'desc' => esc_html__('Set delay in milliseconds. 1000ms = 1s', 'creatus'),
				'addon' => 'ms',
				'min' => 0,
				'max' => 10000,
				'step' => 100
			)
		)
	),
	// content parallax
	'cp' => array(
		'type' => 'addable-popup',
		'value' => array(),
		'label' => __('Content parallax', 'creatus'),
		'desc' => esc_html__('Add content parallax effect', 'creatus'),
		'template' => '<b>' . esc_html__('Content parallax is active', 'creatus') . '</b>',
		'popup-title' => esc_html__('Content parallax settings', 'creatus'),
		'help' => esc_html__('This option adds a parallax effect to the HTML container content', 'creatus'),
		'size' => 'small',
		'add-button-text' => esc_html__('Click to add content parallax effect', 'creatus'),
		'sortable' => false,
		'limit' => 1,
		'popup-options' => array(
			's' => array(
				'type' => 'thz-spinner',
				'label' => __('Parallax speed', 'creatus'),
				'addon' => 'v',
				'min' => 0,
				'max' => 100,
				'value' => '40',
				'desc' => esc_html__('Set parallax speed. 0 to 100', 'creatus')
			)
		)
	),
	// scroll fade
	'sf' => array(
		'type' => 'addable-popup',
		'value' => array(),
		'label' => __('Scroll fade', 'creatus'),
		'desc' => esc_html__('Add scroll fade effect', 'creatus'),
		'template' => '<b>' . esc_html__('Scroll fade is active', 'creatus') . '</b>',
		'popup-title' => esc_html__('Scroll fade settings', 'creatus'),
		'help' => esc_html__('This option adds fade effect on scroll to the HTML container or the container content.', 'creatus'),
		'size' => 'small',
		'add-button-text' => esc_html__('Click to add scroll fade effect', 'creatus'),
		'sortable' => false,
		'limit' => 1,
		'popup-options' => array(
			'fadeat' => array(
				'type' => 'thz-spinner',
				'label' => __('Start fade at', 'creatus'),
				'addon' => '%',
				'min' => 0,
				'max' => 100,
				'value' => '40',
				'desc' => esc_html__('Start fade when x% of the element is left in the view.', 'creatus')
			),
			'whattofade' => array(
				'label' => __('What to fade?', 'creatus'),
				'desc' => esc_html__('Select what to fade. Container or container content.', 'creatus'),
				'type' => 'switch',
				'right-choice' => array(
					'value' => 'container',
					'label' => __('Container', 'creatus')
				),
				'left-choice' => array(
					'value' => 'content',
					'label' => __('Container content', 'creatus')
				),
				'value' => 'content'
			)
		)
	),
	// full height
	'fh' => array(
		'type' => 'addable-popup',
		'value' => array(),
		'label' => __('Full height', 'creatus'),
		'desc' => esc_html__('Add full height effect', 'creatus'),
		'template' => '<b>' . esc_html__('Full height is active', 'creatus') . '</b>',
		'popup-title' => esc_html__('Full height settings', 'creatus'),
		'help' => esc_html__('This option adds full height ( viewport  height ) to the HTML container.', 'creatus'),
		'size' => 'small',
		'add-button-text' => esc_html__('Click to add full height effect', 'creatus'),
		'sortable' => false,
		'limit' => 1,
		'popup-options' => array(
			'height' => array(
				'type' => 'thz-spinner',
				'label' => __('Viewport height', 'creatus'),
				'addon' => '%',
				'min' => 0,
				'max' => 100,
				'value' => '100',
				'desc' => esc_html__('Set the viewport height percentage to inherit.', 'creatus')
			),
			'contentalign' => array(
				'type' => 'short-select',
				'value' => 'thz-va-middle',
				'label' => 'Content v-align',
				'desc' => esc_html__('Set the container content vertical alignment.', 'creatus'),
				'choices' => array(
					'thz-va-top' => esc_html__('Top', 'creatus'),
					'thz-va-middle' => esc_html__('Middle', 'creatus'),
					'thz-va-bottom' => esc_html__('Bottom', 'creatus'),
					'thz-va-baseline' => esc_html__('Do not align', 'creatus')
				)
			)
		)
	),
	// separator
	'se' => array(
		'type' => 'addable-popup',
		'value' => array(),
		'label' => __('Separator', 'creatus'),
		'desc' => esc_html__('Add separator', 'creatus'),
		'template' => '<b>' . esc_html__('Activated separator:', 'creatus') . ' {{= mx.t}}</b>',
		'popup-title' => esc_html__('Separator settings', 'creatus'),
		'help' => esc_html__('This option adds separator layer to the HTML container.', 'creatus'),
		'size' => 'large',
		'add-button-text' => esc_html__('Click to add separator', 'creatus'),
		'sortable' => false,
		'limit' => 1,
		'popup-options' => array(
		
			'mx' => array(
				'type' => 'thz-multi-options',
				'label' => __('Separator metrics', 'creatus'),
				'desc' => esc_html__('Adjust separator metrics. See help for more info', 'creatus'),
				'help' => esc_html__('For optimal performance use same background color as section background and add section top and bottom padding that is same or bigger than the separator size.', 'creatus'),
				'value' => array(
					't' => 'triangle',
					'p' => 'bottom',
					's' => 50,
					'b' => 'color_4'
				),
				'thz_options' => array(
					't' => array(
						'type' => 'short-select',
						'title' => esc_html__('Type', 'creatus'),
						'choices' => array(
							'triangle' => esc_html__('Triangle', 'creatus'),
							'circle' => esc_html__('Circle', 'creatus'),
							'arrow' => esc_html__('Transparent arrow', 'creatus'),
							'haflcircle' => esc_html__('Transparent half circle', 'creatus'),
						)						
					),

					'p' => array(
						'type' => 'short-select',
						'title' => esc_html__('Position', 'creatus'),
						'choices' => array(
							'top' => esc_html__('Top', 'creatus'),
							'bottom' => esc_html__('Bottom', 'creatus'),
							'both' => esc_html__('Top and bottom', 'creatus')
						)
					),
					
					
					's' => array(
						'type' => 'spinner',
						'title' => esc_html__('Size', 'creatus'),
						'addon' => 'px',
						'min' => 0,
						'max' => 300,
					),
					
					'b' => array(
						'type' => 'color',
						'title' => esc_html__('Background', 'creatus'),
						'box' => true
					),					
					
					
				)
			),		
		
			'icon' => array(
				'type' => 'thz-icon',
				'value' => '',
				'label' => __('Separtor icon', 'creatus'),
				'desc' => esc_html__('Set separator icon. Shown only if icon selected.', 'creatus')
			),
			'iconsize' => array(
				'type' => 'short-select',
				'value' => 'medium',
				'label' => 'Icon size',
				'desc' => esc_html__('Set the icon size. For optimal performance make separator min 2.5 times bigger than the icon size.', 'creatus'),
				'choices' => array(
					'small' => esc_html__('Small 16px', 'creatus'),
					'medium' => esc_html__('Medium 22px', 'creatus'),
					'large' => esc_html__('Large 38px', 'creatus')
				)
			),
			'iconcolor' => array(
				'type' => 'thz-color-picker',
				'value' => '#000000',
				'label' => __('Icon color', 'creatus'),
				'desc' => esc_html__('Set separator icon color', 'creatus')
			)
		)
	),
	
	// container parallax
	'cpx' => array(
		'type' => 'addable-popup',
		'value' => array(),
		'label' => __('Container parallax', 'creatus'),
		'desc' => esc_html__('Add container parallax effect', 'creatus'),
		'template' => '<b>' . esc_html__('Container parallax is active', 'creatus') . '</b>',
		'popup-title' => esc_html__('Container parallax settings', 'creatus'),
		'help' => esc_html__('This option adds a parallax effect to the HTML container', 'creatus'),
		'size' => 'small',
		'add-button-text' => esc_html__('Click to add container parallax effect', 'creatus'),
		'sortable' => false,
		'limit' => 1,
		'popup-options' => array(
			'p' => array(
				'type' => 'thz-multi-options',
				'label' => false,
				'desc' => esc_html__('Adjust parallax metrics.', 'creatus'),
				'value' => array(
					'd' => 'up',
					'v' => 5,
					'm' => 0,
				),
				'thz_options' => array(
					'd' => array(
						'type' => 'short-select',
						'title' => esc_html__('Direction', 'creatus'),
						'attr' => array(
							'class' => 'px-opt',
						),
						'choices' => array(
							'up' => esc_html__('Up', 'creatus'),
							'down' => esc_html__('Down', 'creatus'),
							'left' => esc_html__('Left', 'creatus'),
							'right' => esc_html__('Right', 'creatus'),
						),
					),
					'v' => array(
						'type' => 'spinner',
						'title' => esc_html__('Speed', 'creatus'),
						'addon' => 'v',
						'min' => 1,
						'step' => 1,
						'max' => 100,
					),
					'm' => array(
						'type' => 'short-select',
						'title' => esc_html__('Parallax on mobile', 'creatus'),
						'choices' => array(
							1 => esc_html__('Active', 'creatus'),
							0 => esc_html__('Inactive', 'creatus'),
						),
					),
				)	
				
			)
		)
	),
);
<?php
if (!defined('FW')) {
	die('Forbidden');
}
$custom_effects = fw()->theme->get_options('custom_effects');
unset($custom_effects['se'], $custom_effects['fh']);
$options = array(
	'defaultstab' => array(
		'title' => __('Defaults', 'creatus'),
		'type' => 'tab',
		'options' => array(
			't' => array(
				'type' => 'text',
				'label' => __('Sorting title', 'creatus'),
				'value' => '',
				'desc' => esc_html__('Used only in builder for easy sorting.', 'creatus')
			),
			'sa' => array(
				'type' => 'thz-multi-options',
				'label' => __('Slider settings', 'creatus'),
				'desc' => esc_html__('Adjust section slider settings', 'creatus'),
				'help' => sprintf(esc_html__('Speed: Slide animation speed%1$sAuto slide: If set to Yes, slider will start on page load%1$sAuto time: Time till next slide transition%1$sVertical: If reverse is selected items slide from top to bottom%1$sFade; Fade mode is disabled if Vertical is set to Yes or Reverse.%1$sInfinite: If set to Yes, slides will loop infinitely%1$s1000ms = 1s', 'creatus') , '<br />'),
				'value' => array(
					'speed' => 650,
					'autoplay' => 0,
					'autoplayspeed' => 3000,
					'pauseonhover' => 1,
					'vertical' => 0,
					'fade' => 0,
					'infinite' => 0,
				),
				'thz_options' => array(
					'speed' => array(
						'type' => 'spinner',
						'title' => esc_html__('Speed', 'creatus'),
						'addon' => 'ms',
						'min' => 0,
						'step' => 50,
						'max' => 1500
					),
					'autoplay' => array(
						'type' => 'select',
						'title' => esc_html__('Auto slide', 'creatus'),
						'attr' => array(
							'class' => 'thz-select-switch'
						),
						'choices' => array(
							0 => array(
								'text' => esc_html__('No', 'creatus') ,
								'attr' => array(
									'data-disable' => '.slop-auto-play-parent',
								)
							),
							1 => array(
								'text' => esc_html__('Yes', 'creatus') ,
								'attr' => array(
									'data-enable' => '.slop-auto-play-parent',
								)
							),
						)
					),
					'autoplayspeed' => array(
						'type' => 'spinner',
						'attr' => array(
							'class' =>'slop-auto-play'
						),
						'title' => esc_html__('Auto time', 'creatus'),
						'addon' => 'ms',
						'min' => 0,
						'step' => 50,
						'max' => 10000
					),
					'pauseonhover' => array(
						'type' => 'select',
						'title' => esc_html__('Pause on hover', 'creatus'),
						'attr' => array(
							'class' =>'slop-auto-play'
						),
						'choices' => array(
							0 => esc_html__('No', 'creatus'),
							1 => esc_html__('Yes', 'creatus')
						)
					),
					'vertical' => array(
						'type' => 'select',
						'title' => esc_html__('Vertical', 'creatus'),
						'attr' => array(
							'class' => 'thz-select-switch'
						),
						'choices' => array(
							0 => array(
								'text' => esc_html__('No', 'creatus') ,
								'attr' => array(
									'data-enable' => '.slop-fade-parent',
								)
							),
							1 => array(
								'text' => esc_html__('Yes', 'creatus') ,
								'attr' => array(
									'data-disable' => '.slop-fade-parent',
								)
							),
							2 => array(
								'text' => esc_html__('Reverse', 'creatus') ,
								'attr' => array(
									'data-disable' => '.slop-fade-parent',
								)
							),
						),
					),
					'fade' => array(
						'type' => 'select',
						'title' => esc_html__('Fade', 'creatus'),
						'attr' => array(
							'class' =>'slop-fade'
						),
						'choices' => array(
							0 => esc_html__('No', 'creatus'),
							1 => esc_html__('Yes', 'creatus')
						)
					),
					'infinite' => array(
						'type' => 'short-select',
						'title' => esc_html__('Infinite', 'creatus'),
						'choices' => array(
							0 => esc_html__('No', 'creatus'),
							1 => esc_html__('Yes', 'creatus')
						)
					),
				)
			),
			'bs' => array(
				'type' => 'thz-box-style',
				'label' => __('Slider box style', 'creatus'),
				'desc' => esc_html__('Adjust .thz-section-slider-holder box style', 'creatus'),
				'preview' => true,
				'popup' => true,
				'button-text' => esc_html__('Customize slider box style', 'creatus'),
				'value' => array()
			),
			'id' => array(
				'type' => 'unique',
				'length' => 8
			),
			'cmx' => _thz_container_metrics_defaults()
		)
	),
	'navigationstab' => array(
		'title' => __('Navigations', 'creatus'),
		'type' => 'tab',
		'options' => array(
			'nav' => array(
				'type' => 'thz-multi-options',
				'label' => __('Navigation metrics', 'creatus'),
				'desc' => esc_html__('Adjust slider navigation colors and position. See help for more info', 'creatus'),
				'help' => sprintf(esc_html__('Custom Position expects position absolute CSS values. Examples;%1$sDots vertical right 60px;%1$s set the navigations orientation to Vertical and in positions inputs enter;%1$s 50%% 60px auto auto%1$sDots horizontal bottom 60px;%1$s set the navigations orientation to Horizontal and in positions inputs enter;%1$s auto 0px 60px 0px', 'creatus'), '<br />'),
				'value' => array(
					'show' => 'inside',
					'rel' => 'w',
					'style' => 'rings',
					'shadows' => 'active',
					'opacities' => 'active',
					'ring' => '#ffffff',
					'dot' => '#ffffff',
					'p' => 'bc',
					't' => 'auto',
					'r' => 'auto',
					'b' => '40px',
					'l' => '0px',
					'o' => 'h'
				),
				'breakafter' => array('opacities','p'),
				'thz_options' => array(
					'show' => array(
						'type' => 'select',
						'title' => esc_html__('Mode', 'creatus'),
						'attr' => array(
							'class' => 'thz-select-switch'
						),
						'choices' => array(
							'inside' => array(
								'text' => esc_html__('Show', 'creatus'),
								'attr' => array(
									'data-enable' => '.dots-mx-parent,.dots-pozswitch-parent,.dots-ringswitch-parent',
									'data-check' => '.dots-pozswitch,.dots-ringswitch'
								)
							),
							'hide' => array(
								'text' => esc_html__('Hide', 'creatus'),
								'attr' => array(
									'data-disable' => '.dots-mx-parent,.dots-cpoz-parent,.dots-pozswitch-parent,.dots-ringswitch-parent,.dots-ring-parent,.idot-parent'
								)
							)
						)
					),
					'rel' => array(
						'type' => 'short-select',
						'title' => esc_html__('Relative to', 'creatus'),
						'choices' => array(
							'w' => esc_html__('Window', 'creatus'),
							'c' => esc_html__('Current section content', 'creatus')
						),
						'attr' => array(
							'class' => 'dots-mx'
						)
					),
					'style' => array(
						'type' => 'select',
						'title' => esc_html__('Style', 'creatus'),
						'attr' => array(
							'class' => 'thz-select-switch dots-ringswitch'
						),
						'choices' => array(
							'rings' => array(
								'text' => esc_html__('Rings', 'creatus'),
								'attr' => array(
									'data-enable' => '.dots-ring-parent'
								)
							),
							'dots' => array(
								'text' => esc_html__('Dots', 'creatus'),
								'attr' => array(
									'data-disable' => '.dots-ring-parent'
								)
							),
							'rectangle' => array(
								'text' => esc_html__('Rectangle', 'creatus'),
								'attr' => array(
									'data-disable' => '.dots-ring-parent'
								)
							),
							'dash' => array(
								'text' => esc_html__('Dash', 'creatus') ,
								'attr' => array(
									'data-disable' => '.dots-ring-parent',
								)
							),
						)
					),
					'shadows' => array(
						'type' => 'select',
						'title' => esc_html__('Shadows', 'creatus'),
						'choices' => array(
							'active' => esc_html__('Active', 'creatus'),
							'inactive' => esc_html__('Inactive', 'creatus')
						),
						'attr' => array(
							'class' => 'dots-mx'
						)
					),
					'opacities' => array(
						'type' => 'select',
						'title' => esc_html__('Opacities', 'creatus'),
						'choices' => array(
							'active' => esc_html__('Active', 'creatus'),
							'inactive' => esc_html__('Inactive', 'creatus')
						),
						'attr' => array(
							'class' => 'dots-mx'
						)
					),
					'ring' => array(
						'type' => 'color',
						'title' => esc_html__('Ring color', 'creatus'),
						'box' => true,
						'attr' => array(
							'class' => 'dots-ring'
						)
					),
					'dot' => array(
						'type' => 'color',
						'title' => esc_html__('Active color', 'creatus'),
						'box' => true,
						'attr' => array(
							'class' => 'dots-mx'
						)
					),
					'p' => array(
						'type' => 'select',
						'title' => esc_html__('Position', 'creatus'),
						'attr' => array(
							'class' => 'thz-select-switch dots-pozswitch'
						),
						'choices' => array(
							'bl' => array(
								'text' => esc_html__('Bottom left', 'creatus'),
								'attr' => array(
									'data-disable' => '.dots-cpoz-parent'
								)
							),
							'bc' => array(
								'text' => esc_html__('Bottom center', 'creatus'),
								'attr' => array(
									'data-disable' => '.dots-cpoz-parent'
								)
							),
							'br' => array(
								'text' => esc_html__('Bottom right', 'creatus'),
								'attr' => array(
									'data-disable' => '.dots-cpoz-parent'
								)
							),
							'rt' => array(
								'text' => esc_html__('Right top', 'creatus'),
								'attr' => array(
									'data-disable' => '.dots-cpoz-parent'
								)
							),
							'rc' => array(
								'text' => esc_html__('Right center', 'creatus'),
								'attr' => array(
									'data-disable' => '.dots-cpoz-parent'
								)
							),
							'rb' => array(
								'text' => esc_html__('Right bottom', 'creatus'),
								'attr' => array(
									'data-disable' => '.dots-cpoz-parent'
								)
							),
							'lt' => array(
								'text' => esc_html__('Left top', 'creatus'),
								'attr' => array(
									'data-disable' => '.dots-cpoz-parent'
								)
							),
							'lc' => array(
								'text' => esc_html__('Left center', 'creatus'),
								'attr' => array(
									'data-disable' => '.dots-cpoz-parent'
								)
							),
							'lb' => array(
								'text' => esc_html__('Left bottom', 'creatus'),
								'attr' => array(
									'data-disable' => '.dots-cpoz-parent'
								)
							),
							'c' => array(
								'text' => esc_html__('Custom position', 'creatus'),
								'attr' => array(
									'data-enable' => '.dots-cpoz-parent'
								)
							)
						)
					),
					't' => array(
						'type' => 'spinner',
						'title' => esc_html__('Top', 'creatus'),
						'addon' =>'px',
						'units' => array('px','%','auto'),
						'attr' => array(
							'class' => 'dots-cpoz'
						)
					),
					'r' => array(
						'type' => 'spinner',
						'title' => esc_html__('Right', 'creatus'),
						'addon' =>'px',
						'units' => array('px','%','auto'),
						'attr' => array(
							'class' => 'dots-cpoz'
						)
					),
					'b' => array(
						'type' => 'spinner',
						'title' => esc_html__('Bottom', 'creatus'),
						'addon' =>'px',
						'units' => array('px','%','auto'),
						'attr' => array(
							'class' => 'dots-cpoz'
						)
					),
					'l' => array(
						'type' => 'spinner',
						'title' => esc_html__('Left', 'creatus'),
						'addon' =>'px',
						'units' => array('px','%','auto'),
						'attr' => array(
							'class' => 'dots-cpoz'
						)
					),
					'o' => array(
						'type' => 'short-select',
						'title' => esc_html__('Orientation', 'creatus'),
						'choices' => array(
							'h' => esc_html__('Horizontal', 'creatus'),
							'v' => esc_html__('Vertical', 'creatus')
						),
						'attr' => array(
							'class' => 'dots-cpoz'
						)
					)
				)
			),
			'arr' => array(
				'type' => 'thz-multi-options',
				'label' => __('Arrows metrics', 'creatus'),
				'desc' => esc_html__('Adjust slider navigation arrows colors, shape and size.', 'creatus'),
				'value' => array(
					'show' => 'show',
					'rel' => 'w',
					'color' => '#ffffff',
					'size' => 22,
					'shapetype' => 'rounded',
					'shapesize' => 40,
					'shapebg' => ''
				),
				'thz_options' => array(
					'show' => array(
						'type' => 'select',
						'title' => esc_html__('Mode', 'creatus'),
						'attr' => array(
							'class' => 'thz-select-switch'
						),
						'choices' => array(
							'show' => array(
								'text' => esc_html__('Show', 'creatus'),
								'attr' => array(
									'data-enable' => '.arr-mx-parent'
								)
							),
							'hide' => array(
								'text' => esc_html__('Hide', 'creatus'),
								'attr' => array(
									'data-disable' => '.arr-mx-parent'
								)
							)
						)
					),
					'rel' => array(
						'type' => 'short-select',
						'title' => esc_html__('Relative to', 'creatus'),
						'choices' => array(
							'w' => esc_html__('Window', 'creatus'),
							'c' => esc_html__('Current section content', 'creatus')
						),
						'attr' => array(
							'class' => 'arr-mx'
						)
					),
					'color' => array(
						'type' => 'color',
						'title' => esc_html__('Arrows color', 'creatus'),
						'box' => true,
						'attr' => array(
							'class' => 'arr-mx'
						)
					),
					'size' => array(
						'type' => 'spinner',
						'title' => esc_html__('Arrows size', 'creatus'),
						'addon' => 'px',
						'min' => 0,
						'attr' => array(
							'class' => 'arr-mx'
						)
					),
					'shapetype' => array(
						'type' => 'short-select',
						'title' => esc_html__('Shape type', 'creatus'),
						'choices' => array(
							'square' => esc_html__('Square', 'creatus'),
							'rounded' => esc_html__('Rounded', 'creatus'),
							'circle' => esc_html__('Circle', 'creatus')
						),
						'attr' => array(
							'class' => 'arr-mx'
						)
					),
					'shapesize' => array(
						'type' => 'spinner',
						'title' => esc_html__('Shape size', 'creatus'),
						'addon' => 'px',
						'min' => 0,
						'attr' => array(
							'class' => 'arr-mx'
						)
					),
					'shapebg' => array(
						'type' => 'color',
						'title' => esc_html__('Shape color', 'creatus'),
						'box' => true,
						'attr' => array(
							'class' => 'arr-mx'
						)
					)
				)
			)
		) // end options
	),
	'sliderffectstab' => array(
		'title' => __('Effects', 'creatus'),
		'type' => 'tab',
		'options' => array(
			$custom_effects
		) // end options
	)
);
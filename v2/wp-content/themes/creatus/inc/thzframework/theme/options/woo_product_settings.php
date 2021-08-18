<?php
if (!defined('FW')) {
	die('Forbidden');
}
$options = array(
	'productgeneraltab' => array(
		'title' => __('Product', 'creatus'),
		'type' => 'tab',
		'lazy_tabs' => false,
		'options' => array(
			'woodetails_mx' => array(
				'type' => 'thz-multi-options',
				'label' => __('Details holder', 'creatus'),
				'desc' => esc_html__('Adjust .thz-product-details-holder. See help for more info.', 'creatus'),
				'help' => esc_html__('Product details holder holds, media, title, summary and meta. Note that the holder and max width settings are effective only if there is no active page sidebar.', 'creatus'),
				'value' => array(
					'h' => 'contained',
					'm' => 100
				),
				'thz_options' => array(
					'h' => array(
						'type' => 'short-select',
						'title' => __('Holder', 'creatus'),
						'choices' => array(
							'contained' => __('Contained', 'creatus'),
							'notcontained' => __('Not contained', 'creatus')
						)
					),
					'm' => array(
						'type' => 'select',
						'title' => esc_html__('Max width', 'creatus'),
						'choices' => _thz_max_width_list()
					)
				)
			),
			'wooup_mx' => array(
				'type' => 'thz-multi-options',
				'label' => __('Up-sell products holder', 'creatus'),
				'desc' => esc_html__('Adjust up-sell products holder. See help for more info.', 'creatus'),
				'help' => esc_html__('Note that the holder and max width settings are effective only if there is no active page sidebar.', 'creatus'),
				'value' => array(
					'v' => 'show',
					'h' => 'contained',
					'm' => 100
				),
				'thz_options' => array(
					'v' => array(
						'title' => esc_html__('Visibility', 'creatus'),
						'type' => 'short-select',
						'attr' => array(
							'class' => 'thz-select-switch'
						),
						'choices' => array(
							'show' => array(
								'text' => esc_html__('Show', 'creatus'),
								'attr' => array(
									'data-enable' => '.wupsell-hol-mx-parent,.thz-upsell-products-li'
								)
							),
							'hide' => array(
								'text' => esc_html__('Hide', 'creatus'),
								'attr' => array(
									'data-disable' => '.wupsell-hol-mx-parent,.thz-upsell-products-li'
								)
							)
						)
					),
					'h' => array(
						'type' => 'short-select',
						'title' => __('Holder', 'creatus'),
						'choices' => array(
							'contained' => __('Contained', 'creatus'),
							'notcontained' => __('Not contained', 'creatus')
						),
						'attr' => array(
							'class' => 'wupsell-hol-mx'
						)
					),
					'm' => array(
						'type' => 'select',
						'title' => esc_html__('Max width', 'creatus'),
						'choices' => _thz_max_width_list(),
						'attr' => array(
							'class' => 'wupsell-hol-mx'
						)
					)
				)
			),
			'woorel_mx' => array(
				'type' => 'thz-multi-options',
				'label' => __('Related products holder', 'creatus'),
				'desc' => esc_html__('Adjust related products holder. See help for more info.', 'creatus'),
				'help' => esc_html__('Note that the holder and max width settings are effective only if there is no active page sidebar.', 'creatus'),
				'value' => array(
					'v' => 'show',
					'h' => 'contained',
					'm' => 100
				),
				'thz_options' => array(
					'v' => array(
						'title' => esc_html__('Visibility', 'creatus'),
						'type' => 'short-select',
						'attr' => array(
							'class' => 'thz-select-switch'
						),
						'choices' => array(
							'show' => array(
								'text' => esc_html__('Show', 'creatus'),
								'attr' => array(
									'data-enable' => '.wrel-hol-mx-parent,.thz-related-products-li'
								)
							),
							'hide' => array(
								'text' => esc_html__('Hide', 'creatus'),
								'attr' => array(
									'data-disable' => '.wrel-hol-mx-parent,.thz-related-products-li'
								)
							)
						)
					),
					'h' => array(
						'type' => 'short-select',
						'title' => __('Holder', 'creatus'),
						'choices' => array(
							'contained' => __('Contained', 'creatus'),
							'notcontained' => __('Not contained', 'creatus')
						),
						'attr' => array(
							'class' => 'wrel-hol-mx'
						)
					),
					'm' => array(
						'type' => 'select',
						'title' => esc_html__('Max width', 'creatus'),
						'choices' => _thz_max_width_list(),
						'attr' => array(
							'class' => 'wrel-hol-mx'
						)
					)
				)
			),
			'woonav_mx' => array(
				'type' => 'thz-multi-options',
				'label' => __('Products navigation', 'creatus'),
				'desc' => esc_html__('Adjust products navigation ( next/previous ) visibility and holder. See help for more info.', 'creatus'),
				'help' => esc_html__('Note that the holder and max width settings are effective only if there is no active page sidebar.', 'creatus'),
				'value' => array(
					'v' => 'show',
					'h' => 'contained',
					'm' => 100
				),
				'thz_options' => array(
					'v' => array(
						'title' => esc_html__('Visibility', 'creatus'),
						'type' => 'short-select',
						'attr' => array(
							'class' => 'thz-select-switch'
						),
						'choices' => array(
							'show' => array(
								'text' => esc_html__('Show', 'creatus'),
								'attr' => array(
									'data-enable' => '.woonav-hol-mx-parent'
								)
							),
							'hide' => array(
								'text' => esc_html__('Hide', 'creatus'),
								'attr' => array(
									'data-disable' => '.woonav-hol-mx-parent'
								)
							)
						)
					),
					'h' => array(
						'type' => 'short-select',
						'title' => __('Holder', 'creatus'),
						'choices' => array(
							'contained' => __('Contained', 'creatus'),
							'notcontained' => __('Not contained', 'creatus')
						),
						'attr' => array(
							'class' => 'woonav-hol-mx'
						)
					),
					'm' => array(
						'type' => 'select',
						'title' => esc_html__('Max width', 'creatus'),
						'choices' => _thz_max_width_list(),
						'attr' => array(
							'class' => 'woonav-hol-mx'
						)
					)
				)
			),

		)
	),
	
	
	'productelements' => array(
		'title'   => __( 'Elements', 'creatus' ),
		'type'    => 'tab',
		'options' => array(

			
			
			'woosingels' => array(
				'type' => 'thz-multi-options',
				'label' => __('Elements', 'creatus'),
				'desc' => esc_html__('Adjust products elements visibility.', 'creatus'),
				'value' => array(
					't' => 'show',
					'r' => 'show',
				),
				'thz_options' => array(
					't' => array(
						'title' => esc_html__('Title', 'creatus'),
						'type' => 'short-select',
						'attr' => array(
							'class' => 'thz-select-switch'
						),
						'choices' => array(
							'show' => array(
								'text' => esc_html__('Show', 'creatus'),
								'attr' => array(
									'data-enable' => 'woosptfm,woospt_bs'
								)
							),
							'hide' => array(
								'text' => esc_html__('Hide', 'creatus'),
								'attr' => array(
									'data-disable' => 'woosptfm,woospt_bs'
								)
							)
						)
					),
					
					'r' => array(
						'title' => esc_html__('Rating stars', 'creatus'),
						'type' => 'short-select',
						'attr' => array(
							'class' => 'thz-select-switch'
						),
						'choices' => array(
							'show' => array(
								'text' => esc_html__('Show', 'creatus'),
								'attr' => array(
									'data-enable' => 'woospra_mx,woospra_bs'
								)
							),
							'hide' => array(
								'text' => esc_html__('Hide', 'creatus'),
								'attr' => array(
									'data-disable' => 'woospra_mx,woospra_bs'
								)
							)
						)
					),

				)
			),

			'woospt_bs' => array(
				'type' => 'thz-box-style',
				'label' => __('Title box style', 'creatus'),
				'preview' => true,
				'button-text' => esc_html__('Customize related row box style', 'creatus'),
				'desc' => esc_html__('Adjust .thz-product-title box style', 'creatus'),
				'popup' => true,
				'disable' => array('video'),
				'value' => array()
			),
						
			'woosptfm' => array(
				'type' => 'thz-typography',
				'label' => __('Title font metrics', 'creatus'),
				'desc' => esc_html__('Adjust product title font metrics.', 'creatus'),
				'value' => array(
					'size' => 28
				),
				'disable' => array(
					'hovered',
					'align'
				),
			),

			'woospra_bs' => array(
				'type' => 'thz-box-style',
				'label' => __('Rating stars box style', 'creatus'),
				'preview' => true,
				'button-text' => esc_html__('Customize product rating box style', 'creatus'),
				'desc' => esc_html__('Adjust .woocommerce-product-rating box style', 'creatus'),
				'popup' => true,
				'disable' => array('video'),
				'value' => array()
			),
			
			'woospra_mx' => array(
				'type' => 'thz-multi-options',
				'label' => __('Rating stars metrics', 'creatus'),
				'desc' => esc_html__('Adjust rating stars metrics.', 'creatus'),
				'value' => array(
					'c' => '#121212',
					's' => 12
				),
				'thz_options' => array(
					'c' => array(
						'type' => 'color',
						'title' => esc_html__('Color', 'creatus'),
						'box' => true
					),
					's' => array(
						'type' => 'spinner',
						'title' => esc_html__('Size', 'creatus'),
						'addon' => 'px',
						'min' => 0,
					)
				)
			),
			
			'woospp_bs' => array(
				'type' => 'thz-box-style',
				'label' => __('Price box style', 'creatus'),
				'preview' => true,
				'button-text' => esc_html__('Customize product price box style', 'creatus'),
				'desc' => esc_html__('Adjust .thz-product-price box style', 'creatus'),
				'popup' => true,
				'disable' => array('video'),
				'value' => array()
			),
			
			'woosppfm' => array(
				'type' => 'thz-typography',
				'label' => __('Price font metrics', 'creatus'),
				'desc' => esc_html__('Adjust product price font metrics.', 'creatus'),
				'value' => array(
					'color' => '#1ecb67',
					'size' => 24
				),
				'disable' => array(
					'hovered',
					'align'
				),
			),
			'woosppoc' => array(
				'type' => 'thz-color-picker',
				'label' => __('Old price color', 'creatus'),
				'desc' => esc_html__('Adjust old price color.', 'creatus'),
				'value' => '#cccccc'
			)


		),
	),	
	
	
	'productimagetab' => array(
		'title' => __('Image', 'creatus'),
		'type' => 'tab',
		'lazy_tabs' => false,
		'options' => array(
			'wooimgcol' => array(
				'type' => 'thz-multi-options',
				'label' => __('Image column settings', 'creatus'),
				'desc' => esc_html__('Adjust image column width and space between the image and summary.', 'creatus'),
				'value' => array(
					'w' => 'thz-col-1-2',
					's' => 60
				),
				'thz_options' => array(
					'w' => array(
						'type' => 'short-select',
						'title' => __('Width', 'creatus'),
						'choices' => array(
							'thz-col-1' => __('1/1', 'creatus'),
							'thz-col-1-2' => __('1/2', 'creatus'),
							'thz-col-1-3' => __('1/3', 'creatus'),
							'thz-col-1-4' => __('1/4', 'creatus'),
							'thz-col-2-3' => __('2/3', 'creatus'),
							'thz-col-3-4' => __('3/4', 'creatus'),
						)
					),
					's' => array(
						'type' => 'spinner',
						'title' => esc_html__('Space', 'creatus'),
						'addon' => 'px',
						'min' => 0,
					)
				)
			),
			'wooimgh' => array(
				'type' => 'multi-picker',
				'label' => false,
				'desc' => false,
				'picker' => array(
					'picked' => array(
						'label' => __('Image container height', 'creatus'),
						'desc' => esc_html__('Set image container height.', 'creatus'),
						'type' => 'select',
						'value' => 'thz-ratio-3-4',
						'choices' => array(
							array( // optgroup
								'attr' => array(
									'label' => __('Misc', 'creatus')
								),
								'choices' => array(
									'auto' => esc_html__('Auto', 'creatus'),
									'custom' => esc_html__('Custom', 'creatus')
								)
							),
							array( // optgroup
								'attr' => array(
									'label' => __('Square', 'creatus')
								),
								'choices' => array(
									'thz-ratio-1-1' => esc_html__('Aspect ratio 1:1', 'creatus')
								)
							),
							array( // optgroup
								'attr' => array(
									'label' => __('Landscape', 'creatus')
								),
								'choices' => array(
									'thz-ratio-2-1' => esc_html__('Aspect ratio 2:1', 'creatus'),
									'thz-ratio-3-2' => esc_html__('Aspect ratio 3:2', 'creatus'),
									'thz-ratio-4-3' => esc_html__('Aspect ratio 4:3', 'creatus'),
									'thz-ratio-16-9' => esc_html__('Aspect ratio 16:9', 'creatus'),
									'thz-ratio-21-9' => esc_html__('Aspect ratio 21:9', 'creatus')
								)
							),
							array( // optgroup
								'attr' => array(
									'label' => __('Portrait', 'creatus')
								),
								'choices' => array(
									'thz-ratio-1-2' => esc_html__('Aspect ratio 1:2', 'creatus'),
									'thz-ratio-3-4' => esc_html__('Aspect ratio 3:4', 'creatus'),
									'thz-ratio-2-3' => esc_html__('Aspect ratio 2:3', 'creatus'),
									'thz-ratio-9-16' => esc_html__('Aspect ratio 9:16', 'creatus')
								)
							)
						)
					)
				),
				'choices' => array(
					'custom' => array(
						'height' => array(
							'type' => 'thz-spinner',
							'addon' => 'px',
							'min' => 0,
							'max' => 1000,
							'label' => '',
							'value' => 350,
							'desc' => esc_html__('Media container height. ', 'creatus')
						)
					)
				)
			),
			'wooimgsl' => array(
				'type' => 'thz-multi-options',
				'label' => __('Image slider layout', 'creatus'),
				'desc' => esc_html__('Adjust image slider layout', 'creatus'),
				'value' => array(
					'show' => 1,
					'scroll' => 1,
					'space' => 0,
					'dots' => 'hide',
					'arrows' => 'show',
					'img' => 'thz-img-large',
					'thumb' => 'thz-img-large',
				),
				'breakafter' => array('arrows'),
				'thz_options' => array(
					'show' => array(
						'type' => 'select',
						'title' => esc_html__('Slides to show', 'creatus'),
						'choices' => array(
							'1' => esc_html__('1', 'creatus'),
							'2' => esc_html__('2', 'creatus'),
							'3' => esc_html__('3', 'creatus'),
							'4' => esc_html__('4', 'creatus'),
							'5' => esc_html__('5', 'creatus'),
							'6' => esc_html__('6', 'creatus')
						)
					),
					'scroll' => array(
						'type' => 'select',
						'title' => esc_html__('Slides to scroll', 'creatus'),
						'choices' => array(
							'1' => esc_html__('1', 'creatus'),
							'2' => esc_html__('2', 'creatus'),
							'3' => esc_html__('3', 'creatus'),
							'4' => esc_html__('4', 'creatus'),
							'5' => esc_html__('5', 'creatus'),
							'6' => esc_html__('6', 'creatus')
						)
					),
					'space' => array(
						'type' => 'spinner',
						'title' => esc_html__('Slides space', 'creatus'),
						'addon' => 'px',
						'min' => 0,
					),
					'dots' => array(
						'type' => 'short-select',
						'title' => esc_html__('Navigation dots', 'creatus'),
						'choices' => array(
							'hide' => esc_html__('Hide', 'creatus'),
							'inside' => esc_html__('Inside', 'creatus'),
							'outside' => esc_html__('Outside', 'creatus')
						)
					),
					'arrows' => array(
						'type' => 'short-select',
						'title' => esc_html__('Arrows', 'creatus'),
						'choices' => array(
							'hide' => esc_html__('Hide', 'creatus'),
							'show' => esc_html__('Show', 'creatus')
						)
					),
					'img' => array(
						'type' => 'short-select',
						'title' => esc_html__('Image size', 'creatus'),
						'choices' => thz_get_image_sizes_list()
					),
					'thumb' => array(
						'type' => 'short-select',
						'title' => esc_html__('Thumbnail size', 'creatus'),
						'choices' => thz_get_image_sizes_list()
					),
				)
			),
			'wooimgsa' => array(
				'type' => 'thz-multi-options',
				'label' => __('Image slider animation', 'creatus'),
				'desc' => esc_html__('Adjust image slider animation. Hover over info icon for details.', 'creatus'),
				'help' => esc_html__('Speed: Slide/Fade animation speed<br />Auto slide: If set to Yes, slider will start on page load<br />Auto time: Time till next slide transition<br />Infinite: If set to Yes, slides will loop infinitely<br />1000ms = 1s', 'creatus'),
				'value' => array(
					'speed' => 300,
					'autoplay' => 0,
					'autoplayspeed' => 3000,
					'fade' => 0,
					'infinite' => 0
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
						'choices' => array(
							0 => esc_html__('No', 'creatus'),
							1 => esc_html__('Yes', 'creatus')
						)
					),
					'autoplayspeed' => array(
						'type' => 'spinner',
						'title' => esc_html__('Auto time', 'creatus'),
						'addon' => 'ms',
						'min' => 0,
						'step' => 50,
						'max' => 10000
					),
					'fade' => array(
						'type' => 'select',
						'title' => esc_html__('Fade', 'creatus'),
						'choices' => array(
							0 => esc_html__('No', 'creatus'),
							1 => esc_html__('Yes', 'creatus')
						)
					),
					'infinite' => array(
						'type' => 'select',
						'title' => esc_html__('Infinite', 'creatus'),
						'choices' => array(
							0 => esc_html__('No', 'creatus'),
							1 => esc_html__('Yes', 'creatus')
						)
					)
				)
			),
			'wooimgmi' => array(
				'type' => 'multi-picker',
				'label' => false,
				'desc' => false,
				'show_borders' => true,
				'picker' => array(
					'picked' => array(
						'label' => __('Show overlay icon', 'creatus'),
						'desc' => esc_html__('Show/hide overlay icon', 'creatus'),
						'type' => 'switch',
						'right-choice' => array(
							'value' => 'hide',
							'label' => __('Hide', 'creatus')
						),
						'left-choice' => array(
							'value' => 'show',
							'label' => __('Show', 'creatus')
						),
						'value' => 'show'
					)
				),
				'choices' => array(
					'show' => array(
						'icon' => array(
							'type' => 'thz-icon',
							'value' => 'thzicon thzicon-plus',
							'label' => __('Overlay icon', 'creatus'),
							'desc' => esc_html__('Set overlay icon. Shown only if icon selected.', 'creatus')
						),
						'icm' => array(
							'type' => 'thz-multi-options',
							'label' => __('Icon metrics', 'creatus'),
							'desc' => esc_html__('Adjust icon metrics', 'creatus'),
							'value' => array(
								'pa' => 10,
								'fs' => 16,
								'co' => '#ffffff'
							),
							'thz_options' => array(
								'pa' => array(
									'type' => 'spinner',
									'title' => esc_html__('Padding', 'creatus'),
									'addon' => 'px',
									'min' => 0,
									'max' => 100
								),
								'fs' => array(
									'type' => 'spinner',
									'title' => esc_html__('Icon size', 'creatus'),
									'addon' => 'px',
									'min' => 0,
									'max' => 100
								),
								'co' => array(
									'type' => 'color',
									'title' => esc_html__('Icon color', 'creatus'),
									'box' => true
								)
							)
						),
						'ibgm' => array(
							'type' => 'thz-multi-options',
							'label' => __('Shape metrics', 'creatus'),
							'desc' => esc_html__('Adjust icon background shape metrics', 'creatus'),
							'value' => array(
								'sh' => 'square',
								'bg' => '',
								'bs' => 'solid',
								'bsi' => 0,
								'bc' => ''
							),
							'thz_options' => array(
								'sh' => array(
									'type' => 'short-select',
									'title' => esc_html__('Type', 'creatus'),
									'choices' => array(
										'circle' => esc_html__('Circle', 'creatus'),
										'square' => esc_html__('Square', 'creatus'),
										'rounded' => esc_html__('Rounded', 'creatus')
									)
								),
								'bg' => array(
									'type' => 'color',
									'title' => esc_html__('Background', 'creatus'),
									'box' => true
								),
								'bs' => array(
									'type' => 'short-select',
									'title' => esc_html__('Border style', 'creatus'),
									'choices' => array(
										'solid' => esc_html__('Solid', 'creatus'),
										'dashed' => esc_html__('Dashed', 'creatus'),
										'dotted' => esc_html__('Dotted', 'creatus')
									)
								),
								'bsi' => array(
									'type' => 'spinner',
									'title' => esc_html__('Border size', 'creatus'),
									'addon' => 'px',
									'min' => 0,
									'max' => 100
								),
								'bc' => array(
									'type' => 'color',
									'title' => esc_html__('Border color', 'creatus'),
									'box' => true
								)
							)
						)
					)
				)
			)
		)
	),
	'producttabsdtab' => array(
		'title' => __('Tabs', 'creatus'),
		'type' => 'tab',
		'lazy_tabs' => false,
		'options' => array(
			'wootabs_mx' => array(
				'type' => 'thz-multi-options',
				'label' => __('Product tabs holder', 'creatus'),
				'desc' => esc_html__('Adjust product tabs holder. See help for more info.', 'creatus'),
				'help' => esc_html__('Note that the holder and max width settings are effective only if there is no active page sidebar.', 'creatus'),
				'value' => array(
					'h' => 'contained',
					'm' => 100
				),
				'thz_options' => array(
					'h' => array(
						'type' => 'short-select',
						'title' => __('Holder', 'creatus'),
						'choices' => array(
							'contained' => __('Contained', 'creatus'),
							'notcontained' => __('Not contained', 'creatus')
						)
					),
					'm' => array(
						'type' => 'select',
						'title' => esc_html__('Max width', 'creatus'),
						'choices' => _thz_max_width_list()
					)
				)
			),
			'wootabs' => array(
				'type' => 'popup',
				'size' => 'large',
				'label' => __('Product tabs settings', 'creatus'),
				'desc' => esc_html__('Customize product tabs', 'creatus'),
				'button' => esc_html__('Edit product tabs', 'creatus'),
				'popup-title' => esc_html__('Product tabs settings', 'creatus'),
				'popup-options' => array(
					fw()->theme->get_options('woo_product_tabs')
				)
			)
		)
	),
	'productrelatedtab' => array(
		'title' => __('Related products', 'creatus'),
		'type' => 'tab',
		'li-attr' => array('class' => 'thz-related-products-li'),
		'lazy_tabs' => false,
		'options' => array(
			'woorelgrid' => array(
				'type' => 'thz-multi-options',
				'label' => __('Related grid settings', 'creatus'),
				'desc' => esc_html__('Set related grid columns, gutter, number of items and image size', 'creatus'),
				'value' => array(
					'columns' => 4,
					'gutter' => 30,
					'items' => 4,
					'imgs' => 'thz-img-small'
				),
				'thz_options' => array(
					'gutter' => array(
						'type' => 'spinner',
						'title' => esc_html__('Gutter', 'creatus'),
						'addon' => 'px',
						'min' => 0,
						'max' => 100
					),
					'columns' => array(
						'type' => 'select',
						'title' => esc_html__('Columns', 'creatus'),
						'choices' => array(
							'1' => esc_html__('1', 'creatus'),
							'2' => esc_html__('2', 'creatus'),
							'3' => esc_html__('3', 'creatus'),
							'4' => esc_html__('4', 'creatus'),
							'5' => esc_html__('5', 'creatus'),
							'6' => esc_html__('6', 'creatus')
						)
					),
					'items' => array(
						'type' => 'spinner',
						'title' => esc_html__('Items', 'creatus'),
						'addon' => '#',
						'min' => 1,
						'max' => 100
					),
					'imgs' => array(
						'type' => 'short-select',
						'title' => esc_html__('Image size', 'creatus'),
						'choices' => thz_get_image_sizes_list( true )
					),
				)
			),
			'wr_rbs' => array(
				'type' => 'thz-box-style',
				'label' => __('Related row box style', 'creatus'),
				'preview' => true,
				'button-text' => esc_html__('Customize related row box style', 'creatus'),
				'desc' => esc_html__('Adjust .thz-product-related-row box style', 'creatus'),
				'popup' => true,
				'disable' => array('video'),
				'units' => array(
					'borderradius',
					'boxsize',
					'padding',
					'margin',
				),
				'value' => array()
			),
			
			'wr_rhs' => array(
				'type' => 'thz-box-style',
				'label' => __('Related holder box style', 'creatus'),
				'preview' => true,
				'button-text' => esc_html__('Customize related holder box style', 'creatus'),
				'desc' => esc_html__('Adjust .thz-woo-related-holder box style', 'creatus'),
				'popup' => true,
				'disable' => array('video'),
				'value' => array(
					'padding' => array(
						'top' => 60,
						'right' => 0,
						'bottom' => 0,
						'left' => 0
					),
					'borders' => array(
						'all' => 'separate',
						'top' => array(
							'w' => 1,
							's' => 'solid',
							'c' => 'color_4'
						),
						'right' => array(
							'w' => 0,
							's' => 'solid',
							'c' => ''
						),
						'bottom' => array(
							'w' => 0,
							's' => 'solid',
							'c' => ''
						),
						'left' => array(
							'w' => 0,
							's' => 'solid',
							'c' => ''
						),
					),
				)
			),

			'wu_rt' => array(
				'type' => 'text',
				'value' => 'Related Products',
				'label' => __('Related heading text', 'creatus'),
				'desc' => esc_html__('Insert related products heading text', 'creatus')
			),
						
			'wr_hef' => array(
				'type' => 'thz-typography',
				'label' => __('Related heading metrics', 'creatus'),
				'desc' => esc_html__('Adjust related heading font metrics.', 'creatus'),
				'value' => array(
					'size' => 20,
					'align' => 'center'
				),
			),
			'wr_hebs' => array(
				'type' => 'thz-box-style',
				'label' => __('Related heading box style', 'creatus'),
				'desc' => esc_html__('Adjust .thz-woo-related-heading box style','creatus'),
				'preview' => true,
				'button-text' => esc_html__('Customize related heading box style', 'creatus'),
				'popup' => true,
				'disable' => array('layout','video','boxsize','transform'),
				'value' => array(
					'margin' => array(
						'top' => 0,
						'right' => 'auto',
						'bottom' => 60,
						'left' => 'auto'
					),
				)
			),

		)
	),
	
	
	'upsell' => array(
		'title' => __('Up sells', 'creatus'),
		'type' => 'tab',
		'li-attr' => array('class' => 'thz-upsell-products-li'),
		'lazy_tabs' => false,
		'options' => array(
			'wooupgrid' => array(
				'type' => 'thz-multi-options',
				'label' => __('Up sells grid settings', 'creatus'),
				'desc' => esc_html__('Set up sells grid columns, gutter, number of items and image size', 'creatus'),
				'value' => array(
					'columns' => 4,
					'gutter' => 30,
					'items' => 4,
					'imgs' => 'thz-img-small'
				),
				'thz_options' => array(
					'gutter' => array(
						'type' => 'spinner',
						'title' => esc_html__('Gutter', 'creatus'),
						'addon' => 'px',
						'min' => 0,
						'max' => 100
					),
					'columns' => array(
						'type' => 'select',
						'title' => esc_html__('Columns', 'creatus'),
						'choices' => array(
							'1' => esc_html__('1', 'creatus'),
							'2' => esc_html__('2', 'creatus'),
							'3' => esc_html__('3', 'creatus'),
							'4' => esc_html__('4', 'creatus'),
							'5' => esc_html__('5', 'creatus'),
							'6' => esc_html__('6', 'creatus')
						)
					),
					'items' => array(
						'type' => 'spinner',
						'title' => esc_html__('Items', 'creatus'),
						'addon' => '#',
						'min' => 1,
						'max' => 100
					),
					'imgs' => array(
						'type' => 'short-select',
						'title' => esc_html__('Image size', 'creatus'),
						'choices' => thz_get_image_sizes_list( true )
					),
				)
			),
			
			'wu_rbs' => array(
				'type' => 'thz-box-style',
				'label' => __('Up sells row box style', 'creatus'),
				'preview' => true,
				'button-text' => esc_html__('Customize up sells row box style', 'creatus'),
				'desc' => esc_html__('Adjust .thz-product-up-sells-row box style', 'creatus'),
				'popup' => true,
				'disable' => array('video'),
				'value' => array()
			),
			
			'wu_rhs' => array(
				'type' => 'thz-box-style',
				'label' => __('Up sells holder box style', 'creatus'),
				'preview' => true,
				'button-text' => esc_html__('Customize up sells holder box style', 'creatus'),
				'desc' => esc_html__('Adjust .thz-woo-up-sells-holder box style', 'creatus'),
				'popup' => true,
				'disable' => array('video'),
				'value' => array(
					'padding' => array(
						'top' => 60,
						'right' => 0,
						'bottom' => 60,
						'left' => 0
					),
					'borders' => array(
						'all' => 'separate',
						'top' => array(
							'w' => 1,
							's' => 'solid',
							'c' => 'color_4'
						),
						'right' => array(
							'w' => 0,
							's' => 'solid',
							'c' => ''
						),
						'bottom' => array(
							'w' => 0,
							's' => 'solid',
							'c' => ''
						),
						'left' => array(
							'w' => 0,
							's' => 'solid',
							'c' => ''
						),
					),
				)
			),

			'wu_ut' => array(
				'type' => 'text',
				'value' => 'You may also like...',
				'label' => __('Up sells heading text', 'creatus'),
				'desc' => esc_html__('Insert up sell products heading text', 'creatus')
			),
						
			'wu_hef' => array(
				'type' => 'thz-typography',
				'label' => __('Up sells heading metrics', 'creatus'),
				'desc' => esc_html__('Adjust up sells heading font metrics.', 'creatus'),
				'value' => array(
					'size' => 20,
					'align' => 'center'
				),
			),
			'wu_hebs' => array(
				'type' => 'thz-box-style',
				'label' => __('Up sells heading box style', 'creatus'),
				'desc' => esc_html__('Adjust .thz-woo-up-sells-heading box style','creatus'),
				'preview' => true,
				'button-text' => esc_html__('Customize up sells heading box style', 'creatus'),
				'popup' => true,
				'disable' => array('layout','video','boxsize','transform'),
				'value' => array(
					'margin' => array(
						'top' => 0,
						'right' => 'auto',
						'bottom' => 60,
						'left' => 'auto'
					),
				)
			),
		)
	),
	
	'productmetastab' => array(
		'title' => __('Meta', 'creatus'),
		'type' => 'tab',
		'lazy_tabs' => false,
		'options' => array(
			'woopmc' => array(
				'type' => 'thz-box-style',
				'label' => __('Meta container box style', 'creatus'),
				'desc' => esc_html__('Adjust .thz-product-meta-container box style', 'creatus'),
				'preview' => true,
				'button-text' => esc_html__('Customize project meta container box style', 'creatus'),
				'popup' => true,
				'disable' => array(
					'layout',
					'video',
					'transform',
					'boxsize'
				),
				'value' => array(
					'padding' => array(
						'top' => 30,
						'right' => 0,
						'bottom' =>0,
						'left' => 0
					),
					'margin' => array(
						'top' => 30,
						'right' => 'auto',
						'bottom' => 0,
						'left' => 'auto'
					),
					'borders' => array(
						'all' => 'separate',
						'top' => array(
							'w' => 1,
							's' => 'solid',
							'c' => 'color_4'
						),
						'right' => array(
							'w' => 0,
							's' => 'solid',
							'c' => ''
						),
						'bottom' => array(
							'w' => 0,
							's' => 'solid',
							'c' => ''
						),
						'left' => array(
							'w' => 0,
							's' => 'solid',
							'c' => ''
						)
					),
				)
			),
			'woopmbs' => array(
				'type' => 'thz-box-style',
				'label' => __('Meta box style', 'creatus'),
				'desc' => esc_html__('Adjust .thz-product-meta box style', 'creatus'),
				'preview' => true,
				'button-text' => esc_html__('Customize project meta box style', 'creatus'),
				'popup' => true,
				'disable' => array(
					'layout',
					'video',
					'transform',
					'boxsize'
				),
				'value' => array(
					'padding' => array(
						'top' => 0,
						'right' => 0,
						'bottom' => 15,
						'left' => 0
					),
				)
			),
			'woometa_label_width' => array(
				'type' => 'thz-spinner',
				'label' => __('Meta label width', 'creatus'),
				'desc' => esc_html__('Set product meta label width', 'creatus'),
				'addon' => '%',
				'min' => 0,
				'max' => 100,
				'value' => 30
			),
			'woometa_label_metrics' => array(
				'type' => 'thz-typography',
				'label' => __('Meta label font metrics', 'creatus'),
				'desc' => esc_html__('Adjust product meta label font metrics.', 'creatus'),
				'value' => array(
					'size' => 14,
					'weight' => 600,
					'color' => 'color_2'
				),
				'disable' => array(
					'hovered',
					'align',
					'text-shadow'
				),
			),
			'woometa_metrics' => array(
				'type' => 'thz-typography',
				'label' => __('Meta font metrics', 'creatus'),
				'desc' => esc_html__('Adjust product meta font metrics.', 'creatus'),
				'value' => array(),
				'disable' => array(
					'hovered',
					'align',
					'text-shadow'
				),
			),
			'woometa_colors' => array(
				'type' => 'thz-multi-options',
				'label' => __('Meta colors', 'creatus'),
				'desc' => esc_html__('Adjust product meta colors. Theme colors are inherited if empty', 'creatus'),
				'value' => array(
					'co' => '',
					'lc' => '',
					'hc' => ''
				),
				'thz_options' => array(
					'co' => array(
						'type' => 'color',
						'title' => esc_html__('Text', 'creatus'),
						'box' => true
					),
					'lc' => array(
						'type' => 'color',
						'title' => esc_html__('Link', 'creatus'),
						'box' => true
					),
					'hc' => array(
						'type' => 'color',
						'title' => esc_html__('Link Hovered', 'creatus'),
						'box' => true
					)
				)
			)
		)
	),
	'productsharingtab' => array(
		'title' => __('Sharing links', 'creatus'),
		'type' => 'tab',
		'lazy_tabs' => false,
		'options' => array(
			'woopsh' => array(
				'type' => 'multi-picker',
				'label' => false,
				'desc' => false,
				'show_borders' => true,
				'picker' => array(
					'picked' => array(
						'label' => __('Show sharing links', 'creatus'),
						'desc' => esc_html__('Show/hide sharing links', 'creatus'),
						'type' => 'switch',
						'right-choice' => array(
							'value' => 'hide',
							'label' => __('Hide', 'creatus')
						),
						'left-choice' => array(
							'value' => 'show',
							'label' => __('Show', 'creatus')
						),
						'value' => 'show'
					)
				),
				'choices' => array(
					'show' => array(
						'sharing_label' => array(
							'type' => 'text',
							'value' => esc_html__('Share:', 'creatus'),
							'label' => __('Sharing links label', 'creatus'),
							'desc' => esc_html__('Insert sharing links label', 'creatus')
						),
						'im' => array(
							'type' => 'thz-multi-options',
							'label' => __('Sharing icons metrics', 'creatus'),
							'desc' => esc_html__('Adjust sharing icons metrics', 'creatus'),
							'help' => esc_html__('Style color is used depending on the icon style. If outline, color is used for shape outline border if flat, color is used as shape background color', 'creatus'),
							'value' => array(
								'f' => 14,
								'sp' => 20,
								's' => 'simple',
								'sh' => 'square',
								'r' => 2,
								'c' => '',
								'ch' => '',
								'sc' => '',
								'sc' => '',
								'sch' => ''
							),
							'breakafter' => 'r',
							'thz_options' => array(
								'f' => array(
									'type' => 'spinner',
									'title' => esc_html__('Size', 'creatus'),
									'addon' => 'px',
									'min' => 0
								),
								'sp' => array(
									'type' => 'spinner',
									'title' => esc_html__('Spacing', 'creatus'),
									'addon' => 'px',
									'min' => 0
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
												'data-disable' => '.wim-sh-parent,.wim-shr-parent,.wim-sc-parent,.wim-sch-parent'
											)
										),
										'outline' => array(
											'text' => esc_html__('Outline', 'creatus'),
											'attr' => array(
												'data-enable' => '.wim-sh-parent,.wim-shr-parent,.wim-sc-parent,.wim-sch-parent'
											)
										),
										'flat' => array(
											'text' => esc_html__('Flat', 'creatus'),
											'attr' => array(
												'data-enable' => '.wim-sh-parent,.wim-shr-parent,.wim-sc-parent,.wim-sch-parent'
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
										'class' => 'wim-sh'
									
									)
								),
								'r' => array(
									'type' => 'spinner',
									'title' => esc_html__('Shape ratio', 'creatus'),
									'addon' => 'X',
									'attr' => array(
										'class' => 'wim-shr'
									),
								),
								'c' => array(
									'type' => 'color',
									'title' => esc_html__('Color', 'creatus'),
									'box' => true
								),
								'ch' => array(
									'type' => 'color',
									'title' => esc_html__('Hovered', 'creatus'),
									'box' => true
								),
								'sc' => array(
									'type' => 'color',
									'title' => esc_html__('Style', 'creatus'),
									'box' => true,
									'attr' => array(
										'class' => 'wim-sc'
									
									)
								),
								'sch' => array(
									'type' => 'color',
									'title' => esc_html__('Style hovered', 'creatus'),
									'box' => true,
									'attr' => array(
										'class' => 'wim-sch'
									
									)
								)							
							)
						)
					)
				)
			)
		)
	)
);
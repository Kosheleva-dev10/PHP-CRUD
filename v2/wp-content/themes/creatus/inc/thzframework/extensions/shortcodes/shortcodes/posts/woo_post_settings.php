<?php
if (!defined('FW')) {
	die('Forbidden');
}
$options = array(
	'woopoststab' => array(
		'title' => __('Woo Posts', 'creatus'),
		'type' => 'tab',
		'lazy_tabs' => false,
		'options' => array(
			'prictetab' => array(
				'title' => __('Price', 'creatus'),
				'type' => 'tab',
				'options' => array(
					'show_price' => array(
						'type' => 'multi-picker',
						'label' => false,
						'desc' => false,
						'show_borders' => true,
						'picker' => array(
							'picked' => array(
								'label' => __('Show price', 'creatus'),
								'desc' => esc_html__('Show/hide product price', 'creatus'),
								'type' => 'switch',
								'right-choice' => array(
									'value' => 'hide',
									'label' => __('Hide', 'creatus')
								),
								'left-choice' => array(
									'value' => 'show',
									'label' => __('Show', 'creatus')
								),
								'value' => 'hide'
							)
						),
						'choices' => array(
							'show' => array(
								'wooppbs' => array(
									'type' => 'thz-box-style',
									'label' => __('Product price box style', 'creatus'),
									'preview' => true,
									'desc' => esc_html__('Adjust .thz-woo-item-price box style', 'creatus'),
									'popup' => true,
									'button-text' => esc_html__('Customize item price box style', 'creatus'),
									'disable' => array('video'),
									'value' => array(),
									'units' => array(
										'borderradius',
										'padding',
										'margin',
									),
								),
								'woopptf' => array(
									'type' => 'thz-typography',
									'label' => __('Price font metrics', 'creatus'),
									'desc' => esc_html__('Adjust product price font metrics.', 'creatus'),
									'value' => array(
										'size' => 14,
										'color' => ''
									),
									'disable' => array('hovered','align'),
								),
								'wooppoc' => array(
									'type' => 'thz-multi-options',
									'label' => __('Old price color', 'creatus'),
									'desc' => esc_html__('Adjust old price color.', 'creatus'),
									'value' => array(
										'old' => ''
									),
									'thz_options' => array(
										'old' => array(
											'type' => 'color',
											'title' => esc_html__('Old price color', 'creatus'),
											'box' => true
										)
									)
								)
							)
						)
					)
				)
			),
			
			'ratingtab' => array(
				'title' => __('Rating', 'creatus'),
				'type' => 'tab',
				'options' => array(
					'show_rating' => array(
						'type' => 'multi-picker',
						'label' => false,
						'desc' => false,
						'show_borders' => true,
						'picker' => array(
							'picked' => array(
								'label' => __('Show rating', 'creatus'),
								'desc' => esc_html__('Show/hide rating stars', 'creatus'),
								'type' => 'switch',
								'right-choice' => array(
									'value' => 'hide',
									'label' => __('Hide', 'creatus')
								),
								'left-choice' => array(
									'value' => 'show',
									'label' => __('Show', 'creatus')
								),
								'value' => 'hide'
							)
						),
						'choices' => array(
							'show' => array(
								'wooprbs' => array(
									'type' => 'thz-box-style',
									'label' => __('Rating margin', 'creatus'),
									'preview' => false,
									'desc' => esc_html__('Adjust .thz-woo-item-rating box style', 'creatus'),
									'preview' => true,
									'button-text' => esc_html__('Customize item rating box style', 'creatus'),
									'popup' => true,
									'disable' => array('video'),
									'value' => array(
										'margin' => array(
											'top' => 15,
											'right' => 0,
											'bottom' => 15,
											'left' => 0
										)
									)
								),
								'wooprsm' => array(
									'type' => 'thz-multi-options',
									'label' => __('Stars metrics', 'creatus'),
									'desc' => esc_html__('Adjust rating stars size and colors.', 'creatus'),
									'value' => array(
										's' => 14,
										'f' => '#121212',
										'e' => '#cccccc'
									),
									'thz_options' => array(
										's' => array(
											'type' => 'spinner',
											'title' => esc_html__('Size', 'creatus'),
											'addon' => 'px'
										),
										'f' => array(
											'type' => 'color',
											'title' => esc_html__('Full star', 'creatus'),
											'box' => true
										),
										'e' => array(
											'type' => 'color',
											'title' => esc_html__('Empty star', 'creatus'),
											'box' => true
										)
									)
								)
							)
						)
					)
				)
			),
			
			'cartbuttontab' => array(
				'title' => __('Cart button', 'creatus'),
				'type' => 'tab',
				'lazy_tabs' => false,
				'li-attr' => array(
					'class' => 'thz-tab-posts-woo-cartbutton'
				),
				'options' => array(
					'cart_btn' => array(
						'label' => __('Buttons type', 'creatus'),
						'desc' => esc_html__('Set buttons type or hide buttons', 'creatus'),
						'type' => 'select',
						'value' => 'hide',
						'attr' => array(
							'class' => 'thz-select-switch'
						),
						'choices' => array(
							'label' => array(
								'text' => esc_html__('Only label', 'creatus'),
								'attr' => array(
									'data-enable' => 'woopbbs,woopbf,woopaco'
								)
							),
							'icon' => array(
								'text' => esc_html__('Only icon', 'creatus'),
								'attr' => array(
									'data-enable' => 'woopbbs,woopbf,woopaco'
								)
							),
							'both' => array(
								'text' => esc_html__('Icon and label', 'creatus'),
								'attr' => array(
									'data-enable' => 'woopbbs,woopbf,woopaco'
								)
							),
							'hide' => array(
								'text' => esc_html__('Hide buttons', 'creatus'),
								'attr' => array(
									'data-disable' => 'woopbbs,woopbf,woopaco'
								)
							)
						)
					),
					'woopbcbs' => array(
						'type' => 'thz-box-style',
						'label' => __('Buttons container box style', 'creatus'),
						'preview' => true,
						'button-text' => esc_html__('Customize buttons container box style', 'creatus'),
						'desc' => esc_html__('Adjust .thz-posts-woo-buttons box style', 'creatus'),
						'popup' => true,
						'disable' => array('video'),
						'value' => array()
					),
					'woopbbs' => array(
						'type' => 'thz-box-style',
						'label' => __('Buttons box style', 'creatus'),
						'preview' => true,
						'button-text' => esc_html__('Customize buttons box style', 'creatus'),
						'desc' => esc_html__('Adjust .thz-woo-item-cart-buttons box style', 'creatus'),
						'popup' => true,
						'disable' => array('video'),
						'value' => array(
							'padding' => array(
								'top' => 5,
								'right' => 15,
								'bottom' => 5,
								'left' => 15
							),
							'borderradius' => array(
								'top-left' => 4,
								'top-right' => 4,
								'bottom-left' => 4,
								'bottom-right' => 4
							),
							'background' => array(
								'type' => 'color',
								'color' => 'rgba(0,0,0,0.7)',
							)
						)
					),
					'woopbf' => array(
						'type' => 'thz-typography',
						'label' => __('Button font metrics', 'creatus'),
						'desc' => esc_html__('Adjust button font metrics.', 'creatus'),
						'value' => array(
							'size' => 14,
							'color' => '#ffffff'
						),
						'disable' => array('hovered','align'),
					),
					'woopaco' => array(
						'type' => 'thz-multi-options',
						'label' => __('Action icons colors', 'creatus'),
						'desc' => esc_html__('Set ajax action icons color. Add to cart ajax spinner and check icon.', 'creatus'),
						'value' => array(
							'spin' => '#ffffff',
							'check' => '#ffffff'
						),
						'thz_options' => array(
							'spin' => array(
								'type' => 'color',
								'title' => esc_html__('Spinner', 'creatus'),
								'box' => true
							),
							'check' => array(
								'type' => 'color',
								'title' => esc_html__('Check', 'creatus'),
								'box' => true
							)
						)
					)
				)
			),
			
			
			'badgestab' => array(
				'title' => __('Badges', 'creatus'),
				'type' => 'tab',
				'options' => array(
					'show_badges' => array(
						'type' => 'multi-picker',
						'label' => false,
						'desc' => false,
						'show_borders' => true,
						'picker' => array(
							'picked' => array(
								'label' => __('Show badges', 'creatus'),
								'desc' => esc_html__('Show/hide rating stars', 'creatus'),
								'type' => 'switch',
								'right-choice' => array(
									'value' => 'hide',
									'label' => __('Hide', 'creatus')
								),
								'left-choice' => array(
									'value' => 'show',
									'label' => __('Show', 'creatus')
								),
								'value' => 'hide'
							)
						),
						'choices' => array(
							'show' => array(
								'woopbagbs' => array(
									'type' => 'thz-multi-options',
									'label' => __('Badges metrics', 'creatus'),
									'desc' => esc_html__('Adjust sales and out of stock badge padding, margin and border radius', 'creatus'),
									'value' => array(
										'vp' => 8,
										'hp' => 15,
										'mt' => 15,
										'ml' => 15,
										'br' => 4
									),
									'thz_options' => array(
										'vp' => array(
											'type' => 'spinner',
											'title' => esc_html__('V-padding', 'creatus'),
											'box' => true
										),
										'hp' => array(
											'type' => 'spinner',
											'title' => esc_html__('H-padding', 'creatus'),
											'box' => true
										),
										'mt' => array(
											'type' => 'spinner',
											'title' => esc_html__('Margin top', 'creatus'),
											'box' => true
										),
										'ml' => array(
											'type' => 'spinner',
											'title' => esc_html__('Margin left', 'creatus'),
											'box' => true
										),
										'br' => array(
											'type' => 'spinner',
											'title' => esc_html__('Border radius', 'creatus')
										)
									)
								),
								'woopbf' => array(
									'type' => 'thz-typography',
									'label' => __('Badges font metrics', 'creatus'),
									'desc' => esc_html__('Adjust badges font metrics.', 'creatus'),
									'value' => array(
										'size' => 12,
										'weight' => 600,
									),
									'disable' => array('color','hovered','align'),
								),
								'woopbagc' => array(
									'type' => 'thz-multi-options',
									'label' => __('Badge colors', 'creatus'),
									'desc' => esc_html__('Adjust sales and out of stock badge colors and border radius', 'creatus'),
									'value' => array(
										'sbg' => '#1ecb67',
										'sco' => '#ffffff',
										'obg' => '#ff4542',
										'oco' => '#ffffff'
									),
									'thz_options' => array(
										'sbg' => array(
											'type' => 'color',
											'title' => esc_html__('Sales bg', 'creatus'),
											'box' => true
										),
										'sco' => array(
											'type' => 'color',
											'title' => esc_html__('Sales color', 'creatus'),
											'box' => true
										),
										'obg' => array(
											'type' => 'color',
											'title' => esc_html__('Out bg', 'creatus'),
											'box' => true
										),
										'oco' => array(
											'type' => 'color',
											'title' => esc_html__('Out color', 'creatus'),
											'box' => true
										)
									)
								),
							)
						)
					)
				)
			),
		)
	)
);
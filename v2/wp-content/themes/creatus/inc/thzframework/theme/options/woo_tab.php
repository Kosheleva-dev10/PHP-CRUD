<?php
if (!defined('FW')) {
	die('Forbidden');
}
$options = array(
	'woocommercetab' => array(
		'title' => __('WooCommerce', 'creatus'),
		'type' => 'thz-side-tab',
		'li-attr' => array(
			'class' => 'thz-admin-li thz-admin-li-woo'
		),
		'options' => array(
			'woocommerce_subbox' => array(
				'title' => esc_html__('WooCommerce options', 'creatus'),
				'type' => 'box',
				'options' => array(
					'wooshoptab' => array(
						'title' => __('Shop', 'creatus'),
						'type' => 'tab',
						'lazy_tabs'=> false,
						'options' => array(
							'wooshmx' => array(
								'type' => 'thz-multi-options',
								'label' => __('Shop metrics', 'creatus'),
								'desc' => esc_html__('Adjust shop metrics', 'creatus'),
								'value' => array(
									'title' => 'hide',
									'desc' => 'hide',
									'result' => 'hide',
									'catalog' => 'hide',									

								),
								'thz_options' => array(
									'title' => array(
										'type' => 'short-select',
										'title' => esc_html__('Page title', 'creatus'),
										'choices' => array(
											'hide' => esc_html__('Hide', 'creatus'),
											'show' => esc_html__('Show', 'creatus'),
										),
									),
									'desc' => array(
										'type' => 'short-select',
										'title' => esc_html__('Archive description', 'creatus'),
										'choices' => array(
											'hide' => esc_html__('Hide', 'creatus'),
											'show' => esc_html__('Show', 'creatus'),
										),
									),
									'result' => array(
										'type' => 'short-select',
										'title' => esc_html__('Result count', 'creatus'),
										'choices' => array(
											'hide' => esc_html__('Hide', 'creatus'),
											'show' => esc_html__('Show', 'creatus'),
										),
									),
									'catalog' => array(
										'type' => 'short-select',
										'title' => esc_html__('Catalog ordering', 'creatus'),
										'choices' => array(
											'hide' => esc_html__('Hide', 'creatus'),
											'show' => esc_html__('Show', 'creatus'),
										),
									),
									
								)
							),
							fw()->theme->get_options('woo_posts_options'),
						)
					),
					'woosingletab' => array(
						'title' => __('Single product', 'creatus'),
						'type' => 'tab',
						'lazy_tabs'=> false,
						'options' => array(
							'productsinglegroup' => array(
								'type' => 'group',
								'attr' => array(
									'class' => 'show-borders'
								),
								'options' => array(
									fw()->theme->get_options('woo_product_settings')
								)
							)
						)
					),
					'woomisctab' => array(
						'title' => __('Miscellaneous', 'creatus'),
						'type' => 'tab',
						'lazy_tabs'=> false,
						'options' => array(
							'miscelenousgroup' => array(
								'type' => 'group',
								'attr' => array(
									'class' => 'show-borders'
								),
								'options' => array(
									fw()->theme->get_options('woo_misc_settings')
								)
							)
						)
					)
				)
			)
		)
	)
);
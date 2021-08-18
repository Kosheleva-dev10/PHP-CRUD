<?php
if (!defined('FW')) {
	die('Forbidden');
}
$options = array(
	'anchor' => array(
		'type' => 'text',
		'label' => __('Anchor id', 'creatus'),
		'desc' => esc_html__('Must be unique. Use this anchor id in your menu as a link.', 'creatus'),
		'help' => esc_html__('To scroll to this anchor via menu link, create a link or a new menu Custom link with URL #thisanchorID. Do not forget the hash (#) sign in front of the anchor id.', 'creatus'),
		'value' => ''
	),
	'mx' => array(
		'type' => 'thz-multi-options',
		'label' => __('Anchor metrics', 'creatus'),
		'min' => 0,
		'value' => array(
			'm' => 'before',
			'p' => 0,
			'd' => 800,
		),
		'desc' => esc_html__('Smooth scroll to this anchor. See help for more info.', 'creatus'),
		'help' => esc_html__('To smooth scroll to this anchor ( anhcor ID  ) via link, create a link or a new menu Custom link with URL #thisID. Do not forget the hash (#) sign in front of the ID. Stop at px stops the scroll at that px before/after the anchor. Effect duration is in milliseconds. 1000ms = 1s.', 'creatus'),
		'thz_options' => array(
			'm' => array(
				'type' => 'short-select',
				'title' => esc_html__('Mode', 'creatus'),
				'choices' => array(
					'before' => array(
						'text' => esc_html__('Before anchor','creatus'),
					),
					'after' => array(
						'text' => esc_html__('After anchor','creatus'),
					),							
				),
			),
			'p' => array(
				'type' => 'spinner',
				'title' => esc_html__('Stop at px', 'creatus'),
				'addon' => 'px',
				'min' => 0,
				'attr' => array(
					'class' => 'ua-poz'
				),
			),
			'd' => array(
				'type' => 'spinner',
				'title' => esc_html__('Duration', 'creatus'),
				'addon' => 'ms',
				'min' => 0,
				'attr' => array(
					'class' => 'ua-ef'
				),
			),

		)
	),	
);
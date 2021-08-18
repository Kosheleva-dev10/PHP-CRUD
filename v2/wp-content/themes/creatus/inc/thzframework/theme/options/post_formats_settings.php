<?php
if (!defined('FW')) {
	die('Forbidden');
}
$options = array(
	'postformatssetingsgroup' => array(
		'type' => 'group',
		'options' => array(
			'tabaudioformat' => array(
				'title' => __('Audio format', 'creatus'),
				'type' => 'tab',
				'options' => array(
					'audio_format_colors' => array(
						'type' => 'thz-multi-options',
						'label' => __('Colors', 'creatus'),
						'desc' => esc_html__('Adjust audio post format colors. If empty, theme defaults are used.', 'creatus'),
						'value' => array(
							'bg' => 'color_5',
							'controlls' => 'color_3',
							'current' => '#313131'
						),
						'thz_options' => array(
							'bg' => array(
								'type' => 'color',
								'title' => esc_html__('Background', 'creatus'),
								'box' => true
							),
							'controlls' => array(
								'type' => 'color',
								'title' => esc_html__('Controlls', 'creatus'),
								'box' => true
							),
							'current' => array(
								'type' => 'color',
								'title' => esc_html__('Current', 'creatus'),
								'box' => true
							)
						)
					)
				)
			),
			'tabquoteformat' => array(
				'title' => __('Quote format', 'creatus'),
				'type' => 'tab',
				'options' => array(
					'quote_metrics' => array(
						'type' => 'thz-typography',
						'label' => __('Quote metrics', 'creatus'),
						'desc' => esc_html__('Adjust quote metrics.', 'creatus'),
						'value' => array(
							'size' => 20,
							'align' => 'center',
						),
						'disable' => array('color','hovered'),
					),
					'quote_author_metrics' => array(
						'type' => 'thz-typography',
						'label' => __('Quote author metrics', 'creatus'),
						'desc' => esc_html__('Adjust quote author metrics.', 'creatus'),
						'value' => array(
							'size' => 16,
							'align' => 'center',
						),
						'disable' => array('color','hovered'),
					),
					'quote_format_colors' => array(
						'type' => 'thz-multi-options',
						'label' => __('Colors', 'creatus'),
						'desc' => esc_html__('Adjust link post format colors. If empty, theme defaults are used.', 'creatus'),
						'value' => array(
							'bg' => 'color_5',
							'qc' => 'color_2',
							'ac' => 'color_3',
							'bgh' => '#313131',
							'qch' => '#ffffff',
							'ach' => 'rgba(255,255,255,0.7)'
						),
						'thz_options' => array(
							'bg' => array(
								'type' => 'color',
								'title' => esc_html__('Background', 'creatus'),
								'box' => true
							),
							'qc' => array(
								'type' => 'color',
								'title' => esc_html__('Quote', 'creatus'),
								'box' => true
							),
							'ac' => array(
								'type' => 'color',
								'title' => esc_html__('Author', 'creatus'),
								'box' => true
							),
							'bgh' => array(
								'type' => 'color',
								'title' => esc_html__('Background hovered', 'creatus'),
								'box' => true
							),
							'qch' => array(
								'type' => 'color',
								'title' => esc_html__('Quote hovered', 'creatus'),
								'box' => true
							),
							'ach' => array(
								'type' => 'color',
								'title' => esc_html__('Author hovered', 'creatus'),
								'box' => true
							)
						)
					)
				)
			),
			'tablinkformat' => array(
				'title' => __('Link format', 'creatus'),
				'type' => 'tab',
				'options' => array(
					'link_title_metrics' => array(
						'type' => 'thz-typography',
						'label' => __('Link title metrics', 'creatus'),
						'desc' => esc_html__('Adjust link title metrics.', 'creatus'),
						'value' => array(
							'size' => 20,
							'align' => 'center',
						),
						'disable' => array('color','hovered'),
					),
					'link_url_metrics' => array(
						'type' => 'thz-typography',
						'label' => __('Link url metrics', 'creatus'),
						'desc' => esc_html__('Adjust url link metrics.', 'creatus'),
						'value' => array(
							'size' => 16,
							'align' => 'center',
						),
						'disable' => array('color','hovered'),
					),
					'link_format_colors' => array(
						'type' => 'thz-multi-options',
						'label' => __('Colors', 'creatus'),
						'desc' => esc_html__('Adjust link post format colors. If empty, theme defaults are used.', 'creatus'),
						'value' => array(
							'bg' => 'color_5',
							'tc' => 'color_2',
							'uc' => 'color_3',
							'bgh' => '#313131',
							'tch' => '#ffffff',
							'uch' => 'rgba(255,255,255,0.7)'
						),
						'thz_options' => array(
							'bg' => array(
								'type' => 'color',
								'title' => esc_html__('Background', 'creatus'),
								'box' => true
							),
							'tc' => array(
								'type' => 'color',
								'title' => esc_html__('Title', 'creatus'),
								'box' => true
							),
							'uc' => array(
								'type' => 'color',
								'title' => esc_html__('Url', 'creatus'),
								'box' => true
							),
							'bgh' => array(
								'type' => 'color',
								'title' => esc_html__('Background hovered', 'creatus'),
								'box' => true
							),
							'tch' => array(
								'type' => 'color',
								'title' => esc_html__('Title hovered', 'creatus'),
								'box' => true
							),
							'uch' => array(
								'type' => 'color',
								'title' => esc_html__('Url hovered', 'creatus'),
								'box' => true
							)
						)
					)
				)
			)
		)
	)
);
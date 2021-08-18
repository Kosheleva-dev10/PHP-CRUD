<?php
if (!defined('FW')) {
	die('Forbidden');
}
$options = array(

	
	
	
	'notificationeffects' => array(
		'title' => __('Defaults', 'creatus'),
		'type' => 'tab',
		'options' => array(
			'id' => array(
				'type' => 'unique',
				'length' => 8
			),
			'placeholder' => array(
				'label' => __('Placeholder text', 'creatus'),
				'desc' => esc_html__('Add custom input placeholder text.', 'creatus'),
				'type' => 'text',
				'value' => 'Search site...'
			),
			'livesearch' => array(
				'type' => 'multi-picker',
				'label' => false,
				'desc' => false,
				'picker' => array(
					'picked' => array(
						'label' => __('Live search', 'creatus'),
						'desc' => esc_html__('Activate/deactivate live search', 'creatus'),
						'type' => 'switch',
						'right-choice' => array(
							'value' => 'inactive',
							'label' => __('Inactive', 'creatus')
						),
						'left-choice' => array(
							'value' => 'active',
							'label' => __('Active', 'creatus')
						),
						'value' => 'inactive'
					)
				),
				'choices' => array(
					'active' => array(
						'post_types' => array(
							'label' => __('Post types limit', 'creatus'),
							'desc' => esc_html__('Select post types to display live search results from. If none is selected results are pulled from all post types listed above.', 'creatus'),
							'value' => array(
								'post' => true
							),
							'type' => 'checkboxes',
							'inline' => true,
							'choices' => thz_list_post_types()
						),
						'ls_metrics' => array(
							'type' => 'thz-multi-options',
							'label' => __('Live search metrics', 'creatus'),
							'desc' => esc_html__('Set search sql, show/hide result item intro text and thumbnail and set intro text words limit', 'creatus'),
							'value' => array(
								'search_through' => 'post_title',
								'results_limit' => 5,
								'intro' => 'show',
								'intro_limit' => 20,
								'thumbnail' => 'show'
							),
							'thz_options' => array(
								'search_through' => array(
									'type' => 'short-select',
									'title' => esc_html__('Search through', 'creatus'),
									'choices' => array(
										'post_title' => esc_html__('Post title', 'creatus'),
										'post_content' => esc_html__('Post content', 'creatus'),
										'both' => esc_html__('Post title and content', 'creatus')
									)
								),
								'results_limit' => array(
									'type' => 'spinner',
									'title' => esc_html__('Results limit', 'creatus'),
									'addon' => '#'
								),
								'intro' => array(
									'type' => 'short-select',
									'title' => esc_html__('Intro text', 'creatus'),
									'attr' => array(
										'class' => 'thz-select-switch'
									),
									'choices' => array(
										'show' => array(
											'text' => esc_html__('Show', 'creatus'),
											'attr' => array(
												'data-enable' => '.thz-mh-fw-edit-options-modal-livesearch-active-ls_metrics-intro_limit'
											)
										),
										'hide' => array(
											'text' => esc_html__('Hide', 'creatus'),
											'attr' => array(
												'data-disable' => '.thz-mh-fw-edit-options-modal-livesearch-active-ls_metrics-intro_limit'
											)
										)
									)
								),
								'intro_limit' => array(
									'type' => 'spinner',
									'title' => esc_html__('Words limit', 'creatus'),
									'addon' => '#'
								),
								'thumbnail' => array(
									'type' => 'short-select',
									'title' => esc_html__('Thumbnail', 'creatus'),
									'choices' => array(
										'show' => esc_html__('Show', 'creatus'),
										'hide' => esc_html__('Hide', 'creatus')
									)
								)
							)
						)
					)
				)
			),
			'i' => array(
				'type' => 'addable-popup',
				'value' => array(),
				'label' => __('Form style', 'creatus'),
				'desc' => esc_html__('Add custom style for this search form or leave as is for theme defaults.', 'creatus'),
				'template' => 'Custom search form style is active',
				'popup-title' => null,
				'size' => 'large',
				'limit' => 1,
				'add-button-text' => esc_html__('Add custom form style', 'creatus'),
				'sortable' => false,
				'popup-options' => array(
					'bs' => array(
						'type' => 'thz-box-style',
						'label' => __('Input box style', 'creatus'),
						'preview' => true,
						'disable' => array(
							'video',
							'boxsize',
							'transform',
							'margin',
							'layout'
						),
						'popup' => true,
						'button-text' => esc_html__('Customize input box style', 'creatus'),
						'desc' => esc_html__('Adjust .thz-search-form-inner input box style', 'creatus'),
						'value' => array()
					),
					'if' => array(
						'type' => 'thz-typography',
						'label' => __('Input font', 'creatus'),
						'value' => array(),
						'disable' => array(
							'hovered',
							'text-shadow'
						),
					),
					'thzelch' => array(
						'type' => 'thz-multi-options',
						'label' => __('Input hover colors', 'creatus'),
						'desc' => esc_html__('Adjust input:hover colors', 'creatus'),
						'value' => array(
							'bg' => '',
							'color' => '',
							'bcolor' => ''
						),
						'thz_options' => array(
							'bg' => array(
								'type' => 'color',
								'title' => esc_html__('Background', 'creatus'),
								'box' => true
							),
							'color' => array(
								'type' => 'color',
								'title' => esc_html__('Text color', 'creatus'),
								'box' => true
							),
							'bcolor' => array(
								'type' => 'color',
								'title' => esc_html__('Border color', 'creatus'),
								'box' => true
							)
						)
					),
					'thzelcf' => array(
						'type' => 'thz-multi-options',
						'label' => __('Input focus colors', 'creatus'),
						'desc' => esc_html__('Adjust input:focus colors', 'creatus'),
						'value' => array(
							'bg' => '',
							'color' => '',
							'bcolor' => ''
						),
						'thz_options' => array(
							'bg' => array(
								'type' => 'color',
								'title' => esc_html__('Background', 'creatus'),
								'box' => true
							),
							'color' => array(
								'type' => 'color',
								'title' => esc_html__('Text color', 'creatus'),
								'box' => true
							),
							'bcolor' => array(
								'type' => 'color',
								'title' => esc_html__('Border color', 'creatus'),
								'box' => true
							)
						)
					),
					'lsmx' => array(
						'type' => 'thz-multi-options',
						'label' => __('Live search results', 'creatus'),
						'desc' => esc_html__('Adjust live search results colors', 'creatus'),
						'value' => array(
							'bg' => '',
							'bcolor' => '',
							'title' => '',
							'color' => ''
						),
						'thz_options' => array(
							'bg' => array(
								'type' => 'color',
								'title' => esc_html__('Background', 'creatus'),
								'box' => true
							),
							'bcolor' => array(
								'type' => 'color',
								'title' => esc_html__('Border color', 'creatus'),
								'box' => true
							),
							'title' => array(
								'type' => 'color',
								'title' => esc_html__('Title color', 'creatus'),
								'box' => true
							),
							'color' => array(
								'type' => 'color',
								'title' => esc_html__('Text color', 'creatus'),
								'box' => true
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
				'desc' => esc_html__('Adjust .thz-search-shortcode box style', 'creatus'),
				'button-text' => __('Customize container box style', 'creatus'),
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
			'cmx' => _thz_container_metrics_defaults()
		)
	),
	
	'searcheffects' => array(
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
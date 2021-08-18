<?php
if (!defined('FW'))
	die('Forbidden');
	
$nav_location_choices = array(
	'fixed' => array(
		'text' => esc_html__('Fixed ( centered arrows on side of the page )', 'creatus'),
		'attr' => array(
			'data-enable' => '.mod-nafixedgroup',
			'data-disable' => '.mod-navlinksgroup'
		)
	),
	'under_footer' => array(
		'text' => esc_html__('Under the post footer ( inside the post )', 'creatus'),
		'attr' => array(
			'data-enable' => '.mod-navlinksgroup',
			'data-disable' => '.mod-nafixedgroup'
		)
	),
	'above_related' => array(
		'text' => esc_html__('Above the related ( inside the post )', 'creatus'),
		'attr' => array(
			'data-enable' => '.mod-navlinksgroup',
			'data-disable' => '.mod-nafixedgroup'
		)
	),	
	'under_related' => array(
		'text' => esc_html__('Under the related ( inside the post )', 'creatus'),
		'attr' => array(
			'data-enable' => '.mod-navlinksgroup',
			'data-disable' => '.mod-nafixedgroup'
		)
	),			
	'inside' => array(
		'text' => esc_html__('Under the comments ( outside the post )', 'creatus'),
		'attr' => array(
			'data-enable' => '.mod-navlinksgroup',
			'data-disable' => '.mod-nafixedgroup'
		)
	),
	'outside' => array(
		'text' => esc_html__('Above the footer section ( outside the main )', 'creatus'),
		'attr' => array(
			'data-enable' => '.mod-navlinksgroup',
			'data-disable' => '.mod-nafixedgroup'
		)
	)
);

$options = array(
	'singlepostsetingsgroup' => array(
		'type' => 'group',
		'options' => array(
			'singleposttab' => array(
				'title' => __('Post', 'creatus'),
				'type' => 'tab',
				'options' => array(
					'post_box_style' => array(
						'type' => 'thz-box-style',
						'label' => __('Post box style', 'creatus'),
						'preview' => true,
						'button-text' => esc_html__('Customize post box style', 'creatus'),
						'desc' => esc_html__('Adjust .thz-single-post box style', 'creatus'),
						'popup' => true,
						'disable' => array(
							'layout',
							'video',
							'transform',
							'boxsize'
						),
						'value' => array(),
						'units' => array(
							'borderradius',
							'padding',
							'margin',
						),
					),
					'pdetails_mx' => array(
						'type' => 'thz-multi-options',
						'label' => __('Details holder', 'creatus'),
						'desc' => esc_html__('Adjust .thz-post-details-holder. See help for more info.', 'creatus'),
						'help' => esc_html__('Post details holder holds, title, post meta and post content. Note that the holder and max width settings are effective only if there is no active page sidebar. The media container (.thz-post-media) has been deliberately moved out of the containment area. If you wish to contain the media adjust Post media box style option located in Media tab.', 'creatus'),
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
					'brel_mx' => array(
						'type' => 'thz-multi-options',
						'label' => __('Related posts', 'creatus'),
						'desc' => esc_html__('Adjust related posts visibility and holder. See help for more info.', 'creatus'),
						'help' => esc_html__('Note that the holder and max width settings are effective only if there is no active page sidebar or location is outside.', 'creatus'),
						'value' => array(
							'v' => 'show',
							'l' => 'inside',
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
											'data-enable' => '.brel-hol-mx-parent,.thz-related-posts-li'
										)
									),
									'hide' => array(
										'text' => esc_html__('Hide', 'creatus'),
										'attr' => array(
											'data-disable' => '.brel-hol-mx-parent,.thz-related-posts-li'
										)
									)
								)
							),
							'l' => array(
								'type' => 'short-select',
								'title' => __('Location', 'creatus'),
								'choices' => array(
									'outside' => __('Outside ( above the footer )', 'creatus'),
									'inside' => __('Inside ( inside the article ) ', 'creatus')
								),
								'attr' => array(
									'class' => 'brel-hol-mx'
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
									'class' => 'brel-hol-mx'
								)
							),
							'm' => array(
								'type' => 'select',
								'title' => esc_html__('Max width', 'creatus'),
								'choices' => _thz_max_width_list(),
								'attr' => array(
									'class' => 'brel-hol-mx'
								)
							)
						)
					),
					'bcom_mx' => array(
						'type' => 'thz-multi-options',
						'label' => __('Post comments', 'creatus'),
						'desc' => esc_html__('Adjust post comments visibility and holder. See help for more info.', 'creatus'),
						'help' => esc_html__('Note that the holder and max width settings are effective only if there is no active page sidebar or location is outside.', 'creatus'),
						'value' => array(
							'v' => 'show',
							'l' => 'inside',
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
											'data-enable' => '.bcom-hol-mx-parent'
										)
									),
									'hide' => array(
										'text' => esc_html__('Hide', 'creatus'),
										'attr' => array(
											'data-disable' => '.bcom-hol-mx-parent'
										)
									)
								)
							),
							'l' => array(
								'type' => 'short-select',
								'title' => __('Location', 'creatus'),
								'choices' => array(
									'outside' => __('Outside ( above the footer )', 'creatus'),
									'inside' => __('Inside ( inside the article ) ', 'creatus')
								),
								'attr' => array(
									'class' => 'bcom-hol-mx'
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
									'class' => 'bcom-hol-mx'
								)
							),
							'm' => array(
								'type' => 'select',
								'title' => esc_html__('Max width', 'creatus'),
								'choices' => _thz_max_width_list(),
								'attr' => array(
									'class' => 'bcom-hol-mx'
								)
							)
						)
					),
					'bnav_mx' => array(
						'type' => 'thz-multi-options',
						'label' => __('Posts navigation', 'creatus'),
						'desc' => esc_html__('Adjust posts navigation ( next/previous ) visibility and holder. See help for more info.', 'creatus'),
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
											'data-enable' => '.bnav-hol-mx-parent',
											'data-disable' => 'cup_nav'
										)
									),
									'hide' => array(
										'text' => esc_html__('Hide', 'creatus'),
										'attr' => array(
											'data-disable' => '.bnav-hol-mx-parent,cup_nav'
										)
									),
									'custom' => array(
										'text' => esc_html__('Custom ( show and override default )', 'creatus'),
										'attr' => array(
											'data-enable' => '.bnav-hol-mx-parent,cup_nav'
										)
									),
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
									'class' => 'bnav-hol-mx'
								)
							),
							'm' => array(
								'type' => 'select',
								'title' => esc_html__('Max width', 'creatus'),
								'choices' => _thz_max_width_list(),
								'attr' => array(
									'class' => 'bnav-hol-mx'
								)
							)
						)
					),
					
					'cup_nav' => array(
						'type' => 'addable-popup',
						'value' => array(),
						'label' => __('Custom navigation', 'creatus'),
						'desc'  => esc_html__('Add custom navigation options for this post type.', 'creatus'),
						'template' => esc_html__('Custom navigation settings are active','creatus'),
						'popup-title' => null,
						'size' => 'large', 
						'limit' => 1,
						'add-button-text' => esc_html__('Add custom navigation options', 'creatus'),
						'sortable' => true,
						'popup-options' => array(
							fw()->theme->get_options('navigation_settings', array( 
								'in_modal' => true,
								'nav_location_choices' => $nav_location_choices
							)),
						),
					),
					
					'ps_sep' => array(
						'type' => 'thz-multi-options',
						'label' => __('Elements separator', 'creatus'),
						'desc' => esc_html__('Select meta/footer elements separator. See help for more info.', 'creatus'),
						'help' => esc_html__('This option will let you adjust space between separator and elements. Nudge option can help you align the separator verticaly. This can come in handy if separator is icon and icon font does not place the icon in absolute vertical middle. Nudge moves relative top position of the separator.', 'creatus'),
						'value' => array(
							'ty' => 'textual',
							't' => '|',
							'i' => 'thzicon thzicon-primitive-dot',
							'fs' => '',
							's' => 5,
							'n' => 0
						),
						'thz_options' => array(
							'ty' => array(
								'title' => esc_html__('Type', 'creatus'),
								'type' => 'short-select',
								'value' => 'show',
								'attr' => array(
									'class' => 'thz-select-switch'
								),
								'choices' => array(
									'textual' => array(
										'text' => esc_html__('Textual', 'creatus'),
										'attr' => array(
											'data-enable' => '.postsingle_sep-text-parent',
											'data-disable' => '.postsingle_sep-icon-parent'
										)
									),
									'icon' => array(
										'text' => esc_html__('Icon', 'creatus'),
										'attr' => array(
											'data-enable' => '.postsingle_sep-icon-parent',
											'data-disable' => '.postsingle_sep-text-parent'
										)
									)
								)
							),
							't' => array(
								'type' => 'short-text',
								'title' => esc_html__('Separator', 'creatus'),
								'attr' => array(
									'class' => 'postsingle_sep-text'
								)
							),
							'i' => array(
								'type' => 'icon',
								'title' => esc_html__('Icon', 'creatus'),
								'attr' => array(
									'class' => 'postsingle_sep-icon'
								)
							),
							'fs' => array(
								'type' => 'spinner',
								'title' => esc_html__('Size', 'creatus'),
								'addon' => 'px',
								'min' => 0,
								'max' => 100
							),
							's' => array(
								'type' => 'spinner',
								'title' => esc_html__('Space', 'creatus'),
								'addon' => 'px',
								'max' => 100
							),
							'n' => array(
								'type' => 'spinner',
								'title' => esc_html__('Nudge', 'creatus'),
								'addon' => 'px',
								'min' => -20,
								'max' => 20
							)
						)
					)
				)
			),
			'singlemediatab' => array(
				'title' => __('Media', 'creatus'),
				'type' => 'tab',
				'options' => array(
					'bpm' => array(
						'type' => 'multi-picker',
						'label' => false,
						'desc' => false,
						'show_borders' => true,
						'picker' => array(
							'picked' => array(
								'label' => __('Show post media', 'creatus'),
								'desc' => esc_html__('Show/hide post media', 'creatus'),
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
								'bs' => array(
									'type' => 'thz-box-style',
									'label' => __('Post media box style', 'creatus'),
									'preview' => true,
									'button-text' => esc_html__('Customize post media box style', 'creatus'),
									'popup' => true,
									'disable' => array(
										'video'
									),
									'desc' => esc_html__('Adjust .thz-post-media box style', 'creatus'),
									'value' => array(
										'margin' => array(
											'top' => '0',
											'right' => 'auto',
											'bottom' => 30,
											'left' => 'auto'
										)
									),
									'units' => array(
										'borderradius',
										'boxsize',
										'padding',
										'margin',
									),
								),
								'lay' => array(
									'type' => 'thz-multi-options',
									'label' => __('Media slider layout', 'creatus'),
									'desc' => esc_html__('Adjust media slider layout', 'creatus'),
									'value' => array(
										'show' => '1',
										'scroll' => '1',
										'space' => '0',
										'dots' => 'inside',
										'arrows' => 'show'
									),
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
											'title' => esc_html__('Dots location', 'creatus'),
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
										)
									)
								),
								'sa' => array(
									'type' => 'thz-multi-options',
									'label' => __('Media slider animation', 'creatus'),
									'desc' => esc_html__('Adjust posts slider. Hover over help icon for more info.', 'creatus'),
									'help' => esc_html__('Speed: Slide animation speed<br />Auto slide: If set to Yes, slider will start on page load<br />Auto time: Time till next slide transition<br />Infinite: If set to Yes, slides will loop infinitely<br />1000ms = 1s', 'creatus'),
									'value' => array(
										'speed' => 300,
										'autoplay' => 0,
										'autoplayspeed' => 3000,
										'infinite' => 1
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
								'mi' => array(
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
											'icon_metrics' => array(
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
											'iconbg_metrics' => array(
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
						)
					)
				)
			),
			'singletitletab' => array(
				'title' => __('Title', 'creatus'),
				'type' => 'tab',
				'options' => array(
					'bpt' => array(
						'type' => 'multi-picker',
						'label' => false,
						'desc' => false,
						'show_borders' => true,
						'picker' => array(
							'picked' => array(
								'label' => __('Show post title', 'creatus'),
								'desc' => esc_html__('Show/hide post title', 'creatus'),
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
								'single_title_location' => array(
									'label' => __('Post title location', 'creatus'),
									'desc' => esc_html__('Set post title location. Under or above the media container', 'creatus'),
									'type' => 'switch',
									'right-choice' => array(
										'value' => 'under',
										'label' => __('Under the media', 'creatus')
									),
									'left-choice' => array(
										'value' => 'above',
										'label' => __('Above the media', 'creatus')
									),
									'value' => 'under'
								),
								'bs' => array(
									'type' => 'thz-box-style',
									'label' => __('Post title box style', 'creatus'),
									'preview' => true,
									'button-text' => esc_html__('Customize post title box style', 'creatus'),
									'popup' => true,
									'disable' => array(
										'layout',
										'video',
										'transform',
										'boxsize'
									),
									'units' => array(
										'borderradius',
										'padding',
										'margin',
									),
									'desc' => esc_html__('Adjust .thz-post-title box style', 'creatus'),
									'value' => array()
								),
								'm' => array(
									'type' => 'thz-typography',
									'label' => __('Post title font', 'creatus'),
									'desc' => esc_html__('Adjust post title font metrics.', 'creatus'),
									'value' => array(
										'size' => 28
									),
									'disable' => array(
										'color',
										'hovered'
									),
								),
								'c' => array(
									'type' => 'thz-multi-options',
									'label' => __('Post title colors', 'creatus'),
									'desc' => esc_html__('Adjust post title colors. Theme links colors are inherited if empty', 'creatus'),
									'value' => array(
										'co' => '',
										'hc' => ''
									),
									'thz_options' => array(
										'co' => array(
											'type' => 'color',
											'title' => esc_html__('Color', 'creatus'),
											'box' => true
										),
										'hc' => array(
											'type' => 'color',
											'title' => esc_html__('Hovered Color', 'creatus'),
											'box' => true
										)
									)
								)
							)
						)
					)
				)
			),
			'singlemetatab' => array(
				'title' => __('Meta', 'creatus'),
				'type' => 'tab',
				'options' => array(
					'bpme' => array(
						'type' => 'multi-picker',
						'label' => false,
						'desc' => false,
						'show_borders' => true,
						'picker' => array(
							'picked' => array(
								'label' => __('Show post meta', 'creatus'),
								'desc' => esc_html__('Show/hide post meta', 'creatus'),
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
								'loc' => array(
									'label' => __('Post meta location', 'creatus'),
									'desc' => esc_html__('Set post meta location. Under or above the title', 'creatus'),
									'type' => 'switch',
									'right-choice' => array(
										'value' => 'under',
										'label' => __('Under the title', 'creatus')
									),
									'left-choice' => array(
										'value' => 'above',
										'label' => __('Above the title', 'creatus')
									),
									'value' => 'under'
								),
								'me' => array(
									'type' => 'thz-sortable-checks',
									'value' => array(
										'date',
										'author',
										'categories'
									),
									'label' => __('Post meta elements', 'creatus'),
									'desc' => esc_html__('Check to show/hide specific post meta elements. Click and drag the label to sort.', 'creatus'),
									'choices' => _thz_meta_choices()
								),
								'mep' => _thz_metas_preferences('meta', array(
									'dlink'
								)),
								'bs' => array(
									'type' => 'thz-box-style',
									'label' => __('Post meta box style', 'creatus'),
									'preview' => true,
									'button-text' => esc_html__('Customize post meta box style', 'creatus'),
									'popup' => true,
									'disable' => array(
										'layout',
										'video',
										'transform',
										'boxsize'
									),
									'units' => array(
										'borderradius',
										'padding',
										'margin',
									),
									'desc' => esc_html__('Adjust .thz-post-meta box style', 'creatus'),
									'value' => array(
										'margin' => array(
											'top' => 15,
											'right' => 'auto',
											'bottom' => 15,
											'left' => 'auto'
										)
									)
								),
								'f' => array(
									'type' => 'thz-typography',
									'label' => __('Post meta font', 'creatus'),
									'desc' => esc_html__('Adjust post meta font metrics.', 'creatus'),
									'value' => array(
										'size' => '0.93em',
									),
									'disable' => array(
										'color',
										'hovered',
										'text-shadow'
									),
								),
								'c' => array(
									'type' => 'thz-multi-options',
									'label' => __('Post meta colors', 'creatus'),
									'desc' => esc_html__('Adjust post meta colors', 'creatus'),
									'value' => array(
										'tc' => '',
										'lc' => '',
										'hlc' => '',
										'sep' => ''
									),
									'thz_options' => array(
										'tc' => array(
											'type' => 'color',
											'title' => esc_html__('Text', 'creatus'),
											'box' => true
										),
										'lc' => array(
											'type' => 'color',
											'title' => esc_html__('Link', 'creatus'),
											'box' => true
										),
										'hlc' => array(
											'type' => 'color',
											'title' => esc_html__('Link Hovered', 'creatus'),
											'box' => true
										),
										'sep' => array(
											'type' => 'color',
											'title' => esc_html__('Separator', 'creatus'),
											'box' => true
										)
									)
								)
							)
						)
					)
				)
			),
			'singlecontenttab' => array(
				'title' => __('Content', 'creatus'),
				'type' => 'tab',
				'options' => array(
					'bprowbs' => array(
						'type' => 'thz-box-style',
						'label' => __('Details row box style', 'creatus'),
						'preview' => true,
						'button-text' => esc_html__('Customize details row box style', 'creatus'),
						'desc' => esc_html__('Adjust .thz-post-details-row box style', 'creatus'),
						'popup' => true,
						'disable' => array('video'),
						'value' => array(),
						'units' => array(
							'borderradius',
							'boxsize',
							'padding',
							'margin',
						),
					),
					'bpcbs' => array(
						'type' => 'thz-box-style',
						'label' => __('Post content box style', 'creatus'),
						'preview' => true,
						'button-text' => esc_html__('Customize post content box style', 'creatus'),
						'popup' => true,
						'disable' => array(
							'layout',
							'video',
							'transform',
							'boxsize'
						),
						'units' => array(
							'borderradius',
							'padding',
							'margin',
						),
						'desc' => esc_html__('Adjust .thz-entry-content box style', 'creatus'),
						'value' => array(
							'margin' => array(
								'top' => 30,
								'right' => 'auto',
								'bottom' => 30,
								'left' => 'auto'
							)
						)
					),
					'bpcc' => array(
						'type' => 'thz-multi-options',
						'label' => __('Post content colors', 'creatus'),
						'desc' => esc_html__('Adjust post content colors. Theme colors are used if empty.', 'creatus'),
						'value' => array(
							'text' => '',
							'link' => '',
							'linkhovered' => '',
							'headings' => ''
						),
						'thz_options' => array(
							'text' => array(
								'type' => 'color',
								'title' => esc_html__('Text', 'creatus'),
								'box' => true
							),
							'link' => array(
								'type' => 'color',
								'title' => esc_html__('Link', 'creatus'),
								'box' => true
							),
							'linkhovered' => array(
								'type' => 'color',
								'title' => esc_html__('Link Hovered', 'creatus'),
								'box' => true
							),
							'headings' => array(
								'type' => 'color',
								'title' => esc_html__('Headings', 'creatus'),
								'box' => true
							)
						)
					),
				)
			),
			'singlefootertab' => array(
				'title' => __('Footer', 'creatus'),
				'type' => 'tab',
				'options' => array(
					'bpfo' => array(
						'type' => 'multi-picker',
						'label' => false,
						'desc' => false,
						'show_borders' => true,
						'picker' => array(
							'picked' => array(
								'label' => __('Show post footer', 'creatus'),
								'desc' => esc_html__('Show/hide post footer', 'creatus'),
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
								'rowbs' => array(
									'type' => 'thz-box-style',
									'label' => __('Footer row box style', 'creatus'),
									'preview' => true,
									'button-text' => esc_html__('Customize footer row box style', 'creatus'),
									'desc' => esc_html__('Adjust .thz-post-footer-row box style', 'creatus'),
									'popup' => true,
									'disable' => array('video'),
									'value' => array(),
									'units' => array(
										'borderradius',
										'boxsize',
										'padding',
										'margin',
									),
								),
								'holder_mx' => array(
									'type' => 'thz-multi-options',
									'label' => __('Post footer holder', 'creatus'),
									'desc' => esc_html__('Adjust .thz-post-footer-holder. See help for more info.', 'creatus'),
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
								'fe' => array(
									'type' => 'thz-sortable-checks',
									'value' => array(
										'tags',
										'comments',
										'views',
										'likes'
									),
									'label' => __('Post footer elements', 'creatus'),
									'desc' => esc_html__('Check to show/hide specific post footer elements. Click and drag the label to sort.', 'creatus'),
									'choices' => _thz_meta_choices()
								),
								'fop' => _thz_metas_preferences('footer', array(
									'dlink'
								)),
								'bs' => array(
									'type' => 'thz-box-style',
									'label' => __('Post footer box style', 'creatus'),
									'preview' => true,
									'button-text' => esc_html__('Customize post footer box style', 'creatus'),
									'desc' => esc_html__('Adjust .thz-post-footer box style', 'creatus'),
									'popup' => true,
									'disable' => array(
										'layout',
										'video'
									),
									'units' => array(
										'borderradius',
										'boxsize',
										'padding',
										'margin',
									),
									'value' => array(
										'margin' => array(
											'top' => '0',
											'right' => 'auto',
											'bottom' => 30,
											'left' => 'auto'
										)
									)
								),
								'f' => array(
									'type' => 'thz-typography',
									'label' => __('Post footer font', 'creatus'),
									'desc' => esc_html__('Adjust post footer font metrics.', 'creatus'),
									'value' => array(
										'size' => '0.93em',
										'transform' => 'capitalize'
									),
									'disable' => array(
										'color',
										'hovered',
										'text-shadow'
									),
								),
								'c' => array(
									'type' => 'thz-multi-options',
									'label' => __('Post footer colors', 'creatus'),
									'desc' => esc_html__('Adjust post footer colors', 'creatus'),
									'value' => array(
										'tc' => '',
										'lc' => '',
										'hlc' => '',
										'sep' => ''
									),
									'thz_options' => array(
										'tc' => array(
											'type' => 'color',
											'title' => esc_html__('Text', 'creatus'),
											'box' => true
										),
										'lc' => array(
											'type' => 'color',
											'title' => esc_html__('Link', 'creatus'),
											'box' => true
										),
										'hlc' => array(
											'type' => 'color',
											'title' => esc_html__('Link Hovered', 'creatus'),
											'box' => true
										),
										'sep' => array(
											'type' => 'color',
											'title' => esc_html__('Separator', 'creatus'),
											'box' => true
										)
									)
								)
							)
						)
					),

				)
			),
			
			'singletagstab' => array(
				'title'   => __( 'Tags', 'creatus' ),
				'type'    => 'tab',
				'options' => array(
					'bptags' => array(
						'type' => 'multi-picker',
						'label' => false,
						'desc' => false,
						'show_borders' => true,
						'picker' => array(
							'picked' => array(
								'label' => __('Show post tags', 'creatus'),
								'desc' => esc_html__('Show/hide post tags', 'creatus'),
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
								'rowbs' => array(
									'type' => 'thz-box-style',
									'label' => __('Post tags row box style', 'creatus'),
									'preview' => true,
									'button-text' => esc_html__('Customize tags row box style', 'creatus'),
									'desc' => esc_html__('Adjust .thz-post-tags-row box style', 'creatus'),
									'popup' => true,
									'disable' => array('video'),
									'value' => array(),
									'units' => array(
										'borderradius',
										'boxsize',
										'padding',
										'margin',
									),
								),
								'holder_mx' => array(
									'type' => 'thz-multi-options',
									'label' => __('Post tags holder', 'creatus'),
									'desc' => esc_html__('Adjust .thz-post-tags-holder See help for more info.', 'creatus'),
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
								
								'bs' => array(
									'type' => 'thz-box-style',
									'label' => __('Post tags box style', 'creatus'),
									'preview' => true,
									'button-text' => esc_html__('Customize post tags box style', 'creatus'),
									'desc' => esc_html__('Adjust .thz-single-post-tags box style', 'creatus'),
									'popup' => true,
									'disable' => array('video'),
									'value' => array(
										'margin' => array(
											'top' => '0',
											'right' => 'auto',
											'bottom' => 30,
											'left' => 'auto'
										)
									),
									'units' => array(
										'borderradius',
										'boxsize',
										'padding',
										'margin',
									),
								),
								
								'tbs' => array(
									'type' => 'thz-box-style',
									'label' => __('Post tags item box style', 'creatus'),
									'preview' => true,
									'button-text' => esc_html__('Customize post tags item box style', 'creatus'),
									'desc' => esc_html__('Adjust .thz-post-tags-item box style', 'creatus'),
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
									'value' => array(
										'margin' => array(
											'top' => 0,
											'right' => 15,
											'bottom' => 0,
											'left' => 0
										)
									)
								),
								
								'thbs' => array(
									'type' => 'thz-box-style',
									'label' => __('Post tags item hovered box style', 'creatus'),
									'preview' => true,
									'button-text' => esc_html__('Customize tags item hovered box style', 'creatus'),
									'desc' => esc_html__('Adjust .thz-post-tags-item:hover box style', 'creatus'),
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
								
								'f' => array(
									'type' => 'thz-typography',
									'label' => __('Post tags item font', 'creatus'),
									'desc' => esc_html__('Adjust post tags item font metrics.', 'creatus'),
									'value' => array(
										'size' => '0.93em',
										'transform' => 'capitalize'
									),
									'disable' => array(
										'color',
										'hovered',
										'text-shadow'
									),
								),
								
								'c' => array(
									'type' => 'thz-multi-options',
									'label' => __('Post tags metrics', 'creatus'),
									'desc' => esc_html__('Adjust tags item colors', 'creatus'),
									'value' => array(
										'lc' => '',
										'hlc' => '',
										'beft' => '',
										'bef' => ''
									),
									'thz_options' => array(
										'lc' => array(
											'type' => 'color',
											'title' => esc_html__('Link', 'creatus'),
											'box' => true
										),
										'hlc' => array(
											'type' => 'color',
											'title' => esc_html__('Link Hovered', 'creatus'),
											'box' => true
										),
										'beft' => array(
											'type' => 'short-text',
											'title' => esc_html__('Before text', 'creatus'),
											'box' => true
										),
										'bef' => array(
											'type' => 'color',
											'title' => esc_html__('Before color', 'creatus'),
											'box' => true
										)
									)
								)
							)
						)
					)		
				),
			),			
			
			
			'singlesharingtab' => array(
				'title' => __('Sharing links', 'creatus'),
				'type' => 'tab',
				'options' => array(
					'bps' => array(
						'type' => 'multi-picker',
						'label' => false,
						'desc' => false,
						'show_borders' => true,
						'picker' => array(
							'picked' => array(
								'label' => __('Show sharing container', 'creatus'),
								'desc' => esc_html__('Show/hide sharing links container', 'creatus'),
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
								'rowbs' => array(
									'type' => 'thz-box-style',
									'label' => __('Sharing row box style', 'creatus'),
									'preview' => true,
									'button-text' => esc_html__('Customize sharing row box style', 'creatus'),
									'desc' => esc_html__('Adjust .thz-post-sharing-row box style', 'creatus'),
									'popup' => true,
									'disable' => array('video'),
									'value' => array(),
									'units' => array(
										'borderradius',
										'boxsize',
										'padding',
										'margin',
									),
								),
								'holder_mx' => array(
									'type' => 'thz-multi-options',
									'label' => __('Sharing holder', 'creatus'),
									'desc' => esc_html__('Adjust .thz-post-sharing-holder. See help for more info.', 'creatus'),
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
								'layout' => array(
									'label' => __('Sharing layout', 'creatus'),
									'desc' => esc_html__('Select sharing links layout', 'creatus'),
									'type' => 'select',
									'value' => 'separated',
									'choices' => array(
										'separated' => esc_html__('Separated ( Label left, links right )', 'creatus'),
										'leftsided' => esc_html__('Left sided ( Label left, links left ) ', 'creatus'),
										'centered' => esc_html__('Centered ( Label above, links under ) ', 'creatus')
									)
								),
								'bs' => array(
									'type' => 'thz-box-style',
									'label' => __('Sharing container box style', 'creatus'),
									'desc' => esc_html__('Adjust .thz-post-shares box style', 'creatus'),
									'preview' => true,
									'button-text' => esc_html__('Customize sharing container box style', 'creatus'),
									'popup' => true,
									'disable' => array(
										'layout',
										'video'
									),
									'units' => array(
										'borderradius',
										'boxsize',
										'padding',
										'margin',
									),
									'value' => array(
										'padding' => array(
											'top' => 30,
											'right' => 0,
											'bottom' => 30,
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
														'data-disable' => '.pim-sh-parent,.pim-shr-parent,.pim-sc-parent,.pim-sch-parent'
													)
												),
												'outline' => array(
													'text' => esc_html__('Outline', 'creatus'),
													'attr' => array(
														'data-enable' => '.pim-sh-parent,.pim-shr-parent,.pim-sc-parent,.pim-sch-parent'
													)
												),
												'flat' => array(
													'text' => esc_html__('Flat', 'creatus'),
													'attr' => array(
														'data-enable' => '.pim-sh-parent,.pim-shr-parent,.pim-sc-parent,.pim-sch-parent'
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
												'class' => 'pim-sh'
											
											)
										),
										'r' => array(
											'type' => 'spinner',
											'title' => esc_html__('Shape ratio', 'creatus'),
											'addon' => 'X',
											'attr' => array(
												'class' => 'pim-shr'
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
												'class' => 'pim-sc'
											
											)
										),
										'sch' => array(
											'type' => 'color',
											'title' => esc_html__('Style hovered', 'creatus'),
											'box' => true,
											'attr' => array(
												'class' => 'pim-sch'
											
											)
										)							
									)
								),
								'sl' => array(
									'type' => 'multi-picker',
									'label' => false,
									'desc' => false,
									'show_borders' => true,
									'picker' => array(
										'picked' => array(
											'label' => __('Show sharing label', 'creatus'),
											'desc' => esc_html__('Show/hide sharing links label', 'creatus'),
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
											'l' => array(
												'type' => 'text',
												'value' => 'Share this story:',
												'label' => __('Sharing links label', 'creatus'),
												'desc' => esc_html__('Insert sharing links label', 'creatus')
											),
											'f' => array(
												'type' => 'thz-typography',
												'label' => __('Sharing label font', 'creatus'),
												'desc' => esc_html__('Adjust sharing label font metrics.', 'creatus'),
												'value' => array(
													'size' => '',
													'weight' => 600
												),
												'disable' => array(
													'hovered',
													'align',
													'text-shadow'
												),
											)
										)
									)
								)
							)
						)
					)
				)
			),
			'singleauthortab' => array(
				'title' => __('Author', 'creatus'),
				'type' => 'tab',
				'options' => array(
					'bpau' => array(
						'type' => 'multi-picker',
						'label' => false,
						'desc' => false,
						'show_borders' => true,
						'picker' => array(
							'picked' => array(
								'label' => __('Show author bio', 'creatus'),
								'desc' => esc_html__('Show/hide author bio box', 'creatus'),
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
								'rowbs' => array(
									'type' => 'thz-box-style',
									'label' => __('Author row box style', 'creatus'),
									'preview' => true,
									'button-text' => esc_html__('Customize author row box style', 'creatus'),
									'desc' => esc_html__('Adjust .thz-post-author-row box style', 'creatus'),
									'popup' => true,
									'disable' => array('video'),
									'value' => array(),
									'units' => array(
										'borderradius',
										'boxsize',
										'padding',
										'margin',
									),
								),
								'holder_mx' => array(
									'type' => 'thz-multi-options',
									'label' => __('Author holder', 'creatus'),
									'desc' => esc_html__('Adjust .thz-post-author-holder. See help for more info.', 'creatus'),
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
								'as' => array(
									'type' => 'thz-multi-options',
									'label' => __('Author bio box settings', 'creatus'),
									'desc' => esc_html__('Adjust author bio box mode and elements spacings.', 'creatus'),
									'value' => array(
										'mode' => 'left',
										'heading' => 15,
										'text' => 15,
										'link' => 0
									),
									'thz_options' => array(
										'mode' => array(
											'type' => 'short-select',
											'title' => esc_html__('Mode', 'creatus'),
											'choices' => array(
												'left' => esc_html__('Left aligned', 'creatus'),
												'centered' => esc_html__('Centered', 'creatus')
											)
										),
										'heading' => array(
											'type' => 'spinner',
											'title' => esc_html__('Heading', 'creatus'),
											'addon' => 'px',
											'min' => -100,
											'max' => 100
										),
										'text' => array(
											'type' => 'spinner',
											'title' => esc_html__('Text', 'creatus'),
											'addon' => 'px',
											'min' => 0,
											'max' => 100
										),
										'link' => array(
											'type' => 'spinner',
											'title' => esc_html__('Link', 'creatus'),
											'addon' => 'px',
											'min' => -100,
											'max' => 100
										)
									)
								),
								'bs' => array(
									'type' => 'thz-box-style',
									'label' => __('Author bio box style', 'creatus'),
									'preview' => true,
									'desc' => esc_html__('Adjust .thz-author-bio box style', 'creatus'),
									'button-text' => esc_html__('Customize author bio box style', 'creatus'),
									'popup' => true,
									'disable' => array('video'),
									'units' => array(
										'borderradius',
										'boxsize',
										'padding',
										'margin',
									),
									'value' => array(
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
								'av' => array(
									'type' => 'multi-picker',
									'label' => false,
									'desc' => false,
									'show_borders' => true,
									'picker' => array(
										'picked' => array(
											'label' => __('Show author avatar', 'creatus'),
											'desc' => esc_html__('Show/hide author avatar', 'creatus'),
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
											'size' => array(
												'type' => 'thz-spinner',
												'label' => __('Author avatar size', 'creatus'),
												'desc' => esc_html__('Set author avatar image size', 'creatus'),
												'addon' => 'px',
												'min' => 0,
												'value' => 65
											),
											'bs' => array(
												'type' => 'thz-box-style',
												'label' => __('Avatar box style', 'creatus'),
												'preview' => true,
												'button-text' => esc_html__('Customize avatar box style', 'creatus'),
												'desc' => esc_html__('Adjust .thz-author-avatar box style', 'creatus'),
												'popup' => true,
												'disable' => array(
													'layout',
													'video',
													'transform',
													'boxsize'
												),
												'units' => array(
													'borderradius',
													'padding',
													'margin',
												),
												'value' => array(
													'margin' => array(
														'top' => '0',
														'right' => '30',
														'bottom' => '0',
														'left' => '0'
													),
													'borderradius' => array(
														'top-left' => 65,
														'top-right' => 65,
														'bottom-right' => 65,
														'bottom-left' => 65,
													),													
												)
											)
										)
									)
								),
								'ah' => array(
									'type' => 'thz-typography',
									'label' => __('Author heading metrics', 'creatus'),
									'desc' => esc_html__('Adjust author heading font metrics.', 'creatus'),
									'value' => array(
										'size' => 16
									),
									'disable' => array(
										'hovered',
										'align'
									),
								),
								'at' => array(
									'type' => 'thz-typography',
									'label' => __('Author text metrics', 'creatus'),
									'desc' => esc_html__('Adjust author text font metrics.', 'creatus'),
									'value' => array(),
									'disable' => array(
										'hovered',
										'align',
										'text-shadow'
									),
								),
								'al' => array(
									'type' => 'thz-typography',
									'label' => __('Author link metrics', 'creatus'),
									'desc' => esc_html__('Adjust author more link font metrics.', 'creatus'),
									'value' => array(
										'size' => 13,
										'weight' => 600,
										'style' => 'italic'
									),
									'disable' => array(
										'align',
										'text-shadow'
									),
								),
								'alt' => array(
									'type' => 'text',
									'value' => esc_html__('More posts by', 'creatus'),
									'label' => __('Author link text', 'creatus'),
									'desc' => esc_html__('Insert author link text', 'creatus')
								)
							)
						)
					)
				)
			),
			'relatedpostssettings' => array(
				'title' => __('Related posts', 'creatus'),
				'type' => 'tab',
				'li-attr' => array('class' => 'thz-related-posts-li'),
				'lazy_tabs'=> false,
				'options' => array(
					fw()->theme->get_options('related_posts_settings')
				)
			),
		)
	)
);
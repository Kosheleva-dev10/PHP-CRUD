<?php
if (!defined('FW')) {
	die('Forbidden');
}
$options = array(
	'singleprojectsetingsgroup' => array(
		'type' => 'group',
		'options' => array(
			'projectdefaultsstab' => array(
				'title' => __('Project', 'creatus'),
				'type' => 'tab',
				'options' => array(

					'project_layout' => array(
						'type' => 'multi-picker',
						'label' => false,
						'desc' => false,
						'show_borders' => true,
						'picker' => array(
							'picked' => array(
								'label' => __('Project layout', 'creatus'),
								'desc' => esc_html__('Select project layout type', 'creatus'),
								'help' => esc_html__('Full; Media is above or under the project, content and meta are in a 2 columns grid. Sidebar; Content and meta are in a sidebar and media is left or right of the sidebar. Page builder; All project elements are disabled and you can use the page builder just like you would in page post type.', 'creatus'),
								'type' => 'short-select',
								'value' => 'full',
								'attr' => array(
									'class' => 'thz-select-switch'
								),
								'choices' => array(
									'full' => array(
										'text' => esc_html__('Full', 'creatus'),
										'attr' => array(
											'data-enable' => '.proj-elements,#fw-backend-option-fw-option-prel_mx,#fw-backend-option-fw-option-pcom_mx,#fw-backend-option-fw-edit-options-modal-prel_mx,#fw-backend-option-fw-edit-options-modal-pcom_mx',
											'data-check' =>'.related-switch'
										)
									),
									'sidebar' => array(
										'text' => esc_html__('Sidebar ( Project content and meta in sidebar ) ', 'creatus'),
										'attr' => array(
											'data-enable' => '.proj-elements,#fw-backend-option-fw-option-prel_mx,#fw-backend-option-fw-option-pcom_mx,#fw-backend-option-fw-edit-options-modal-prel_mx,#fw-backend-option-fw-edit-options-modal-pcom_mx',
											'data-check' =>'.related-switch'
											
										)
									),
									'builder' => array(
										'text' => esc_html__('Page builder ( Disable all project elements and use page builder ) ', 'creatus'),
										'attr' => array(
											'data-disable' => '.proj-elements,#fw-backend-option-fw-option-prel_mx,#fw-backend-option-fw-option-pcom_mx,#fw-backend-option-fw-edit-options-modal-prel_mx,#fw-backend-option-fw-edit-options-modal-pcom_mx,.thz-related-projects-li',
										)
									),
								),

							)
						),
						'choices' => array(
							'full' => array(
							
							'media_mx' => array(
									'type' => 'thz-multi-options',
									'label' => __('Media holder', 'creatus'),
									'desc' => esc_html__('Adjust media holder metrics. See help for more info.', 'creatus'),
									'help' => esc_html__('Note that the holder and max width settings are effective only if there is no active page sidebar.', 'creatus'),
									'value' => array(
										'l' => 'above',
										'h' => 'contained',
										'm' => 100,
									),
									'thz_options' => array(
										'l' => array(
											'title' => esc_html__('Location', 'creatus'),
											'type' => 'short-select',
											'choices' => array(
												'above' => __('Above the project details', 'creatus'),
												'under' => __('Under the project details', 'creatus'),
											),
										),
										'h' => array(
											'type' => 'short-select',
											'title' => __('Holder', 'creatus'),
											'choices' => array(
												'contained' => __('Contained', 'creatus'),
												'notcontained' => __('Not contained', 'creatus'),
												'full' => __('Full width no side space', 'creatus'),
											),
										),
										'm' => array(
											'type' => 'select',
											'title' => esc_html__('Max width', 'creatus'),
											'choices' => _thz_max_width_list(),
										),					
									)
								),
								'details_mx' => array(
									'type' => 'thz-multi-options',
									'label' => __('Details holder metrics', 'creatus'),
									'desc' => esc_html__('Adjust .thz-project-details-holder. See help for more info.', 'creatus'),
									'help' => esc_html__('Note that the holder and max width settings are effective only if there is no active page sidebar.', 'creatus'),
									'value' => array(
										'h' => 'contained',
										'm' => 100,
									),
									'thz_options' => array(
										'h' => array(
											'type' => 'short-select',
											'title' => __('Holder', 'creatus'),
											'choices' => array(
												'contained' => __('Contained', 'creatus'),
												'notcontained' => __('Not contained', 'creatus'),
											),
										),
										'm' => array(
											'type' => 'select',
											'title' => esc_html__('Max width', 'creatus'),
											'choices' => _thz_max_width_list(),
										),					
									)
								),
								'prmeta_side' => array(
									'label' => __('Meta side', 'creatus'),
									'desc' => esc_html__('Choose project meta side.', 'creatus'),
									'type' => 'switch',
									'right-choice' => array(
										'value' => 'left',
										'label' => __('Left', 'creatus')
									),
									'left-choice' => array(
										'value' => 'right',
										'label' => __('Right', 'creatus')
									),
									'value' => 'right'
								),
								'side_width' => array(
									'label' => __('Meta width', 'creatus'),
									'desc' => esc_html__('Select project meta width', 'creatus'),
									'type' => 'radio',
									'value' => 'thz-col-1-3',
									'inline' => true,
									'choices' => array(
										'thz-col-1-2' => esc_html__('50%', 'creatus'),
										'thz-col-1-3' => esc_html__('33.3%', 'creatus'),
										'thz-col-1-4' => esc_html__('20%', 'creatus')
									)
								),
								'side_space' => array(
									'type' => 'thz-spinner',
									'label' => __('Meta space', 'creatus'),
									'desc' => esc_html__('Set space between meta and content', 'creatus'),
									'addon' => 'px',
									'min' => 0,
									'max' => 300,
									'value' => 60
								),

							),
							'sidebar' => array(
								'holder_mx' => array(
									'type' => 'thz-multi-options',
									'label' => __('Project holder', 'creatus'),
									'desc' => esc_html__('Adjust .thz-project-holder. See help for more info.', 'creatus'),
									'help' => esc_html__('Note that the holder and max width settings are effective only if there is no active page sidebar.', 'creatus'),
									'value' => array(
										'h' => 'contained',
										'm' => 100,
									),
									'thz_options' => array(
										'h' => array(
											'type' => 'short-select',
											'title' => __('Holder', 'creatus'),
											'choices' => array(
												'contained' => __('Contained', 'creatus'),
												'notcontained' => __('Not contained', 'creatus'),
											),
										),
										'm' => array(
											'type' => 'select',
											'title' => esc_html__('Max width', 'creatus'),
											'choices' => _thz_max_width_list(),
										),					
									)
								),
								'sidebar_side' => array(
									'label' => __('Sidebar side', 'creatus'),
									'desc' => esc_html__('Choose sidebar  side.', 'creatus'),
									'type' => 'switch',
									'right-choice' => array(
										'value' => 'left',
										'label' => __('Left', 'creatus')
									),
									'left-choice' => array(
										'value' => 'right',
										'label' => __('Right', 'creatus')
									),
									'value' => 'right'
								),
								'sticky_sidebar' => array(
									'label' => __('Sticky sidebar', 'creatus'),
									'desc' => esc_html__('Make sidebar stick while scrolling', 'creatus'),
									'type' => 'switch',
									'right-choice' => array(
										'value' => 'inactive',
										'label' => __('Inactive', 'creatus')
									),
									'left-choice' => array(
										'value' => 'active',
										'label' => __('Active', 'creatus')
									),
									'value' => 'active'
								),
								'side_width' => array(
									'label' => __('Sidebar width', 'creatus'),
									'desc' => esc_html__('Select project sidebar width', 'creatus'),
									'type' => 'radio',
									'inline' => true,
									'value' => 'thz-col-1-3',
									'choices' => array(
										'thz-col-1-2' => esc_html__('50%', 'creatus'),
										'thz-col-1-3' => esc_html__('33.3%', 'creatus'),
										'thz-col-1-4' => esc_html__('20%', 'creatus')
									)
								),
								'side_space' => array(
									'type' => 'thz-spinner',
									'label' => __('Sidebar space', 'creatus'),
									'desc' => esc_html__('Set space between sidebar and media', 'creatus'),
									'addon' => 'px',
									'min' => 0,
									'max' => 300,
									'value' => 60
								),

							)
						)
					),

					'prel_mx' => array(
							'type' => 'thz-multi-options',
							'label' => __('Related projects', 'creatus'),
							'desc' => esc_html__('Adjust related project visibility and holder. See help for more info.', 'creatus'),
							'help' => esc_html__('Note that the holder and max width settings are effective only if there is no active page sidebar or location is outside.', 'creatus'),
							'value' => array(
								'v' => 'show',
								'l' => 'inside',
								'h' => 'contained',
								'm' => 100,
							),
							'thz_options' => array(
								'v' => array(
									'title' => esc_html__('Visibility', 'creatus'),
									'type' => 'short-select',
									'attr' => array(
										'class' => 'thz-select-switch related-switch'
									),
									'choices' => array(
										'show' => array(
											'text' => esc_html__('Show', 'creatus'),
											'attr' => array(
												'data-enable' => '.prel-hol-mx-parent,.thz-related-projects-li',
											)
										),
										'hide' => array(
											'text' => esc_html__('Hide', 'creatus'),
											'attr' => array(
												'data-disable' => '.prel-hol-mx-parent,.thz-related-projects-li',
												
											)
										),
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
										'class' => 'prel-hol-mx'
									)
								),
								'h' => array(
									'type' => 'short-select',
									'title' => __('Holder', 'creatus'),
									'choices' => array(
										'contained' => __('Contained', 'creatus'),
										'notcontained' => __('Not contained', 'creatus'),
									),
									'attr' => array(
										'class' => 'prel-hol-mx'
									),
								),
								'm' => array(
									'type' => 'select',
									'title' => esc_html__('Max width', 'creatus'),
									'choices' => _thz_max_width_list(),
									'attr' => array(
										'class' => 'prel-hol-mx'
									),
								),					
							)
						),
						
						
					'pcom_mx' => array(
							'type' => 'thz-multi-options',
							'label' => __('Project comments', 'creatus'),
							'desc' => esc_html__('Adjust project comments visibility and holder. See help for more info.', 'creatus'),
							'help' => esc_html__('Note that the holder and max width settings are effective only if there is no active page sidebar or location is outside.', 'creatus'),
							'value' => array(
								'v' => 'show',
								'l' => 'inside',
								'h' => 'contained',
								'm' => 100,
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
												'data-enable' => '.pcom-hol-mx-parent',
												
											)
										),
										'hide' => array(
											'text' => esc_html__('Hide', 'creatus'),
											'attr' => array(
												'data-disable' => '.pcom-hol-mx-parent',
												
											)
										),
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
										'class' => 'pcom-hol-mx'
									)
								),
								'h' => array(
									'type' => 'short-select',
									'title' => __('Holder', 'creatus'),
									'choices' => array(
										'contained' => __('Contained', 'creatus'),
										'notcontained' => __('Not contained', 'creatus'),
									),
									'attr' => array(
										'class' => 'pcom-hol-mx'
									),
								),
								'm' => array(
									'type' => 'select',
									'title' => esc_html__('Max width', 'creatus'),
									'choices' => _thz_max_width_list(),
									'attr' => array(
										'class' => 'pcom-hol-mx'
									),
								),					
							)
						),
						
					'pnav_mx' => array(
							'type' => 'thz-multi-options',
							'label' => __('Projects navigation', 'creatus'),
							'desc' => esc_html__('Adjust projects navigation ( next/previous ) visibility and holder. See help for more info.', 'creatus'),
							'help' => esc_html__('Note that the holder and max width settings are effective only if there is no active page sidebar.', 'creatus'),
							'value' => array(
								'v' => 'show',
								'h' => 'contained',
								'm' => 100,
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
												'data-enable' => '.pnav-hol-mx-parent',
												
											)
										),
										'hide' => array(
											'text' => esc_html__('Hide', 'creatus'),
											'attr' => array(
												'data-disable' => '.pnav-hol-mx-parent',
												
											)
										),
									)
								),
								'h' => array(
									'type' => 'short-select',
									'title' => __('Holder', 'creatus'),
									'choices' => array(
										'contained' => __('Contained', 'creatus'),
										'notcontained' => __('Not contained', 'creatus'),
									),
									'attr' => array(
										'class' => 'pnav-hol-mx'
									),
								),
								'm' => array(
									'type' => 'select',
									'title' => esc_html__('Max width', 'creatus'),
									'choices' => _thz_max_width_list(),
									'attr' => array(
										'class' => 'pnav-hol-mx'
									),
								),					
							)
						),

				)
			),
			'projectmediastab' => array(
				'title' => __('Media', 'creatus'),
				'type' => 'tab',
				'li-attr' => array('class' => 'proj-elements'),
				'options' => array(
					'ppm' => array(
						'type' => 'multi-picker',
						'label' => false,
						'desc' => false,
						'show_borders' => true,
						'picker' => array(
							'picked' => array(
								'label' => __('Show project media', 'creatus'),
								'desc' => esc_html__('Show/hide project media', 'creatus'),
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
									'label' => __('Project media box style', 'creatus'),
									'preview' => true,
									'button-text' => esc_html__('Customize project media box style', 'creatus'),
									'desc' => esc_html__('Adjust .thz-project-media box style', 'creatus'),
									'popup' => true,
									'disable' => array('video'),
									'value' => array(
										'margin' => array(
											'top' => '0',
											'right' => 'auto',
											'bottom' => 60,
											'left' => 'auto'
										),
									)
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
												'show' => esc_html__('Show', 'creatus'),
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
			'projecttitlestab' => array(
				'title' => __('Title', 'creatus'),
				'type' => 'tab',
				'li-attr' => array('class' => 'proj-elements'),
				'options' => array(
					'ppt' => array(
						'type' => 'multi-picker',
						'label' => false,
						'desc' => false,
						'show_borders' => true,
						'picker' => array(
							'picked' => array(
								'label' => __('Show project title', 'creatus'),
								'desc' => esc_html__('Show/hide project title', 'creatus'),
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
									'label' => __('Project title box style', 'creatus'),
									'preview' => true,
									'button-text' => esc_html__('Customize project title box style', 'creatus'),
									'desc' => esc_html__('Adjust .thz-project-title box style', 'creatus'),
									'popup' => true,
									'disable' => array('layout','video','boxsize','transform'),
									'value' => array(
										'margin' => array(
											'top' => '0',
											'right' => 'auto',
											'bottom' => '10',
											'left' => 'auto'
										),
									)
								),
								'tm' => array(
									'type' => 'thz-typography',
									'label' => __('Project title metrics', 'creatus'),
									'desc' => esc_html__('Adjust project title metrics.', 'creatus'),
									'value' => array(
										'size' => 28,
									),
									'disable' => array('color','hovered'),
								),
								'c' => array(
									'type' => 'thz-multi-options',
									'label' => __('Project title colors', 'creatus'),
									'desc' => esc_html__('Adjust project title colors. Theme links colors are inherited if empty', 'creatus'),
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
			'projectcontentstab' => array(
				'title' => __('Content', 'creatus'),
				'type' => 'tab',
				'li-attr' => array('class' => 'proj-elements'),
				'options' => array(
				
					'ppbac' => array(
						'label' => __('Builder active content', 'creatus'),
						'desc' => __('Select project content ( description ) when page builder is active.', 'creatus'),
						'help' => __('If excerpt is selected and page builder is active, page builder content is displayed above the project. If Page builder content is selected it is displayed within the project as project content.', 'creatus'),
						'type' => 'short-select',
						'value' => 'builder',
						'choices' => array(
							'builder' => __('Page builder content', 'creatus'),
							'excerpt' => __('Excerpt', 'creatus'),
						)
					),
				
					'ppcbs' => array(
						'type' => 'thz-box-style',
						'label' => __('Project content box style', 'creatus'),
						'preview' => true,
						'button-text' => esc_html__('Customize project content box style', 'creatus'),
						'desc' => esc_html__('Adjust .thz-project-content box style', 'creatus'),
						'popup' => true,
						'disable' => array('layout','video','boxsize','transform'),
						'value' => array(
							'margin' => array(
								'top' => '0',
								'right' => 'auto',
								'bottom' => 60,
								'left' => 'auto'
							),
						)
					),
					'ppcc' => array(
						'type' => 'thz-multi-options',
						'label' => __('Project content colors', 'creatus'),
						'desc' => esc_html__('Adjust project content colors. Theme colors are used if empty.', 'creatus'),
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
			'projectmetastab' => array(
				'title' => __('Meta', 'creatus'),
				'type' => 'tab',
				'li-attr' => array('class' => 'proj-elements'),
				'options' => array(
					'ppmcbs' => array(
						'type' => 'thz-box-style',
						'label' => __('Meta container box style', 'creatus'),
						'preview' => true,
						'button-text' => esc_html__('Customize project meta container box style', 'creatus'),
						'desc' => esc_html__('Adjust .thz-project-meta-container box style', 'creatus'),
						'popup' => true,
						'disable' => array('layout','video','boxsize','transform'),
						'value' => array(
							'margin' => array(
								'top' => '0',
								'right' => 'auto',
								'bottom' => 60,
								'left' => 'auto'
							),
						)
					),
					'ppmbs' => array(
						'type' => 'thz-box-style',
						'label' => __('Meta box style', 'creatus'),
						'preview' => true,
						'button-text' => esc_html__('Customize project meta item box style', 'creatus'),
						'desc' => esc_html__('Adjust .thz-project-meta box style', 'creatus'),
						'popup' => true,
						'disable' => array('layout','video','boxsize','transform'),
						'value' => array(
							'padding' => array(
								'top' => '0',
								'right' => '0',
								'bottom' => '15',
								'left' => '0'
							),
							'margin' => array(
								'top' => '0',
								'right' => 'auto',
								'bottom' => '15',
								'left' => 'auto'
							),
							'borders' => array(
								'all'=> 'separate',			
								'top'=> array(
									'w' => 0,
									's' => 'solid',
									'c' => ''
								),
								'right'=> array(
									'w' => 0,
									's' => 'solid',
									'c' => ''
								),
								'bottom'=> array(
									'w' => 1,
									's' => 'solid',
									'c' => 'color_4'
								),
								'left'=> array(
									'w' => 0,
									's' => 'solid',
									'c' => ''
								)
							),
						)
					),
				
					'ppmlw' => array(
						'type' => 'thz-spinner',
						'label' => __('Meta label width', 'creatus'),
						'desc' => esc_html__('Set project meta label width', 'creatus'),
						'addon' => '%',
						'min' => 0,
						'max' => 100,
						'value' => 30
					),
					'ppmlm' => array(
						'type' => 'thz-typography',
						'label' => __('Meta label font metrics', 'creatus'),
						'desc' => esc_html__('Adjust project meta label font metrics.', 'creatus'),
						'value' => array(
							'size' => 14,
							'weight' => 600,
							'color' => 'color_2'
						),
						'disable' => array('hovered','align','text-shadow'),
					),
					'ppmm' => array(
						'type' => 'thz-typography',
						'label' => __('Meta font metrics', 'creatus'),
						'desc' => esc_html__('Adjust project meta font metrics.', 'creatus'),
						'value' => array(),
						'disable' => array('color','hovered','align','text-shadow'),
					),
					'ppmc' => array(
						'type' => 'thz-multi-options',
						'label' => __('Meta item metrics', 'creatus'),
						'desc' => esc_html__('Adjust meta item resets and colors. Theme colors are inherited if empty', 'creatus'),
						'value' => array(
							'pr' => 'donotreset',
							'mr' => 'donotreset',
							'bo' => 'last_bottom',
							'co' => '',
							'lc' => '',
							'hc' => ''
						),
						'thz_options' => array(
							'pr' => array(
								'type' => 'short-select',
								'title' => esc_html__('Padding reset', 'creatus'),
								'choices' => array(
									'first_top' => esc_html__('Reset first item top padding', 'creatus'),
									'first_bottom' => esc_html__('Reset first item bottom padding', 'creatus'),
									'last_top' => esc_html__('Reset last item top padding', 'creatus'),
									'last_bottom' => esc_html__('Reset last item bottom padding', 'creatus'),
									'donotreset' => esc_html__('Do not reset', 'creatus'),
								)
							),
							'mr' => array(
								'type' => 'short-select',
								'title' => esc_html__('Margin reset', 'creatus'),
								'choices' => array(
									'first_top' => esc_html__('Reset first item top margin', 'creatus'),
									'first_bottom' => esc_html__('Reset first item bottom margin', 'creatus'),
									'last_top' => esc_html__('Reset last item top margin', 'creatus'),
									'last_bottom' => esc_html__('Reset last item bottom margin', 'creatus'),
									'donotreset' => esc_html__('Do not reset', 'creatus'),
								)
							),
							
							'bo' => array(
								'type' => 'short-select',
								'title' => esc_html__('Borders reset', 'creatus'),
								'choices' => array(
									'first_top' => esc_html__('Reset first item top border', 'creatus'),
									'first_bottom' => esc_html__('Reset first item bottom border', 'creatus'),
									'last_top' => esc_html__('Reset last item top border', 'creatus'),
									'last_bottom' => esc_html__('Reset last item bottom border', 'creatus'),
									'donotreset' => esc_html__('Do not reset', 'creatus'),
								)
							),
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
			'projectsharingtab' => array(
				'title' => __('Sharing links', 'creatus'),
				'type' => 'tab',
				'li-attr' => array('class' => 'proj-elements'),
				'options' => array(
					'ppps' => array(
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
														'data-disable' => '.poim-sh-parent,.poim-shr-parent,.poim-sc-parent,.poim-sch-parent'
													)
												),
												'outline' => array(
													'text' => esc_html__('Outline', 'creatus'),
													'attr' => array(
														'data-enable' => '.poim-sh-parent,.poim-shr-parent,.poim-sc-parent,.poim-sch-parent'
													)
												),
												'flat' => array(
													'text' => esc_html__('Flat', 'creatus'),
													'attr' => array(
														'data-enable' => '.poim-sh-parent,.poim-shr-parent,.poim-sc-parent,.poim-sch-parent'
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
												'class' => 'poim-sh'
											
											)
										),
										'r' => array(
											'type' => 'spinner',
											'title' => esc_html__('Shape ratio', 'creatus'),
											'addon' => 'X',
											'attr' => array(
												'class' => 'poim-shr'
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
												'class' => 'poim-sc'
											
											)
										),
										'sch' => array(
											'type' => 'color',
											'title' => esc_html__('Style hovered', 'creatus'),
											'box' => true,
											'attr' => array(
												'class' => 'poim-sch'
											
											)
										)							
									)
								),
							)
						)
					)
				)
			),
			'relatedprojectstab' => array(
				'title' => __('Related projects', 'creatus'),
				'type' => 'tab',
				'li-attr' => array('class' => 'thz-related-projects-li'),
				'lazy_tabs'=> false,
				'options' => array(
					fw()->theme->get_options('related_projects_settings')
				)
			),
		)
	)
);
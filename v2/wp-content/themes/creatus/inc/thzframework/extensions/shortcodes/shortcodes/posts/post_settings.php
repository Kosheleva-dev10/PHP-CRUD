<?php
if (!defined('FW')) {
	die('Forbidden');
}
$options = array(
	'tabdefaultsettings' => array(
		'title' => __('Defaults', 'creatus'),
		'type' => 'tab',
		'lazy_tabs' => false,
		'options' => array(
			'display_mode' => array(
				'type' => 'multi-picker',
				'label' => false,
				'desc' => false,
				'picker' => array(
					'picked' => array(
						'label' => __('Items display mode', 'creatus'),
						'desc' => esc_html__('Select portfolio items display mode', 'creatus'),
						'type' => 'select',
						'attr' => array(
							'class' => 'thz-select-switch'
						),
						'value' => 'introunder',
						'choices' => array(
							'introunder' => array(
								'text' => esc_html__('Intro box under ( Intro box visible )', 'creatus'),
								'attr' => array(
									'data-enable' => '#thz-hover-med_over-color,#thz-hover-med_over-oeffect,#thz-hover-med_over-ieffect,#thz-hover-med_over-iceffect',
									'data-check' =>'#fw-edit-options-modal-display_mode-introunder-mbmx-show'
								)
							),
							'reveal' => array(
								'text' => esc_html__('Reveal ( Intro box hides on hover )', 'creatus'),
								'attr' => array(
									'data-enable' => '#thz-hover-med_over-color,#thz-hover-med_over-oeffect,#thz-hover-med_over-ieffect,#thz-hover-med_over-iceffect,mediah_bs,media_bs,.thz-tab-posts-icons,.thz-tab-posts-mediatab,.thz-tab-posts-woo-cartbutton,.fw-option-type-thz-hover',
									'data-disable' => 'mediah_bs'
								)
							),
							'thzhover' => array(
								'text' => esc_html__(' Thz hover ( Intro box shows on hover )', 'creatus'),
								'attr' => array(
									'data-enable' => '#thz-hover-med_over-oeffect,#thz-hover-med_over-ieffect,mediah_bs,media_bs,.thz-tab-posts-icons,.thz-tab-posts-mediatab,.thz-tab-posts-woo-cartbutton,.fw-option-type-thz-hover',
									'data-disable' => '#thz-hover-med_over-iceffect,mediah_bs'
								)
							),
							'directional' => array(
								'text' => esc_html__('Directional ( Intro box shows on hover )', 'creatus'),
								'attr' => array(
									'data-enable' => '#thz-hover-med_over-ieffect,mediah_bs,media_bs,.thz-tab-posts-icons,.thz-tab-posts-mediatab,.thz-tab-posts-woo-cartbutton,.fw-option-type-thz-hover',
									'data-disable' => '#thz-hover-med_over-color,#thz-hover-med_over-oeffect,#thz-hover-med_over-iceffect,mediah_bs'
								)
							)
						)
					)
				),
				'choices' => array(
				
				
					'introunder'=>array(

						'mbmx' => array(
							'type' => 'thz-multi-options',
							'label' => __('Posts holder metrics', 'creatus'),
							'desc' => esc_html__('Adjust post holder metrics', 'creatus'),
							'value' => array(
								'show' => 'show',
								'poz' => 'above',
								'mw' => 40,
								'alt' => 'inactive',
								'va' => 'middle',
							),
							'thz_options' => array(
								'show' => array(
									'title' => esc_html__('Show media box', 'creatus'),
									'type' => 'short-select',
									'value' => 'show',
									'attr' => array(
										'class' => 'thz-select-switch'
									),
									'choices' => array(
										'show' => array(
											'text' => esc_html__('Show', 'creatus'),
											'attr' => array(
												'data-enable' => 'mediah_bs,media_bs,.thz-tab-posts-icons,.thz-tab-posts-mediatab,.thz-tab-posts-woo-cartbutton,.fw-option-type-thz-hover,.clspozmx-parent',
												'data-check' =>'.clspozmx'
											)
										),
										'hide' => array(
											'text' => esc_html__('Hide', 'creatus'),
											'attr' => array(
												'data-disable' => 'mediah_bs,media_bs,.thz-tab-posts-icons,.thz-tab-posts-mediatab,.thz-tab-posts-woo-cartbutton,.fw-option-type-thz-hover,.clspozmx-parent,.clsidemx-parent',
											)
										),
									)
								),
								'poz' => array(
									'type' => 'short-select',
									'title' => esc_html__('Media Position', 'creatus'),
									'attr' => array(
										'class' => 'thz-select-switch clspozmx'
									),
									'choices' => array(
										'above' => array(
											'text' => esc_html__('Media above intro text', 'creatus'),
											'attr' => array(
												'data-disable' => '.clsidemx-parent'
											)
										),
										'left' => array(
											'text' => esc_html__('Media left', 'creatus'),
											'attr' => array(
												'data-enable' => '.clsidemx-parent'
											)
										),
										'right' => array(
											'text' => esc_html__('Media right', 'creatus'),
											'attr' => array(
												'data-enable' => '.clsidemx-parent'
											)
										),
									)
								),
								'mw' => array(
									'type' => 'spinner',
									'title' => esc_html__('Media width', 'creatus'),
									'addon' => '%',
									'min' => 0,
									'step' => 0.1,
									'max' => 100,
									'attr' => array(
										'class' => 'clsidemx'
									),
								),
								'alt' => array(
									'title' => esc_html__('Alternate sides', 'creatus'),
									'type' => 'short-select',
									'inline' => true,
									'choices' => array(
										'active' => esc_html__('Alternate', 'creatus'),
										'inactive' => esc_html__('Do not alternate', 'creatus'),
									),
									'attr' => array(
										'class' => 'clsidemx'
									),
								),
								'va' => array(
									'type' => 'short-select',
									'title' => esc_html__('V-align', 'creatus'),
									'choices' => array(
										'top' => esc_html__('Top', 'creatus'),
										'middle' => esc_html__('Middle', 'creatus'),
										'bottom' => esc_html__('Bottom', 'creatus')
									),
									'attr' => array(
										'class' => 'clsidemx'
									),
								),
							)
						),				
					
					),
					'reveal' => array(
						'intro_height' => array(
							'type' => 'multi-picker',
							'label' => false,
							'desc' => false,
							'picker' => array(
								'picked' => array(
									'label' => __('Intro box height', 'creatus'),
									'desc' => esc_html__('Set intro box at full or auto height', 'creatus'),
									'type' => 'switch',
									'right-choice' => array(
										'value' => 'auto',
										'label' => __('Auto', 'creatus')
									),
									'left-choice' => array(
										'value' => 'full',
										'label' => __('Full', 'creatus')
									),
									'value' => 'full'
								)
							),
							'choices' => array(
								'auto' => array(
									'position' => array(
										'label' => __('Intro box position', 'creatus'),
										'desc' => esc_html__('Position the intro box', 'creatus'),
										'value' => 'bottom',
										'type' => 'radio',
										'inline' => true,
										'choices' => array(
											'top' => esc_html__('On top', 'creatus'),
											'bottom' => esc_html__('At the bottom', 'creatus')
										)
									)
								),
								'full' => array(
									'valign' => array(
										'label' => __('Intro box v-align', 'creatus'),
										'desc' => esc_html__('Vertically align intro box content', 'creatus'),
										'value' => 'thz-va-bottom',
										'type' => 'radio',
										'inline' => true,
										'choices' => array(
											'thz-va-top' => esc_html__('Top', 'creatus'),
											'thz-va-middle' => esc_html__('Middle', 'creatus'),
											'thz-va-bottom' => esc_html__('Bottom', 'creatus')
										)
									)
								)
							)
						),
						'reveal_effect' => array(
							'type' => 'thz-multi-options',
							'label' => __('Reveal effect', 'creatus'),
							'desc' => esc_html__('Select intro box reveal effect and duration', 'creatus'),
							'value' => array(
								'effect' => 'thz-reveal-goleft',
								'transition' => 'thz-transease-04'
							),
							'thz_options' => array(
								'effect' => array(
									'type' => 'select',
									'title' => esc_html__('Effect', 'creatus'),
									'choices' => _thz_reveal_list()
								),
								'transition' => array(
									'type' => 'short-select',
									'title' => esc_html__('Duration', 'creatus'),
									'choices' => _thz_transition_duration_list()
								)
							)
						),
						'distance' => array(
							'type' => 'thz-spinner',
							'label' => __('Intro box distance', 'creatus'),
							'desc' => esc_html__('Distance the intro box from media box edges', 'creatus'),
							'addon' => 'px',
							'min' => 0,
							'max' => 200,
							'value' => '0'
						)
					),
					'directional' => array(
						'valign' => array(
							'label' => __('Intro box v-align', 'creatus'),
							'desc' => esc_html__('Vertically align intro box content', 'creatus'),
							'value' => 'thz-va-middle',
							'type' => 'radio',
							'inline' => true,
							'choices' => array(
								'thz-va-top' => esc_html__('Top', 'creatus'),
								'thz-va-middle' => esc_html__('Middle', 'creatus'),
								'thz-va-bottom' => esc_html__('Bottom', 'creatus')
							)
						),
						'distance' => array(
							'type' => 'thz-spinner',
							'label' => __('Intro box distance', 'creatus'),
							'desc' => esc_html__('Distance the intro box from media box edges', 'creatus'),
							'addon' => 'px',
							'min' => 0,
							'max' => 200,
							'value' => '0'
						)
					),
					'thzhover' => array(
						'valign' => array(
							'label' => __('Intro box v-align', 'creatus'),
							'desc' => esc_html__('Vertically align intro box content', 'creatus'),
							'value' => 'thz-va-middle',
							'type' => 'radio',
							'inline' => true,
							'choices' => array(
								'thz-va-top' => esc_html__('Top', 'creatus'),
								'thz-va-middle' => esc_html__('Middle', 'creatus'),
								'thz-va-bottom' => esc_html__('Bottom', 'creatus')
							)
						),
						'distance' => array(
							'type' => 'thz-spinner',
							'label' => __('Intro box distance', 'creatus'),
							'desc' => esc_html__('Distance the intro box from media box edges', 'creatus'),
							'addon' => 'px',
							'min' => 0,
							'max' => 200,
							'value' => '0'
						)
					)
				)
			),
			'med_over' => array(
				'type' => 'thz-hover',
				'value' => array(
					'background' => array(
						'type' =>'gradient',
						'gradient' =>'radial',
						'color1' =>'rgba(0,0,0,0.1)',
						'color2' =>'rgba(0,0,0,0.8)',
					),
					'oeffect' => 'thz-hover-fadein',
					'oduration' => 'thz-transease-04',
					'ieffect' => 'thz-img-zoomin',
					'iduration' => 'thz-transease-04',
					'iceffect' => 'thz-comein-bottom',
					'icduration' => 'thz-transease-05'
				),
				'labels' => array(
					'background' => esc_html__('Overlay background', 'creatus'),
					'overlay' => esc_html__('Overlay effect', 'creatus'),
					'image' => esc_html__('Overlay Image effect', 'creatus'),
					'icons' => esc_html__('Overlay element effect', 'creatus')
				),
				'descriptions' => array(
					'background' => esc_html__('Set media overlay background', 'creatus'),
					'overlay' => esc_html__('Select overlay hover effect and duration', 'creatus'),
					'image' => esc_html__('Select image hover effect and duration', 'creatus'),
					'icons' => esc_html__('Select overlay element hover effect and duration', 'creatus')
				),
				'label' => false,
				'desc' => false
			)
		)
	),
	'tabboxsettings' => array(
		'title' => __('Boxes', 'creatus'),
		'type' => 'tab',
		'lazy_tabs' => false,
		'options' => array(
			'holder_box_style' => array(
				'type' => 'thz-box-style',
				'label' => __('Holder box style', 'creatus'),
				'preview' => true,
				'button-text' => esc_html__('Customize holder box style', 'creatus'),
				'desc' => esc_html__('Adjust .thz-grid-item-in box style', 'creatus'),
				'help' => esc_html__('Known issue: If layout mode is slider and you add box-shadow to container, the box shadow is cut off due to sliders overflow hidden. One way to fix this is to add this to custom CSS; #thz-wrapper .thz-slide-post-item .thz-grid-item{padding:size_of_the_shadowpx;}', 'creatus'),
				'popup' => true,
				'disable' => array('layout','boxsize','transform','video'),
				'value' => array(),
				'units' => array(
					'borderradius',
					'boxsize',
					'padding',
					'margin',
				),
			),
			
			'intro_bs' => array(
				'type' => 'thz-box-style',
				'label' => __('Intro box style', 'creatus'),
				'preview' => true,
				'button-text' => esc_html__('Customize intro box style', 'creatus'),
				'desc' => esc_html__('Adjust .thz-grid-item-intro box style', 'creatus'),
				'popup' => true,
				'disable' => array('layout','video','image','boxsize','transform'),
				'value' => array(
					'padding' => array(
						'top' => 30,
						'right' => 0,
						'bottom' => 30,
						'left' => 0
					),
				),
				'units' => array(
					'borderradius',
					'padding',
					'margin',
				),
			),
			
			'mediah_bs' => array(
				'type' => 'thz-box-style',
				'label' => __('Media holder box style', 'creatus'),
				'popup' => true,
				'desc' => esc_html__('Adjust .thz-grid-item-media-holder box style', 'creatus'),
				'help' => esc_html__('Known issue: If layout mode is slider and you add box-shadow to container, the box shadow is cut off due to sliders overflow hidden. One way to fix this is to add this to custom CSS; #thz-wrapper .thz-slide-post-item .thz-grid-item{padding:size_of_the_shadowpx;}', 'creatus'),
				'popup' => true,
				'button-text' => esc_html__('Customize media holder box style', 'creatus'),
				'disable' => array('layout','boxsize','background','transform'),
				'value' => array(),
				'units' => array(
					'borderradius',
					'padding',
					'margin',
				),
			),
			'media_bs' => array(
				'type' => 'thz-box-style',
				'label' => __('Media box style', 'creatus'),
				'desc' => esc_html__('Adjust .thz-grid-item-media box style. This box holds image, slider or video', 'creatus'),
				'popup' => true,
				'button-text' => esc_html__('Customize media box style', 'creatus'),
				'disable' => array('layout','boxsize','background','transform'),
				'value' => array(),
				'units' => array(
					'borderradius',
					'padding',
					'margin',
				),
			),
			
			'pmx' => array(
				'type' => 'thz-multi-options',
				'label' => __('Posts metrics', 'creatus'),
				'desc' => esc_html__('Select post text alignment and meta/footer elements separator. See help for more info.', 'creatus'),
				'help' => esc_html__('This option will let you adjust space between separator and elements. Nudge option can help you align the separator verticaly. This can come in handy if separator is icon and icon font does not place the icon in absolute vertical middle. Nudge moves relative top position of the separator. Structured data switch helps highlight specific website information for search engines and inserts hidden structured data info whitin item html.', 'creatus'),
				'value' => array(
					'align' => 'thz-align-left',
					'ty' => 'textual',
					't' => '|',
					'i' => 'thzicon thzicon-primitive-dot',
					'fs' => '',
					's' => 5,
					'n' => 0,
					'sd' => 'active',
					
				),
				'thz_options' => array(
					'align' => array(
						'type' => 'short-select',
						'title' => esc_html__('Text align', 'creatus'),
						'choices' => array(
							'thz-align-left' => esc_html__('Left', 'creatus'),
							'thz-align-right' => esc_html__('Right', 'creatus'),
							'thz-align-center' => esc_html__('Center', 'creatus')
						)
					),
					'ty' => array(
						'title' => esc_html__('Separator Type', 'creatus'),
						'type' => 'short-select',
						'value' => 'show',
						'attr' => array(
							'class' => 'thz-select-switch'
						),
						'choices' => array(
							'textual' => array(
								'text' => esc_html__('Textual', 'creatus'),
								'attr' => array(
									'data-enable' => '.pos_sep-text-parent',
									'data-disable' => '.pos_sep-icon-parent',
									
								)
							),
							'icon' => array(
								'text' => esc_html__('Icon', 'creatus'),
								'attr' => array(
									'data-enable' => '.pos_sep-icon-parent',
									'data-disable' => '.pos_sep-text-parent',
									
								)
							),
						)
					),
					't' => array(
						'type' => 'short-text',
						'title' => esc_html__('Separator', 'creatus'),
						'attr' => array(
							'class' => 'pos_sep-text'
						),
					),
					'i' => array(
						'type' => 'icon',
						'title' => esc_html__('Icon', 'creatus'),
						'attr' => array(
							'class' => 'pos_sep-icon'
						),
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
						'max' => 100,
					),
					'n' => array(
						'type' => 'spinner',
						'title' => esc_html__('Nudge', 'creatus'),
						'addon' => 'px',
						'min' => -20,
						'max' => 20,
					),
					'sd' => array(
						'type' => 'short-select',
						'title' => esc_html__('Structured data', 'creatus'),
						'choices' => array(
							'active' => esc_html__('Active', 'creatus'),
							'inactive' => esc_html__('Inactive', 'creatus'),
						)
					),			
				)
			),

			
		)
	),
	'tabtitlesettings' => array(
		'title' => __('Title', 'creatus'),
		'type' => 'tab',
		'options' => array(
			'show_title' => array(
				'type' => 'multi-picker',
				'label' => false,
				'desc' => false,
				'show_borders' => true,
				'picker' => array(
					'picked' => array(
						'label' => __('Show title', 'creatus'),
						'desc' => esc_html__('Show/hide title', 'creatus'),
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
						'title_bs' => array(
							'type' => 'thz-box-style',
							'label' => __('Title box style', 'creatus'),
							'desc' => esc_html__('Adjust .thz-grid-item-title box style', 'creatus'),
							'button-text' => esc_html__('Customize title box style', 'creatus'),
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
						'title_font' => array(
							'type' => 'thz-typography',
							'label' => __('Title font', 'creatus'),
							'desc' => esc_html__('Adjust item title font.', 'creatus'),
							'value' => array(
								'size' => 18,
							),
						)
					)
				)
			)
		)
	),
	'tabmetasettings' => array(
		'title' => __('Meta', 'creatus'),
		'type' => 'tab',
		'lazy_tabs' => false,
		'options' => array(
			'meta_elements' => array(
				'type' => 'thz-sortable-checks',
				'value' => array(
					'date'
				),
				'label' => __('Post meta elements', 'creatus'),
				'desc' => esc_html__('Check to show/hide specific post meta elements. Click and drag the label to sort.', 'creatus'),
				'choices' => _thz_meta_choices(),
			),
			
			'meta_pref' => _thz_metas_preferences('meta'),
			
			'meta_loc' => array(
				'label' => __('Meta location', 'creatus'),
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
				'value' => 'above'
			),
			'meta_bs' => array(
				'type' => 'thz-box-style',
				'label' => __('Meta box style', 'creatus'),
				'button-text' => esc_html__('Customize meta box style', 'creatus'),
				'desc' => esc_html__('Adjust .thz-grid-item-meta box style', 'creatus'),
				'popup' => true,
				'preview' => true,
				'disable' => array('video'),
				'value' => array(
					'margin' => array(
						'top' => 0,
						'right' => 0,
						'bottom' => 10,
						'left' => 0
					),
				),
				'units' => array(
					'borderradius',
					'boxsize',
					'padding',
					'margin',
				),
			),
			'meta_font' => array(
				'type' => 'thz-typography',
				'label' => __('Font settings', 'creatus'),
				'desc' => esc_html__('Adjust meta elements fonts.', 'creatus'),
				'value' => array(
					'size' => 13,
					'weight' => 600,
				),
				'disable' => array('color','hovered'),
			),
			'meta_colors' => array(
				'type' => 'thz-multi-options',
				'label' => __('Meta colors', 'creatus'),
				'desc' => esc_html__('Adjust meta elements colors', 'creatus'),
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
			),
			


		)
	),
	'tabfootersettings' => array(
		'title' => __('Footer', 'creatus'),
		'type' => 'tab',
		'lazy_tabs' => false,
		'options' => array(
			'footer_elements' => array(
				'type' => 'thz-sortable-checks',
				'value' => array(),
				'label' => __('Post footer elements', 'creatus'),
				'desc' => esc_html__('Check to show/hide specific post footer elements. Click and drag the label to sort.', 'creatus'),
				'choices' => _thz_meta_choices(),
			),
			
			'footer_pref' => _thz_metas_preferences('footer'),
			
			'footer_bs' => array(
				'type' => 'thz-box-style',
				'label' => __('Footer box style', 'creatus'),
				'button-text' => esc_html__('Customize footer box style', 'creatus'),
				'desc' => esc_html__('Adjust .thz-grid-item-footer box style', 'creatus'),
				'popup' => true,
				'preview' => true,
				'disable' => array('video'),
				'value' => array(
					'margin' => array(
						'top' => 10,
						'right' => 0,
						'bottom' => 10,
						'left' => 0
					),
				),
				'units' => array(
					'borderradius',
					'boxsize',
					'padding',
					'margin',
				),
			),
			'footer_font' => array(
				'type' => 'thz-typography',
				'label' => __('Font settings', 'creatus'),
				'desc' => esc_html__('Adjust footer elements fonts.', 'creatus'),
				'value' => array(
					'size' => 13,
					'weight' => 600,
				),
				'disable' => array('color','hovered'),
			),
			'footer_colors' => array(
				'type' => 'thz-multi-options',
				'label' => __('Footer colors', 'creatus'),
				'desc' => esc_html__('Adjust footer elements colors', 'creatus'),
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
	),
	'tabintrotxtsettings' => array(
		'title' => __('Intro text', 'creatus'),
		'type' => 'tab',
		'options' => array(
			'show_introtext' => array(
				'type' => 'multi-picker',
				'label' => false,
				'desc' => false,
				'show_borders' => true,
				'picker' => array(
					'picked' => array(
						'label' => __('Show intro text', 'creatus'),
						'desc' => esc_html__('Show/hide intro text (excerpt)', 'creatus'),
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
						'intro_length' => array(
							'type' => 'multi-picker',
							'label' => false,
							'desc' => false,
							'picker' => array(
								'picked' => array(
									'label' => __('Intro length limit', 'creatus'),
									'desc' => esc_html__('Set excerpt length limit. No limit displays full post content.', 'creatus'),
									'type' => 'radio',
									'value' => 'chars',
									'choices' => array(
										'words' => esc_html__('By words', 'creatus'),
										'chars' => esc_html__('By characters', 'creatus'),
										'none' => esc_html__('No limit', 'creatus')
									),
									'inline' => true
								)
							),
							'choices' => array(
								'words' => array(
									'limit' => array(
										'type' => 'thz-spinner',
										'label' => __('Number of words', 'creatus'),
										'desc' => esc_html__('Set number of words to show', 'creatus'),
										'addon' => '#',
										'min' => 0,
										'max' => 200,
										'value' => 15
									)
								),
								'chars' => array(
									'limit' => array(
										'type' => 'thz-spinner',
										'label' => __('Number of characters', 'creatus'),
										'desc' => esc_html__('Set number of characters to show', 'creatus'),
										'addon' => '#',
										'min' => 0,
										'max' => 500,
										'value' => 80
									)
								)
							)
						),
						'introtext_bs' => array(
							'type' => 'thz-box-style',
							'label' => __('Intro text box style', 'creatus'),
							'desc' => esc_html__('Adjust Introtext box style.', 'creatus'),
							'preview' => false,
							'popup' => true,
							'disable' => array('layout','borders','borderradius','boxsize','transform','boxshadow','background'),
							'value' => array(),
							'units' => array(
								'borderradius',
								'boxsize',
								'padding',
								'margin',
							),
						),
						'introtext_font' => array(
							'type' => 'thz-typography',
							'label' => __('Intro text font', 'creatus'),
							'desc' => esc_html__('Adjust intro text font metrics.', 'creatus'),
							'value' => array(),
							'disable' => array('hovered','text-shadow'),
						)
					)
				)
			)
		)
	),
	'tabiconssettings' => array(
		'title' => __('Icons', 'creatus'),
		'type' => 'tab',
		'li-attr' => array(
			'class' => 'thz-tab-posts-icons'
		),
		'options' => array(
			'show_icons' => array(
				'type' => 'multi-picker',
				'label' => false,
				'desc' => false,
				'show_borders' => true,
				'picker' => array(
					'picked' => array(
						'label' => __('Show icons', 'creatus'),
						'desc' => esc_html__('Show/hide media or link icons', 'creatus'),
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
						'icons_metrics' => array(
							'type' => 'thz-multi-options',
							'label' => __('Icons metrics', 'creatus'),
							'desc' => esc_html__('Adjust icons metrics', 'creatus'),
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
									'title' => esc_html__('Icon color', 'creatus')
								)
							)
						),
						'iconsbg_metrics' => array(
							'type' => 'thz-multi-options',
							'label' => __('Shape metrics', 'creatus'),
							'desc' => esc_html__('Adjust icons background shape metrics', 'creatus'),
							'value' => array(
								'sh' => 'circle',
								'bg' => '',
								'bgh' => '',
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
								'bgh' => array(
									'type' => 'color',
									'title' => esc_html__('Background hovered', 'creatus'),
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
						),
						'link_icon' => array(
							'type' => 'multi-picker',
							'label' => false,
							'desc' => false,
							'picker' => array(
								'picked' => array(
									'label' => __('Show link icon', 'creatus'),
									'desc' => esc_html__('Show/hide link icon', 'creatus'),
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
									'icon' => array(
										'type' => 'thz-icon',
										'value' => 'thzicon thzicon-link',
										'label' => __('Link icon', 'creatus'),
										'desc' => esc_html__('Set link icon. Shown only if icon selected.', 'creatus')
									)
								)
							)
						),
						'media_icon' => array(
							'type' => 'multi-picker',
							'label' => false,
							'desc' => false,
							'picker' => array(
								'picked' => array(
									'label' => __('Show media icon', 'creatus'),
									'desc' => esc_html__('Show/hide media icon', 'creatus'),
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
										'label' => __('Media icon', 'creatus'),
										'desc' => esc_html__('Set media icon. Shown only if icon selected.', 'creatus')
									)
								)
							)
						)
					)
				)
			)
		)
	),
	'buttontab' => array(
		'title' => __('Button', 'creatus'),
		'type' => 'tab',
		'options' => array(
			'show_button' => array(
				'type' => 'multi-picker',
				'label' => false,
				'desc' => false,
				'picker' => array(
					'picked' => array(
						'label' => __('Show more button', 'creatus'),
						'desc' => esc_html__('Show or hide more button', 'creatus'),
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
						'cbs' => array(
							'type' => 'thz-box-style',
							'label' => __('Container box style', 'creatus'),
							'preview' => true,
							'button-text' => esc_html__('Customize button container box style', 'creatus'),
							'desc' => esc_html__('Adjust .thz-grid-item-button box style', 'creatus'),
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
						'button' => array(
							'type' => 'thz-button',
							'value' => array(
								'html' => '<div class="thz-btn-container thz-grid-item-more thz-btn-outline"><a class="thz-button thz-btn-theme thz-btn-small thz-radius-4 thz-btn-border-1 thz-align-center" href="#"><span class="thz-btn-text thz-fs-13 thz-fw-600 thz-ngv-n1">more</span></a></div>',
								'buttonText' => 'more',
								'activeColor' => 'theme',
								'buttonSizeClass' 		=> 'small',
								'fontSize' 	=> 13,
								'fontWeight' => 600,
								'textNudgeV' => -1,
								'marginTop' => 30,
								'customClass'	=> 'thz-grid-item-more'
							),
							'label' => false,
							'hidelinks' => true
						)
					)
				)
			)
		)
	)
);
<?php
if (!defined('FW'))
	die('Forbidden');
$options = array(
	'pagetitlesectionsettings' => array(
		'title' => __('Section ', 'creatus'),
		'type' => 'tab',
		'lazy_tabs' => false,
		'li-attr' => array('class' => 'thz-pagetitle-section-li'),
		'options' => array(
			'page_title_metrics' => array(
				'type' => 'thz-multi-options',
				'label' => __('Page title metrics', 'creatus'),
				'desc' => esc_html__('Select page title mode, layout and choose the content order', 'creatus'),
				'value' => array(
					'mode' => 'both',
					'layout' => 'table',
					'align' => 'center',
					'order' => 'p'
				),
				'thz_options' => array(
					'mode' => array(
						'type' => 'short-select',
						'title' => esc_html__('Mode', 'creatus'),
						'attr' => array(
							'class' => 'thz-select-switch'
						),
						'choices' => array(
							'both' => array(
								'text' => esc_html__('Title and Breadcrumbs', 'creatus'),
								'attr' => array(
									'data-enable' => '.thz-mh-fw-option-page_title_metrics-layout,.thz-mh-fw-option-page_title_metrics-order,.thz-mh-fw-edit-options-modal-page_title_metrics-layout,.thz-mh-fw-edit-options-modal-page_title_metrics-order,.thz-pagetitle-section-li,.thz-pagetitle-title-li,.thz-pagetitle-breadcrumbs-li,.thz-pagetitle-subtitle-li,pt_show_on,page_title_options,.media-frame-content .fw-options-tabs-list,#fw-options-box-pagetitle_subbox .fw-options-tabs-list',
									'data-check' =>'.thz-mh-fw-option-page_title_metrics-layout,.thz-mh-fw-option-page_title_metrics-layout'
								)
							),
							'title' => array(
								'text' => esc_html__('Title only', 'creatus'),
								'attr' => array(
									'data-enable' => '.thz-mh-fw-option-page_title_metrics-layout,.thz-mh-fw-edit-options-modal-page_title_metrics-layout,.thz-pagetitle-section-li,.thz-pagetitle-title-li,.thz-pagetitle-subtitle-li,pt_show_on,page_title_options,.media-frame-content .fw-options-tabs-list,#fw-options-box-pagetitle_subbox .fw-options-tabs-list',
									'data-disable' => '.thz-mh-fw-option-page_title_metrics-order,.thz-mh-fw-edit-options-modal-page_title_metrics-order,.thz-pagetitle-breadcrumbs-li',
									'data-check' =>'.thz-mh-fw-option-page_title_metrics-layout,.thz-mh-fw-option-page_title_metrics-layout'
								)
							),
							'breadcrumbs' => array(
								'text' => esc_html__('Breadcrumbs only', 'creatus'),
								'attr' => array(
									'data-enable' => '.thz-mh-fw-option-page_title_metrics-layout,.thz-mh-fw-edit-options-modal-page_title_metrics-layout,.thz-pagetitle-section-li,.thz-pagetitle-breadcrumbs-li,pt_show_on,page_title_options,.media-frame-content .fw-options-tabs-list,#fw-options-box-pagetitle_subbox .fw-options-tabs-list',
									'data-disable' => '.thz-mh-fw-option-page_title_metrics-order,.thz-mh-fw-edit-options-modal-page_title_metrics-order,.thz-pagetitle-title-li,.thz-pagetitle-subtitle-li',
									'data-check' =>'.thz-mh-fw-option-page_title_metrics-layout,.thz-mh-fw-option-page_title_metrics-layout'
								)
							),
							'inactive' => array(
								'text' => esc_html__('Inactive', 'creatus'),
								'attr' => array(
									'data-disable' => '.thz-mh-fw-option-page_title_metrics-layout,.thz-mh-fw-option-page_title_metrics-order,.thz-mh-fw-edit-options-modal-page_title_metrics-layout,.thz-mh-fw-edit-options-modal-page_title_metrics-order,.thz-pagetitle-section-li,.thz-pagetitle-title-li,.thz-pagetitle-breadcrumbs-li,.thz-pagetitle-subtitle-li,pt_show_on,page_title_options,.media-frame-content .fw-options-tabs-list,#fw-options-box-pagetitle_subbox .fw-options-tabs-list,.thz-mh-fw-option-page_title_metrics-align,.thz-mh-fw-edit-options-modal-page_title_metrics-align',
									'data-check' =>'.thz-mh-fw-option-page_title_metrics-layout,.thz-mh-fw-option-page_title_metrics-layout'
								)
							)
						)
					),
					'layout' => array(
						'type' => 'short-select',
						'title' => esc_html__('Layout', 'creatus'),
						'attr' => array(
							'class' => 'thz-select-switch'
						),
						'choices' => array(
							'table' => array(
								'text' => esc_html__('Table', 'creatus'),
								'attr' => array(
									'data-disable' => '.thz-mh-fw-option-page_title_metrics-align,.thz-mh-fw-edit-options-modal-page_title_metrics-align'
								)
							),
							'stack' => array(
								'text' => esc_html__('Stack', 'creatus'),
								'attr' => array(
									'data-enable' => '.thz-mh-fw-option-page_title_metrics-align,.thz-mh-fw-edit-options-modal-page_title_metrics-align'
								)
							),
						)
					),
					'align' => array(
						'type' => 'short-select',
						'title' => esc_html__('Align', 'creatus'),
						'choices' => array(
							'left' => esc_html__('Left', 'creatus'),
							'center' => esc_html__('Center', 'creatus'),
							'right' => esc_html__('Right', 'creatus')
						)
					),
					'order' => array(
						'type' => 'short-select',
						'title' => esc_html__('Order', 'creatus'),
						'choices' => array(
							'p' => esc_html__('Page title first', 'creatus'),
							'b' => esc_html__('Breadcrumbs first', 'creatus')
						)
					)
				)
			),
			'pt_show_on' => array(
				'type' => 'thz-post-type',
				'value' => array(
					'all'
				),
				'label' => __('Show pagetitle on', 'creatus'),
				'desc' => esc_html__('Choose where page title should be shown', 'creatus')
			),
			'page_title_options' => array(
				'type' => 'popup',
				'label' => __('Page title section options', 'creatus'),
				'desc' => esc_html__('Adjust page title section layout and feel', 'creatus'),
				'button' => esc_html__('Customize page title section', 'creatus'),
				'size' => 'large',
				'popup-options' => array(
					'sectionlayouttab' => array(
						'title' => __('Layout', 'creatus'),
						'type' => 'tab',
						'lazy_tabs' => false,
						'options' => array(
							'section_boxstyle' => array(
								'type' => 'thz-box-style',
								'label' => __('Section box style', 'creatus'),
								'desc' => esc_html__('Adjust .thz-pagetitle-section > section box style', 'creatus'),
								'preview' => true,
								'popup' => true,
								'featured' => false,
								'button-text' => esc_html__('Customize section box style', 'creatus'),
								'disable' => array('layout','video','borderradius'),
								'value' => array(
									'padding' => array(
										'top' => '30',
										'right' => '0',
										'bottom' => '30',
										'left' => '0'
									),
									'background' => array(
										'type' => 'color',
										'color' => 'color_5',
									)
								)
							),
							
							'con_bs' => array(
								'type' => 'thz-box-style',
								'label' => __('Container box style', 'creatus'),
								'desc' => esc_html__('Adjust .thz-pagetitle box style', 'creatus'),
								'preview' => true,
								'popup' => true,
								'featured' => false,
								'button-text' => esc_html__('Customize container box style', 'creatus'),
								'disable' => array('layout','video'),
								'value' => array()
							),
							
							'section_contained' => array(
								'type' => 'multi-picker',
								'label' => false,
								'desc' => false,
								'picker' => array(
									'picked' => array(
										'label' => __('Section Contained', 'creatus'),
										'type' => 'switch',
										'right-choice' => array(
											'value' => 'contained',
											'label' => __('Contained', 'creatus')
										),
										'left-choice' => array(
											'value' => 'notcontained',
											'label' => __('Not contained', 'creatus')
										),
										'value' => 'notcontained',
										'desc' => esc_html__('If set to contained this section will be contained by max site width.', 'creatus'),
									)
								),
								'choices' => array(
									'notcontained' => array(
										'content_contained' => array(
											'label' => __('Content contained?', 'creatus'),
											'desc' => esc_html__('If set to contained this section content will be contained by max site width', 'creatus'),
											'type' => 'switch',
											'right-choice' => array(
												'value' => 'contained',
												'label' => __('Contained', 'creatus')
											),
											'left-choice' => array(
												'value' => 'notcontained',
												'label' => __('Not contained', 'creatus')
											),
											'value' => 'contained',
											'help' => esc_html__('This option is useful when you would like to stretch the section content all the way to the section edges.', 'creatus')
										)
									)
								)
							),
							'spacings' => array(
								'type' => 'thz-multi-options',
								'label' => __('Section spacings', 'creatus'),
								'addon' => 'px',
								'min' => 0,
								'value' => array(
									'con' => '',
									'col' => '',
									
								),
								'desc' => esc_html__('Adjust spacings for all containers or columns in this section.', 'creatus'),
								'help' => esc_html__('This option will let you adjust side space for this section .thz-container or .thz-column. If empty it will use spacings options located in theme options "Site" tab.', 'creatus'),
								'thz_options' => array(
									'con' => array(
										'type' => 'spinner',
										'title' => esc_html__('Containers', 'creatus'),
										'addon' => 'px',
										'min' => 0,
										'max' => 1000,
										'step' => 1,
										'attr' => array(
										
											'placeholder' => fw_get_db_settings_option('spacings/con', 30)
										
										),
									),
									'col' => array(
										'type' => 'spinner',
										'title' => esc_html__('Columns', 'creatus'),
										'addon' => 'px',
										'min' => 0,
										'max' => 1000,
										'step' => 1,
										'attr' => array(
										
											'placeholder' => fw_get_db_settings_option('spacings/col', 30)
										
										),
									),
								)
							),
							'id' => array(
								'type' => 'unique',
								'length' => 8
							),							
							'pre' => _thz_responsive_options(),
						)
					),
					'sectioneffectstab' => array(
						'title' => __('Effects', 'creatus'),
						'type' => 'tab',
						'lazy_tabs' => false,
						'options' => array(
							'animate' => array(
								'type' => 'thz-animation',
								'label' => false,
								'value' => array(
									'animate' => 'inactive',
									'effect' => 'thz-anim-fadeIn',
									'duration' => 1000,
									'delay' => 0
								)
							),
							'background_layers' => array(
								'type' => 'addable-popup',
								'label' => __('Background layers', 'creatus'),
								'popup-title' => esc_html__('Add/Edit Background Layer', 'creatus'),
								'desc' => esc_html__('Create background layer. Add parallax, infinity or basic background layer ', 'creatus'),
								'help' => esc_html__('Note that z-index is assigned per layer position in the order. The layer on top has the highest z-index.', 'creatus'),
								'template' => '{{=layer_title}}',
								'add-button-text' => esc_html__('Add/Edit Background layer', 'creatus'),
								'size' => 'large',
								'popup-options' => array(
									fw()->theme->get_options('background_layers')
								)
							)
						) // end options
					) // end sectioneffectstab
				)
			),
		)
	),
	'titlesettings' => array(
		'title' => __('Title ', 'creatus'),
		'type' => 'tab',
		'li-attr' => array('class' => 'thz-pagetitle-title-li'),
		'lazy_tabs' => false,
		'options' => array(
			'sptmode' => array(
				'type' => 'thz-multi-options',
				'label' => __('Single title mode', 'creatus'),
				'desc' => esc_html__('Select the single post page title display mode.', 'creatus'),
				'value' => array(
					'm' => 'name',
				),
				'thz_options' => array(
					'm' => array(
						'type' => 'select',
						'title' => false,
						'choices' => array(
							'title' => esc_html__('Post Title', 'creatus'),
							'cat' => esc_html__('First Category', 'creatus'),
							'name' =>  esc_html__('Post Type Name', 'creatus'),
						)
					),			

				)
			),
			'page_title_margin' => array(
				'type' => 'thz-box-style',
				'label' => __('Page title margin', 'creatus'),
				'desc' => esc_html__('Set page title margin', 'creatus'),
				'disable' => array('layout','padding','borders','borderradius','boxsize','transform','boxshadow','background'),
				'value' => array(
					'margin' => array(
						'top' => 0,
						'right' => 0,
						'bottom' => 0,
						'left' => 0
					),
				)
			),
			
			'page_title_font' => array(
				'type' => 'thz-typography',
				'label' => __('Page title font', 'creatus'),
				'desc' => esc_html__('Page title font color and metrics', 'creatus'),
				'value' => array(
					'size' => 18,
				),
				'disable' => array('hovered','align'),
			),
			
			'pti_an' => array(
				'type' => 'thz-animation',
				'label' => false,
				'value' => array(
					'animate' => 'inactive',
					'effect' => 'thz-anim-fadeIn',
					'duration' => 400,
					'delay' => 0
				),
				'addlabel' => esc_html__('Animate page title', 'creatus'),
				'adddesc' => esc_html__('Add animation to page title container', 'creatus')
			),
		)
	),
	'breadcrumbssettings' => array(
		'title' => __('Breadcrumbs ', 'creatus'),
		'type' => 'tab',
		'li-attr' => array('class' => 'thz-pagetitle-breadcrumbs-li'),
		'lazy_tabs' => false,
		'options' => array(
			'pt_font' => array(
				'type' => 'thz-typography',
				'label' => __('Breadcrumbs font', 'creatus'),
				'desc' => esc_html__('Breadcrumbs  font metrics', 'creatus'),
				'value' => array(
					'size' => 13,
				),
				'disable' => array('color','hovered','align'),
			),
			'pt_colors' => array(
				'type' => 'thz-multi-options',
				'label' => __('Breadcrumbs colors', 'creatus'),
				'desc' => esc_html__('Breadcrumbs font colors. If empty, colors are inhereted from theme.', 'creatus'),
				'value' => array(
					'text' => '',
					'link' => '',
					'hover' => '',
					'sep' =>'',
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
					'hover' => array(
						'type' => 'color',
						'title' => esc_html__('Hovered link', 'creatus'),
						'box' => true
					),
					'sep' => array(
						'type' => 'color',
						'title' => esc_html__('Separator', 'creatus'),
						'box' => true
					),
				)
			),
			
			'pt_sep' => array(
				'type' => 'thz-multi-options',
				'label' => __('Breadcrumbs Separator', 'creatus'),
				'desc' => esc_html__('Select separator type and adjust space between separator and breadcrumbs', 'creatus'),
				'help' => esc_html__('This option will let you adjust space between separator and breadcrumbs. Nudge option can help you align the separator verticaly. This can come in handy if separator is icon and icon font does not place the icon in absolute vertical middle. Nudge moves relative top position of the separator.', 'creatus'),
				'value' => array(
					'ty' => 'textual',
					't' => '/',
					'i' => 'fa fa-angle-right',
					'fs' => '',
					's' => 5,
					'n' => 0,
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
									'data-enable' => '.pt_sep-text-parent',
									'data-disable' => '.pt_sep-icon-parent',
									
								)
							),
							'icon' => array(
								'text' => esc_html__('Icon', 'creatus'),
								'attr' => array(
									'data-enable' => '.pt_sep-icon-parent',
									'data-disable' => '.pt_sep-text-parent',
									
								)
							),
						)
					),
					't' => array(
						'type' => 'short-text',
						'title' => esc_html__('Separator', 'creatus'),
						'attr' => array(
							'class' => 'pt_sep-text'
						),
					),
					'i' => array(
						'type' => 'icon',
						'title' => esc_html__('Icon', 'creatus'),
						'attr' => array(
							'class' => 'pt_sep-icon'
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
		
				)
			),
			
			'pti_bca' => array(
				'type' => 'thz-animation',
				'label' => false,
				'value' => array(
					'animate' => 'inactive',
					'effect' => 'thz-anim-fadeIn',
					'duration' => 400,
					'delay' => 0
				),
				'addlabel' => esc_html__('Animate breadcrumbs', 'creatus'),
				'adddesc' => esc_html__('Add animation to breadcrumbs container', 'creatus')
			),

		)
	),
	'pagetitlesubtitle' => array(
		'title' => __('Subtitle ', 'creatus'),
		'type' => 'tab',
		'li-attr' => array('class' => 'thz-pagetitle-subtitle-li'),
		'lazy_tabs' => false,
		'options' => array(
			'pt_show_subtitle' => array(
				'type' => 'multi-picker',
				'label' => false,
				'desc' => false,
				'show_borders' => true,
				'picker' => array(
					'picked' => array(
						'label' => __('Show subtitle', 'creatus'),
						'desc' => esc_html__('Show/hide subtitle', 'creatus'),
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
						'text' => array(
							'type' => 'text',
							'label' => __('Subtitle text', 'creatus'),
							'desc' => esc_html__('Add subtitle text', 'creatus'),
							'value' => ''
						),
						'location' => array(
							'label' => __('Subtitle location', 'creatus'),
							'desc' => esc_html__('Set subtitle location', 'creatus'),
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
						'font' => array(
							'type' => 'thz-typography',
							'label' => __('Subtitle font', 'creatus'),
							'desc' => esc_html__('Subtitle font metrics', 'creatus'),
							'value' => array(
								'size' => 18,
							),
							'disable' => array('hovered','align'),
						),
						'margin' => array(
							'type' => 'thz-box-style',
							'label' => __('Subtitle margin', 'creatus'),
							'desc' => esc_html__('Set subtitle margin', 'creatus'),
							'disable' => array('layout','padding','borders','borderradius','boxsize','transform','boxshadow','background'),
							'value' => array(
								'margin' => array(
									'top' => 0,
									'right' => 0,
									'bottom' => 0,
									'left' => 0
								),
							)
						)
					)
				)
			)
		)
	)
);
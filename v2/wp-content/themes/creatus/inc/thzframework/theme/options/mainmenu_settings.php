<?php
if (!defined('FW'))
	die('Forbidden');
	
$options = array(
	'mainmenugeneral' => array(
		'title' => __('General', 'creatus'),
		'type' => 'tab',
		'lazy_tabs' => false,
		'options' => array(
			'toplevel_font' => array(
				'label' => __('Top level font', 'creatus'),
				'type' => 'thz-typography',
				'attr' => array(
					'class' => 'thztoplevelfont'
				),
				'value' => array(
					'family' => 'Creatus',
					'weight' => 500,
					'subset' => 'ffk',
					'transform' => 'uppercase',
					'size' => '12',
					'spacing' => '0.3px',
				),
				'disable' => array('color','hovered','line-height'),
			),
			'sublevel_font' => array(
				'label' => __('Sub level font', 'creatus'),
				'type' => 'thz-typography',
				'attr' => array(
					'class' => 'thzsublevelfont'
				),
				'value' => array(
					'size' => '14',
				),
				'disable' => array('color','hovered','line-height'),
			),
			'tm_anim' => array(
				'label' => __('Dropdown animation', 'creatus'),
				'type' => 'select',
				'value' => 'fade',
				'choices' => array(
					'none' => esc_html__('None', 'creatus'),
					'fade' => esc_html__('Fade in', 'creatus'),
					'top' => esc_html__('Come from top', 'creatus'),
					'right' => esc_html__('Come from right', 'creatus'),
					'bottom' => esc_html__('Come from bottom', 'creatus'),
					'left' => esc_html__('Come from left', 'creatus'),
					'zoom' => esc_html__('Zoom in', 'creatus')
				),
				'desc' => esc_html__('Select menu droptown animation', 'creatus')
			),
			'tm_elmx' => array(
				'type' => 'thz-multi-options',
				'label' => __('Secondary menu elements', 'creatus'),
				'desc' => esc_html__('Adjust secondary menu elements. See help for more info.', 'creatus'),
				'help' => esc_html__('Secondary menu items are items added in Secondary menu Display location. Items location option will help you set these items location. If icon size is empty the size is inherited from menu Top level font size. Icon nudge is i element relative top position.', 'creatus'),
				'value' => array(
					'il' => 'before',
					'so' => 'hide',
					'si' => 'show',
					'mc' => 'only',
					'is' => '14',
					'in' => '',
					'ic' => '',
					'ih' => ''
				),
				'breakafter' => array('mc'),
				'thz_options' => array(
					'il' => array(
						'type' => 'short-select',
						'title' => esc_html__('Items', 'creatus'),
						'choices' => array(
							'before' => array(
								'text' => esc_html__('Before menu icons', 'creatus'),
							),
							'after' => array(
								'text' => esc_html__('After menu icons', 'creatus'),
							),
							'hide' => array(
								'text' => esc_html__('Hide', 'creatus'),
							),
						)
					),
					'so' => array(
						'type' => 'short-select',
						'title' => esc_html__('Social links', 'creatus'),
						'choices' => array(
							'show' => esc_html__('Show', 'creatus'),
							'hide' => esc_html__('Hide', 'creatus')
						)
					),
					'si' => array(
						'type' => 'short-select',
						'title' => esc_html__('Search icon', 'creatus'),
						'choices' => array(
							'show' => esc_html__('Show', 'creatus'),
							'hide' => esc_html__('Hide', 'creatus')
						)
					),
					'mc' => array(
						'title' => esc_html__('Mini cart', 'creatus'),
						'type' => 'short-select',
						'attr' => array(
							'class' => 'thz-select-switch'
						),
						'choices' => array(
							'show' => array(
								'text' => esc_html__('Show', 'creatus'),
								'attr' => array(
									'data-enable' => 'wminc,wooicons'
								)
							),
							'hide' => array(
								'text' => esc_html__('Hide', 'creatus'),
								'attr' => array(
									'data-disable' => 'wminc,wooicons'
								)
							),
							'only' => array(
								'text' => esc_html__('Woo pages only', 'creatus'),
								'attr' => array(
									'data-enable' => 'wminc,wooicons'
								)
							),
						)
					),
					'is' => array(
						'type' => 'spinner',
						'title' => esc_html__('Icons size', 'creatus'),
						'addon' => 'px'
					),
					'in' => array(
						'type' => 'spinner',
						'title' => esc_html__('Icons nudge', 'creatus'),
						'addon' => 'px'
					),
					'ic' => array(
						'type' => 'color',
						'title' => esc_html__('Icon color', 'creatus'),
						'box' => true
					),
					'ih' => array(
						'type' => 'color',
						'title' => esc_html__('Icon hovered', 'creatus'),
						'box' => true
					),
				)
			),

			
			
		)
	),
	'mainmenucontainers' => array(
		'title' => __('Containers', 'creatus'),
		'type' => 'tab',
		'lazy_tabs' => false,
		'options' => array(
			'containerstoplevel' => array(
				'title' => __('Top level', 'creatus'),
				'type' => 'tab',
				'options' => array(
					'tm_contained' => array(
						'type' => 'multi-picker',
						'label' => false,
						'desc' => false,
						'picker' => array(
							'picked' => array(
								'label' => __('Top menu holder contained?', 'creatus'),
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
								'desc' => esc_html__('If set to contained div#mainmenu_holder will be contained by max site width.', 'creatus')
							)
						),
						'choices' => array(
							'notcontained' => array(
								'nav_contained' => array(
									'label' => __('Top menu nav contained?', 'creatus'),
									'desc' => esc_html__('If set to contained nav#thz-nav will be contained by max site width', 'creatus'),
									'type' => 'switch',
									'right-choice' => array(
										'value' => 'contained',
										'label' => __('Contained', 'creatus')
									),
									'left-choice' => array(
										'value' => 'notcontained',
										'label' => __('Not contained', 'creatus')
									),
									'value' => 'contained'
								)
							)
						)
					),
					
					'tm_boxstyle' => array(
						'type' => 'thz-box-style',
						'label' => __('Mainmenu box style', 'creatus'),
						'desc' => esc_html__('Adjust #mainmenu_holder box style', 'creatus'),
						'button-text' => esc_html__('Customize menu holder box style', 'creatus'),
						'popup' => true,
						'attr' => array(
							'data-tminputid' => 'tm_boxstyle',
							'data-changing' => 'padding,margin,border,border-radius,box-shadow,background,background-color'
						),
						'disable' => array(
							'layout',
							'boxsize',
							'video',
							'transform'
						),
						'value' => array()
					),
					
					'tm_nav_bs' => array(
						'type' => 'thz-box-style',
						'label' => __('Mainmenu nav box style', 'creatus'),
						'preview' => true,
						'button-text' => esc_html__('Customize menu nav box style', 'creatus'),
						'desc' => esc_html__('Adjust #thz-nav box tyle', 'creatus'),
						'popup' => true,
						'disable' => array('video','transform','layout','boxsize'),
						'value' => array()
					),
					
					'fsm_bs' => array(
						'type' => 'thz-box-style',
						'label' => __('First secondary menu box style', 'creatus'),
						'preview' => true,
						'button-text' => esc_html__('Customize secondary menu box style', 'creatus'),
						'desc' => esc_html__('Adjust .thz-secondary-menu:first-child box style. See help for more info.', 'creatus'),
						'help' => esc_html__('In some header menu layouts you have 2 secondary menu containers. This option styles the secondary menu located before the main menu ( .thz-secondary-menu:first-child ).', 'creatus'),
						'popup' => true,
						'disable' => array('video','transform','layout','boxsize'),
						'value' => array()
					),
					
					'lsm_bs' => array(
						'type' => 'thz-box-style',
						'label' => __('Last secondary menu box style', 'creatus'),
						'preview' => true,
						'button-text' => esc_html__('Customize secondary menu box style', 'creatus'),
						'desc' => esc_html__('Adjust .thz-secondary-menu:last-child box style. See help for more info.', 'creatus'),
						'help' => esc_html__('In some header menu layouts you have 2 secondary menu containers. This option styles the secondary menu located after the main menu ( .thz-secondary-menu:last-child ).', 'creatus'),
						'popup' => true,
						'disable' => array('video','transform','layout','boxsize'),
						'value' => array()
					),
				)
			),
			'containerssublevel' => array(
				'title' => __('Sub level', 'creatus'),
				'type' => 'tab',
				'options' => array(
					'tm_subul_style' => array(
						'type' => 'thz-box-style',
						'label' => __('Sub level ul style', 'creatus'),
						'button-text' => esc_html__('Customize sub level ul box style', 'creatus'),
						'popup' => true,
						'attr' => array(
							'data-tminputid' => 'tm_subul_style',
							'data-changing' => 'border,box-shadow,background,background-color'
						),
						'disable' => array(
							'layout',
							'margin',
							'boxsize',
							'borderradius',
							'video',
							'image',
							'gradient',
							'transform'
						),
						'value' => array(
							'padding' => array(
								'top' => 15,
								'right' => 15,
								'bottom' => 15,
								'left' => 15
							),
							'boxshadow' => array(
								1 => array(
									'inset' => false,
									'horizontal-offset' => 0,
									'vertical-offset' => 8,
									'blur-radius' => 28,
									'spread-radius' => 0,
									'shadow-color' =>'rgba(0,0,0,0.08)'
								)
							),
							'background' => array(
								'type' => 'color',
								'color' => '#ffffff'
							)
						)
					),
					'tm_subul_radius' => array(
						'type' => 'thz-slider',
						'showinput' => true,
						'value' => 0,
						'attr' => array(
							'data-tminputid' => 'tm_subul_radius'
						),
						'label' => __('Sub level ul border radius', 'creatus'),
						'desc' => esc_html__('Set sub level ul border radius.', 'creatus')
					),
					'tm_subli_border' => array(
						'type' => 'thz-box-style',
						'label' => 'Sub level li border',
						'attr' => array(
							'data-tminputid' => 'tm_subli_border',
							'data-changing' => 'border'
						),
						'disable' => array(
							'layout',
							'padding',
							'margin',
							'borderradius',
							'boxsize',
							'boxshadow',
							'background'
						),
						'value' => array()
					),
					'tm_top_offset' => array(
						'type' => 'thz-slider',
						'value' => '10',
						'properties' => array(
							'min' => -200,
							'max' => 200
						),
						'showinput' => true,
						'attr' => array(
							'data-tminputid' => 'tm_top_offset'
						),
						'label' => __('First sub level top offset', 'creatus'),
						'desc' => esc_html__('Set first sub level top offset', 'creatus'),
						'help' => esc_html__('This is the first sub level flyout position. All first sub level flyouts start at the very bottom of your top menu. This settings can move them down ( e.g. 30px ) from their orignal position.', 'creatus')
					),
					'tm_left_offset' => array(
						'type' => 'thz-slider',
						'value' => '10',
						'properties' => array(
							'min' => -200,
							'max' => 200
						),
						'showinput' => true,
						'attr' => array(
							'data-tminputid' => 'tm_left_offset'
						),
						'label' => __('Next sub level left offset', 'creatus'),
						'desc' => esc_html__('Set next sub level left offset', 'creatus'),
						'help' => esc_html__('This is the next sub level level flyout position. All second level flyouts start at the very left of their parent holder. This settings can move them to the right( e.g. 30px ) from their orignal position.', 'creatus')
					),
					
					'tm_sep_bs' => array(
						'type' => 'thz-box-style',
						'label' => __('Separator box style', 'creatus'),
						'preview' => true,
						'button-text' => esc_html__('Adjust separator box style', 'creatus'),
						'desc' => esc_html__('Adjust a.items-separator box tyle', 'creatus'),
						'popup' => true,
						'disable' => array(
							'layout',
							'boxsize',
							'transform',
							'video'
						),
						'value' => array(
							'padding' => array(
								'top' => 0,
								'right' => 15,
								'bottom' => 7.5,
								'left' => 15
							),
							'margin' => array(
								'top' => 15,
								'right' => 0,
								'bottom' => 0,
								'left' => 0
							)
						),
						'units' => array(
							'borderradius',
							'padding',
							'margin',
						),
						'desc' => esc_html__('Adjust separator item box style', 'creatus')
					),
					'tm_sepf' => array(
						'type' => 'thz-typography',
						'label' => __('Separator item font', 'creatus'),
						'desc' => esc_html__('Adjust separator item font metrics.', 'creatus'),
						'value' => array(
							'family' => 'Creatus',
							'weight' => 500,
							'subset' => 'ffk',
							'transform' => 'uppercase',
							'size' => '12',
							'spacing' => '0.3px',
						),
					),
					
					
					
				)
			),
			'containersmega' => array(
				'title' => __('Mega menu', 'creatus'),
				'type' => 'tab',
				'options' => array(

					'tm_mr_co' => array(
						'label' => __('Row contained?', 'creatus'),
						'desc' => esc_html__('If set to contained .mega-menu-row will be contained by max site width', 'creatus'),
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
						'help' => esc_html__('If header is not contained than the mega menu row stretches as wide as the header. This option can limit the mega menu row to always have the same max-width.', 'creatus')
					),				
				
					'tm_mr_bs' => array(
						'type' => 'thz-box-style',
						'label' => __('Row box style', 'creatus'),
						'desc' => esc_html__('Adjust .mega-menu-row box style','creatus'),
						'preview' => true,
						'button-text' => esc_html__('Customize row box style', 'creatus'),
						'popup' => true,
						'disable' => array('layout','margin','borders','borderradius','boxsize','transform','video','shape'),
						'units' => array(
							'borderradius',
							'boxsize',
							'padding',
							'margin',
						),
						'value' => array(),
						'desc' => esc_html__('Adjust mega menu row box style', 'creatus')
					),
					'tm_mr_cbs' => array(
						'type' => 'thz-box-style',
						'label' => __('Columns padding', 'creatus'),
						'disable' => array(
							'layout',
							'margin',
							'borders',
							'borderradius',
							'boxsize',
							'transform',
							'boxshadow',
							'background'
						),
						'value' => array(
							'padding' => array(
								'top' => 30,
								'right' => 30,
								'bottom' => 30,
								'left' => 30
							)
						),
						'desc' => esc_html__('Adjust mega menu columns padding', 'creatus')
					),
					'tm_mr_cmx' => array(
						'type' => 'thz-multi-options',
						'label' => __('Columns separator', 'creatus'),
						'desc' => esc_html__('Ajust the columns separator. This is a side border between the columns.', 'creatus'),
						'value' => array(
							't' => 'show',
							'w' => 1,
							's' => 'solid',
							'c' => 'color_4'
						),
						'thz_options' => array(
							't' => array(
								'title' => esc_html__('Show/hide', 'creatus'),
								'type' => 'short-select',
								'value' => 'show',
								'attr' => array(
									'class' => 'thz-select-switch'
								),
								'choices' => array(
									'show' => array(
										'text' => esc_html__('Show', 'creatus'),
										'attr' => array(
											'data-enable' => '.mega-col-sep-parent'
										)
									),
									'hide' => array(
										'text' => esc_html__('Hide', 'creatus'),
										'attr' => array(
											'data-disable' => '.mega-col-sep-parent'
										)
									)
								)
							),
							'w' => array(
								'type' => 'spinner',
								'title' => esc_html__('Width', 'creatus'),
								'addon' => 'px',
								'min' => 0,
								'attr' => array(
									'class' => 'mega-col-sep'
								)
							),
							's' => array(
								'type' => 'short-select',
								'title' => esc_html__('Style', 'creatus'),
								'choices' => array(
									'solid' => esc_html__('Solid', 'creatus'),
									'dashed' => esc_html__('Dashed', 'creatus'),
									'dotted' => esc_html__('Dotted', 'creatus')
								),
								'attr' => array(
									'class' => 'mega-col-sep'
								)
							),
							'c' => array(
								'type' => 'color',
								'title' => esc_html__('Color', 'creatus'),
								'box' => true,
								'attr' => array(
									'class' => 'mega-col-sep'
								)
							)
						)
					),
					'tm_mr_ctp' => array(
						'type' => 'thz-box-style',
						'label' => __('Columns title box style', 'creatus'),
						'preview' => true,
						'button-text' => esc_html__('Customize column title box style', 'creatus'),
						'desc' => esc_html__('Adjust a.holdsgroupTitle box tyle', 'creatus'),
						'popup' => true,
						'disable' => array(
							'layout',
							'boxsize',
							'transform',
							'video'
						),
						'value' => array(
							'padding' => array(
								'top' => 0,
								'right' => 15,
								'bottom' => 7.5,
								'left' => 15
							)
						),
						'units' => array(
							'borderradius',
							'padding',
							'margin',
						),
						'desc' => esc_html__('Adjust mega menu columns title box style', 'creatus')
					),
					'tm_mr_ctf' => array(
						'type' => 'thz-typography',
						'label' => __('Columns titles font', 'creatus'),
						'desc' => esc_html__('Adjust mega menu columns titles font metrics.', 'creatus'),
						'value' => array(
							'family' => 'Creatus',
							'weight' => 500,
							'subset' => 'ffk',
							'transform' => 'uppercase',
							'size' => '12',
							'spacing' => '0.3px',
						),
					)
				)
			)
		)
	),
	'mainmenulinks' => array(
		'title' => __('Links', 'creatus'),
		'type' => 'tab',
		'attr' => array(
			'data-tmcontainer' => 'tm_colors_container'
		),
		'options' => array(
			'mainmenulinkslayout' => array(
				'title' => __('Layout', 'creatus'),
				'type' => 'tab',
				'options' => array(
					'tm_tl_icon' => array(
						'type' => 'thz-icon',
						'value' => 'fa fa-angle-down',
						'label' => __('Top level child indicator', 'creatus'),
						'attr' => array(
							'class' => 'thz-child-toplevel'
						)
					),
					'tm_tl_height' => array(
						'type' => 'thz-slider',
						'value' => 80,
						'showinput' => true,
						'attr' => array(
							'data-tminputid' => 'tm_tl_height'
						),
						'properties' => array(
							'min' => 0,
							'max' => 300,
							'sep' => 1
						),
						'label' => __('Top level link height', 'creatus'),
						'desc' => esc_html__('Set top level link height. The menu height will be adjusted to this option.', 'creatus')
					),
					'tm_tl_boxstyle' => array(
						'type' => 'thz-box-style',
						'label' => 'Top level link padding',
						'attr' => array(
							'data-tminputid' => 'tm_tl_boxstyle',
							'data-changing' => 'padding'
						),
						'disable' => array(
							'layout',
							'margin',
							'borders',
							'borderradius',
							'boxsize',
							'transform',
							'boxshadow',
							'background'
						),
						'value' => array(
							'padding' => array(
								'top' => '0',
								'right' => '15',
								'bottom' => '0',
								'left' => '15'
							)
						)
					),
					'tm_tl_spacing' => array(
						'type' => 'thz-slider',
						'value' => 0,
						'showinput' => true,
						'attr' => array(
							'data-tminputid' => 'tm_tl_spacing'
						),
						'label' => __('Top level links spacing', 'creatus'),
						'desc' => esc_html__('Adjust space between the top level links.', 'creatus')
					),
					'tm_tl_radius' => array(
						'type' => 'thz-slider',
						'showinput' => true,
						'value' => 0,
						'attr' => array(
							'data-tminputid' => 'tm_tl_radius'
						),
						'label' => __('Top level link border radius', 'creatus'),
						'desc' => esc_html__('Set top level link border radius.', 'creatus')
					),
					'tm_sl_icon' => array(
						'type' => 'thz-icon',
						'value' => 'fa fa-angle-right',
						'label' => __('Sub levelel child indicator', 'creatus'),
						'attr' => array(
							'class' => 'thz-child-sublevel'
						)
					),
					'tm_subul_link_width' => array(
						'type' => 'thz-slider',
						'showinput' => true,
						'value' => 250,
						'attr' => array(
							'data-tminputid' => 'tm_subul_link_width'
						),
						'properties' => array(
							'min' => 0,
							'max' => 500,
							'sep' => 1
						),
						'label' => __('Sub level link width', 'creatus'),
						'desc' => esc_html__('Set sub level elements width', 'creatus'),
						'help' => esc_html__('Define sub level menu elements width here. This setting will not affect Mega Menu group holder elements width.', 'creatus')
					),
					'tm_subul_link_height' => array(
						'type' => 'thz-slider',
						'value' => 40,
						'showinput' => true,
						'attr' => array(
							'data-tminputid' => 'tm_subul_link_height'
						),
						'properties' => array(
							'min' => 0,
							'max' => 200,
							'sep' => 1
						),
						'label' => __('Sub level link height', 'creatus'),
						'desc' => esc_html__('Set sub level link height.', 'creatus')
					),
					'tm_sl_boxstyle' => array(
						'type' => 'thz-box-style',
						'label' => 'Sub level link padding',
						'attr' => array(
							'data-tminputid' => 'tm_sl_boxstyle',
							'data-changing' => 'padding'
						),
						'disable' => array(
							'layout',
							'margin',
							'borders',
							'borderradius',
							'boxsize',
							'transform',
							'boxshadow',
							'background'
						),
						'value' => array(
							'padding' => array(
								'top' => 0,
								'right' => 15,
								'bottom' => 0,
								'left' => 15
							)
						)
					),
					
					'tm_sl_radius' => array(
						'type' => 'thz-slider',
						'showinput' => true,
						'value' => 4,
						'attr' => array(
							'data-tminputid' => 'tm_sl_radius'
						),
						'label' => __('Sub level link border radius', 'creatus'),
						'desc' => esc_html__('Set sub level link border radius.', 'creatus')
					),
					
				)
			),
			'mainmenucolorslink' => array(
				'title' => __('Link', 'creatus'),
				'type' => 'tab',
				'options' => array(
					'tm_link' => array(
						'type' => 'thz-multi-options',
						'label' => __('Top level link colors', 'creatus'),
						'desc' => esc_html__('Set top level link colors', 'creatus'),
						'value' => array(
							'co' => 'color_2',
							'bg' => 'rgba(255,255,255,0)'
						),
						'thz_options' => array(
							'co' => array(
								'type' => 'color',
								'title' => esc_html__('Color', 'creatus'),
								'box' => true,
								'attr' => array(
									'data-tminputid' => 'tm_link'
								)
							),
							'bg' => array(
								'type' => 'color',
								'title' => esc_html__('Background', 'creatus'),
								'box' => true,
								'attr' => array(
									'data-tminputid' => 'tm_link_bg'
								)
							)
						)
					),
					'tm_tl_border' => array(
						'type' => 'thz-box-style',
						'label' => 'Top level link border',
						'attr' => array(
							'data-tmborders' => 'tm_tl_border',
							'data-changing' => 'border'
						),
						'disable' => array(
							'layout',
							'padding',
							'margin',
							'borderradius',
							'boxsize',
							'transform',
							'boxshadow',
							'background'
						),
						'value' => array()
					),
					'tm_subul_link' => array(
						'type' => 'thz-multi-options',
						'label' => __('Sub level link colors', 'creatus'),
						'desc' => esc_html__('Set sub level item colors', 'creatus'),
						'value' => array(
							'co' => 'color_2',
							'bg' => '#ffffff'
						),
						'thz_options' => array(
							'co' => array(
								'type' => 'color',
								'title' => esc_html__('Color', 'creatus'),
								'box' => true,
								'attr' => array(
									'data-tminputid' => 'tm_subul_link'
								)
							),
							'bg' => array(
								'type' => 'color',
								'title' => esc_html__('Background', 'creatus'),
								'box' => true,
								'attr' => array(
									'data-tminputid' => 'tm_subul_link_bg'
								)
							)
						)
					)
				)
			),
			'mainmenucolorshovered' => array(
				'title' => __('Hovered link', 'creatus'),
				'type' => 'tab',
				'options' => array(
					'tm_link_hover' => array(
						'type' => 'thz-multi-options',
						'label' => __('Top level hovered link colors', 'creatus'),
						'desc' => esc_html__('Set top level hovered item colors', 'creatus'),
						'value' => array(
							'co' => 'rgba(82, 82, 82, 0.58)',
							'bg' => 'rgba(255,255,255,0)'
						),
						'thz_options' => array(
							'co' => array(
								'type' => 'color',
								'title' => esc_html__('Color', 'creatus'),
								'box' => true,
								'attr' => array(
									'data-tminputid' => 'tm_link_hover'
								)
							),
							'bg' => array(
								'type' => 'color',
								'title' => esc_html__('Background', 'creatus'),
								'box' => true,
								'attr' => array(
									'data-tminputid' => 'tm_link_hover_bg'
								)
							)
						)
					),
					'tm_link_hover_border' => array(
						'type' => 'thz-box-style',
						'label' => 'Top level hovered link border',
						'attr' => array(
							'data-tmborders' => 'tm_link_hover_border',
							'data-changing' => 'border'
						),
						'disable' => array(
							'layout',
							'padding',
							'margin',
							'borderradius',
							'boxsize',
							'transform',
							'boxshadow',
							'background'
						),
						'value' => array()
					),
					'tm_subul_link_hover' => array(
						'type' => 'thz-multi-options',
						'label' => __('Sub level hovered link colors', 'creatus'),
						'desc' => esc_html__('Set sub level hovered item colors', 'creatus'),
						'value' => array(
							'co' => 'color_2',
							'bg' => 'color_5'
						),
						'thz_options' => array(
							'co' => array(
								'type' => 'color',
								'title' => esc_html__('Color', 'creatus'),
								'box' => true,
								'attr' => array(
									'data-tminputid' => 'tm_subul_link_hover'
								)
							),
							'bg' => array(
								'type' => 'color',
								'title' => esc_html__('Background', 'creatus'),
								'box' => true,
								'attr' => array(
									'data-tminputid' => 'tm_subul_link_hover_bg'
								)
							)
						)
					)
				)
			),
			'mainmenucolorsactive' => array(
				'title' => __('Active link', 'creatus'),
				'type' => 'tab',
				'options' => array(
					'tm_active_link' => array(
						'type' => 'thz-multi-options',
						'label' => __('Top level active link colors', 'creatus'),
						'desc' => esc_html__('Set top level active item colors', 'creatus'),
						'value' => array(
							'co' => 'rgba(82, 82, 82, 0.58)',
							'bg' => 'rgba(255,255,255,0)'
						),
						'thz_options' => array(
							'co' => array(
								'type' => 'color',
								'title' => esc_html__('Color', 'creatus'),
								'box' => true,
								'attr' => array(
									'data-tminputid' => 'tm_active_link'
								)
							),
							'bg' => array(
								'type' => 'color',
								'title' => esc_html__('Background', 'creatus'),
								'box' => true,
								'attr' => array(
									'data-tminputid' => 'tm_active_link_bg'
								)
							)
						)
					),
					'tm_active_link_border' => array(
						'type' => 'thz-box-style',
						'label' => 'Top level active link border',
						'attr' => array(
							'data-tmborders' => 'tm_active_link_border',
							'data-changing' => 'border'
						),
						'disable' => array(
							'layout',
							'padding',
							'margin',
							'borderradius',
							'boxsize',
							'transform',
							'boxshadow',
							'background'
						),
						'value' => array()
					),
					'tm_subul_active_link' => array(
						'type' => 'thz-multi-options',
						'label' => __('Sub level active link colors', 'creatus'),
						'desc' => esc_html__('Set sub level active item colors', 'creatus'),
						'value' => array(
							'co' => 'color_2',
							'bg' => '#f9f9f9'
						),
						'thz_options' => array(
							'co' => array(
								'type' => 'color',
								'title' => esc_html__('Color', 'creatus'),
								'box' => true,
								'attr' => array(
									'data-tminputid' => 'tm_subul_active_link'
								)
							),
							'bg' => array(
								'type' => 'color',
								'title' => esc_html__('Background', 'creatus'),
								'box' => true,
								'attr' => array(
									'data-tminputid' => 'tm_subul_active_link_bg'
								)
							)
						)
					)
				)
			)
		)
	),
	'mainmenumobile' => array(
		'title' => __('Mobile', 'creatus'),
		'type' => 'tab',
		'options' => array(
			'mm_bs' => array(
				'type' => 'thz-box-style',
				'label' => __('Adjust .thz-mobile-menu-holder box style', 'creatus'),
				'preview' => true,
				'button-text' => esc_html__('Customize mobile menu box style', 'creatus'),
				'desc' => esc_html__('Adjust .thz-mobile-menu-holder box style', 'creatus'),
				'popup' => true,
				'disable' => array('video'),
				'value' => array(
					'borders' => array(
						'all' => 'separate',
						'top' => array(
							'w' => '',
							's' => 'solid',
							'c' => ''
						),
						'right' => array(
							'w' => '',
							's' => 'solid',
							'c' => ''
						),
						'bottom' => array(
							'w' => 1,
							's' => 'solid',
							'c' => 'color_4'
						),
						'left' => array(
							'w' => '',
							's' => 'solid',
							'c' => ''
						),
					),
					'background' => array(
						'type' => 'color',
						'color' => '#ffffff',
					)
				)
			),
			'mm_c' => array(
				'type' => 'thz-multi-options',
				'label' => __('Menu container', 'creatus'),
				'desc' => esc_html__('Adjust mobile menu container box style and colors', 'creatus'),
				'value' => array(
					'bs' => '',
					'i' => '',
					'a' => ''
				),
				'thz_options' => array(
					'bs' => array(
						'type' => 'box-style',
						'title' => esc_html__('Box style', 'creatus'),
						'button-text' => esc_html__('Edit', 'creatus'),
						'connect' => 'mm_bs'
					),
					'i' => array(
						'type' => 'color',
						'title' => esc_html__('Hamburger inactive', 'creatus'),
						'box' => true
					),
					'a' => array(
						'type' => 'color',
						'title' => esc_html__('Hamburger active', 'creatus'),
						'box' => true
					)
				)
			),
			'mm_l' => array(
				'type' => 'thz-multi-options',
				'label' => __('Link', 'creatus'),
				'desc' => esc_html__('Adjust mobile menu link colors', 'creatus'),
				'value' => array(
					'c' => '',
					'bg' => '#ffffff',
					'b' => 'color_4'
				),
				'thz_options' => array(
					'c' => array(
						'type' => 'color',
						'title' => esc_html__('Color', 'creatus'),
						'box' => true
					),
					'bg' => array(
						'type' => 'color',
						'title' => esc_html__('Background', 'creatus'),
						'box' => true
					),
					'b' => array(
						'type' => 'color',
						'title' => esc_html__('Border', 'creatus'),
						'box' => true
					)
				)
			),
			'mm_h' => array(
				'type' => 'thz-multi-options',
				'label' => __('Hovered link', 'creatus'),
				'desc' => esc_html__('Adjust mobile menu hovered link colors', 'creatus'),
				'value' => array(
					'c' => '',
					'bg' => 'color_5',
					'b' => 'color_4'
				),
				'thz_options' => array(
					'c' => array(
						'type' => 'color',
						'title' => esc_html__('Color', 'creatus'),
						'box' => true
					),
					'bg' => array(
						'type' => 'color',
						'title' => esc_html__('Background', 'creatus'),
						'box' => true
					),
					'b' => array(
						'type' => 'color',
						'title' => esc_html__('Border', 'creatus'),
						'box' => true
					)
				)
			),
			'mm_a' => array(
				'type' => 'thz-multi-options',
				'label' => __('Active link', 'creatus'),
				'desc' => esc_html__('Adjust mobile menu active link colors', 'creatus'),
				'value' => array(
					'c' => '',
					'bg' => '#fcfcfc',
					'b' => 'color_4'
				),
				'thz_options' => array(
					'c' => array(
						'type' => 'color',
						'title' => esc_html__('Color', 'creatus'),
						'box' => true
					),
					'bg' => array(
						'type' => 'color',
						'title' => esc_html__('Background', 'creatus'),
						'box' => true
					),
					'b' => array(
						'type' => 'color',
						'title' => esc_html__('Border', 'creatus'),
						'box' => true
					)
				)
			),
			'mm_elmx' => array(
				'type' => 'thz-multi-options',
				'label' => __('Secondary menu elements', 'creatus'),
				'desc' => esc_html__('Adjust secondary menu elements', 'creatus'),
				'value' => array(
					'il' => 'hide',
					'so' => 'hide',
					'si' => 'show',
					'mc' => 'hide',
				),
				'thz_options' => array(
					'il' => array(
						'type' => 'short-select',
						'title' => esc_html__('Items', 'creatus'),
						'choices' => array(
							'before' => array(
								'text' => esc_html__('Before menu icons', 'creatus'),
							),
							'after' => array(
								'text' => esc_html__('After menu icons', 'creatus'),
							),
							'hide' => array(
								'text' => esc_html__('Hide', 'creatus'),
							),
						)
					),
					'so' => array(
						'type' => 'short-select',
						'title' => esc_html__('Social links', 'creatus'),
						'choices' => array(
							'show' => esc_html__('Show', 'creatus'),
							'hide' => esc_html__('Hide', 'creatus')
						)
					),
					'si' => array(
						'type' => 'short-select',
						'title' => esc_html__('Search icon', 'creatus'),
						'choices' => array(
							'show' => esc_html__('Show', 'creatus'),
							'hide' => esc_html__('Hide', 'creatus')
						)
					),
					'mc' => array(
						'type' => 'short-select',
						'title' => esc_html__('Mini cart', 'creatus'),
						'choices' => array(
							'show' => esc_html__('Show', 'creatus'),
							'hide' => esc_html__('Hide', 'creatus')
						)
					),
				)
			)
		)
	)
);
if ( class_exists( 'WooCommerce' ) ) {
	
	$options['mainmenugeneral']['options']['wminc'] = array(
		'type' => 'thz-multi-options',
		'label' => __('Menu mini cart colors', 'creatus'),
		'desc' => esc_html__('Adjust mini cart colors.', 'creatus'),
		'value' => array(
			'bg' => '',
			'tx' => '',
			'lic' => '',
			'lihc' => '',
			'cbg' => 'color_4',
			'cco' => 'color_2'
		),
		'thz_options' => array(
			'bg' => array(
				'type' => 'color',
				'title' => esc_html__('Background', 'creatus'),
				'box' => true
			),
			'tx' => array(
				'type' => 'color',
				'title' => esc_html__('Text', 'creatus'),
				'box' => true
			),
			'lic' => array(
				'type' => 'color',
				'title' => esc_html__('Links', 'creatus'),
				'box' => true
			),
			'lihc' => array(
				'type' => 'color',
				'title' => esc_html__('Links hovered', 'creatus'),
				'box' => true
			),
			'cbg' => array(
				'type' => 'color',
				'title' => esc_html__('Counter bg', 'creatus'),
				'box' => true
			),
			'cco' => array(
				'type' => 'color',
				'title' => esc_html__('Counter color', 'creatus'),
				'box' => true
			)
		)
	);
	$options['mainmenugeneral']['options']['wooicons'] = array(
		'type' => 'thz-multi-options',
		'label' => __('Menu mini cart icons', 'creatus'),
		'desc' => esc_html__('Select menu mini cart icons', 'creatus'),
		'value' => array(
			'mc' => 'thzicon thzicon-shopping-cart2',
			'vc' => 'thzicon thzicon-bag',
			'ch' => 'fa fa-check-square-o'
		),
		'thz_options' => array(
			'mc' => array(
				'type' => 'icon',
				'title' => esc_html__('Cart', 'creatus')
			),
			'vc' => array(
				'type' => 'icon',
				'title' => esc_html__('View cart', 'creatus')
			),
			'ch' => array(
				'type' => 'icon',
				'title' => esc_html__('Checkout', 'creatus')
			)
		)
	);
	
}
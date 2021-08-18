<?php
if (!defined('ABSPATH'))
	die('Direct access forbidden.');
	
	
$palette = apply_filters ('thz_filter_palette_colors', array(
	'color_1' => '#039bf4',
	'color_2' => '#2c2e30',
	'color_3' => '#8f8f8f',
	'color_4' => '#eaeaea',
	'color_5' => '#fafafa',
	
));


$notice ='system-is-ok';
$server_requirements 	= fw()->theme->manifest->get('server_requirements');
$required_input_vars 	= $server_requirements['server']['php_max_input_vars'];

if ( ini_get('max_input_vars') < $required_input_vars ) {
	$notice ='system-display-notice';
}

$options = array(

	'sitelayouttab' => array(
		'title' => __('Site layout', 'creatus'),
		'type' => 'tab',
		'attr' => array(
			'class' => $notice
		),
		'lazy_tabs'=> false,
		'options' => array(
			'site_width' => array(
				'type' => 'thz-spinner',
				'value' => 1200,
				'addon' => 'px',
				'units' => array('px','%'),
				'label' => __('Site max width', 'creatus'),
				'desc' => esc_html__('Define website max-width', 'creatus'),
				'help' => esc_html__('You can use pixels ( px ) or percentage ( % ).', 'creatus')
			),
			'layout_type' => array(
				'type' => 'image-picker',
				'label' => __('Site layout type', 'creatus'),
				'value' => 'full',
				'choices' => array(
					'full' => array(
						'small' => array(
							'height' => 96,
							'src' => thz_theme_file_uri('/inc/thzframework/admin/images/full_width_page_layout.png')
						)
					),
					'boxed' => array(
						'small' => array(
							'height' => 96,
							'src' => thz_theme_file_uri('/inc/thzframework/admin/images/boxed_page_layout.png')
						)
					)
				),
				'desc' => esc_html__('Select site layout type. Full or boxed width.', 'creatus'),
				'help' => esc_html__('Select site layout style. It can boxed or full. Note that if you set this option to "Boxed",  "Contained" option for Header, Mainmenu, Main content and Footer are not effective.', 'creatus')
			),
			
			'bf' => array(
				'type' => 'thz-multi-options',
				'label' => __('Body frame', 'creatus'),
				'desc' => esc_html__('Activate/deactivate body frame', 'creatus'),
				'value' => array(
					'm' => 'inactive',
					'w' => 20,
					'c' => '#ffffff',
					'ss' => 20,
					'sc' => 'rgba(0,0,0,0.1)',
				),
				'thz_options' => array(
					'm' => array(
						'type' => 'select',
						'title' => esc_html__('Mode', 'creatus') ,
						'attr' => array(
							'class' => 'thz-select-switch'
						) ,
						'choices' => array(
							'inactive' => array(
								'text' => esc_html__('Inactive', 'creatus') ,
								'attr' => array(
									'data-disable' => '.bf-mx-parent',
								)
							),
							'active' => array(
								'text' => esc_html__('Active', 'creatus') ,
								'attr' => array(
									'data-enable' => '.bf-mx-parent',
								)
							),

						)
					),
					'w' => array(
						'type' => 'spinner',
						'title' => esc_html__('Frame width', 'creatus'),
						'addon' => 'px',
						'min' => 0,
						'step' => 1,
						'attr' => array(
							'class' =>'bf-mx'
						)
					),
					'c' => array(
						'type' => 'color',
						'title' => esc_html__('Frame color', 'creatus'),
						'box' => true,
						'attr' => array(
							'class' =>'bf-mx'
						)
					),
					'ss' => array(
						'type' => 'spinner',
						'title' => esc_html__('Shadow Size', 'creatus'),
						'addon' => 'px',
						'min' => 0,
						'step' => 1,
						'attr' => array(
							'class' =>'bf-mx'
						)
					),
					'sc' => array(
						'type' => 'color',
						'title' => esc_html__('Shadow color', 'creatus'),
						'box' => true,
						'attr' => array(
							'class' =>'bf-mx'
						)
					),
				)
			),
			
			'main_contained' => array(
				'type' => 'multi-picker',
				'label' => false,
				'desc' => false,
				'picker' => array(
					'picked' => array(
						'label' => __('Main div contained?', 'creatus'),
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
						'desc' => esc_html__('If set to contained main div will be contained by max site width.', 'creatus'),
						'help' => esc_html__('Main content div holds your blog content and left and right sidebar. This option is useful when you would like to stretch the main div all the way to the page edges.', 'creatus')
					)
				),
			),
			
			
			'spacings' => array(
				'type' => 'thz-multi-options',
				'label' => __('Site spacings', 'creatus'),
				'addon' => 'px',
				'min' => 0,
				'value' => array(
					'con' => 30,
					'col' => 30,
					'sec' => 4,
				),
				'desc' => esc_html__('Adjust spacings for all site containers, sections or columns.', 'creatus'),
				'help' => sprintf( esc_html__('Container is side padding for all theme containers a.k.a .thz-container. These containers hold all main site sections;, header, footer, top menu and grid layout.%1$sColumns is side padding for all columns a.k.a .thz-column. They are located inside the .thz-row.%1$sSection is default vertical padding for theme page builder sections a.k.a .thz-section and its value is multiplied by columns spacing.%1$sAll these can also be re-adjusted in every section settings.', 'creatus'),'<br /><br />'),
				'thz_options' => array(
					'con' => array(
						'type' => 'spinner',
						'title' => esc_html__('Containers', 'creatus'),
						'addon' => 'px',
						'min' => 0,
						'max' => 1000,
						'step' => 1,
					),
					'col' => array(
						'type' => 'spinner',
						'title' => esc_html__('Columns', 'creatus'),
						'addon' => 'px',
						'min' => 0,
						'max' => 1000,
						'step' => 1,
					),
					'sec' => array(
						'type' => 'spinner',
						'title' => esc_html__('Sections', 'creatus'),
						'addon' => 'X',
						'min' => 0,
						'step' => 0.5,
					),
				)
			),
			
			'blocks_spacing' => array(
				'type' => 'thz-multi-options',
				'label' => __('Blocks spacings', 'creatus'),
				'desc' => esc_html__('Adjust .thz-block-spacer spacing', 'creatus'),
				'help' => esc_html__('This is spacing for .thz-block-spacer. These containers surround content and left/right sidebars.', 'creatus'),
				'value' => array(
					't' => 75,
					'b' => 75,
					'h' => 75,
					
				),
				'thz_options' => array(
					't' => array(
						'type' => 'spinner',
						'title' => esc_html__('Top', 'creatus'),
						'addon' => 'px',
						'min' => 0,
						'max' => 1000,
						'step' => 1
					),
					'b' => array(
						'type' => 'spinner',
						'title' => esc_html__('Bottom', 'creatus'),
						'addon' => 'px',
						'min' => 0,
						'max' => 1000,
						'step' => 1
					),
					'h' => array(
						'type' => 'spinner',
						'title' => esc_html__('Horizontal', 'creatus'),
						'addon' => 'px',
						'min' => 0,
						'max' => 1000,
						'step' => 1
					),
				)
			),
			
			'sp_res' => array(
				'type' => 'addable-popup',
				'label' => __('Responsive spacings', 'creatus'),
				'desc' => __('Add spacings for specific breakpoints.', 'creatus'),
				'popup-title' => esc_html__('Add/Edit Responsive breakpoint', 'creatus'),
				'template' => 'Breakpoint for {{ if (m.b == "767") { }} : <strong>Mobiles</strong>{{ } }}{{ if (m.b == "979") { }} : <strong>Tablets</strong>{{ } }}{{ if (m.b == "1699") { }} : <strong>Large desktops</strong>{{ } }}',
				'add-button-text' => esc_html__('Add/Edit breakpoint', 'creatus'),
				'size' => 'large',
				'limit' => 3,
				'sortable' => false,
				'popup-options' => array(
					'm' => array(
						'type' => 'thz-multi-options',
						'label' => __('Breakpoint for', 'creatus'),
						'addon' => 'px',
						'min' => 0,
						'value' => array(
							'b' => 767,
						),
						'desc' => esc_html__('Select breakpoint', 'creatus'),
						'thz_options' => array(
							'b' => array(
								'type' => 'short-select',
								'title' => false,
								'choices' => array(
									767 => esc_html__('Mobiles ( under 768px ) ', 'creatus'),
									979 => esc_html__('Tablets ( under 980px )', 'creatus'),
									1699 => esc_html__('Large desktops ( above 1699px )', 'creatus'),
								)
							),
						)
					),					
					's' => array(
						'type' => 'thz-multi-options',
						'label' => __('Site spacings', 'creatus'),
						'addon' => 'px',
						'min' => 0,
						'value' => array(
							'con' => 30,
							'col' => 30,
							'sec' => 3,
						),
						'desc' => esc_html__('Adjust spacings for all site containers, sections or columns.', 'creatus'),
						'help' => sprintf( esc_html__('Container is side padding for all theme containers a.k.a .thz-container. These containers hold all main site sections;, header, footer, top menu and grid layout.%1$sColumns is side padding for all columns a.k.a .thz-column. They are located inside the .thz-row.%1$sSection is default vertical padding for theme page builder sections a.k.a .thz-section and its value is multiplied by columns spacing.%1$sAll these can also be re-adjusted in every section settings.', 'creatus'),'<br /><br />'),
						'thz_options' => array(
							'con' => array(
								'type' => 'spinner',
								'title' => esc_html__('Containers', 'creatus'),
								'addon' => 'px',
								'min' => 0,
								'max' => 1000,
								'step' => 1,
							),
							'col' => array(
								'type' => 'spinner',
								'title' => esc_html__('Columns', 'creatus'),
								'addon' => 'px',
								'min' => 0,
								'max' => 1000,
								'step' => 1,
							),
							'sec' => array(
								'type' => 'spinner',
								'title' => esc_html__('Sections', 'creatus'),
								'addon' => 'X',
								'min' => 0,
								'step' => 0.5,
							),
						)
					),
					'bs' => array(
						'type' => 'thz-multi-options',
						'label' => __('Blocks spacings', 'creatus'),
						'desc' => esc_html__('Adjust .thz-block-spacer spacing', 'creatus'),
						'help' => esc_html__('This is spacing for .thz-block-spacer. These containers surround content and left/right sidebars.', 'creatus'),
						'value' => array(
							't' => 60,
							'b' => 60,
							'h' => 60,
							
						),
						'thz_options' => array(
							't' => array(
								'type' => 'spinner',
								'title' => esc_html__('Top', 'creatus'),
								'addon' => 'px',
								'min' => 0,
								'max' => 1000,
								'step' => 1
							),
							'b' => array(
								'type' => 'spinner',
								'title' => esc_html__('Bottom', 'creatus'),
								'addon' => 'px',
								'min' => 0,
								'max' => 1000,
								'step' => 1
							),
							'h' => array(
								'type' => 'spinner',
								'title' => esc_html__('Horizontal', 'creatus'),
								'addon' => 'px',
								'min' => 0,
								'max' => 1000,
								'step' => 1
							),
						)
					),

				)
			),
			
			
			
			
			
			
			
		)
	),
	'contentlayouttab' => array(
		'title' => __('Content layouts', 'creatus'),
		'type' => 'tab',
		'lazy_tabs'=> false,
		'options' => array(
			'content_layout' => array(
				'label' => __('Content layouts generator', 'creatus'),
				'type' => 'thz-content-layout',
				'value' => array(
					array(
						'title' => 'All pages',
						'page' => 'all',
						'layout' => 'right',
						'leftblock' => 0,
						'contentblock' => 72.5,
						'rightblock' => 27.5
					)
				)
			)
		)
	),
	'stylingtab' => array(
		'title' => __('Styling', 'creatus'),
		'type' => 'tab',
		'lazy_tabs' => false,
		'options' => array(
			'theme_palette' => array(
				'type' => 'thz-palette',
				'label' => __('Theme palette', 'creatus'),
				'value' => $palette
			),
			'body_boxstyle' => array(
				'type' => 'thz-box-style',
				'label' => __('Body box style', 'creatus'),
				'preview' => true,
				'button-text' => esc_html__('Customize body box style', 'creatus'),
				'desc' => esc_html__('Customize body box style', 'creatus'),
				'popup' => true,
				'disable' => array('layout','boxsize','transform','borderradius','transform'),
				'value' => array(
					'background' => array(
						'type' => 'color',
						'color' => '#ffffff',
					)
				)
			),
			'wrapper_boxstyle' => array(
				'type' => 'thz-box-style',
				'label' => __('Wrapper box style', 'creatus'),
				'preview' => true,
				'button-text' => esc_html__('Customize wrapper box style', 'creatus'),
				'desc' => esc_html__('Customize #thz-wrapper box style', 'creatus'),
				'popup' => true,
				'disable' => array('layout','boxsize','transform','transform'),
				'value' => array(
					'background' => array(
						'type' => 'color',
						'color' => '#ffffff',
					)
				)
			),
			'main_boxstyle' => array(
				'type' => 'thz-box-style',
				'label' => __('Main div box style', 'creatus'),
				'desc' => esc_html__('Adjust .thz-main box style', 'creatus'),
				'preview' => true,
				'button-text' => esc_html__('Customize main div box style', 'creatus'),
				'popup' => true,
				'disable' => array('layout','video','transform'),
				'value' => array(
					'background' => array(
						'type' => 'color',
						'color' => '#ffffff',
					)
				)
			),
			fw()->theme->get_options('sidebars_settings'),
			fw()->theme->get_options('elements_settings')
		)
	),
	'sitetypotab' => array(
		'title' => __('Typography', 'creatus'),
		'type' => 'tab',
		'lazy_tabs'=> false,
		'options' => array(
			'body_font' => array(
				'label' => __('Body font', 'creatus'),
				'type' => 'thz-typography',
				'value' => array(
					'family'  		=> 'Open Sans Creatus',
					'weight'     	=> 'regular',
					'subset'    	=> 'ffk',
					'size' 			=> '14',
					'line-height' 	=> 1.8,
					'color' 		=> '#757575',
				),
				'disable' => array('hovered','text-shadow'),
				'desc' => esc_html__('Body font color family and metrics', 'creatus')
			),

			'sitelc' => array(
				'type' => 'thz-multi-options',
				'label' => __('Site colors', 'creatus'),
				'desc' => esc_html__('Adjust site colors', 'creatus'),
				'value' => array(
					'lc' => 'color_2',
					'lh' => 'color_1'
				),
				'thz_options' => array(
					'lc' => array(
						'type' => 'color',
						'title' => esc_html__('Link', 'creatus'),
						'box' => true
					),
					'lh' => array(
						'type' => 'color',
						'title' => esc_html__('Link hovered', 'creatus'),
						'box' => true
					)
				)
			),
			'headings_font' => array(
				'label' => __('Headings font-family', 'creatus'),
				'type' => 'thz-typography',
				'value' => array(
					'family'  		=> 'Creatus',
					'weight'     	=> '500',
					'subset'    	=> 'ffk',
					'transform' 	=> 'default',
				),
				'disable' => array('size','line-height','spacing','align','color','hovered','text-shadow'),
				'desc' => esc_html__('H1, H2, H3, H4, H5 & H6 font-family.', 'creatus')
			),
			'h1_font' => array(
				'label' => __('H1 font metrics', 'creatus'),
				'type' => 'thz-typography',
				'value' => array(
					'size' => 36,
					'line-height' => 1.1,
					'color' => 'color_2'
				),
				'disable' => array('family','weight','style','transform','align','hovered','text-shadow'),
			),
			'h2_font' => array(
				'label' => __('H2 font metrics', 'creatus'),
				'type' => 'thz-typography',
				'value' => array(
					'size' => 30,
					'line-height' => 1.1,
					'color' => 'color_2'
				),
				'disable' => array('family','weight','style','transform','align','hovered','text-shadow'),
			),
			'h3_font' => array(
				'label' => __('H3 font metrics', 'creatus'),
				'type' => 'thz-typography',
				'value' => array(
					'size' => 24,
					'line-height' => 1.1,
					'color' => 'color_2'
				),
				'disable' => array('family','weight','style','transform','align','hovered','text-shadow'),
			),
			'h4_font' => array(
				'label' => __('H4 font metrics', 'creatus'),
				'type' => 'thz-typography',
				'value' => array(
					'size' => 18,
					'line-height' => 1.1,
					'color' => 'color_2'
				),
				'disable' => array('family','weight','style','transform','align','hovered','text-shadow'),
			),
			'h5_font' => array(
				'label' => __('H5 font metrics', 'creatus'),
				'type' => 'thz-typography',
				'value' => array(
					'size' => 16,
					'line-height' => 1.1,
					'color' => 'color_2'
				),
				'disable' => array('family','weight','style','transform','align','hovered','text-shadow'),
			),
			'h6_font' => array(
				'label' => __('H6 font metrics', 'creatus'),
				'type' => 'thz-typography',
				'value' => array(
					'size' => 14,
					'line-height' => 1.1,
					'color' => 'color_2'
				),
				'disable' => array('family','weight','style','transform','align','hovered','text-shadow'),
			),
			
			'floader' => array(
				'type' => 'addable-popup',
				'value' => array(),
				'label' => __('Font loader', 'creatus'),
				'desc'  => esc_html__('Use this option to load additional font weights and styles.', 'creatus'),
				'template' => esc_html__('Additional fonts are loaded','creatus'),
				'popup-title' => null,
				'size' => 'medium', 
				'limit' => 1,
				'add-button-text' => esc_html__('Add addtional font', 'creatus'),
				'sortable' => false,
				'popup-options' => array(
					'l' => array(
						'type' => 'addable-popup',
						'value' => array(),
						'label' => __('Font', 'creatus'),
						'desc'  => esc_html__('Load additional font.', 'creatus'),
						'template' => '{{= f.family }}, {{= f.weight }}, {{= f.subset }}',
						'popup-title' => null,
						'size' => 'medium', 
						'add-button-text' => esc_html__('Click to add/edit font', 'creatus'),
						'popup-options' => array(
							'f' => array(
								'label' => false,
								'type' => 'thz-typography',
								'value' => array(
									'family'  		=> 'Open Sans',
									'weight'     	=> 'regular',
									'subset'    	=> 'latin',
								),
								'disable' => array('size','line-height','spacing','transform','align','color','hovered','text-shadow'),
								'desc' => esc_html__('Select additional font.', 'creatus')
							),
						),
					),				
				),
			),
		)
	)
);
<?php
if (!defined('FW')) {
	die('Forbidden');
}
$options = array(
	'sectionlayouttab' => array(
		'title' => __('Layout', 'creatus'),
		'type' => 'tab',
		'options' => array(
		
			'n' => array(
				'type' => 'thz-multi-options',
				'label' => __('Section name', 'creatus'),
				'addon' => 'px',
				'min' => 0,
				'value' => array(
					'l' => '',
					's' => 'inactive',
				),
				'desc' => esc_html__('Set section name label. See help for more info', 'creatus'),
				'help' => esc_html__('Section name label is used in builder for easy sorting and if you add it to scroll menu it is used in section scroll menu shortcode as tooltip. If you add this section label to scroll menu, do not forget to add Section scroll menu shortcode to the builder.', 'creatus'),
				'thz_options' => array(
					'l' => array(
						'type' => 'text',
						'title' => esc_html__('Label', 'creatus'),
					),
					's' => array(
						'type' => 'short-select',
						'title' => esc_html__('Add to scroll menu', 'creatus'),
						'choices' => array(
							'active' => esc_html__('Add', 'creatus'),
							'inactive' => esc_html__('Do not add', 'creatus'),
						),
					),
				)
			),	

			'mode' => array(
				'label' => __('Layout mode', 'creatus'),
				'desc' => esc_html__('Select section layout mode', 'creatus'),
				'help' => esc_html__('By default grid layout is created by using left floats for columns, if set to flex or flex equal height grid is using flexbox layout wich gives you additional column flexibility. ', 'creatus'),
				'type' => 'short-select',
				'value' => 'default',
				'choices' => array(
					'default' => esc_html__('Default', 'creatus'),
					'thz-flex-section' => esc_html__('Flex', 'creatus'),
					'thz-flex-section-eh' => esc_html__('Flex equal height', 'creatus'),
				)
			),			
			'bs' => array(
				'type' => 'thz-box-style',
				'label' => __('Section box style', 'creatus'),
				'desc' => esc_html__('Adjust .thz-section-holder section box style', 'creatus'),
				'preview' => true,
				'popup' => true,
				'placeholders' => array(
					'padding' =>array(
						'top' => ((float)fw_get_db_settings_option('spacings/sec', 3) * (float)fw_get_db_settings_option('spacings/col', 30)),
						'right' => 0,
						'bottom' => ((float)fw_get_db_settings_option('spacings/sec', 3) * (float)fw_get_db_settings_option('spacings/col', 30)),
						'left' => 0					
					)
				),
				'button-text' => esc_html__('Customize section box style', 'creatus'),
				'value' => array(),
				'units' => array(
					'borderradius',
					'boxsize',
					'padding',
					'margin',
				),
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
					'row' => '',
					'col' => '',
					'el' => '',
				),
				'desc' => esc_html__('Adjust spacings for all containers, rows or columns in this section.', 'creatus'),
				'help' => esc_html__('This option will help you adjust side space for this section .thz-container or .thz-column. If empty it will use spacings options located in theme options "Site" tab. The section vertical padding can be reset or changed in "Section box style" padding option. Rows spacing is the top margin between 2 rows ( .thz-row )  and it is using columns spacing if left empty. Elements spacing is top margin between 2 elements within same column and it can be reset in each element settings.', 'creatus'),
				'thz_options' => array(
					'con' => array(
						'type' => 'spinner',
						'title' => esc_html__('Containers', 'creatus'),
						'addon' => 'px',
						'min' => 0,
						'step' => 1,
						'attr' => array(
							'placeholder' => fw_get_db_settings_option('spacings/con', 30)
						),
					),
					'row' => array(
						'type' => 'spinner',
						'title' => esc_html__('Rows', 'creatus'),
						'addon' => 'px',
						'min' => 0,
						'step' => 1,
						'attr' => array(
							'placeholder' => 'col'
						),
					),
					'col' => array(
						'type' => 'spinner',
						'title' => esc_html__('Columns', 'creatus'),
						'addon' => 'px',
						'min' => 0,
						'step' => 1,
						'attr' => array(
							'placeholder' => fw_get_db_settings_option('spacings/col', 30)
						),
					),
					'el' => array(
						'type' => 'spinner',
						'title' => __('Elements', 'creatus'),
						'addon' => 'px',
						'min' => 0,
						'step' => 1,
						'attr' => array(
							'placeholder' => fw_get_db_settings_option('spacings/col', 30)
						),
					),
				)
			),	
			'smootha' => array(
				'type' => 'thz-multi-options',
				'label' => __('Smooth scroll anchor', 'creatus'),
				'min' => 0,
				'value' => array(
					'm' => 'inactive',
					'p' => 0,
					'd' => 800,
				),
				'desc' => esc_html__('Smooth scroll to container anchor. See help for more info.', 'creatus'),
				'help' => esc_html__('To smooth scroll to this anchor ( the container ID  ) via link, create a link or a new menu Custom link with URL #thisID. Do not forget the hash (#) sign in front of the ID. Stop at px stops the scroll at that px before/after the anchor. Effect duration is in milliseconds. 1000ms = 1s.', 'creatus'),
				'thz_options' => array(
					'm' => array(
						'type' => 'short-select',
						'title' => esc_html__('Mode', 'creatus'),
						'attr' => array(
							'class' => 'thz-select-switch'
						),
						'choices' => array(
							'before' => array(
								'text' => esc_html__('Before anchor','creatus'),
								'attr' => array(
									'data-enable' =>'.ua-poz-parent,.ua-ef-parent',
								),                  
							),
							'after' => array(
								'text' => esc_html__('After anchor','creatus'),
								'attr' => array(
									'data-enable' =>'.ua-poz-parent,.ua-ef-parent',
								),                  
							),							
							'inactive' => array(
								'text' => esc_html__('Inactive','creatus'),
								'attr' => array(
									'data-disable' =>'.ua-poz-parent,.ua-ef-parent',
								),                  
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
			'id' => array(
				'type' => 'unique',
				'length' => 8
			),			
			'cmx' => _thz_container_metrics_defaults()
		)
	),
	'sectiontypographytab' => array(
		'title' => __('Typography', 'creatus'),
		'type' => 'tab',
		'options' => array(
			fw()->theme->get_options('custom_typo')
		)
	),
	'sectioneffectstab' => array(
		'title' => __('Effects', 'creatus'),
		'type' => 'tab',
		'options' => array(
			fw()->theme->get_options('custom_effects')
		)
	),
	'sectioneresponsivetab' => array(
		'title' => __('Responsive', 'creatus'),
		'type' => 'tab',
		'options' => array(
			'res' => array(
				'type' => 'addable-popup',
				'label' => __('Section breakpoints', 'creatus'),
				'desc' => __('Add custom section settings on specific breakpoints.', 'creatus'),
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
					
					'b' => array(
						'type' => 'thz-box-style',
						'label' => __('Section box style', 'creatus'),
						'desc' => esc_html__('Adjust .thz-section-holder section box style for this breakpoint', 'creatus'),
						'preview' => true,
						'button-text' => esc_html__('Customize section box style', 'creatus'),
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
				)
			),			
		
			'rec' => array(
				'type' => 'addable-popup',
				'label' => __('Columns breakpoints', 'creatus'),
				'desc' => __('Add custom settings for all section columns on specific breakpoints.', 'creatus'),
				'popup-title' => esc_html__('Add/Edit Responsive breakpoint', 'creatus'),
				'template' => 'Breakpoint for {{ if (m.b == "767") { }} : <strong>Mobiles</strong>{{ } }}{{ if (m.b == "979") { }} : <strong>Tablets</strong>{{ } }}{{ if (m.b == "980") { }} : <strong>Desktops</strong>{{ } }} {{ if (m.b == "1699") { }} : <strong>Large desktops</strong>{{ } }} {{ if (m.b == "8888") { }} : <strong>All devices</strong>{{ } }}',
				'add-button-text' => esc_html__('Add/Edit breakpoint', 'creatus'),
				'size' => 'large',
				'limit' => 5,
				'sortable' => false,
				'popup-options' => array(
					'm' => array(
						'type' => 'thz-multi-options',
						'label' => __('Breakpoint metrics', 'creatus'),
						'addon' => 'px',
						'min' => 0,
						'value' => array(
							'b' => 767,
							'w' => 'default',
							's' => '',
							't' => 'default',
						),
						'desc' => esc_html__('Select breakpoint and set the column metrics.', 'creatus'),
						'help' => esc_html__('Note that on mobile devices the column widths are 1/1 ( 100% ) by default. Top space is columns top margin. Leave it empty if the columns have enough top space at this breakpoint. All devices selection is not a breakpoint but a last defined CSS that can help you override or define all columns box style within this section. Note that every column CSS can still override All devices setting if its box style is applied.', 'creatus'),
						'thz_options' => array(
							'b' => array(
								'type' => 'short-select',
								'title' => esc_html__('Breakpoint for', 'creatus'),
								'choices' => array(
									767 => esc_html__('Mobiles ( under 768px ) ', 'creatus'),
									979 => esc_html__('Tablets ( under 980px )', 'creatus'),
									980 => esc_html__('Desktops ( above 980px )', 'creatus'),
									1699 => esc_html__('Large desktops ( above 1699px )', 'creatus'),
									8888 => esc_html__('All devices ', 'creatus'),
								)
							),
							'w' => array(
								'type' => 'short-select',
								'title' => esc_html__('Column width', 'creatus'),
								'choices' => array(
									'default' => esc_html__('Do not change', 'creatus'),
									'1_1' => esc_html__('1/1', 'creatus'),
									'1_2' => esc_html__('1/2', 'creatus'),
									'1_3' => esc_html__('1/3', 'creatus'),
									'1_4' => esc_html__('1/4', 'creatus'),
									'1_5' => esc_html__('1/5', 'creatus'),
									'1_6' => esc_html__('1/6', 'creatus'),
									'2_3' => esc_html__('2/3', 'creatus'),
									'2_5' => esc_html__('2/5', 'creatus'),
									'3_4' => esc_html__('3/4', 'creatus'),
									'3_5' => esc_html__('3/5', 'creatus'),
									'4_5' => esc_html__('4/5', 'creatus'),
								)
							),
							's' => array(
								'type' => 'spinner',
								'title' => esc_html__('Top Space', 'creatus'),
								'addon' => 'px',
								'min' => 0,
							),
							't' => array(
								'type' => 'short-select',
								'title' => esc_html__('Text align', 'creatus'),
								'choices' => array(
									'default' => esc_html__('Do not change', 'creatus'),
									'left' => esc_html__('Left', 'creatus'),
									'center' => esc_html__('Center', 'creatus'),
									'right' => esc_html__('Right', 'creatus'),
								)
							),
						)
					),	
					
					'b' => array(
						'type' => 'thz-box-style',
						'label' => __('Column-in box style', 'creatus'),
						'desc' => esc_html__('Adjust .thz-column-in box style for this breakpoint', 'creatus'),
						'preview' => true,
						'button-text' => esc_html__('Customize column-in box style', 'creatus'),
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
				)
			),		
		)
	),
);
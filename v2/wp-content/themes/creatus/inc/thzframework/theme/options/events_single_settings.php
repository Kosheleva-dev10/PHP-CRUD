<?php
if (!defined('FW'))
	die('Forbidden');
$options = array(
	'singleeventsetingsgroup' => array(
		'type' => 'group',
		'options' => array(
			'singleeventtab' => array(
				'title' => __('Event', 'creatus'),
				'type' => 'tab',
				'options' => array(
				
					'ev_sw' => array(
						'label' => __('Event layout', 'creatus'),
						'desc' => esc_html__('Select event layout. See help for more info.', 'creatus'),
						'help' => esc_html__('If Stacked meta is selected, event meta is displayed under the meta sharing links in grid layout where details, organizer and venue with map are in 100% width column stacked on top of each other, otherwise event meta is displayed in a right sidebar.', 'creatus'),
						'type' => 'short-select',
						'value' => 'thz-col-1-3',
						'attr' => array(
							'class' => 'thz-select-switch'
						),
						'choices' => array(
							'thz-col-1' => array(
								'text' => esc_html__('Stacked meta', 'creatus'),
								'attr' => array(
									'data-enable' => 'eagenda_mx,emeta_mx',
									'data-disable' => 'ev_smx',
								)
							),
							'thz-col-1-2' => array(
								'text' => esc_html__('Meta Sidebar 50% width', 'creatus'),
								'attr' => array(
									'data-enable' => 'ev_smx',
									'data-disable' => 'eagenda_mx,emeta_mx',
								)
							),
							'thz-col-1-3' => array(
								'text' => esc_html__('Meta Sidebar 33% width', 'creatus'),
								'attr' => array(
									'data-enable' => 'ev_smx',
									'data-disable' => 'eagenda_mx,emeta_mx',
								)
							),
							'thz-col-1-4' => array(
								'text' => esc_html__('Meta Sidebar 20% width', 'creatus'),
								'attr' => array(
									'data-enable' => 'ev_smx,',
									'data-disable' => 'eagenda_mx,emeta_mx',
								)
							),
						)
					),
				
					'ev_smx' => array(
						'type' => 'thz-multi-options',
						'label' => __('Sidebar metrics', 'creatus'),
						'desc' => __('Adjust event meta sidebar metrics.', 'creatus'),
						'value' => array(
							'w' => 60,
							's' => 'active',
						),
						'thz_options' => array(
							'w' => array(
								'type' => 'spinner',
								'title' => __('Sidebar space', 'creatus'),
								'addon' => 'px',
								'min' => 0,
								'max' => 300,
								'value' => 60
							),
							's' => array(
								'type' => 'select',
								'title' => __('Sticky sidebar', 'creatus'),
								'choices' => array(
									'active' => __('Active', 'creatus'),
									'inactive' => __('Inactive', 'creatus'),
								)
							),				
				
						)
					),

					'ev_bs' => array(
						'type' => 'thz-box-style',
						'label' => __('Event box style', 'creatus'),
						'preview' => true,
						'button-text' => esc_html__('Customize event box style', 'creatus'),
						'desc' => esc_html__('Adjust .thz-single-event box style', 'creatus'),
						'popup' => true,
						'disable' => array(
							'layout',
							'video',
						),
						'value' => array()
					),
					'ev_med_bs' => array(
						'type' => 'thz-box-style',
						'label' => __('Event media box style', 'creatus'),
						'preview' => true,
						'button-text' => esc_html__('Customize event media box style', 'creatus'),
						'desc' => esc_html__('Adjust .thz-event-media-container box style', 'creatus'),
						'popup' => true,
						'disable' => array(
							'video',
						),
						'value' => array(
							'margin' => array(
								'top' => 0,
								'right' => 'auto',
								'bottom' => 30,
								'left' => 'auto'
							)						
						)
					),

					'edetails_mx' => array(
						'type' => 'thz-multi-options',
						'label' => __('Details holder', 'creatus'),
						'desc' => esc_html__('Adjust .thz-event-details-holder. See help for more info.', 'creatus'),
						'help' => esc_html__('Event details holder holds, media, title and date, event content, event sharing links. If event layout is Meta sidebar it also holds event agenda and event meta. Note that the holder and max width settings are effective only if there is no active page sidebar.', 'creatus'),
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

					
					'emeta_mx' => array(
						'type' => 'thz-multi-options',
						'label' => __('Meta holder', 'creatus'),
						'desc' => esc_html__('Adjust .thz-event-meta-holder. See help for more info.', 'creatus'),
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
						
					'eagenda_mx' => array(
						'type' => 'thz-multi-options',
						'label' => __('Agenda holder', 'creatus'),
						'desc' => esc_html__('Adjust .thz-event-agenda-holder. See help for more info.', 'creatus'),
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
					
					'erel_mx' => array(
						'type' => 'thz-multi-options',
						'label' => __('Related events', 'creatus'),
						'desc' => esc_html__('Adjust related events visibility and holder. See help for more info.', 'creatus'),
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
											'data-enable' => '.erel-hol-mx-parent,.thz-related-events-li'
										)
									),
									'hide' => array(
										'text' => esc_html__('Hide', 'creatus'),
										'attr' => array(
											'data-disable' => '.erel-hol-mx-parent,.thz-related-events-li'
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
									'class' => 'erel-hol-mx'
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
									'class' => 'erel-hol-mx'
								)
							),
							'm' => array(
								'type' => 'select',
								'title' => esc_html__('Max width', 'creatus'),
								'choices' => _thz_max_width_list(),
								'attr' => array(
									'class' => 'erel-hol-mx'
								)
							)
						)
					),
					'ecom_mx' => array(
						'type' => 'thz-multi-options',
						'label' => __('Event comments', 'creatus'),
						'desc' => esc_html__('Adjust event comments visibility and holder. See help for more info.', 'creatus'),
						'help' => esc_html__('Note that the holder and max width settings are effective only if there is no active page sidebar or location is outside.', 'creatus'),
						'value' => array(
							'v' => 'hide',
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
											'data-enable' => '.ecom-hol-mx-parent'
										)
									),
									'hide' => array(
										'text' => esc_html__('Hide', 'creatus'),
										'attr' => array(
											'data-disable' => '.ecom-hol-mx-parent'
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
									'class' => 'ecom-hol-mx'
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
									'class' => 'ecom-hol-mx'
								)
							),
							'm' => array(
								'type' => 'select',
								'title' => esc_html__('Max width', 'creatus'),
								'choices' => _thz_max_width_list(),
								'attr' => array(
									'class' => 'ecom-hol-mx'
								)
							)
						)
					),
					'enav_mx' => array(
						'type' => 'thz-multi-options',
						'label' => __('Events navigation', 'creatus'),
						'desc' => esc_html__('Adjust events navigation ( next/previous ) visibility and holder. See help for more info.', 'creatus'),
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
											'data-enable' => '.enav-hol-mx-parent'
										)
									),
									'hide' => array(
										'text' => esc_html__('Hide', 'creatus'),
										'attr' => array(
											'data-disable' => '.enav-hol-mx-parent'
										)
									)
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
									'class' => 'enav-hol-mx'
								)
							),
							'm' => array(
								'type' => 'select',
								'title' => esc_html__('Max width', 'creatus'),
								'choices' => _thz_max_width_list(),
								'attr' => array(
									'class' => 'enav-hol-mx'
								)
							)
						)
					)
				)
			), // end tab 
			'singleeventtitletab' => array(
				'title' => __('Titles & date', 'creatus'),
				'type' => 'tab',
				'options' => array(
					'ev_title' => array(
						'type' => 'multi-picker',
						'label' => false,
						'desc' => false,
						'show_borders' => true,
						'picker' => array(
							'picked' => array(
								'label' => __('Show event title', 'creatus'),
								'desc' => esc_html__('Show/hide event title', 'creatus'),
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
								'location' => array(
									'label' => __('Event title location', 'creatus'),
									'desc' => esc_html__('Set event title location. Under or above the media container', 'creatus'),
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
									'label' => __('Event title box style', 'creatus'),
									'preview' => true,
									'button-text' => esc_html__('Customize event title box style', 'creatus'),
									'desc' => esc_html__('Adjust .thz-event-title box style', 'creatus'),
									'popup' => true,
									'disable' => array(
										'layout',
										'video',
										'transform',
										'boxsize'
									),
									'value' => array(
										'margin' => array(
											'top' => 0,
											'right' => 'auto',
											'bottom' => 0,
											'left' => 'auto'
										)
									)
								),
								'f' => array(
									'type' => 'thz-typography',
									'label' => __('Event title font', 'creatus'),
									'desc' => esc_html__('Adjust event title font metrics.', 'creatus'),
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
									'label' => __('Event title colors', 'creatus'),
									'desc' => esc_html__('Adjust event title colors. Theme links colors are inherited if empty', 'creatus'),
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
					),
					'ev_dt' => array(
						'type' => 'multi-picker',
						'label' => false,
						'desc' => false,
						'show_borders' => true,
						'picker' => array(
							'picked' => array(
								'label' => __('Show date & time', 'creatus'),
								'desc' => esc_html__('Show/hide date & time', 'creatus'),
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
									'label' => __('Date & time box style', 'creatus'),
									'preview' => true,
									'button-text' => esc_html__('Customize date & time box style', 'creatus'),
									'desc' => esc_html__('Adjust .thz-event-date-time box style', 'creatus'),
									'popup' => true,
									'disable' => array(
										'layout',
										'video',
										'transform',
										'boxsize'
									),
									'value' => array(
										'margin' => array(
											'top' => 5,
											'right' => 'auto',
											'bottom' => 15,
											'left' => 'auto'
										)
									)
								),
								'f' => array(
									'type' => 'thz-typography',
									'label' => __('Date & time font', 'creatus'),
									'desc' => esc_html__('Adjust event date & time font metrics.', 'creatus'),
									'value' => array(
										'size' => '1.2em',
									),
									'disable' => array(
										'hovered',
										'text-shadow'
									),
								)
							)
						)
					),
					'ev_hmx' => array(
						'type' => 'thz-typography',
						'label' => __('Headings font', 'creatus'),
						'desc' => esc_html__('Adjust .thz-event-meta-title ( Details, Organizer, Venue, Agenda ) font metrics.', 'creatus'),
						'value' => array(
							'size' => 20,
						),
						'disable' => array('hovered'),
					),
					'ev_hbs' => array(
						'type' => 'thz-box-style',
						'label' => __('Headings box style', 'creatus'),
						'desc' => esc_html__('Adjust .thz-event-meta-title ( Details, Organizer, Venue, Agenda ) box style','creatus'),
						'preview' => true,
						'button-text' => esc_html__('Customize event meta headings box style', 'creatus'),
						'popup' => true,
						'disable' => array('layout','video','boxsize','transform'),
						'value' => array(
							'margin' => array(
								'top' => 0,
								'right' => 'auto',
								'bottom' => 15,
								'left' => 'auto'
							),
						)
					),
				)
			), // end tab
			'singleeventcontenttab' => array(
				'title' => __('Content', 'creatus'),
				'type' => 'tab',
				'options' => array(
					'ev_cbs' => array(
						'type' => 'thz-box-style',
						'label' => __('Event content box style', 'creatus'),
						'desc' => esc_html__('Adjust .thz-event-content box style', 'creatus'),
						'preview' => true,
						'button-text' => esc_html__('Customize event content box style', 'creatus'),
						'popup' => true,
						'disable' => array(
							'layout',
							'video',
							'transform',
							'boxsize'
						),
						'value' => array(
							'margin' => array(
								'top' => '0',
								'right' => 'auto',
								'bottom' => 60,
								'left' => 'auto'
							)
						)
					),
					'ev_cc' => array(
						'type' => 'thz-multi-options',
						'label' => __('Event content colors', 'creatus'),
						'desc' => esc_html__('Adjust event content colors. Theme colors are used if empty.', 'creatus'),
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
					)
				)
			), // end tab			
			'singleeventsharingtab' => array(
				'title' => __('Sharing links', 'creatus'),
				'type' => 'tab',
				'options' => array(
					'ev_shares' => array(
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
								'l' => array(
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
										'video',
										'transform',
										'boxsize'
									),
									'value' => array(
										'padding' => array(
											'top' => 30,
											'right' => 0,
											'bottom' => 30,
											'left' => 0
										),
										'margin' => array(
											'top' => 45,
											'right' => 'auto',
											'bottom' => 45,
											'left' => 'auto'
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
												'w' => 1,
												's' => 'solid',
												'c' => 'color_4'
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
														'data-disable' => '.eim-sh-parent,.eim-shr-parent,.eim-sc-parent,.eim-sch-parent'
													)
												),
												'outline' => array(
													'text' => esc_html__('Outline', 'creatus'),
													'attr' => array(
														'data-enable' => '.eim-sh-parent,.eim-shr-parent,.eim-sc-parent,.eim-sch-parent'
													)
												),
												'flat' => array(
													'text' => esc_html__('Flat', 'creatus'),
													'attr' => array(
														'data-enable' => '.eim-sh-parent,.eim-shr-parent,.eim-sc-parent,.eim-sch-parent'
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
												'class' => 'eim-sh'
											
											)
										),
										'r' => array(
											'type' => 'spinner',
											'title' => esc_html__('Shape ratio', 'creatus'),
											'addon' => 'X',
											'attr' => array(
												'class' => 'eim-shr'
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
												'class' => 'eim-sc'
											
											)
										),
										'sch' => array(
											'type' => 'color',
											'title' => esc_html__('Style hovered', 'creatus'),
											'box' => true,
											'attr' => array(
												'class' => 'eim-sch'
											
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
												'value' => esc_html__('Share this event:', 'creatus'),
												'label' => __('Sharing links label', 'creatus'),
												'desc' => esc_html__('Insert sharing links label', 'creatus')
											),
											'f' => array(
												'type' => 'thz-typography',
												'label' => __('Sharing label font', 'creatus'),
												'desc' => esc_html__('Adjust sharing label font metrics.', 'creatus'),
												'value' => array(
													'size' => 14,
													'weight' => 600,
													'color' => 'color_2'
												),
												'disable' => array(
													'hovered',
													'align'
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
			'eventagenda' => array(
				'title' => __('Agenda', 'creatus'),
				'type' => 'tab',
				'options' => array(
					'ev_ag_bs' => array(
						'type' => 'thz-box-style',
						'label' => __('Agenda box style', 'creatus'),
						'preview' => false,
						'button-text' => esc_html__('Adjust agenda box style', 'creatus'),
						'desc' => esc_html__('Adjust .thz-event-agenda-container box style', 'creatus'),
						'popup' => true,
						'disable' => array(
							'layout',
							'video',
							'transform',
							'boxsize',
						),
						'value' => array(
							'padding' => array(
								'top' => '0',
								'right' => '0',
								'bottom' => '0',
								'left' => '0'
							),
							'margin' => array(
								'top' => 30,
								'right' => 'auto',
								'bottom' => 0,
								'left' => 'auto'
							)
						)
					),
					'ev_agi_bs' => array(
						'type' => 'thz-box-style',
						'label' => __('Agenda item box style', 'creatus'),
						'preview' => true,
						'desc' => esc_html__('Adjust .thz-event-agenda-item box style', 'creatus'),
						'button-text' => esc_html__('Adjust agenda item box style', 'creatus'),
						'popup' => true,
						'disable' => array(
							'layout',
							'video',
							'transform',
							'boxsize'
						),
						'value' => array(
							'padding' => array(
								'top' => 15,
								'right' => 0,
								'bottom' => '30',
								'left' => 0
							),
							'margin' => array(
								'top' => '0',
								'right' => 'auto',
								'bottom' => '0',
								'left' => 'auto'
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
								)
							)
						)
					),
					'ev_aitf' => array(
						'type' => 'thz-typography',
						'label' => __('Agenda item time', 'creatus'),
						'desc' => esc_html__('Adjust agenda time font metrics.', 'creatus'),
						'value' => array(
							'size' => 14,
							'weight' => 600,
							'color' => 'color_2'

						),
						'disable' => array(
							'hovered',
							'align'
						),
					),
					'ev_aitif' => array(
						'type' => 'thz-typography',
						'label' => __('Agenda item title', 'creatus'),
						'desc' => esc_html__('Adjust agenda item title font metrics.', 'creatus'),
						'value' => array(
							'size' => 16,
							'weight' => 600,
							'color' => 'color_2'
						),
						'disable' => array(
							'hovered',
							'align'
						),
					),
					'ev_aitef' => array(
						'type' => 'thz-typography',
						'label' => __('Agenda item text', 'creatus'),
						'desc' => esc_html__('Adjust agenda item text font metrics.', 'creatus'),
						'value' => array(),
						'disable' => array(
							'hovered',
							'align',
							'text-shadow'
						),
					),
					'ev_aitec' => array(
						'type' => 'thz-multi-options',
						'label' => __('Agenda item text colors', 'creatus'),
						'desc' => esc_html__('Adjust agenda item text colors. Theme colors are used if empty.', 'creatus'),
						'value' => array(
							'link' => '',
							'linkhovered' => '',
							'headings' => ''
						),
						'thz_options' => array(
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
					)
				)
			),
			'eventagendadetails' => array(
				'title' => __('Meta', 'creatus'),
				'type' => 'tab',
				'options' => array(

					'ev_inbs' => array(
						'type' => 'thz-box-style',
						'label' => __('Meta container box style', 'creatus'),
						'preview' => true,
						'button-text' => esc_html__('Customize meta container box style', 'creatus'),
						'desc' => esc_html__('Adjust .thz-event-info-in box style', 'creatus'),
						'popup' => true,
						'disable' => array(
							'layout',
							'video',
						),
						'value' => array(
						
							'padding' => array(
								'top' => 30,
								'right' => 30,
								'bottom' => 30,
								'left' => 30
							),
							'background' => array(
								'type' => 'color',
								'color' => 'color_5',
							)
						
						)
					),	
					
					'ev_mbs' => array(
						'type' => 'thz-box-style',
						'label' => __('Meta block box style', 'creatus'),
						'preview' => true,
						'button-text' => esc_html__('Customize meta block box style', 'creatus'),
						'desc' => esc_html__('Adjust .thz-event-meta-block box style', 'creatus'),
						'popup' => true,
						'disable' => array(
							'layout',
							'video',
							'borders',
							'transform',
							'boxsize'
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
					'ev_mibs' => array(
						'type' => 'thz-box-style',
						'label' => __('Meta item box style', 'creatus'),
						'preview' => true,
						'button-text' => esc_html__('Customize event meta item box style', 'creatus'),
						'desc' => esc_html__('Adjust .thz-event-meta-block li box style', 'creatus'),
						'popup' => true,
						'disable' => array(
							'layout',
							'video',
							'transform',
							'boxsize'
						),
						'value' => array(
							'padding' => array(
								'top' => 0,
								'right' => 0,
								'bottom' => 15,
								'left' => 0
							),
							'margin' => array(
								'top' => 0,
								'right' => 'auto',
								'bottom' => 15,
								'left' => 'auto'
							),
							'borders' => array(
								'all' => 'separate',
								'top' => array(
									'w' => 0,
									's' => 'solid',
									'c' => ''
								),
								'right' => array(
									'w' => 0,
									's' => 'solid',
									'c' => ''
								),
								'bottom' => array(
									'w' => 1,
									's' => 'solid',
									'c' => 'color_4'
								),
								'left' => array(
									'w' => 0,
									's' => 'solid',
									'c' => ''
								)
							)
						)
					),
					'ev_mlw' => array(
						'type' => 'thz-spinner',
						'label' => __('Meta label width', 'creatus'),
						'desc' => esc_html__('Set event meta label width', 'creatus'),
						'addon' => '%',
						'min' => 0,
						'max' => 100,
						'value' => 30
					),
					'ev_mlf' => array(
						'type' => 'thz-typography',
						'label' => __('Meta label font metrics', 'creatus'),
						'desc' => esc_html__('Adjust event meta label font metrics.', 'creatus'),
						'value' => array(
							'size' => 14,
							'weight' => 600,
							'color' => 'color_2'

						),
						'disable' => array(
							'hovered',
							'align',
							'text-shadow'
						),
					),
					'ev_mf' => array(
						'type' => 'thz-typography',
						'label' => __('Meta font metrics', 'creatus'),
						'desc' => esc_html__('Adjust event meta font metrics.', 'creatus'),
						'value' => array(),
						'disable' => array(
							'color',
							'hovered',
							'align',
							'text-shadow'
						),
					),
					'ev_mfc' => array(
						'type' => 'thz-multi-options',
						'label' => __('Meta item colors', 'creatus'),
						'desc' => esc_html__('Adjust event meta colors. Theme colors are inherited if empty', 'creatus'),
						'value' => array(
							'co' => '',
							'lc' => '',
							'hc' => ''
						),
						'thz_options' => array(
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
			'relatedeventstab' => array(
				'title' => __('Related events', 'creatus'),
				'type' => 'tab',
				'li-attr' => array('class' => 'thz-related-events-li'),
				'lazy_tabs'=> false,
				'options' => array(
					fw()->theme->get_options('related_events_settings')
				)
			),
		)
	) // group
);
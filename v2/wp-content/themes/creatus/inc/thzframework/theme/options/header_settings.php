<?php
if (!defined('FW'))
	die('Forbidden');
$options = array(
	'headergeneraltab' => array(
		'title' => __('General', 'creatus'),
		'type' => 'tab',
		'lazy_tabs' => false,
		'options' => array(
			'headers' => array(
				'type' => 'multi-picker',
				'label' => false,
				'desc' => false,
				'show_borders' => true,
				'picker' => array(
					'picked' => array(
						'label' => __('Header layout type', 'creatus'),
						'type' => 'image-picker',
						'value' => 'inline',
						'attr' => array(
							'class' => 'thz_option_headers thz-select-switch'
						),
						'choices' => array(
							'stacked' => array(
								'attr' => array(
									'data-enable' => 'tm_top_offset,tm_left_offset,tm_contained,.thz-header-toolbar-tab,.thz-sticky-header-tab,header_contained,tm_subul_link_width,hstac,tm_anim,header_mode',
									'data-disable' => 'lhs,lhb,hamx,minimx,minilogo,hemmx,hofmx,hicmx,htmp',
									'data-check' =>'hstac'
								),
								'small' => thz_theme_file_uri( '/inc/thzframework/admin/images/header_stacked_small.png'),
								'large' => thz_theme_file_uri( '/inc/thzframework/admin/images/header_stacked.png'),
							),
							'inline' => array(
								'attr' => array(
									'data-enable' => 'tm_top_offset,tm_left_offset,.thz-header-toolbar-tab,.thz-sticky-header-tab,header_contained,tm_subul_link_width,htmp,tm_anim,header_mode',
									'data-disable' => 'tm_contained,lhs,lhb,hamx,minimx,minilogo,hemmx,hofmx,hicmx,hstac,hstab,hstas',
								),
								
								'small' => thz_theme_file_uri( '/inc/thzframework/admin/images/header_inline_small.png'),
								'large' => thz_theme_file_uri( '/inc/thzframework/admin/images/header_inline.png'),
							),
							'left' => array(
								'attr' => array(
									'data-enable' => 'lhs,lhb,hemmx',
									'data-disable' => 'tm_top_offset,tm_left_offset,tm_contained,.thz-header-toolbar-tab,.thz-sticky-header-tab,header_contained,tm_subul_link_width,hamx,minimx,minilogo,hofmx,hicmx,htmp,hstac,hstab,hstas,tm_anim,header_mode',
									
								),
								'small' =>  thz_theme_file_uri( '/inc/thzframework/admin/images/header_left_small.png'),
								'large' => thz_theme_file_uri( '/inc/thzframework/admin/images/header_left.png'),
							),
							'right' => array(
								'attr' => array(
									'data-enable' => 'lhs,lhb,hemmx',
									'data-disable' => 'tm_top_offset,tm_left_offset,tm_contained,.thz-header-toolbar-tab,.thz-sticky-header-tab,header_contained,tm_subul_link_width,hamx,minimx,minilogo,hofmx,hicmx,htmp,hstac,hstab,hstas,tm_anim,header_mode',
									
								),
								'small' => thz_theme_file_uri( '/inc/thzframework/admin/images/header_right_small.png'),
								'large' => thz_theme_file_uri( '/inc/thzframework/admin/images/header_right.png'),
							),
							'centered' => array(
								'attr' => array(
									'data-enable' => 'tm_top_offset,tm_left_offset,tm_contained,.thz-header-toolbar-tab,.thz-sticky-header-tab,header_contained,tm_subul_link_width,tm_anim,header_mode',
									'data-disable' => 'lhs,lhb,hamx,minimx,minilogo,hemmx,hofmx,hicmx,htmp,hstac,hstab,hstas'
								),
								'small' => thz_theme_file_uri( '/inc/thzframework/admin/images/header_centered_small.png'),
								'large' => thz_theme_file_uri( '/inc/thzframework/admin/images/header_centered.png'),
							),
							'mini' => array(
								'attr' => array(
									'data-enable' => 'lhs,lhb,hamx,minimx,hemmx',
									'data-disable' => 'tm_top_offset,tm_left_offset,tm_contained,.thz-header-toolbar-tab,.thz-sticky-header-tab,header_contained,tm_subul_link_width,hofmx,hicmx,htmp,hstac,hstab,hstas,tm_anim,header_mode',						'data-check' =>'.thz-mini-logo-switch',
								
								),
								'small' => thz_theme_file_uri( '/inc/thzframework/admin/images/header_mini_small.png'),
								'large' => thz_theme_file_uri( '/inc/thzframework/admin/images/header_mini.png'),
							),
							'miniright' => array(
								'attr' => array(
									'data-enable' => 'lhs,lhb,hamx,minimx,hemmx',
									'data-disable' => 'tm_top_offset,tm_left_offset,tm_contained,.thz-header-toolbar-tab,.thz-sticky-header-tab,header_contained,tm_subul_link_width,hofmx,hicmx,htmp,hstac,hstab,hstas,tm_anim,header_mode',				'data-check' =>'.thz-mini-logo-switch',

								),
								'small' => thz_theme_file_uri( '/inc/thzframework/admin/images/header_miniright_small.png'),
								'large' => thz_theme_file_uri( '/inc/thzframework/admin/images/header_miniright.png'),
							),
							
							
							'offcanvas' => array(
								'attr' => array(
									'data-enable' => '.thz-sticky-header-tab,lhs,lhb,hemmx,hofmx,hicmx,header_boxstyle,header_mode',
									'data-disable' => 'tm_top_offset,tm_left_offset,tm_contained,.thz-header-toolbar-tab,tm_subul_link_width,hamx,minimx,minilogo,htmp,hstac,hstab,hstas,tm_anim',

								),
								'small' => thz_theme_file_uri( '/inc/thzframework/admin/images/header_offcanvas_small.png'),
								'large' => thz_theme_file_uri( '/inc/thzframework/admin/images/header_offcanvas.png'),
							),
							
							
							'split' => array(
								'attr' => array(
									'data-enable' => 'tm_top_offset,tm_left_offset,tm_contained,.thz-header-toolbar-tab,.thz-sticky-header-tab,tm_subul_link_width,tm_anim,header_mode',
									'data-disable' => 'lhs,lhb,hamx,minimx,minilogo,hemmx,hofmx,hicmx,header_contained,htmp,hstac,hstab,hstas'
								),
								'small' => thz_theme_file_uri( '/inc/thzframework/admin/images/header_split_small.png'),
								'large' => thz_theme_file_uri( '/inc/thzframework/admin/images/header_split.png'),
							),
							
						)
					)
				),
				'choices' => array()
			),
			
			'header_mode' => array(
				'label' => __('Header mode', 'creatus'),
				'desc' => esc_html__('Select header mode', 'creatus'),
				'help' => esc_html__('If stacked header is positioned above the next element. Aboslute header is positioned over the next element and it is mostly used for transparent header layouts.', 'creatus'),
				'type' => 'short-select',
				'value' => 'stacked',
				'choices' => array(
					'stacked' => esc_html__('Stacked', 'creatus'),
					'absolute' => esc_html__('Absolute', 'creatus'),
				),
			),
			
			'header_boxstyle' => array(
				'type' => 'thz-box-style',
				'label' => __('Header box style', 'creatus'),
				'preview' => true,
				'button-text' => esc_html__('Customize header box style', 'creatus'),
				'desc' => esc_html__('Adjust #header_holder box style', 'creatus'),
				'popup' => true,
				'disable' => array('layout','boxsize','transform'),
				'value' => array(
					'boxshadow' => array(
						1 => array(
							'inset' => false,
							'horizontal-offset' => 0,
							'vertical-offset' => 0,
							'blur-radius' => 18,
							'spread-radius' => 0,
							'shadow-color' =>'rgba(0,0,0,0.05)'
						)
					),
					'background' => array(
						'type' => 'color',
						'color' => '#ffffff',
					)
				)
			),

			'hemmx' => array(
				'type' => 'thz-multi-options',
				'label' => __('Header metrics', 'creatus'),
				'desc' => esc_html__('Adjust lateral header metrics.', 'creatus'),
				'help' => esc_html__('Width is the header width. Space setting is side padding for .header-lateral-sidebar and .header-lateral-footer. Menu alignment vertically aligns the menu container within the header. Color options are applied to lateral header sidebar and branding. All menu elements spacings and colors are adjustable trough menu settings tab.', 'creatus'),
				'value' => array(
					'w' => 300,
					's' => 15,
					'a' => 'middle',
					't' => '',
					'l' => '',
					'lh' => '',
					'h' => '',
				),
				'breakafter' =>'a',
				'thz_options' => array(

					'w' => array(
						'type' => 'spinner',
						'title' => esc_html__('Width', 'creatus'),
						'addon' => 'px'
					),
					's' => array(
						'type' => 'spinner',
						'title' => esc_html__('Side space', 'creatus'),
						'addon' => 'px'
					),
					'a' => array(
						'type' => 'short-select',
						'title' => esc_html__('Menu alignment', 'creatus'),
						'choices' => array(
							'top' => esc_html__('Top', 'creatus'),
							'middle' => esc_html__('Middle', 'creatus'),
							'bottom' => esc_html__('Bottom', 'creatus'),
						),
					),
					't' => array(
						'type' => 'color',
						'title' => esc_html__('Text', 'creatus'),
						'box' => true
					),
					'l' => array(
						'type' => 'color',
						'title' => esc_html__('Link', 'creatus'),
						'box' => true
					),
					'lh' => array(
						'type' => 'color',
						'title' => esc_html__('Link hovered', 'creatus'),
						'box' => true
					),
					'h' => array(
						'type' => 'color',
						'title' => esc_html__('Headings', 'creatus'),
						'box' => true
					)

				)
			),

			'htmp' => array(
				'label' => __('Menu position', 'creatus'),
				'desc' => esc_html__('Select desired menu position', 'creatus'),
				'type' => 'image-picker',
				'value' => 'right',
				'choices' => array(
					'left' => array(
						'small' => thz_theme_file_uri( '/inc/thzframework/admin/images/menu_inline_left_small.png'),
						'large' => thz_theme_file_uri( '/inc/thzframework/admin/images/menu_inline_left.png'),
					),
					'center' => array(
						'small' => thz_theme_file_uri( '/inc/thzframework/admin/images/menu_inline_centered_small.png'),
						'large' => thz_theme_file_uri( '/inc/thzframework/admin/images/menu_inline_centered.png'),
					),
					'right' => array(
						'small' => thz_theme_file_uri( '/inc/thzframework/admin/images/menu_inline_right_small.png'),
						'large' => thz_theme_file_uri( '/inc/thzframework/admin/images/menu_inline_right.png'),
					),
	
				 )
			),
			
			'header_contained' => array(
				'label' => __('Header contained?', 'creatus'),
				'desc' => esc_html__('If set to contained header will be contained by max site width', 'creatus'),
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
				'help' => esc_html__('This option is useful when you would like to stretch the header content all the way to the page edges.', 'creatus')
			),
			
			'hstac' => array(
				'label' => __('Header content', 'creatus'),
				'desc' => esc_html__('Select what will be shown in header content ( right side of the header ) ', 'creatus'),
				'type' => 'select',
				'value' => 'search',
				'attr' => array(
					'class' => 'thz-select-switch'
				),
				'choices' => array(
					'search' => array(
						'text' => esc_html__('Search input box','creatus'),
						'attr' => array(
							'data-disable' =>'hstab,hstas',
						),					
					),
					'banner' => array(
						'text' => esc_html__('Advertising banner','creatus'),
						'attr' => array(
							'data-enable' =>'hstab',
							'data-disable' =>'hstas',
						),					
					),
					
					'slogan' => array(
						'text' => esc_html__('Slogan','creatus'),
						'attr' => array(
							'data-enable' =>'hstas',
							'data-disable' =>'hstab',
						),					
					),
					'slogansearch' => array(
						'text' => esc_html__('Slogan and search','creatus'),
						'attr' => array(
							'data-enable' =>'hstas',
							'data-disable' =>'hstab',
						),					
					),
					'nothing' => array(
						'text' => esc_html__('Do not use','creatus'),
						'attr' => array(
							'data-disable' =>'hstab,hstas',
						),					
					),
								
				)
			 ),	
			'hstas' => array(
				'type' => 'text',
				'label' => __('Insert slogan', 'creatus'),
				'desc' => esc_html__('Add your custom slogan here.', 'creatus'),
				'value'=> 'Creatus rocks!',
			),			 
			'hstab' => array(
				'type' => 'thz-ace',
				'label' => __('Insert banner code', 'creatus'),
				'desc' => esc_html__('Add your banner code here . Use valid Javascript or HTML. You can also add shortcodes here.', 'creatus'),
				'value'=>'',
				'mode'=>'html',
				'theme'=>'chrome',
				'height'=>200,
			),			 
	
			
			
			'lhs' => array(
				'label' => __('Social links', 'creatus'),
				'type' => 'switch',
				'right-choice' => array(
					'value' => 'show',
					'label' => __('Show', 'creatus')
				),
				'left-choice' => array(
					'value' => 'hide',
					'label' => __('hide', 'creatus')
				),
				'value' => 'show',
				'desc' => sprintf(esc_html__('Show/hide social links located under the header menu. Please go to %1$s to add social media links.', 'creatus'),'<a class="go_to_tab" href="fw-options-tab-socialstab">Social tab</a>')
			),
			'lhb' => array(
				'label' => __('Branding', 'creatus'),
				'type' => 'switch',
				'right-choice' => array(
					'value' => 'show',
					'label' => __('Show', 'creatus')
				),
				'left-choice' => array(
					'value' => 'hide',
					'label' => __('hide', 'creatus')
				),
				'value' => 'show',
				'desc' => esc_html__('Show/hide site branding located under the header menu.', 'creatus')
			),
			
			'minimx' => array(
				'type' => 'thz-multi-options',
				'label' => __('Mini metrics', 'creatus'),
				'desc' => esc_html__('Adjust mini items positions', 'creatus'),
				'value' => array(
					'l' => 'h',
					'h' => 't',
					's' => 'b'
				),
				'thz_options' => array(
					'l' => array(
						'type' => 'short-select',
						'title' => esc_html__('Mini logo', 'creatus'),
						'attr' => array(
							'class' =>'thz-select-switch thz-mini-logo-switch'
						),
						'choices' => array(
							't' => array(
								'text' => esc_html__('Top','creatus'),
								'attr' => array(
									'data-enable' =>'minilogo',
								),
							),
							'm' => array(
								'text' => esc_html__('Middle','creatus'),
								'attr' => array(
									'data-enable' =>'minilogo',
								),
							),
							'b' => array(
								'text' => esc_html__('Bottom','creatus'),
								'attr' => array(
									'data-enable' =>'minilogo',
								),
							),
							'h' => array(
								'text' => esc_html__('Hide','creatus'),
								'attr' => array(
									'data-disable' =>'minilogo',
								),
							),

						)
					),
					'h' => array(
						'type' => 'short-select',
						'title' => esc_html__('Hamburger', 'creatus'),
						'choices' => array(
							't' => esc_html__('Top', 'creatus'),
							'm' => esc_html__('Middle', 'creatus'),
							'b' => esc_html__('Bottom', 'creatus'),
						)
					),
					's' => array(
						'type' => 'short-select',
						'title' => esc_html__('Mini socials', 'creatus'),
						'choices' => array(
							't' => esc_html__('Top', 'creatus'),
							'm' => esc_html__('Middle', 'creatus'),
							'b' => esc_html__('Bottom', 'creatus'),
							'h' => esc_html__('Hide', 'creatus')
						)
					)
				)
			),
			
			'minilogo' => array(
				'type'  => 'upload',
				'value' => array(),
				'label' => __('Mini logo', 'creatus'),
				'desc'  => __('Select mini logo image. See help for more info.', 'creatus'),
				'help'  => __('Mini logo is maximum 60px wide. We suggest you create a logo that fits this width. Optimal dimension would be 30px to 40px. In order to center it horizontally to a pixel, make sure the logo width is even number. eg: 38px, not 39.', 'creatus'),
				'images_only' => true,

			),
			
			'hamx' => array(
				'label' => __('Hamburger metrics', 'creatus'),
				'type' => 'thz-multi-options',
				'value' => array(
					'i' => '',
					'a' => '',
					'o' => 'show',
					'oc' => 'rgba(0,0,0,0.8)',
					'hc' => 'click',
				),
				'thz_options' => array(
					'i' => array(
						'type' => 'color',
						'title' => esc_html__('Inactive', 'creatus'),
						'box' => true
					),
					'a' => array(
						'type' => 'color',
						'title' => esc_html__('Active', 'creatus'),
						'box' => true
					),
					'o' => array(
						'type' => 'short-select',
						'title' => esc_html__('Overlay', 'creatus'),
						'attr' => array(
							'class' =>'thz-select-switch'
						),
						'choices' => array(
							'show' => array(
								'text' => esc_html__('Show','creatus'),
								'attr' => array(
									'data-enable' =>'.hm-over-bg-parent',
								),
							),
							'hide' => array(
								'text' => esc_html__('Hide','creatus'),
								'attr' => array(
									'data-disable' =>'.hm-over-bg-parent',
								),
							),
						)
					),
					'oc' => array(
						'type' => 'color',
						'title' => esc_html__('Overlay color', 'creatus'),
						'box' => true,
						'attr' => array(
							'class' =>'hm-over-bg'
						),
					),
					'hc' => array(
						'type' => 'short-select',
						'title' => esc_html__('Header closes', 'creatus'),
						'choices' => array(
							'click' => esc_html__('On X icon click','creatus'),
							'both' => esc_html__('On header mouseleave and X icon click','creatus'),
							'overlay' => esc_html__('On overlay and X icon click','creatus'),
						)
					),
				),

				'help' => esc_html__('These options will let you adjust active ( header opened )  and inactive ( header closed ) hamburger icon colors, show or hide site overlay and adjust its color and header close action type.', 'creatus'),
				'desc' => esc_html__('Adjust hamburger icon header close and overlay. See info for details.', 'creatus')
			),
			
			
			'hofmx' => array(
				'label' => __('Offcanvas metrics', 'creatus'),
				'type' => 'thz-multi-options',
				'value' => array(
					't' => 'push',
					'p' => 'left',
					'bg' => '#ffffff',
					'ci' => '',
					'oc' => 'rgba(0,0,0,0.8)',
				),
				'thz_options' => array(
					't' => array(
						'type' => 'short-select',
						'title' => esc_html__('Type', 'creatus'),
						'attr' => array(
							'class' =>'thz-select-switch'
							
						),
						'choices' => array(
							'push' => array(
								'text' => esc_html__('Push out','creatus'),
								'attr' => array(
									'data-enable' =>'.thz-mh-fw-option-hofmx-p,.thz-mh-fw-option-hofmx-oc,.thz-mh-fw-edit-options-modal-hofmx-p,.thz-mh-fw-edit-options-modal-hofmx-oc',
								),
							),
							'slide' => array(
								'text' => esc_html__('Slide out','creatus'),
								'attr' => array(
									'data-enable' =>'.thz-mh-fw-option-hofmx-p,.thz-mh-fw-option-hofmx-oc,.thz-mh-fw-edit-options-modal-hofmx-p,.thz-mh-fw-edit-options-modal-hofmx-oc',
								),
							),
							'overlay' => array(
								'text' => esc_html__('Overlay','creatus'),
								'attr' => array(
									'data-disable' =>'.thz-mh-fw-option-hofmx-p,.thz-mh-fw-option-hofmx-oc,.thz-mh-fw-edit-options-modal-hofmx-p,.thz-mh-fw-edit-options-modal-hofmx-oc',
								),
							),
						)
					),
					'p' => array(
						'type' => 'short-select',
						'title' => esc_html__('Position', 'creatus'),
						'choices' => array(
							'left' => esc_html__('Left','creatus'),
							'right' => esc_html__('Right','creatus'),
						)
					),
					'bg' => array(
						'type' => 'color',
						'title' => esc_html__('Background', 'creatus'),
						'box' => true
					),
					'ci' => array(
						'type' => 'color',
						'title' => esc_html__('Close icon', 'creatus'),
						'box' => true
					),
					'oc' => array(
						'type' => 'color',
						'title' => esc_html__('Overlay color', 'creatus'),
						'box' => true
					),
				),
				'help' => esc_html__('These options will let you adjust offcanvas type, offcanvas holder position and background, offcanvas close icon color and overlay bacground color.', 'creatus'),
				'desc' => esc_html__('Adjust offcanvas metrix. See info for details.', 'creatus'),
			),
			
			'hicmx' => array(
				'label' => __('Header icons metrics', 'creatus'),
				'type' => 'thz-multi-options',
				'value' => array(
					'l' => 'layout1',
					'so' => 'hide',
					's' => 'hide',
					'w' => 'hide',
					'i' => '',
					'a' => '',
					'cic' => 'thzicon thzicon-shopping-cart2',
					'ico' => 'hide',
					'cbg' => 'color_4',
					'cco' => 'color_2'
				),
				'breakafter' => array('l','a'),
				'thz_options' => array(
					'l' => array(
						'type' => 'image-picker',
						'title' => esc_html__('Layout', 'creatus'),
/*						'attr' => array(
							'class' =>'thz-select-switch'
						),*/
						'choices' => array(
							'layout1' => array(
								'small' => thz_theme_file_uri( '/inc/thzframework/admin/images/offcanvas_layout1_small.png'),
								'large' => thz_theme_file_uri( '/inc/thzframework/admin/images/offcanvas_layout1_large.png'),
								'attr' => array(
									'data-enable' => '.off-soc-links-parent',
								),
							),
							'layout2' => array(
								'small' => thz_theme_file_uri( '/inc/thzframework/admin/images/offcanvas_layout2_small.png'),
								'large' => thz_theme_file_uri( '/inc/thzframework/admin/images/offcanvas_layout2_large.png'),
								'attr' => array(
									'data-enable' => '.off-soc-links-parent',
								),
							),
							'layout3' => array(
								'small' => thz_theme_file_uri( '/inc/thzframework/admin/images/offcanvas_layout3_small.png'),
								'large' => thz_theme_file_uri( '/inc/thzframework/admin/images/offcanvas_layout3_large.png'),
								'attr' => array(
									'data-enable' => '.off-soc-links-parent',
								),
							),
							'layout4' => array(
								'small' => thz_theme_file_uri( '/inc/thzframework/admin/images/offcanvas_layout4_small.png'),
								'large' => thz_theme_file_uri( '/inc/thzframework/admin/images/offcanvas_layout4_large.png'),
								'attr' => array(
									'data-enable' => '.off-soc-links-parent',
								),
							),
							'layout5' => array(
								'small' => thz_theme_file_uri( '/inc/thzframework/admin/images/offcanvas_layout5_small.png'),
								'large' => thz_theme_file_uri( '/inc/thzframework/admin/images/offcanvas_layout5_large.png'),
								'attr' => array(
									'data-enable' => '.off-soc-links-parent',
								),
							),
							'layout6' => array(
								'small' => thz_theme_file_uri( '/inc/thzframework/admin/images/offcanvas_layout6_small.png'),
								'large' => thz_theme_file_uri( '/inc/thzframework/admin/images/offcanvas_layout6_large.png'),
								'attr' => array(
									'data-enable' => '.off-soc-links-parent',
								),
							),
							'layout7' => array(
								'small' => thz_theme_file_uri( '/inc/thzframework/admin/images/offcanvas_layout7_small.png'),
								'large' => thz_theme_file_uri( '/inc/thzframework/admin/images/offcanvas_layout7_large.png'),
								'attr' => array(
									'data-enable' => '.off-soc-links-parent',
								),
							),
							'layout8' => array(
								'small' => thz_theme_file_uri( '/inc/thzframework/admin/images/offcanvas_layout8_small.png'),
								'large' => thz_theme_file_uri( '/inc/thzframework/admin/images/offcanvas_layout8_large.png'),
								'attr' => array(
									'data-enable' => '.off-soc-links-parent',
								),
							),
						)
					),
					'so' => array(
						'type' => 'short-select',
						'title' => esc_html__('Social links', 'creatus'),
						'choices' => array(
							'show' => esc_html__('Show','creatus'),
							'hide' => esc_html__('Hide','creatus'),
						),
						'attr' => array(
							'class' => 'off-soc-links'
						),
					),
					's' => array(
						'type' => 'short-select',
						'title' => esc_html__('Search icon', 'creatus'),
						'choices' => array(
							'show' => esc_html__('Show','creatus'),
							'hide' => esc_html__('Hide','creatus'),
						)
					),
					'w' => array(
						'type' => 'short-select',
						'title' => esc_html__('Woo cart', 'creatus'),
						'attr' => array(
							'class' =>'thz-select-switch'
							
						),
						'choices' => array(
							'hide' => array(
								'text' => esc_html__('Hide','creatus'),
								'attr' => array(
									'data-disable' =>'.wo-cnt-sh-parent,.wo-counter-switch-parent,.wo-cic-parent',
								),
							),
							'show' => array(
								'text' => esc_html__('Show','creatus'),
								'attr' => array(
									'data-enable' =>'.wo-cic-parent,.wo-counter-switch-parent',
									'data-check' =>'.wo-counter-switch',
								),
							),
						)
					),
					'i' => array(
						'type' => 'color',
						'title' => esc_html__('Inactive', 'creatus'),
						'box' => true
					),
					'a' => array(
						'type' => 'color',
						'title' => esc_html__('Active', 'creatus'),
						'box' => true
					),
					
					'cic' => array(
						'type' => 'icon',
						'title' => esc_html__('Cart icon', 'creatus'),
						'attr' => array(
							'class' => 'wo-cic'
						),
					),
					
					'ico' => array(
						'type' => 'short-select',
						'title' => esc_html__('Items counter', 'creatus'),
						'attr' => array(
							'class' =>'thz-select-switch wo-counter-switch'
							
						),
						'choices' => array(
							'hide' => array(
								'text' => esc_html__('Hide','creatus'),
								'attr' => array(
									'data-disable' =>'.wo-cnt-sh-parent',
								),
							),
							'show' => array(
								'text' => esc_html__('Show','creatus'),
								'attr' => array(
									'data-enable' =>'.wo-cnt-sh-parent',
								),
							),
						)
					),
					
					'cbg' => array(
						'type' => 'color',
						'title' => esc_html__('Counter bg', 'creatus'),
						'box' => true,
						'attr' => array(
							'class' => 'wo-cnt-sh'
						),
					),
					'cco' => array(
						'type' => 'color',
						'title' => esc_html__('Counter color', 'creatus'),
						'box' => true,
						'attr' => array(
							'class' => 'wo-cnt-sh'
						),
					)
			
				),
				'desc' => esc_html__('Adjust header content layout, show/hide search/cart and adjust icons active/inactive colors.', 'creatus')
			),
			
			'hea' => array(
				'type' => 'thz-animation',
				'label' => false,
				'value' => array(
					'animate' => 'inactive',
					'effect' => 'thz-anim-fadeIn',
					'duration' => 400,
					'delay' => 0
				),
				'addlabel' => esc_html__('Animate header', 'creatus'),
				'adddesc' => esc_html__('Add animation to the header', 'creatus')
			),
			
		)
	),
	'headerstickytab' => array(
		'title' => __('Sticky', 'creatus'),
		'type' => 'tab',
		'lazy_tabs'=> false,
		'li-attr' => array(
			'class' => 'thz-sticky-header-tab'
		),
		'options' => array(
			'sthe' => array(
				'type' => 'multi-picker',
				'label' => false,
				'desc' => false,
				'show_borders' => true,
				'picker' => array(
					'picked' => array(
						'label' => __('Sticky header', 'creatus'),
						'desc' => esc_html__('Activate/deactivate sticky header', 'creatus'),
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
						'type' => array(
							'label' => __('Sticky header type', 'creatus'),
							'desc' => esc_html__('If set to Hide on scroll, sticky header will hide when user scrolls down and show when user scrolls up', 'creatus'),
							'type' => 'switch',
							'right-choice' => array(
								'value' => 'hide',
								'label' => __('Hide on scroll', 'creatus')
							),
							'left-choice' => array(
								'value' => 'show',
								'label' => __('Always visible', 'creatus')
							),
							'value' => 'hide'
						),
						
						'bs' => array(
							'type' => 'thz-box-style',
							'label' => __('Sticky header box style', 'creatus'),
							'preview' => true,
							'button-text' => esc_html__('Customize sticky header box style', 'creatus'),
							'desc' => esc_html__('Adjust .thz-sticky-header.isvisible box style', 'creatus'),
							'popup' => true,
							'disable' => array('layout','boxsize','transform','margin','padding','borderradius','video'),
							'value' => array()
						),

						'a' => array(
							'type' => 'thz-multi-options',
							'label' => __('Active menu link', 'creatus'),
							'desc' => esc_html__('Override first level active menu link color. This option takes precedence over top menu links colors settings', 'creatus'),
							'value' => array(
								'co' => '',
								'bg' => '',
								'bo' => ''
							),
							'thz_options' => array(
								'co' => array(
									'type' => 'color',
									'title' => esc_html__('Color', 'creatus'),
									'box' => true
								),
								'bg' => array(
									'type' => 'color',
									'title' => esc_html__('Background', 'creatus'),
									'box' => true
								),
								'bo' => array(
									'type' => 'color',
									'title' => esc_html__('Border', 'creatus'),
									'box' => true
								)
							)
						),
						'i' => array(
							'type' => 'thz-multi-options',
							'label' => __('Inactive menu link', 'creatus'),
							'desc' => esc_html__('Override first level inactive menu link color. This option takes precedence over top menu links colors settings', 'creatus'),
							'value' => array(
								'co' => '',
								'bg' => '',
								'bo' => ''
							),
							'thz_options' => array(
								'co' => array(
									'type' => 'color',
									'title' => esc_html__('Color', 'creatus'),
									'box' => true
								),
								'bg' => array(
									'type' => 'color',
									'title' => esc_html__('Background', 'creatus'),
									'box' => true
								),
								'bo' => array(
									'type' => 'color',
									'title' => esc_html__('Border', 'creatus'),
									'box' => true
								)
							)
						),
						'h' => array(
							'type' => 'thz-multi-options',
							'label' => __('Hovered menu link', 'creatus'),
							'desc' => esc_html__('Override first level hovered menu link color. This option takes precedence over top menu links colors settings', 'creatus'),
							'value' => array(
								'co' => '',
								'bg' => '',
								'bo' => ''
							),
							'thz_options' => array(
								'co' => array(
									'type' => 'color',
									'title' => esc_html__('Color', 'creatus'),
									'box' => true
								),
								'bg' => array(
									'type' => 'color',
									'title' => esc_html__('Background', 'creatus'),
									'box' => true
								),
								'bo' => array(
									'type' => 'color',
									'title' => esc_html__('Border', 'creatus'),
									'box' => true
								)
							)
						)
					)
				)
			)
		)
	),
	'toolbartab' => array(
		'title' => __('Toolbar', 'creatus'),
		'type' => 'tab',
		'lazy_tabs'=> false,
		'li-attr' => array(
			'class' => 'thz-header-toolbar-tab'
		),
		'options' => array(
			'htb' => array(
				'type' => 'multi-picker',
				'label' => false,
				'desc' => false,
				'show_borders' => true,
				'picker' => array(
					'picked' => array(
						'label' => __('Header toolbar', 'creatus'),
						'desc' => esc_html__('Show/hide header toolbar', 'creatus'),
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
						'bs' => array(
							'type' => 'thz-box-style',
							'label' => __('Toolbar style', 'creatus'),
							'preview' => true,
							'button-text' => esc_html__('Customize toolbar box style', 'creatus'),
							'desc' => esc_html__('Customize .thz-header-toolbar box style', 'creatus'),
							'popup' => true,
							'disable' => array('video'),
							'value' => array(
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
								),
								'background' => array(
									'type' => 'color',
									'color' => '#ffffff'
								)
							)
						),
						'm' => array(
							'type' => 'thz-multi-options',
							'label' => __('Toolbar metrics', 'creatus'),
							'desc' => esc_html__('Adjust toolbar font size, line height and colors', 'creatus'),
							'value' => array(
								'f' => '13',
								'lh' => '45',
								't' => '',
								'l' => '',
								'h' => ''
							),
							'thz_options' => array(
								'f' => array(
									'type' => 'spinner',
									'title' => esc_html__('Font size', 'creatus'),
									'addon' => 'px',
									'min' => 8,
									'max' => 100
								),
								'lh' => array(
									'type' => 'spinner',
									'title' => esc_html__('Line height', 'creatus'),
									'addon' => 'px',
									'min' => 8,
									'max' => 100
								),
								't' => array(
									'type' => 'color',
									'title' => esc_html__('Text', 'creatus'),
									'box' => true
								),
								'l' => array(
									'type' => 'color',
									'title' => esc_html__('Link', 'creatus'),
									'box' => true
								),
								'h' => array(
									'type' => 'color',
									'title' => esc_html__('Hovered link', 'creatus'),
									'box' => true
								)
							)
						),
						'c' => array(
							'type' => 'thz-multi-options',
							'label' => __('Toolbar content', 'creatus'),
							'desc' => esc_html__('Choose what will be shown in left and right toolbar side', 'creatus'),
							'value' => array(
								'l' => 'p',
								'r' => 's'
							),
							'thz_options' => array(
								'l' => array(
									'type' => 'short-select',
									'title' => esc_html__('Left content', 'creatus'),
									'choices' => array(
										'p' => esc_html__('Slogan phone and email', 'creatus'),
										's' => esc_html__('Social links', 'creatus'),
										'n' => esc_html__('Navigation', 'creatus'),
										'h' => esc_html__('Hide', 'creatus')
									)
								),
								'r' => array(
									'type' => 'short-select',
									'title' => esc_html__('Right content', 'creatus'),
									'choices' => array(
										'p' => esc_html__('Slogan phone and email', 'creatus'),
										's' => esc_html__('Social links', 'creatus'),
										'n' => esc_html__('Navigation', 'creatus'),
										'h' => esc_html__('Hide', 'creatus')
									)
								)
							)
						),
						's' => array(
							'type' => 'text',
							'label' => __('Slogan', 'creatus'),
							'desc' => esc_html__('Add your slogan text. Not shown if empty.', 'creatus')
						),
						'p' => array(
							'type' => 'text',
							'label' => __('Phone', 'creatus'),
							'desc' => esc_html__('Add your phone number. Not shown if empty.', 'creatus')
						),
						'e' => array(
							'type' => 'text',
							'label' => __('Email', 'creatus'),
							'desc' => esc_html__('Add your contact email adress. Not shown if empty.', 'creatus')
						),
						'nt' => array(
							'type' => 'thz-multi-options',
							'label' => __('Navigation top level', 'creatus'),
							'desc' => esc_html__('Adjust toolbar navigation top level item colors', 'creatus'),
							'value' => array(
								'pl' => 10,
								'pr' => 10,
								'bg' => '',
								'l' => '',
								'hbg' => 'color_5',
								'h' => '',
								'b' => 'color_4'
							),
							'breakafter' => array('pr'),
							'thz_options' => array(
								'pl' => array(
									'type' => 'spinner',
									'title' => esc_html__('Padding left', 'creatus'),
									'addon' => 'px',
									'min' => 0,
								),
								'pr' => array(
									'type' => 'spinner',
									'title' => esc_html__('Padding right', 'creatus'),
									'addon' => 'px',
									'min' => 0,
								),
								'bg' => array(
									'type' => 'color',
									'title' => esc_html__('Background', 'creatus'),
									'box' => true
								),
								'l' => array(
									'type' => 'color',
									'title' => esc_html__('Link', 'creatus'),
									'box' => true
								),
								'hbg' => array(
									'type' => 'color',
									'title' => esc_html__('Hovered background', 'creatus'),
									'box' => true
								),
								'h' => array(
									'type' => 'color',
									'title' => esc_html__('Hovered link', 'creatus'),
									'box' => true
								),
								'b' => array(
									'type' => 'color',
									'title' => esc_html__('Border', 'creatus'),
									'box' => true
								)
							)
						),
						'ns' => array(
							'type' => 'thz-multi-options',
							'label' => __('Navigation sub level', 'creatus'),
							'desc' => esc_html__('Adjust toolbar navigation sub level item colors and item width', 'creatus'),
							'value' => array(
								'bg' => '',
								'l' => '',
								'hbg' => '#fafafa',
								'h' => '',
								'b' => '#eaeaea',
								'w' => '160'
							),
							'thz_options' => array(
								'bg' => array(
									'type' => 'color',
									'title' => esc_html__('Background', 'creatus'),
									'box' => true
								),
								'l' => array(
									'type' => 'color',
									'title' => esc_html__('Link', 'creatus'),
									'box' => true
								),
								'hbg' => array(
									'type' => 'color',
									'title' => esc_html__('Hovered background', 'creatus'),
									'box' => true
								),
								'h' => array(
									'type' => 'color',
									'title' => esc_html__('Hovered link', 'creatus'),
									'box' => true
								),
								'b' => array(
									'type' => 'color',
									'title' => esc_html__('Border', 'creatus'),
									'box' => true
								),
								'w' => array(
									'type' => 'spinner',
									'title' => esc_html__('Width', 'creatus'),
									'addon' => 'px',
									'min' => 100,
									'max' => 400
								)
							)
						)
					)
				)
			)
		)
	)
);
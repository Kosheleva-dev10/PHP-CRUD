<?php
if (!defined('FW')) {
	die('Forbidden');
}
$options = array(
	'defaultstab' => array(
		'title' => __('Details', 'creatus'),
		'type' => 'tab',
		'options' => array(
		
			'id' => array(
				'type' => 'unique',
				'length' => 8
			),
			
			'image' => array(
				'type' => 'upload',
				'label' => __('Select Image', 'creatus'),
				'desc' => esc_html__('Select or upload an image', 'creatus')
			),
			'click' => array(
				'label' => __('Image action', 'creatus'),
				'desc' => esc_html__('Select image click action', 'creatus'),
				'type' => 'short-select',
				'attr' => array(
					'class' => 'thz-select-switch'
				),
				'value' => 'none',
				'choices' => array(
					'none' => array(
						'text' => esc_html__('None', 'creatus'),
						'attr' => array(
							'data-disable' => 'link'
						)
					),
					'link' => array(
						'text' => esc_html__('Open link', 'creatus'),
						'attr' => array(
							'data-enable' => 'link'
						)
					),
					'lightbox' => array(
						'text' => esc_html__('Open image in lightbox', 'creatus'),
						'attr' => array(
							'data-disable' => 'link'
						)
					)
				)
			),
			'link' => array(
				'label' => __('Add custom link', 'creatus'),
				'desc' => esc_html__('Add custom link for member image', 'creatus'),
				'type' => 'thz-url',
				'value' => array(
					'type' => 'normal',
					'url' => '',
					'title' => '',
					'target' => '_self',
					'magnific' => ''
				),
				'data-parent' => 'parent',
				'data-type' => '.thz-url-type,.linkType',
				'data-link' => '.thz-url-input,.normalLink',
				'data-title' => '.thz-url-title,.linkTitle',
				'data-target' => '.thz-url-target,.linkTarget',
				'data-magnific' => '.thz-url-magnific,.magnificId'
			),
			'name' => array(
				'label' => __('Name', 'creatus'),
				'desc' => esc_html__('Name of the team member', 'creatus'),
				'type' => 'text',
				'value' => ''
			),
			'job' => array(
				'label' => __('Job Title', 'creatus'),
				'desc' => esc_html__('Job title of the team member.', 'creatus'),
				'type' => 'text',
				'value' => ''
			),
			'desc' => array(
				'label' => __('Description', 'creatus'),
				'desc' => esc_html__('Enter a few words that describe the team member', 'creatus'),
				'type' => 'textarea',
				'value' => ''
			),
		)
	),
	'socialsoptionstab' => array(
		'title' => __('Socials', 'creatus'),
		'type' => 'tab',
		'lazy_tabs' => false,
		'options' => array(
			'links' => array(
				'type' => 'addable-popup',
				'label' => __('Social media links', 'creatus'),
				'desc' => esc_html__('Click to add new social media link. Drag and drop to reorder.', 'creatus'),
				'template' => '{{- name }}',
				'popup-title' => null,
				'size' => 'large',
				'popup-options' => array(
					'defaultstab' => array(
						'title' => __('Defaults', 'creatus'),
						'type' => 'tab',
						'lazy_tabs' => false,
						'options' => array(
							'name' => array(
								'label' => __('Website name', 'creatus'),
								'type' => 'text',
								'value' => '',
								'desc' => esc_html__('Social website name.eg:Facebook', 'creatus'),
								'help' => esc_html__('This option is used in a social link tooltip so you can do something like; Visit us on Facebook', 'creatus')
							),
							'icon' => array(
								'type' => 'thz-icon',
								'value' => '',
								'label' => __('Social icon', 'creatus')
							),
							'link' => array(
								'label' => __('Social Link', 'creatus'),
								'type' => 'text',
								'value' => '',
								'desc' => esc_html__('Social website link.eg: http://www.facebook.com/themezly', 'creatus')
							)
						)
					),
					'styletab' => array(
						'title' => __('Style', 'creatus'),
						'type' => 'tab',
						'lazy_tabs' => false,
						'options' => array(
							'ic' => array(
								'type' => 'thz-multi-options',
								'label' => __('Custom Icon colors', 'creatus'),
								'desc' => esc_html__('Leave empty for defaults defined in Typography tab Social links metrics', 'creatus'),
								'help' => esc_html__('Style color is used depending on the icon style. If outline, color is used for shape outline border if flat, color is used as shape background color', 'creatus'),
								'value' => array(
									'l' => '',
									'h' => '',
									's' => '',
									'sh' => ''
								),
								'thz_options' => array(
									'l' => array(
										'type' => 'color',
										'title' => esc_html__('Color', 'creatus'),
										'box' => true
									),
									'h' => array(
										'type' => 'color',
										'title' => esc_html__('Hovered', 'creatus'),
										'box' => true
									),
									's' => array(
										'type' => 'color',
										'title' => esc_html__('Style color', 'creatus'),
										'box' => true
									),
									'sh' => array(
										'type' => 'color',
										'title' => esc_html__('Style hovered', 'creatus'),
										'box' => true
									)
								)
							)
						)
					)
				)
			),
//			'im' => array(
//				'type' => 'thz-multi-options',
//				'label' => __('Icons metrics', 'creatus'),
//				'desc' => esc_html__('Adjust icons metrics', 'creatus'),
//				'value' => array(
//					'f' => 14,
//					'sp' => 20,
//					's' => 'simple',
//					'sh' => 'square',
//					'r' => 2,
//				),
//				'thz_options' => array(
//					'f' => array(
//						'type' => 'spinner',
//						'title' => esc_html__('Icon size', 'creatus'),
//						'addon' => 'px',
//						'min' => 0
//					),
//					'sp' => array(
//						'type' => 'spinner',
//						'title' => esc_html__('Icons space', 'creatus'),
//						'addon' => 'px',
//						'min' => 0
//					),
//					's' => array(
//						'type' => 'short-select',
//						'title' => esc_html__('Style', 'creatus'),
//						'attr' => array(
//							'class' => 'thz-select-switch'
//						),
//						'choices' => array(
//							'simple' => array(
//								'text' => esc_html__('Simple', 'creatus'),
//								'attr' => array(
//									'data-disable' => '.memb-s-sh-parent,.memb-s-r-parent'
//								)
//							),
//							'outline' => array(
//								'text' => esc_html__('Outline', 'creatus'),
//								'attr' => array(
//									'data-enable' => '.memb-s-sh-parent,.memb-s-r-parent'
//								)
//							),
//							'flat' => array(
//								'text' => esc_html__('Flat', 'creatus'),
//								'attr' => array(
//									'data-enable' => '.memb-s-sh-parent,.memb-s-r-parent'
//								)
//							)
//						)
//					),
//					'sh' => array(
//						'type' => 'short-select',
//						'title' => esc_html__('Shape', 'creatus'),
//						'choices' => array(
//							'circle' => esc_html__('Circle', 'creatus'),
//							'square' => esc_html__('Square', 'creatus'),
//							'rounded' => esc_html__('Rounded', 'creatus')
//						),
//						'attr' => array(
//							'class' => 'memb-s-sh'
//						),
//					),
//					'r' => array(
//						'type' => 'spinner',
//						'title' => esc_html__('Shape ratio', 'creatus'),
//						'addon' => 'X',
//						'attr' => array(
//							'class' => 'memb-s-r'
//						),
//					),
//				)
//			)
		)
	),
);
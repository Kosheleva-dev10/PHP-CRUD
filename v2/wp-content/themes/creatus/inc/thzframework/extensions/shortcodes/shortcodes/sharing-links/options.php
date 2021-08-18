<?php
if (!defined('FW')) {
	die('Forbidden');
}
$options = array(
	'defaultstab' => array(
		'title' => __('Defaults', 'creatus'),
		'type' => 'tab',
		'options' => array(
			'id' => array(
				'type' => 'unique',
				'length' => 8
			),
			'sharing_links' => array(
				'type' => 'thz-sortable-checks',
				'value' => array(
					'facebook',
					'twitter',
					'googleplus',
					'pinterest',
					'linkedin',
					'reddit',
					'email'
				),
				'label' => __('Post sharing links', 'creatus'),
				'desc' => esc_html__('Check to show/hide specific post sharing links. Click and drag the label to sort.', 'creatus'),
				'choices' => array(
					'facebook' => esc_html__('Facebook', 'creatus'),
					'twitter' => esc_html__('Twitter', 'creatus'),
					'googleplus' => esc_html__('Google+', 'creatus'),
					'pinterest' => esc_html__('Pinterest', 'creatus'),
					'linkedin' => esc_html__('Linkedin', 'creatus'),
					'reddit' => esc_html__('Reddit', 'creatus'),
					'email' => esc_html__('Email', 'creatus')
				)
			),
			'sharing_tooltip' => array(
				'type' => 'radio',
				'value' => 'hide',
				'label' => __('Sharing links tooltip', 'creatus'),
				'desc' => esc_html__('Select sharing links tooltip position', 'creatus'),
				'choices' => array(
					'top' => esc_html__('Top', 'creatus'),
					'right' => esc_html__('Right', 'creatus'),
					'bottom' => esc_html__('Bottom', 'creatus'),
					'left' => esc_html__('Left', 'creatus'),
					'hide' => esc_html__('Hide', 'creatus')
				),
				'inline' => true
			),
			'cmx' => _thz_container_metrics_defaults()
		)
	),
	'layouttab' => array(
		'title' => __('Layout', 'creatus'),
		'type' => 'tab',
		'options' => array(
			'layout' => array(
				'label' => __('Sharing layout', 'creatus'),
				'desc' => esc_html__('Select sharing links layout', 'creatus'),
				'type' => 'select',
				'value' => 'leftsided',
				'choices' => array(
					'leftsided' => esc_html__('Left sided ( Label left, links left ) ', 'creatus'),
					'separated' => esc_html__('Separated ( Label left, links right )', 'creatus'),
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
				'disable' => array('layout','video','boxsize','transform'),
				'units' => array(
					'borderradius',
					'boxsize',
					'padding',
					'margin',
				),
				'value' => array(
					'padding' => array(
						'top' => '15',
						'right' => '15',
						'bottom' => '15',
						'left' => '15'
					),
					'background' => array(
						'type' => 'color',
						'color' => '#fafafa',
					)
				)
			),
			'im' => array(
				'type' => 'thz-multi-options',
				'label' => __('Sharing icons metrics', 'creatus'),
				'desc' => esc_html__('Adjust sharing icons metrics', 'creatus'),
				'help' => esc_html__('Style color is used depending on the icon style. If outline, color is used for shape outline border if flat, color is used as shape background color', 'creatus'),
				'breakafter' => 'r',
				'value' => array(
					'f' => 16,
					'sp' => 20,
					's' => 'simple',
					'sh' => 'square',
					'r' => 2,
					'c' => '',
					'ch' => '',
					'sc' => '',
					'sch' => ''
				),
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
									'data-disable' => '.im-sh-parent,.im-shr-parent,.im-sc-parent,.im-sch-parent'
								)
							),
							'outline' => array(
								'text' => esc_html__('Outline', 'creatus'),
								'attr' => array(
									'data-enable' => '.im-sh-parent,.im-shr-parent,.im-sc-parent,.im-sch-parent'
								)
							),
							'flat' => array(
								'text' => esc_html__('Flat', 'creatus'),
								'attr' => array(
									'data-enable' => '.im-sh-parent,.im-shr-parent,.im-sc-parent,.im-sch-parent'
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
							'class' => 'im-sh'
						
						)
					),
					'r' => array(
						'type' => 'spinner',
						'title' => esc_html__('Shape ratio', 'creatus'),
						'addon' => 'X',
						'attr' => array(
							'class' => 'im-shr'
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
							'class' => 'im-sc'
						
						)
					),
					'sch' => array(
						'type' => 'color',
						'title' => esc_html__('Style hovered', 'creatus'),
						'box' => true,
						'attr' => array(
							'class' => 'im-sch'
						
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
								'size' => 14,
								'weight' => 600,
							),
							'disable' => array('hovered','align'),
						)
					)
				)
			)
		)
	),
	
	'sharingeffects' => array(
		'title' => __('Effects', 'creatus'),
		'type' => 'tab',
		'options' => array(
			'animate' => array(
				'type' => 'thz-animation',
				'label' => false,
				'value' => array(
					'animate' => 'inactive',
					'effect' => 'thz-anim-fadeIn',
					'duration' => 400,
					'delay' => 0
				)
			),
			'cpx' => _thz_container_parallax_default()
		)
	)
);

<?php
if (!defined('FW')) {
	die('Forbidden');
}

$ec_template = '<b>Content position {{-p}}</b>';
$ec_template .= '{{ if(c.length > 0){ }}';
$ec_template .= '{{  var ec_text = thz.thz_strip_tags_to_space(c); }}';
$ec_template .= '{{  if(ec_text.length > 60){ ec_text = ec_text.substring(0, 60) + \'...\'; } }}';
$ec_template .= '<span class="thz-bsp"></span>{{= ec_text }}';
$ec_template .= '{{ } }}';

$options = array(
	'defaultstab' => array(
		'title' => __('Defaults', 'creatus'),
		'type' => 'tab',
		'options' => array(
			'id' => array(
				'type' => 'unique',
				'length' => 8
			),
			'sort_title' => array(
				'type' => 'text',
				'label' => __('Sorting title', 'creatus'),
				'value' => '',
				'desc' => esc_html__('Used only in builder for easy sorting.', 'creatus')
			),

			'grid' => array(
				'type' => 'thz-multi-options',
				'label' => __('Grid settings', 'creatus'),
				'desc' => esc_html__('Set portfolio items grid columns and gutter', 'creatus'),
				'value' => array(
					'columns' => 3,
					'gutter' => 30,
				),
				'thz_options' => array(
					'gutter' => array(
						'type' => 'spinner',
						'title' => esc_html__('Gutter', 'creatus'),
						'addon' => 'px',
						'min' => 0,
						'max' => 400
					),
					'columns' => array(
						'type' => 'select',
						'title' => esc_html__('Columns', 'creatus'),
						'choices' => array(
							'1' => esc_html__('1', 'creatus'),
							'2' => esc_html__('2', 'creatus'),
							'3' => esc_html__('3', 'creatus'),
							'4' => esc_html__('4', 'creatus'),
							'5' => esc_html__('5', 'creatus'),
							'6' => esc_html__('6', 'creatus')
						)
					),
				)
			),
						
			'bs' => array(
				'type' => 'thz-box-style',
				'label' => __('Container box style', 'creatus'),
				'preview' => false,
				'popup' => true,
				'desc' => esc_html__('Adjust .thz-items-grid-holder box style', 'creatus'),
				'button-text' => __('Container box style', 'creatus'),
				'disable' => array('video'),
				'units' => array(
					'borderradius',
					'boxsize',
					'padding',
					'margin',
				),
				'value' => array()
			),
			
			
			'cmx' => _thz_container_metrics_defaults()
			

		)
	),
	'itemstab' => array(
		'title'   => __( 'Items', 'creatus' ),
		'type'    => 'tab',
		'options' => array(
			'items' => array(
				'type' => 'addable-popup',
				'label' => __('Items', 'creatus'),
				'popup-title' => esc_html__('Add/Edit Items', 'creatus'),
				'desc' => esc_html__('Create your items', 'creatus'),
				'template' => '{{= l }}',
				'size' => 'large',
				'popup-options' => array(

					'id' => array(
						'type' => 'unique',
						'length' => 8
					),
					
					'l' => array(
						'type' => 'short-text',
						'label' => __('Item label', 'creatus'),
						'desc' => esc_html__('Set item sorting label ( used in builder only ).', 'creatus'),
						'value' => ''
					),

					'bs' => array(
						'type' => 'thz-box-style',
						'label' => __('Item in box style', 'creatus'),
						'preview' => false,
						'popup' => true,
						'desc' => esc_html__('Adjust this item .thz-grid-item-in box style', 'creatus'),
						'button-text' => __('Item in box style', 'creatus'),
						'disable' => array('margin','layout','boxsize','transform','video'),
						'value' => array()
					),
					
					'ebs' => array(
						'type' => 'thz-box-style',
						'label' => __('Item element style', 'creatus'),
						'preview' => false,
						'popup' => true,
						'desc' => esc_html__('Adjust this item .thz-grid-item-element box style', 'creatus'),
						'button-text' => __('Item element box style', 'creatus'),
						'disable' => array('video'),
						'value' => array()
					),				
				
					'ec' => array(
						'type' => 'addable-popup',
						'label' => __('Item element content', 'creatus'),
						'popup-title' => esc_html__('Add/Edit content', 'creatus'),
						'desc' => esc_html__('Insert element content', 'creatus'),
						'template' => $ec_template,
						'size' => 'large',
						'popup-options' => array(
						
							'p' => array(
								'label' => __('Content position', 'creatus'),
								'desc' => __('Select content position', 'creatus'),
								'type' => 'select',
								'value' => 'inside',
								'choices' => array(
									
									'above' => __('Above the element in', 'creatus'),
									'inside' => __('Inside the element in', 'creatus'),
									'under' => __('Under the element in', 'creatus'),
								)
							),
						
							'c' => array(
								'type' => 'wp-editor',
								'size' => 'large',
								'editor_height' => 250,
								'editor_type' => 'tinymce',
								'shortcodes' => true,
								'value' => 'I am item element content',
								'label' => __('Content', 'creatus')
							)
						)
					),

				)
			),
			
			
			'abs' => array(
				'type' => 'thz-box-style',
				'label' => __('All items in box style', 'creatus'),
				'preview' => false,
				'popup' => true,
				'desc' => esc_html__('Adjust .thz-grid-item-in box style for all grid items.', 'creatus'),
				'button-text' => __('All items in box style', 'creatus'),
				'disable' => array('margin','layout','boxsize','transform','video'),
				'value' => array()
			),
			
			'aebs' => array(
				'type' => 'thz-box-style',
				'label' => __('All items elements style', 'creatus'),
				'preview' => false,
				'popup' => true,
				'desc' => esc_html__('Adjust .thz-grid-item-element box style for all grid items.', 'creatus'),
				'button-text' => __('Items element box style', 'creatus'),
				'disable' => array('video'),
				'value' => array()
			),
			
		),
	),
	
	'itemsgrideffects' => array(
		'title' => __('Effects', 'creatus'),
		'type' => 'tab',
		'options' => array(
			'animate' => array(
				'type' => 'thz-animation',
				'label' => false,
				'value' => array(
					'animate' => 'inactive',
					'effect' => 'thz-anim-slideIn-up',
					'duration' => 400,
					'delay' => 200
				),
				'addlabel' => esc_html__('Animate items', 'creatus'),
				'adddesc' => esc_html__('Add animation to items HTML container', 'creatus')
			),
			'cpx' => _thz_container_parallax_default()
		)
	)	
);
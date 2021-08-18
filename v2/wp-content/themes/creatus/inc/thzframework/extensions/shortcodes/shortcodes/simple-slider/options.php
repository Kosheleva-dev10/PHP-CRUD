<?php
if (!defined('FW')) {
	die('Forbidden');
}

$title_template = '<b>{{-slide_name}}</b>';
$title_template .= '{{  if(content.length > 0){ }}';
$title_template .= '{{  var slide_text = thz.thz_strip_tags_to_space(content); }}';
$title_template .= '{{  if(slide_text.length > 60){ slide_text = slide_text.substring(0, 60) + \'...\'; } }}';
$title_template .= '<span class="thz-bsp"></span>{{= slide_text }}';
$title_template .= '{{ } }}';

$options = array(
	'defaultstab' => array(
		'title' => __('Defaults', 'creatus'),
		'type' => 'tab',
		'options' => array(
			'id' => array(
				'type' => 'unique',
				'length' => 8
			),
			'slides' => array(
				'label' => __('Slides', 'creatus'),
				'popup-title' => esc_html__('Add/Edit Slide', 'creatus'),
				'desc' => esc_html__('Here you can add, remove and edit your slides.', 'creatus'),
				'type' => 'addable-popup',
				'template' => $title_template,
				'size' => 'large',
				'add-button-text' => esc_html__('Add/edit slide', 'creatus'),
				'popup-options' => array(
					'slide_name' => array(
						'label' => __('Slide name', 'creatus'),
						'desc' => esc_html__('Used only for sorting', 'creatus'),
						'type' => 'text'
					),
					'content' => array(
						'label' => __('Content', 'creatus'),
						'desc' => esc_html__('Enter slide content', 'creatus'),
						'type' => 'wp-editor',
						'size' => 'large',
						'editor_height' => 100,
						'editor_type' => 'tinymce',
						'wpautop' => true,
						'shortcodes' => true,
						'label' => __('Content', 'creatus'),
						'value' => 'I am a simple slide. Praesent ut accumsan est. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras volutpat, ligula quis mollis elementum, ex nisi interdum ante, eu posuere sem sem et tortor.',
						'desc' => esc_html__('Enter some content for this slide', 'creatus')
					)
				)
			),
			'cmx' => _thz_container_metrics_defaults()
		)
	),
	'layouttab' => array(
		'title' => __('Layout', 'creatus'),
		'type' => 'tab',
		'options' => array(
		
			'bs' => array(
				'type' => 'thz-box-style',
				'label' => __('Container box style', 'creatus'),
				'preview' => false,
				'popup' => true,
				'button-text' => esc_html__('Customize container box style', 'creatus'),
				'desc' => esc_html__('Adjust .thz-slick-holder container box style', 'creatus'),
				'disable' => array('layout','boxsize','video','transform'),
				'units' => array(
					'borderradius',
					'boxsize',
					'padding',
					'margin',
				),
				'value' => array()
			),
			
			'slider' => array(
				'type' => 'thz-multi-options',
				'label' => __('Slider layout', 'creatus'),
				'desc' => esc_html__('Adjust slider layout', 'creatus'),
				'value' => array(
					'show' => 1,
					'scroll' => 1,
					'space' => 0,
					'dots' => 'outside',
					'arrows' => 'hide'
				),
				'thz_options' => array(
					'show' => array(
						'type' => 'select',
						'title' => esc_html__('Slides to show', 'creatus'),
						'choices' => array(
							'1' => esc_html__('1', 'creatus'),
							'2' => esc_html__('2', 'creatus'),
							'3' => esc_html__('3', 'creatus'),
							'4' => esc_html__('4', 'creatus'),
							'5' => esc_html__('5', 'creatus'),
							'6' => esc_html__('6', 'creatus')
						)
					),
					'scroll' => array(
						'type' => 'select',
						'title' => esc_html__('Slides to scroll', 'creatus'),
						'choices' => array(
							'1' => esc_html__('1', 'creatus'),
							'2' => esc_html__('2', 'creatus'),
							'3' => esc_html__('3', 'creatus'),
							'4' => esc_html__('4', 'creatus'),
							'5' => esc_html__('5', 'creatus'),
							'6' => esc_html__('6', 'creatus')
						)
					),
					'space' => array(
						'type' => 'spinner',
						'title' => esc_html__('Slides space', 'creatus'),
						'addon' => 'px',
						'min' => 0,
					),
					'dots' => array(
						'type' => 'short-select',
						'title' => esc_html__('Dots location', 'creatus'),
						'choices' => array(
							'hide' => esc_html__('Hide', 'creatus'),
							'inside' => esc_html__('Inside', 'creatus'),
							'outside' => esc_html__('Outside', 'creatus')
						)
					),
					'arrows' => array(
						'type' => 'short-select',
						'title' => esc_html__('Arrows', 'creatus'),
						'choices' => array(
							'hide' => esc_html__('Hide', 'creatus'),
							'show' => esc_html__('Show', 'creatus')
						)
					)
				)
			),
			'sa' => array(
				'type' => 'thz-multi-options',
				'label' => __('Slider animation', 'creatus'),
				'desc' => esc_html__('Adjust simple slider. Hover over help icon for more info.', 'creatus'),
				'help' => esc_html__('Speed: Slide animation speed<br />Auto slide: If set to Yes, slider will start on page load<br />Auto time: Time till next slide transition<br />Infinite: If set to Yes, slides will loop infinitely<br />1000ms = 1s', 'creatus'),
				'value' => array(
					'speed' => 300,
					'autoplay' => 0,
					'autoplayspeed' => 3000,
					'infinite' => 1
				),
				'thz_options' => array(
					'speed' => array(
						'type' => 'spinner',
						'title' => esc_html__('Speed', 'creatus'),
						'addon' => 'ms',
						'min' => 0,
						'step' => 50,
						'max' => 1500
					),
					'autoplay' => array(
						'type' => 'select',
						'title' => esc_html__('Auto slide', 'creatus'),
						'choices' => array(
							0 => esc_html__('No', 'creatus'),
							1 => esc_html__('Yes', 'creatus')
						)
					),
					'autoplayspeed' => array(
						'type' => 'spinner',
						'title' => esc_html__('Auto time', 'creatus'),
						'addon' => 'ms',
						'min' => 0,
						'step' => 50,
						'max' => 10000
					),
					'infinite' => array(
						'type' => 'select',
						'title' => esc_html__('Infinite', 'creatus'),
						'choices' => array(
							0 => esc_html__('No', 'creatus'),
							1 => esc_html__('Yes', 'creatus')
						)
					)
				)
			)
		)
	),
	
	
	'simpleslidereffects' => array(
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
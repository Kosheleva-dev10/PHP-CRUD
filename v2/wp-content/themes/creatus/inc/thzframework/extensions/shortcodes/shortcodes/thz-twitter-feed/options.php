<?php
if (!defined('FW')) {
	die('Forbidden');
}

$twinf ='<h3>';
$twinf .= esc_html__('To obtain Twitter API keys please visit','creatus');
$twinf .=' <a href="https://dev.twitter.com/apps" target="_blank">https://dev.twitter.com/apps</a> ';
$twinf .= esc_html__('and create new application.','creatus');
$twinf .='</h3>';

$slider_settings = fw()->theme->get_options( 'slider_settings');

$slider_settings['slider']['value']['show'] = 1;
$slider_settings['slider']['value']['scroll'] = 1;
$slider_settings['slider']['value']['space'] = 0;


$options = array(
	'defaultstab' => array(
		'title' => __('Defaults', 'creatus'),
		'type' => 'tab',
		'options' => array(
			'id' => array(
				'type' => 'unique',
				'length' => 8
			),

			'tw_mx' => array(
				'type' => 'thz-multi-options',
				'label' => __('Twitter metrics', 'creatus'),
				'desc' => esc_html__('Adjust twitter metrics.', 'creatus'),
				'value' => array(
					'u' => '',
					't' => 3,
					'c' => '',
				),
				'thz_options' => array(
					'u' => array(
						'type' => 'text',
						'title' => esc_html__('Twitter user', 'creatus'),
					),
					't' => array(
						'type' => 'spinner',
						'title' => esc_html__('# of tweets', 'creatus'),
						'addon' => '#',
					),
					'c' => array(
						'type' => 'spinner',
						'title' => esc_html__('Characters Limit', 'creatus'),
						'addon' => '#',
					),
				)
			),

			'cmx' => _thz_container_metrics_defaults()
		)
	),
	
	
	'api' => array(
		'title'   => __( 'API', 'creatus' ),
		'type'    => 'tab',
		'options' => array(
			'twinf' => array(
				'label' => false,
				'type'  => 'thz-html',
				'html'  => $twinf,
			),	
			'consumer_key' => array(
				'label' => __('Consumer Key', 'creatus'),
				'desc' => esc_html__('Insert Consumer Key. If empty theme Twitter API keys are used if available.', 'creatus'),
				'type' => 'text'
			),
			'consumer_secret' => array(
				'label' => __('Consumer Secret', 'creatus'),
				'desc' => esc_html__('Insert Consumer Secret. If empty theme Twitter API keys are used if available.', 'creatus'),
				'type' => 'text'
			),
			'access_token' => array(
				'label' => __('Access Token', 'creatus'),
				'desc' => esc_html__('Insert Access Token. If empty theme Twitter API keys are used if available.', 'creatus'),
				'type' => 'text'
			),
			'access_token_secret' => array(
				'label' => __('Access Token Secret', 'creatus'),
				'desc' => esc_html__('Insert Access Token Secret. If empty theme Twitter API keys are used if available.', 'creatus'),
				'type' => 'text'
			),
		),
	),
	
	'layouttab' => array(
		'title' => __('Layout & Style', 'creatus'),
		'type' => 'tab',
		'options' => array(
			'bs' => array(
				'type' => 'thz-box-style',
				'label' => __('Container box style', 'creatus'),
				'preview' => false,
				'popup' => true,
				'desc' => esc_html__('Adjust .thz-twitter-feed-holder box style', 'creatus'),
				'button-text' => __('Customize container box style', 'creatus'),
				'disable' => array('layout','boxsize','transform','video'),
				'units' => array(
					'borderradius',
					'boxsize',
					'padding',
					'margin',
				),
				'value' => array()
			),
			'tbs' => array(
				'type' => 'thz-box-style',
				'label' => __('Tweet item box style', 'creatus'),
				'preview' => false,
				'popup' => true,
				'desc' => esc_html__('Adjust .thz-tw-tweet box style', 'creatus'),
				'button-text' => __('Customize tweet item box style', 'creatus'),
				'disable' => array('layout','boxsize','transform','video'),
				'units' => array(
					'borderradius',
					'boxsize',
					'padding',
					'margin',
				),
				'value' => array()
			),
			
			'layout_mode' => array(
				'label' => __('Layout mode', 'creatus'),
				'desc' => esc_html__('Select tweets layout mode', 'creatus'),
				'type' => 'short-select',
				'attr' => array(
					'class' => 'thz-select-switch'
				),
				'value' => 'slider',
				'choices' => array(
					'grid' => array(
						'text' => esc_html__('Grid', 'creatus'),
						'attr' => array(
							'data-enable' => 'grid,animate',
							'data-disable' => '.thz-tab-slider-li'
						)
					),
					'slider' => array(
						'text' => esc_html__('Slider', 'creatus'),
						'attr' => array(
							'data-enable' => '.thz-tab-slider-li',
							'data-disable' => 'grid,animate'
						)
					),
				)
			),
			'grid' => array(
				'type' => 'thz-multi-options',
				'label' => __('Grid settings', 'creatus'),
				'desc' => esc_html__('Adjust grid settings. See help for more info.', 'creatus'),
				'help' => esc_html__('If the .thz-grid-item-in width is less than desired min width, the columns number drops down by one in order to honor the min width setting. On the other hand if the window width is below 980px and grid has more than 2 columns, only 2 columns are shown. Under 767px 1 column is shown.', 'creatus'),
				'value' => array(
					'columns' => 3,
					'gutter' => 30,
					'minwidth' => 220,
					'isotope' => 'packery'
				),
				'thz_options' => array(
					'gutter' => array(
						'type' => 'spinner',
						'title' => esc_html__('Gutter', 'creatus'),
						'addon' => 'px',
						'min' => 0,
						'max' => 200
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
					'minwidth' => array(
						'type' => 'spinner',
						'title' => esc_html__('Item min width', 'creatus'),
						'addon' => 'px',
					),
					'isotope' => array(
						'type' => 'short-select',
						'title' => esc_html__('Isotope mode', 'creatus'),
						'choices' => array(
							'packery' => esc_html__('Packery ( Masonry, place items where they fit )', 'creatus'),
							'fitRows' => esc_html__('fitRows ( Row height by tallest item in row )', 'creatus'),
							'vertical' => esc_html__('Vertical ( best with 1 column grid ) ', 'creatus'),
						)
					),
				)
			),
			'tm' => array(
				'type' => 'thz-multi-options',
				'label' => __('Tweet metrics', 'creatus'),
				'desc' => esc_html__('Adjust tweet metrics', 'creatus'),
				'value' => array(
					'info_side' => 'center',
					'av' => 'i',
					'as' => 60,
					'ash' => 'circle',
					'padding' => 30,
					'ar' => 'show-arrow',
					'ic' => 'color_1',
					'bg' => '#fafafa',
					'bo' => '#eaeaea',
					'bw' => 1,
					'br' => 2,
				),
				'breakafter' => 'ar',
				'thz_options' => array(
					'info_side' => array(
						'type' => 'short-select',
						'title' => esc_html__('Info side', 'creatus'),
						'choices' => array(
							'left' => esc_html__('Left', 'creatus'),
							'center' => esc_html__('Center', 'creatus'),
							'right' => esc_html__('Right', 'creatus')
						)
					),

					'av' => array(
						'type' => 'short-select',
						'title' => esc_html__('Avatar', 'creatus'),
						'attr' => array(
							'class' => 'thz-select-switch'
						),
						'choices' => array(
							'i' => array(
								'text' => esc_html__('Icon', 'creatus'),
								'attr' => array(
									'data-enable' => '.av-size-parent,.ic-color-parent',
									'data-disable' => '.av-shape-parent',
								)
							),
							'u' => array(
								'text' => esc_html__('User avatar', 'creatus'),
								'attr' => array(
									'data-enable' => '.av-size-parent,.av-shape-parent',
									'data-disable' => '.ic-color-parent',
								)
							),
							'n' => array(
								'text' => esc_html__('Do not display', 'creatus'),
								'attr' => array(
									'data-disable' => '.av-size-parent,.ic-color-parent,.av-shape-parent',
								)
							),
						)
					),
					'as' => array(
						'type' => 'spinner',
						'title' => esc_html__('Avatar size', 'creatus'),
						'addon' => 'px',
						'attr' => array(
							'class' => 'av-size'
						),
					),
					'ash' => array(
						'type' => 'short-select',
						'title' => esc_html__('Avatar shape', 'creatus'),
						'choices' => array(
							'square' => esc_html__('Square', 'creatus'),
							'rounded' => esc_html__('Rounded', 'creatus'),
							'circle' => esc_html__('Circle', 'creatus')
						),
						'attr' => array(
							'class' => 'av-shape'
						),
					),

					'ar' => array(
						'type' => 'short-select',
						'title' => esc_html__('Arrow', 'creatus'),
						'choices' => array(
							'show-arrow' => esc_html__('Show', 'creatus'),
							'hide-arrow' => esc_html__('Hide', 'creatus')
						)
					),
					'padding' => array(
						'type' => 'spinner',
						'title' => esc_html__('Padding', 'creatus'),
						'addon' => 'px',
						'min' => 0
					),
					
					'ic' => array(
						'type' => 'color',
						'title' => esc_html__('Icon color', 'creatus'),
						'box' => true,
						'attr' => array(
							'class' => 'ic-color'
						),
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
					),
					'bw' => array(
						'type' => 'spinner',
						'title' => esc_html__('Border width', 'creatus'),
						'addon' => 'px',
						'min' => 0,
						'max' => 5
					),
					'br' => array(
						'type' => 'spinner',
						'title' => esc_html__('Border radius', 'creatus'),
						'addon' => 'px',
						'min' => 0
					),

				)
			),
		)
	),
	
	'slidertab' => array(
		'title' => __('Slider settings', 'creatus'),
		'type' => 'tab',
		'li-attr' => array(
			'class' => 'thz-tab-slider-li'
		),
		'lazy_tabs' => false,
		'options' => array(	

			$slider_settings
		)
	),
	'fontstab' => array(
		'title' => __('Fonts', 'creatus'),
		'type' => 'tab',
		'options' => array(
			'tf' => array(
				'type' => 'thz-typography',
				'label' => __('Tweet font', 'creatus'),
				'desc' => esc_html__('Adjust tweet font.', 'creatus'),
				'value' => array(
					'size' 			=> 22,
				),
				'disable' => array('hovered'),
			),

			'uf' => array(
				'type' => 'thz-typography',
				'label' => __('Username font', 'creatus'),
				'desc' => esc_html__('Adjust username font.', 'creatus'),
				'value' => array(
					'size' 	=> 16,
				),
				'disable' => array('hovered','align'),
			),
			'lf' => array(
				'type' => 'thz-typography',
				'label' => __('Tweet link font', 'creatus'),
				'desc' => esc_html__('Adjust tweet link font ( next to username ) ', 'creatus'),
				'value' => array(
					'size' 	=> 16,
				),
				'disable' => array('hovered','align'),
			)
		)
	),
	
	'testeffects' => array(
		'title' => __('Effects', 'creatus'),
		'type' => 'tab',
		'lazy_tabs' => false,
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
				'addlabel' => esc_html__('Animate tweets', 'creatus'),
				'adddesc' => esc_html__('Add animation to the Twitter feed HTML container', 'creatus')
			),
			'cpx' => _thz_container_parallax_default()
		)
	)
);
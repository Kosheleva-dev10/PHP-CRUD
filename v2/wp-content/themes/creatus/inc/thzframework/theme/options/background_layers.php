<?php
if (!defined('FW')) {
	die('Forbidden');
}

$featured_image = isset($usefeatured) ? $usefeatured : false;

$options = array(
	'bglayersdefaults' => array(
		'title' => __('Defaults', 'creatus'),
		'type' => 'tab',
		'options' => array(
			'id' => array(
				'type' => 'unique',
				'length' => 8
			),
			'layer_title' => array(
				'type' => 'text',
				'label' => __('Title', 'creatus'),
				'value' => 'Layer title',
				'desc' => esc_html__('Used only in option for easy sorting', 'creatus')
			),
			'dimensions' => array(
				'type' => 'multi-picker',
				'label' => false,
				'desc' => false,
				'picker' => array(
					'picked' => array(
						'label' => __('Dimensions', 'creatus'),
						'desc' => esc_html__('Set custom dimensions for this layer.', 'creatus'),
						'help' => esc_html__('By default all layers will take on the width and height of the container. Custom choice will let you set own height, width and absolute position for this layer.', 'creatus'),
						'type' => 'switch',
						'right-choice' => array(
							'value' => 'default',
							'label' => __('Default', 'creatus')
						),
						'left-choice' => array(
							'value' => 'custom',
							'label' => __('Custom', 'creatus')
						),
						'value' => 'default'
					)
				),
				'choices' => array(
					'custom' => array(
						'position' => array(
							'type' => 'thz-multi-options',
							'label' => __('Layer position', 'creatus'),
							'desc' => esc_html__('Set layer absolute position. Z-index is auto set based on layer order.', 'creatus'),
							'value' => array(
								'top' => 0,
								'right' => 0,
								'bottom' => 0,
								'left' => 0
							),
							'thz_options' => array(
								'top' => array(
									'type' => 'spinner',
									'title' => esc_html__('Top', 'creatus'),
									'addon' =>'px',
									'units' => array('px','auto','%','vw','vh'),
								),
								'right' => array(
									'type' => 'spinner',
									'title' => esc_html__('Right', 'creatus'),
									'addon' =>'px',
									'units' => array('px','auto','%','vw','vh'),
								),
								'bottom' => array(
									'type' => 'spinner',
									'title' => esc_html__('Bottom', 'creatus'),
									'addon' =>'px',
									'units' => array('px','auto','%','vw','vh'),
								),
								'left' => array(
									'type' => 'spinner',
									'title' => esc_html__('Left', 'creatus'),
									'addon' =>'px',
									'units' => array('px','auto','%','vw','vh'),
								),
							)
						),
						'bs' => array(
							'type' => 'thz-box-style',
							'label' => __('Layer box style', 'creatus'),
							'desc' => esc_html__('Adjust layer box style', 'creatus'),
							'preview' => true,
							'button-text' => esc_html__('Customize layer box style', 'creatus'),
							'popup' => true,
							'value' => array(),
							'disable' => array('padding','layout','background'),
							'units' => array(
								'borderradius',
								'boxsize' ,
								'margin',
							),
						),						

					)
				)
			),
			'opacity' => array(
				'type' => 'thz-spinner',
				'label' => __('Opacity', 'creatus'),
				'addon' => '%',
				'min' => 0,
				'max' => 100,
				'value' => '100',
				'desc' => esc_html__('Set layer opacity. 0 = transparent, 100 = completely visible.', 'creatus')
			),
			'lre' => _thz_container_metrics_defaults(),
		)
	),
	'bglayersoptions' => array(
		'title' => __('Layer', 'creatus'),
		'type' => 'tab',
		'options' => array(
			'layer_type' => array(
				'type' => 'multi-picker',
				'label' => false,
				'desc' => false,
				'picker' => array(
					'picked' => array(
						'label' => __('Type', 'creatus'),
						'desc' => esc_html__('Select layer type.', 'creatus'),
						'type' => 'select',
						'value' => 'basic',
						'choices' => array(
							'basic' => esc_html__('Basic background layer', 'creatus'),
							'scroll' => esc_html__('Scroll Parallax', 'creatus'),
							'infinity' => esc_html__('Infinity Parallax', 'creatus'),
						)
					)
				),
				'choices' => array(
					'scroll' => array(
						'background' => array(
							'type' => 'thz-background',
							'label' => __('Background', 'creatus'),
							'desc' => esc_html__('Set parallax background. See help for more info.', 'creatus'),
							'help' => esc_html__('Please note that the parallax layer size is bigger ( w + 250px * velocity/100, h + 350px * velocity/100)  than the container size. This adjusmant is required for parallax effect to be accurate and user does not experience missing background patches.', 'creatus'),
							'featured'=> $featured_image,
							'value' => array(),
							'gradient-preview' => true
						),
						'direction' => array(
							'label' => __('Direction', 'creatus'),
							'desc' => esc_html__('Select parallax direction.', 'creatus'),
							'type' => 'short-select',
							'value' => 'up',
							'choices' => array(
								'up' => esc_html__('Up', 'creatus'),
								'down' => esc_html__('Down', 'creatus'),
								'left' => esc_html__('Left', 'creatus'),
								'right' => esc_html__('Right', 'creatus'),
								'fixed' => esc_html__('Fixed', 'creatus')
							)
						),
						'speed' => array(
							'type' => 'thz-spinner',
							'label' => __('Speed', 'creatus'),
							'addon' => 'v',
							'min' => 1,
							'step' => 1,
							'max' => 100,
							'value' => 5,
							'desc' => esc_html__('Set parallax speed. See help for more info.', 'creatus'),
							'help' => sprintf(esc_html__('Note that the higher the velocity the bigger the background image. This is a must in order to cover all edges while parallaxing.%sIf you set custom layer size in Dimensions option, no image stretch is applied. This way you can create fast moving layers.', 'creatus'),'<br />')
						),
						'scale' => array(
							'label' => __('Scale', 'creatus'),
							'desc' => esc_html__('Scale ( zoom in/out ) layer on scroll', 'creatus'),
							'type' => 'short-select',
							'value' => 'no',
							'choices' => array(
								'no' => esc_html__('Do not scale', 'creatus'),
								'up' => esc_html__('Scale up', 'creatus'),
								'down' => esc_html__('Scale down', 'creatus')
							)
						),
						'onmobile' => array(
							'label' => __('Animate on mobile', 'creatus'),
							'desc' => esc_html__('Hide or show parallax animation on mobile devices', 'creatus'),
							'type' => 'switch',
							'right-choice' => array(
								'value' => 0,
								'label' => __('Do not animate', 'creatus')
							),
							'left-choice' => array(
								'value' => 1,
								'label' => __('Animate', 'creatus')
							),
							'value' => 0
						)
					),
					'infinity' => array(
						'background' => array(
							'type' => 'thz-background',
							'label' => __('Background', 'creatus'),
							'desc' => esc_html__('Set parallax background. See help for more info', 'creatus'),
							'help' => esc_html__('For best perfomance use a repeating image.', 'creatus'),
							'disable' => array('video'),
							'featured'=> $featured_image,
							'value' => array(),
							'gradient-preview' => true
						),
						'speed' => array(
							'type' => 'thz-spinner',
							'label' => __('Duration', 'creatus'),
							'addon' => 'v',
							'min' => 10,
							'step' => 1,
							'max' => 500,
							'value' => 70,
							'desc' => esc_html__('Set parallax animation duration. Higher the number the slower the animation', 'creatus')
						),
						'direction' => array(
							'label' => __('Direction', 'creatus'),
							'desc' => esc_html__('Select animation direction.', 'creatus'),
							'type' => 'short-select',
							'value' => 'left',
							'choices' => array(
								'up' => esc_html__('Up', 'creatus'),
								'down' => esc_html__('Down', 'creatus'),
								'left' => esc_html__('Left', 'creatus'),
								'right' => esc_html__('Right', 'creatus')
							)
						),
						'onmobile' => array(
							'label' => __('Parallax on mobile', 'creatus'),
							'desc' => esc_html__('Hide or show parallax animation on mobile devices', 'creatus'),
							'type' => 'switch',
							'right-choice' => array(
								'value' => 0,
								'label' => __('Do not parallax', 'creatus')
							),
							'left-choice' => array(
								'value' => 1,
								'label' => __('Parallax', 'creatus')
							),
							'value' => 0
						)
					),
					'basic' => array(
						'background' => array(
							'type' => 'thz-background',
							'label' => __('Background', 'creatus'),
							'desc' => esc_html__('Set layer background', 'creatus'),
							'value' => array(),
							'gradient-preview' => true,
							'featured'=> $featured_image,
						)
					),
				)
			) // end type
		)
	),
	'bglayerseffects' => array(
		'title' => __('Effects', 'creatus'),
		'type' => 'tab',
		'options' => array(
			'layeranimate' => array(
				'type' => 'thz-animation',
				'label' => false,
				'value' => array(
					'animate' => 'inactive',
					'effect' => 'thz-anim-fadeIn',
					'duration' => 400,
					'delay' => 100
				)
			),
			
			'particles' => array(
				'type' => 'thz-multi-options',
				'label' => __('Particles', 'creatus'),
				'desc' => esc_html__('Add animated particles overlay', 'creatus'),
				'value' => array(
					'm' => 'inactive',
					'c' => '#ffffff',
					'o' => 1,
				),
				'thz_options' => array(
					'm' => array(
						'title' => esc_html__('Mode', 'creatus'),
						'type' => 'short-select',
						'value' => 'show',
						'attr' => array(
							'class' => 'thz-select-switch'
						),
						'choices' => array(
							'inactive' => array(
								'text' => esc_html__('Inactive', 'creatus'),
								'attr' => array(
									'data-disable' => '.paritcles-color-parent,.paritcles-opacity-parent,#fw-backend-option-fw-edit-options-modal-par_up',
								)
							),
							'linked' => array(
								'text' => esc_html__('Linked', 'creatus'),
								'attr' => array(
									'data-enable' => '.paritcles-color-parent,.paritcles-opacity-parent',
									'data-disable' => '#fw-backend-option-fw-edit-options-modal-par_up',
									
								)
							),
							'bubbles' => array(
								'text' => esc_html__('Bubbles', 'creatus'),
								'attr' => array(
									'data-enable' => '.paritcles-color-parent,.paritcles-opacity-parent',
									'data-disable' => '#fw-backend-option-fw-edit-options-modal-par_up',
									
								)
							),
							'polygon' => array(
								'text' => esc_html__('Polygon', 'creatus'),
								'attr' => array(
									'data-enable' => '.paritcles-color-parent,.paritcles-opacity-parent',
									'data-disable' => '#fw-backend-option-fw-edit-options-modal-par_up',
									
								)
							),
							'stars' => array(
								'text' => esc_html__('Stars', 'creatus'),
								'attr' => array(
									'data-enable' => '.paritcles-color-parent,.paritcles-opacity-parent',
									'data-disable' => '#fw-backend-option-fw-edit-options-modal-par_up',
									
								)
							),
							'triangles' => array(
								'text' => esc_html__('Triangles', 'creatus'),
								'attr' => array(
									'data-enable' => '.paritcles-color-parent,.paritcles-opacity-parent',
									'data-disable' => '#fw-backend-option-fw-edit-options-modal-par_up',
									
								)
							),
							'squares' => array(
								'text' => esc_html__('Squares', 'creatus'),
								'attr' => array(
									'data-enable' => '.paritcles-color-parent,.paritcles-opacity-parent',
									'data-disable' => '#fw-backend-option-fw-edit-options-modal-par_up',
									
								)
							),
							'snow' => array(
								'text' => esc_html__('Snow', 'creatus'),
								'attr' => array(
									'data-enable' => '.paritcles-color-parent,.paritcles-opacity-parent',
									'data-disable' => '#fw-backend-option-fw-edit-options-modal-par_up',
									
								)
							),
							'custom' => array(
								'text' => esc_html__('Custom', 'creatus'),
								'attr' => array(
									'data-enable' => '#fw-backend-option-fw-edit-options-modal-par_up',
									'data-disable' => '.paritcles-color-parent,.paritcles-opacity-parent',
									
								)
							),
						)
					),
					'c' => array(
						'type' => 'color',
						'title' => esc_html__('Color', 'creatus'),
						'box' => true,
						'attr' => array(
							'class' => 'paritcles-color'
						),
					),
					'o' => array(
						'type' => 'spinner',
						'title' => esc_html__('Opacity', 'creatus'),
						'attr' => array(
							'class' => 'paritcles-opacity'
						),
						'addon' => 'na',
						'min' => 0,
						'step' => 0.01,
						'max' => 1,
					),
		
				)
			),	

			'par_up' =>array(
				'type'  => 'upload',
				'value' => array(),
				'label' => esc_html__('Custom particles', 'creatus'),
				'files_ext' => array( 'txt'),
				'desc'  => sprintf( esc_html__( 'Download particles file from %1$s. Must be txt file format. See help for more info.', 'creatus' ), '<a href="http://vincentgarreau.com/particles.js" target="_blank">particles.js</a>'),
				'help'  => sprintf( esc_html__( 'Use Particles.js website to adjust the particles the way you need them. Try to keep 60FPS constantly while creating particles otherwise your users might experience page lags.%1$s%1$sAfter you have finished adjusting the particles click on "Download current config json", download the file to your desktop.%1$s%1$sAfter donwload, rename the file extension from json to txt and upload it here.', 'creatus' ), '<br />'),
				'images_only' => false,
				
			)

			
		)
	)
);
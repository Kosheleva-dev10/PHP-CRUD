<?php if ( ! defined( 'FW' ) ) die( 'Forbidden' );

$options = array(

	'preloader' => array(
		'label' => __('Page preloader', 'creatus'),
		'type' => 'short-select',
		'value' => 'disable',
	  	'attr' => array(
			'class' => 'thz-select-switch'
		),
		'choices' => array(
			'enable' => array(
				'text' => esc_html__('Enabled','creatus'),
				'attr' => array(
					'data-enable' =>'pl_mx,pl_style',
				),                  
			),
			
			'disable' => array(
				'text' => esc_html__('Disabled','creatus'),
				'attr' => array(
					'data-disable' =>'pl_mx,pl_style',
				),                  
			),
		),
		'desc' => esc_html__('This option disables/enables page preloader.', 'creatus')
		
	),	
	
	'pl_mx' => array(
		'type' => 'thz-multi-options',
		'label' => __('Preloader metrics', 'creatus'),
		'desc' => esc_html__('Adjust preloader metrics. 1000ms = 1s. On click activates preloader on link click.', 'creatus'),
		'value' => array(
			'delay' => 800,
			'effect' => 'fade',
			'text' => 'hide',
			'onclick' => 'inactive',
			'bg' => '#ffffff',
			'co' => 'color_1',
		),
		'thz_options' => array(
			'delay' => array(
				'type' => 'spinner',
				'title' => esc_html__('Delay', 'creatus'),
				'addon' => 'ms',
				'min' => 0,
				'step' => 50
			),
			'effect' => array(
				'type' => 'short-select',
				'title' => esc_html__('Effect', 'creatus'),
				'choices' => array(
					'up' =>__('Go up', 'creatus'),
					'down' =>__('Go down', 'creatus'),
					'left' =>__('Go left', 'creatus'),
					'right' =>__('Go right', 'creatus'),
					'curtain' =>__('Curtain', 'creatus'),
					'fade' =>__('Fade out', 'creatus')
				)
			),
			'onclick' => array(
				'type' => 'short-select',
				'title' => esc_html__('On click', 'creatus'),
				'choices' => array(
					'inactive' =>__('Inactive', 'creatus'),
					'active' =>__('Active', 'creatus'),
				)
			),
			'text' => array(
				'type' => 'short-select',
				'title' => esc_html__('Loading text', 'creatus'),
				'choices' => array(
					'show' =>__('Show', 'creatus'),
					'hide' =>__('Hide', 'creatus'),
				)
			),
			'bg' => array(
				'type' => 'color',
				'title' => esc_html__('Background', 'creatus'),
				'box' => true
			),			
			'co' => array(
				'type' => 'color',
				'title' => esc_html__('Preloader', 'creatus'),
				'box' => true
			),

		)
	),	
		
	'pl_style' => array(
		'label' => __('Preloader style', 'creatus'),
		'type' => 'image-picker',
		'value' => 6,
		'desc' => esc_html__('Select desired preloader style', 'creatus'),
		'choices' => array(
			1 => array(
				'small' => array(
					'height' => 40,
					'src' => thz_theme_file_uri( '/inc/thzframework/admin/images/loader1.jpg')
				),
				'large' => thz_theme_file_uri( '/inc/thzframework/admin/images/loader1.jpg'),
			),
			2 => array(
				'small' => array(
					'height' => 40,
					'src' => thz_theme_file_uri( '/inc/thzframework/admin/images/loader2.jpg')
				),
				'large' => thz_theme_file_uri( '/inc/thzframework/admin/images/loader2.jpg'),
			),
			3 => array(
				'small' => array(
					'height' => 40,
					'src' => thz_theme_file_uri( '/inc/thzframework/admin/images/loader3.jpg')
				),
				'large' => thz_theme_file_uri( '/inc/thzframework/admin/images/loader3.jpg'),
			),
			4 => array(
				'small' => array(
					'height' => 40,
					'src' => thz_theme_file_uri( '/inc/thzframework/admin/images/loader4.jpg')
				),
				'large' => thz_theme_file_uri( '/inc/thzframework/admin/images/loader4.jpg'),
			),
			5 => array(
				'small' => array(
					'height' => 40,
					'src' => thz_theme_file_uri( '/inc/thzframework/admin/images/loader5.jpg')
				),
				'large' => thz_theme_file_uri( '/inc/thzframework/admin/images/loader5.jpg'),
			),
			6 => array(
				'small' => array(
					'height' => 40,
					'src' => thz_theme_file_uri( '/inc/thzframework/admin/images/loader6.jpg')
				),
				'large' => thz_theme_file_uri( '/inc/thzframework/admin/images/loader6.jpg'),
			),
			
			7 => array(
				'small' => array(
					'height' => 40,
					'src' => thz_theme_file_uri( '/inc/thzframework/admin/images/loader7.jpg')
				),
				'large' => thz_theme_file_uri( '/inc/thzframework/admin/images/loader7.jpg'),
			),
			8 => array(
				'small' => array(
					'height' => 40,
					'src' => thz_theme_file_uri( '/inc/thzframework/admin/images/loader8.jpg')
				),
				'large' => thz_theme_file_uri( '/inc/thzframework/admin/images/loader8.jpg'),
			),
			9 => array(
				'small' => array(
					'height' => 40,
					'src' => thz_theme_file_uri( '/inc/thzframework/admin/images/loader9.jpg')
				),
				'large' => thz_theme_file_uri( '/inc/thzframework/admin/images/loader9.jpg'),
			),
		),												
	),
	
	
);
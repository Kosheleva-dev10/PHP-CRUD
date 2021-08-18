<?php
if (!defined('ABSPATH')) {
	die('Direct access forbidden.');
}
$options = array(
	'cs' => array(
		'type' => 'popup',
		'size' => 'large',
		'label' => __('Consent settings', 'creatus'),
		'desc' => esc_html__('Customize consent content and style', 'creatus'),
		'button' => esc_html__('Customize consent', 'creatus'),
		'popup-title' => esc_html__('Cookies consent settings', 'creatus'),
		'popup-options' => array(
			'defaultsettings' => array(
				'title'   => __( 'Defaults', 'creatus' ),
				'type'    => 'tab',
				'options' => array(
					'bs' => array(
						'type' => 'thz-box-style',
						'label' => __('Consent box style', 'creatus'),
						'preview' => true,
						'button-text' => esc_html__('Customize consent box style', 'creatus'),
						'desc' => esc_html__('Adjust #thz_cookies_consent box style', 'creatus'),
						'popup' => true,
						'disable' => array('video'),
						'value' => array(
							'layout' => array(
								'position' => 'fixed',
								'top' => 'auto',
								'right' => '0px',
								'bottom' => '0px',
								'left' =>'0px',
								'z-index' => 5001,
							),						
						)
					),
					'cbs' => array(
						'type' => 'thz-box-style',
						'label' => __('Container box style', 'creatus'),
						'preview' => true,
						'button-text' => esc_html__('Customize container box style', 'creatus'),
						'desc' => esc_html__('Adjust .thz-consent-container box style', 'creatus'),
						'popup' => true,
						'disable' => array('video'),
						'value' => array(
							'layout' => array(
								'display' => 'table',
							),						
							'padding' => array(
								'top' => 15,
								'right' => 30,
								'bottom' => 15,
								'left' => 30
							),
							'boxsize' => array(
								'width' => '100%',
							),
							'background' => array(
								'type' => 'color',
								'color' => '#2c2e30',
							)
						)
					),	
					'font' => array(
						'label' => __('Consent font', 'creatus'),
						'type' => 'thz-typography',
						'value' => array(
							'color' => '#ffffff'
						),
						'disable' => array('hovered'),
						'desc' => esc_html__('Consent font metrics', 'creatus')
					),
					
					'colors' => array(
						'type' => 'thz-multi-options',
						'label' => __('Link colors', 'creatus'),
						'desc' => esc_html__('Adjust link colors', 'creatus'),
						'value' => array(
							'lc' => 'rgba(255,255,255,0.58)',
							'lh' => '#ffffff'
						),
						'thz_options' => array(
							'lc' => array(
								'type' => 'color',
								'title' => esc_html__('Link', 'creatus'),
								'box' => true
							),
							'lh' => array(
								'type' => 'color',
								'title' => esc_html__('Link hovered', 'creatus'),
								'box' => true
							)
						)
					),
					
					'a' => array(
						'type' => 'thz-animation',
						'label' => false,
						'value' => array(
							'animate' => 'active',
							'effect' => 'thz-anim-slideIn-up',
							'duration' => 400,
							'delay' => 800
						),
						'addlabel' => esc_html__('Animate consent', 'creatus'),
						'adddesc' => esc_html__('Add animation to the consent container', 'creatus')
					),
				),
			),	
			
			'textsettings' => array(
				'title'   => __( 'Text', 'creatus' ),
				'type'    => 'tab',
				'options' => array(
					'text' => array(
						'type' => 'wp-editor',
						'size' => 'large',
						'editor_height' => 200,
						'editor_type' => 'tinymce',
						'wpautop' => true,
						'shortcodes' => false,
						'value' => 'Add your cookies consent text here.',
						'label' => __('Consent text', 'creatus'),
						'desc' => __('Add consent text', 'creatus')
					),	
				),
			),	
			
			'buttonsettings' => array(
				'title'   => __( 'Button', 'creatus' ),
				'type'    => 'tab',
				'options' => array(
					'button' => array(
						'type' => 'thz-button',
						'value' => array(
							'activeColor' => 'green',
							'buttonText' => 'I Accept',
							'buttonType' => 'flat',
							'borderWidth' => 0,
							'html' => '<div class="thz-btn-container thz-btn-flat"><a class="thz-button thz-btn-green thz-btn-normal thz-radius-4 thz-align-center" href="#"><span class="thz-btn-text thz-fs-14 thz-fw-400">I Accept</span></a></div>'
						),
						'label' => false,
						'hidelinks' => true
					)	
				),
			),		
		)
	)
);
<?php if ( ! defined( 'FW' ) ) die( 'Forbidden' );

$options = array(

	'overlayoptionstab' => array(
		'title' => __('Media overlay', 'creatus'),
		'type' => 'tab',
		'lazy_tabs'=> false,
		'options' => array(
			fw()->theme->get_options('overlay_settings'),
			'co' => array(
				'type' => 'addable-popup',
				'value' => array(),
				'label' => __('Custom overlays', 'creatus'),
				'desc'  => esc_html__('Add custom overlays for specific medias or leave as is and use above settings as defaults.', 'creatus'),
				'template' => '{{= e }}',
				'popup-title' => null,
				'size' => 'large', 
				'limit' => 20,
				'add-button-text' => esc_html__('Add custom overlays options', 'creatus'),
				'sortable' => true,
				'popup-options' => array(
					fw()->theme->get_options('custom_overlay_settings'),
				),
			),
		)
	),
	
	'lightboxoptionstab' => array(
		'title' => __('Lightbox', 'creatus'),
		'type' => 'tab',
		'lazy_tabs'=> false,
		'options' => array(
			fw()->theme->get_options('lightbox_settings')
		)
	),
	
	'paginationoptionstab' => array(
		'title' => __('Navigations', 'creatus'),
		'type' => 'tab',
		'lazy_tabs'=> false,
		'options' => array(
			fw()->theme->get_options('navs_settings')
		)
	),
	
	'siteofflineoptionstab' => array(
		'title'   => __( 'Site offline', 'creatus' ),
		'type'    => 'tab',
		'lazy_tabs'=> false,
		'options' => array(
			fw()->theme->get_options( 'site_offline_settings' ),
		),
	),
		
	'miscoptionstab' => array(
		'title'   => __( 'Miscellaneous', 'creatus' ),
		'type'    => 'tab',
		'lazy_tabs'=> false,
		'options' => array(
			fw()->theme->get_options( 'misc_settings' ),
		),
	),
);
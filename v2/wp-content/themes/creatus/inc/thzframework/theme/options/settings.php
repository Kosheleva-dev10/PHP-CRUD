<?php if ( ! defined( 'FW' ) ) die( 'Forbidden' );


$thz_bb_tab 	= array();
$thz_woo_tab 	= array();	
	
if ( class_exists( 'WooCommerce' ) ) {
	$thz_woo_tab = fw()->theme->get_options( 'woo_tab' );
}
if ( class_exists( 'bbPress' ) || class_exists( 'BuddyPress' )  ) {
	$thz_bb_tab = fw()->theme->get_options( 'bb_tab' );
}

$page_title_settings = fw()->theme->get_options( 'page_title_settings');

unset($page_title_settings['pagetitlesubtitle']);


$options = array(

	'sitetab' => array(
		'title'   => __( 'Site', 'creatus' ),
		'type'    => 'thz-side-tab',
		'lazy_tabs'=> false,
		'li-attr' => array('class' => 'thz-admin-li thz-admin-li-site'),
		'options' => array(
			'site_subbox' => array(
				'title'   => __( 'Site options', 'creatus' ),
				'type'    => 'box',
				'options' => array(
					fw()->theme->get_options( 'site_settings')
				),
			),
		),
	),


	'headertab' => array(
		'title'   => __( 'Header', 'creatus' ),
		'type'    => 'thz-side-tab',
		'lazy_tabs'=> false,
		'li-attr' => array('class' => 'thz-admin-li thz-admin-li-header'),
		'options' => array(
			'header_subbox' => array(
				'title'   => __( 'Header options', 'creatus' ),
				'type'    => 'box',
				'options' => array(
					fw()->theme->get_options( 'header_settings' ),
				),
			),
		),
	),
	

	'logotab' => array(
		'title'   => __( 'Logo', 'creatus' ),
		'type'    => 'thz-side-tab',
		'li-attr' => array('class' => 'thz-admin-li thz-admin-li-logo'),
		'options' => array(
			'logo_subbox' => array(
				'title'   => __( 'Logo options', 'creatus' ),
				'type'    => 'box',
				'options' => array(
					fw()->theme->get_options( 'logo_settings' ),
				),
			),
		),
	),
		
	'mainmenutab' => array(
		'title'   => __( 'Main menu', 'creatus' ),
		'type'    => 'thz-side-tab',
		'lazy_tabs'=> false,
		'li-attr' => array('class' => 'thz-admin-li thz-admin-li-menu'),
		'options' => array(
			'mainmenu_subbox' => array(
				'title'   => __( 'Main menu options', 'creatus' ),
				'type'    => 'box',
				'options' => array(
					fw()->theme->get_options( 'mainmenu_settings')
				),
			),
		),
	),	
	
	'herostab' => array(
		'title'   => __( 'Hero sections', 'creatus' ),
		'type'    => 'thz-side-tab',
		'li-attr' => array('class' => 'thz-admin-li thz-admin-li-heros'),
		'options' => array(
			'heros_subbox' => array(
				'title'   => __( 'Hero sections options', 'creatus' ),
				'type'    => 'box',
				'options' => array(
					fw()->theme->get_options( 'heros_settings' ),
				),
			),
		),
	),	
	
	
	'pagetitletab' => array(
		'title'   => __( 'Page title', 'creatus' ),
		'type'    => 'thz-side-tab',
		'li-attr' => array('class' => 'thz-admin-li thz-admin-li-pagetitle'),
		'options' => array(
			'pagetitle_subbox' => array(
				'title'   => __( 'Page title section options', 'creatus' ),
				'type'    => 'box',
				'options' => array(
					$page_title_settings	
				),
			),
		),
	),	

	'poststab' => array(
		'title'   => __( 'Posts', 'creatus' ),
		'type'    => 'thz-side-tab',
		'li-attr' => array('class' => 'thz-admin-li thz-admin-li-posts'),
		'options' => array(
			'posts_subbox' => array(
				'title'   => __( 'Posts options', 'creatus' ),
				'type'    => 'box',
				'options' => array(
					fw()->theme->get_options( 'posts_settings' ),
				),
			),
		),
	),
	
	'footertab' => array(
		'title'   => __( 'Footer', 'creatus' ),
		'type'    => 'thz-side-tab',
		'li-attr' => array('class' => 'thz-admin-li thz-admin-li-footer'),
		'options' => array(
			'footer_subbox' => array(
				'title'   => __( 'Footer options', 'creatus' ),
				'type'    => 'box',
				'options' => array(
					fw()->theme->get_options( 'footer_settings' ),
				),
			),
		),
	),
	
	'pagetemplatestab' => array(
		'title'   => __( 'Page templates', 'creatus' ),
		'type'    => 'thz-side-tab',
		'li-attr' => array('class' => 'thz-admin-li thz-admin-li-pagetemplates'),
		'options' => array(
			'posts_subbox' => array(
				'title'   => __( 'Page templates options', 'creatus' ),
				'type'    => 'box',
				'options' => array(
					fw()->theme->get_options( 'page_templates_settings' ),
				),
			),
		),
	),

	
	'widgetsgeneratortab' => array(
		'title'   => __( 'Widgets generator', 'creatus' ),
		'type'    => 'thz-side-tab',
		'li-attr' => array('class' => 'thz-admin-li thz-admin-li-widgets'),
		'options' => array(
			'widgets_subbox' => array(
				'title'   => __( 'Widgets area sections generator', 'creatus' ),
				'type'    => 'box',
				'options' => array(
					fw()->theme->get_options( 'widgetsgenerator' ),
				),
			),
		),
	),	
		
	'socialstab' => array(
		'title'   => __( 'Socials', 'creatus' ),
		'type'    => 'thz-side-tab',
		'li-attr' => array('class' => 'thz-admin-li thz-admin-li-socials'),
		'options' => array(
			'socials_subbox' => array(
				'title'   => __( 'Socials links options', 'creatus' ),
				'type'    => 'box',
				'options' => array(
					fw()->theme->get_options( 'socials_settings' ),
				),
			),
		),
	),

	$thz_woo_tab,
		
	$thz_bb_tab,

	'customcsstab' => array(
		'title'   => __( 'Custom CSS', 'creatus' ),
		'type'    => 'thz-side-tab',
		'li-attr' => array('class' => 'thz-admin-li thz-admin-li-customcss'),
		'options' => array(
			'woocommerce_subbox' => array(
				'title'   => __( 'Custom CSS options', 'creatus' ),
				'type'    => 'box',
				'options' => array(
					fw()->theme->get_options( 'custom_css_settings' ),
				),
			),
		),
	),		
	
	'codetab' => array(
		'title'   => __( 'Code', 'creatus' ),
		'type'    => 'thz-side-tab',
		'li-attr' => array('class' => 'thz-admin-li thz-admin-li-code'),
		'options' => array(
			'code_subbox' => array(
				'title'   => __( 'Code options', 'creatus' ),
				'type'    => 'box',
				'options' => array(
					fw()->theme->get_options( 'code_settings' ),
				),
			),
		),
	),

		
	'additionaltab' => array(
		'title'   => __( 'Additional', 'creatus' ),
		'type'    => 'thz-side-tab',
		'li-attr' => array('class' => 'thz-admin-li thz-admin-li-additional'),
		'options' => array(
			'advanced_subbox' => array(
				'title'   => __( 'Additional options', 'creatus' ),
				'type'    => 'box',
				'options' => array(
					fw()->theme->get_options( 'additional_settings' ),
				),
			),
		),
	),	
	
		
	'advanced' => array(
		'title'   => __( 'Advanced', 'creatus' ),
		'type'    => 'thz-side-tab',
		'li-attr' => array('class' => 'thz-admin-li thz-admin-li-advanced'),
		'options' => array(
			'advanced_subbox' => array(
				'title'   => __( 'Advanced options', 'creatus' ),
				'type'    => 'box',
				'options' => array(
					fw()->theme->get_options( 'advanced_settings' ),
				),
			),
		),
	),
	
	'exportimport' => array(
		'title'   => __( 'Export/import', 'creatus' ),
		'type'    => 'thz-side-tab',
		'li-attr' => array('class' => 'thz-admin-li thz-admin-li-exportimport'),
		'options' => array(
			'exportimport_subbox' => array(
				'title'   => __( 'Export/Import Theme Settings', 'creatus' ),
				'type'    => 'box',
				'options' => array(
					'presets' => array(
						'label' => false,
						'type' => 'thz-export-import',
						'value' => 'starter',
						'fw-storage' => array(
							'type' => 'wp-option',
							'wp-option' => 'thz_default_preset',
						),
					),
				),
			),
		),
	),
);
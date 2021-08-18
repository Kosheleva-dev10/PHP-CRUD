<?php if ( ! defined( 'FW' ) ) die( 'Forbidden' );


$usefeatured = isset($usefeatured) ? $usefeatured : false;

$footer_template = 'Custom footer options are active and display mode is:<br />';
$footer_template .= '{{  if(footer_mx.m == "both" ){ }}';
$footer_template .= '<strong>Footer and widgets sections</strong>';
$footer_template .= '{{ } }}';
$footer_template .= '{{  if(footer_mx.m == "footer" ){ }}';
$footer_template .= '<strong>Only footer</strong>';
$footer_template .= '{{ } }}';
$footer_template .= '{{  if(footer_mx.m == "widgets" ){ }}';
$footer_template .= '<strong>Only widgets sections</strong>';
$footer_template .= '{{ } }}';
$footer_template .= '{{  if(footer_mx.m == "hidden" ){ }}';
$footer_template .= '<strong>Hidden</strong>';
$footer_template .= '{{ } }}';
$footer_template .= '{{  if(footer_mx.m == "block" ){ }}';
$footer_template .= '<strong>Block</strong>';
$footer_template .= '{{ } }}';
$footer_template .= '</strong>';

$options = array(

	'page_menu' => array(
		'type'  => 'multi-select',
		'value' => array(),
		'label' => __('Main navigation menu', 'creatus'),
		'desc'  => esc_html__('Select different navigation menu for this page. Leave empty for default Top menu', 'creatus'),
		'population' => 'taxonomy',
		'source' => 'nav_menu',
		'limit' => 1,
	),
	
	'secondary_menu' => array(
		'type'  => 'multi-select',
		'value' => array(),
		'label' => __('Secondary navigation menu', 'creatus'),
		'desc'  => esc_html__('Select different secondary menu for this page. Leave empty for default Secondary menu', 'creatus'),
		'population' => 'taxonomy',
		'source' => 'nav_menu',
		'limit' => 1,
	),

	'custom_site_options' => array(
		'type' => 'addable-popup',
		'value' => array(),
		'label' => __('Custom site options', 'creatus'),
		'desc'  => esc_html__('Add custom site options for this page or leave as is for theme defaults.', 'creatus'),
		'template' => esc_html__('Custom site options for this page','creatus'),
		'popup-title' => null,
		'size' => 'large', 
		'limit' => 1,
		'attr' => array(
			'class' => 'custom_options_popup'
		),
		'add-button-text' => esc_html__('Add custom site options', 'creatus'),
		'sortable' => false,
		'popup-options' => array(
			fw()->theme->get_options( 'posts/page_options_site')
		),
	),
	
	'custom_layout_options' => array(
		'type' => 'addable-popup',
		'value' => array(),
		'label' => __('Custom content layout', 'creatus'),
		'desc'  => esc_html__('Add custom content layout for this page or leave as is for theme defaults.', 'creatus'),
		'template' => esc_html__('Custom content layout for this page','creatus'),
		'popup-title' => null,
		'size' => 'medium', 
		'limit' => 1,
		'attr' => array(
			'class' => 'custom_options_popup'
		),
		'add-button-text' => esc_html__('Add custom content layout', 'creatus'),
		'sortable' => false,
		'popup-options' => array(
			'l' => array(
				'type'  => 'thz-page-content-layout',
				'value' => array(
					'layout'=>'full',
					'leftblock'=> 0,
					'contentblock'=>100,
					'rightblock'=> 0,
				),
				'label' => __('Content layout', 'creatus'),
				'desc' => false,
			)			
		),
	),
	
	'custom_header_options' => array(
		'type' => 'addable-popup',
		'value' => array(),
		'label' => __('Custom header options', 'creatus'),
		'desc'  => esc_html__('Add custom header options for this page or leave as is for theme defaults.', 'creatus'),
		'template' => esc_html__('Custom header options for this page','creatus'),
		'popup-title' => null,
		'size' => 'large', 
		'limit' => 1,
		'attr' => array(
			'class' => 'custom_options_popup'
		),
		'add-button-text' => esc_html__('Add custom header options', 'creatus'),
		'sortable' => false,
		'popup-options' => array(
			fw()->theme->get_options( 'posts/page_options_header')
		),
	),	
	
				
	'custom_logo' => array(
		'type' => 'addable-popup',
		'value' => array(),
		'label' => __('Custom logo options', 'creatus'),
		'desc'  => esc_html__('Add custom logo options for this page or leave as is for theme defaults.', 'creatus'),
		'template' => esc_html__('Custom logo options for this page','creatus'),
		'popup-title' => null,
		'size' => 'large', 
		'limit' => 1,
		'attr' => array(
			'class' => 'custom_options_popup'
		),
		'add-button-text' => esc_html__('Add custom logo options', 'creatus'),
		'sortable' => false,
		'popup-options' => array(
			'site_logo' => array(
				'label' => false,
				'type' => 'thz-logo',
				'value' => fw_get_db_settings_option('site_logo',null),
			),
		),
	),
	

	'custom_mainmenu_options' => array(
		'type' => 'addable-popup',
		'value' => array(),
		'label' => __('Custom main menu options', 'creatus'),
		'desc'  => esc_html__('Add custom main menu options for this page or leave as is for theme defaults.', 'creatus'),
		'template' => esc_html__('Custom main menu options for this page','creatus'),
		'popup-title' => null,
		'size' => 'large', 
		'limit' => 1,
		'attr' => array(
			'class' => 'custom_options_popup'
		),
		'add-button-text' => esc_html__('Add custom main menu options', 'creatus'),
		'sortable' => false,
		'popup-options' => array(
			fw()->theme->get_options( 'posts/page_options_mainmenu')
		),
	),				
	

	'hero' => array(
		'type' => 'addable-popup',
		'value' => array(),
		'label' => __('Custom hero section', 'creatus'),
		'desc'  => esc_html__('Add custom hero section to this page or leave as is for theme defaults.', 'creatus'),
		'template' => 'Hero section is: <strong>{{= disable}}</strong>',
		'popup-title' => null,
		'size' => 'large', 
		'limit' => 1,
		'attr' => array(
			'class' => 'custom_options_popup'
		),
		'add-button-text' => esc_html__('Add custom hero section options', 'creatus'),
		'sortable' => false,
		'popup-options' => array(
			fw()->theme->get_options( 'hero_options',array('usefeatured' => $usefeatured,'pageoptions' => true))
		),
	),
	
		
	'custom_pagetitle_options' => array(
		'type' => 'addable-popup',
		'value' => array(),
		'label' => __('Custom page title options', 'creatus'),
		'desc'  => esc_html__('Add custom page title options for this page or leave as is for theme defaults.', 'creatus'),
		'template' => 'Page title mode is: <strong>{{= page_title_metrics.mode}}</strong>',
		'popup-title' => null,
		'size' => 'large', 
		'limit' => 1,
		'attr' => array(
			'class' => 'custom_options_popup'
		),
		'add-button-text' => esc_html__('Add custom page title options', 'creatus'),
		'sortable' => false,
		'popup-options' => array(
			fw()->theme->get_options( 'posts/page_options_page_title')
		),
	),
	
				
	'custom_footer_options' => array(
		'type' => 'addable-popup',
		'value' => array(),
		'label' => __('Custom footer options', 'creatus'),
		'desc'  => esc_html__('Add custom footer options for this page or leave as is for theme defaults.', 'creatus'),
		'template' => $footer_template,
		'popup-title' => null,
		'size' => 'large', 
		'limit' => 1,
		'attr' => array(
			'class' => 'custom_options_popup'
		),
		'add-button-text' => esc_html__('Add custom footer options', 'creatus'),
		'sortable' => false,
		'popup-options' => array(
			fw()->theme->get_options( 'posts/page_options_footer')
		),
	),
	
	
	'thzpt' => array(
		'type'  => 'thz-page-templates',
		'label' => __( 'Custom page templates', 'creatus' ),
		'desc'  => esc_html__('Save current page options as template or click on available template to preload options.', 'creatus'),
		'help'  => esc_html__('Note that this option only saves custom page options located in this options tab, selected page template and or custom CSS set for this page. Main navigation menu and or category image is not saved.', 'creatus'),
	),			
				
);
<?php if ( ! defined( 'FW' ) ) die( 'Forbidden' );


$options = array(
	
	'custom_css' => array(
		'type' => 'thz-ace',
		'label' => __('Custom CSS', 'creatus'),
		'desc' => esc_html__('Insert your CSS code in the field below. Do not use any HTML tags.This CSS is loaded last after all CSS files and gives you the option to override every theme CSS property. If you need to override certain CSS selector add #thz-wrapper before selector to avoid the use of !important rule.', 'creatus'),
		'value'=>'',
		'mode'=>'css',
		'theme'=>'chrome',
		'height'=>450
		
	),	
);
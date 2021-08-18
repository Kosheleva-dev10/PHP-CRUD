<?php if (!defined('FW')) die('Forbidden');

$cfg = array();

$title_template = '{{-title}}<br />';
$title_template .= '<br /><strong>Container size: </strong> {{= o.l[\'c~s\'] }}';
$title_template .= '{{ var layers = Object.keys(o.l).length -1 ; if( layers > 0 ){ }}';	
$title_template .= '<br /><strong>Number of layers: </strong> {{= layers }}';	
$title_template .= '{{ } }}';

$cfg['page_builder'] = array(
	'disable_correction' => true,
	'title'         => esc_html__('Image Layers', 'creatus'),
	'description'   => esc_html__('Add Image layers', 'creatus'),
	'tab'           => esc_html__('Media Elements', 'creatus'),
	'popup_size'  	=> 'large',
	'title_template' => $title_template,
	'icon' => 'thzadmin thzadmin-shortcode_image_layers',
	'popup_header_elements' => '<a class="thz-docs-link" target="_blank" href="https://themezly.com/docs/image-layers/">'.__(' Visit Docs', 'creatus').' <span class="thz-docs-info thzicon thzicon-link-external"></span></a>',
);
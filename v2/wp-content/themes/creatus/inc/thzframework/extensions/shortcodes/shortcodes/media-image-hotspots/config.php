<?php if (!defined('FW')) die('Forbidden');

$cfg = array();

$title_template = '{{-title}}<br />';
$title_template .= '<br /><strong>Hotspots size: </strong> {{= o.mx.size }}';

$title_template .= '{{ if (o.mx.size =="small") { }}';
$title_template .= '<br /><strong>Display mark: </strong> none';
$title_template .= '{{ }else{ }}';
$title_template .= '<br /><strong>Display mark: </strong> {{= o.mx.mark}}';
$title_template .= '{{ } }}';

$title_template .= '<br /><strong>Halo animation: </strong> {{= o.mx.anim }}';


$cfg['page_builder'] = array(
	'disable_correction' => true,
	'title'         => esc_html__('Image Hotspots', 'creatus'),
	'description'   => esc_html__('Add an Image with hotspots', 'creatus'),
	'tab'           => esc_html__('Media Elements', 'creatus'),
	'popup_size'  	=> 'large',
	'title_template' => $title_template,
	'icon' => 'thzadmin thzadmin-shortcode_image_hotspots',
	'popup_header_elements' => '<a class="thz-docs-link" target="_blank" href="https://themezly.com/docs/image-hotspots/">'.__(' Visit Docs', 'creatus').' <span class="thz-docs-info thzicon thzicon-link-external"></span></a>',
);
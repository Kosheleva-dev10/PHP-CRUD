<?php if (!defined('FW')) die('Forbidden');

$cfg = array();
$title_template = '{{-title}}<br />';
$title_template .= '<br /><strong>Type: </strong> {{= o.type }}';
$cfg['page_builder'] = array(
	'disable_correction' => true,
	'title'         => esc_html__('Sections menu', 'creatus'),
	'description'   => esc_html__('Add a Sections menu', 'creatus'),
	'tab'           => esc_html__('Content Elements', 'creatus'),
	'popup_size'    => 'large',
	'icon' => 'thzadmin thzadmin-shortcode_sections_menu',
	'popup_header_elements' => '<a class="thz-docs-link" target="_blank" href="https://themezly.com/docs/sections-menu/">'.__(' Visit Docs', 'creatus').' <span class="thz-docs-info thzicon thzicon-link-external"></span></a>',
);
<?php if (!defined('FW')) die('Forbidden');

$cfg = array();

$cfg['page_builder'] = array(
	'disable_correction' => true,
	'title'         => esc_html__('Parse page', 'creatus'),
	'description'   => esc_html__('Add external page content', 'creatus'),
	'tab'           => esc_html__('Content Elements', 'creatus'),
	'popup_size'    => 'large',
	'icon' => 'thzadmin thzadmin-shortcode_parse_page',
	'popup_header_elements' => '<a class="thz-docs-link" target="_blank" href="https://themezly.com/docs/parse-page/">'.__(' Visit Docs', 'creatus').' <span class="thz-docs-info thzicon thzicon-link-external"></span></a>',
);
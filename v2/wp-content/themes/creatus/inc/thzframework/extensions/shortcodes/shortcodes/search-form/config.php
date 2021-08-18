<?php if (!defined('FW')) die('Forbidden');

$cfg = array();

$cfg['page_builder'] = array(
	'disable_correction' => true,
	'title'         => esc_html__('Search form', 'creatus'),
	'description'   => esc_html__('Add a Search form', 'creatus'),
	'tab'           => esc_html__('Content Elements', 'creatus'),
	'popup_size'    => 'large',
	'icon' => 'thzadmin thzadmin-shortcode_search_form',
	'popup_header_elements' => '<a class="thz-docs-link" target="_blank" href="https://themezly.com/docs/search-form/">'.__(' Visit Docs', 'creatus').' <span class="thz-docs-info thzicon thzicon-link-external"></span></a>',
);
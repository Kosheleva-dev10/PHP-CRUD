<?php if (!defined('FW')) die('Forbidden');

$cfg = array();
$title_template = '{{-title}}<br />';
$title_template .= '<br /><strong>Type: </strong> {{= o.type }}';
$cfg['page_builder'] = array(
	'disable_correction' => true,
	'title'         => esc_html__('Dot navigation', 'creatus'),
	'description'   => esc_html__('Add a Dot navigation', 'creatus'),
	'tab'           => esc_html__('Content Elements', 'creatus'),
	'popup_size'    => 'large',
	'icon' => 'thzadmin thzadmin-shortcode_dot_navigation',
	'popup_header_elements' => '<a class="thz-docs-link" target="_blank" href="https://themezly.com/docs/dot-navigation/">'.__(' Visit Docs', 'creatus').' <span class="thz-docs-info thzicon thzicon-link-external"></span></a>',
);
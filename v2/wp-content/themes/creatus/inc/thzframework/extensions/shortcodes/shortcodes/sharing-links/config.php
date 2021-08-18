<?php if (!defined('FW')) die('Forbidden');

$cfg = array();

$title_template = '{{-title}}<br />';
$title_template .= '<br /><strong>Links: </strong> {{= o.sharing_links }}';
$title_template .= '<br /><strong>Layout: </strong> {{= o.layout }}';
$title_template .= '<br /><strong>Sharing label: </strong> {{= o.sl.picked }}';

$cfg['page_builder'] = array(
	'disable_correction' => true,
	'title'         => esc_html__('Sharing links', 'creatus'),
	'description'   => esc_html__('Add Sharing Links', 'creatus'),
	'tab'           => esc_html__('Content Elements', 'creatus'),
	'popup_size'    => 'large',
	'title_template' => $title_template,
	'icon' => 'thzadmin thzadmin-shortcode_sharing_links',
	'popup_header_elements' => '<a class="thz-docs-link" target="_blank" href="https://themezly.com/docs/sharing-links/">'.__(' Visit Docs', 'creatus').' <span class="thz-docs-info thzicon thzicon-link-external"></span></a>',
);
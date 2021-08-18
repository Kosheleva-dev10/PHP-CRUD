<?php if (!defined('FW')) die('Forbidden');

$cfg = array();

$title_template = '{{-title}}<br />';
$title_template .= '<br /><strong>Orientation: </strong> {{= o.mx.orientation }}';
$title_template .= '<br /><strong>Handle position: </strong> {{= o.mx.percent }}%';

$cfg['page_builder'] = array(
	'disable_correction' => true,
	'title'         => esc_html__('Before after', 'creatus'),
	'description'   => esc_html__('Add Before & After images', 'creatus'),
	'tab'           => esc_html__('Media Elements', 'creatus'),
	'popup_size'  	=> 'large',
	'title_template' => $title_template,
	'icon' => 'thzadmin thzadmin-shortcode_before_after',
	'popup_header_elements' => '<a class="thz-docs-link" target="_blank" href="https://themezly.com/docs/before-after/">'.__(' Visit Docs', 'creatus').' <span class="thz-docs-info thzicon thzicon-link-external"></span></a>',
);
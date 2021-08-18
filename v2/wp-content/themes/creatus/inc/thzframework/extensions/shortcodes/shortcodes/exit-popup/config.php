<?php if (!defined('FW')) die('Forbidden');

$cfg = array();
$title_template = '{{-title}}<br />';
$title_template .= '<br /><strong>Modal Size: </strong> {{= o.modal_size }}';
$title_template .= '<br /><strong>Effect: </strong> {{= o.effect }}';
$title_template .= '<br /><strong>Cookie expire: </strong> {{= o.expire }}';

$cfg['page_builder'] = array(
	'disable_correction' => true,
	'title'         => esc_html__('Exit popup', 'creatus'),
	'description'   => esc_html__('Add a Exit popup', 'creatus'),
	'tab'           => esc_html__('Content Elements', 'creatus'),
	'popup_size'    => 'large',
	'title_template' => $title_template,
	'icon' => 'thzadmin thzadmin-shortcode_exit_popup',
	'popup_header_elements' => '<a class="thz-docs-link" target="_blank" href="https://themezly.com/docs/exit-popup/">'.__(' Visit Docs', 'creatus').' <span class="thz-docs-info thzicon thzicon-link-external"></span></a>',
);
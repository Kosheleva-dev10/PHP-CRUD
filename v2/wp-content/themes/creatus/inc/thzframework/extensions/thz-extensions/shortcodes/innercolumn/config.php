<?php if (!defined('FW')) die('Forbidden');

$cfg = array(
	'page_builder' => array(
		'tab'         => esc_html__('Layout Elements', 'creatus'),
		'title'       => esc_html__('Inner Column (aka: .thz-col)', 'creatus'),
		'description' => esc_html__('Add a inner column (aka: .thz-col) ', 'creatus'),
		'popup_size'  => 'large',
		'disable_correction' => false,
		'type'        => 'innercolumn',
	'popup_header_elements' => '<a class="thz-docs-link" target="_blank" href="https://themezly.com/docs/inner-column/">'.__(' Visit Docs', 'creatus').' <span class="thz-docs-info thzicon thzicon-link-external"></span></a>',
	)
);

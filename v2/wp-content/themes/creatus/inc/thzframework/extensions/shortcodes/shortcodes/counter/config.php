<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$cfg = array();

$cfg['page_builder'] = array(
	'title'       => esc_html__( 'Counter', 'creatus' ),
	'description' => esc_html__( 'Add a Counter', 'creatus' ),
	'tab'         => esc_html__( 'Content Elements', 'creatus' ),
	'popup_size'  => 'large',
	'title_template' => '{{-title}}{{ if (o.title) { }} : <strong>{{= o.title}}</strong>{{ } }}{{ if (o.count_to) { }} : <strong>{{= o.count_to}}</strong>{{ } }}',
	'icon' => 'thzadmin thzadmin-shortcode_counter',
	'popup_header_elements' => '<a class="thz-docs-link" target="_blank" href="https://themezly.com/docs/counter/">'.__(' Visit Docs', 'creatus').' <span class="thz-docs-info thzicon thzicon-link-external"></span></a>',
);

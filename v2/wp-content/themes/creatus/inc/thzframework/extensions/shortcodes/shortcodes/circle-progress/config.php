<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$cfg = array();

$cfg['page_builder'] = array(
	'disable_correction' => true,
	'title'       => esc_html__( 'Circle progress', 'creatus' ),
	'description' => esc_html__( 'Add a Circle progress', 'creatus' ),
	'tab'         => esc_html__( 'Content Elements', 'creatus' ),
	'popup_size'  => 'large',
	'title_template' => '{{-title}}{{ if (o.title) { }} : <strong>{{= o.title}}</strong>{{ } }}{{ if (o.count_to) { }} : <strong>{{= o.count_to}}</strong>{{ } }}',
	'icon' => 'thzadmin thzadmin-shortcode_circle_progress',
	'popup_header_elements' => '<a class="thz-docs-link" target="_blank" href="https://themezly.com/docs/circle-progress/">'.__(' Visit Docs', 'creatus').' <span class="thz-docs-info thzicon thzicon-link-external"></span></a>',
);

<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$cfg = array();

$cfg['page_builder'] = array(
	'disable_correction' => true,
	'title'       => esc_html__( 'Progress Bars', 'creatus' ),
	'description' => esc_html__( 'Add a Progress Bar', 'creatus' ),
	'tab'         => esc_html__( 'Content Elements', 'creatus' ),
	'popup_size'  => 'large',
	'title_template' => '{{-title}}{{ if (o.bit) { }} : <strong>{{= o.bit}}</strong>{{ } }}',
	'icon' => 'thzadmin thzadmin-shortcode_progress_bars',
	'popup_header_elements' => '<a class="thz-docs-link" target="_blank" href="https://themezly.com/docs/progress-bars/">'.__(' Visit Docs', 'creatus').' <span class="thz-docs-info thzicon thzicon-link-external"></span></a>',
);

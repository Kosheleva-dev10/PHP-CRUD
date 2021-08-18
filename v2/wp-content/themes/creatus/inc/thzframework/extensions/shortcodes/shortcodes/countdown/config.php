<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$cfg = array();

$cfg['page_builder'] = array(
	'disable_correction' => true,
	'title'       => esc_html__( 'Countdown', 'creatus' ),
	'description' => esc_html__( 'Add a Countdown', 'creatus' ),
	'tab'         => esc_html__( 'Content Elements', 'creatus' ),
	'popup_size'  => 'large',
	'title_template' => '{{-title}}{{ if (o.set_title) { }} : <strong>{{= o.set_title}}</strong>{{ } }}',
	'icon' => 'thzadmin thzadmin-shortcode_countdown',
	'popup_header_elements' => '<a class="thz-docs-link" target="_blank" href="https://themezly.com/docs/countdown/">'.__(' Visit Docs', 'creatus').' <span class="thz-docs-info thzicon thzicon-link-external"></span></a>',

);

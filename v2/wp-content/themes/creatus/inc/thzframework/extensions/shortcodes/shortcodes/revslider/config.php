<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$cfg = array();

$cfg['page_builder'] = array(
	'disable_correction' => true,
	'title'       => esc_html__( 'Slider Revolution', 'creatus' ),
	'title_template' => '{{-title}}{{ if (o.revslider) { }} : <strong>{{= o.revslider}}</strong>{{ } }}',
	'description' => esc_html__( 'Add a Slider Revolution slider', 'creatus' ),
	'tab'         => esc_html__( 'Media Elements', 'creatus' ),
	'popup_size'  => 'large',
	'icon' => 'thzadmin thzadmin-shortcode_revolution_slider',
	'popup_header_elements' => '<a class="thz-docs-link" target="_blank" href="https://themezly.com/docs/slider-revolution/">'.__(' Visit Docs', 'creatus').' <span class="thz-docs-info thzicon thzicon-link-external"></span></a>',
);

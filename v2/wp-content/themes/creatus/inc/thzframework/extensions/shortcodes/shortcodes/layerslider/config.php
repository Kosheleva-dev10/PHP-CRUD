<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$cfg = array();

$cfg['page_builder'] = array(
	'disable_correction' => true,
	'title'       => esc_html__( 'Layer Slider', 'creatus' ),
	'title_template' => '{{-title}}{{ if (o.layerslider) { }} : <strong>{{= o.layerslider}}</strong>{{ } }}',
	'description' => esc_html__( 'Add a Layer Slider', 'creatus' ),
	'tab'         => esc_html__( 'Media Elements', 'creatus' ),
	'popup_size'  	=> 'large',
	'icon' => 'thzadmin thzadmin-shortcode_layer_slider',
	'popup_header_elements' => '<a class="thz-docs-link" target="_blank" href="https://themezly.com/docs/layer-slider/">'.__(' Visit Docs', 'creatus').' <span class="thz-docs-info thzicon thzicon-link-external"></span></a>',
);

<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$cfg = array();

$cfg['page_builder'] = array(
	'disable_correction' => true,
	'title'       => esc_html__( 'Magnific Popup', 'creatus' ),
	'title_template' => '{{-title}}{{ if (o.name) { }} : <strong>{{= o.name}}</strong>{{ } }}',
	'description' => esc_html__( 'Add a Magific popup image, image gallery, inline, iframe, video or ajax', 'creatus' ),
	'tab'         => esc_html__( 'Media Elements', 'creatus' ),
	'popup_size'  => 'large',
	'icon' => 'thzadmin thzadmin-shortcode_magnific_popup',
	'popup_header_elements' => '<a class="thz-docs-link" target="_blank" href="https://themezly.com/docs/magnific-popup/">'.__(' Visit Docs', 'creatus').' <span class="thz-docs-info thzicon thzicon-link-external"></span></a>',
);

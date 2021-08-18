<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$cfg = array();

$cfg['page_builder'] = array(
	'disable_correction' => true,
	'title'       => esc_html__( 'Menu Anchor', 'creatus' ),
	'title_template' => '{{-title}}{{ if (o.anchor) { }} : <strong>anchor id = {{= o.anchor}}</strong>{{ } }}',
	'description' => esc_html__( 'Add a menu anchor', 'creatus' ),
	'tab'         => esc_html__( 'Content Elements', 'creatus' ),
	'popup_size'  	=> 'large',
	'icon' => 'thzadmin thzadmin-shortcode_menu_anchor',
	'popup_header_elements' => '<a class="thz-docs-link" target="_blank" href="https://themezly.com/docs/menu-anchor/">'.__(' Visit Docs', 'creatus').' <span class="thz-docs-info thzicon thzicon-link-external"></span></a>',
);

<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$cfg = array();

$title_template = '{{-title}}<br />';
$title_template .= '<br /><strong>Shortcode: </strong> {{= o.shortcode }}';

$cfg['page_builder'] = array(
	'disable_correction' => true,
	'title'       => esc_html__( 'Parse Shortcode', 'creatus' ),
	'description' => esc_html__( 'Add Parse Shortcode', 'creatus' ),
	'tab'         => esc_html__( 'Content Elements', 'creatus' ),
	'popup_size'    => 'large',
	'title_template' => $title_template,
	'icon' => 'thzadmin thzadmin-shortcode_parse_shortcode',
	'popup_header_elements' => '<a class="thz-docs-link" target="_blank" href="https://themezly.com/docs/parse-shortcode/">'.__(' Visit Docs', 'creatus').' <span class="thz-docs-info thzicon thzicon-link-external"></span></a>',
);

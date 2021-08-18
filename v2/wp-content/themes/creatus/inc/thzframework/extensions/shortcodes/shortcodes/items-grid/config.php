<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$cfg = array();

$title_template = '{{-title}}{{ if (o.sort_title) { }} : <strong>{{= o.sort_title}}</strong>{{ } }}<br />';
$title_template .= '<span class="thz-bsp"></span>';
$title_template .= '<br /><strong>Grid settings: </strong>  ';
$title_template .= 'Columns: {{= o.grid.columns }}, ';
$title_template .= 'Gutter: {{= o.grid.gutter }}';

$cfg['page_builder'] = array(
	'disable_correction' => true,
	'title'       => esc_html__( 'Items grid', 'creatus' ),
	'description' => esc_html__( 'Add a Items grid', 'creatus' ),
	'tab'         => esc_html__( 'Content Elements', 'creatus' ),
	'title_template' => $title_template,
	'popup_size'  	=> 'large',
	'icon' => 'thzadmin thzadmin-shortcode_items_grid',
	'popup_header_elements' => '<a class="thz-docs-link" target="_blank" href="https://themezly.com/docs/items-grid/">'.__(' Visit Docs', 'creatus').' <span class="thz-docs-info thzicon thzicon-link-external"></span></a>',
);
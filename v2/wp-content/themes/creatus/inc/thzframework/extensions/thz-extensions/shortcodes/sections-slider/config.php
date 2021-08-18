<?php if (!defined('FW')) die('Forbidden');

$title_template = '{{-title}}';
$title_template .= '{{ if (o.t) { }}';
$title_template .= ' : <strong>{{= o.t}}</strong>';
$title_template .= '{{ } }}';

$title_template .= '{{  if(o.bs.background && o.bs.background.type == "color"){ }}';
$title_template .= '<span class="thz_shc_bg"';
$title_template .= ' style="background-color:{{= thz.thz_replace_palette_colors(o.bs.background.color) }};"';
$title_template .= '</span>';
$title_template .= '{{ } }}';

$cfg = array(
	'page_builder' => array(
		'tab'         => esc_html__('Layout Elements', 'creatus'),
		'title'       => esc_html__('Sections Slider', 'creatus'),
		'description' => esc_html__('Add section slider. This section accepts sections with their content only.', 'creatus'),
		'title_template' => $title_template,
		'popup_size'  => 'large',
		'type'        => 'sections_slider', // WARNING: Do not edit this // why?
		'disable_correction' => true,
	'popup_header_elements' => '<a class="thz-docs-link" target="_blank" href="https://themezly.com/docs/sections-slider/">'.__(' Visit Docs', 'creatus').' <span class="thz-docs-info thzicon thzicon-link-external"></span></a>',
		
	)
);
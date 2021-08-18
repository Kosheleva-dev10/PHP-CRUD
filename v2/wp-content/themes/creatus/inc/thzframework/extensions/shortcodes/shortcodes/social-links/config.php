<?php if (!defined('FW')) die('Forbidden');

$cfg = array();

$title_template = '{{-title}}<br />';
$title_template .= '<br /><strong>Icons Size: </strong> {{= o.im.f }}';
$title_template .= '<br /><strong>Style: </strong> {{= o.im.s }}';
$title_template .= '{{  var $style = o.im.s; if( $style !="simple" ){ }}';
$title_template .= '<br /><strong>Shape: </strong> {{= o.im.sh }}';
$title_template .= '{{ } }}';

$cfg['page_builder'] = array(
	'disable_correction' => true,
	'title'         => esc_html__('Social links', 'creatus'),
	'description'   => esc_html__('Add Social Links', 'creatus'),
	'tab'           => esc_html__('Content Elements', 'creatus'),
	'popup_size'    => 'large',
	'title_template' => $title_template,
	'icon' => 'thzadmin thzadmin-shortcode_social_links',
	'popup_header_elements' => '<a class="thz-docs-link" target="_blank" href="https://themezly.com/docs/social-links/">'.__(' Visit Docs', 'creatus').' <span class="thz-docs-info thzicon thzicon-link-external"></span></a>',
);
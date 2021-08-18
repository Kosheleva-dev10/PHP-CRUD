<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$cfg = array();


$title_template = '{{-title}}<br />';
$title_template .= '<br /><strong>Post types: </strong>  ';
$title_template .= '{{  if(Object.keys(o.types).length > 0){ }}';
$title_template .= '{{= Object.keys(o.types).join(", ") }}';
$title_template .= '{{ }else{ }}';
$title_template .= 'Post';
$title_template .= '{{ } }}';

$title_template .= '<br /><strong>#items: </strong> {{= o.posts_mx.items }}';


$title_template .= '{{  if(o.categories.length > 0){ }}';
$title_template .= '<br /><strong>Specific categories: </strong>  ';
$title_template .= '{{= o.categories.join(", ") }}';
$title_template .= '{{ } }}';


$title_template .= '{{  if(o.tags.length > 0){ }}';
$title_template .= '<br /><strong>Specific tags: </strong>  ';
$title_template .= '{{= o.tags.join(", ") }}';
$title_template .= '{{ } }}';



$title_template .= '{{  if(o.author.length > 0){ }}';
$title_template .= '<br /><strong>Specific author: </strong>  ';
$title_template .= '{{= o.author.join(", ") }}';
$title_template .= '{{ } }}';


$title_template .= '{{  if(o.specific.length > 0){ }}';
$title_template .= '<br /><strong>Specific posts: </strong>  ';
$title_template .= '{{= o.specific.join(", ") }}';
$title_template .= '{{ } }}';


$title_template .= '<br /><strong>Layout mode: </strong> {{= o.mode}}';

$title_template .= '{{  if(o.mode == "grid" ){ }}';
$title_template .= '<br /><strong>Grid settings: </strong>  ';
$title_template .= 'Columns: {{= o.pgrid.columns }}, ';
$title_template .= 'Gutter: {{= o.pgrid.gutter }}';
$title_template .= '{{ } }}';


$title_template .= '{{  if(o.mode == "slider" ){ }}';
$title_template .= '<br /><strong>Slider layout: </strong>  ';
$title_template .= 'Slides to show: {{= o.slider.show }}, ';
$title_template .= 'Slides to scroll: {{= o.slider.scroll }}, ';
$title_template .= 'Slides space: {{= o.slider.space }}, ';
$title_template .= 'Navigation dots: {{= o.slider.dots }},';
$title_template .= 'Navigation arrows: {{= o.slider.arrows }}';
$title_template .= '{{ } }}';






$title_template .= '<br /><strong>Items display mode: </strong> {{= o.display_mode.picked}}';


$cfg['page_builder'] = array(
	'disable_correction' => true,
	'title'       => esc_html__( 'Posts', 'creatus' ),
	'title_template' => $title_template,
	'description' => esc_html__( 'Add Posts', 'creatus' ),
	'popup_size'  => 'large',
	'tab'         => esc_html__( 'Content Elements', 'creatus' ),
	'icon' => 'thzadmin thzadmin-shortcode_posts',
	'popup_header_elements' => '<a class="thz-docs-link" target="_blank" href="https://themezly.com/docs/posts/">'.__(' Visit Docs', 'creatus').' <span class="thz-docs-info thzicon thzicon-link-external"></span></a>',
);

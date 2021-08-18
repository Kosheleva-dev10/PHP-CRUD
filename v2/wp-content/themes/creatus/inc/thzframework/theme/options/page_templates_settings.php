<?php if ( ! defined( 'FW' ) ) die( 'Forbidden' );

$options = array(

	'searchoptionstab' => array(
		'title'   => __( 'Search', 'creatus' ),
		'type'    => 'tab',
		'lazy_tabs'=> false,
		'options' => array(
			fw()->theme->get_options( 'search_settings' ),
		),
	),

	'fourofouroptionstab' => array(
		'title'   => __( '404', 'creatus' ),
		'type'    => 'tab',
		'lazy_tabs'=> false,
		'options' => array(
			fw()->theme->get_options( '404_settings' ),
		),
	),
	
	'authoroptionstab' => array(
		'title'   => __( 'Author', 'creatus' ),
		'type'    => 'tab',
		'lazy_tabs'=> false,
		'options' => array(
			fw()->theme->get_options( 'author_settings' ),
		),
	),
);
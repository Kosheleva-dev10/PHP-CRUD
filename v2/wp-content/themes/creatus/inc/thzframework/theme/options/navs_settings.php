<?php
if (!defined('FW'))
	die('Forbidden');
$options = array(



	'paginationsettingstab' => array(
		'title'   => __( 'Pagination', 'creatus' ),
		'type'    => 'tab',
		'options' => array(
			fw()->theme->get_options('pagination_settings')
		),
	),


	'navigationsettingstab' => array(
		'title'   => __( 'Navigation', 'creatus' ),
		'type'    => 'tab',
		'options' => array(


			fw()->theme->get_options('navigation_settings')


		),
	),


	
);
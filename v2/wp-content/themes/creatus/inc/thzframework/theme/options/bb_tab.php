<?php if ( ! defined( 'FW' ) ) die( 'Forbidden' );
$thz_bbpress_tab = array();
$thz_buddypress_tab = array();
if ( class_exists( 'bbPress' ) ) {
	$thz_bbpress_tab = fw()->theme->get_options( 'bbpress_tab' );
}
if ( class_exists( 'BuddyPress' ) ) {
	$thz_buddypress_tab = fw()->theme->get_options( 'budypress_tab' );
}
$options = array(

	'bbpresstab' => array(
		'title'   => __( 'bb & Budy Press', 'creatus' ),
		'type'    => 'thz-side-tab',
		'li-attr' => array('class' => 'thz-admin-li thz-admin-li-bbpress'),
		'options' => array(
			'bbpress_subbox' => array(
				'title'   => __( 'bbPress & BuddyPress options', 'creatus' ),
				'type'    => 'box',
				'options' => array(
						$thz_bbpress_tab,
						$thz_buddypress_tab
				),
			),
		),
	),

);
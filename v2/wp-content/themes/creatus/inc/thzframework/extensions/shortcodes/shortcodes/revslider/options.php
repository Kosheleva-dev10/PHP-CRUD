<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'revslider' => array(
		'type'   => 'select',
		'label'  => esc_html__( 'Select slider', 'creatus' ),
		'choices' => thz_revolution_slides(),
		'desc'   => esc_html__( 'Select Slider Revolution slider', 'creatus' )
	),
	'id' => array(
		'type' => 'unique',
		'length' => 8
	),
	'cmx' => _thz_container_metrics_defaults()
);

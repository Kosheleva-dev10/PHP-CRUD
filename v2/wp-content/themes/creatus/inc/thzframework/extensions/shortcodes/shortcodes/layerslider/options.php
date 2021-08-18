<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'layerslider' => array(
		'type'   => 'select',
		'label'  => esc_html__( 'Select slider', 'creatus' ),
		'choices' => thz_layer_slider_slides(),
		'desc'   => esc_html__( 'Select LayerSlider slider', 'creatus' )
	),
	'id' => array(
		'type' => 'unique',
		'length' => 8
	),
	'cmx' => _thz_container_metrics_defaults()
);

<?php if ( ! defined( 'FW' ) ) die( 'Forbidden' );

$options = array(

	'colorset'  => array(
		'type'         => 'multi-picker',
		'label'        => false,
		'desc'         => false,
		'picker'       => array(
			'picked' => array(
				'label' => 'Content colors',
				'type'    => 'radio',
				'value'=> 'default',
				'choices' => array(
					'default'  => esc_html__( 'Use theme default', 'creatus' ),
					'custom' => esc_html__( 'Set custom', 'creatus' )
				),
				'desc' => esc_html__('Adjust content colors', 'creatus'),
				'help' => esc_html__('This option will help you set custom content colors.', 'creatus')
			)
		),
		'choices'      => array(
			'custom'  => array(
				'text_color'  => array(
					'type'  => 'thz-color-picker',
					'value' => '',
					'label' => __( 'Text color', 'creatus' ),
					'desc' => esc_html__( 'Set default text color', 'creatus' )
				),
				'link_color'  => array(
					'type'  => 'thz-color-picker',
					'value' => '',
					'label' => __( 'Primary color', 'creatus' ),
					'desc' => esc_html__( 'Set default color for links and accent elements', 'creatus' )
				),
				'link_hover_color'  => array(
					'type'  => 'thz-color-picker',
					'value' => '',
					'label' => __( 'Highlight color', 'creatus' ),
					'desc' => esc_html__( 'Set default color for hovers', 'creatus' )
				),
				'headings_color'  => array(
					'type'  => 'thz-color-picker',
					'value' => '',
					'label' => __( 'Headings color', 'creatus' ),
					'desc' => esc_html__( 'Set default color for headings (H1, H2, H3, H4, H5 & H6 )', 'creatus' )
				)
			),

		),
		'show_borders' => true,
	),
);



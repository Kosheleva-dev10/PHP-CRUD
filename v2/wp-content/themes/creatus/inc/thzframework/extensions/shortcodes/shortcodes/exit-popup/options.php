<?php
if (!defined('FW')) {
	die('Forbidden');
}

$background_layers = fw()->theme->get_options('background_layers');

unset($background_layers['bglayersoptions']['options']['layer_type']['picker']['picked']['choices']['scroll']);
unset($background_layers['bglayersoptions']['options']['layer_type']['choices']['scroll']);
/*unset($background_layers['bglayersoptions']['options']['layer_type']['picker']['picked']['choices']['infinity']);
unset($background_layers['bglayersoptions']['options']['layer_type']['choices']['infinity']);*/


$options = array(
	'defaultstab' => array(
		'title' => __('Defaults', 'creatus'),
		'type' => 'tab',
		'options' => array(
			'id' => array(
				'type' => 'unique',
				'length' => 8
			),
			'bs' => array(
				'type' => 'thz-box-style',
				'label' => __('Container box style', 'creatus'),
				'popup' => true,
				'desc' => esc_html__('Adjust .thz-exit-popup-box box style', 'creatus'),
				'button-text' => __('Container box style', 'creatus'),
				'disable' => array('layout','boxsize','transform'),
				'units' => array(
					'borderradius',
					'boxsize',
					'padding',
					'margin',
				),
				'value' => array()
			),
			'bl' => array(
				'type' => 'addable-popup',
				'label' => __('Background layers', 'creatus'),
				'popup-title' => esc_html__('Add/Edit Background Layer', 'creatus'),
				'desc' => esc_html__('Create background layer. Add parallax, infinity or basic background layer ', 'creatus'),
				'help' => esc_html__('This option adds additional background layer to the HTML container. Note that z-index is assigned per layer position in the order. The layer on top has the highest z-index.', 'creatus'),
				'template' => '{{=layer_title}}',
				'add-button-text' => esc_html__('Add/Edit Background layer', 'creatus'),
				'size' => 'large',
				'popup-options' => array(
					$background_layers
				)
			),
			'cmx' => _thz_container_metrics_defaults()
		)
	),
	'contenttab' => array(
		'title' => __('Content', 'creatus'),
		'type' => 'tab',
		'options' => array(
			'modal_content' => array(
				'type' => 'wp-editor',
				'size' => 'large',
				'editor_height' => 200,
				'editor_type' => 'tinymce',
				'wpautop' => true,
				'shortcodes' => true,
				'value' => 'This is dummy modal text please replace it with your own content.',
				'label' => __('Modal Content', 'creatus'),
				'desc' => __('Add exit popup content', 'creatus')
			),
		)
	),
	'styletab' => array(
		'title' => __('Modal Metrics', 'creatus'),
		'type' => 'tab',
		'options' => array(
			'style' => array(
				'label' => __('Backdrop Style', 'creatus'),
				'desc' => esc_html__('Select backdrop ( popup background ) style', 'creatus'),
				'type' => 'select',
				'value' => 'mfp-dark',
				'choices' => array(
					'mfp-light' => esc_html__('Light', 'creatus'),
					'mfp-dark' => esc_html__('Dark', 'creatus')
				)
			),
			'opacity' => array(
				'label' => __('Backdrop Opacity', 'creatus'),
				'desc' => esc_html__('Set backdrop ( popup background ) opacity', 'creatus'),
				'type' => 'select',
				'value' => 'mfp-opacity-08',
				'choices' => array(
					'mfp-opacity-0' => esc_html__('Invisible', 'creatus'),
					'mfp-opacity-01' => esc_html__('0.1', 'creatus'),
					'mfp-opacity-02' => esc_html__('0.2', 'creatus'),
					'mfp-opacity-03' => esc_html__('0.3', 'creatus'),
					'mfp-opacity-04' => esc_html__('0.4', 'creatus'),
					'mfp-opacity-05' => esc_html__('0.5', 'creatus'),
					'mfp-opacity-06' => esc_html__('0.6', 'creatus'),
					'mfp-opacity-07' => esc_html__('0.7', 'creatus'),
					'mfp-opacity-08' => esc_html__('0.8', 'creatus'),
					'mfp-opacity-09' => esc_html__('0.9', 'creatus'),
					'mfp-opacity-1' => esc_html__('No opacity', 'creatus')
				)
			),
			'modal_size' => array(
				'type' => 'select',
				'value' => 'medium',
				'desc' => esc_html__('Select modal dialog size', 'creatus'),
				'choices' => array(
					'small' => esc_html__('Small/Max width 400', 'creatus'),
					'medium' => esc_html__('Medium/Max width 700', 'creatus'),
					'large' => esc_html__('Large/Max width 900', 'creatus'),
					'xlarge' => esc_html__('X-Large/Max width 1200', 'creatus')
				)
			),
			'effect' => array(
				'label' => __('Modal effect', 'creatus'),
				'desc' => esc_html__('Select modal window opening effect', 'creatus'),
				'type' => 'select',
				'value' => 'mfp-zoom-in',
				'choices' => array(
					'mfp-fade-in' => esc_html__('Fade in', 'creatus'),
					'mfp-zoom-in' => esc_html__('Zoom in', 'creatus'),
					'mfp-zoom-out' => esc_html__('Zoom out', 'creatus'),
					'mfp-newspaper' => esc_html__('Newspaper', 'creatus'),
					'mfp-move-horizontal' => esc_html__('Move horizontal', 'creatus'),
					'mfp-move-from-top' => esc_html__('From top', 'creatus'),
					'mfp-3d-unfold' => esc_html__('3d unfold', 'creatus'),
					'mfp-3d-flip' => esc_html__('3d flip', 'creatus')
				)
			),
			'cb_mx' => array(
				'type' => 'thz-multi-options',
				'label' => __('Close button colors', 'creatus'),
				'desc' => esc_html__('Adjust close button colors', 'creatus'),
				'value' => array(
					'c' => '',
					'h' => ''
				),
				'thz_options' => array(
					'c' => array(
						'type' => 'color',
						'title' => esc_html__('Color', 'creatus'),
						'box' => true
					),
					'h' => array(
						'type' => 'color',
						'title' => esc_html__('Hocered', 'creatus'),
						'box' => true
					)
				)
			),
			'expire' => array(
				'type' => 'short-text',
				'label' => __('Cookie expire', 'creatus'),
				'value' => 7,
				'desc' => esc_html__('Set popup cookie expiration in days.', 'creatus'),
				'help' => esc_html__('Cookie is set when user closes the popup. Once the cookie is set this popup will not be visible for the user untill the cookie expires. Set to 0 if you always want to show this popup on page exit. Note that popup is shown only once per page load.', 'creatus')
			)
		)
	),
);
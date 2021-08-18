<?php
if (!defined('FW')) {
    die('Forbidden');
}
$options = array(
    'layerstab' => array(
        'title' => __('Layers', 'creatus'),
        'type' => 'tab',
        'options' => array(
            'l' => array(
                'type' => 'thz-addable-layer',
                'value' => array(),
                'label' => false,
                'desc' => sprintf(esc_html__('Click on select to change container ratio.%1$sClick on "Add image layer" to add new layer.%1$sHover over the layer to see controlls.%1$s Click and drag layer to position it.', 'creatus'), '<br />'),
                'template' => '{{ thz.image_layer_template(_layer_data,o,_layer); }}',
                'layer-title' => __('Layer options', 'creatus'),
                'size' => 'large',
                'add-button-text' => __('Add image layer.', 'creatus'),
                'help' => __('You can drag and drop layers to move their positions.', 'creatus'),
                'layer-options' => array(
                    'o' => array(
                        'type' => 'multi',
                        'value' => array(),
                        'label' => false,
                        'inner-options' => array(
                            'defaultstab' => array(
                                'title' => __('Defaults', 'creatus'),
                                'type' => 'tab',
                                'options' => array(
									'id' => array(
										'type' => 'unique',
										'length' => 8
									),
                                    'image' => array(
                                        'type' => 'upload',
                                        'label' => __('Select Image', 'creatus'),
                                        'desc' => esc_html__('Select or upload an image', 'creatus'),
                                        'sizes' => array(
                                            'thz-img-small'
                                        )
                                    ),
                                    'img_mx' => array(
                                        'type' => 'thz-multi-options',
                                        'label' => __('Image metrics', 'creatus'),
                                        'desc' => esc_html__('Adjust layer image metrics', 'creatus'),
                                        'value' => array(
                                            'size' => 'thz-img-medium',
                                            'position' => 'center-center',
                                            'grayscale' => 'none'
                                        ),
                                        'thz_options' => array(
                                            'size' => array(
                                                'type' => 'short-select',
                                                'title' => esc_html__('Size', 'creatus'),
                                                'choices' => thz_get_image_sizes_list()
                                            ),
                                            'position' => array(
                                                'type' => 'short-select',
                                                'title' => esc_html__('Position', 'creatus'),
                                                'choices' => _thz_bg_positions_list()
                                            ),
                                            'grayscale' => array(
                                                'type' => 'short-select',
                                                'title' => esc_html__('Grayscale', 'creatus'),
                                                'choices' => array(
                                                    'none' => esc_html__('Inactive', 'creatus'),
                                                    'thz-grayscale' => esc_html__('Active', 'creatus'),
                                                    'thz-grayscale-add' => esc_html__('Active on hover', 'creatus'),
                                                    'thz-grayscale-remove' => esc_html__('Remove on hover', 'creatus')
                                                )
                                            )
                                        )
                                    ),
                                    'bs' => array(
                                        'type' => 'thz-box-style',
                                        'label' => __('Layer box style', 'creatus'),
                                        'preview' => true,
                                        'button-text' => esc_html__('Customize layer box style', 'creatus'),
                                        'desc' => esc_html__('Adjust .thz-img-layer box style', 'creatus'),
                                        'popup' => true,
                                        'disable' => array(
                                            'video',
                                            'transform',
                                            'layout',
                                            'boxsize',
                                            'padding',
                                            'margin'
                                        ),
                                        'value' => array()
                                    ),
                                    'cmx' => _thz_container_metrics_defaults(),
                                    'instyle' => array(
                                        'type' => 'short-text',
                                        'label' => __('Inherit style from', 'creatus'),
                                        'desc' => esc_html__('Insert layer ID to inherit the style from. See help for more info.', 'creatus'),
                                        'help' => esc_html__('If you have multiple layers with same box style you can set main layer Custom ID than add that ID here. This way ever layer on this page with this inherit ID will use same box style. This reduces the overhead CSS and renders the layers faster. Note that once the inherit ID is added the box style for this layer is not printed. The effects must be set on per layer basis.', 'creatus'),
                                        'value' => ''
                                    )
                                )
                            ),
                            'actionstab' => array(
                                'title' => __('Actions', 'creatus'),
                                'type' => 'tab',
                                'li-attr' => array(
                                    'class' => 'thz-li-o-actionstab'
                                ),
                                'lazy_tabs' => false,
                                'options' => array(
                                    'click' => array(
                                        'label' => __('Click action', 'creatus'),
                                        'desc' => esc_html__('Select image click action', 'creatus'),
                                        'type' => 'short-select',
                                        'attr' => array(
                                            'class' => 'thz-select-switch'
                                        ),
                                        'value' => 'none',
                                        'choices' => array(
                                            'none' => array(
                                                'text' => esc_html__('None', 'creatus'),
                                                'attr' => array(
                                                    'data-disable' => 'o-link'
                                                )
                                            ),
                                            'link' => array(
                                                'text' => esc_html__('Open link', 'creatus'),
                                                'attr' => array(
                                                    'data-enable' => 'o-link'
                                                )
                                            ),
                                            'lightbox' => array(
                                                'text' => esc_html__('Open image in lightbox', 'creatus'),
                                                'attr' => array(
                                                    'data-disable' => 'o-link'
                                                )
                                            )
                                        )
                                    ),
                                    'link' => array(
                                        'label' => __('Add custom link', 'creatus'),
                                        'desc' => esc_html__('Add custom link for this image', 'creatus'),
                                        'type' => 'thz-url',
                                        'value' => array(
                                            'type' => 'normal',
                                            'url' => '',
                                            'title' => '',
                                            'target' => '_self',
                                            'magnific' => ''
                                        ),
                                        'data-parent' => 'parent',
                                        'data-type' => '.thz-url-type,.linkType',
                                        'data-link' => '.thz-url-input,.normalLink',
                                        'data-title' => '.thz-url-title,.linkTitle',
                                        'data-target' => '.thz-url-target,.linkTarget',
                                        'data-magnific' => '.thz-url-magnific,.magnificId'
                                    )
                                )
                            ),
                            'eltexttab' => array(
                                'title' => __('Element text', 'creatus'),
                                'type' => 'tab',
                                'lazy_tabs' => false,
                                'options' => array(
									'etext'    => array(
										'type' => 'wp-editor',
										'size' => 'large',
										'editor_height' => 200,
										'shortcodes' => false,
										'editor_type' => 'tinymce',
										'wpautop' => true,
										'label' => __( 'Text', 'creatus' ),
										'desc'  => __( 'Shown only if overlay element type is text', 'creatus' ),
									),
									'esubtext'    => array(
										'type' => 'wp-editor',
										'size' => 'large',
										'editor_height' => 200,
										'shortcodes' => false,
										'editor_type' => 'tinymce',
										'wpautop' => true,
										'label' => __( ' Sub text', 'creatus' ),
										'desc'  => __( 'Shown only if overlay element type is text', 'creatus' ),
									)
                                )
                            ),
                            'layereffects' => array(
                                'title' => __('Effects', 'creatus'),
                                'type' => 'tab',
                                'lazy_tabs' => false,
                                'options' => array(
                                    'animate' => array(
                                        'type' => 'thz-animation',
                                        'label' => false,
                                        'value' => array(
                                            'animate' => 'inactive',
                                            'effect' => 'thz-anim-slideIn-up',
                                            'duration' => 400,
                                            'delay' => 200
                                        ),
                                        'addlabel' => esc_html__('Animate container', 'creatus'),
                                        'adddesc' => esc_html__('Add animation to the layer HTML container', 'creatus')
                                    ),
                                    'cpx' => _thz_container_parallax_default()
                                )
                            )
                        )
                    )
                )
            )
        )
    ),
    'settingstab' => array(
        'title' => __('Settings', 'creatus'),
        'type' => 'tab',
        'options' => array(
            'l_con_bs' => array(
                'type' => 'thz-box-style',
                'label' => __('Layers container box style', 'creatus'),
                'preview' => true,
                'button-text' => esc_html__('Customize layers container box style', 'creatus'),
                'desc' => esc_html__('Adjust .thz-image-layers box style', 'creatus'),
                'popup' => true,
                'disable' => array(
                    'video'
                ),
				'units' => array(
					'borderradius',
					'boxsize',
					'padding',
					'margin',
				),
                'value' => array()
            ),
            'con_bs' => array(
                'type' => 'thz-box-style',
                'label' => __('Container box style', 'creatus'),
                'preview' => true,
                'button-text' => esc_html__('Customize container box style', 'creatus'),
                'desc' => esc_html__('Adjust .thz-image-layers-container box style', 'creatus'),
                'popup' => true,
                'disable' => array(
                    'video'
                ),
				'units' => array(
					'borderradius',
					'boxsize',
					'padding',
					'margin',
				),
                'value' => array()
            ),
            'id' => array(
                'type' => 'unique',
                'length' => 8
            ),
            'cmx' => _thz_container_metrics_defaults()
        )
    ),
    'lightboxoptionstab' => array(
        'title' => __('Lightbox', 'creatus'),
        'type' => 'tab',
        'lazy_tabs' => false,
        'options' => array(
            fw()->theme->get_options('lightbox_settings')
        )
    ),
    'overlayoptionstab' => array(
        'title' => __('Overlay', 'creatus'),
        'type' => 'tab',
        'lazy_tabs' => false,
        'options' => array(
            'over_mode' => array(
                'label' => __('Overlay display mode', 'creatus'),
                'desc' => esc_html__('Select overlay display mode. It is active only if layer action is enabled.', 'creatus'),
                'type' => 'select',
                'attr' => array(
                    'class' => 'thz-select-switch'
                ),
                'value' => 'none',
                'choices' => array(
                    'none' => array(
                        'text' => esc_html__('None', 'creatus'),
                        'attr' => array(
                            'data-disable' => 'reveal_effect,med_over,distance,.thz-overlayelement-li'
                        )
                    ),
                    'thzhover' => array(
                        'text' => esc_html__('Thz hover ( Overlay shows on hover )', 'creatus'),
                        'attr' => array(
                            'data-enable' => '.thz-overlayelement-li,med_over,distance,#thz-hover-med_over-oeffect,#thz-hover-med_over-ieffect,#thz-hover-med_over-iceffect',
                            'data-disable' => 'reveal_effect'
                        )
                    ),
                    'reveal' => array(
                        'text' => esc_html__('Reveal ( Overlay hides on hover )', 'creatus'),
                        'attr' => array(
                            'data-enable' => '.thz-overlayelement-li,med_over,distance,reveal_effect,#thz-hover-med_over-ieffect',
                            'data-disable' => '#thz-hover-med_over-oeffect,#thz-hover-med_over-iceffect'
                        )
                    ),
                    'directional' => array(
                        'text' => esc_html__('Directional ( Overlay shows on hover )', 'creatus'),
                        'attr' => array(
                            'data-enable' => '.thz-overlayelement-li,med_over,distance,#thz-hover-med_over-ieffect',
                            'data-disable' => 'reveal_effect,#thz-hover-med_over-oeffect,#thz-hover-med_over-iceffect'
                        )
                    )
                )
            ),
            'reveal_effect' => array(
                'type' => 'thz-multi-options',
                'label' => __('Media overlay effect', 'creatus'),
                'desc' => esc_html__('Select media overlay hover effect and duration', 'creatus'),
                'value' => array(
                    'effect' => 'thz-reveal-goleft',
                    'transition' => 'thz-transease-04'
                ),
                'thz_options' => array(
                    'effect' => array(
                        'type' => 'select',
                        'title' => esc_html__('Effect', 'creatus'),
                        'choices' => _thz_reveal_list('No effect ( element stays on hover )')
                    ),
                    'transition' => array(
                        'type' => 'short-select',
                        'title' => esc_html__('Duration', 'creatus'),
                        'choices' => _thz_transition_duration_list()
                    )
                )
            ),

            'med_over' => array(
                'type' => 'thz-hover',
                'value' => array(
                    'background' => array(
                        'type' => 'gradient',
                        'gradient' => 'radial',
                        'color1' => 'rgba(0,0,0,0.1)',
                        'color2' => 'rgba(0,0,0,0.8)'
                    ),
                    'oeffect' => 'thz-hover-fadein',
                    'oduration' => 'thz-transease-04',
                    'ieffect' => 'thz-img-zoomin',
                    'iduration' => 'thz-transease-04',
                    'iceffect' => 'thz-comein-bottom',
                    'icduration' => 'thz-transease-05'
                ),
                'labels' => array(
                    'background' => esc_html__('Image overlay background', 'creatus'),
                    'overlay' => esc_html__('Image overlay effect', 'creatus'),
                    'image' => esc_html__('Image effect', 'creatus'),
                    'icons' => esc_html__('Overlay element effect', 'creatus')
                ),
                'descriptions' => array(
                    'background' => esc_html__('Set image overlay background', 'creatus'),
                    'overlay' => esc_html__('Select image overlay hover effect and duration', 'creatus'),
                    'image' => esc_html__('Select image hover effect and duration', 'creatus'),
                    'icons' => esc_html__('Select image overlay element hover effect and duration', 'creatus')
                ),
                'label' => false,
                'desc' => false
            ),
            'distance' => array(
                'type' => 'thz-spinner',
                'label' => __('Image overlay distance', 'creatus'),
                'desc' => esc_html__('Distance the image overlay from image box edges', 'creatus'),
                'addon' => 'px',
                'min' => 0,
                'max' => 200,
                'value' => '0'
            )
        )
    ),
    'elementsettings' => array(
        'title' => __('Overlay element', 'creatus'),
        'type' => 'tab',
        'li-attr' => array(
            'class' => 'thz-o-overlayelement-li'
        ),
        'options' => array(
            'mi' => array(
                'type' => 'multi-picker',
                'label' => false,
                'desc' => false,
                'show_borders' => true,
                'picker' => array(
                    'picked' => array(
                        'label' => __('Show overlay element', 'creatus'),
                        'desc' => esc_html__('Show/hide overlay element', 'creatus'),
                        'type' => 'switch',
                        'right-choice' => array(
                            'value' => 'hide',
                            'label' => __('Hide', 'creatus')
                        ),
                        'left-choice' => array(
                            'value' => 'show',
                            'label' => __('Show', 'creatus')
                        ),
                        'value' => 'hide'
                    )
                ),
                'choices' => array(
                    'show' => array(
					
						'etype' => array(
							'label' => __('Element Type', 'creatus'),
							'desc' => esc_html__('Element type', 'creatus'),
							'type' => 'short-select',
							'attr' => array(
								'class' => 'thz-select-switch'
							),
							'value' => 'icon',
							'choices' => array(
								'icon' => array(
									'text' => esc_html__('Icon', 'creatus'),
									'attr' => array(
										'data-enable' => 'mi-show-icon,mi-show-icon_metrics,mi-show-iconbg_metrics',
										'data-disable' => 'mi-show-tbs,mi-show-tf,mi-show-stbs,mi-show-stf,mi-show-el_ali'
									)
								),
								'text' => array(
									'text' => esc_html__('Text', 'creatus'),
									'attr' => array(
										'data-enable' => 'mi-show-tbs,mi-show-tf,mi-show-stbs,mi-show-stf,mi-show-el_ali',
										'data-disable' => 'mi-show-icon,mi-show-icon_metrics,mi-show-iconbg_metrics',
									)
								),
							),
						),

			
						'el_ali' => array(
							'label' => __('Element v-align', 'creatus'),
							'desc' => esc_html__('Vertically align element', 'creatus'),
							'value' => 'thz-va-bottom',
							'type' => 'radio',
							'inline' => true,
							'choices' => array(
								'thz-va-top' => esc_html__('Top', 'creatus'),
								'thz-va-middle' => esc_html__('Middle', 'creatus'),
								'thz-va-bottom' => esc_html__('Bottom', 'creatus')
							)
						),
						
						'ehbs' => array(
							'type' => 'thz-box-style',
							'label' => __('Element holder box style', 'creatus'),
							'preview' => false,
							'popup' => true,
							'desc' => esc_html__('Adjust .thz-el-holder box style', 'creatus'),
							'button-text' => __('Customize holder box style', 'creatus'),
							'disable' => array(
								'video',
							),
							'value' => array()
						),
												
						'tbs' => array(
							'type' => 'thz-box-style',
							'label' => __('Text box style', 'creatus'),
							'preview' => false,
							'popup' => true,
							'desc' => esc_html__('Adjust .thz-el-text box style', 'creatus'),
							'button-text' => __('Customize text box style', 'creatus'),
							'disable' => array(
								'video',
							),
							'value' => array()
						),
						'tf' => array(
							'label' => __('Text font', 'creatus'),
							'desc' => esc_html__('Adjust text font.', 'creatus'),
							'type' => 'thz-typography',
							'value' => array(),
							'disable' => array('hovered')
						),
						
						'stbs' => array(
							'type' => 'thz-box-style',
							'label' => __('Sub text box style', 'creatus'),
							'preview' => false,
							'popup' => true,
							'desc' => esc_html__('Adjust .thz-el-subtext box style', 'creatus'),
							'button-text' => __('Customize subtext box style', 'creatus'),
							'disable' => array(
								'video',
							),
							'value' => array()
						),
						'stf' => array(
							'label' => __('Sub text font', 'creatus'),
							'desc' => esc_html__('Adjust sub text font.', 'creatus'),
							'type' => 'thz-typography',
							'value' => array(),
							'disable' => array('hovered')
						),
						
					
                        'icon' => array(
                            'type' => 'thz-icon',
                            'value' => 'thzicon thzicon-plus',
                            'label' => __('Overlay icon', 'creatus'),
                            'desc' => esc_html__('Set overlay icon. Shown only if icon selected.', 'creatus')
                        ),
                        'icon_metrics' => array(
                            'type' => 'thz-multi-options',
                            'label' => __('Icon metrics', 'creatus'),
                            'desc' => esc_html__('Adjust icon metrics', 'creatus'),
                            'value' => array(
                                'pa' => 10,
                                'fs' => 16,
                                'co' => '#ffffff'
                            ),
                            'thz_options' => array(
                                'pa' => array(
                                    'type' => 'spinner',
                                    'title' => esc_html__('Padding', 'creatus'),
                                    'addon' => 'px',
                                    'min' => 0,
                                    'max' => 100
                                ),
                                'fs' => array(
                                    'type' => 'spinner',
                                    'title' => esc_html__('Icon size', 'creatus'),
                                    'addon' => 'px',
                                    'min' => 0,
                                    'max' => 100
                                ),
                                'co' => array(
                                    'type' => 'color',
                                    'title' => esc_html__('Icon color', 'creatus'),
                                    'box' => true
                                )
                            )
                        ),
                        'iconbg_metrics' => array(
                            'type' => 'thz-multi-options',
                            'label' => __('Shape metrics', 'creatus'),
                            'desc' => esc_html__('Adjust icon background shape metrics', 'creatus'),
                            'value' => array(
                                'sh' => 'square',
                                'bg' => '',
                                'bs' => 'solid',
                                'bsi' => 0,
                                'bc' => ''
                            ),
                            'thz_options' => array(
                                'sh' => array(
                                    'type' => 'short-select',
                                    'title' => esc_html__('Type', 'creatus'),
                                    'choices' => array(
                                        'circle' => esc_html__('Circle', 'creatus'),
                                        'square' => esc_html__('Square', 'creatus'),
                                        'rounded' => esc_html__('Rounded', 'creatus')
                                    )
                                ),
                                'bg' => array(
                                    'type' => 'color',
                                    'title' => esc_html__('Background', 'creatus'),
                                    'box' => true
                                ),
                                'bs' => array(
                                    'type' => 'short-select',
                                    'title' => esc_html__('Border style', 'creatus'),
                                    'choices' => array(
                                        'solid' => esc_html__('Solid', 'creatus'),
                                        'dashed' => esc_html__('Dashed', 'creatus'),
                                        'dotted' => esc_html__('Dotted', 'creatus')
                                    )
                                ),
                                'bsi' => array(
                                    'type' => 'spinner',
                                    'title' => esc_html__('Border size', 'creatus'),
                                    'addon' => 'px',
                                    'min' => 0,
                                    'max' => 100
                                ),
                                'bc' => array(
                                    'type' => 'color',
                                    'title' => esc_html__('Border color', 'creatus'),
                                    'box' => true
                                )
                            )
                        )
                    )
                )
            )
        )
    ),
    'holdereffects' => array(
        'title' => __('Effects', 'creatus'),
        'type' => 'tab',
        'lazy_tabs' => false,
        'options' => array(
            'animate' => array(
                'type' => 'thz-animation',
                'label' => false,
                'value' => array(
                    'animate' => 'inactive',
                    'effect' => 'thz-anim-slideIn-up',
                    'duration' => 400,
                    'delay' => 200
                ),
                'addlabel' => esc_html__('Animate container', 'creatus'),
                'adddesc' => esc_html__('Add animation to the layers HTML container', 'creatus')
            ),
            'cpx' => _thz_container_parallax_default()
        )
    )
);
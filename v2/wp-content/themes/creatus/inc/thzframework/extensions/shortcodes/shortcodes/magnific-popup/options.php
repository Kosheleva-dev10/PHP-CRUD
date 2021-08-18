<?php
if (!defined('FW')) {
    die('Forbidden');
}
$options = array(
    'defaultsettings' => array(
        'title' => __('Defaults', 'creatus'),
        'type' => 'tab',
        'options' => array(
            'name' => array(
                'type' => 'text',
                'label' => __('Name', 'creatus'),
                'value' => '',
                'desc' => esc_html__('This is optional and it is used inside page builder only.', 'creatus')
            ),
            'id' => array(
                'type' => 'unique',
                'length' => 8
            ),
            'tbs' => array(
                'type' => 'thz-box-style',
                'label' => __('Trigger box style', 'creatus'),
                'preview' => false,
                'popup' => true,
                'desc' => esc_html__('Adjust .thz-mfp-shortcode box style', 'creatus'),
                'button-text' => __('Customize popup trigger box style', 'creatus'),
                'disable' => array(
                    'video'
                ),
                'value' => array()
            ),
            'bs' => array(
                'type' => 'thz-box-style',
                'label' => __('Container box style', 'creatus'),
                'preview' => false,
                'popup' => true,
                'desc' => esc_html__('Adjust .thz-magnific-container box style', 'creatus'),
                'button-text' => __('Customize container box style', 'creatus'),
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
            'cmx' => _thz_container_metrics_defaults(),
            'instyle' => array(
                'type' => 'short-text',
                'label' => __('Inherit style from', 'creatus'),
                'desc' => esc_html__('Insert magnific popup box ID to inherit the style from. See help for more info.', 'creatus'),
                'help' => esc_html__('If you have multiple magnific popups with same style you can set main magnific popup Custom ID than add that ID here. This way every magnific popup on this page with this inherit ID will use same CSS. This reduces the overhead CSS and renders the magnific popup faster. Note that once the inherit ID is added the CSS for this magnific popup is not printed. The effects must be set on per element basis.', 'creatus'),
                'value' => ''
            )
        )
    ),
    'popupssettings' => array(
        'title' => __('Popups', 'creatus'),
        'type' => 'tab',
        'options' => array(
            'gm' => array(
                'type' => 'thz-multi-options',
                'label' => __('Gallery metrics', 'creatus'),
                'desc' => esc_html__('Adjust gallery metrics. See help for more info.', 'creatus'),
                'help' => esc_html__('If trigger is custom link, gallery items will be hidden and you can open the gallery via link click. Use gallery ID in a link href attribute to open this gallery.', 'creatus'),
                'value' => array(
                    'active' => 'no',
                    'id' => '',
                    'trigger' => 'popups',
                    'align' => 'centered',
                    'slider' => 'show'
                ),
                'thz_options' => array(
                    'active' => array(
                        'type' => 'short-select',
                        'title' => esc_html__('Gallery active', 'creatus'),
                        'attr' => array(
                            'class' => 'thz-select-switch'
                        ),
                        'choices' => array(
                            'yes' => array(
                                'text' => esc_html__('Yes', 'creatus'),
                                'attr' => array(
                                    'data-enable' => '.gal-id-parent,.gal-trig-parent',
                                    'data-check' => '.gal-trig-parent'
                                )
                            ),
                            'no' => array(
                                'text' => esc_html__('No', 'creatus'),
                                'attr' => array(
                                    'data-disable' => '.gal-id-parent,.gal-trig-parent,.gal-align-parent,.gal-slider-parent'
                                )
                            )
                        )
                    ),
                    'id' => array(
                        'type' => 'short-text',
                        'title' => esc_html__('Gallery ID', 'creatus'),
                        'attr' => array(
                            'class' => 'gal-id'
                        )
                    ),
                    'trigger' => array(
                        'type' => 'short-select',
                        'title' => esc_html__('Trigger', 'creatus'),
                        'attr' => array(
                            'class' => 'thz-select-switch gal-trig'
                        ),
                        'choices' => array(
                            'popups' => array(
                                'text' => esc_html__('Popups links', 'creatus'),
                                'attr' => array(
                                    'data-enable' => '.gal-align-parent,.gal-slider-parent'
                                )
                            ),
                            'button' => array(
                                'text' => esc_html__('Custom links', 'creatus'),
                                'attr' => array(
                                    'data-disable' => '.gal-align-parent,.gal-slider-parent'
                                )
                            )
                        )
                    ),
                    'align' => array(
                        'type' => 'short-select',
                        'title' => esc_html__('Items align', 'creatus'),
                        'attr' => array(
                            'class' => 'gal-align'
                        ),
                        'choices' => array(
                            'none' => esc_html__('None', 'creatus'),
                            'left' => esc_html__('Left', 'creatus'),
                            'right' => esc_html__('Right', 'creatus'),
                            'centered' => esc_html__('Centered', 'creatus')
                        )
                    ),
                    'slider' => array(
                        'type' => 'short-select',
                        'title' => esc_html__('Lightbox slider', 'creatus'),
                        'attr' => array(
                            'class' => 'gal-slider'
                        ),
                        'choices' => array(
                            'show' => esc_html__('Show', 'creatus'),
                            'hide' => esc_html__('Hide', 'creatus')
                        )
                    )
                )
            ),
            'popups' => array(
                'type' => 'addable-popup',
                'label' => __('Popups', 'creatus'),
                'popup-title' => esc_html__('Add/Edit Popup', 'creatus'),
                'desc' => esc_html__('Click to add/edit your popups', 'creatus'),
                'template' => '{{=popup_title}}',
                'size' => 'large',
                'add-button-text' => esc_html__('Add popup', 'creatus'),
                'popup-options' => array(
                    'defaultstab' => array(
                        'title' => __('Defaults', 'creatus'),
                        'type' => 'tab',
                        'options' => array(
                            'id' => array(
                                'type' => 'unique',
                                'length' => 8
                            ),
                            'popup_title' => array(
                                'type' => 'text',
                                'label' => __('Name', 'creatus'),
                                'value' => 'Popup title',
                                'desc' => esc_html__('This option is used to easy recognize popup in popups list.', 'creatus')
                            ),
                            'popupid' => array(
                                'type' => 'text',
                                'label' => __('Popup ID', 'creatus'),
                                'value' => '',
                                'desc' => esc_html__('Set popup ID. Must be unique. If empty, random ID will be choosen.', 'creatus'),
                                'help' => esc_html__('This popup ID can be used inside the a link href attribute to open this popup', 'creatus')
                            ),
                            'popup_trigger' => array(
                                'type' => 'multi-picker',
                                'label' => false,
                                'desc' => false,
                                'show_borders' => true,
                                'picker' => array(
                                    'picked' => array(
                                        'label' => __('Popup trigger', 'creatus'),
                                        'desc' => esc_html__('Select trigger link type', 'creatus'),
                                        'help' => esc_html__('If set to none, no link to popup will be shown but you can use popup id to open this popup via link href attribute.', 'creatus'),
                                        'type' => 'short-select',
                                        'value' => 'link',
                                        'choices' => array(
                                            'none' => esc_html__('None', 'creatus'),
                                            'link' => esc_html__('Link', 'creatus'),
                                            'image' => esc_html__('Image', 'creatus')
                                        )
                                    )
                                ),
                                'choices' => array(
                                    'link' => array(
                                        'trigger' => array(
                                            'type' => 'text',
                                            'label' => __('Popup link text', 'creatus'),
                                            'value' => 'Open Popup',
                                            'desc' => esc_html__('Set popup trigger link text.', 'creatus')
                                        )
                                    ),
                                    'image' => array(
                                        'trigger' => array(
                                            'type' => 'upload',
                                            'label' => __('Select image', 'creatus'),
                                            'desc' => esc_html__('Select popup trigger image', 'creatus'),
                                            'images_only' => true
                                        ),
                                        'mx' => array(
                                            'type' => 'thz-multi-options',
                                            'label' => __('Image metrics', 'creatus'),
                                            'desc' => esc_html__('Adjust image alt , width and height', 'creatus'),
                                            'value' => array(
                                                'a' => '',
                                                'w' => 100,
                                                'h' => 100
                                            ),
                                            'thz_options' => array(
                                                'a' => array(
                                                    'type' => 'short-text',
                                                    'title' => esc_html__('Alt text', 'creatus')
                                                ),
                                                'w' => array(
                                                    'type' => 'spinner',
                                                    'title' => esc_html__('Width', 'creatus'),
                                                    'addon' => 'px'
                                                ),
                                                'h' => array(
                                                    'type' => 'spinner',
                                                    'title' => esc_html__('Height', 'creatus'),
                                                    'addon' => 'px'
                                                )
                                            )
                                        )
                                    )
                                )
                            ),
                            'bd' => array(
                                'type' => 'thz-multi-options',
                                'label' => __('Backdrop metrics', 'creatus'),
                                'desc' => esc_html__('Adjust popup backdrop', 'creatus'),
                                'value' => array(
                                    's' => 'mfp-dark',
                                    'o' => 'mfp-opacity-08'
                                ),
                                'thz_options' => array(
                                    's' => array(
                                        'type' => 'short-select',
                                        'title' => esc_html__('Style', 'creatus'),
                                        'choices' => array(
                                            'mfp-light' => esc_html__('Light', 'creatus'),
                                            'mfp-dark' => esc_html__('Dark', 'creatus')
                                        )
                                    ),
                                    'o' => array(
                                        'type' => 'short-select',
                                        'title' => esc_html__('Opacity', 'creatus'),
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
                                    )
                                )
                            )
                        )
                    ),
                    'popuptab' => array(
                        'title' => __('Popup', 'creatus'),
                        'type' => 'tab',
                        'options' => array(
                            'type' => array(
                                'type' => 'multi-picker',
                                'label' => false,
                                'desc' => false,
                                'picker' => array(
                                    'picked' => array(
                                        'label' => __('Popup Type', 'creatus'),
                                        'desc' => esc_html__('Select popup type', 'creatus'),
                                        'type' => 'short-select',
                                        'value' => 'mfp-inline',
                                        'choices' => array(
                                            'mfp-inline' => esc_html__('Modal', 'creatus'),
                                            'mfp-image' => esc_html__('Image', 'creatus'),
                                            'mfp-ajax' => esc_html__('Ajax', 'creatus'),
                                            'mfp-iframe' => esc_html__('Iframe', 'creatus'),
                                            'mfp-video' => esc_html__('Video', 'creatus'),
                                            'mfp-audio' => esc_html__('Audio', 'creatus')
                                        )
                                    )
                                ),
                                'choices' => array(
                                    'mfp-inline' => array(
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
                                        'modal_heading' => array(
                                            'type' => 'text',
                                            'label' => __('Modal heading', 'creatus'),
                                            'value' => '',
                                            'desc' => esc_html__('Not shown if left empty.', 'creatus')
                                        ),
                                        'modal_content' => array(
                                            'type' => 'wp-editor',
                                            'size' => 'large',
                                            'editor_height' => 100,
                                            'editor_type' => 'tinymce',
                                            'wpautop' => false,
                                            'shortcodes' => true,
                                            'value' => 'This is dummy modal text please replace it with your own content.',
                                            'label' => __('Modal Content', 'creatus')
                                        )
                                    ),
                                    'mfp-image' => array(
                                        'image' => array(
                                            'type' => 'upload',
                                            'label' => __('Popup image', 'creatus'),
                                            'desc' => esc_html__('Select popup image', 'creatus'),
                                            'images_only' => true
                                        ),
                                        'short_description' => array(
                                            'type' => 'text',
                                            'label' => __('Popup description', 'creatus'),
                                            'value' => '',
                                            'desc' => esc_html__('Shown under the popup. Not shown if left empty.', 'creatus')
                                        )
                                    ),
                                    'mfp-ajax' => array(
                                        'ajax_link' => array(
                                            'type' => 'text',
                                            'label' => __('Ajax content link', 'creatus'),
                                            'value' => '',
                                            'desc' => esc_html__('Set ajax content link. Must be on your domain.', 'creatus')
                                        )
                                    ),
                                    'mfp-iframe' => array(
                                        'iframe_link' => array(
                                            'type' => 'text',
                                            'label' => __('Iframe content link', 'creatus'),
                                            'value' => '',
                                            'desc' => esc_html__('Set iframe content link. This can also be Youtube video, Vimeo video or Google map link.', 'creatus')
                                        ),
                                        'short_description' => array(
                                            'type' => 'text',
                                            'label' => __('Popup description', 'creatus'),
                                            'value' => '',
                                            'desc' => esc_html__('Shown under the popup. Not shown if left empty.', 'creatus')
                                        )
                                    ),
                                    'mfp-video' => array(
                                        'video' => array(
                                            'type' => 'multi-upload',
                                            'value' => array(),
                                            'label' => __('Upload/select video', 'creatus'),
                                            'desc' => esc_html__('Allowed  video formats are; mp4, webm, and ogv. You can select all 3 video types at once.', 'creatus'),
                                            'images_only' => false,
                                            'files_ext' => array(
                                                'mp4',
                                                'webm',
                                                'ogv'
                                            )
                                        ),
                                        'poster' => array(
                                            'type' => 'upload',
                                            'value' => array(),
                                            'label' => __('Poster image', 'creatus'),
                                            'desc' => esc_html__('Insert a poster image for this media.', 'creatus'),
                                            'images_only' => true
                                        ),
                                        'short_description' => array(
                                            'type' => 'text',
                                            'label' => __('Popup description', 'creatus'),
                                            'value' => '',
                                            'desc' => esc_html__('Shown under the popup. Not shown if left empty.', 'creatus')
                                        )
                                    ),
                                    'mfp-audio' => array(
                                        'audio' => array(
                                            'type' => 'multi-upload',
                                            'value' => array(),
                                            'label' => __('Upload/select audio', 'creatus'),
                                            'desc' => esc_html__('Allowed audio formats are; mp3, wav, and ogg. You can select all 3 audio types at once.', 'creatus'),
                                            'images_only' => false,
                                            'files_ext' => array(
                                                'mp3',
                                                'wav',
                                                'ogg'
                                            )
                                        ),
                                        'short_description' => array(
                                            'type' => 'text',
                                            'label' => __('Popup description', 'creatus'),
                                            'value' => '',
                                            'desc' => esc_html__('Shown under the popup. Not shown if left empty.', 'creatus')
                                        )
                                    )
                                )
                            ),
                            'effect' => array(
                                'label' => __('Popup effect', 'creatus'),
                                'desc' => esc_html__('Select popup window opening effect', 'creatus'),
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
                            )
                        )
                    )
                )
            )
        )
    )
);
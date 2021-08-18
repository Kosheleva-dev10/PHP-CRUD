<?php
if (!defined('FW')) {
	die('Forbidden');
}
$posts_vars         = fw_get_variables_from_file(dirname(__FILE__) . '/post_settings.php', array(
	'options' => null
));
$posts_settings     = $posts_vars['options'];
$custom_pagination  = fw()->theme->get_options('pagination_settings');
$woo_posts_settings = array();
unset($custom_pagination['paginationsettinsggroup']['options']['pagination_template']);
if (class_exists('WooCommerce')) {
	$woo_posts_vars     = fw_get_variables_from_file(dirname(__FILE__) . '/woo_post_settings.php', array(
		'options' => null
	));
	$woo_posts_settings = $woo_posts_vars['options'];
}
$formats_styling = fw()->theme->get_options('post_formats_settings');
$fs_collected    = array();
fw_collect_options($fs_collected, $formats_styling);
foreach ($fs_collected as $id => $option) {
	$fs_collected[$id]['value'] = fw_get_db_settings_option($id, isset($option['value']) ? $option['value'] : null);
}


$all_items_media_size	= thz_get_image_sizes_list();
$custom_item_media_size = array(
	'default' => esc_html('Default', 'creatus')
);

$custom_item_media_size = array_merge($custom_item_media_size, $all_items_media_size );

$options = array(
	'datatab' => array(
		'title' => __('Query', 'creatus'),
		'type' => 'tab',
		'lazy_tabs' => false,
		'options' => array(
			'id' => array(
				'type' => 'unique',
				'length' => 8
			),
			'types' => array(
				'label' => __('Post types', 'creatus'),
				'desc' => esc_html__('Select post types. If none is selected WordPress default post type is used.', 'creatus'),
				'help' => esc_html__('If you select custom items this option is not limiting post types. However if your custom items are products than check the Product post type so that all required Woo scripts ale loaded.', 'creatus'),
				'value' => array(
					'post' => true
				),
				'type' => 'checkboxes',
				'inline' => true,
				'choices' => thz_list_post_types(true, array(
					'forum',
					'topic',
					'reply'
				))
			),
			'posts_mx' => array(
				'type' => 'thz-multi-options',
				'label' => __('Query metrics', 'creatus'),
				'desc' => esc_html__('Select number of posts and set their order. (Items -1 = all) ', 'creatus'),
				'value' => array(
					'items' => 9,
					'order' => 'DESC',
					'orderby' => 'date',
					'days' => 'all_posts'
				),
				'thz_options' => array(
					'items' => array(
						'type' => 'spinner',
						'title' => esc_html__('Items', 'creatus'),
						'addon' => '#',
						'min' => -1,
						'max' => 100
					),
					'order' => array(
						'type' => 'short-select',
						'title' => esc_html__('Order', 'creatus'),
						'choices' => array(
							'DESC' => esc_html__('Descending ( newest first )', 'creatus'),
							'ASC' => esc_html__('Ascending ( oldest first )', 'creatus')
						)
					),
					'orderby' => array(
						'type' => 'short-select',
						'title' => esc_html__('Order by', 'creatus'),
						'choices' => array(
							'ID' => esc_html__('ID', 'creatus'),
							'author' => esc_html__('Author', 'creatus'),
							'title' => esc_html__('Title', 'creatus'),
							'name' => esc_html__('Name', 'creatus'),
							'date' => esc_html__('Create date', 'creatus'),
							'modified' => esc_html__('Modified date', 'creatus'),
							'rand' => esc_html__('Random', 'creatus'),
							'comment_count' => esc_html__('Number of comments', 'creatus'),
							'meta_value' => esc_html__('Post views count', 'creatus'),
							'none' => esc_html__('None', 'creatus'),
							'post__in' => esc_html__('Specific posts', 'creatus')
						)
					),
					'days' => array(
						'type' => 'short-select',
						'title' => esc_html__('Published limit', 'creatus'),
						'choices' => array(
							'all_posts' => esc_html__('No limit', 'creatus'),
							'7' => esc_html__('Show 1 Week old posts', 'creatus'),
							'30' => esc_html__('Show 1 Month old posts', 'creatus'),
							'90' => esc_html__('Show 3 Months old posts', 'creatus'),
							'180' => esc_html__('Show 6 Months old posts', 'creatus'),
							'360' => esc_html__('Show 1 Year old posts', 'creatus')
						)
					)
				)
			),
			'categories' => array(
				'type' => 'multi-select',
				'value' => array(),
				'label' => __('Specific categories', 'creatus'),
				'desc' => esc_html__('Start typing the category names', 'creatus'),
				'population' => 'taxonomy',
				'source' => array(
					'category',
					'product_cat',
					'page_category',
					'fw-portfolio-category',
					'fw-event-taxonomy-name'
				),
				'show-type'=> true,
			),
			'tags' => array(
				'type' => 'multi-select',
				'value' => array(),
				'label' => __('Specific tags', 'creatus'),
				'desc' => esc_html__('Start typing the tag names', 'creatus'),
				'population' => 'taxonomy',
				'source' => array(
					'post_tag',
					'fw-portfolio-tag',
					'product_tag'
				)
			),
			'author' => array(
				'type' => 'multi-select',
				'value' => array(),
				'label' => __('Specific author', 'creatus'),
				'desc' => esc_html__('Start typing the user names. ', 'creatus'),
				'population' => 'users',
				'source' => array(
					'editor',
					'subscriber',
					'author',
					'administrator'
				)
			),
			'specific' => array(
				'type' => 'multi-select',
				'value' => array(),
				'label' => __('Specific posts', 'creatus'),
				'desc' => esc_html__('Start typing the post names.', 'creatus'),
				'population' => 'posts',
				'source' => thz_list_post_types(false, array(
					'forum',
					'topic',
					'reply'
				))
			),
			'exclude' => array(
				'type' => 'multi-select',
				'value' => array(),
				'label' => __('Exclude posts', 'creatus'),
				'desc' => esc_html__('Start typing the post names.', 'creatus'),
				'population' => 'posts',
				'source' => thz_list_post_types(false, array(
					'forum',
					'topic',
					'reply'
				))
			)
		)
	),
	'layouttab' => array(
		'title' => __('Layout', 'creatus'),
		'type' => 'tab',
		'lazy_tabs' => false,
		'options' => array(
			'cbs' => array(
				'type' => 'thz-box-style',
				'label' => __('Container box style', 'creatus'),
				'preview' => true,
				'desc' => esc_html__('Adjust .thz-posts-holder box style', 'creatus'),
				'button-text' => esc_html__('Customize container box style', 'creatus'),
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
			'mode' => array(
				'label' => __('Layout mode', 'creatus'),
				'desc' => esc_html__('Select posts layout mode.', 'creatus'),
				'type' => 'short-select',
				'attr' => array(
					'class' => 'thz-select-switch'
				),
				'value' => 'grid',
				'choices' => array(
					'grid' => array(
						'text' => esc_html__('Grid', 'creatus'),
						'attr' => array(
							'data-enable' => 'pgrid,pagination,animate,.thz-posts-filter-li',
							'data-disable' => '.thz-tab-slider-li,.thz-tab-timeline-li'
						)
					),
					'slider' => array(
						'text' => esc_html__('Slider', 'creatus'),
						'attr' => array(
							'data-enable' => '.thz-tab-slider-li',
							'data-disable' => 'pgrid,.thz-tab-timeline-li,pagination,animate,.thz-posts-filter-li'
						)
					),
					'timeline' => array(
						'text' => esc_html__('Timeline', 'creatus'),
						'attr' => array(
							'data-enable' => '.thz-tab-timeline-li,pagination,animate',
							'data-disable' => 'pgrid,.thz-tab-slider-li,.thz-posts-filter-li'
						)
					)
				)
			),
			'pgrid' => array(
				'type' => 'thz-multi-options',
				'label' => __('Grid settings', 'creatus'),
				'desc' => esc_html__('Adjust grid settings. See help for more info.', 'creatus'),
				'help' => esc_html__('If the .thz-grid-item-in width is less than desired min width, the columns number drops down by one in order to honor the min width setting. This adjustment is active only if media container height is anything else but metro. On the other hand if the window width is below 980px and grid has more than 2 columns, only 2 columns are shown. Under 767px 1 column is shown.', 'creatus'),
				'value' => array(
					'columns' => 3,
					'gutter' => 30,
					'minwidth' => 200,
					'isotope' => 'packery'
				),
				'thz_options' => array(
					'columns' => array(
						'type' => 'select',
						'title' => esc_html__('Columns', 'creatus'),
						'choices' => array(
							'1' => esc_html__('1', 'creatus'),
							'2' => esc_html__('2', 'creatus'),
							'3' => esc_html__('3', 'creatus'),
							'4' => esc_html__('4', 'creatus'),
							'5' => esc_html__('5', 'creatus'),
							'6' => esc_html__('6', 'creatus')
						)
					),
					'gutter' => array(
						'type' => 'spinner',
						'title' => esc_html__('Gutter', 'creatus'),
						'addon' => 'px',
						'min' => 0,
						'max' => 200
					),
					'minwidth' => array(
						'type' => 'spinner',
						'title' => esc_html__('Item min width', 'creatus'),
						'addon' => 'px'
					),
					'isotope' => array(
						'type' => 'short-select',
						'title' => esc_html__('Isotope mode', 'creatus'),
						'choices' => array(
							'packery' => esc_html__('Packery ( Masonry, place items where they fit )', 'creatus'),
							'fitRows' => esc_html__('fitRows ( Row height by tallest item in row )', 'creatus'),
							'vertical' => esc_html__('Vertical ( best with 1 column grid ) ', 'creatus')
						)
					)
				)
			),
			'pagination' => array(
				'type' => 'multi-picker',
				'label' => false,
				'desc' => false,
				'picker' => array(
					'picked' => array(
						'label' => __('Pagination type', 'creatus'),
						'desc' => esc_html__('Select posts pagination type', 'creatus'),
						'type' => 'radio',
						'value' => 'click',
						'choices' => array(
							'click' => esc_html__('On click ( ajax ) ', 'creatus'),
							'scroll' => esc_html__('On scroll ( ajax )', 'creatus'),
							'pagination' => esc_html__('Pagination', 'creatus'),
							'none' => esc_html__('None ( no pagination )', 'creatus')
						),
						'inline' => true
					)
				),
				'choices' => array(
					'pagination' => array(
						'p' => array(
							'type' => 'addable-popup',
							'value' => array(),
							'label' => __('Custom pagination', 'creatus'),
							'desc' => esc_html__('Add custom pagination options for this shortcode or leave as is for theme defaults.', 'creatus'),
							'template' => esc_html__('Custom pagination', 'creatus'),
							'popup-title' => null,
							'size' => 'large',
							'limit' => 1,
							'add-button-text' => esc_html__('Add custom pagination', 'creatus'),
							'sortable' => false,
							'popup-options' => array(
								$custom_pagination
							)
						)
					),
					'click' => array(
						'items_load' => array(
							'type' => 'thz-spinner',
							'addon' => '#',
							'min' => -1,
							'max' => 100,
							'label' => __('Number of posts', 'creatus'),
							'value' => 6,
							'desc' => esc_html__('Number of posts to load on more button click. ( -1 = all )', 'creatus')
						),
						'more_button' => array(
							'type' => 'popup',
							'size' => 'large',
							'label' => __('Load more button', 'creatus'),
							'button' => esc_html__('Edit load more button', 'creatus'),
							'popup-title' => esc_html__('More button settings', 'creatus'),
							'popup-options' => array(
								'button' => array(
									'type' => 'thz-button',
									'value' => array(
										'activeColor' => 'theme',
										'buttonText' => 'Load more',
										'html' => '<div class="thz-btn-container"><a class="thz-button thz-btn-theme thz-btn-normal thz-radius-4 thz-btn-border-1 thz-align-center" href="#"><span class="thz-btn-text thz-fs-14 thz-fw-400">Load more</span></a></div>'
									),
									'label' => false,
									'hidelinks' => true
								)
							)
						)
					),
					'scroll' => array(
						'items_load' => array(
							'type' => 'thz-spinner',
							'addon' => '#',
							'min' => -1,
							'max' => 100,
							'label' => __('Number of posts', 'creatus'),
							'value' => 6,
							'desc' => esc_html__('Number of posts to load on scroll. ( -1 = all )', 'creatus')
						)
					)
				)
			),

			'cmx' => _thz_container_metrics_defaults()
		)
	),
	'slidertab' => array(
		'title' => __('Slider settings', 'creatus'),
		'type' => 'tab',
		'li-attr' => array(
			'class' => 'thz-tab-slider-li'
		),
		'lazy_tabs' => false,
		'options' => array(
			fw()->theme->get_options('slider_settings')
		)
	),
	'timelinetab' => array(
		'title' => __('Timeline settings', 'creatus'),
		'type' => 'tab',
		'li-attr' => array(
			'class' => 'thz-tab-timeline-li'
		),
		'lazy_tabs' => false,
		'options' => array(
			'tml_mx' => array(
				'type' => 'thz-multi-options',
				'label' => __('Timeline metrics', 'creatus'),
				'desc' => esc_html__('Adjust timeline layout and colors', 'creatus'),
				'value' => array(
					'c' => 2,
					'w' => 1,
					'r' => 4,
					'b' => '',
					'bg' => '',
					'd' => '',
					'my' => ''
				),
				'thz_options' => array(
					'c' => array(
						'type' => 'select',
						'title' => esc_html__('Columns', 'creatus'),
						'choices' => array(
							'1' => esc_html__('1', 'creatus'),
							'2' => esc_html__('2', 'creatus')
						)
					),
					'w' => array(
						'type' => 'select',
						'title' => esc_html__('Borders width', 'creatus'),
						'choices' => array(
							'1' => esc_html__('1', 'creatus'),
							'2' => esc_html__('2', 'creatus'),
							'3' => esc_html__('3', 'creatus'),
						)
					),
					'r' => array(
						'type' => 'spinner',
						'title' => esc_html__('Date radius', 'creatus'),
						'addon' => 'px',
						'min' => 0,
						'max' => 20,
					),
					'b' => array(
						'type' => 'color',
						'title' => esc_html__('Borders', 'creatus'),
						'box' => true
					),
					'bg' => array(
						'type' => 'color',
						'title' => esc_html__('Backgrounds', 'creatus'),
						'box' => true
					),
					'd' => array(
						'type' => 'color',
						'title' => esc_html__('Day', 'creatus'),
						'box' => true
					),
					'my' => array(
						'type' => 'color',
						'title' => esc_html__('Month&year', 'creatus'),
						'box' => true
					)
				)
			),
		)
	),
	'mediatab' => array(
		'title' => __('Media', 'creatus'),
		'type' => 'tab',
		'li-attr' => array(
			'class' => 'thz-tab-posts-mediatab'
		),
		'lazy_tabs' => false,
		'options' => array(
			'media_height' => array(
				'type' => 'multi-picker',
				'label' => false,
				'desc' => false,
				'picker' => array(
					'picked' => array(
						'label' => __('Media container height', 'creatus'),
						'desc' => esc_html__('Set media container height.', 'creatus'),
						'type' => 'select',
						'value' => 'thz-ratio-1-1',
						'choices' => array(
							array( // optgroup
								'attr' => array(
									'label' => __('Misc', 'creatus')
								),
								'choices' => array(
									'auto' => esc_html__('Auto ( best for masonry )', 'creatus'),
									'metro' => esc_html__('Metro ( use in grid layout only ) ', 'creatus'),
									'custom' => esc_html__('Custom', 'creatus')
								)
							),
							array( // optgroup
								'attr' => array(
									'label' => __('Square', 'creatus')
								),
								'choices' => array(
									'thz-ratio-1-1' => esc_html__('Aspect ratio 1:1', 'creatus')
								)
							),
							array( // optgroup
								'attr' => array(
									'label' => __('Landscape', 'creatus')
								),
								'choices' => array(
									'thz-ratio-2-1' => esc_html__('Aspect ratio 2:1', 'creatus'),
									'thz-ratio-3-2' => esc_html__('Aspect ratio 3:2', 'creatus'),
									'thz-ratio-4-3' => esc_html__('Aspect ratio 4:3', 'creatus'),
									'thz-ratio-16-9' => esc_html__('Aspect ratio 16:9', 'creatus'),
									'thz-ratio-21-9' => esc_html__('Aspect ratio 21:9', 'creatus')
								)
							),
							array( // optgroup
								'attr' => array(
									'label' => __('Portrait', 'creatus')
								),
								'choices' => array(
									'thz-ratio-1-2' => esc_html__('Aspect ratio 1:2', 'creatus'),
									'thz-ratio-3-4' => esc_html__('Aspect ratio 3:4', 'creatus'),
									'thz-ratio-2-3' => esc_html__('Aspect ratio 2:3', 'creatus'),
									'thz-ratio-9-16' => esc_html__('Aspect ratio 9:16', 'creatus')
								)
							)
						)
					)
				),
				'choices' => array(
					'metro' => array(
						'sequence' => _thz_metro_sequence_option()
					),
					'custom' => array(
						'height' => array(
							'type' => 'thz-spinner',
							'addon' => 'px',
							'min' => 0,
							'label' => '',
							'value' => 350,
							'desc' => esc_html__('Media container height. ', 'creatus')
						)
					)
				)
			),
			'image_size' => array(
				'label' => __('Post image size', 'creatus'),
				'desc' => esc_html__('Select the image size to be used in posts.', 'creatus'),
				'value' => 'thz-img-large',
				'type' => 'short-select',
				'choices' => $all_items_media_size
			),
			'use_poster' => array(
				'label' => __('Media posters', 'creatus'),
				'desc' => esc_html__('Activate media posters for all media types except images. See help for more info. ', 'creatus'),
				'help' => esc_html__('If this option is inactive, all videos and iframes load on pageload and increase page load time. This option adds a preview poster which than activates the media on click. ', 'creatus'),
				'type' => 'switch',
				'right-choice' => array(
					'value' => 'inactive',
					'label' => __('Inactive', 'creatus')
				),
				'left-choice' => array(
					'value' => 'active',
					'label' => __('Active', 'creatus')
				),
				'value' => 'active'
			),
			'grayscale' => array(
				'label' => __('Post image grayscale', 'creatus'),
				'desc' => esc_html__('Add grayscale effect to media images', 'creatus'),
				'value' => 'none',
				'type' => 'radio',
				'inline' => true,
				'choices' => array(
					'none' => esc_html__('Inactive', 'creatus'),
					'thz-grayscale' => esc_html__('Active', 'creatus'),
					'thz-grayscale-add' => esc_html__('Active on hover', 'creatus'),
					'thz-grayscale-remove' => esc_html__('Remove on hover', 'creatus')
				)
			),
			'post_slider' => array(
				'type' => 'thz-multi-options',
				'label' => __('Posts slider layout', 'creatus'),
				'desc' => esc_html__('Adjust posts media slider layout. See help for more info', 'creatus'),
				'help' => esc_html__('Every post can have multiple media thus creating posts media slider, the Slides option can show only first slide instead which would also increase the site speed. Note that Gallery post format will always display all slides.', 'creatus'),
				'value' => array(
					'showall' => 'all',
					'show' => '1',
					'scroll' => '1',
					'space' => '0',
					'dots' => 'inside',
					'arrows' => 'show'
				),
				'thz_options' => array(
					'showall' => array(
						'type' => 'short-select',
						'title' => esc_html__('Slides', 'creatus'),
						'attr' => array(
							'class' => 'thz-select-switch'
						),
						'value' => 'grid',
						'choices' => array(
							'all' => array(
								'text' => esc_html__('Show all', 'creatus'),
								'attr' => array(
									'data-enable' => '.show-tz-all-parent,posts_slider_an'
								)
							),
							'first' => array(
								'text' => esc_html__('Show only first', 'creatus'),
								'attr' => array(
									'data-disable' => '.show-tz-all-parent,posts_slider_an'
								)
							)
						)
					),
					'show' => array(
						'type' => 'select',
						'title' => esc_html__('Slides to show', 'creatus'),
						'choices' => array(
							'1' => esc_html__('1', 'creatus'),
							'2' => esc_html__('2', 'creatus'),
							'3' => esc_html__('3', 'creatus'),
							'4' => esc_html__('4', 'creatus'),
							'5' => esc_html__('5', 'creatus'),
							'6' => esc_html__('6', 'creatus')
						),
						'attr' => array(
							'class' => 'show-tz-all'
						)
					),
					'scroll' => array(
						'type' => 'select',
						'title' => esc_html__('Slides to scroll', 'creatus'),
						'choices' => array(
							'1' => esc_html__('1', 'creatus'),
							'2' => esc_html__('2', 'creatus'),
							'3' => esc_html__('3', 'creatus'),
							'4' => esc_html__('4', 'creatus'),
							'5' => esc_html__('5', 'creatus'),
							'6' => esc_html__('6', 'creatus')
						),
						'attr' => array(
							'class' => 'show-tz-all'
						)
					),
					'space' => array(
						'type' => 'spinner',
						'title' => esc_html__('Slides space', 'creatus'),
						'addon' => 'px',
						'min' => 0,
						'attr' => array(
							'class' => 'show-tz-all'
						)
					),
					'dots' => array(
						'type' => 'short-select',
						'title' => esc_html__('Navigation dots', 'creatus'),
						'choices' => array(
							'hide' => esc_html__('Hide', 'creatus'),
							'inside' => esc_html__('Inside', 'creatus'),
							'outside' => esc_html__('Outside', 'creatus')
						),
						'attr' => array(
							'class' => 'show-tz-all'
						)
					),
					'arrows' => array(
						'type' => 'short-select',
						'title' => esc_html__('Arrows', 'creatus'),
						'choices' => array(
							'hide' => esc_html__('Hide', 'creatus'),
							'show' => esc_html__('Show', 'creatus')
						),
						'attr' => array(
							'class' => 'show-tz-all'
						)
					)
				)
			),
			'posts_slider_an' => array(
				'type' => 'thz-multi-options',
				'label' => __('Posts slider animation', 'creatus'),
				'desc' => esc_html__('Adjust posts slider. Hover over help icon for more info.', 'creatus'),
				'help' => esc_html__('Speed: Slide animation speed<br />Auto slide: If set to Yes, slider will start on page load<br />Auto time: Time till next slide transition<br />Infinite: If set to Yes, slides will loop infinitely<br />1000ms = 1s', 'creatus'),
				'value' => array(
					'speed' => 300,
					'autoplay' => 0,
					'autoplayspeed' => 3000,
					'fade' => 0,
					'infinite' => 1
				),
				'thz_options' => array(
					'speed' => array(
						'type' => 'spinner',
						'title' => esc_html__('Speed', 'creatus'),
						'addon' => 'ms',
						'min' => 0,
						'step' => 50,
						'max' => 1500
					),
					'autoplay' => array(
						'type' => 'select',
						'title' => esc_html__('Auto slide', 'creatus'),
						'choices' => array(
							0 => esc_html__('No', 'creatus'),
							1 => esc_html__('Yes', 'creatus')
						)
					),
					'autoplayspeed' => array(
						'type' => 'spinner',
						'title' => esc_html__('Auto time', 'creatus'),
						'addon' => 'ms',
						'min' => 0,
						'step' => 50,
						'max' => 10000
					),
					'fade' => array(
						'type' => 'select',
						'title' => esc_html__('Fade', 'creatus'),
						'choices' => array(
							0 => esc_html__('No', 'creatus'),
							1 => esc_html__('Yes', 'creatus')
						)
					),
					'infinite' => array(
						'type' => 'select',
						'title' => esc_html__('Infinite', 'creatus'),
						'choices' => array(
							0 => esc_html__('No', 'creatus'),
							1 => esc_html__('Yes', 'creatus')
						)
					)
				)
			)
		)
	),
	'poststab' => array(
		'title' => __('Posts', 'creatus'),
		'type' => 'tab',
		'lazy_tabs' => false,
		'options' => array(
			$posts_settings
		)
	),
	'postsformatstab' => array(
		'title' => __('Posts formats', 'creatus'),
		'type' => 'tab',
		'lazy_tabs' => false,
		'options' => array(
			'pf' => array(
				'type' => 'addable-popup',
				'value' => array(),
				'label' => __('Post formats settings', 'creatus'),
				'desc' => esc_html__('Click Show posts formats button to display quotes, links, audio, video or gallery post formats', 'creatus'),
				'template' => esc_html__('Post formats are active', 'creatus'),
				'popup-title' => null,
				'size' => 'large',
				'limit' => 1,
				'add-button-text' => esc_html__('Show post formats', 'creatus'),
				'sortable' => false,
				'popup-options' => array(
					'audio_height' => array(
						'label' => __('Audio height', 'creatus'),
						'desc' => esc_html__('Select audio player height. Inherit from media container or show player only', 'creatus'),
						'type' => 'switch',
						'right-choice' => array(
							'value' => 'only',
							'label' => __('Show player only', 'creatus')
						),
						'left-choice' => array(
							'value' => 'inherit',
							'label' => __('Inherit from media container', 'creatus')
						),
						'value' => 'inherit'
					),
					'quote_height' => array(
						'label' => __('Quote height', 'creatus'),
						'desc' => esc_html__('Select quote height. Inherit from media container or auto.', 'creatus'),
						'type' => 'switch',
						'right-choice' => array(
							'value' => 'auto',
							'label' => __('Auto', 'creatus')
						),
						'left-choice' => array(
							'value' => 'inherit',
							'label' => __('Inherit from media container', 'creatus')
						),
						'value' => 'auto'
					),
					'quote_display' => array(
						'label' => __('Quote display mode', 'creatus'),
						'desc' => esc_html__('Select quote display mode. Only the quote or quote with meta, excerpt and footer', 'creatus'),
						'type' => 'switch',
						'right-choice' => array(
							'value' => 'only',
							'label' => __('Show quote only', 'creatus')
						),
						'left-choice' => array(
							'value' => 'detailed',
							'label' => __('Show quote and details', 'creatus')
						),
						'value' => 'detailed'
					),
					'link_height' => array(
						'label' => __('Link height', 'creatus'),
						'desc' => esc_html__('Select link post format height. Inherit from media container or auto.', 'creatus'),
						'type' => 'switch',
						'right-choice' => array(
							'value' => 'auto',
							'label' => __('Auto', 'creatus')
						),
						'left-choice' => array(
							'value' => 'inherit',
							'label' => __('Inherit from media container', 'creatus')
						),
						'value' => 'auto'
					),
					'link_display' => array(
						'label' => __('Link display mode', 'creatus'),
						'desc' => esc_html__('Select link display mode. Only the link or link with meta, excerpt and footer', 'creatus'),
						'type' => 'switch',
						'right-choice' => array(
							'value' => 'only',
							'label' => __('Show link only', 'creatus')
						),
						'left-choice' => array(
							'value' => 'detailed',
							'label' => __('Show link and details', 'creatus')
						),
						'value' => 'detailed'
					),
					's' => array(
						'type' => 'addable-popup',
						'value' => array(),
						'label' => __('Styling', 'creatus'),
						'desc' => esc_html__('Add custom post formats styling for this element or leave as is for theme defaults.', 'creatus'),
						'template' => esc_html__('Custom post formats styling ', 'creatus'),
						'popup-title' => null,
						'size' => 'large',
						'limit' => 1,
						'add-button-text' => esc_html__('Add custom formats styling', 'creatus'),
						'sortable' => false,
						'popup-options' => array(
							$formats_styling
						)
					)
				)
			)
		)
	),
	$woo_posts_settings,
	'tabfiltersettings' => array(
		'title' => __('Filter', 'creatus'),
		'type' => 'tab',
		'lazy_tabs' => false,
		'li-attr' => array(
			'class' => 'thz-posts-filter-li'
		),
		'options' => array(
			'filter' => array(
				'type' => 'multi-picker',
				'label' => false,
				'desc' => false,
				'show_borders' => true,
				'picker' => array(
					'picked' => array(
						'label' => __('Show filter', 'creatus'),
						'desc' => esc_html__('Show/hide sorting filter.', 'creatus'),
						'type' => 'switch',
						'right-choice' => array(
							'value' => 'hide',
							'label' => __('Hide', 'creatus')
						),
						'left-choice' => array(
							'value' => 'show',
							'label' => __('Show', 'creatus')
						),
						'value' => 'show'
					)
				),
				'choices' => array(
					'show' => array(
						'filter_bs' => array(
							'type' => 'thz-box-style',
							'label' => __('Filter box style', 'creatus'),
							'preview' => true,
							'desc' => esc_html__('Adjust .thz-posts-filter box style', 'creatus'),
							'button-text' => esc_html__('Customize filter box style', 'creatus'),
							'popup' => true,
							'disable' => array(
								'video'
							),
							'value' => array(
								'margin' => array(
									'top' => 0,
									'right' => 0,
									'bottom' => 30,
									'left' => 0
								)
							)
						),
						'fm' => array(
							'type' => 'thz-multi-options',
							'label' => __('Filter link metrics', 'creatus'),
							'desc' => esc_html__('Adjust filter link metrics.', 'creatus'),
							'value' => array(
								'ta' => 'left',
								'vp' => 0,
								'hp' => 0,
								'mr' => 15,
								'br' => 0
							),
							'thz_options' => array(
								'ta' => array(
									'type' => 'short-select',
									'title' => esc_html__('Links position', 'creatus'),
									'choices' => array(
										'left' => esc_html__('Left', 'creatus'),
										'right' => esc_html__('Right', 'creatus'),
										'center' => esc_html__('Center', 'creatus')
									)
								),
								'vp' => array(
									'type' => 'spinner',
									'title' => esc_html__('Padding-v', 'creatus'),
									'addon' => 'px'
								),
								'hp' => array(
									'type' => 'spinner',
									'title' => esc_html__('Padding-h', 'creatus'),
									'addon' => 'px',
									'min' => 0
								),
								'mr' => array(
									'type' => 'spinner',
									'title' => esc_html__('Side space', 'creatus'),
									'addon' => 'px',
									'min' => -500
								),
								'br' => array(
									'type' => 'spinner',
									'title' => esc_html__('Border radius', 'creatus'),
									'addon' => 'px'
								)
							)
						),
						'fl' => array(
							'type' => 'thz-multi-options',
							'label' => __('Filter link style', 'creatus'),
							'desc' => esc_html__('Adjust filter links style. Hovered link takes properties from active link.', 'creatus'),
							'value' => array(
								'ac' => 'color_1',
								'ab' => '',
								'hc' => '',
								'hb' => ''
							),
							'thz_options' => array(
								'ac' => array(
									'type' => 'color',
									'title' => esc_html__('Active color', 'creatus'),
									'box' => true
								),
								'ab' => array(
									'type' => 'color',
									'title' => esc_html__('Active background', 'creatus'),
									'box' => true
								),
								'hc' => array(
									'type' => 'color',
									'title' => esc_html__('Inactive color', 'creatus'),
									'box' => true
								),
								'hb' => array(
									'type' => 'color',
									'title' => esc_html__('Inactive background', 'creatus'),
									'box' => true
								)
							)
						),
						'ff' => array(
							'label' => __('Filter font', 'creatus'),
							'desc' => esc_html__('Filter links font metrics', 'creatus'),
							'type' => 'thz-typography',
							'value' => array(
								'weight'     => 600,
								'transform' => 'uppercase',
								'size' => 13,
							),
							'disable' => array('color','hovered','align'),
						)
					)
				)
			)
		)
	),
	'customitemstab' => array(
		'title' => __('Custom items', 'creatus'),
		'type' => 'tab',
		'options' => array(
			'ci' => array(
				'type' => 'addable-popup',
				'value' => array(),
				'label' => __('Custom items', 'creatus'),
				'desc' => esc_html__('Add custom items and change their media, title or link.', 'creatus'),
				'template' => '{{  if(t.length > 0){ }}{{- t }}{{ }else{ }} Post id - {{- p[0] }}{{ } }}',
				'popup-title' => esc_html__('Custom item options', 'creatus'),
				'size' => 'large',
				'add-button-text' => esc_html__('Add custom item', 'creatus'),
				'sortable' => true,
				'popup-options' => array(
					'p' => array(
						'type' => 'multi-select',
						'value' => array(),
						'label' => __('Item', 'creatus'),
						'desc' => esc_html__('To find an item start typing the post name.', 'creatus'),
						'population' => 'posts',
						'limit' => 1,
						'source' => thz_list_post_types(false, array(
							'forum',
							'topic',
							'reply'
						))
					),
					'm' => array(
						'label' => __('Item images', 'creatus'),
						'type' => 'multi-upload',
						'desc' => esc_html__('Select custom item images. Drag and drop selected images to change the order.', 'creatus'),
						'texts' => array(
							'button_add' => esc_html__('Select images', 'creatus'),
							'button_edit' => esc_html__('Edit images', 'creatus')
						)
					),
					'ms' => array(
						'label' => __('Item image size', 'creatus'),
						'desc' => esc_html__('Select the image size to be used.', 'creatus'),
						'value' => 'default',
						'type' => 'short-select',
						'choices' => $custom_item_media_size
					),
					't' => array(
						'type' => 'text',
						'label' => __('Item title', 'creatus'),
						'desc' => esc_html__('Set custom title', 'creatus')
					),
					'l' => array(
						'label' => __('Item link', 'creatus'),
						'desc' => esc_html__('Add custom link for this item', 'creatus'),
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
						'data-magnific' => '.thz-url-magnific,.magnificId',
						'data-hide' => 'hide-magnific hide-title'
					),
					'i' => array(
						'type' => 'textarea',
						'label' => __('Item intro', 'creatus'),
						'desc' => esc_html__('Set custom intro text', 'creatus')
					),
					'pp' => array(
						'type' => 'thz-multi-options',
						'label' => __('Item price', 'creatus'),
						'desc' => esc_html__('Set custom price. Applied to WooCommerce products only', 'creatus'),
						'value' => array(
							'c' => '',
							'cp' => 'left',
							'p' => '',
							'o' => ''
						),
						'thz_options' => array(
							'c' => array(
								'type' => 'short-text',
								'title' => esc_html__('Currency', 'creatus')
							),
							'cp' => array(
								'type' => 'select',
								'title' => esc_html__('Currency position', 'creatus'),
								'choices' => array(
									'left' => esc_html__('Left', 'creatus'),
									'right' => esc_html__('Right', 'creatus')
								)
							),
							'p' => array(
								'type' => 'short-text',
								'title' => esc_html__('Price', 'creatus')
							),
							'o' => array(
								'type' => 'short-text',
								'title' => esc_html__('Old price', 'creatus')
							)
						)
					),
					'cis' => array(
						'type' => 'addable-popup',
						'value' => array(),
						'label' => __('Item style', 'creatus'),
						'desc' => esc_html__('Add custom style for this item or leave as is for defaults.', 'creatus'),
						'template' => esc_html__('Custom item style is set', 'creatus'),
						'popup-title' => esc_html__('Item style', 'creatus'),
						'size' => 'large',
						'limit' => 1,
						'add-button-text' => esc_html__('Add custom item style', 'creatus'),
						'sortable' => false,
						'popup-options' => array(
							'tf' => array(
								'type' => 'thz-typography',
								'label' => __('Title font', 'creatus'),
								'desc' => esc_html__('Adjust item title font. Leave as is for defaults', 'creatus'),
								'value' => array(),
							),
							'if' => array(
								'type' => 'thz-typography',
								'label' => __('Intro text font', 'creatus'),
								'desc' => esc_html__('Adjust intro text font metrics. Leave as is for defaults', 'creatus'),
								'value' => array(),
								'disable' => array(
									'hovered',
									'text-shadow'
								),
							),
							'mx' => array(
								'type' => 'thz-multi-options',
								'label' => __('Meta', 'creatus'),
								'desc' => esc_html__('Adjust meta elements colors and font size. Leave as is for defaults', 'creatus'),
								'value' => array(
									'f' => '',
									'tc' => '',
									'lc' => '',
									'hlc' => '',
									'sep' => ''
								),
								'thz_options' => array(
									'f' => array(
										'type' => 'short-text',
										'title' => esc_html__('Font size', 'creatus')
									),
									'tc' => array(
										'type' => 'color',
										'title' => esc_html__('Text', 'creatus'),
										'box' => true
									),
									'lc' => array(
										'type' => 'color',
										'title' => esc_html__('Link', 'creatus'),
										'box' => true
									),
									'hlc' => array(
										'type' => 'color',
										'title' => esc_html__('Link Hovered', 'creatus'),
										'box' => true
									),
									'sep' => array(
										'type' => 'color',
										'title' => esc_html__('Separator', 'creatus'),
										'box' => true
									)
								)
							),
							'fx' => array(
								'type' => 'thz-multi-options',
								'label' => __('Footer', 'creatus'),
								'desc' => esc_html__('Adjust footer elements colors and font size. Leave as is for defaults', 'creatus'),
								'value' => array(
									'f' => '',
									'tc' => '',
									'lc' => '',
									'hlc' => '',
									'sep' => ''
								),
								'thz_options' => array(
									'f' => array(
										'type' => 'short-text',
										'title' => esc_html__('Font size', 'creatus')
									),
									'tc' => array(
										'type' => 'color',
										'title' => esc_html__('Text', 'creatus'),
										'box' => true
									),
									'lc' => array(
										'type' => 'color',
										'title' => esc_html__('Link', 'creatus'),
										'box' => true
									),
									'hlc' => array(
										'type' => 'color',
										'title' => esc_html__('Link Hovered', 'creatus'),
										'box' => true
									),
									'sep' => array(
										'type' => 'color',
										'title' => esc_html__('Separator', 'creatus'),
										'box' => true
									)
								)
							),
							'ov' => array(
								'type' => 'thz-multi-options',
								'label' => __('Overlays', 'creatus'),
								'desc' => esc_html__('Adjust item intro background and or overlay colors', 'creatus'),
								'value' => array(
									'i' => '',
									'color1' => '',
									'color2' => '',
								),
								'thz_options' => array(
									'i' => array(
										'type' => 'color',
										'title' => esc_html__('Intro bg', 'creatus'),
										'box' => true
									),
									'color1' => array(
										'type' => 'color',
										'title' => esc_html__('Color 1', 'creatus'),
										'box' => true
									),
									'color2' => array(
										'type' => 'color',
										'title' => esc_html__('Color 2', 'creatus'),
										'box' => true
									)
								)
							)
						)
					)
				)
			),
			'ciq' => array(
				'label' => __('Limit query', 'creatus'),
				'desc' => esc_html__('Limit query to these items. See help for more info. ', 'creatus'),
				'help' => esc_html__('If this option is set to Limit query, only custom items will be shown otherwise all items from selected query will be shown with custom options for the choosen custom items.', 'creatus'),
				'type' => 'switch',
				'right-choice' => array(
					'value' => 'limit',
					'label' => __('Limit query', 'creatus')
				),
				'left-choice' => array(
					'value' => 'donotlimit',
					'label' => __('Do not limit query', 'creatus')
				),
				'value' => 'donotlimit'
			)
		)
	),
	
	'postseffects' => array(
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
				'addlabel' => esc_html__('Animate posts', 'creatus'),
				'adddesc' => esc_html__('Add animation to the post HTML container', 'creatus')
			),
			'cpx' => _thz_container_parallax_default()
		)
	)
);

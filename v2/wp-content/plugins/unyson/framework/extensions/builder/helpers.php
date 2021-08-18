<?php if (!defined('FW')) die('Forbidden');

/**
 * Get builder item width data
 *
 * Default widths are specified in the config, but some builder types can have custom widths
 *
 * Usage example:
 * <div class="<?php echo esc_attr(fw_ext_builder_get_item_width('builder-type', $item['width'] .'/frontend_class')) ?>" >
 *
 * @param string $builder_type Builder option type (some builders can have different item widths)
 * @param null|string $width_id Specify width id (accepts multikey) or leave empty to get all widths
 * @param null|mixed $default_value Return this value if specified key does not exist
 * @return array
 */
function fw_ext_builder_get_item_width($builder_type, $width_id = null, $default_value = null) {
	try {
		$cache_key = fw()->extensions->get('builder')->get_cache_key('item_widths/'. $builder_type);

		$widths = FW_Cache::get($cache_key);
	} catch (FW_Cache_Not_Found_Exception $e) {
		if ($widths = fw()->extensions->get('builder')->get_config('default_item_widths')) {
			// Custom (old config key) widths are defined in theme (by default $cfg['default_item_widths'] is empty)
		} else {
			$widths = fw()->extensions->get('builder')->get_config('grid.columns'); // new config key
		}

		$widths = apply_filters('fw_builder_item_widths:'. $builder_type, $widths);

		FW_Cache::set($cache_key, $widths);
	}

	if (is_null($width_id)) {
		return $widths;
	} else {
		return fw_akg($width_id, $widths, $default_value);
	}
}

/**
 * Get builder item widths for using in js (wp_localize_script() or json_encode())
 *
 * @param string $builder_type Builder option type (some builders can have different item widths)
 * @return array
 */
function fw_ext_builder_get_item_widths_for_js($builder_type) {
	$item_widths = array();

	foreach (fw_ext_builder_get_item_width($builder_type) as $width_id => $width_data) {
		$width_data['id'] = $width_id;

		$item_widths[] = $width_data;
	}

	return $item_widths;
}

/**
 * @param string $icon A string that is meant to be an icon (an image, a font icon class, or something else)
 * @return string
 */
function fw_ext_builder_string_to_icon_html($icon) {
	if (preg_match('/\.(png|jpg|jpeg|gif|svg|webp)$/', $icon)) {
		// http://.../image.png
		return fw_html_tag('img', array(
			'class' => 'fw-ext-builder-icon',
			'src' => $icon
		));
	} elseif (preg_match('/^[a-zA-Z0-9\-_ ]+$/', $icon)) {
		// 'font-icon font-icon-class'
		return fw_html_tag('span', array(
			'class' => 'fw-ext-builder-icon '. trim($icon)
		), true);
	} else {
		// can't detect. maybe it's raw html '<span ...'
		return $icon;
	}
}
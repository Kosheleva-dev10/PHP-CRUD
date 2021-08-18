<?php

class Page_Builder_Sections_Slider_Item extends Page_Builder_Item
{
	public function get_type()
	{
		return 'sections-slider';
	}

	protected function _init() {
		add_filter(
			'fw-ext:page-builder:manual-builder-item-correction:'. $this->get_type(),
			array($this, '_correct_item'),
			10,
			3
		);
	}

	/** @return FW_Shortcode_Sections_Slider */
	private function get_shortcode() {
		return fw_ext('shortcodes')->get_shortcode('sections_slider');
	}

	private function get_shortcode_config()
	{
		$config = $this->get_shortcode()->get_config('page_builder');

		return array_merge(
			array(
				'tab'         => __('Layout Elements', 'creatus'),
				'title'       => __('Sections slider', 'creatus'),
				'description' => __('Add section slider. This section accepts sections with their content only.', 'creatus'),
				'title_template' => null,
			),
			is_array($config) ? $config : array()
		);
	}

	/**
	 * Called when builder is rendered
	 */
	public function enqueue_static()
	{
		$shortcode = $this->get_shortcode();
		$uri = $shortcode->get_uri('/includes/page-builder-sections-slider-item/static');

		wp_enqueue_style(
			$this->get_builder_type() . '_item_type_' . $this->get_type(),
			$uri . '/css/styles.css',
			array(),
			fw()->theme->manifest->get_version()
		);

		wp_enqueue_script(
			$this->get_builder_type() . '_item_type_' . $this->get_type(),
			$uri . '/js/scripts.js',
			array('fw-events', 'underscore'),
			fw()->theme->manifest->get_version(),
			true
		);

		wp_localize_script(
			$this->get_builder_type() . '_item_type_' . $this->get_type(),
			str_replace('-', '_', $this->get_builder_type() . '_item_type_' . $this->get_type() . '_data'),
			$shortcode->get_item_data()
		);
	}

	protected function get_thumbnails_data()
	{
		return array($this->get_shortcode_config());
	}

	public function get_value_from_attributes($attributes)
	{
		$attributes['type'] = $this->get_type();

		$options = $this->get_shortcode()->get_options();
		if (!empty($options)) {
			if (empty($attributes['atts'])) {
				/**
				 * The options popup was never opened and there are no attributes.
				 * Extract options default values.
				 */
				$attributes['atts'] = fw_get_options_values_from_input(
					$options, array()
				);
			} else {
				/**
				 * There are saved attributes.
				 * But we need to execute the _get_value_from_input() method for all options,
				 * because some of them may be (need to be) changed (auto-generated) https://github.com/ThemeFuse/Unyson/issues/275
				 * Add the values to $option['value']
				 */
				$options = fw_extract_only_options($options);

				foreach ($attributes['atts'] as $option_id => $option_value) {
					if (isset($options[$option_id])) {
						$options[$option_id]['value'] = $option_value;
					}
				}

				$attributes['atts'] = fw_get_options_values_from_input(
					$options, array()
				);
			}
		}

		return $attributes;
	}

	public function get_shortcode_data($atts = array())
	{
		$return = array(
			'tag'  => str_replace('-', '_', $this->get_type())
		);
		if (isset($atts['atts'])) {
			$return['atts'] = $atts['atts'];
		}
		return $return;
	}

	public function _correct_item($result, $item, $callbacks) {
		foreach ($item['_items'] as &$sub_item) {
			if ($sub_item['type'] === 'section') {
				
				$sub_item['_items'] = call_user_func($callbacks['correct_section'], $sub_item['_items']);
				$sub_item['atts']['is_slide'] = true;
				
			}
		}

		return $item;
	}
}
FW_Option_Type_Builder::register_item_type('Page_Builder_Sections_Slider_Item');

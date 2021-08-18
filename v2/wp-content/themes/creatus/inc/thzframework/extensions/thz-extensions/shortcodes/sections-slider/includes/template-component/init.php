<?php if (!defined('FW')) die('Forbidden');

add_action(
	'fw_ext_builder:template_components_register',
	'_action_fw_ext_builder_template_component_sections_slider'
);
function _action_fw_ext_builder_template_component_sections_slider() {
	require_once dirname(__FILE__) .'/class-fw-ext-builder-templates-component-sections-slider.php';

	FW_Ext_Builder_Templates::register_component(
		new FW_Ext_Builder_Templates_Component_Sections_Slider()
	);
}

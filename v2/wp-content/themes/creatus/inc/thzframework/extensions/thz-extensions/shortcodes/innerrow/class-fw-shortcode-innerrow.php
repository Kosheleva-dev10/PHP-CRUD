<?php if (!defined('FW')) die('Forbidden');

class FW_Shortcode_InnerRow extends FW_Shortcode_Row
{
	public function _init() {
		parent::_init();
	}

	public function _action_register_builder_item_types() {
		if (fw_ext('page-builder')) {
			require $this->get_declared_path('/includes/page-builder-innerrow-item/class-page-builder-innerrow-item.php');
		}
	}
}

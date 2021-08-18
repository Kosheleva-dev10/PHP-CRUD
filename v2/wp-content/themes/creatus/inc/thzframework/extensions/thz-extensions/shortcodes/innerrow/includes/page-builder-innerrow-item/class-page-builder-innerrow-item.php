<?php if (!defined('FW')) die('Forbidden');

class Page_Builder_InnerRow_Item extends Page_Builder_Row_Item
{
	public function get_type() {
		return 'innerrow';
	}

}
FW_Option_Type_Builder::register_item_type('Page_Builder_InnerRow_Item');


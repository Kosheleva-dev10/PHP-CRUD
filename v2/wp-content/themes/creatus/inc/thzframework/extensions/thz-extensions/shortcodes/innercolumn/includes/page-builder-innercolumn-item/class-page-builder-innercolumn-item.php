<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

class Page_Builder_InnerColumn_Item extends Page_Builder_Column_Item {

	public function get_type() {
		return 'innercolumn';
	}

	public function enqueue_static() {
		/**
		 * @var FW_Shortcode $innercolumn_shortcode
		 */
		$innercolumn_shortcode = fw()->extensions->get( 'shortcodes' )->get_shortcode( 'innercolumn' );

		wp_enqueue_style(
			$this->get_builder_type() . '_item_type_' . $this->get_type(),
			$innercolumn_shortcode->get_uri( '/includes/page-builder-innercolumn-item/static/css/styles.css' ),
			array(),
			fw()->theme->manifest->get_version()
		);

		wp_enqueue_script(
			$this->get_builder_type() . '_item_type_' . $this->get_type(),
			$innercolumn_shortcode->get_uri( '/includes/page-builder-innercolumn-item/static/js/scripts.js' ),
			array( 'fw-events', 'underscore' ),
			fw()->theme->manifest->get_version(),
			true
		);
		
/*		$innercolumn_data = $innercolumn_shortcode->get_item_data();
		
		$innercolumn_data['l10n']['title'] = __( 'Inner Column', 'creatus' );*/
				
		wp_localize_script(
			$this->get_builder_type() . '_item_type_' . $this->get_type(),
			str_replace( '-', '_', $this->get_builder_type() ) . '_item_type_' . $this->get_type() . '_data',
			$innercolumn_shortcode->get_item_data()
		);
		
	}

	protected function get_thumbnails_data() {
		/**
		 * @var FW_Shortcode $innercolumn_shortcode
		 */

		return array(
			array(
				'tab'         => __( 'Layout Elements', 'creatus' ),
				'title'       => __('Inner column','creatus'),
				'description' =>  __('Add inner column. Note that this column is allowed inside a column only.','creatus'),
				'data'        => array(
					'width' => '1_1'
				)
			)
		);

	}

}

FW_Option_Type_Builder::register_item_type( 'Page_Builder_InnerColumn_Item' );
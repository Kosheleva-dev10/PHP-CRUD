<?php if (!defined('FW')) die('Forbidden');

class FW_Settings_Form_ThzImportFonts extends FW_Settings_Form {
	
    public function get_values() {
        return get_option('thz_imported_fonts', array());
    }

    public function set_values($values) {
		
		$current = $this->get_values();
		
		if(isset($current['fsqfonts'])){
			
			$values['fsqfonts'] = $current['fsqfonts'];
		}
		
		unset($values['fsqhtml'],$values['tykhtml']);
		
        update_option('thz_imported_fonts', $values, false);
    }

    public function get_options() {
		
        return array(

			
			'fontsquirretlab' => array(
				'title'   => __( 'Font Squirrel', 'creatus' ),
				'type'    => 'thz-side-tab',
				'li-attr' => array('class' => 'thz-admin-li thz-admin-li-fontsquirrel'),
				'options' => array(
					'posts_subbox' => array(
						'title'   => __( 'Font Squirrel Options', 'creatus' ),
						'type'    => 'box',
						'options' => array(
							fw()->theme->get_options( 'fontsquirrel_settings' ),
						),
					),
				),
			),			
			
			
					
			'typekittab' => array(
				'title'   => __( 'Typekit', 'creatus' ),
				'type'    => 'thz-side-tab',
				'li-attr' => array('class' => 'thz-admin-li thz-admin-li-typekit'),
				'options' => array(
					'posts_subbox' => array(
						'title'   => __( 'Typekit Options', 'creatus' ),
						'type'    => 'box',
						'options' => array(
							fw()->theme->get_options( 'typekit_settings' ),
						),
					),
				),
			),

			
			
        );
    }

    protected function _init() {
		
        add_action('admin_menu', array($this, '_action_admin_menu'));
        add_action('admin_enqueue_scripts', array($this, '_action_admin_enqueue_scripts'));

        $this->set_is_side_tabs(true);
        $this->set_is_ajax_submit(true);
		$this->set_string('title','<span class="thz-import-fonts-title">Import fonts</span><a href="https://themezly.com/" target="_blank"><small>by Themezly</small></a>');
		
    }

    /**
     * @internal
     */
    public function _action_admin_menu() {

   		add_management_page(
			esc_html__('Import Fonts','creatus'), 
			esc_html__('Import Fonts','creatus'),
			'manage_options',
			'thz-import-fonts' ,
            array($this, 'render')
        );
    }

    /**
     * @internal
     */
    public function _action_admin_enqueue_scripts() {
        $current_screen = get_current_screen(); //fw_print($current_screen);

        // enqueue only on settings page
        if ('tools_page_'. 'thz-import-fonts' === $current_screen->base) {
            $this->enqueue_static();
        }
    }
}
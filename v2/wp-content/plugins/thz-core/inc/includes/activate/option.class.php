<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // No direct access
}

class ThzCore_Activation_Option{
	/**
	 * Option name
	 * @var string
	 */
	private $option_name;

	/**
	 * Thz_Registration_Option constructor.
	 *
	 * @param string $name - option name
	 */
	public function __construct( $name ) {
		$this->option_name = $name;
	}

	/**
	 * Get registration option from database
	 *
	 * @return array|false - in case option is stored, returns array, else returns false
	 */
	public function get_option(){
		return get_option( $this->option_name, false );
	}

	/**
	 * @param $value
	 *
	 * @return bool
	 */
	public function set_option( $value ){
		return update_option( $this->option_name, $value );
	}

	/**
	 * @return bool
	 */
	public function delete_option(){
		return delete_option( $this->option_name );
	}
}
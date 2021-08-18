<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // No direct access
}

class ThzCore_Update_Helper{

	const MIN_THEME_VER = '1.5';
	static private $opt = '_thz_theme_update';

	/**
	 * Check if active theme uses and needs CP
	 * @return mixed
	 */
	static public function not_uses_cp(){
		$theme = wp_get_theme();
		return version_compare( $theme->get('Version'), self::MIN_THEME_VER, '<' ) ;
	}

	/**
	 * Check if CP is on
	 * @return bool
	 */
	static public function has_cp(){
		return defined( 'CP_PATH' ) && defined( 'CP_URL' );
	}

	/**
	 * Check if $version uses CP
	 * @param $version
	 *
	 * @return mixed
	 */
	static public function uses_cp( $version ){
		return version_compare( $version, self::MIN_THEME_VER, '>=' );
	}

	/**
	 * Check if CP is needed when updating
	 * @param $version
	 *
	 * @return bool
	 */
	static public function needs_cp( $version ){
		$result = false;
		if( self::not_uses_cp() && self::uses_cp( $version ) ){
			$result = true;
		}
		return $result;
	}

	/**
	 * Stores theme update details
	 * @param $theme
	 */
	static public function register_update( $theme ){
		update_option( self::$opt, $theme );
	}

	static public function unregister_update(){
		delete_option( self::$opt );
	}

	/**
	 * Check if stored update details require CP
	 *
	 * @return bool
	 */
	static public function requires_cp(){
		$option = get_option( self::$opt );
		if( $option ){
			if( self::needs_cp( $option['version'] ) && !self::has_cp() ){
				return true;
			}
		}

		return false;
	}

}
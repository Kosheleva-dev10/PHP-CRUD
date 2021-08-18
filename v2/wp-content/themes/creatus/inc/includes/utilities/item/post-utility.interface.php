<?php

/**
 * Interface Thz_Post_Utility_Interface
 */
interface Thz_Post_Utility_Interface{
	/**
	 * Returns current post ID
	 * @return int
	 */
	public function get_post_id();

	/**
	 * Returns an option
	 * @param $id
	 * @param $default
	 *
	 * @return mixed
	 */
	public function get_option( $id, $default, $theme_option );
}
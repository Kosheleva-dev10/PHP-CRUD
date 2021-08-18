<?php

/**
 * Class Thz_Theme_Utility
 * Utility class that can be used to return file paths from child/parent theme
 * or theme details
 *
 * Usage:
 *
 * $instance = Thz_Theme_Utility::get_instance();
 * $instance->get_theme();
 *
 *
 */
class Thz_Theme_Utility {

	private static $instance = null;

	/**
	 * @var bool
	 */
	private $is_child_theme;
	/**
	 * @var null|string
	 */
	private $child_url = null;
	/**
	 * @var null|string
	 */
	private $child_path = null;
	/**
	 * @var string
	 */
	private $parent_url;
	/**
	 * @var string
	 */
	private $parent_path;
	/**
	 * @var WP_Theme
	 */
	private $theme;

	/**
	 * Thz_Theme_Utility constructor.
	 */
	protected function __construct() {
		$this->is_child_theme = is_child_theme();
		if ( $this->is_child_theme ) {
			$this->child_url  = get_stylesheet_directory_uri();
			$this->child_path = get_stylesheet_directory();
		}
		$this->parent_url  = get_template_directory_uri();
		$this->parent_path = get_template_directory();
		$this->theme       = wp_get_theme( get_template() );
		if ( ! is_a( $this->theme, 'WP_Theme' ) ) {
			$this->theme = false;
		}
	}

	/**
	 * @return null|Thz_Theme_Utility
	 */
	public static function get_instance() {
		if ( self::$instance === null ) {
			self::$instance = new Thz_Theme_Utility();
		}

		return self::$instance;
	}

	/**
	 * If given file path exists in child theme, it will return the URL to
	 * child theme file and ignore parent theme.
	 * If no child theme present or file is missing in child theme, it will return
	 * parent URL if file existing in parent.
	 *
	 * @param $rel_path
	 *
	 * @return bool|string
	 */
	public function child_file_uri( $rel_path ) {
		return $this->get_child_file( $rel_path, 'url' );
	}

	/**
	 * @param $rel_path
	 * @param string $type
	 *
	 * @return bool|string
	 */
	private function get_child_file( $rel_path, $type = 'url' ) {
		if ( $this->child_file_path( $rel_path ) ) {
			return ( $type == 'url' ? $this->child_url : $this->child_path ) . $rel_path;
		} elseif ( $this->parent_file_path( $rel_path ) ) {
			return ( $type == 'url' ? $this->parent_url : $this->parent_path ) . $rel_path;
		}

		return false;
	}

	/**
	 * Returns the absolute path to a file within the child theme directory.
	 * If file does not exist returns false.
	 *
	 * @param $rel_path
	 *
	 * @return bool|string
	 */
	public function child_file_path( $rel_path ) {
		if ( $this->file_exists( $rel_path, 'child' ) ) {
			return $this->child_path . $rel_path;
		}

		return false;
	}

	/**
	 * @param $rel_path
	 * @param string $theme
	 *
	 * @return bool
	 */
	private function file_exists( $rel_path, $theme = 'parent' ) {
		if ( ! $this->is_child_theme && 'child' == $theme ) {
			return false;
		}

		return file_exists( ( 'child' == $theme ? $this->child_path : $this->parent_path ) . $rel_path );
	}

	/**
	 * Returns absolute path to file inside parent theme directory.
	 * If file isn't found returns false.
	 *
	 * @param $rel_path
	 *
	 * @return bool|string
	 */
	public function parent_file_path( $rel_path ) {
		if ( $this->file_exists( $rel_path, 'parent' ) ) {
			return $this->parent_path . $rel_path;
		}

		return false;
	}

	/**
	 * If given file path exists in child theme, it will return the path to
	 * child theme file and ignore parent theme.
	 * If no child theme present or file is missing in child theme, it will return
	 * parent path if file existing in parent.
	 *
	 * @param $rel_path
	 *
	 * @return bool|string
	 */
	public function child_first_file_path( $rel_path ) {
		return $this->get_child_file( $rel_path, 'path' );
	}

	/**
	 * @return null|string
	 */
	public function get_child_path() {
		return $this->child_path;
	}

	/**
	 * @return string
	 */
	public function get_parent_path() {
		return $this->parent_path;
	}

	/**
	 * @return null|string
	 */
	public function get_child_uri() {
		return $this->child_url;
	}

	/**
	 * @return string
	 */
	public function get_parent_uri() {
		return $this->parent_url;
	}

	/**
	 * @return bool|WP_Theme
	 */
	public function get_theme() {
		return $this->theme;
	}

	/**
	 * @return bool
	 */
	public function is_child_theme() {
		return $this->is_child_theme;
	}
}
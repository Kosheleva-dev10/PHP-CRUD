<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

/**
 * Replace the content of the current template with the content of portfolio view
 *
 * @param string $the_content
 *
 * @return string
 */
function _filter_fw_ext_portfolio_the_content( $the_content ) {
	/**
	 * @var FW_Extension_Portfolio $portfolio
	 */
	$portfolio = fw()->extensions->get( 'portfolio' );

	return fw_render_view( $portfolio->locate_view_path( 'content' ), array( 'the_content' => $the_content ) );
}

/**
 * Check if the there are defined views for the portfolio templates, otherwise are used theme templates
 *
 * @param string $template
 *
 * @return string
 */
function _filter_fw_ext_portfolio_template_include( $template ) {

	/**
	 * @var FW_Extension_Portfolio $portfolio
	 */
	$portfolio = fw()->extensions->get( 'portfolio' );

	if ( is_singular( $portfolio->get_post_type_name() ) ) {

		if ( preg_match( '/single-' . '.*\.php/i', basename( $template ) ) === 1 ) {
			return $template;
		}

		if ( $portfolio->locate_view_path( 'single' ) ) {
			return $portfolio->locate_view_path( 'single' );
		} else {
			add_filter( 'the_content', '_filter_fw_ext_portfolio_the_content' );
		}
	} else if ( is_tax( $portfolio->get_taxonomy_name() ) && $portfolio->locate_view_path( 'taxonomy' ) ) {

		if ( preg_match( '/taxonomy-' . '.*\.php/i', basename( $template ) ) === 1 ) {
			return $template;
		}

		return $portfolio->locate_view_path( 'taxonomy' );
	} else if ( is_post_type_archive( $portfolio->get_post_type_name() ) && $portfolio->locate_view_path( 'archive' ) ) {
		if ( preg_match( '/archive-' . '.*\.php/i', basename( $template ) ) === 1 ) {
			return $template;
		}

		return $portfolio->locate_view_path( 'archive' );
	}

	return $template;
}

add_filter( 'template_include', '_filter_fw_ext_portfolio_template_include' );
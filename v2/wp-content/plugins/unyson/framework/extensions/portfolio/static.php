<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

if ( ! is_admin() ) {
	global $template;
	/**
	 * @var FW_Extension_Portfolio $portfolio
	 */
	$portfolio = fw()->extensions->get( 'portfolio' );

	if ( is_singular( $portfolio->get_post_type_name() ) ) {
		wp_enqueue_style(
			'fw-extension-' . $portfolio->get_name() . '-nivo-default',
			$portfolio->locate_css_URI( 'NivoSlider/themes/default/default' ),
			array(),
			$portfolio->manifest->get_version()
		);

		wp_enqueue_style(
			'fw-extension-' . $portfolio->get_name() . '-nivo-dark',
			$portfolio->locate_css_URI( 'NivoSlider/themes/dark/dark' ),
			array(),
			$portfolio->manifest->get_version()
		);

		wp_enqueue_style(
			'fw-extension-' . $portfolio->get_name() . '-nivo-slider',
			$portfolio->locate_css_URI( 'nivo-slider' ),
			array(),
			$portfolio->manifest->get_version()
		);

		wp_enqueue_script(
			'fw-extension-' . $portfolio->get_name() . '-nivoslider',
			$portfolio->locate_js_URI( 'jquery.nivo.slider' ),
			array( 'jquery' ),
			$portfolio->manifest->get_version(),
			true
		);

		wp_enqueue_script(
			'fw-extension-' . $portfolio->get_name() . '-script',
			$portfolio->locate_js_URI( 'projects-script' ),
			array( 'fw-extension-' . $portfolio->get_name() . '-nivoslider' ),
			$portfolio->manifest->get_version(),
			true
		);
	}
}




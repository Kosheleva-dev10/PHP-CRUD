<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$manifest = array();

$manifest['name']        = __( 'Portfolio', 'fw' );
$manifest['description'] = __(
	'This extension will add a fully fledged portfolio module that will let you display your projects'
	.' using the built in portfolio pages.',
	'fw'
);
$manifest['version'] = '1.0.9';
$manifest['display'] = true;
$manifest['standalone'] = true;

$manifest['github_update'] = 'ThemeFuse/Unyson-Portfolio-Extension';

$manifest['github_repo'] = 'https://github.com/ThemeFuse/Unyson-Portfolio-Extension';
$manifest['uri'] = 'http://manual.unyson.io/en/latest/extension/portfolio/index.html#content';
$manifest['author'] = 'ThemeFuse';
$manifest['author_uri'] = 'http://themefuse.com/';

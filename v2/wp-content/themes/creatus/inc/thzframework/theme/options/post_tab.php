<?php
if (!defined('FW'))
	die('Forbidden');
$options = array(
	'postsoptionstab' => array(
		'title' => __('Post', 'creatus'),
		'type' => 'tab',
		'options' => array(
			'blogpoststab' => array(
				'title' => __('Blog posts', 'creatus'),
				'type' => 'tab',
				'options' => array(
					fw()->theme->get_options('blog_posts_settings')
				)
			),
			'postsarchivetab' => array(
				'title' => __('Posts archive', 'creatus'),
				'type' => 'tab',
				'options' => array(
					fw()->theme->get_options('posts_archive_settings')
				)
			),
			'singleposttab' => array(
				'title' => __('Single post', 'creatus'),
				'type' => 'tab',
				'options' => array(
					fw()->theme->get_options('post_single_settings')
				)
			),
			'postsformatstab' => array(
				'title' => __('Post formats', 'creatus'),
				'type' => 'tab',
				'options' => array(
					fw()->theme->get_options('post_formats_settings')
				)
			)
		)
	)
);
<?php
if (!defined('FW')) {
	die('Forbidden');
}
$options = array(

	'offline' => array(
		'type' => 'short-select',
		'label' => __('Offline mode', 'creatus'),
		'desc' => esc_html__('Select site offline mode. See help for more info.', 'creatus'),
		'help' => esc_html__('If you select maintenance as offline mode , the site headers are set as 503 Service Unavailable and search engines are advised to retry after 1 day. We recommend to use the maintenance mode for few days only.', 'creatus'),
		'value' => 'inactive',
		'attr' => array(
			'class' => 'thz-select-switch'
		),
		'choices' => array(
			'inactive' =>array(
				'text' =>  esc_html__('Inactive', 'creatus'),
				'attr' => array(
					'data-disable' => 'off_page,off_roles',
				)
			),
			'soon' =>array(
				'text' =>  esc_html__('Coming soon', 'creatus'),
				'attr' => array(
					'data-enable' => 'off_page,off_roles',
				)
			),
			'maintenance' =>array(
				'text' =>  esc_html__('Maintenance', 'creatus'),
				'attr' => array(
					'data-enable' => 'off_page,off_roles',
				)
			),
		)
	),
	
	'off_page' => array(
		'type'  => 'multi-select',
		'value' => array(),
		'label' => __('Offline page', 'creatus'),
		'desc'  => esc_html__('Select the offline display page. Start typing to activate the search.', 'creatus'),
		'population' => 'posts',
		'source' => 'page',
		'limit' => 1,
	),

	'off_roles' => array(
		'type'  => 'checkboxes',
		'value' => array(
			'administrator' => true
		
		),
		'label' => __('Access granted', 'creatus'),
		'desc'  => esc_html__('Select user roles that can access the site when in offline mode.', 'creatus'),
		'vertical' => true,
		'choices' =>_thz_get_user_roles_list(),
	),	
);
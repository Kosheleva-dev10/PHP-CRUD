<?php
if (!defined('FW')) {
	die('Forbidden');
}
$options = array(
	'countdowndefaults' => array(
		'title' => __('Defaults', 'creatus'),
		'type' => 'tab',
		'options' => array(
			'countdown' => array(
				'type' => 'datetime-picker',
				'label' => __('Countdown date', 'creatus'),
				'desc' => esc_html__('Select countdown date.', 'creatus')
			),
			'offset' => array(
				'type' => 'short-select',
				'label' => __('Offset', 'creatus'),
				'desc' => esc_html__('Set time offset. See help for more info. ', 'creatus'),
				'help' => esc_html__('To set time offset. Visit: &lt;a href=&quot;http://www.timeanddate.com/time/zone/&quot; target=&quot;_blank&quot;&gt;Time and date&lt;/a&gt; and enter your city. Than look for &quot;Current Offset&quot;', 'creatus'),
				'value' => '-5',
				'choices' => array(
					'-12' => esc_html__('-12', 'creatus'),
					'-11' => esc_html__('-11', 'creatus'),
					'-10' => esc_html__('-10', 'creatus'),
					'-9.5' => esc_html__('-9.30', 'creatus'),
					'-9' => esc_html__('-9', 'creatus'),
					'-8' => esc_html__('-8', 'creatus'),
					'-7' => esc_html__('-7', 'creatus'),
					'-6' => esc_html__('-6', 'creatus'),
					'-5' => esc_html__('-5', 'creatus'),
					'-4.5' => esc_html__('-4.30', 'creatus'),
					'-4' => esc_html__('-4', 'creatus'),
					'-3.5' => esc_html__('-3.30', 'creatus'),
					'-3' => esc_html__('-3', 'creatus'),
					'-2' => esc_html__('-2', 'creatus'),
					'-1' => esc_html__('-1', 'creatus'),
					'0' => esc_html__('0', 'creatus'),
					'+1' => esc_html__('+1', 'creatus'),
					'+2' => esc_html__('+2', 'creatus'),
					'+3' => esc_html__('+3', 'creatus'),
					'+3.5' => esc_html__('+3.30', 'creatus'),
					'+4' => esc_html__('+4', 'creatus'),
					'+4.5' => esc_html__('+4.30', 'creatus'),
					'+5' => esc_html__('+5', 'creatus'),
					'+5.5' => esc_html__('+5.30', 'creatus'),
					'+5.75' => esc_html__('+5.45', 'creatus'),
					'+6' => esc_html__('-+6', 'creatus'),
					'+6.5' => esc_html__('+6.5', 'creatus'),
					'+7' => esc_html__('+7', 'creatus'),
					'+8' => esc_html__('+8', 'creatus'),
					'+8.5' => esc_html__('+8.30', 'creatus'),
					'+9' => esc_html__('+9', 'creatus'),
					'+9.5' => esc_html__('+9.30', 'creatus'),
					'+10' => esc_html__('+10', 'creatus'),
					'+10.5' => esc_html__('+10.30', 'creatus'),
					'+11' => esc_html__('+11', 'creatus'),
					'+12' => esc_html__('+12', 'creatus'),
					'+12.75' => esc_html__('+12.45', 'creatus'),
					'+13' => esc_html__('+13', 'creatus'),
					'+14' => esc_html__('+14', 'creatus')
				)
			),
			'id' => array(
				'type' => 'unique',
				'length' => 8
			),
			'cmx' => _thz_container_metrics_defaults()
		)
	),
	'coundowndatetext' => array(
		'title' => __('Date text', 'creatus'),
		'type' => 'tab',
		'options' => array(
			'date_singular' => array(
				'type' => 'thz-multi-options',
				'label' => __('Date text singular ', 'creatus'),
				'desc' => esc_html__('Set singular date text', 'creatus'),
				'value' => array(
					'day' => 'Day',
					'hour' => 'Hour',
					'minute' => 'Minute',
					'second' => 'Second'
				),
				'thz_options' => array(
					'day' => array(
						'type' => 'short-text',
						'title' => 'Day'
					),
					'hour' => array(
						'type' => 'short-text',
						'title' => 'Hour'
					),
					'minute' => array(
						'type' => 'short-text',
						'title' => 'Minute'
					),
					'second' => array(
						'type' => 'short-text',
						'title' => 'Second'
					)
				)
			),
			'date_plural' => array(
				'type' => 'thz-multi-options',
				'label' => __('Date text plural ', 'creatus'),
				'desc' => esc_html__('Set plural date text', 'creatus'),
				'value' => array(
					'days' => 'Days',
					'hours' => 'Hours',
					'minutes' => 'Minutes',
					'seconds' => 'Seconds'
				),
				'thz_options' => array(
					'days' => array(
						'type' => 'short-text',
						'title' => 'Days'
					),
					'hours' => array(
						'type' => 'short-text',
						'title' => 'Hours'
					),
					'minutes' => array(
						'type' => 'short-text',
						'title' => 'Minutes'
					),
					'seconds' => array(
						'type' => 'short-text',
						'title' => 'Seconds'
					)
				)
			)
		)
	),
	'countowntypography' => array(
		'title' => __('Typography', 'creatus'),
		'type' => 'tab',
		'options' => array(
			'date_numbers_font' => array(
				'label' => __('Date number font', 'creatus'),
				'type' => 'thz-typography',
				'value' => array(
					'size' 			=> 38,
				),
				'disable' => array('hovered','transform','align'),
				'desc' => esc_html__('Date numbers font color family and metrics', 'creatus')
			),
			'date_text_font' => array(
				'label' => __('Date text font', 'creatus'),
				'type' => 'thz-typography',
				'value' => array(
					'size' 			=> 16,
				),
				'disable' => array('hovered','transform','align'),
				'desc' => esc_html__('Adjust date text font metrics', 'creatus')
			)
		)
	),
	'countownlayout' => array(
		'title' => __('Layout', 'creatus'),
		'type' => 'tab',
		'options' => array(
			'show_elements' => array(
				'type' => 'thz-multi-options',
				'label' => __('Show/hide elements', 'creatus'),
				'desc' => esc_html__('Choose what date elements to show or hide.', 'creatus'),
				'value' => array(
					'text' => 'show',
					'days' => 'show',
					'hours' => 'show',
					'minutes' => 'show',
					'seconds' => 'show'
				),
				'thz_options' => array(
					'text' => array(
						'type' => 'short-select',
						'title' => esc_html__('Date text', 'creatus'),
						'choices' => array(
							'show' => esc_html__('Show', 'creatus'),
							'hide' => esc_html__('Hide', 'creatus')
						)
					),
					'days' => array(
						'type' => 'short-select',
						'title' => esc_html__('Days', 'creatus'),
						'choices' => array(
							'show' => esc_html__('Show', 'creatus'),
							'hide' => esc_html__('Hide', 'creatus')
						)
					),
					'hours' => array(
						'type' => 'short-select',
						'title' => esc_html__('Hours', 'creatus'),
						'choices' => array(
							'show' => esc_html__('Show', 'creatus'),
							'hide' => esc_html__('Hide', 'creatus')
						)
					),
					'minutes' => array(
						'type' => 'short-select',
						'title' => esc_html__('Minutes', 'creatus'),
						'choices' => array(
							'show' => esc_html__('Show', 'creatus'),
							'hide' => esc_html__('Hide', 'creatus')
						)
					),
					'seconds' => array(
						'type' => 'short-select',
						'title' => esc_html__('Seconds', 'creatus'),
						'choices' => array(
							'show' => esc_html__('Show', 'creatus'),
							'hide' => esc_html__('Hide', 'creatus')
						)
					)
				)
			),
			'date_settings' => array(
				'type' => 'thz-multi-options',
				'label' => __('Date adjustments', 'creatus'),
				'desc' => esc_html__('Choose date number position and adjust vertical alignment.', 'creatus'),
				'value' => array(
					'position' => 'above',
					'number_align' => 'thz-va-middle',
					'text_align' => 'thz-va-middle',
					'text_transform' => 'thz-text-transnone'
				),
				'thz_options' => array(
					'position' => array(
						'type' => 'select',
						'title' => esc_html__('Number position', 'creatus'),
						'choices' => array(
							'above' => esc_html__('Above the text', 'creatus'),
							'under' => esc_html__('Under the text', 'creatus'),
							'left' => esc_html__('Left of text', 'creatus'),
							'right' => esc_html__('Right of text', 'creatus')
						)
					),
					'number_align' => array(
						'type' => 'select',
						'title' => esc_html__('Number v-align', 'creatus'),
						'choices' => array(
							'thz-va-top' => esc_html__('Top', 'creatus'),
							'thz-va-middle' => esc_html__('Middle', 'creatus'),
							'thz-va-bottom' => esc_html__('Bottom', 'creatus')
						)
					),
					'text_align' => array(
						'type' => 'select',
						'title' => esc_html__('Text v-align', 'creatus'),
						'choices' => array(
							'thz-va-top' => esc_html__('Top', 'creatus'),
							'thz-va-middle' => esc_html__('Middle', 'creatus'),
							'thz-va-bottom' => esc_html__('Bottom', 'creatus')
						)
					),
					'text_transform' => array(
						'type' => 'select',
						'title' => esc_html__('Date text transform', 'creatus'),
						'choices' => array(
							'thz-text-uppercase' => esc_html__('Uppercase', 'creatus'),
							'thz-text-lowercase' => esc_html__('Lowercase', 'creatus'),
							'thz-text-capitalize' => esc_html__('Capitalize', 'creatus'),
							'thz-text-transnone' => esc_html__('None', 'creatus')
						)
					)
				)
			),
			'spacer_settings' => array(
				'type' => 'thz-multi-options',
				'label' => __('Spacer settings', 'creatus'),
				'help' => esc_html__('Spacer can be nuged (moved up/down) in case it does not align properly', 'creatus'),
				'desc' => esc_html__('Spacer is located between the date boxes. You can also add dash or colon as separator.', 'creatus'),
				'value' => array(
					'text' => '',
					'space' => 20,
					'nudge' => 0,
					'font_size' => 16,
					'color' => ''
				),
				'thz_options' => array(
					'text' => array(
						'type' => 'short-text',
						'title' => 'Text'
					),
					'space' => array(
						'type' => 'spinner',
						'title' => esc_html__('Width', 'creatus'),
						'addon' => 'px',
						'min' => 0,
						'max' => 500
					),
					'font_size' => array(
						'type' => 'spinner',
						'title' => esc_html__('Font size', 'creatus'),
						'addon' => 'px',
						'min' => 0,
						'max' => 100
					),
					'nudge' => array(
						'type' => 'spinner',
						'title' => esc_html__('Nudge', 'creatus'),
						'addon' => 'px',
						'min' => -300,
						'max' => 300
					),
					'color' => array(
						'type' => 'color',
						'title' => esc_html__('Color', 'creatus')
					)
				)
			)
		)
	),
	'countownstyling' => array(
		'title' => __('Styling', 'creatus'),
		'type' => 'tab',
		'options' => array(
			'bs' => array(
				'type' => 'thz-box-style',
				'label' => __('Countdown holder', 'creatus'),
				'desc' => esc_html__('Adjust .thz-countdown-holder box style','creatus'),
				'preview' => true,
				'popup' => true,
				'disable' => array('video'),
				'button-text' => esc_html__('Customize countdown holder box style', 'creatus'),
				'units' => array(
					'borderradius',
					'boxsize',
					'padding',
					'margin',
				),
				'value' => array()
			),
			
			'cbs' => array(
				'type' => 'thz-box-style',
				'label' => __('Countdown', 'creatus'),
				'desc' => esc_html__('Adjust .thz-countdown box style','creatus'),
				'preview' => true,
				'popup' => true,
				'disable' => array('video'),
				'units' => array(
					'borderradius',
					'boxsize',
					'padding',
					'margin',
				),
				'button-text' => esc_html__('Customize countdown box style', 'creatus'),
				'value' => array()
			),
			
			'dbs' => array(
				'type' => 'thz-box-style',
				'label' => __('Date box', 'creatus'),
				'preview' => true,
				'popup' => true,
				'disable' => array('layout','boxsize','transform','video'),
				'button-text' => esc_html__('Customize date box box style', 'creatus'),
				'desc' => esc_html__('Adjust .thz-cd-cell box style','creatus'),
				'value' => array()
			),
			'nbs' => array(
				'type' => 'thz-box-style',
				'label' => __('Numbers holder', 'creatus'),
				'preview' => true,
				'popup' => true,
				'disable' => array('layout','boxsize','transform','video'),
				'units' => array(
					'borderradius',
					'boxsize',
					'padding',
					'margin',
				),
				'button-text' => esc_html__('Customize numbers holder box style', 'creatus'),
				'desc' => esc_html__('Adjust .thz-cd-numbers box style','creatus'),
				'value' => array()
			),
			'tbs' => array(
				'type' => 'thz-box-style',
				'label' => __('Text holder', 'creatus'),
				'preview' => true,
				'popup' => true,
				'button-text' => esc_html__('Customize text holder box style', 'creatus'),
				'desc' => esc_html__('Adjust .thz-cd-text box style','creatus'),
				'disable' => array('layout','boxsize','transform','video'),
				'units' => array(
					'borderradius',
					'boxsize',
					'padding',
					'margin',
				),
				'value' => array()
			)
		)
	),
	'countdowneffects' => array(
		'title' => __('Effects', 'creatus'),
		'type' => 'tab',
		'options' => array(
			'animate' => array(
				'type' => 'thz-animation',
				'label' => false,
				'value' => array(
					'animate' => 'inactive',
					'effect' => 'thz-anim-fadeIn',
					'duration' => 400,
					'delay' => 0
				)
			),
			'cpx' => _thz_container_parallax_default()
		)
	)
);

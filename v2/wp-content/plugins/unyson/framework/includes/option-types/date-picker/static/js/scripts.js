/**
 * Script file that will manage the "map" option
 */

"use strict";

function fw_option_type_date_picker_initialize(object) {
	var defaults = {
		autoclose: true,
		format: "dd-mm-yyyy",
		weekStart: 1,
		startDate: new Date(),
		endDate: null,
		language: jQuery('html').attr('lang').split('-').shift()
	};
	var options = JSON.parse(object.attr('data-fw-option-date-picker-opts'));

	var date = null;

	if (options.minDate != null || options.minDate != undefined) {
		date = options.minDate.split('-').map(Number);
		defaults.startDate = new Date(date[2], date[1] - 1, date[0]);
	}

	if (options.maxDate != null || options.maxDate != undefined) {
		date = options.maxDate.split('-').map(Number);
		defaults.endDate = new Date(date[2], date[1] - 1, date[0]);
	}

	if (options.weekStart != null || options.weekStart != undefined) {
		defaults.weekStart = options.weekStart;
	}

	object.datepicker(defaults);
}

jQuery(document).ready(function ($) {
	fwEvents.on('fw:options:init', function (data) {
		var obj = data.$elements.find('.fw-option-type-date-picker:not(.initialized)');

		if (!obj.length) {
			return;
		}

		for (var i = 0; i < obj.length; i++) {
			fw_option_type_date_picker_initialize(jQuery(obj[i]));
		}

		obj.addClass('initialized');
	});
});
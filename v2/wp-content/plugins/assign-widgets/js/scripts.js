/**
 * @package      Assign Widgets
 * @copyright    Copyright(C) since 2015  Themezly.com. All Rights Reserved.
 * @author       Themezly
 * @license      http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2
 * @websites     http://www.themezly.com
 */
(function($) {
	$(document).ready(function($) {

		function thzAddSidebarGenerator() {

			$html = '<div id="thz_aw_sidebar_generator">';
			$html += '<h3>'+ thz_aw_var.thz_aw_1 +'</h3>';
			$html += '<label for="thz_aw_sidebar_name">'+ thz_aw_var.thz_aw_2 +'<input id="thz_aw_sidebar_name" value="" /></label>';
			$html += '<button class="button button-primary thz_aw_add_sidebar">'+ thz_aw_var.thz_aw_3 +'</button>';
			$html += '<span class="thz_aw_sidebar_msg"></span>';
			$html += '</div>';

			$('.widget-liquid-right').append($html);
			thzCreateSidebar();
			thzRemoveSidebar();
		}

		function thzCreateSidebar() {

			$('.thz_aw_add_sidebar').on('click', function() {

				$new_sidebar_name = $(this).parent().find('input');
				$new_sidebar_name_val = $new_sidebar_name.val();
				$new_sidebar_msg = $(this).parent().find('.thz_aw_sidebar_msg');
				$new_sidebar_msg.text('').show();

				if (!$new_sidebar_name_val.length) {
					$new_sidebar_msg.text(thz_aw_var.thz_aw_4);

					setTimeout(function() {

						$new_sidebar_msg.hide().text('');

					}, 1000);

					return;
				}

				$new_sidebar_msg.text(thz_aw_var.thz_aw_5 + $new_sidebar_name_val + thz_aw_var.thz_aw_6);

				$.ajax({
					url: ajaxurl,
					data: {
						action: 'thz_aw_generate_sidebar',
						newSidebarName: $new_sidebar_name_val,
						thz_aw_nonce: thz_aw_var.thz_aw_nonce
					},
					type: 'POST',
					success: function(response) {

						$new_sidebar_name.val('');
						$new_sidebar_msg.text(thz_aw_var.thz_aw_7);
						setTimeout(function() {
							if (response.data.created == 1) {
								location.reload(true);
							}
						}, 300);

					},
					error: function(e) {

						return false;
					}
				});

			});

		}

		function thzRemoveSidebar() {

			$thz_aw_sidebar = $('div[id^=thz_aw_widget_area]');

			$thz_aw_sidebar.each(function() {

				$remove_id = $(this).attr('id');
				
				var $remove_html ='<a data-removeid="' + $remove_id + '" href="#" class="thz_aw_remove_sidebar dashicons dashicons-dismiss"></a>';
				$remove_html +='<span class="thz_aw_current_title">';
				$remove_html += $remove_id;
				$remove_html +='</span>';
				$(this).find('.sidebar-name h2').before($remove_html);

			});

			$('.thz_aw_remove_sidebar').on('click', function(e) {

				e.preventDefault();

				var widget = $(e.currentTarget).parents('.widgets-holder-wrap:eq(0)');
				widget.addClass('stayclosed');

				var confirm_removal = confirm(thz_aw_var.thz_aw_8);
				if (confirm_removal == false) return false;
				
				$remove_id = $(this).attr('data-removeid');
				$('.widget-control-remove', widget).trigger('click');
				
				var $spinner = $(this).find('span');
				$spinner.show();
				
				$.ajax({
					url: ajaxurl,
					data: {
						action: 'thz_aw_remove_sidebar',
						oldSidebarName: $remove_id,
						thz_aw_nonce: thz_aw_var.thz_aw_nonce
					},
					type: 'POST',
					success: function(response) {

						$('#' + $remove_id).closest('.widgets-holder-wrap').remove();

					},
					error: function(e) {

						return false;
					}
				});

			});

		}

		function thzAwLoadSelectize(element) {

			if ($(element).hasClass('selectized')){
				 return;
			}

			var xhr;
			var $select = $(element).selectize({
				plugins: ['remove_button'],
				delimiter: ',',
				options: [],
				create: false,
				onType: function(value) {

					if (value.length < 2) {
						return;
					}

					this.load(function(callback) {

						xhr && xhr.abort();

						var data = {
							action: 'thz_aw_get_ajax_posts',
							searchTerm: value,
							thz_aw_nonce: thz_aw_var.thz_aw_nonce,
							data: {
								searchTerm: value
							}
						};

						xhr = jQuery.post(
							ajaxurl,
							data,
							function(response) {
								callback(response.data)

							}
						)
					});

				}
			});

			var selectize = $select[0].selectize;

			if ($(element).attr('data-data') && $(element).attr('data-data') != '') {

				var preload = JSON.parse($(element).attr('data-data'));
				selectize.load(function(callback) {
					callback(preload);
				});

				$.each(preload, function(index,object) {

					selectize.addItem(object.value);

				});
			}

		}

		function thzAwRefreshSelectize(e, widget_el) {

			var thisSelect = widget_el.find('.thz_assign_pages');
			thzAwLoadSelectize(thisSelect);

		}
		
		// init 
		thzAddSidebarGenerator();
		
		$(document.body).on('click.widgets-toggle', '#widgets-right .widget,#wp_inactive_widgets .widget', function(e) {
		
			var target = $(e.target),
				widget,
				thisSelect;

			if (target.parents('.widget-top').length) {

				widget = target.closest('div.widget');
				thisSelect = widget.find('.thz_assign_pages');
				thzAwLoadSelectize(thisSelect);
			}

		});

		$(document).on('widget-updated', thzAwRefreshSelectize);
		$(document).on('widget-added','#widgets-right', thzAwRefreshSelectize);
		
		$(document.body).on('click.widgets-toggle','.widget-tpl',function(e) {

			thisSelect = $('#widgets-right .control-subsection.open').find('.thz_assign_pages');
			
			thisSelect.each(function(index, element) {
				
				thzAwLoadSelectize(element);
			});
			
		});
	});

})(jQuery);
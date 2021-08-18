(function ($) {

    function initPlugin(editor, url) {

        editor.addButton('thz_editor_shortcodes', {
            text: false,
            icon: ' thzicon thzicon-creatus',
            type: 'menubutton',
            menu: [
				{text: 'Page title',onclick: function() { editor.insertContent('[thz_get_page_title]');}},
                {text: 'Current year',onclick: function() {editor.insertContent('[thz_current_year]');}}
            ]
			
        });

    }
	
    tinymce.create('tinymce.plugins.thz_editor_shortcodes', {
        init: initPlugin
    });

    tinymce.PluginManager.add('thz_editor_shortcodes', tinymce.plugins.thz_editor_shortcodes);
	
})(jQuery);
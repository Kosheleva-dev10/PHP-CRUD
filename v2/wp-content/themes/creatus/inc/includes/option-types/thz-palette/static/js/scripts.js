(function($, fwe) {

    fwe.on('fw:options:init', function(data) {
		
        data.$elements.find('.fw-option.fw-option-type-thz-palette:not(.thz-option-initialized)').each(function() {

			 var $this = $(this);
			 var $theme_palette = JSON.parse($this.attr('data-palette-set'));
			 
			 $(document).ThzPalette('ThemePaletteChanged');
			 
			 $this.find('input.is-palette').on('fw:thz:color:picker:changed',function (e){
				 
				 var $color_name 				= $(this).attr('data-name');
				 $theme_palette[$color_name] 	= $(this).val();
				 var $new_palette 				= $(document).data('plugin_ThzPalette').ThemePaletteShades($theme_palette);
				 
				 $this.attr('data-palette-set', JSON.stringify($new_palette));
				 
				 //thz_picker_vars.thz_palette = JSON.stringify($new_palette);
				 
				 		 
				 $(document).data('plugin_ThzPalette').ThemePaletteChanged();

			 });
			 
        }).addClass('thz-option-initialized');

    });

})(jQuery, fwEvents);
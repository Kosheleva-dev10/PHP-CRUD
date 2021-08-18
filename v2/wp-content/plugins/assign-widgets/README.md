# Assign Widgets

### Assign Widgets WordPress Plugin in Action

- [Assign Widgets Plugin Demo Video](https://www.youtube.com/watch?v=XNNYcIZjoDY)
- [Assigned Widgets on Creatus.io blog page](https://creatus.io/blog/)	
- [Unassigned Widgets on Creatus.io post page](https://creatus.io/dark-night-fixie/)
- [Different Widgets Assigned on Creatus.io shop homepage](https://creatus.io/shop/)

Assign Widgets plugin for WordPress will help you assign widgets to specific pages or create custom widget areas. Plugin options are located under every WordPress widget area and they will help you control following settings;


### Settings

Option | Type | Default | Description
------ | ---- | ------- | -----------
Widget visibility type | string | hide ( not applicable if no assigned pages ) | From predefined select options __Hide on selected pages/types__ and __Show only on selected pages/types__ choose if the widget should be shown or hidden on selected pages.
Assigned pages or view types | array | null | Use predefined page types to assign your widget. Start typing the page name to activate page search utility that will help you assign widget to a specific page.
New widget area name | string | empty | Input box that will generate your widget area once you click on __Add new widget area__ button and will generate the widget are position code that you can use in your theme or plugin template files.


## Example usage for custom widget areas

In your theme or plugin template files add;

```php
<?php dynamic_sidebar( 'replace_with_position_found_under_generated_widget_title' ); ?>
```
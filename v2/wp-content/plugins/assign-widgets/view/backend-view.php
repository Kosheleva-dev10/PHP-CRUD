<?php 
/**
 * @package      Assign Widgets
 * @copyright    Copyright(C) since 2015  Themezly.com. All Rights Reserved.
 * @author       Themezly
 * @license      http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2
 * @websites     http://www.themezly.com
 */
if(!defined('ABSPATH')) exit; 

	if(isset($options['view_type']) === false){
		$options['view_type'] = 'hide';
	}
	
	if(isset($options['assigned_pages']) === false){
		$options['assigned_pages'] = array();
	}

	$data_select = array();
	$json_data	 = '';
	if(!empty($options['assigned_pages'])){
		foreach($options['assigned_pages'] as $key => $page){
			
			$pageId = explode('_',$page);
			$title  ='';
			if(isset($pageId[2])){
				
				$title = $pageId[0] == 'tx' ? get_cat_name( $pageId[2] ) : get_the_title( $pageId[2] );
			}
			
			
			$data_select[] = array(
				'text'   => $title,
				'value' =>  $page,
			);
			
		}
		
	}
	if(!empty($data_select)){
		$json_data = ' data-data="'.htmlentities(json_encode($data_select)).'"';
	}

?>
<div class="thz_aw_holder">
	<label for="<?php echo $instance->get_field_id('view_type'); ?>"><?php echo __('Widget visibility type','assign-widgets') ?></label>
	<select name="<?php echo $instance->get_field_name('view_type'); ?>" id="<?php echo $instance->get_field_id('view_type'); ?>">
		<option value="hide"<?php selected( $options['view_type'], 'hide' ); ?>><?php echo __('Hide on selected pages/types','assign-widgets') ?></option>
		<option value="show"<?php selected( $options['view_type'], 'show' ); ?>><?php echo __('Show only on selected pages/types','assign-widgets') ?></option>
	</select>
</div>
<div class="thz_aw_holder">
	<label for="<?php echo $instance->get_field_id('assigned_pages'); ?>"><?php echo __('Assigned pages or view types','assign-widgets') ?></label>
	<select<?php echo $json_data ?> class="thz_assign_pages" name="<?php echo $instance->get_field_name('assigned_pages'); ?>[]" id="<?php echo $instance->get_field_id('assigned_pages'); ?>" multiple="multiple">
		  <optgroup label="<?php echo  __('Post types', 'assign-widgets') ?>">
				<?php foreach ($post_types as $key => $ptoptions) { 
						$selected = '';
						if(in_array($key,$options['assigned_pages'])){
							$selected = ' selected="selected"';	
						}
				?>
				<option value="<?php echo $key ?>"<?php echo $selected; ?>><?php echo $ptoptions ?></option>
				<?php unset($ptoptions);} ?>
		  </optgroup>	
		  <optgroup label="<?php echo  __('Taxonomy Categories', 'assign-widgets') ?>">
				<?php foreach ($taxonomies as $key => $txoptions) { 
						$selected = '';
						if(in_array($key,$options['assigned_pages'])){
							$selected = ' selected="selected"';	
						}
				?>
				<option value="<?php echo $key ?>"<?php echo $selected; ?>><?php echo $txoptions ?></option>
				<?php unset($txoptions);} ?>
		  </optgroup>	
		  <optgroup label="<?php echo  __('Archives', 'assign-widgets') ?>">
				<?php foreach ($archives as $key => $aroptions) { 
						$selected = '';
						if(in_array($key,$options['assigned_pages'])){
							$selected = ' selected="selected"';	
						}
				?>
				<option value="<?php echo $key ?>"<?php echo $selected; ?>><?php echo $aroptions ?></option>
				<?php unset($aroptions);} ?>
		  </optgroup>
		  <optgroup label="<?php echo  __('User groups', 'assign-widgets') ?>">
				<?php foreach ($usergroups as $key => $ugoptions) { 
						$selected = '';
						if(in_array($key,$options['assigned_pages'])){
							$selected = ' selected="selected"';	
						}
				?>
				<option value="<?php echo $key ?>"<?php echo $selected; ?>><?php echo $ugoptions ?></option>
				<?php unset($ugoptions);} ?>
		  </optgroup>
		  <optgroup label="<?php echo  __('Devices', 'assign-widgets') ?>">
				<?php foreach ($devices as $key => $deoptions) { 
						$selected = '';
						if(in_array($key,$options['assigned_pages'])){
							$selected = ' selected="selected"';	
						}
				?>
				<option value="<?php echo $key ?>"<?php echo $selected; ?>><?php echo $deoptions ?></option>
				<?php unset($deoptions);} ?>
		  </optgroup>
		  <optgroup label="<?php echo  __('Miscellaneous', 'assign-widgets') ?>">
				<?php foreach ($miscellaneous as $key => $moptions) { 
						$selected = '';
						if(in_array($key,$options['assigned_pages'])){
							$selected = ' selected="selected"';	
						}
				?>
				<option value="<?php echo $key ?>"<?php echo $selected; ?>><?php echo $moptions ?></option>
				<?php unset($moptions);} ?>
		  </optgroup>
	</select>
	<span class="thz_aw_info"><?php echo __('Select from the list or start typing to load specific pages.','assign-widgets') ?></span>
</div>
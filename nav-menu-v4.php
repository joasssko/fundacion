<?php

		class acf_field_nav_menu extends acf_field
{
	// vars
	var $settings, // will hold info such as dir / path
		$defaults; // will hold default field options
		
		
	function __construct()
	{
		// vars
		$this->name = 'nav_menu';
		$this->label = __('Nav Menu');
		$this->category = __("Relational",'acf'); // Basic, Content, Choice, etc
		$this->defaults = array(
			'save_format' => 'id',
			'allow_null' => 0,
			'container' => 'div'
		);
		
    	parent::__construct();
    	
		$this->settings = array(
			'path' => apply_filters('acf/helpers/get_path', __FILE__),
			'dir' => apply_filters('acf/helpers/get_dir', __FILE__),
			'version' => '1.1.2'
		);

	}
	
	function create_options( $field )
	{
		$field = array_merge($this->defaults, $field);
		$key = $field['name'];
		?>
<tr class="field_option field_option_<?php echo $this->name; ?>">
	<td class="label">
		<label><?php _e("Return Value",'acf'); ?></label>
	</td>
	<td>
		<?php
		
		do_action('acf/create_field', array(
			'type'		=>	'radio',
			'name'		=>	'fields['.$key.'][save_format]',
			'value'		=>	$field['save_format'],
			'layout'	=>	'horizontal',
			'choices' 	=>	array(
				'object'	=>	__("Nav Menu Object",'acf'),
				'menu'		=>	__("Nav Menu HTML",'acf'),
				'id'		=>	__("Nav Menu ID",'acf')
			)
		));
		
		?>
	</td>
</tr>
<tr class="field_option field_option_<?php echo $this->name; ?>">
	<td class="label">
		<label><?php _e("Menu Container",'acf'); ?></label>
		<p class="description">What to wrap the Menu's ul with.<br />Only used when returning HTML.</p>
	</td>
	<td>
		<?php
		$choices = $this->get_allowed_nav_container_tags();
		do_action('acf/create_field', array(
			'type'		=>	'select',
			'name'		=>	'fields['.$key.'][container]',
			'value'		=>	$field['container'],
			'choices' 	=>	$choices
		));
		?>
	</td>
</tr>
<tr class="field_option field_option_<?php echo $this->name; ?>">
	<td class="label">
		<label><?php _e("Allow Null?",'acf'); ?></label>
	</td>
	<td>
		<?php 
		do_action('acf/create_field', array(
			'type'	=>	'radio',
			'name'	=>	'fields['.$key.'][allow_null]',
			'value'	=>	$field['allow_null'],
			'choices'	=>	array(
				1	=>	__("Yes",'acf'),
				0	=>	__("No",'acf'),
			),
			'layout'	=>	'horizontal',
		));
		?>
	</td>
</tr>
		<?php
	}
	function create_field( $field )
	{
		echo sprintf( '<select id="%d" class="%s" name="%s">', $field['id'], $field['class'], $field['name']  );
		if( $field['allow_null'] )
		{
			echo '<option value=""> - Select - </option>';
		}
		$nav_menus = $this->get_nav_menus();
		foreach( $nav_menus as $nav_menu_id => $nav_menu_name ) {
			$selected = selected( $field['value'], $nav_menu_id );
			echo sprintf( '<option value="%1$d" %3$s>%2$s</option>', $nav_menu_id, $nav_menu_name, $selected );
		}
		echo '</select>';
	}
	function get_nav_menus() {
		$navs = get_terms('nav_menu', array( 'hide_empty' => false ) );
		$nav_menus = array();
		foreach( $navs as $nav ) {
			$nav_menus[ $nav->term_id ] = $nav->name;
		}
		return $nav_menus;
	}
	function get_allowed_nav_container_tags() {
		$tags = apply_filters( 'wp_nav_menu_container_allowedtags', array( 'div', 'nav' ) );
		$formatted_tags = array(
			array( '0' => 'None' )
		);
		foreach( $tags as $tag ) {
    		$formatted_tags[0][$tag] = ucfirst( $tag );
		}
		return $formatted_tags;
	}
	function format_value_for_api( $value, $post_id, $field )
	{
		$field = array_merge($this->defaults, $field);
		if( !$value ) {
			return false;
		}
		if( $field['save_format'] == 'object' ) {
			$wp_menu_object = wp_get_nav_menu_object( $value );
			if( !$wp_menu_object ) {
				return false;
			}
			$menu_object = new stdClass;
			$menu_object->ID = $wp_menu_object->term_id;
			$menu_object->name = $wp_menu_object->name;
			$menu_object->slug = $wp_menu_object->slug;
			$menu_object->count = $wp_menu_object->count;
			return $menu_object;
		} elseif( $field['save_format'] == 'menu' ) {
			ob_start();
			wp_nav_menu( array(
				'menu' => $value,
				'container' => $field['container']
			) );
			return ob_get_clean();
		}
		return $value;
	}
}
new acf_field_nav_menu();


?>
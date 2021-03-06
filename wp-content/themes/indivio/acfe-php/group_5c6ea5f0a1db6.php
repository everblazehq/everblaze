<?php 

if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array(
	'key' => 'group_5c6ea5f0a1db6',
	'title' => 'Block: Contact Form',
	'fields' => array(
		array(
			'key' => 'field_5c6ea5f81150f',
			'label' => 'Contact Form',
			'name' => 'contact_form',
			'type' => 'acfe_forms',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'acfe_permissions' => '',
			'forms' => '',
			'field_type' => 'select',
			'default_value' => '',
			'return_format' => 'name',
			'allow_null' => 0,
			'multiple' => 0,
			'ui' => 0,
			'post_type' => array(
			),
			'choices' => array(
			),
			'ajax' => 0,
			'placeholder' => '',
			'layout' => '',
			'toggle' => 0,
			'allow_custom' => 0,
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'block',
				'operator' => '==',
				'value' => 'acf/block-contact-form',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => 1,
	'description' => '',
	'acfe_display_title' => '',
	'acfe_autosync' => array(
		0 => 'php',
		1 => 'json',
	),
	'acfe_permissions' => '',
	'acfe_form' => 0,
	'acfe_meta' => '',
	'acfe_note' => '',
	'modified' => 1571839650,
));

endif;
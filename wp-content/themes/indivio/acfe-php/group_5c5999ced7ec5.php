<?php 

if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array(
	'key' => 'group_5c5999ced7ec5',
	'title' => 'Block: Sponsors',
	'fields' => array(
		array(
			'key' => 'field_5c6d47886b28e',
			'label' => 'Sponsors',
			'name' => 'block_sponsors',
			'type' => 'repeater',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'collapsed' => '',
			'min' => 0,
			'max' => 0,
			'layout' => 'table',
			'button_label' => 'Add sponsor',
			'sub_fields' => array(
				array(
					'key' => 'field_5c6ff37f09036',
					'label' => 'Layout',
					'name' => 'block_sponsor_layout',
					'type' => 'select',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '33.3333',
						'class' => '',
						'id' => '',
					),
					'choices' => array(
						'block' => 'Block',
						'list' => 'List',
					),
					'default_value' => array(
						0 => 'block',
					),
					'allow_null' => 0,
					'multiple' => 0,
					'ui' => 0,
					'return_format' => 'value',
					'ajax' => 0,
					'placeholder' => '',
				),
				array(
					'key' => 'field_5c6d47ca6b28f',
					'label' => 'Sponsor',
					'name' => 'block_sponsor',
					'type' => 'post_object',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '66.6666',
						'class' => '',
						'id' => '',
					),
					'post_type' => array(
						0 => 'sponsors',
					),
					'taxonomy' => '',
					'allow_null' => 0,
					'multiple' => 0,
					'return_format' => 'object',
					'ui' => 1,
				),
			),
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'block',
				'operator' => '==',
				'value' => 'acf/block-sponsors',
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
	'modified' => 1571835668,
));

endif;
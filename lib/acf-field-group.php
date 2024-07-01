<?php 
add_action( 'acf/include_fields', function() {
	if ( ! function_exists( 'acf_add_local_field_group' ) ) {return;}
	acf_add_local_field_group( array(
        'key' => 'group_66812ab42b031',
        'title' => 'Block: Staff',
        'fields' => array(
            array(
                'key' => 'field_66826e4175ee3',
                'label' => 'Select Column Layout',
                'name' => 'select_column_layout',
                'aria-label' => '',
                'type' => 'radio',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'choices' => array(
                    'col2' => '2 Column',
                    'col3' => '3 Column',
                    'col4' => '4 Column',
                    'col5' => '5 Column',
                ),
                'default_value' => '',
                'return_format' => 'value',
                'allow_null' => 0,
                'other_choice' => 0,
                'layout' => 'horizontal',
                'save_other_choice' => 0,
            ),
            array(
                'key' => 'field_66812ab69fca1',
                'label' => 'Select Staff Categories',
                'name' => 'staff_block',
                'aria-label' => '',
                'type' => 'taxonomy',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'taxonomy' => 'staff_categories',
                'add_term' => 1,
                'save_terms' => 0,
                'load_terms' => 0,
                'return_format' => 'id',
                'field_type' => 'select',
                'allow_null' => 0,
                'bidirectional' => 0,
                'multiple' => 0,
                'bidirectional_target' => array(
                ),
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'block',
                    'operator' => '==',
                    'value' => 'acf/staff-block',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => true,
        'description' => '',
        'show_in_rest' => 0,
    ) );
} );
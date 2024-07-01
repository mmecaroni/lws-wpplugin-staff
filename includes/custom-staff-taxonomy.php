<?php 
// Register Custom Staff Categories Taxonomy
function custom_staff_taxonomy()
{

	$labels = array(
		'name'                       => _x('Staff Categories', 'Taxonomy General Name', 'text_domain'),
		'singular_name'              => _x('Staff Category', 'Taxonomy Singular Name', 'text_domain'),
		'menu_name'                  => __('Staff Categories', 'text_domain'),
		'all_items'                  => __('All Staff Categories', 'text_domain'),
		'parent_item'                => __('Parent Staff Category', 'text_domain'),
		'parent_item_colon'          => __('Parent Staff Category:', 'text_domain'),
		'new_item_name'              => __('New Staff Category Name', 'text_domain'),
		'add_new_item'               => __('Add New Staff Category', 'text_domain'),
		'edit_item'                  => __('Edit Staff Category', 'text_domain'),
		'update_item'                => __('Update Staff Category', 'text_domain'),
		'view_item'                  => __('View Staff Category', 'text_domain'),
		'separate_items_with_commas' => __('Separate items with commas', 'text_domain'),
		'add_or_remove_items'        => __('Add or remove items', 'text_domain'),
		'choose_from_most_used'      => __('Choose from the most used', 'text_domain'),
		'popular_items'              => __('Popular Staff Categories', 'text_domain'),
		'search_items'               => __('Search Staff Categories', 'text_domain'),
		'not_found'                  => __('Not Found', 'text_domain'),
		'no_terms'                   => __('No items', 'text_domain'),
		'items_list'                 => __('Staff Categories list', 'text_domain'),
		'items_list_navigation'      => __('Staff Categories list navigation', 'text_domain'),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
		'show_in_rest'               => true,
	);
	register_taxonomy('staff_categories', array('staff'), $args);
}
add_action('init', 'custom_staff_taxonomy', 0);

// Register Custom Staff Tags Taxonomy
function custom_staff_taxonomy_tags() {

	$labels = array(
		'name'                       => _x( 'Staff Tags', 'Taxonomy General Name', 'text_domain' ),
		'singular_name'              => _x( 'Staff Tag', 'Taxonomy Singular Name', 'text_domain' ),
		'menu_name'                  => __( 'Staff Tags', 'text_domain' ),
		'all_items'                  => __( 'All Staff Tags', 'text_domain' ),
		'parent_item'                => __( 'Parent Staff Tag', 'text_domain' ),
		'parent_item_colon'          => __( 'Parent Staff Tag:', 'text_domain' ),
		'new_item_name'              => __( 'New Staff Tag Name', 'text_domain' ),
		'add_new_item'               => __( 'Add New Staff Tag', 'text_domain' ),
		'edit_item'                  => __( 'Edit Staff Tag', 'text_domain' ),
		'update_item'                => __( 'Update Staff Tag', 'text_domain' ),
		'view_item'                  => __( 'View Staff Tag', 'text_domain' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'text_domain' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'text_domain' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
		'popular_items'              => __( 'Popular Staff Tags', 'text_domain' ),
		'search_items'               => __( 'Search Staff Tags', 'text_domain' ),
		'not_found'                  => __( 'Not Found', 'text_domain' ),
		'no_terms'                   => __( 'No items', 'text_domain' ),
		'items_list'                 => __( 'Staff Tags list', 'text_domain' ),
		'items_list_navigation'      => __( 'Staff Tags list navigation', 'text_domain' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => false,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
		'show_in_rest'               => true,
	);
	register_taxonomy( 'staff_tags', array( 'staff' ), $args );

}
add_action( 'init', 'custom_staff_taxonomy_tags', 0 );
<?php
// Register Custom Post Type
function custom_staff_post_type()
{

	$labels = array(
		'name'                  => _x('Staff', 'Post Type General Name', 'text_domain'),
		'singular_name'         => _x('Staff', 'Post Type Singular Name', 'text_domain'),
		'menu_name'             => __('Staff', 'text_domain'),
		'name_admin_bar'        => __('Staff', 'text_domain'),
		'archives'              => __('Staff Archives', 'text_domain'),
		'attributes'            => __('Staff Attributes', 'text_domain'),
		'parent_item_colon'     => __('Parent Staff:', 'text_domain'),
		'all_items'             => __('All Staff', 'text_domain'),
		'add_new_item'          => __('Add New Staff', 'text_domain'),
		'add_new'               => __('Add New', 'text_domain'),
		'new_item'              => __('New Staff', 'text_domain'),
		'edit_item'             => __('Edit Staff', 'text_domain'),
		'update_item'           => __('Update Staff', 'text_domain'),
		'view_item'             => __('View Staff', 'text_domain'),
		'view_items'            => __('View Staff', 'text_domain'),
		'search_items'          => __('Search Staff', 'text_domain'),
		'not_found'             => __('Not found', 'text_domain'),
		'not_found_in_trash'    => __('Not found in Trash', 'text_domain'),
		'featured_image'        => __('Featured Image', 'text_domain'),
		'set_featured_image'    => __('Set featured image', 'text_domain'),
		'remove_featured_image' => __('Remove featured image', 'text_domain'),
		'use_featured_image'    => __('Use as featured image', 'text_domain'),
		'insert_into_item'      => __('Insert into sponsor', 'text_domain'),
		'uploaded_to_this_item' => __('Uploaded to this sponsor', 'text_domain'),
		'items_list'            => __('Staff list', 'text_domain'),
		'items_list_navigation' => __('Staff list navigation', 'text_domain'),
		'filter_items_list'     => __('Filter staff list', 'text_domain'),
	);
	$args = array(
		'label'                 => __('Staff', 'text_domain'),
		'description'           => __('Staff Description', 'text_domain'),
		'labels'                => $labels,
		'supports'              => array('title', "excerpt", 'editor', 'thumbnail', 'post-formats'),
		'menu_icon'				=> 'dashicons-groups',
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 7,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
		'show_in_rest'          => true,
	);
	register_post_type('staff', $args);
}
add_action('init', 'custom_staff_post_type', 0);


// function add_staff_submenu() {
//     add_submenu_page(
//         'acf-options-dashboard',  // slug of the parent menu created with acf_add_options_page
//         'Staff',         // page title
//         'Staff',         // menu title
//         'edit_posts',       // capability
//         'edit.php?post_type=staff' // URL slug for the staff post type
//     );
// }
// add_action('admin_menu', 'add_staff_submenu');
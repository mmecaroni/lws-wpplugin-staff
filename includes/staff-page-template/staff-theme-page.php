<?php
function check_page_vailability($page_slug) {

	$page = get_page_by_path( $page_slug , OBJECT );

	if ( isset($page) )
	   return $page->post_title;
	else
	   return " ";
}
// Create page for staff
if(check_page_vailability('team') == "team" || check_page_vailability('our-team') == "our-team"):
else:
$lws_team = array(
	'post_title'    => wp_strip_all_tags( 'Our Team' ),
	'post_content'  => 'My custom page content',
	'post_status'   => 'publish',
	'post_author'   => 1,
	'post_type'     => 'page',
);

// Insert the post into the database
wp_insert_post( $lws_team );
endif;

function wpd_plugin_page_template( $page_template ){
    if ( is_page( 'our-team' ) || is_page( 'team' ) ) {
        include( get_template_directory() . '/templates/team-page.php'); 
    }
    
}
add_filter( 'page_template', 'wpd_plugin_page_template',99 );
<?php
///////// Staff Meta Noindex & Nofollow ///////////////////////
function lws_noindex_for_staff()
{
    global $post;
    $staff_id = $post->ID;
    if (get_field('onoff_staff_link',$staff_id) == 1) {
        echo '<meta name="robots" content="noindex, follow">';
    }
}
add_action('wp_head', 'lws_noindex_for_staff');
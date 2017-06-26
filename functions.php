<?php
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );
function my_theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );

}

function dougbeal_unregister_categories() {
    register_taxonomy( 'category', array() );
}
add_action( 'init', 'dougbeal_unregister_categories' );
unregister_widget( 'WP_Widget_Categories' );

add_filter('amazon_affiliate_id', create_function('', 'return "dpb0e-20";'));



function auto_approve_some_comments($approved, $commentdata) {
    if (strpos($commentdata['comment_agent'], 'Bridgy (https://brid.gy/about) AppEngine-Google') !== false ) {
    # facebook doesn't get auto-approved due to privacy concerns
        if (strpos($commentdata['comment_author_url'], 'facebook') !== false) {
            return 0;
        } else {
            return 1;
        }
    } elseif (strpos($commentdata['comment_author'], 'Swarm') !== false ) {
        return 1;
    }
}
    

add_filter('pre_comment_approved', 'auto_approve_some_comments', '99', 2);
?>
/*
comment_author Swarm

comment_author_url https://ownyourswarm.p3k.io
https://ownyourswarm.p3k.io/checkin/595066358c35dc3d4717e29e/bf1b1322757d5644157b485c4fa5886a


comment_author_url
https://brid-gy.appspot.com/like/facebook


*/
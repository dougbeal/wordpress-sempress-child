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



function auto_approve_bridgy_comments($approved, $commentdata) {
    return strpos($commentdata['comment_agent'], 'Bridgy (https://brid.gy/about) AppEngine-Google') !== false ? 1 : $approved;
}
add_filter('pre_comment_approved', 'auto_approve_bridgy_comments', '99', 2);
?>
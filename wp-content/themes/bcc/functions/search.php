<?php 
add_action( 'init', 'update_my_custom_type', 99 );

function update_my_custom_type() {
    global $wp_post_types;

    if ( post_type_exists( 'hospital_facility' ) ) {

        // exclude from search results
        $wp_post_types['hospital_facility']->exclude_from_search = true;
    }
}
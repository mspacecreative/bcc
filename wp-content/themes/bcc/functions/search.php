<?php 
function entex_fn_remove_post_type_from_search_results($query){

    /* check is front end main loop content */
    if(is_admin() || !$query->is_main_query()) return;

    /* check is search result query */
    if($query->is_search()){

        $post_type_to_remove = 'hospital_facility';
        /* get all searchable post types */
        $searchable_post_types = get_post_types(array('exclude_from_search' => false));

        /* make sure you got the proper results, and that your post type is in the results */
        if(is_array($searchable_post_types) && in_array($post_type_to_remove, $searchable_post_types)){
            /* remove the post type from the array */
            unset( $searchable_post_types[ $post_type_to_remove ] );
            /* set the query to the remaining searchable post types */
            $query->set('post_type', $searchable_post_types);
        }
    }
}
add_action('pre_get_posts', 'entex_fn_remove_post_type_from_search_results');

add_filter('relevanssi_modify_wp_query', 'rlv_remove_polylang');
function rlv_remove_polylang($q) {
	$q->tax_query = "";
	$q->set('taxonomy', null);
	$q->set('term', null);
	return $q;
}
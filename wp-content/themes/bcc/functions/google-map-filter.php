<?php
function googleMapAPIScript() {
	wp_register_script('aa_js_googlemaps_script', 'https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyA7bgPEv6D1DOFBlFH9JSnnsC-2VV4xYrs', array('jquery'), null);

	wp_enqueue_script('aa_js_googlemaps_script');
}
add_action('wp_enqueue_scripts', 'googleMapAPIScript');

function my_acf_google_map_api( $api ){
    $api['key'] = 'AIzaSyA7bgPEv6D1DOFBlFH9JSnnsC-2VV4xYrs';
    return $api;
}
add_filter('acf/fields/google_map/api', 'my_acf_google_map_api');

// CHANGE MAP TO FRENCH
add_action( 'wp_enqueue_scripts', function() {
	$language = 'fr-FR';

	wp_deregister_script( 'aa_js_googlemaps_script' );
	wp_register_script( 'aa_js_googlemaps_script_fre', 'https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyA7bgPEv6D1DOFBlFH9JSnnsC-2VV4xYrs' . '&language=' . $language, array('jquery'), null);
	wp_enqueue_script('aa_js_googlemaps_script_fre');
}, 100 );
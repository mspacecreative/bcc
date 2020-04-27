<?php

// RESOURCE TYPE VIDEO LOOP
function resourceVideoLoop() {
	ob_start();
		get_template_part('loops/loop-videos');
	return ob_get_clean();
}
add_shortcode( 'video_loop', 'resourceVideoLoop' );

// RESOURCE TYPE LINKS LOOP
function relevantLinksLoop() {
	ob_start();
		get_template_part('loops/loop-relevant-links');
	return ob_get_clean();
}
add_shortcode( 'relevant_links_loop', 'relevantLinksLoop' );

// HOSPITAL FACILITIES MAP
function hospitalFacilitiesMap() {
	ob_start();
		get_template_part('includes/hospital-facilities-map');
	return ob_get_clean();
}
add_shortcode( 'hospital_facilities_map', 'hospitalFacilitiesMap' );
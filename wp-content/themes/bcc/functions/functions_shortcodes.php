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

// RESOURCE TYPE LINKS LOOP
function relevantLinksLoop2col() {
	ob_start();
		get_template_part('loops/loop-relevant-links-twocol');
	return ob_get_clean();
}
add_shortcode( 'relevant_links_loop_2', 'relevantLinksLoop2col' );

// RESOURCE TYPE LINKS LOOP
function relevantLinksLoop3col() {
	ob_start();
		get_template_part('loops/loop-relevant-links-threecol');
	return ob_get_clean();
}
add_shortcode( 'relevant_links_loop_3', 'relevantLinksLoop3col' );

// RESOURCE TYPE LINKS LOOP
function relevantLinksLoop4col() {
	ob_start();
		get_template_part('loops/loop-relevant-links-fourcol');
	return ob_get_clean();
}
add_shortcode( 'relevant_links_loop_4', 'relevantLinksLoop4col' );

// HOSPITAL FACILITIES MAP
function hospitalFacilitiesMap() {
	ob_start();
		get_template_part('includes/hospital-facilities-map');
	return ob_get_clean();
}
add_shortcode( 'hospital_facilities_map', 'hospitalFacilitiesMap' );
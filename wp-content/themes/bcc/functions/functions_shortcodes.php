<?php

// RESOURCE TYPE VIDEO LOOP
function resourceVideoLoop() {
	ob_start();
		get_template_part('loops/loop-videos');
	return ob_get_clean();
}
add_shortcode( 'video_loop', 'resourceVideoLoop' );
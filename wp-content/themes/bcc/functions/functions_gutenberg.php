<?php

/* STYLE GUTENBERG */
function gutenberg_editor_styles() {
	add_theme_support('editor-styles');
	add_editor_style( 'assets/css/gutenberg.css' );
}

add_action('init','gutenberg_editor_styles');
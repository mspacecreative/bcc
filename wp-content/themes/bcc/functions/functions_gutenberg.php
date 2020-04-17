<?php

/* STYLE GUTENBERG */
function gutenberg_editor_styles() {
	add_theme_support('editor-styles');
	add_editor_style( 'assets/css/gutenberg.css' );
}

add_action('init','gutenberg_editor_styles');

/* ADD BACK EXCERPTS */
function wpse325327_add_excerpts_to_pages() {
    add_post_type_support( 'page', 'excerpt' );
}
add_action( 'init', 'wpse325327_add_excerpts_to_pages' );
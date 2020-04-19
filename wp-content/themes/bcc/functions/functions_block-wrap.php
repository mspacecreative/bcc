<?php

// ADD WRAPPING DIV TO CLASSIC BLOCK
function wrap_classic_block( $block_content, $block ) {
	if ( is_singular('page') ) {
		if ( null === $block['blockName'] && ! empty( $block_content ) && ! ctype_space( $block_content ) ) {
			$block_content = '<div class="para-block-wrap inner">' . $block_content . '</div>';
		}
		return $block_content;
	} else {
		return $block_content;
	}
}
add_filter( 'render_block', 'wrap_classic_block', 10, 2 );

function wrap_heading_block( $block_content, $block ) {
  if ( 'core/heading' === $block['blockName'] ) {
    $block_content = '<div class="inner">' . $block_content . '</div>';
  } elseif ( 'core/paragraph' === $block['blockName'] ) {
    $block_content = '<div class="inner">' . $block_content . '</div>';
  }
  return $block_content;
}
add_filter( 'render_block', 'wrap_heading_block', 10, 2 );
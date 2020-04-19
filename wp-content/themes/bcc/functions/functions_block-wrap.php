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

add_filter( 'render_block', function( $block_content, $block ) {
    // Target core/* and core-embed/* blocks.
    if ( preg_match( '~^core/|core-embed/~', $block['blockName'] ) ) {
       $block_content = sprintf( '<div class="para-block-wrap no-top-bottom-padding inner">%s</div>', $block_content );
    }
    return $block_content;
}, PHP_INT_MAX - 1, 2 );

function wrap_heading_block( $block_content, $block ) {
  if ( 'core/heading' === $block['blockName'] ) {
    $block_content = '<div class="inner">' . $block_content . '</div>';
  } elseif ( 'core/paragraph' === $block['blockName'] ) {
    $block_content = '<div class="inner">' . $block_content . '</div>';
  }
  return $block_content;
}
add_filter( 'render_block', 'wrap_heading_block', 10, 2 );
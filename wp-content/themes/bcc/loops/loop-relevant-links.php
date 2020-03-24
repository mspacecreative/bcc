<div class="row between-lg between-md gutter-space-1">
			
	<?php 
	$args = array(
		'post_type' => 'resources',
		'posts_per_page'=> -1,
		'tax_query' => array(
			array(
			'taxonomy' => 'resource_type',
			'field' => 'slug',
			'terms' => 'link',
			)
		)
	);
	$loop = new WP_Query( $args );
	if ( $loop->have_posts() ) : ?>
			
	<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
			
	<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 mobile-margin-bottom-25 col-container boxed-link">
		<div class="boxed-content">
			<?php
			$title = get_the_title($post->ID);
			$content = get_the_content($post->ID);
				
			if ( $title ) {
				echo '<h3>' . $title . '</h3>';
			}
			if ( $content ) {
				echo $content;
			} ?>
		</div>
	</div>
			
	<?php endwhile;
	
	endif; wp_reset_query(); ?>
			
</div>
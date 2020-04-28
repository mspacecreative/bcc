<?php $columncount = get_field('column_count'); ?>
<div class="row gutter-space-1">
	
	<?php if ( $columncount == 'two' ): ?>
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 mobile-margin-bottom-25 col-container boxed-link">
	
	<?php elseif ( $columncount == 'three' ): ?>
	<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 mobile-margin-bottom-25 col-container boxed-link">
	
	<?php elseif ( $columncount == 'four' ): ?>
	<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 mobile-margin-bottom-25 col-container boxed-link">
	
	<?php else : ?>
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 mobile-margin-bottom-25 col-container boxed-link">
	<?php endif; ?>	
	
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
		
		<div class="boxed-content">
			<?php
			$title = get_the_title($post->ID);
			$content = get_the_content($post->ID);
				
			if ( $title ) {
				echo '<h3>' . $title . '</h3>';
			}
			if ( $content ) {
				echo $content;
			} 
			
			include 'includes/cta-button-relevant-links-loop.php' ?>
			
		</div>
	<?php endwhile;
	
	endif; wp_reset_query(); ?>
	</div>
			
</div>
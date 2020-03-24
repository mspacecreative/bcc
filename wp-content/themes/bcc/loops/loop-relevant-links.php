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
if ( $loop->have_posts() ) :
		
	if( have_rows('columns_grid') ): ?>
		
	<div class="row between-lg between-md gutter-space-1">
			
		<?php while ( $loop->have_posts() ) : $loop->the_post();
			
		while( have_rows('columns_grid') ): the_row(); ?>
			
		<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 mobile-margin-bottom-25 col-container boxed-link">
			<div class="boxed-content">
				<?php
				$rowheading = get_field('row_heading');
				$content = get_field('content');
				
					
				if ( $rowheading ) {
					echo '<h3>' . $rowheading . '</h3>';
				}
				if ( $content ) {
					echo $content;
				}
					
				include 'includes/cta-button-single.php'; ?>
			</div>
		</div>
			
		<?php endwhile;
			
		endwhile; ?>
			
	</div>
		
	<?php endif;
		
endif; wp_reset_query(); ?>
<?php
/* Template Name: Home Page */
 get_header(); ?>

	<!-- WRAPPER -->
		<div class="wrapper">
			
			<div class="content-wrapper">
				
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				
				<div class="splash light-overlay">
					<div class="splash-static-container">
						<img data-object-fit="cover" src="<?php echo get_template_directory_uri(); ?>/assets/img/backgrounds/bcc-baby-splash.jpg" class="absolute_img">
					</div>
					<!-- inner -->
					<div class="inner txtaligncenter">
						
						<?php 
						$tagline = get_bloginfo('description');
						if ( $tagline ) {
							echo '<div class="tagline">
									<h1>' . $tagline . '</h1>
								  </div>';
						}
						
						$loop = new WP_Query( array( 
							'post_type' => 'news',
							'posts_per_page' => -1,
							)
						);
						if ( $loop->have_posts() ) : ?>
						<div class="maxWidth800 home-carousel-container">
							<div class="carousel">
								<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
								<div>
									<p><?php the_content(); ?></p>
								</div>
								<?php endwhile; ?>
									
							</div>
						</div>
						<?php endif; wp_reset_query(); ?>
						
					</div>
					<!-- / inner -->
				</div>
				
				<div class="content-inner-wrapper">
					
					<?php the_content(); ?>
					
				<?php endwhile; else : ?>
				<p><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>
				<?php endif; ?>
					
				</div>
				<!-- / CONTENT INNER WRAPPER -->
				
			</div>
			<!-- / CONTENT WRAPPER -->

			<?php get_footer(); ?>

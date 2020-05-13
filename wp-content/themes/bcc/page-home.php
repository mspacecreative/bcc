<?php
/* Template Name: Home Page */
 get_header(); ?>

	<!-- WRAPPER -->
		<div class="wrapper">
			
			<div class="content-wrapper">
				
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				
				<div class="splash light-overlay">
					<div class="splash-static-container">
						<img data-object-fit="cover" src="https://annualreport.iwk.nshealth.ca/wp-content/uploads/2019/06/breastfeeding.jpg" class="absolute_img">
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
					
					<!-- RESOURCES -->
					<?php 
					$blockanchor = get_field('block_anchor');
					$heading = get_field('heading');
					
					if ( $blockanchor ): ?>
					<div id="<?php echo $blockanchor ?>" class="section resources">
					
					<?php else : ?>
					<div class="section resources">
					<?php endif; ?>
					
						<div class="inner">
							<div class="inner centered-title-with-line-rules padding-bottom-25">
								<?php if ( $heading ): ?>
								<h2><span class="before-title"></span><?php echo $heading ?><span class="after-title"></span></h2>
								<?php endif; ?>
							</div>
							<div class="inner" style="padding-right: 0; padding-left: 0;">
								<div class="row middle-lg gutter_1 center-lg center-md center-sm center-xs">
								
								<?php if ( have_rows('link_column_left') ): while ( have_rows('link_column_left') ): the_row();
								$link = get_field('link');
								$label = get_field('label'); ?>
								<div class="col-lg-3 col-md-3 row col-sm-6 col-xs-12 middle-lg center-lg center-xs mobile-margin-bottom-50">
									<a href="<?php echo $link ?>"><h3 class="icon-title videos"><?php echo $label ?></h3></a>
								</div>
								<?php endwhile;
								endif; ?>
								
								<?php if ( have_rows('link_column_center') ): while ( have_rows('link_column_center') ): the_row();
								$link = get_field('link');
								$label = get_field('label'); ?>
								<div class="col-lg-3 col-md-3 row col-sm-6 col-xs-12 middle-lg center-lg center-xs mobile-margin-bottom-50">
									<a href="<?php echo $link ?>"><h3 class="icon-title links"><?php echo $label ?></h3></a>
								</div>
								<?php endwhile;
								endif; ?>
								
								<?php if ( have_rows('link_column_right') ): while ( have_rows('link_column_right') ): the_row();
								$link = get_field('link');
								$label = get_field('label'); ?>
								<div class="col-lg-3 col-md-3 row col-sm-6 col-xs-12 middle-lg center-lg center-xs mobile-margin-bottom-50">
									<a href="<?php echo $link ?>"><h3 class="icon-title reports"><?php echo $label ?></h3></a>
								</div>
								<?php endwhile;
								endif; ?>
								
							</div>
							</div>
						</div>
					</div>
					<!-- / RESOURCES -->
					
				<?php endwhile; else : ?>
				<p><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>
				<?php endif; ?>
					
				</div>
				<!-- / CONTENT INNER WRAPPER -->
				
			</div>
			<!-- / CONTENT WRAPPER -->

			<?php get_footer(); ?>

<?php get_header(); ?>

	<!-- WRAPPER -->
	<div class="wrapper">
			
		<div class="content-wrapper">

			<div class="inner no-bottom-padding">
				<h1 class="page-title bottom-margin-50"><?php the_title(); ?></h1>
			</div>

			<?php if (have_posts()): while (have_posts()) : the_post(); ?>

			<!-- article -->
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

				<?php the_content(); ?>
				
				<div class="inner no-top-padding">
					<?php include 'loops/includes/cta-button-relevant-links-loop.php' ?>
				</div>

			</article>
			<!-- /article -->

		<?php endwhile; ?>

		<?php else: ?>

			<!-- article -->
			<article>

				<h2><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h2>

			</article>
			<!-- /article -->

		<?php endif; ?>

		</div>

<?php get_footer(); ?>
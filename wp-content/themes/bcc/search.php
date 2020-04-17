<?php get_header(); ?>

	<!-- WRAPPER -->
	<div class="wrapper">
			
		<!-- content-wrapper -->
		<div class="content-wrapper" style="padding-bottom: 4em;">

			<!-- /inner -->
			<div class="inner no-bottom-padding">

				<h1><?php echo sprintf( __( '%s Search Results for ', 'html5blank' ), $wp_query->found_posts ); echo get_search_query(); ?></h1>
	
				<?php get_template_part('loops/loop-search'); ?>
	
				<?php get_template_part('pagination'); ?>
				
			</div>
			<!-- / inner -->

		</div>
		<!-- / content-wrapper -->

		<?php get_footer(); ?>

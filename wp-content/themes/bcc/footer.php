			<footer id="contact" class="section">
				<div class="inner no-top-bottom-padding light">
					<div class="row gutter-space-1">
						<div class="col-lg-7 col-md-7 col-sm-6 col-xs-12 mobile-margin-bottom-25 col">
							<?php if(!function_exists('dynamic_sidebar') || !dynamic_sidebar('footer-area-left')) ?>
						</div>
						<!--<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 mobile-margin-bottom-25">
							<h3>Subscribe to our newsletter</h3>
							<?php echo do_shortcode('[contact-form-7 id="585" title="List Builder Form"]'); ?>
						</div>-->
						<div class="col-lg-5 col-md-5 col-sm-6 col-xs-12 col">
							<?php if(!function_exists('dynamic_sidebar') || !dynamic_sidebar('footer-area-right')) ?>
						</div>
					</div>
				</div>
			</footer>
			<div class="footer-bottom">	
				<div class="inner_no_top_bottom_padding">
					<p class="credits">&copy; <?php echo date('Y '); echo bloginfo('title'); ?>. 
					<?php if ( get_field('footer_credit', 'options') ):
						the_field('footer_credit');
					endif; ?>
					</p>
				</div>
			</div>
			
		</div><!-- / WRAPPER -->

		<?php wp_footer(); ?>

	</body>
</html>

<?php 
$blockanchor = get_field('block_anchor');

if ( $blockanchor ): ?>
<div id="<?php echo $blockanchor ?>" class="section">
	
<?php else : ?>
<div class="section">

<?php endif; ?>

	<div class="inner">
		<div class="row between-lg no-top-bottom-padding top-lg top-md gutter_1">
				
			<?php if( have_rows('left_column') ):
			while( have_rows('left_column') ): the_row(); ?>
			<div class="col-lg-8 col-xl-8 mobile-margin-bottom-md-25 col-container">
				<?php
				$heading = get_sub_field('heading');
				$content = get_sub_field('content');
				if ( $heading ) {
					echo '<h2>' . $heading . '</h2>';
				}
				if ( $content ) {
					echo $content;
				} ?>
			</div>
			<?php endwhile;
			endif; ?>
			
			<?php if( have_rows('right_column') ):
			while( have_rows('right_column') ): the_row(); ?>
			<div class="col-lg-4 col-xl-4 col-container">
				<div class="boxed-content">
				<?php
				$heading = get_sub_field('heading');
				$content = get_sub_field('content');
				if ( $heading ) {
					echo '<h3>' . $heading . '</h3>';
				}
				if ( $content ) {
					echo $content;
				} ?>
				</div>
			</div>
			<?php endwhile;
			endif; ?>
			
		</div>
	</div>
</div>
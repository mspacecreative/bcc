<?php
$bgcolor = get_field('background_colour');
$heading = get_field('heading');
$subheading = get_field('sub_heading');
$content = get_field('content');

if ( $bgcolor == 'lightblue' ): ?>
<div class="section light_blue_bg light">
	<div class="inner no-top-bottom-padding">
		<?php 
		if ( $heading ) {
			echo '<h1>' . $heading . '</h1>';
		}
		if ( $subheading ) {
			echo '<em>' . $subheading . '</em>';
		} 
		if ( $content ) {
			echo $content;
		}
		if( have_rows('two_column_row') ):
		while( have_rows('two_column_row') ): the_row(); ?>
		<div class="row gutter_1">
			
			<?php if ( get_sub_field('left_column') ): ?>
			<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 col-container">
				<?php the_sub_field('left_column'); ?>
			</div>
			<?php endif; ?>
			
			<?php if ( get_sub_field('right_column') ): ?>
			<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 col-container">
				<?php the_sub_field('right_column'); ?>
			</div>
			<?php endif; ?>
			
		</div>
		<?php endwhile; 
		endif; ?>
	</div>
</div>

<?php elseif ( $bgcolor == 'lightgrey' ): ?>
<div class="section light_grey_bg">
	<div class="inner no-top-bottom-padding">
		<?php 
		if ( $heading ) {
			echo '<h1>' . $heading . '</h1>';
		}
		if ( $subheading ) {
			echo '<em>' . $subheading . '</em>';
		} 
		if ( $content ) {
			echo $content;
		}
		if( have_rows('two_column_row') ):
		while( have_rows('two_column_row') ): the_row(); ?>
		<div class="row gutter_1">
			
			<?php if ( get_sub_field('left_column') ): ?>
			<div class="col-lg-5 col-md-5 col-sm-12 col-xs-12 col-container">
				<?php the_sub_field('left_column'); ?>
			</div>
			<?php endif; ?>
			
			<?php if ( get_sub_field('right_column') ): ?>
			<div class="col-lg-5 col-md-5 col-sm-12 col-xs-12 col-container">
				<?php the_sub_field('right_column'); ?>
			</div>
			<?php endif; ?>
			
		</div>
		<?php endwhile; 
		endif; ?>
	</div>
</div>
<?php endif; ?>
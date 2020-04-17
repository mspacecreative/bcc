<?php
$bgcolor = get_field('background_colour');
$heading = get_field('heading');
$subheading = get_field('sub_heading');
$content = get_field('content');
$textcolor = get_field('text_colour');
$headingcolor = get_field('heading_colour');
$blockanchor = get_field('block_anchor');

if ( $bgcolor == 'lightblue' && $textcolor == 'light' && $blockanchor ): ?>
<div id="<?php echo $blockanchor ?>" class="section blue_bg light">

<?php elseif ( $bgcolor == 'lightblue' && $textcolor == 'dark' && $blockanchor ): ?>
<div id="<?php echo $blockanchor ?>" class="section blue_bg dark">

<?php elseif ( $bgcolor == 'lightgrey' && $textcolor == 'light' && $blockanchor ): ?>
<div id="<?php echo $blockanchor ?>" class="section light_grey_bg light">

<?php elseif ( $bgcolor == 'lightgrey' && $textcolor == 'dark' && $blockanchor ): ?>
<div id="<?php echo $blockanchor ?>" class="section light_grey_bg dark">

<?php elseif ( $bgcolor == 'lightblue' && $textcolor == 'light' ): ?>
<div class="section blue_bg light">
	
<?php elseif ( $bgcolor == 'lightblue' && $textcolor == 'dark' ): ?>
<div class="section blue_bg dark">
	
<?php elseif ( $bgcolor == 'lightgrey' && $textcolor == 'light' ): ?>
<div class="section light_grey_bg light">	

<?php elseif ( $bgcolor == 'lightgrey' && $textcolor == 'dark' ): ?>
<div class="section light_grey_bg dark">
	
<?php elseif ( $bgcolor == 'lightblue' && $blockanchor ): ?>
<div id="<?php echo $blockanchor ?>" class="section blue_bg dark">
	
<?php elseif ( $bgcolor == 'lightgrey' && $blockanchor ): ?>
<div id="<?php echo $blockanchor ?>" class="section light_grey_bg dark">
	
<?php elseif ( $bgcolor == 'lightblue' ): ?>
<div class="section blue_bg dark">
	
<?php elseif ( $bgcolor == 'lightgrey' ): ?>
<div class="section light_grey_bg dark">
	
<?php else : ?>
<div class="section dark">
<?php endif; ?>
	
	<div class="inner no-top-bottom-padding">
		<?php 
		if ( $heading && $headingcolor == 'light' ) {
			echo '<h2 class="light">' . $heading . '</h2>';
		} elseif ( $heading && $headingcolor == 'dark' ) {
			echo '<h2>' . $heading . '</h2>';
		} else {
			echo '<h2>' . $heading . '</h2>';
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
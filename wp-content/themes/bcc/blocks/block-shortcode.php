<?php
$blockanchor = get_field('block_anchor');
$bgcolor = get_field('background_colour');
$textcolor = get_field('text_colour');
$shortcode = get_field('shortcode');
$rowheading = get_field('row_heading');
$columncount = get_field('column_count');

if ( $textcolor == 'light' ): 

if ( $blockanchor && $bgcolor == 'lightblue' ): ?>
<div id="<?php echo $blockanchor ?>" class="section light_blue_bg light">

<?php elseif ( $blockanchor && $bgcolor == 'lightgrey' ) : ?>
<div id="<?php echo $blockanchor ?>" class="section light_grey_bg light">

<?php elseif ( $blockanchor ) : ?>
<div id="<?php echo $blockanchor ?>" class="section white_bg light">

<?php else : ?>
<div class="section white_bg">
<?php endif; ?>

 	<div class="inner no-top-bottom-padding">
 	
	 	<?php if ( $rowheading ) : ?>
	 	<div class="inner no-top-bottom-padding centered-title-with-line-rules">
	 		<h2 class="bottom-margin-50"><?php echo $rowheading ?></h2>
	 	</div>
	 	<?php endif;
	 	
	 	if ( $shortcode ) {
			echo $shortcode;
		} ?>
		
 	</div>
	
</div>

<?php elseif ( $textcolor == 'dark' ):

if ( $blockanchor && $bgcolor == 'lightblue' ) : ?>
<div id="<?php echo $blockanchor ?>" class="section light_blue_bg">

<?php elseif ( $blockanchor && $bgcolor == 'lightgrey' ) : ?>
<div id="<?php echo $blockanchor ?>" class="section light_grey_bg">

<?php elseif ( $blockanchor ) : ?>
<div id="<?php echo $blockanchor ?>" class="section white_bg">

<?php else : ?>
<div class="section white_bg">
<?php endif; ?>

 	<div class="inner no-top-bottom-padding">
 	
	 	<?php if ( $rowheading ) : ?>
	 	<div class="inner no-top-bottom-padding centered-title-with-line-rules">
	 		<h2 class="bottom-margin-50"><?php echo $rowheading ?></h2>
	 	</div>
	 	<?php endif;
	 	
	 	if ( $shortcode && $columncount == 'two' ) {
			echo '<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 mobile-margin-bottom-25 col-container boxed-link">' . $shortcode;
		} elseif ( $shortcode && $columncount == 'three' ) {
			echo '<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 mobile-margin-bottom-25 col-container boxed-link">' . $shortcode;
		}
		elseif ( $shortcode && $columncount == 'four' ) {
			echo '<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 mobile-margin-bottom-25 col-container boxed-link">' . $shortcode;
		}
		elseif ( $shortcode ) {
			echo $shortcode;
		} ?>
		
 	</div>
	
</div>

<?php else :

if ( $blockanchor && $bgcolor == 'lightblue' ) : ?>
<div id="<?php echo $blockanchor ?>" class="section light_blue_bg">

<?php elseif ( $blockanchor && $bgcolor == 'lightgrey' ) : ?>
<div id="<?php echo $blockanchor ?>" class="section light_grey_bg">

<?php elseif ( $blockanchor ) : ?>
<div id="<?php echo $blockanchor ?>" class="section white_bg">

<?php else : ?>
<div class="section white_bg">
<?php endif; ?>

 	<div class="inner no-top-bottom-padding">
 	
	 	<?php if ( $rowheading ) : ?>
	 	<div class="inner no-top-bottom-padding centered-title-with-line-rules">
	 		<h2 class="bottom-margin-50"><?php echo $rowheading ?></h2>
	 	</div>
	 	<?php endif;
	 	
	 	if ( $shortcode ) {
			echo $shortcode;
		} ?>
		
 	</div>
	
</div>

<?php endif; ?>
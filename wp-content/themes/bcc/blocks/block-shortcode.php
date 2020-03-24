<?php
$blockanchor = get_field('block_anchor');
$bgcolor = get_field('background_colour');
$textcolor = get_field('text_colour');
$shortcode = get_field('shortcode');
$rowheading = get_field('row_heading');

if ( $textcolor == 'light' ): 

if ( $blockanchor && $bgcolor == 'lightblue' ): ?>
<div id="<?php echo $blockanchor ?>" class="section light_blue_bg light">

<?php elseif ( $blockanchor && $bgcolor == 'lightgrey' ) : ?>
<div id="<?php echo $blockanchor ?>" class="section light_grey_bg light">

<?php elseif ( $blockanchor ) : ?>
<div id="<?php echo $blockanchor ?>" class="section white_bg light">

<?php else : ?>
<div class="section white_bg">
<?php endif;

 	if ( $rowheading ) : ?>
 	<div class="inner no-top-bottom-padding centered-title-with-line-rules">
 		<h2 class="bottom-margin-50"><?php echo $rowheading ?></h2>
 	</div>
 	
 	if ( $shortcode ) : ?>
	<div class="inner">
		<?php echo $shortcode ?>
	</div>
	<?php endif; ?>
	
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
<?php endif;

 	if ( $shortcode ) : ?>
	<div class="inner">
		<?php echo $shortcode ?>
	</div>
	<?php endif; ?>
	
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
<?php endif;

 	if ( $shortcode ) : ?>
	<div class="inner">
		<?php echo $shortcode ?>
	</div>
	<?php endif; ?>
	
</div>

<?php endif; ?>
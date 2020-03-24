<?php
$padding = get_field('padding');
$maxwidth = get_field('max_width');

if ( $padding == 'both' && $maxwidth ): ?>
<div class="top-bottom-padding-50 row clear maxWidth600">
<?php elseif ( $padding == 'top' && $maxwidth ): ?>
<div class="top-padding row clear maxWidth600">
<?php elseif ( $padding == 'bottom' && $maxwidth ): ?>
<div class="bottom-padding row clear maxWidth600">
<?php elseif ( $padding == 'both' ): ?>
<div class="top-bottom-padding-50 inner row clear">
<?php elseif ( $padding == 'top' ): ?>
<div class="top-padding inner row clear">
<?php elseif ( $padding == 'bottom' ): ?>
<div class="bottom-padding row clear">
<?php elseif ( $maxwidth ): ?>
<div class="row clear maxWidth600">
<?php else : ?>
<div class="no-top-bottom-padding inner row clear">
<?php endif; ?>

	<div class="col-lg-12 col-md-12 col-md-12 col-sm-12 col-xs-12 col-container">
		<div class="carousel">
						
			<?php
			$images = get_field('photo_gallery');
						
			if( $images ):
			foreach( $images as $image ): ?>
						
			<div>
				<img src="<?php echo esc_url($image['sizes']['large']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
				<p><?php echo $image['caption']; ?></p>
			</div>
						
			<?php 
			endforeach;
			endif; ?>
						
		</div>
	</div>
	
</div>
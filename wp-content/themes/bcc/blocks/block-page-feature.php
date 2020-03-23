<?php 
$fullwidth = get_field('full_width');
if ( $fullwidth ): ?>
<div class="no-top-bottom-padding">
<?php else : ?>
<div class="inner no-top-bottom-padding">
<?php endif; ?>
	<div class="two_third_one_third_overlay">
		<div class="two_third_img absolute_img_container">
			<?php
			$image = get_field('featured_img');
			if( !empty( $image ) ): ?>
			<img data-object-fit="cover" class="absolute_img" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>">
			<?php endif; ?>
		</div>
	
		<?php if( have_rows('featured_content') ):
	 	while( have_rows('featured_content') ): the_row();
	 	$heading = get_sub_field('heading');
		$content = get_sub_field('content');
		
		if ( $heading ) : ?>
		<div class="blurb-overlay">
			<h2><?php echo $heading ?></h2>
			<?php
			if ( $content ) {
				echo '<h3>' . $content . '</h3>';
			} ?>
		</div>
		<?php endif; ?>
		
		<?php endwhile; 
		endif; ?>
	</div>
</div>

<style>
	.blurb-overlay h2 {
		text-transform: uppercase;
		letter-spacing: 0.5em;
		font-size: 1em;
	}
</style>
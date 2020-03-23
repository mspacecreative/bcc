<?php
$padding = get_field('padding');
$fullwidth = get_field('full_width');
$dropshadow = get_field('drop_shadow');
$textcolor = get_field('text_colour');
$contentbg = get_field('content_background_colour');

if ( $padding == 'top' ): ?>
<div class="section top-padding no-bottom-padding promo-box-container">
<?php elseif ( $padding == 'bottom' ): ?>
<div class="section bottom-padding no-top-padding promo-box-container">
<?php elseif ( $padding == 'both' ): ?>
<div class="section top-bottom-padding promo-box-container">
<?php elseif ( $padding == 'none' ): ?>
<div class="section no-top-bottom-padding promo-box-container">
<?php elseif ( $fullwidth ): ?>
<div class="section no-top-bottom-padding promo-box-container">
<?php else : ?>
<div class="section promo-box-container">
<?php endif;
 	
 	if ( $textcolor == 'light' ) :
 	
 	if ( $fullwidth && $dropshadow ): ?>
 	<div class="no-top-bottom-padding light">
 		<div class="row">
 	<?php elseif ( $fullwidth ): ?>
 	<div class="no-top-bottom-padding light">
 		<div class="row light-box-shadow">
 	<?php elseif ( $dropshadow ): ?>
 	<div class="no-top-bottom-padding light">
 		<div class="inner no-top-bottom-padding row">
 	<?php else : ?>
	<div class="inner no-top-bottom-padding light">
		<div class="row light-box-shadow">
	<?php endif;
	
	elseif ( $textcolor == 'dark' ):
	
	if ( $fullwidth && $dropshadow ): ?>
 	<div class="no-top-bottom-padding">
 		<div class="row">
 	<?php elseif ( $fullwidth ): ?>
 	<div class="no-top-bottom-padding">
 		<div class="row light-box-shadow">
 	<?php elseif ( $dropshadow ): ?>
 	<div class="no-top-bottom-padding">
 		<div class="inner no-top-bottom-padding row">
 	<?php else : ?>
	<div class="inner no-top-bottom-padding">
		<div class="row light-box-shadow">
	<?php endif;
	
	else :
 	
 	if ( $fullwidth && $dropshadow ): ?>
 	<div class="no-top-bottom-padding">
 		<div class="row">
 	<?php elseif ( $fullwidth ): ?>
 	<div class="no-top-bottom-padding">
 		<div class="row light-box-shadow">
 	<?php elseif ( $dropshadow ): ?>
 	<div class="no-top-bottom-padding">
 		<div class="inner no-top-bottom-padding row">
 	<?php else : ?>
	<div class="inner no-top-bottom-padding">
		<div class="row light-box-shadow">
	<?php endif;
	
	endif;
	
	 		if ( $contentbg == 'lightblue' ) : ?>
			<div class="col-lg-5 col-md-5 col-md-6 col-sm-12 col-xs-12 light_blue_bg row flex-column">
			<?php elseif ( $contentbg == 'lightgrey' ) : ?>
			<div class="col-lg-5 col-md-5 col-md-6 col-sm-12 col-xs-12 light_grey_bg row flex-column">
			<?php else : ?>
			<div class="col-lg-5 col-md-5 col-md-6 col-sm-12 col-xs-12 white_bg row flex-column">
			<?php endif; ?>
				
				<?php if( have_rows('featured_content') ):
				while( have_rows('featured_content') ): the_row(); ?>
				<div class="col-inner responsive-inner">
					<?php 
					$heading = get_sub_field('heading');
					$content = get_sub_field('content');
					if ( $heading ) {
						echo '<h1>' . $heading . '</h1>';
					}
					if ( $heading ) {
						echo $content;
					} ?>
				</div>
				<?php endwhile; 
				endif; ?>
				
			</div>
			
			<?php 
			$featuredimg = get_field('featured_image');
			if ( !empty( $featuredimg ) ): ?>
			<div class="col-lg-7 col-md-6 col-sm-12 col-xs-12 absolute_img_container">
				<img data-object-fit="cover" class="absolute_img_right" src="<?php echo esc_url($featuredimg['url']); ?>" alt="<?php echo esc_attr($featuredimg['alt']); ?>">
			</div>
			<?php endif; ?>
			
		</div>
	</div>
</div>
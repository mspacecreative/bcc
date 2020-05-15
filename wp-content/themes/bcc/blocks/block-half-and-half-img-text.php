<?php
$bgcolor = get_field('background_colour');
$contenttype = get_field('content_type');
$aligncolumns = get_field('align_columns');
$rowheading = get_field('row_heading');
$textcolor = get_field('text_colour');
$headingcolor = get_field('heading_colour');
$blockanchor = get_field('block_anchor');

if ( $blockanchor && $bgcolor == 'lightgrey' && $textcolor == 'light' ): ?>
<div id="<?php echo $blockanchor ?>" class="section light_grey_bg light">

<?php elseif ( $blockanchor && $bgcolor == 'lightgrey' && $textcolor == 'dark' ): ?>
<div id="<?php echo $blockanchor ?>" class="section light_grey_bg dark">

<?php elseif ( $blockanchor && $bgcolor == 'lightblue' && $textcolor == 'light' ): ?>
<div id="<?php echo $blockanchor ?>" class="section blue_bg light">

<?php elseif ( $blockanchor && $bgcolor == 'lightblue' && $textcolor == 'dark' ): ?>
<div id="<?php echo $blockanchor ?>" class="section blue_bg dark">

<?php elseif ( $blockanchor && $bgcolor == 'lightblue' ): ?>
<div id="<?php echo $blockanchor ?>" class="section blue_bg dark">

<?php elseif ( $blockanchor && $bgcolor == 'lightgrey' ): ?>
<div id="<?php echo $blockanchor ?>" class="section light_grey_bg">

<?php elseif ( $bgcolor == 'lightgrey' && $textcolor == 'light' ): ?>
<div class="section light_grey_bg light">

<?php elseif ( $bgcolor == 'lightgrey' && $textcolor == 'dark' ): ?>
<div class="section light_grey_bg dark">

<?php elseif ( $bgcolor == 'lightblue' && $textcolor == 'light' ): ?>
<div class="section blue_bg light">

<?php elseif ( $bgcolor == 'lightblue' && $textcolor == 'dark' ): ?>
<div class="section blue_bg dark">

<?php elseif ( $bgcolor == 'lightblue' ): ?>
<div class="section blue_bg dark">

<?php elseif ( $bgcolor == 'lightgrey' ): ?>
<div class="section light_grey_bg">

<?php elseif ( $blockanchor ): ?>
<div id="<?php echo $blockanchor ?>" class="section">

<?php else : ?>
<div class="section">

<?php endif; ?>

	<div class="inner no-top-bottom-padding">
		
		<?php 
		if ( $rowheading && $headingcolor == 'light' ) {
			echo '<h2 class="light">' . $rowheading . '</h2>';
		} elseif ( $rowheading && $headingcolor == 'dark' ) {
			echo '<h2 class="dark">' . $rowheading . '</h2>';
		} else {
			echo '<h2>' . $rowheading . '</h2>';
		}
		
		if ( $aligncolumns == 'top' ): ?>
		<div class="row gutter_1 top-lg top-md">
		<?php elseif ( $aligncolumns == 'middle' ): ?>
		<div class="row gutter_1 middle-lg middle-md">
		<?php elseif ( $aligncolumns == 'bottom' ): ?>
		<div class="row gutter_1 bottom-lg bottom-md">
		<?php else : ?>
		<div class="row gutter_1">
		<?php endif; ?>
			
			<?php if( have_rows('left_column') ):
	 		while( have_rows('left_column') ): the_row();
	 		$heading = get_sub_field('heading');
			$content = get_sub_field('content'); ?>
			<div class="col-lg-6 mobile-margin-bottom-md-25 col-md-6 col-sm-12 col-xs-12 col-container">
				<?php if ( $heading ) {
					echo '<h2 class="bottom-margin-50">' . $heading . '</h2>';
				}
				if ( $content ) {
					echo $content;
				} ?>
			</div>
			<?php endwhile;
			endif; ?>
			
			<?php if( have_rows('right_column') ):
	 		while( have_rows('right_column') ): the_row();
	 		$contenttype = get_sub_field('content_type'); ?>
			
			<?php if ( $contenttype == 'carousel' ): ?>
			<div class="col-lg-6 col-md-6 col-md-12 col-sm-12 col-xs-12 col-container">
				<div class="carousel who_we_are">
					
					<?php
					$images = get_sub_field('photo_gallery');
					$size = 'large';
					
					if( $images ):
					foreach( $images as $image ): ?>
					
					<div>
						<?php echo wp_get_attachment_image( $image['ID'], $size ); ?>
					</div>
					
					<?php 
					endforeach;
					endif; ?>
					
				</div>
			</div>
			<?php elseif ( $contenttype == 'image' ): ?>
			<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 col-container">
				<?php
				$img = get_sub_field('image');
				if( !empty( $img ) ): ?>
				<img src="<?php echo esc_url($img['url']); ?>" alt="<?php echo esc_attr($img['alt']); ?>">
				<?php endif; ?>
			</div>
			<?php endif; ?>
			<?php endwhile;
			endif; ?>
			
		</div>
	</div>
</div>
<?php
$columns = get_field('columns');
$rowheading = get_field('row_heading');
$rowsubheading = get_field('row_sub_heading');
$bgcolor = get_field('background_colour');
$textcolor = get_field('text_colour');
$boxedcontent = get_field('boxed_content');
$blockanchor = get_field('block_anchor');

if ( $columns == 'two' ):

if ( $blockanchor && $bgcolor == 'lightblue' && $textcolor == 'light' ): ?>
<div id="<?php echo $blockanchor ?>" class="section light_blue_bg light">
<?php elseif ( $blockanchor && $bgcolor == 'lightblue' ): ?>
<div id="<?php echo $blockanchor ?>" class="section light_blue_bg">
<?php elseif ( $blockanchor && $bgcolor == 'lightgrey' && $textcolor == 'light' ): ?>
<div id="<?php echo $blockanchor ?>" class="section light_grey_bg light">
<?php elseif ( $blockanchor && $bgcolor == 'lightgrey' ): ?>
<div id="<?php echo $blockanchor ?>" class="section light_grey_bg">
<?php elseif ( $bgcolor == 'lightblue' && $textcolor == 'light' ): ?>
<div class="section light_blue_bg light">
<?php elseif ( $bgcolor == 'lightblue' ): ?>
<div class="section light_blue_bg">
<?php elseif ( $bgcolor == 'lightgrey' && $textcolor == 'light' ): ?>
<div class="section light_grey_bg light">
<?php elseif ( $bgcolor == 'lightgrey' ): ?>
<div class="section light_grey_bg">
<?php elseif ( $blockanchor ): ?>
<div id="<?php echo $blockanchor ?>" class="section">
<?php else : ?>
<div class="section">
<?php endif; ?>
	<div class="inner no-top-bottom-padding">
		<?php if ( $rowheading ) {
			echo '<h2 class="bottom-margin-50">' . $rowheading . '</h2>';
		} 
		
		if ( $rowsubheading ) {
			echo '<h4>' . $rowsubheading . '</h4>';
		}
		
		if( have_rows('columns_grid') ): ?>
		
		<div class="row between-lg between-md gutter-space-1">
			
			<?php while( have_rows('columns_grid') ): the_row();
			
			$inlinelinks = get_sub_field('inline_links');
			if ( $inlinelinks ):
			
			if ( $boxedcontent ): ?>
			<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 mobile-margin-bottom-25">
				<div class="boxed-content">
					<?php
					$heading = get_sub_field('heading');
					$content = get_sub_field('content');
					
					if ( $heading ) {
						echo '<h4>' . $heading . '</h4>';
					}
					if ( $content ) {
						echo $content;
					}
					
					include 'includes/cta-button-inline.php'; ?>
				</div>
			</div>
			
			<?php else : ?>
			<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 mobile-margin-bottom-25">
				<?php
				$heading = get_sub_field('heading');
				$content = get_sub_field('content');
					
				if ( $heading ) {
					echo '<h4>' . $heading . '</h4>';
				}
				if ( $content ) {
					echo $content;
				}
					
				include 'includes/cta-button-inline.php'; ?>
			</div>
			<?php endif;
			
			else :
			
			if ( $boxedcontent ): ?>
			<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 mobile-margin-bottom-25">
				<div class="boxed-content">
					<?php
					$heading = get_sub_field('heading');
					$content = get_sub_field('content');
					
					if ( $heading ) {
						echo '<h4>' . $heading . '</h4>';
					}
					if ( $content ) {
						echo $content;
					}
					
					include 'includes/cta-button-stacked.php'; ?>
				</div>
			</div>
			
			<?php else : ?>
			<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 mobile-margin-bottom-25">
				<?php
				$heading = get_sub_field('heading');
				$content = get_sub_field('content');
					
				if ( $heading ) {
					echo '<h4>' . $heading . '</h4>';
				}
				if ( $content ) {
					echo $content;
				}
					
				include 'includes/cta-button-stacked.php'; ?>
			</div>
			<?php endif;
			
			endif;
			
			endwhile; ?>
			
		</div>
		
		<?php endif; ?>
		
	</div>
</div>

<?php 
elseif ( $columns == 'three' ):

if ( $blockanchor && $bgcolor == 'lightblue' && $textcolor == 'light' ): ?>
<div id="<?php echo $blockanchor ?>" class="section light_blue_bg light">
<?php elseif ( $blockanchor && $bgcolor == 'lightblue' ): ?>
<div id="<?php echo $blockanchor ?>" class="section light_blue_bg">
<?php elseif ( $blockanchor && $bgcolor == 'lightgrey' && $textcolor == 'light' ): ?>
<div id="<?php echo $blockanchor ?>" class="section light_grey_bg light">
<?php elseif ( $blockanchor && $bgcolor == 'lightgrey' ): ?>
<div id="<?php echo $blockanchor ?>" class="section light_grey_bg">
<?php elseif ( $bgcolor == 'lightblue' && $textcolor == 'light' ): ?>
<div class="section light_blue_bg light">
<?php elseif ( $bgcolor == 'lightblue' ): ?>
<div class="section light_blue_bg">
<?php elseif ( $bgcolor == 'lightgrey' && $textcolor == 'light' ): ?>
<div class="section light_grey_bg light">
<?php elseif ( $bgcolor == 'lightgrey' ): ?>
<div class="section light_grey_bg">
<?php elseif ( $blockanchor ): ?>
<div id="<?php echo $blockanchor ?>" class="section">
<?php else : ?>
<div class="section">
<?php endif; ?>
	<div class="inner no-top-bottom-padding">
		<?php if ( $rowheading ) {
			echo '<h2 class="bottom-margin-50">' . $rowheading . '</h2>';
		} 
		
		if( have_rows('columns_grid') ): ?>
		
		<div class="row between-lg between-md gutter-space-1">
			
			<?php while( have_rows('columns_grid') ): the_row();
			
			$inlinelinks = get_sub_field('inline_links');
			if ( $inlinelinks ):
			
			if ( $boxedcontent ): ?>
			<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 mobile-margin-bottom-25">
				<div class="boxed-content">
					<?php
					$heading = get_sub_field('heading');
					$content = get_sub_field('content');
					
					if ( $heading ) {
						echo '<h4>' . $heading . '</h4>';
					}
					if ( $content ) {
						echo $content;
					}
					
					include 'includes/cta-button-inline.php'; ?>
				</div>
			</div>
			
			<?php else : ?>
			<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 mobile-margin-bottom-25">
				<?php
				$heading = get_sub_field('heading');
				$content = get_sub_field('content');
					
				if ( $heading ) {
					echo '<h4>' . $heading . '</h4>';
				}
				if ( $content ) {
					echo $content;
				}
					
				include 'includes/cta-button-inline.php'; ?>
			</div>
			<?php endif;
			
			else :
			
			if ( $boxedcontent ): ?>
			<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 mobile-margin-bottom-25">
				<div class="boxed-content">
					<?php
					$heading = get_sub_field('heading');
					$content = get_sub_field('content');
					
					if ( $heading ) {
						echo '<h4>' . $heading . '</h4>';
					}
					if ( $content ) {
						echo $content;
					}
					
					include 'includes/cta-button-stacked.php'; ?>
				</div>
			</div>
			
			<?php else : ?>
			<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 mobile-margin-bottom-25">
				<?php
				$heading = get_sub_field('heading');
				$content = get_sub_field('content');
					
				if ( $heading ) {
					echo '<h4>' . $heading . '</h4>';
				}
				if ( $content ) {
					echo $content;
				}
					
				include 'includes/cta-button-stacked.php'; ?>
			</div>
			<?php endif;
			
			endif;
			
			endwhile; ?>
			
		</div>
		
		<?php endif; ?>
		
	</div>
</div>

<?php 
elseif ( $columns == 'four' ):

if ( $blockanchor && $bgcolor == 'lightblue' && $textcolor == 'light' ): ?>
<div id="<?php echo $blockanchor ?>" class="section light_blue_bg light">
<?php elseif ( $blockanchor && $bgcolor == 'lightblue' ): ?>
<div id="<?php echo $blockanchor ?>" class="section light_blue_bg">
<?php elseif ( $blockanchor && $bgcolor == 'lightgrey' && $textcolor == 'light' ): ?>
<div id="<?php echo $blockanchor ?>" class="section light_grey_bg light">
<?php elseif ( $blockanchor && $bgcolor == 'lightgrey' ): ?>
<div id="<?php echo $blockanchor ?>" class="section light_grey_bg">
<?php elseif ( $bgcolor == 'lightblue' && $textcolor == 'light' ): ?>
<div class="section light_blue_bg light">
<?php elseif ( $bgcolor == 'lightblue' ): ?>
<div class="section light_blue_bg">
<?php elseif ( $bgcolor == 'lightgrey' && $textcolor == 'light' ): ?>
<div class="section light_grey_bg light">
<?php elseif ( $bgcolor == 'lightgrey' ): ?>
<div class="section light_grey_bg">
<?php elseif ( $blockanchor ): ?>
<div id="<?php echo $blockanchor ?>" class="section">
<?php else : ?>
<div class="section">
<?php endif; ?>
	<div class="inner no-top-bottom-padding">
		<?php if ( $rowheading ) {
			echo '<h2 class="bottom-margin-50">' . $rowheading . '</h2>';
		} 
		
		if( have_rows('columns_grid') ): ?>
		
		<div class="row between-lg between-md gutter-space-1">
			
			<?php while( have_rows('columns_grid') ): the_row();
			
			$inlinelinks = get_sub_field('inline_links');
			if ( $inlinelinks ):
			
			if ( $boxedcontent ): ?>
			<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 mobile-margin-bottom-25">
				<div class="boxed-content">
					<?php
					$heading = get_sub_field('heading');
					$content = get_sub_field('content');
					
					if ( $heading ) {
						echo '<h4>' . $heading . '</h4>';
					}
					if ( $content ) {
						echo $content;
					}
					
					include 'includes/cta-button-inline.php'; ?>
				</div>
			</div>
			
			<?php else : ?>
			<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 mobile-margin-bottom-25">
				<?php
				$heading = get_sub_field('heading');
				$content = get_sub_field('content');
					
				if ( $heading ) {
					echo '<h4>' . $heading . '</h4>';
				}
				if ( $content ) {
					echo $content;
				}
					
				include 'includes/cta-button-inline.php'; ?>
			</div>
			<?php endif;
			
			else : 
			
			if ( $boxedcontent ): ?>
			<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 mobile-margin-bottom-25">
				<div class="boxed-content">
					<?php
					$heading = get_sub_field('heading');
					$content = get_sub_field('content');
					
					if ( $heading ) {
						echo '<h4>' . $heading . '</h4>';
					}
					if ( $content ) {
						echo $content;
					}
					
					include 'includes/cta-button-stacked.php'; ?>
				</div>
			</div>
			
			<?php else : ?>
			<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 mobile-margin-bottom-25">
				<?php
				$heading = get_sub_field('heading');
				$content = get_sub_field('content');
					
				if ( $heading ) {
					echo '<h4>' . $heading . '</h4>';
				}
				if ( $content ) {
					echo $content;
				}
					
				include 'includes/cta-button-stacked.php'; ?>
			</div>
			<?php endif;
			
			endif;
			
			endwhile; ?>
			
		</div>
		
		<?php endif; ?>
		
	</div>
</div>

<?php endif; ?>
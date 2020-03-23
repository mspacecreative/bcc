<?php
$columns = get_field('columns');
$rowheading = get_field('row_heading');
$rowsubheading = get_field('row_sub_heading');
$bgcolor = get_field('background_colour');
$textcolor = get_field('text_colour');
$blockanchor = get_field('block_anchor');

if ( $blockanchor ):

if ( $columns == 'two' ):

if ( $bgcolor == 'lightblue' && $textcolor == 'light' ): ?>
<div id="<?php echo $blockanchor ?>" class="section light_blue_bg light">
<?php elseif ( $bgcolor == 'lightblue' ): ?>
<div id="<?php echo $blockanchor ?>" class="section light_blue_bg">
<?php elseif ( $bgcolor == 'lightgrey' && $textcolor == 'light' ): ?>
<div id="<?php echo $blockanchor ?>" class="section light_grey_bg light">
<?php elseif ( $bgcolor == 'lightgrey' ): ?>
<div id="<?php echo $blockanchor ?>" class="section light_grey_bg">
<?php else : ?>
<div id="<?php echo $blockanchor ?>" class="section">
<?php endif; ?>
	<div class="inner no-top-bottom-padding">
		
		<?php if ( $rowheading ) : ?>
		<div class="inner no-top-bottom-padding centered-title-with-line-rules">
			<h2 class="bottom-margin-50"><?php echo $rowheading ?></h2>
		</div>
		<?php endif;
		
		$args = array(
		    'post_type' => 'resources',
		    'posts_per_page'=> -1,
		    'tax_query' => array(
		        array(
		            'taxonomy' => 'resource_type',
		            'field' => 'slug',
		            'terms' => 'link',
		        )
		    )
		);
		$loop = new WP_Query( $args );
		if ( $loop->have_posts() ) :
		
		if( have_rows('columns_grid') ): ?>
		
		<div class="row between-lg between-md gutter-space-1">
			
			<?php while ( $loop->have_posts() ) : $loop->the_post();
			
			while( have_rows('columns_grid') ): the_row(); ?>
			
			<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 mobile-margin-bottom-25 col-container boxed-link">
				<div class="boxed-content">
					<?php
					$title = get_the_title();
						
					if ( $title ) {
						echo '<h3>' . $title . '</h3>';
					}
					
					if ( $content ) {
						echo $content;
					}
						
					include 'includes/cta-button-single.php'; ?>
				</div>
			</div>
			
			<?php endwhile;
			
			endwhile; ?>
			
		</div>
		
		<?php endif;
		
		endif; wp_reset_query(); ?>
		
	</div>
</div>

<?php 
elseif ( $columns == 'three' ):

if ( $bgcolor == 'lightblue' && $textcolor == 'light' ): ?>
<div id="<?php echo $blockanchor ?>" class="section light_blue_bg light">
<?php elseif ( $bgcolor == 'lightblue' ): ?>
<div id="<?php echo $blockanchor ?>" class="section light_blue_bg">
<?php elseif ( $bgcolor == 'lightgrey' && $textcolor == 'light' ): ?>
<div id="<?php echo $blockanchor ?>" class="section light_grey_bg light">
<?php elseif ( $bgcolor == 'lightgrey' ): ?>
<div id="<?php echo $blockanchor ?>" class="section light_grey_bg">
<?php else : ?>
<div id="<?php echo $blockanchor ?>" class="section">
<?php endif; ?>
	<div class="inner no-top-bottom-padding">
		
		<?php if ( $rowheading ) : ?>
		<div class="inner no-top-bottom-padding centered-title-with-line-rules">
			<h2 class="bottom-margin-50"><?php echo $rowheading ?></h2>
		</div>
		<?php endif;
		
		$args = array(
		    'post_type' => 'resources',
		    'posts_per_page'=> -1,
		    'tax_query' => array(
		        array(
		            'taxonomy' => 'resource_type',
		            'field' => 'slug',
		            'terms' => 'link',
		        )
		    )
		);
		$loop = new WP_Query( $args );
		if ( $loop->have_posts() ) :
		
		if( have_rows('columns_grid') ): ?>
		
		<div class="row between-lg between-md gutter-space-1">
			
			<?php while ( $loop->have_posts() ) : $loop->the_post();
			
			while( have_rows('columns_grid') ): the_row(); ?>
			
			<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 mobile-margin-bottom-25 col-container boxed-link">
				<div class="boxed-content">
					<?php
					$heading = get_sub_field('heading');
					
					if ( $heading ) {
						echo '<h3>' . $heading . '</h3>';
					}
					
					include 'includes/cta-button-single.php'; ?>
				</div>
			</div>
			
			<?php endwhile;
			
			endwhile; ?>
			
		</div>
		
		<?php endif;
		
		endif; wp_reset_query(); ?>
		
	</div>
</div>

<?php 
elseif ( $columns == 'four' ):

if ( $bgcolor == 'lightblue' && $textcolor == 'light' ): ?>
<div id="<?php echo $blockanchor ?>" class="section light_blue_bg light">
<?php elseif ( $bgcolor == 'lightblue' ): ?>
<div id="<?php echo $blockanchor ?>" class="section light_blue_bg">
<?php elseif ( $bgcolor == 'lightgrey' && $textcolor == 'light' ): ?>
<div id="<?php echo $blockanchor ?>" class="section light_grey_bg light">
<?php elseif ( $bgcolor == 'lightgrey' ): ?>
<div id="<?php echo $blockanchor ?>" class="section light_grey_bg">
<?php else : ?>
<div id="<?php echo $blockanchor ?>" class="section">
<?php endif; ?>
	<div class="inner no-top-bottom-padding">
		
		<?php if ( $rowheading ) : ?>
		<div class="inner no-top-bottom-padding centered-title-with-line-rules">
			<h2 class="bottom-margin-50"><?php echo $rowheading ?></h2>
		</div>
		<?php endif; ?>
		
		<?php if( have_rows('columns_grid') ): ?>
		
		<div class="row between-lg between-md gutter-space-1">
			
			<?php while( have_rows('columns_grid') ): the_row(); ?>
			
			<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 mobile-margin-bottom-25 col-container boxed-link">
				<div class="boxed-content">
					<?php
					$heading = get_sub_field('heading');
					
					if ( $heading ) {
						echo '<h3>' . $heading . '</h3>';
					}
					
					include 'includes/cta-button-single.php'; ?>
				</div>
			</div>
			
			<?php endwhile; ?>
			
		</div>
		
		<?php endif; ?>
		
	</div>
</div>

<?php endif;

else :

if ( $columns == 'two' ):

if ( $bgcolor == 'lightblue' && $textcolor == 'light' ): ?>
<div class="section light_blue_bg light">
<?php elseif ( $bgcolor == 'lightblue' ): ?>
<div class="section light_blue_bg">
<?php elseif ( $bgcolor == 'lightgrey' && $textcolor == 'light' ): ?>
<div class="section light_grey_bg light">
<?php elseif ( $bgcolor == 'lightgrey' ): ?>
<div class="section light_grey_bg">
<?php else : ?>
<div class="section">
<?php endif; ?>
	<div class="inner no-top-bottom-padding">
		
		<?php if ( $rowheading ) : ?>
		<div class="inner no-top-bottom-padding centered-title-with-line-rules">
			<h2 class="bottom-margin-50"><?php echo $rowheading ?></h2>
		</div>
		<?php endif; ?>
		
		<?php if( have_rows('columns_grid') ): ?>
		
		<div class="row between-lg between-md gutter-space-1">
			
			<?php while( have_rows('columns_grid') ): the_row(); ?>
			
			<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 mobile-margin-bottom-25 col-container boxed-link">
				<div class="boxed-content">
					<?php
					$heading = get_sub_field('heading');
						
					if ( $heading ) {
						echo '<h3>' . $heading . '</h3>';
					}
						
					include 'includes/cta-button-single.php'; ?>
				</div>
			</div>
			
			<?php endwhile; ?>
			
		</div>
		
		<?php endif; ?>
		
	</div>
</div>

<?php 
elseif ( $columns == 'three' ):

if ( $bgcolor == 'lightblue' && $textcolor == 'light' ): ?>
<div class="section light_blue_bg light">
<?php elseif ( $bgcolor == 'lightblue' ): ?>
<div class="section light_blue_bg">
<?php elseif ( $bgcolor == 'lightgrey' && $textcolor == 'light' ): ?>
<div class="section light_grey_bg light">
<?php elseif ( $bgcolor == 'lightgrey' ): ?>
<div class="section light_grey_bg">
<?php else : ?>
<div class="section">
<?php endif; ?>
	<div class="inner no-top-bottom-padding">
		
		<?php if ( $rowheading ) : ?>
		<div class="inner no-top-bottom-padding centered-title-with-line-rules">
			<h2 class="bottom-margin-50"><?php echo $rowheading ?></h2>
		</div>
		<?php endif; ?>
		
		<?php if( have_rows('columns_grid') ): ?>
		
		<div class="row between-lg between-md gutter-space-1">
			
			<?php while( have_rows('columns_grid') ): the_row(); ?>
			
			<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 mobile-margin-bottom-25 col-container boxed-link">
				<div class="boxed-content">
					<?php
					$heading = get_sub_field('heading');
					
					if ( $heading ) {
						echo '<h3>' . $heading . '</h3>';
					}
					
					include 'includes/cta-button-single.php'; ?>
				</div>
			</div>
			
			<?php endwhile; ?>
			
		</div>
		
		<?php endif; ?>
		
	</div>
</div>

<?php 
elseif ( $columns == 'four' ):

if ( $bgcolor == 'lightblue' && $textcolor == 'light' ): ?>
<div class="section light_blue_bg light">
<?php elseif ( $bgcolor == 'lightblue' ): ?>
<div class="section light_blue_bg">
<?php elseif ( $bgcolor == 'lightgrey' && $textcolor == 'light' ): ?>
<div class="section light_grey_bg light">
<?php elseif ( $bgcolor == 'lightgrey' ): ?>
<div class="section light_grey_bg">
<?php else : ?>
<div class="section">
<?php endif; ?>
	<div class="inner no-top-bottom-padding">
		
		<?php if ( $rowheading ) : ?>
		<div class="inner no-top-bottom-padding centered-title-with-line-rules">
			<h2 class="bottom-margin-50"><?php echo $rowheading ?></h2>
		</div>
		<?php endif; ?>
		
		<?php if( have_rows('columns_grid') ): ?>
		
		<div class="row between-lg between-md gutter-space-1">
			
			<?php while( have_rows('columns_grid') ): the_row(); ?>
			
			<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 mobile-margin-bottom-25 col-container boxed-link">
				<div class="boxed-content">
					<?php
					$heading = get_sub_field('heading');
					
					if ( $heading ) {
						echo '<h3>' . $heading . '</h3>';
					}
					
					include 'includes/cta-button-single.php'; ?>
				</div>
			</div>
			
			<?php endwhile; ?>
			
		</div>
		
		<?php endif; ?>
		
	</div>
</div>

<?php else :

if ( $bgcolor == 'lightblue' && $textcolor == 'light' ): ?>
<div class="section light_blue_bg light">
<?php elseif ( $bgcolor == 'lightblue' ): ?>
<div class="section light_blue_bg">
<?php elseif ( $bgcolor == 'lightgrey' && $textcolor == 'light' ): ?>
<div class="section light_grey_bg light">
<?php elseif ( $bgcolor == 'lightgrey' ): ?>
<div class="section light_grey_bg">
<?php else : ?>
<div class="section">
<?php endif; ?>
	<div class="inner no-top-bottom-padding">
		
		<?php if ( $rowheading ) : ?>
		<div class="inner no-top-bottom-padding centered-title-with-line-rules">
			<h2 class="bottom-margin-50"><?php echo $rowheading ?></h2>
		</div>
		<?php endif; ?>
		
		<?php if( have_rows('columns_grid') ): ?>
		
		<div class="row between-lg between-md gutter-space-1">
			
			<?php while( have_rows('columns_grid') ): the_row(); ?>
			
			<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 mobile-margin-bottom-25 col-container boxed-link">
				<div class="boxed-content">
					<?php
					$heading = get_sub_field('heading');
					
					if ( $heading ) {
						echo '<h3>' . $heading . '</h3>';
					}
					
					include 'includes/cta-button-single.php'; ?>
				</div>
			</div>
			
			<?php endwhile; ?>
			
		</div>
		
		<?php endif; ?>
		
	</div>
</div>

<?php endif;
<?php 
$blockanchor = get_field('block_anchor');
$heading = get_field('heading');
					
if ( $blockanchor ): ?>
<div id="<?php echo $blockanchor ?>" class="section resources">
					
<?php else : ?>
<div class="section resources">
<?php endif; ?>
					
	<div class="inner">
		<div class="inner centered-title-with-line-rules padding-bottom-25">
			<?php if ( $heading ): ?>
			<h2><span class="before-title"></span><?php echo $heading ?><span class="after-title"></span></h2>
			<?php endif; ?>
		</div>
		<div class="inner" style="padding-right: 0; padding-left: 0;">
			<div class="row middle-lg gutter_1 center-lg center-md center-sm center-xs">
									
				<?php if ( have_rows('link_column_left') ): while ( have_rows('link_column_left') ): the_row();
				$link = get_sub_field('link');
				$label = get_sub_field('label'); ?>
				<div class="col-lg-3 col-md-3 row col-sm-6 col-xs-12 middle-lg center-lg center-xs mobile-margin-bottom-50">
					<a href="<?php echo $link ?>"><h3 class="icon-title videos"><?php echo $label ?></h3></a>
				</div>
				<?php endwhile;
				endif; ?>
										
				<?php if ( have_rows('link_column_center') ): while ( have_rows('link_column_center') ): the_row();
				$link = get_sub_field('link');
				$label = get_sub_field('label'); ?>
				<div class="col-lg-3 col-md-3 row col-sm-6 col-xs-12 middle-lg center-lg center-xs mobile-margin-bottom-50">
					<a href="<?php echo $link ?>"><h3 class="icon-title links"><?php echo $label ?></h3></a>
				</div>
				<?php endwhile;
				endif; ?>
										
				<?php if ( have_rows('link_column_right') ): while ( have_rows('link_column_right') ): the_row();
				$link = get_sub_field('link');
				$label = get_sub_field('label'); ?>
				<div class="col-lg-3 col-md-3 row col-sm-6 col-xs-12 middle-lg center-lg center-xs mobile-margin-bottom-50">
					<a href="<?php echo $link ?>"><h3 class="icon-title reports"><?php echo $label ?></h3></a>
				</div>
				<?php endwhile;
				endif; ?>
									
			</div>
		</div>
	</div>
	
</div>
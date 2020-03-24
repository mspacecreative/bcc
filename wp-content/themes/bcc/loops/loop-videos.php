<script>
	var tag = document.createElement('script');
	    tag.src = "//www.youtube.com/iframe_api";
	    var firstScriptTag = document.getElementsByTagName('script')[0];
	    firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
	
	    function onYouTubeIframeAPIReady() {
	        var $ = jQuery;
	        var players = [];
	        $('iframe').filter(function(){return this.src.indexOf('http://www.youtube.com/') == 0}).each( function (k, v) {
	            if (!this.id) { this.id='embeddedvideoiframe' + k }
	            players.push(new YT.Player(this.id, {
	                events: {
	                    'onStateChange': function(event) {
	                        if (event.data == YT.PlayerState.PLAYING) {
	                            $.each(players, function(k, v) {
	                                if (this.getIframe().id != event.target.getIframe().id) {
	                                    this.pauseVideo();
	                                }
	                            });
	                        }
	                    }
	                }
	            }))
	        });
	    }
</script>
<?php 
$args = array(
    'post_type' => 'resources',
    'posts_per_page'=> -1,
    'tax_query' => array(
        array(
            'taxonomy' => 'resource_type',
            'field' => 'slug',
            'terms' => 'video',
        )
    )
);
$loop = new WP_Query( $args );
if ( $loop->have_posts() ) : ?>
	
<div class="inner no-top-bottom-padding centered-title-with-line-rules">
	<h2 class="bottom-margin-50">Videos</h2>
</div>
		
<div class="row gutter-space-1 content_grid video-media">
<?php while ( $loop->have_posts() ) : $loop->the_post();
$mp4 = get_field('mp4', $post->ID);
$youtube = get_field('youtube', $post->ID);
$vimeo = get_field('vimeo', $post->ID); ?>
			
	<!-- MP4 -->
	<?php if ( $mp4 ): ?>
	<div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 no-side-padding mobile-margin-bottom-25">
		<?php
		$thumbnail = get_field('thumbnail', $post->ID);
		if ( !empty( $thumbnail ) ): ?>
		<div class="video-container video-thumbnail video-mp4">
			<img data-object-fit="cover" class="video_thumb_img" src="<?php echo esc_url($thumbnail['url']); ?>" alt="<?php echo esc_attr($thumbnail['alt']); ?>">
		<?php else : ?>
		<div class="video-container video-placeholder video-mp4">
		<?php endif; ?>
			<svg height="100%" version="1.1" viewBox="0 0 68 48" width="100%"><path class="ytp-large-play-button-bg" d="M66.52,7.74c-0.78-2.93-2.49-5.41-5.42-6.19C55.79,.13,34,0,34,0S12.21,.13,6.9,1.55 C3.97,2.33,2.27,4.81,1.48,7.74C0.06,13.05,0,24,0,24s0.06,10.95,1.48,16.26c0.78,2.93,2.49,5.41,5.42,6.19 C12.21,47.87,34,48,34,48s21.79-0.13,27.1-1.55c2.93-0.78,4.64-3.26,5.42-6.19C67.94,34.95,68,24,68,24S67.94,13.05,66.52,7.74z" fill="#212121" fill-opacity="0.8"></path><path d="M 45,24 27,14 27,34" fill="#fff"></path></svg>
			<video preload="none" controls>
				<source src="<?php echo $mp4 ?>" />
			</video>
		</div>
		<h4><?php the_title(); ?></h4>
	</div>
	<!-- / MP4 -->
							
	<!-- YOUTUBE -->
	<?php elseif ( $youtube ): ?>
	<div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 no-side-padding mobile-margin-bottom-25">
		<?php
		$thumbnail = get_field('thumbnail', $post->ID);
		if ( !empty( $thumbnail ) ): ?>
		<div class="video-container video-thumbnail video-youtube">
			<img data-object-fit="cover" class="video_thumb_img" src="<?php echo esc_url($thumbnail['url']); ?>" alt="<?php echo esc_attr($thumbnail['alt']); ?>">
		<?php else : ?>
		<div class="video-container video-placeholder video-youtube">
		<?php endif; ?>
			<svg height="100%" version="1.1" viewBox="0 0 68 48" width="100%"><path class="ytp-large-play-button-bg" d="M66.52,7.74c-0.78-2.93-2.49-5.41-5.42-6.19C55.79,.13,34,0,34,0S12.21,.13,6.9,1.55 C3.97,2.33,2.27,4.81,1.48,7.74C0.06,13.05,0,24,0,24s0.06,10.95,1.48,16.26c0.78,2.93,2.49,5.41,5.42,6.19 C12.21,47.87,34,48,34,48s21.79-0.13,27.1-1.55c2.93-0.78,4.64-3.26,5.42-6.19C67.94,34.95,68,24,68,24S67.94,13.05,66.52,7.74z" fill="#212121" fill-opacity="0.8"></path><path d="M 45,24 27,14 27,34" fill="#fff"></path></svg>
			<?php echo $youtube ?>
		</div>
		<h4><?php the_title(); ?></h4>
	</div>
	<!-- / YOUTUBE -->
			
	<!-- VIMEO -->
	<?php elseif ( $vimeo ): ?>
	<div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 no-side-padding mobile-margin-bottom-25">
		<?php
		$thumbnail = get_field('thumbnail', $post->ID);
		if ( !empty( $thumbnail ) ): ?>
		<div class="video-container video-thumbnail video-vimeo">
			<img data-object-fit="cover" class="video_thumb_img" src="<?php echo esc_url($thumbnail['url']); ?>" alt="<?php echo esc_attr($thumbnail['alt']); ?>">
		<?php else : ?>
		<div class="video-container video-placeholder video-vimeo">
		<?php endif; ?>
			<svg height="100%" version="1.1" viewBox="0 0 68 48" width="100%"><path class="ytp-large-play-button-bg" d="M66.52,7.74c-0.78-2.93-2.49-5.41-5.42-6.19C55.79,.13,34,0,34,0S12.21,.13,6.9,1.55 C3.97,2.33,2.27,4.81,1.48,7.74C0.06,13.05,0,24,0,24s0.06,10.95,1.48,16.26c0.78,2.93,2.49,5.41,5.42,6.19 C12.21,47.87,34,48,34,48s21.79-0.13,27.1-1.55c2.93-0.78,4.64-3.26,5.42-6.19C67.94,34.95,68,24,68,24S67.94,13.05,66.52,7.74z" fill="#212121" fill-opacity="0.8"></path><path d="M 45,24 27,14 27,34" fill="#fff"></path></svg>
			<?php echo $vimeo ?>
		</div>
		<h4><?php the_title(); ?></h4>
	</div>
	<?php endif; ?>
	<!-- / VIMEO -->
			
<?php endwhile; ?>
</div>
<?php endif; wp_reset_query(); ?>
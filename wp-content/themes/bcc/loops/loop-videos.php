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
	
<script>
    var ytplayerList;

function onPlayerReady(e) {
  var video_data = e.target.getVideoData(),
  label = video_data.video_id + ':' + video_data.title;
  e.target.ulabel = label;
  console.log(label + " is ready!");

}
function onPlayerError(e) {
  console.log('[onPlayerError]');
}
function onPlayerStateChange(e) {
  var label = e.target.ulabel;
  if (e["data"] == YT.PlayerState.PLAYING) {
    console.log({
      event: "youtube",
      action: "play:" + e.target.getPlaybackQuality(),
      label: label });

    //if one video is play then pause other
    pauseOthersYoutubes(e.target);
  }
  if (e["data"] == YT.PlayerState.PAUSED) {
    console.log({
      event: "youtube",
      action: "pause:" + e.target.getPlaybackQuality(),
      label: label });

  }
  if (e["data"] == YT.PlayerState.ENDED) {
    console.log({
      event: "youtube",
      action: "end",
      label: label });

  }
  //track number of buffering and quality of video
  if (e["data"] == YT.PlayerState.BUFFERING) {
    e.target.uBufferingCount ? ++e.target.uBufferingCount : e.target.uBufferingCount = 1;
    console.log({
      event: "youtube",
      action: "buffering[" + e.target.uBufferingCount + "]:" + e.target.getPlaybackQuality(),
      label: label });

    //if one video is play then pause other, this is needed because at start video is in buffered state and start playing without go to playing state
    if (YT.PlayerState.UNSTARTED == e.target.uLastPlayerState) {
      pauseOthersYoutubes(e.target);
    }
  }
  //last action keep stage in uLastPlayerState
  if (e.data != e.target.uLastPlayerState) {
    console.log(label + ":state change from " + e.target.uLastPlayerState + " to " + e.data);
    e.target.uLastPlayerState = e.data;
  }
}
function initYoutubePlayers() {
  ytplayerList = null; //reset
  ytplayerList = []; //create new array to hold youtube player
  for (var e = document.getElementsByTagName("iframe"), x = e.length; x--;) {if (window.CP.shouldStopExecution(0)) break;
    if (/youtube.com\/embed/.test(e[x].src)) {
      ytplayerList.push(initYoutubePlayer(e[x]));
      console.log("create a Youtube player successfully");
    }
  }window.CP.exitedLoop(0);

}
function pauseOthersYoutubes(currentPlayer) {
  if (!currentPlayer) return;
  for (var i = ytplayerList.length; i--;) {if (window.CP.shouldStopExecution(1)) break;
    if (ytplayerList[i] && ytplayerList[i] != currentPlayer) {
      ytplayerList[i].pauseVideo();
    }
  }window.CP.exitedLoop(1);
}
//init a youtube iframe
function initYoutubePlayer(ytiframe) {
  console.log("have youtube iframe");
  var ytp = new YT.Player(ytiframe, {
    events: {
      onStateChange: onPlayerStateChange,
      onError: onPlayerError,
      onReady: onPlayerReady } });


  ytiframe.ytp = ytp;
  return ytp;
}
function onYouTubeIframeAPIReady() {
  console.log("YouTubeIframeAPI is ready");
  initYoutubePlayers();
}
var tag = document.createElement('script');
//use https when loading script and youtube iframe src since if user is logging in youtube the youtube src will switch to https.
tag.src = "https://www.youtube.com/iframe_api";
var firstScriptTag = document.getElementsByTagName('script')[0];
firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
    //# sourceURL=pen.js
</script>
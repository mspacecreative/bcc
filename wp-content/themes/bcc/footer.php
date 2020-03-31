			<footer id="contact" class="section">
				<div class="inner no-top-bottom-padding light">
					<div class="row between-lg between-md">
						<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 mobile-margin-bottom-25">
							<h3>Disclaimer</h3>
							<p>The Breastfeeding Committee for Canada makes every effort to ensure that other websites directly linked to our own include information compatible with our mission and purpose. We can only be responsible for information contained within our own web pages.</p>
						</div>
						<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 mobile-margin-bottom-25">
							<h3>Subscribe to our newsletter</h3>
							<?php echo do_shortcode('[contact-form-7 id="585" title="List Builder Form"]'); ?>
						</div>
						<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
							<h3>Get in touch</h3>
							<p>
								<strong>Breastfeeding Committee for Canada</strong><br />
								50 51149 Range Road 231<br />
								Sherwoood Park, AB, T8B 1K5<br />
							</p>
							<p>Email: <a href="mailto:bnn@bcc.ca">BNN@bcc.ca</a></p>
						</div>
					</div>
				</div>
			</footer>
			<div class="footer-bottom">	
				<div class="inner_no_top_bottom_padding">
					<p class="credits">&copy; <?php echo date('Y '); echo bloginfo('title'); ?>. All rights reserved.</p>
				</div>
			</div>
			
		</div><!-- / WRAPPER -->
		
		<script src="https://static.codepen.io/assets/common/stopExecutionOnTimeout-157cd5b220a5c80d4ff8e0e70ac069bffd87a61252088146915e8726e5d9f147.js"></script>
		
		<!-- YOUTUBE TOGGLE SCRIPT -->
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
		</script>
		<!-- / YOUTUBE TOGGLE SCRIPT -->

		<?php wp_footer(); ?>

	</body>
</html>

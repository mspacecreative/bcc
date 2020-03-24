(function ($, root, undefined) {
	
	$(function () {
		
		'use strict';

		$('.menu-item-has-children').prepend('<span class="toggle-children"><i class="fa fa-angle-down"></i></span>');
		
		// REVEAL SECONDARY MENU ON CLICK
		$('.toggle-children').click(function() {
			$(this).siblings('.sub-menu').slideToggle();
			$(this).toggleClass('open');
		});
		
		var ytplayerList;

function onPlayerReady(e) {
    var video_data = e.target.getVideoData(),
        label = video_data.video_id+':'+video_data.title;
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
            action: "play:"+e.target.getPlaybackQuality(),
            label: label
        });
        //if one video is play then pause other
        pauseOthersYoutubes(e.target);
    }
    if (e["data"] == YT.PlayerState.PAUSED) {
        console.log({
            event: "youtube",
            action: "pause:"+e.target.getPlaybackQuality(),
            label: label
        });
    }
    if (e["data"] == YT.PlayerState.ENDED) {
        console.log({
            event: "youtube",
            action: "end",
            label: label
        });
    }
    //track number of buffering and quality of video
    if (e["data"] == YT.PlayerState.BUFFERING) {
        e.target.uBufferingCount?++e.target.uBufferingCount:e.target.uBufferingCount=1; 
        console.log({
            event: "youtube",
            action: "buffering["+e.target.uBufferingCount+"]:"+e.target.getPlaybackQuality(),
            label: label
        });
        //if one video is play then pause other, this is needed because at start video is in buffered state and start playing without go to playing state
        if( YT.PlayerState.UNSTARTED ==  e.target.uLastPlayerState ){
            pauseOthersYoutubes(e.target);
        }
    }
    //last action keep stage in uLastPlayerState
    if( e.data != e.target.uLastPlayerState ) {
        console.log(label + ":state change from " + e.target.uLastPlayerState + " to " + e.data);
        e.target.uLastPlayerState = e.data;
    }
}
function initYoutubePlayers(){
    ytplayerList = null; //reset
    ytplayerList = []; //create new array to hold youtube player
    for (var e = document.getElementsByTagName("iframe"), x = e.length; x-- ;) {
        if (/youtube.com\/embed/.test(e[x].src)) {
            ytplayerList.push(initYoutubePlayer(e[x]));
            console.log("create a Youtube player successfully");
        }
    }
    
}
function pauseOthersYoutubes( currentPlayer ) {
    if (!currentPlayer) return;
    for (var i = ytplayerList.length; i-- ;){
        if( ytplayerList[i] && (ytplayerList[i] != currentPlayer) ){
            ytplayerList[i].pauseVideo();
        }
    }  
}
//init a youtube iframe
function initYoutubePlayer(ytiframe){
    console.log("have youtube iframe");
    var ytp = new YT.Player(ytiframe, {
        events: {
            onStateChange: onPlayerStateChange,
            onError: onPlayerError,
            onReady: onPlayerReady
        }
    });
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

		
		var num = 1;
		$(".video-container iframe").each(function() {
			//$(this).attr('id', 'video-' + num++ );
			var videoURL = $(this).prop('src');
			videoURL += "&enablejsapi=1";
			$(this).prop('src',videoURL);
			$(this).addClass('yt-videos');
		});
		
		$('.video-mp4').each(function() {
			$('.video-mp4').click(function() {
				$(this).addClass('hide-overlay');
				$(this).find('video').trigger('play');
			});
		});
		
		$('.light_grey_spacer').each(function() {
			$(this).parents().removeClass('inner');
		});
		
		$('.video-mp4 video').on('ended',function() {
			$(this).parent().removeClass('hide-overlay');
		});
		
		$('.video-youtube').each(function() {
			$('.video-youtube').click(function(e) {
				$(this).addClass('hide-overlay');
				$(this).children('iframe')[0].src += "&autoplay=1";
				e.preventDefault();
			});
		});
		
		$(document).scroll(function() {
			var y = $(this).scrollTop();
			if (y > 200) {
				$('.menu-logo-container, .home .branding-container').addClass('show');
			} else {
				$('.menu-logo-container, .home .branding-container').removeClass('show');
			}
		});
		
		$('.inline-links-wrap').each(function() {
			$(this).parent().css({
				'display' : 'inline-block',
				'margin' : '0',
			});
		});
		
		// ABSOLUTE IMG HEIGHT CALC
		/*function absoluteImgHeight() {
			if (window.matchMedia("(min-width: 981px)").matches) {
				$('.absolute_img, .absolute_img_right').each(function() {
					$(this).css({
					'height' : $(this).parent().height(),
					'width' : 'auto'
					});
				});
			}
		}*/
		
		$(document).ready(function() {
			//adjustVideoHeight();
			
			staticSplashImgBg();
		});
		
		/*function adjustVideoHeight() {
			var splashContainerHeight = $('.splash').height();
			$('.video-container-fixed .video-container').height(splashContainerHeight);
		}*/
		
		function staticSplashImgBg() {
			var splashAreaHeight = $('.splash').height();
			
			$('.splash-static-container').height(splashAreaHeight);
		}
		
		/*// TAGLINE TOP PADDING
		function taglineTopPadding() {
			var headerHeight = $('.branding-container').outerHeight();
			if (window.matchMedia("(min-width: 981px)").matches) {
				$('.tagline, .clear-branding').css({
					'padding-top' : headerHeight,
				});
			}
		}*/
		
		function mobileSplashContainerHeight() {
			var viewPortHeight = $(window).height(),
			mobileHeaderHeight = $('.branding-container').outerHeight(),
			        heightCalc = viewPortHeight - mobileHeaderHeight,
			      splashHeight = $('.splash').height();
			if (window.matchMedia("(max-width: 980px)").matches) {
				$('.splash > .inner').css('margin-top', mobileHeaderHeight);
				$('.content-wrapper').css('padding-top', mobileHeaderHeight);
				$('.home .content-wrapper').css('padding-top', '0');
			} else if (window.matchMedia("(max-device-width: 850px) and (orientation: landscape)").matches) {
				$('.splash > .inner').css('margin-top', mobileHeaderHeight);
				$('.splash-static-container, .splash').css('height', 'auto');
				$('.content-wrapper').css('padding-top', mobileHeaderHeight);
				$('.home .content-wrapper').css('padding-top', '0');
			} else if (window.matchMedia("(max-height: 700px)").matches) {
				$('.splash-static-container, .splash, .splash > .inner').css('height', '100%');
				$('.tagline').css({
					'padding-top' : '15%',
					'padding-bottom' : '15%'
					});
				$('.splash-static-container').css('top', '0');
				$('.splash > .inner').css('margin-top', mobileHeaderHeight);
			} else {
				$('.content-wrapper').css('padding-top', '0');
				$('.splash-static-container').css('top', '0');
				$('.splash-static-container, .splash > .inner').outerHeight(heightCalc);
				$('.splash > .inner').css('margin-top', mobileHeaderHeight);
			}
		}
		
		// CAROUSEL RENDERING
		$('.carousel').slick({
		    dots: true,
			arrows: true,
			adaptiveHeight: true,
		});
		// END CAROUSEL RENDERING
		
		// MOBILE MENU BUTTON
		$('.mobile-nav-button').click(function() {
			$('.mobile-nav-button, .wrapper, .navbar, .jumbotron, .branding-container').toggleClass('open');
			$(this).children('.hamburger').toggleClass('is-active');
		});
		
		// DESKTOP MENU TOGGLE
		$('.desktop-menu-toggle').click(function() {
			$('body').toggleClass('hide');
			$(this).children('.hamburger').toggleClass('is-active');
			
			$('.carousel')[0].slick.refresh();
		});
		
		// SMOOTH SCROLL TO ANCHORS
		$('a[href*=#]:not([href=#])').click(function() {
		    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
				var target = $(this.hash);
				target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
				if (target.length) {
					if (window.matchMedia("(max-width: 980px)").matches) {
						$('html,body').animate({
							scrollTop: target.offset().top - 50
						}, 500);
					} else {
						$('html,body').animate({
							scrollTop: target.offset().top
						}, 500);
					}
		        return false;
				}
		    }
		});
		// END SMOOTH SCROLL TO ANCHORS
		
		$('.navbar a[href*=\\#]').click(function() {
			$('body').addClass('clicked');
			if ( $('body').hasClass('clicked') ) {
				if (window.matchMedia("(max-width: 980px)").matches) {
					$('.navbar, .mobile-nav-button, .branding-container, .wrapper').toggleClass('open');
					$('.hamburger').toggleClass('is-active');
				}
			}
		});
		
		// WINDOW LOAD FUNCTIONS
		$(window).load(function() {
			
			//taglineTopPadding();
			
			mobileSplashContainerHeight();
			
			staticSplashImgBg();
			
			$('.loading-screen').fadeOut();
			
			if ( $('.two_third_img').next().length < 1 ) {
				$('.two_third_img').css('width', '100%');
			}
		});
		
		// WINDOW RESIZE FUNCTIONS
		$(window).on('resize orientationchange', function() {
			
			//taglineTopPadding();
			
			mobileSplashContainerHeight();
			
			staticSplashImgBg();
			
			$('.carousel').slick('resize');
		});
		
		// CHANGE IN ORIENTATION
		$(window).on('orientationchange', function() {
			$('.carousel').slick('resize');
		});
		
		// MATCHMEDIA POLYFILL FOR IE9
		window.matchMedia || (window.matchMedia = function() {
		    "use strict";
		
		    // For browsers that support matchMedium api such as IE 9 and webkit
		    var styleMedia = (window.styleMedia || window.media);
		
		    // For those that don't support matchMedium
		    if (!styleMedia) {
		        var style       = document.createElement('style'),
		            script      = document.getElementsByTagName('script')[0],
		            info        = null;
		
		        style.type  = 'text/css';
		        style.id    = 'matchmediajs-test';
		
		        if (!script) {
		          document.head.appendChild(style);
		        } else {
		          script.parentNode.insertBefore(style, script);
		        }
		
		        // 'style.currentStyle' is used by IE <= 8 and 'window.getComputedStyle' for all other browsers
		        info = ('getComputedStyle' in window) && window.getComputedStyle(style, null) || style.currentStyle;
		
		        styleMedia = {
		            matchMedium: function(media) {
		                var text = '@media ' + media + '{ #matchmediajs-test { width: 1px; } }';
		
		                // 'style.styleSheet' is used by IE <= 8 and 'style.textContent' for all other browsers
		                if (style.styleSheet) {
		                    style.styleSheet.cssText = text;
		                } else {
		                    style.textContent = text;
		                }
		
		                // Test if media query is true or false
		                return info.width === '1px';
		            }
		        };
		    }
		
		    return function(media) {
		        return {
		            matches: styleMedia.matchMedium(media || 'all'),
		            media: media || 'all'
		        };
		    };
		}());
	
	});
	
})(jQuery, this);
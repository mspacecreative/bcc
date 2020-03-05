$(document).scroll(function() {
	var y = $(this).scrollTop();
	if (y > 200) {
		$('.menu-logo-container').addClass('show');
	} else {
		$('.menu-logo-container').removeClass('show');
	}
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

// TAGLINE TOP PADDING
function taglineTopPadding() {
	var headerHeight = $('.branding-container').outerHeight();
	if (window.matchMedia("(min-width: 981px)").matches) {
		$('.tagline, .clear-branding').css({
			'padding-top' : headerHeight,
		});
	} else if (window.matchMedia("(max-width: 850px) and (orientation: landscape)").matches) {
		$('.tagline, .clear-branding').css({
			'padding-top' : headerHeight,
		});
	} else {
		$('.tagline, .clear-branding').css({
			'padding-top' : 0,
		});
	}
}

function mobileSplashContainerHeight() {
	var viewPortHeight = $(window).height(),
	mobileHeaderHeight = $('.branding-container').outerHeight(),
	        heightCalc = viewPortHeight - mobileHeaderHeight;
	if (window.matchMedia("(max-device-width: 980px)").matches) {
		$('.content-wrapper').css('padding-top', mobileHeaderHeight);
		$('.content-wrapper').css('padding-top', mobileHeaderHeight);
		$('.splash-static-container').css('top', mobileHeaderHeight);
	} else if (window.matchMedia("(min-device-width: 981px) and (max-device-width: 1024px)").matches) {
		$('.splash-static-container, .splash, .splash > .inner').height(viewPortHeight);
		$('.content-wrapper').css('padding-top', '0');
		$('.splash-static-container').css('top', '0');
	}
}

// CAROUSEL RENDERING
$('.carousel').slick({
    dots: true,
	arrows: true,
	adaptiveHeight: true,
});
// END CAROUSEL RENDERING

// REVEAL SECONDARY MENU ON CLICK
$('.toggle-children').click(function() {
	$(this).siblings('.sub-menu').slideToggle();
	$(this).toggleClass('open');
});

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
	if ( $('.resources-page').length ) {
		$('body').addClass('clicked');
		if ( $('body').hasClass('clicked') ) {
			$('.navbar, .mobile-nav-button, .branding-container, .wrapper').toggleClass('open');
			$('.hamburger').toggleClass('is-active');
		}
	}
});

// WINDOW LOAD FUNCTIONS
$(window).load(function() {
	
	taglineTopPadding();
	
	mobileSplashContainerHeight();
	
	staticSplashImgBg();
	
	$('.loading-screen').fadeOut();
});

// WINDOW RESIZE FUNCTIONS
$(window).resize(function() {
	
	taglineTopPadding();
	
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
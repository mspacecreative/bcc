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

// TAGLINE TOP PADDING
function taglineTopPadding() {
	var headerHeight = $('.branding-container').height();
	if (window.matchMedia("(min-width: 981px)").matches) {
		$('.tagline, .clear-branding').css({
			'padding-top' : headerHeight,
		});
	}
}

// SPLASH SECTION HEIGHT
function splashHeight() {
	var viewPortHeight = $(window).height(),
	    thirdViewPortHeight = $(window).height() / 3,
	    mobileHeaderHeight = $('.branding-container').height();
	if (window.matchMedia("(min-width: 1600px)").matches) {
		$('.splash, .splash > .inner').css('min-height', viewPortHeight - thirdViewPortHeight);
	} else if (window.matchMedia("(min-width: 768px) and (orientation: portrait)").matches) {
		$('.splash, .splash > .inner').css('min-height', viewPortHeight - mobileHeaderHeight - thirdViewPortHeight);
	} else if (window.matchMedia("(min-width: 981px)").matches) {
		$('.splash, .splash > .inner').css('min-height', viewPortHeight);
	} else if (window.matchMedia("(max-width: 850px) and (orientation: landscape)").matches) {
		$('.splash, .splash > .inner').css('min-height', 'none');
	} else {
		$('.splash, .splash > .inner').css('min-height', viewPortHeight - mobileHeaderHeight);
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

$('.navbar a[href*=\\#]').click(function() {
	$(this).parent().parent().parent().parent().toggleClass('open');
	$(this).parent().parent().parent().parent().prev().toggleClass('open');
	$(this).parent().parent().parent().parent().next().toggleClass('open');
	$(this).parent().parent().parent().parent().prev().children('.hamburger').toggleClass('is-active');
	$('.wrapper, .jumbotron').toggleClass('open');
});
// END SMOOTH SCROLL TO ANCHORS

// WINDOW LOAD FUNCTIONS
$(window).load(function() {
	
	taglineTopPadding();
	
	//absoluteImgHeight();
	splashHeight();
	
	$('.loading-screen').fadeOut();
});

// WINDOW RESIZE FUNCTIONS
$(window).resize(function() {
	
	taglineTopPadding();
	
	//absoluteImgHeight();
	splashHeight();
	
	$('.carousel').slick('resize');
});

// CHANGE IN ORIENTATION
$(window).on('orientationchange', function() {
	$('.carousel').slick('resize');
});
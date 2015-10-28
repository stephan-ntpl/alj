var browserMobile = false;
if($('body').hasClass('layout-mobile')) browserMobile = true;


var $wrapper = $('#site-wrapper'),
	$header = $('.site-header', $wrapper),
	$section = $('#section', $wrapper),
	$imgFit = $('.imgFit'),
	$valign = $('.valign'),
	$topBackground = $('#topBackground'),
	$slider = $('.slider');

var animationRunning = false,
	currentScroll = -1,
	openDelay = 100,
	initDrag = 0,
	dragging = false,
	dragAllowed = true;

$(document).ready(function(){	
	if(whichBrs() == 'Internet Explorer'){
	$('body').addClass('browser-ie');
}

	positionContent();

	/*Dragging Sections*/
	/*$('.site-header').draggable({
	    axis: 'x',
	    start: function(event) {
	        if (dragAllowed) {
	            dragging = true;
	            initDrag = event.clientX;
	            $('> section > .b-top', $section).removeClass('draggable').removeClass('slow');
	            $('> section.active > .b-top', $section).addClass('draggable');
	        }
	    },
	    drag: function(event) {
	        if (dragAllowed) {
	            var newPos = (event.clientX - initDrag) * 0.66;
	            $('> section.active > .b-top', $section).css('left', newPos);
	        }
	    },
	    stop: function(event) {
	        if (dragAllowed) {
	            var endPos = event.clientX - initDrag;

	            if (Math.abs(endPos) >= $(window).width() / 3) {
	                $('> section > .b-top', $section).removeClass('draggable').removeClass('slow');
	                if (endPos < 0) {
	                    $('.btn-section.next', $header).trigger('click');
	                } else {
 	                    $('.btn-section.previous', $header).trigger('click');
	                }
	            } else {
	                $('> section.active > .b-top', $section).addClass('slow').css('left', 0);
	                dragging = false;
	            }
	        }
	    }
	});*/

	$('.button-down').on('click', function(e) {
		e.preventDefault();
		$('html, body').animate({
			scrollTop: $("section.active .block-2").offset().top - 50
		}, 500);
	});

	$('.btn-switch').on('click', function(){
		if(!animationRunning){
			animationRunning = true;
			dragAllowed = false;

		var direction = 'previous';
		var $current = $('> section.active', $section);
		var $clicked = $('> section#section-'+$(this).attr('data-section') , $section);
		var animDelay = 1;
		var scrollDelay = 1;
		var easing = 'easeInOutQuad';
		if(dragging) easing = 'linear';

		var clickedCurrent = $clicked.attr('data-current').split('|');
		var activeS = $current.attr('data-current').split('|');
		var bgImg = $clicked.find('.top-bg').attr('src');
		
		$('.btn-switch').removeClass('active');
		$(this).addClass('active');

		// Animate
			setTimeout(function(){
				// Change Data
				//$wrapper.attr('class',clickedCurrent[0]);
				document.title = clickedCurrent[1];
				$("html, body").animate({ scrollTop: 0 }, "slow");
				$topBackground.fadeTo(400, 0.8, function(){
					$topBackground.find('.media-space').css("background-image", "url(" + bgImg +")");
				}).fadeTo(400, 1);

				$('> .b-top', $current).animate({left: '-140%'}, 950, easing);
				$('> .b-top', $clicked)
					.css('left','140%')
					.animate({left: '0'}, 950, 'easeInOutQuad');

			setTimeout(function(){
					var $testimonials = $('.testimonials');
					$current.attr('class','hidden');
					$clicked.attr('class','active');
					positionContent();
					animationRunning = false;
					dragging = false;
					dragAllowed = true;
					//destroy_slider($testimonials);
					//initialize_slider($testimonials);
					$testimonials.owlCarousel('invalidate', 'width').owlCarousel('refresh');
				}, 950);
			}, animDelay);
	}
	return false;
	});

	/*if ($('#section > section', $section).hasClass('active')){
		$('.section-slider').get(0).slick.setPosition();
	}*/

	/*$('.btn-section.previous, .btn-section.next', $header).on('click', function(){
		if(!animationRunning){
			animationRunning = true;
			dragAllowed = false;

			// Get Data
			var direction = 'previous';
			if($(this).hasClass('next')) direction = 'next';
			var $current = $('> section.active', $section);
			var $clicked = $('> section#section-'+$('.btn-section.'+direction, $header).attr('data-section') , $section);
			var $activeSection = $('.btn-section.'+direction, $header).attr('data-section');
			var animDelay = 1;
			var scrollDelay = 1;
			var easing = 'easeInOutQuad';
			if(dragging) easing = 'linear';

			var clickedCurrent = $clicked.attr('data-current').split('|');
			var clickedPrevious = $clicked.attr('data-previous').split('|');
			var clickedNext = $clicked.attr('data-next').split('|');
			var bgImg = $clicked.find('.top-bg').attr('src');

			if(currentScroll > 0){
				var scrollDuration = Math.ceil(currentScroll /  $(window).height()) * 250;
				if(scrollDuration < 750) scrollDuration = 750;

				animDelay += scrollDuration;
				$('html,body').delay(scrollDelay).animate({scrollTop: 0}, scrollDuration, 'easeInOutQuad');
			}

			// Animate
			setTimeout(function(){
				// Change Data
				//$wrapper.attr('class',clickedCurrent[0]);
				$('.btn-section.current', $header)
					.html('<span>'+clickedCurrent[1]+'</span>')
					.attr('data-section',clickedCurrent[0]);
				$('.btn-section.previous', $header)
					.html('<span>'+clickedPrevious[1]+'</span>')
					.attr('data-section',clickedPrevious[0]);
				$('.btn-section.next', $header)
					.html('<span>'+clickedNext[1]+'</span>')
					.attr('data-section',clickedNext[0]);
				$topBackground.find('.media-space').css("background-image", "url(" + bgImg +")");  

				// Animate Boxes
				// Previous
				if(direction == 'previous'){
					$('> .b-top', $current).animate({left: '140%'}, 950, easing);
					$('> .b-top', $clicked)
						.css('left','-140%')
						.animate({left: '0'}, 950, 'easeInOutQuad');
					$('.btn-switch').removeClass('active');
					$('.btn-switch[data-section = '+$activeSection+']').addClass('active');
					
				}
				// Next
				else {
					$('> .b-top', $current).animate({left: '-140%'}, 950, easing);
					$('> .b-top', $clicked)
						.css('left','140%')
						.animate({left: '0'}, 950, 'easeInOutQuad');
					$('.btn-switch').removeClass('active');
					$('.btn-switch[data-section = '+$activeSection+']').addClass('active');
				}

				setTimeout(function(){
					$current.attr('class','hidden');
					$clicked.attr('class','active');
					positionContent();
					animationRunning = false;
					dragging = false;
					dragAllowed = true;
				}, 950);
			}, animDelay);
		}

		return false;
	});*/
});

$(window).resize(function(){
	positionContent();
});

$(window).scroll(function(){
	scrollContent();
});

function positionContent(){
	// Layouts
	if($(window).width() <= 1500) $wrapper.addClass('layout-small');
	else $wrapper.removeClass('layout-small');

	if($(window).width() <= 1120 || $(window).height() <= 860) $wrapper.addClass('layout-xsmall');
	else $wrapper.removeClass('layout-xsmall');

	// Adapt White Menu
	$('> .header.white > div', $wrapper).each(function(){
		$(this).height($(window).height());
		$('> div', $about).height($(window).height());
	});

	// Position Contents
	$('> section', $section).css('padding-top', $(window).height() + openDelay);

	$valign.each(function(){
		$(this).css('padding-top', ($(this).parent().height()/2 - $(this).height()/2));
	});
	
	scrollContent();
}

function scrollContent(){
		var totalScroll = $(document).height() - $(window).height();
	
	if(browserMobile){
		newScroll = $(window).scrollTop();
	} else {
		if(whichBrs() == 'Safari' || whichBrs() == 'Chrome'){
			newScroll = $('body').scrollTop();
		} else {
			newScroll = $('html,body').scrollTop();
		}
	}

	if(newScroll > 0){
		dragAllowed = false;
		$('.site-header', $wrapper).removeClass('draggable');
	} else {
		dragAllowed = true;
		$('.site-header', $wrapper).addClass('draggable');
	} 
	
	if(newScroll <= 0) $('.site-header-scroll', $wrapper).addClass('inactive');
	else $('.site-header-scroll', $wrapper).removeClass('inactive');

		/*Animating Top*/
		$topBackground.each(function(){
			var fakeScroll = newScroll - openDelay;
			if(fakeScroll < 0) fakeScroll = 0;
			var boxTopSpeed = - newScroll * ($('> section.active > .b-top .top', $section).height() / openDelay);

			// Move Box Top
			$('> section > .b-top .top', $section).css('margin-top', boxTopSpeed);

			// Move Containers and Backgrounds
			$('.site-header', $wrapper).height($(window).height() - fakeScroll);
			$('> section > .b-top', $section).css('top', - fakeScroll);
			//$('> section > .b-top .top', $section).css('top', (fakeScroll * 0.33));
			$(this).css('top', - fakeScroll);

			// Change Menu Bottom Options
			/*$('> .header.dark .btn-kit.items', $wrapper).each(function(){
				if(fakeScroll > 49) $(this).removeClass('invisible');
				else $(this).addClass('invisible');

				if(newScroll < $('> div.active > .block5', $section).offset().top - 5){
					$(this).removeClass('inactive');
					$('> .header.dark .btn-scroll-up', $wrapper).removeClass('active');
				} else {
					$(this).addClass('inactive');
					$('> .header.dark .btn-scroll-up', $wrapper).addClass('active');
				}
			});*/
		});
		currentScroll = newScroll;
	}

function initialize_slider(el) {
	el.owlCarousel({
		center:true,
		items:2,
		loop:true
	});
}

function destroy_slider(el) {
	el.trigger('destroy.owl.carousel').removeClass('owl-carousel owl-loaded');
	el.find('.owl-stage-outer').children().unwrap();
}

function whichBrs() {
	var agt=navigator.userAgent.toLowerCase();
	if (agt.indexOf("opera") != -1) return 'Opera';
	if (agt.indexOf("staroffice") != -1) return 'Star Office';
	if (agt.indexOf("webtv") != -1) return 'WebTV';
	if (agt.indexOf("beonex") != -1) return 'Beonex';
	if (agt.indexOf("chimera") != -1) return 'Chimera';
	if (agt.indexOf("netpositive") != -1) return 'NetPositive';
	if (agt.indexOf("phoenix") != -1) return 'Phoenix';
	if (agt.indexOf("firefox") != -1) return 'Firefox';
	if (agt.indexOf("chrome") != -1) return 'Chrome';
	if (agt.indexOf("safari") != -1) return 'Safari';
	if (agt.indexOf("skipstone") != -1) return 'SkipStone';
	if (agt.indexOf("msie") != -1) return 'Internet Explorer';
	if (agt.indexOf("netscape") != -1) return 'Netscape';
	if (agt.indexOf("mozilla/5.0") != -1) return 'Mozilla';
	if (agt.indexOf('\/') != -1) {
		if (agt.substr(0,agt.indexOf('\/')) != 'mozilla') {
			return navigator.userAgent.substr(0,agt.indexOf('\/'));
		} else return 'Netscape';
	} else if (agt.indexOf(' ') != -1)
		return navigator.userAgent.substr(0,agt.indexOf(' '));
	else return navigator.userAgent;
}
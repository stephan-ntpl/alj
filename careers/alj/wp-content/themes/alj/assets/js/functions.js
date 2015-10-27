// JS vUnit
new vUnit({
	CSSMap: {
		// The selector (VUnit will create rules ranging from .selector1 to .selector100)
		'.vh_height': {
			// The CSS property (any CSS property that accepts px as units)
			property: 'height',
			// What to base the value on (vh, vw, vmin or vmax)
			reference: 'vh'
		},
		// Wanted to have a font-size based on the viewport width? You got it.
		'.vw_font-size': {
			property: 'font-size',
			reference: 'vw'
		},
		// vmin and vmax can be used as well.
		'.vmin_margin-top': {
			property: 'margin-top',
			reference: 'vmin'
		}
	}
}).init(); // call the public init() method

new WOW().init();

jQuery(document).ready(function () {
	// Image as Background
	$(".image-background > img:first-child").each(function (i, elem) {
		var parent = $(this).parent();
		var img = $(elem);
		$(this).parent().css({
			background: "url(" + img.attr("src") + ") no-repeat",
		});
	});
	// Menu
	$('#site-nav').mmenu({
		extensions: ["pagedim-white"],
		offCanvas	: {
				position 	: 'left',
				zposition	: 'front'
			 },
		navbar:{
			title: false,
		}
	},{
		pageSelector: "#site-wrapper",
	});
	var menuapi = $("#site-nav").data('mmenu');
	$('#site-nav .btn-switch').on('click', function(){
		menuapi.close();
	});

	// Carousels
	$('.section-slider').owlCarousel({
		center:true,
		items:2,
		loop:true
	});
	$('.testimonials').owlCarousel({
		items:1,
		singleItem: true,
		pagination:true,
		navigation: false,
		smartSpeed:950
	});

	// Adding numbers inside owl carousels dots
	var viw = 1;
	$('#section-working .testimonials .owl-dot').each(function(){
		$(this).text(viw);
		viw++;
	});
	var vil = 1;
	$('#section-living .testimonials .owl-dot').each(function(){
		$(this).text(vil);
		vil++;
	});
	var via = 1;
	$('#section-about .testimonials .owl-dot').each(function(){
		$(this).text(via);
		via++;
	});
	// jQuery SVG
	jQuery('img.icon-svg').each(function(){
		var $img = jQuery(this);
		var imgID = $img.attr('id');
		var imgClass = $img.attr('class');
		var imgURL = $img.attr('src');

		jQuery.get(imgURL, function(data) {
			// Get the SVG tag, ignore the rest
			var $svg = jQuery(data).find('svg');

			// Add replaced image's ID to the new SVG
			if(typeof imgID !== 'undefined') {
				$svg = $svg.attr('id', imgID);
			}
			// Add replaced image's classes to the new SVG
			if(typeof imgClass !== 'undefined') {
				$svg = $svg.attr('class', imgClass+' replaced-svg');
			}

			// Remove any invalid XML tags as per http://validator.w3.org
			$svg = $svg.removeAttr('xmlns:a');

			// Check if the viewport is set, if the viewport is not set the SVG wont't scale.
			if(!$svg.attr('viewBox') && $svg.attr('height') && $svg.attr('width')) {
				$svg.attr('viewBox', '0 0 ' + $svg.attr('height') + ' ' + $svg.attr('width'))
			}

			// Replace image with new SVG
			$img.replaceWith($svg);

		}, 'xml');
	});

	// Data Background/Text Color
	$("section, div").css('background-color', function () {
        return $(this).data('background-color');
    });
    $("p, a, span, h1,h2,h3,h4,h5,h6,strong, div").css('color', function () {
        return $(this).data('text-color');
    });

    // Chosen Select Init
    $('select.select-bottom').chosen({
		disable_search_threshold: 10,
    });
    $('.search-top select').chosen({
		disable_search_threshold: 10,
    });
    $('.sort select').chosen({
		disable_search_threshold: 10,
    });

    // Popup Init
    $('.button-video').magnificPopup({ 
		type: 'iframe',
		mainClass: 'mfp-testimonial-video',
		closeBtnInside:true
	});

	// Share Button
	$('.bottom-share').on('click', function(e){
		$(this).find('.share-expand').fadeToggle();
		e.stopPropagation();
	});
	$('body').on('click', function(){
		$('.share-expand').fadeOut();
	});

	$('.block-tabs ul li a').on('click', function(){
		$('.block-tabs .ui-tabs-panel .tab-inner').removeClass('wow fadeInLeft').removeAttr("style");
		$('.block-tabs .ui-tabs-panel .tab-img').removeClass('wow fadeInRight').removeAttr("style");
	});

});

// Tabs
$(function() {
	$('.block-tabs').tabs({
		show: { 
			effect: "fade", 
			duration: 800 
		}
	});
});

// Header Fix on Scroll
jQuery(window).on("scroll touchmove", function () {
	var headCHeight = $('#site_header').height() + 350;
	$('#site_header').toggleClass('changed', $(document).scrollTop() > headCHeight);
});

// IE Function Check
function isIE( version, comparison ){
    var $div = $('<div style="display:none;"/>').appendTo($('body'));
    $div.html('<!--[if '+(comparison||'')+' IE '+(version||'')+']><a>&nbsp;</a><![endif]-->');
    var ieTest = $div.find('a').length;
    $div.remove();
    return ieTest;
}
jQuery(document).ready(function ($) {
	new WOW().init();

	$(window).scroll(function () {
		if ($(this).scrollTop() > 100) {
		$('#back-to-top').fadeIn('slow');
		} else {
		$('#back-to-top').fadeOut('slow');
		}
	});
	$('#back-to-top').click(function () {
		$('html, body').animate({
		scrollTop: 0
		}, 1500, 'easeInOutExpo');
		return false;
	});

	$('.portfolio-popup').magnificPopup({
		type: 'image',
		removalDelay: 300,
		mainClass: 'mfp-fade',
		gallery: {
		enabled: true
		},
		zoom: {
		enabled: true,
		duration: 300,
		easing: 'ease-in-out',
		opener: function (openerElement) {
			return openerElement.is('img') ? openerElement : openerElement.find('img');
		}
		}
	});

	
	

});
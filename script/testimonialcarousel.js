$(document).ready(function(){
    $(".owl-carousel").owlCarousel({
		autoplay: true,
		dots: true,
		loop: true,
		responsive: {
		0: {
			items: 1
		},
		768: {
			items: 2
		},
		900: {
			items: 3
		}
		}
	});
  });
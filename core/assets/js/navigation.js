(function($) {
	//Toggle mobile menu
	$('.toggle-nav').click(function() {
		console.log('toggle nav');
		$('.mobile-nav').slideToggle(300);
	});
	//Close navigation on anchor tap
		$('a').click(function() {
	    console.log('close nav');
		$('.mobile-nav').slideUp(300);
	});	

	//Mobile menu accordion toggle for sub pages
	$('.mobile-nav > ul > li.menu-item-has-children').append(
		'<div class="accordion-toggle"><svg class="icon icon-angle-down" aria-hidden="true" role="img"><use href="#icon-angle-down" xlink:href="#icon-angle-down"></use></svg></div>'
	);
	$('.mobile-nav .accordion-toggle').click(function() {
		$(this).parent().find('> ul').slideToggle(300);
		$(this).toggleClass('toggle-background');
		$(this).find('.icon').toggleClass('toggle-rotate');
	});
})(jQuery);
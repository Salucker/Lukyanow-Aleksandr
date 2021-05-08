$('.menu-btn').on('click', function(e) {
	e.preventDefault;
	$('.menu-btn').toggleClass('menu-btn-active');
	$('.nav-menu').toggle();
});
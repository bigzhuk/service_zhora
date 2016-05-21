$(document).ready(function() {
	scrollPage();
	$(window).on('scroll', scrollPage);
});

function scrollPage(){
	var scrollTop = $(window).scrollTop();
	if (scrollTop > $('#header_top').height()){
		$('#header_bottom').addClass('attached');
	} else {
		$('#header_bottom').removeClass('attached');
	}
}
$(document).ready(function() {
	scrollPage();
	$(window).on('scroll', scrollPage);
	subMenu();
});

function scrollPage(){
	var scrollTop = $(window).scrollTop();
	if (scrollTop > $('#header_top').height()){
		$('#header_bottom').addClass('attached');
	} else {
		$('#header_bottom').removeClass('attached');
	}
}

function subMenu() {
	$('.main_menu_link').parent().on('mouseover', function() {
		$(this).children('.sub_menu_link').css("display","block");
	});
	$('.main_menu_link').parent().on('mouseout', function() {
		$(this).children('.sub_menu_link').css("display","none");
	});
}
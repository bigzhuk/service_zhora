$(document).ready(function() {
	menuWidth();
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

function menuWidth() {
	if ($(document).width() < 1200) {
		$('.menu_section > a.main_menu_link:not(:first)').css('width', '100px');
		$('.menu_section > a').css('font-size', '18px');
	}
}
$(function(){
	var scroll_start=130;
	var top=0;
	$('body').append('<a href="#" id="gotop" title="Наверх &uarr;"></a>');
	var s=$('#gotop');
	var margin_top=parseInt(s.css('top'));
	function gotop_scroll(){
		top=$(window).scrollTop();
		if(top<scroll_start)s.fadeOut(400);
		else s.css('opacity',0.5).fadeIn(300)
	}
	$(window).scroll(gotop_scroll);
	s.live({
		mouseenter:function(){
			if(top>scroll_start)$(this).fadeTo(200,1.0)
		},mouseleave:function(){
			if(top>scroll_start)$(this).fadeTo(400,0.5)
		},click:function(){
			$('html,body').animate({scrollTop:0},'slow');
			return false
		}
	});
})
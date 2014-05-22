(function($) {

"use strict";



/*******************************  Isotope  *********************************/
$(window).load(function() {
	if ($('.grid .content').length) {
		
		// cache container
		var $container = $('.grid .content');
		
		// initialize isotope
		$container.isotope();

		// filter items when filter link is clicked
		$('.filters button').click(function(e){
			$('.filters button').removeClass('active');
			$(this).addClass('active');
			
			var selector = $(this).attr('data-filter');
			$container.isotope({ filter: selector });
			return false;
		});
	}
}); //end windows load

$(document).ready(function() {

/******************************  Submenus  *********************************/
	$('.submenu-toggle').click(function(e){
		$(this).parent().find('.submenu').slideToggle('fast');
		e.stopPropagation();
	});
	$('body').click(function() {
		$('.submenu').slideUp('fast');
	});

	$('.submenu').click(function(e){
		e.stopPropagation();
	});
	




/******************************  jPlayer  **********************************/
// http://www.jplayer.org/ 
	if ($("#jp_video").length) {
		$("#jp_video").jPlayer({
			ready: function () {
				$(this).jPlayer("setMedia", {
					m4v: "http://www.jplayer.org/video/m4v/Incredibles_Teaser.m4v",
					ogv: "http://www.jplayer.org/video/ogv/Incredibles_Teaser.ogv",
					webmv: "http://www.jplayer.org/video/webm/Incredibles_Teaser.webm",
					poster: "http://www.jplayer.org/video/poster/Incredibles_Teaser_640x272.png"
				});
			},

			play: function() { // To avoid multiple jPlayers playing together.
				$(this).jPlayer("pauseOthers");
			},
			swfPath: "plugins/jplayer/",
			solution: "flash, html",
			supplied: "webmv, ogv, m4v",
			size: {
				width: $('.jp-jplayer').width()+"px",
				height: $('.jp-jplayer').height()+"px",
				cssClass: "jp-video-360p"
			},
			smoothPlayBar: true,
			keyEnabled: true
		});
	}


	if ($("#jp_audio").length) {
		$("#jp_audio").jPlayer({
			ready: function (event) {
				$(this).jPlayer("setMedia", {
					m4a:"http://www.jplayer.org/audio/m4a/TSP-01-Cro_magnon_man.m4a",
					oga:"http://www.jplayer.org/audio/ogg/TSP-01-Cro_magnon_man.ogg"
				});
			},
			play: function() { // To avoid multiple jPlayers playing together.
				$(this).jPlayer("pauseOthers");
			},
			swfPath: "plugins/jplayer/",
			solution: "flash, html",
			supplied: "m4a, oga",
			cssSelectorAncestor: "#jp_container_audio",
			smoothPlayBar: true,
			keyEnabled: true
		});

	}

	
/*******************************  GMaps  ***********************************/
	if ($('#map').length) {
		
		var map;
		map = new GMaps({
			div: '#map',
			lat: 41.8902624,
			lng: 12.4923096
		});

		map.addMarker({
			lat: 41.8902624,
			lng: 12.4923096,
			title: 'Contanct',
			infoWindow: {
				content: '15rd Avenue, New York,<br /> 156408, US<br /> <br /> Email: info@company.com <br /> Web: company.com'
			}
		});

	}

/******************************  carousel  *********************************/

	$('.carousel').carousel({
		  interval: 3000
		});


	
/***************************  Nice scroll bar  *****************************/
	
	$("html").niceScroll({
		cursorcolor:"#91999b",
		cursorwidth:10, 
		boxzoom:true, 
		autohidemode:false,
		zindex:99999,
	});

	$(".product-list .content").niceScroll({
		cursorcolor:"#91999b",
		cursorwidth:10, 
		boxzoom:true, 
		autohidemode:false,
		zindex:99999,
	});

	$(".list-scroll").niceScroll({
		cursorcolor:"#91999b",
		cursorwidth:10, 
		boxzoom:true, 
		autohidemode:false,
		zindex:99999,
	});



/**************************  go to top arrow  *****************************/
	$(window).scroll(function(){
		 if ($(this).scrollTop() > 100) {
			 $('#go-top').fadeIn();
		 } else {
			 $('#go-top').fadeOut();
		 }
	 }); 
 
	 $('#go-top').click(function(e){
		 $("html, body").animate({ scrollTop: 0 }, 600);
		 e.preventDefault();
	 });



	
/******************************  FancyBox  *********************************/
	if ($('.fancybox').length) {
		$('a[data-rel]').each(function() {
			$(this).attr('rel', $(this).data('rel'));
		});
		
		$(".fancybox").fancybox({
			openEffect	: 'none',
			closeEffect	: 'none'
		});
	}



/******************************* Flickr Feed *******************************/
	if ($('.flickr-feed').length) {
	    $('.flickr-feed').jflickrfeed({
    	    limit: 12,
        	qstrings: {
            	user_id: '5083772252'
        	},
        	itemTemplate: '	<li class="item-thumbnail"><img src="{{image_s}}" alt="{{title}}" /><span class="overthumb"></span><div class="icons"><a href="{{link}}" class="postlink"><i class="icon-search"></i></a></div></li>'
    	});
	}







/*******************************  Tabs  *********************************/
$('#myTab a').click(function (e) {
  e.preventDefault()
  $(this).tab('show')
})


/***************************** Menu Animation ******************************/
	if ($(window).width() >= 768) {
		$('.navbar .dropdown').hover(function() {
			$(this)
					.find('.dropdown-menu')
					.first()
					.stop(true, true)
					.delay(100)
					.fadeIn()
					.slideDown('fast')
		}, function() {
			$(this)
					.find('.dropdown-menu')
					.first()
					.stop(true, true)
					.delay(250)
					.fadeOut()
					.slideUp('slow')
		});
	}




}); //end document ready


})(jQuery);
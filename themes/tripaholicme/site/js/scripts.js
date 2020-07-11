(function($) {

	'use strict';

	// Navigation Toggle
	$("#nav-toggle").on("click", function(){
		$("#nav").stop().slideToggle();
		$(this).toggleClass("active");
		$("#search").hide();

		if ($(this).hasClass('active')) {
			$(this).removeClass('fa-bars').addClass('fa-times');
			$('#search-toggle').removeClass('active');
		} else {
			$(this).removeClass('fa-times').addClass('fa-bars');
		}

		$('#search-toggle').removeClass('fa-times').addClass('fa-search');
	});

	// Search Toggle
	$("#search-toggle").on("click", function(){
		$("#search").stop().slideToggle();
		$(this).toggleClass("active");
		$("#nav").hide();

		if ($(this).hasClass('active')) {
			$(this).removeClass('fa-search').addClass('fa-times');
			$('#nav-toggle').removeClass('active');
		} else {
			$(this).removeClass('fa-times').addClass('fa-search');
		}

		$('#nav-toggle').removeClass('fa-times').addClass('fa-bars');
	});

	// Page aside toggle
	$("#aside-nav-toggle").on("click", function(){
		$("#aside-nav").stop().slideToggle();
		
	});

	// bxSlider
	if(typeof $.fn.bxSlider !== "undefined"){
		$('.bxslider').each(function(i, el){
			$(el).bxSlider({
				mode: 'fade',
				auto: ($(el).children().length < 2) ? false : true,
				pager: true,
				pause: 8000
			});
		});
	}

	// Owl Slider
	var btnCount = $("#btn-slider .btn-item").length;
	function btnItems(cnt) {return btnCount > cnt ? cnt : btnCount;}
	function btnNav(cnt) {return btnCount > cnt ? true : false;}

	var newsCount = $("#news-slider .news").length;
	function newsItems(cnt) {return newsCount > cnt ? cnt : newsCount;}
	function newsNav(cnt) {return newsCount > cnt ? true : false;}

	if(typeof $.fn.owlCarousel !== "undefined"){
		$("#btn-slider").owlCarousel({
			navText: ["<i class='fa fa-chevron-circle-left'></i>","<i class='fa fa-chevron-circle-right'></i>"], 
			//autoplay: true,
			autoplayTimeout: 10000,
			stagePadding: 60,
			margin: 30,
			smartSpeed: 1200,
			responsive: {
				0: {
					items: 1,
					nav: btnNav(1),
					stagePadding: 0,
				},
				650: {
					items: btnItems(2),
					nav: btnNav(2),
					stagePadding: 0,
				},
				991: {
					items: newsItems(3),
					nav: newsNav(3),
				
                },
				1400: {
					items: btnItems(4),
					nav: btnNav(4),
					
				}
			}
		});

		$("#news-slider").owlCarousel({
			navText: ["<i class='fa fa-chevron-circle-left'></i>","<i class='fa fa-chevron-circle-right'></i>"], 
			autoplay: true,
			margin: 30,
			stagePadding:60,
			autoplayTimeout: 10000,
            responsive: {
                0: {
                    items: 1,
					nav: newsNav(1),
					stagePadding:0,
                },
                650: {
                    items: newsItems(2),
					nav: newsNav(2),
					stagePadding:0,
                },
                991: {
					items: newsItems(3),
					nav: newsNav(3),
				},
				1400: {
					items: newsItems(4),
					nav: newsNav(4),
				}
            }
		});
	}

	// matchHeight
	if(typeof $.fn.matchHeight !== "undefined"){
		$('.news-title').matchHeight();
	}

	// Managing header
	function scrollFunction() {
		if (document.body.scrollTop > 0 || document.documentElement.scrollTop > 0) {
			$('#header-bottom').css('background-color', '#fff');
			$('#nav a, #nav span').css('color', '#000');
			$('#header-bottom').css('box-shadow', '0 2px 15px 0 rgba(0,0,0,0.2)');
			$('#header-bottom').css('transform', 'translateY(-52px)');
			$('#logo').css('background', 'url(_assets_/images/logo.png) left top/70px no-repeat');
			$('#logo').css({
				'background': 'url(_assets_/images/logo.png) left top/70px no-repeat',
				'top': 7,
				'height': 95,
				'width': 82,
			});
		} else {
			$('#header-bottom').css('background-color', 'transparent');
			$('#nav a, #nav span').css('color', '#fff');
			$('#header-bottom').css('box-shadow', 'none');
			$('#header-bottom').css('transform', 'translateY(0)');
			$('#header-bottom').css('transform', 'translateY(0)');
		
			$('#logo').css({
				'background': 'url(_assets_/images/logo-white.png) left top/120px no-repeat',
				'top': 23,
				'height': 155,
				'width': 120,
			});
		}
	}

	var matchMediaQuery = window.matchMedia("(min-width: 992px)");

	function manageheader(matchMediaQuery) {
		if (matchMediaQuery.matches) {
			scrollFunction();
			window.onscroll = function(){scrollFunction()};
		} else {
			
			$('#header-bottom').css('transform', 'translateY(0)');
			window.onscroll = null;
		}
	}

	manageheader(matchMediaQuery);
	matchMediaQuery.addListener(manageheader);

	// Managing navs on resize
	var matchMediaQuery = window.matchMedia("(max-width: 991px)");

	function managingNavs(matchMediaQuery) {
		if (matchMediaQuery.matches) {
			$('#search').fadeOut();
			$('#search-toggle').removeClass('fa-times active').addClass('fa-search');

			$('#nav').fadeOut();
			$('#nav-toggle').removeClass('fa-times active').addClass('fa-bars');
		}
	}

	managingNavs(matchMediaQuery);
	matchMediaQuery.addListener(managingNavs);







	$(window).load(function() {


		// Google translate
		var tt = $('.goog-te-gadget').contents().filter(function(){
			return this.nodeType === 3; //Node.TEXT_NODE
		});
	
		tt.replaceWith(document.createTextNode(''));
		$(".goog-te-combo").val($(".goog-te-combo option:first").replaceWith(''));
	
		$('.goog-te-combo').hover(
			function(){
				$('#google-t-title').css('color', '#8BBBBC');
			},
			function(){
				$('#google-t-title').css('color', '#fff');
			}
		);
	
	});
		

})(jQuery);




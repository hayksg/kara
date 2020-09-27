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
	var categoriesCount = $("#categories-slider .categories-item").length;
	function categoriesItems(cnt) {return categoriesCount > cnt ? cnt : categoriesCount;}
	function categoriesNav(cnt) {return categoriesCount > cnt ? true : false;}

	var hotToursCount = $("#hot-tours-slider .hot-tours").length;
	function hotToursItems(cnt) {return hotToursCount > cnt ? cnt : hotToursCount;}
	function hotToursNav(cnt) {return hotToursCount > cnt ? true : false;}

	var testimonialsCount = $("#testimonials-slider .testimonials-slider-item").length;
	function testimonialsItems(cnt) {return testimonialsCount > cnt ? cnt : testimonialsCount;}
	function testimonialsNav(cnt) {return testimonialsCount > cnt ? true : false;}

	if(typeof $.fn.owlCarousel !== "undefined"){
		$("#categories-slider").owlCarousel({
			navText: ["<i class='fa fa-chevron-circle-left'></i>","<i class='fa fa-chevron-circle-right'></i>"], 
			autoplay: true,
			autoplayTimeout: 10000,
			stagePadding: 60,
			margin: 30,
			smartSpeed: 1200,
			responsive: {
				0: {
					items: 1,
					nav: categoriesNav(1),
					stagePadding: 0,
				},
				650: {
					items: categoriesItems(2),
					nav: categoriesNav(2),
					stagePadding: 0,
				},
				991: {
					items: categoriesItems(3),
					nav: categoriesNav(3),
				
                },
				1400: {
					items: categoriesItems(4),
					nav: categoriesNav(4),
					
				}
			}
		});

		$("#hot-tours-slider").owlCarousel({
			navText: ["<i class='fa fa-chevron-circle-left'></i>","<i class='fa fa-chevron-circle-right'></i>"], 
			autoplay: true,
			margin: 30,
			stagePadding:60,
			autoplayTimeout: 10000,
            responsive: {
                0: {
                    items: 1,
					nav: hotToursNav(1),
					stagePadding:0,
                },
                650: {
                    items: hotToursItems(2),
					nav: hotToursNav(2),
					stagePadding:0,
                },
                991: {
					items: hotToursItems(3),
					nav: hotToursNav(3),
				}
            }
		});

		$("#testimonials-slider").owlCarousel({
			navText: ["<i class='fa fa-chevron-circle-left'></i>","<i class='fa fa-chevron-circle-right'></i>"], 
			autoplay: true,
			margin: 50,
			loop: testimonialsNav(1),
            responsive: {
                0: {
                    items: 1,
					nav: testimonialsNav(1),
                },
                992: {
                    items: testimonialsItems(2),
					nav: testimonialsNav(2),
                }
            }
		});
	}

	// matchHeight
	if(typeof $.fn.matchHeight !== "undefined"){
		$('.hot-tours-title').matchHeight();
		$('.hot-tours-text').matchHeight();
		$('.testimonials-slider-message').matchHeight();
	}

	// Managing header
	function scrollFunction() {
		if (document.body.scrollTop > 0 || document.documentElement.scrollTop > 0) {
			$('#header-bottom').css('background-color', '#fff');
			$('#nav a, #nav span').css('color', '#000');
			$('#header-bottom').css('box-shadow', '0 2px 15px 0 rgba(0,0,0,0.2)');
			$('#header-bottom').css('transform', 'translateY(-52px)');
			$('#logo').css({
				'background': "url('"+templateUrl+"/site/images/logo.png') left top/70px no-repeat", // variable templateUrl passed from header.php
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
				'background': "url('"+templateUrl+"/site/images/logo-white.png') left top/120px no-repeat", // variable templateUrl passed from header.php
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

	$( "#page-category-links a" ).each(function() {
		if ($(location).attr("href").indexOf($(this).attr('href')) > -1) {
			$(this).css('color', '#8BBBBC');
		}
	});

	/* Back to top */

	$(window).scroll(function () {
		if ($(this).scrollTop() > 1000) {
			$('#back-to-top').css({
				opacity: 1,
				transform: 'translateX(5px)',
				transition: 'all .5s'
		  	});
		} else {
			$('#back-to-top').css({
				opacity: 0,
				transform: 'translateX(100px)',
				transition: 'all .5s'
			});
		}
	});
	   
	$('#back-to-top').click(function () { 
		$('body,html').animate({scrollTop: 0}, 800);
	    return false;
	});

	 /* Contact form submission */

	

	function validateEmail(email) {
		var re = /\S+@\S+\.\S+/;
		return re.test(email);
	}
	
	$('#tripaholicmeContactForm').on('submit', function(e) {
		e.preventDefault();
	
		var form = $(this);
		var formError = false;
		form.find('.is-invalid').removeClass('is-invalid');
		$('.js-show-feedback').removeClass('js-show-feedback');
	
		var name = form.find('#name').val();
		var email = form.find('#email').val();
		var message = form.find('#message').val();
	
		var ajaxUrl = form.data('url');
	
		if (name === '') {
		  	form.find('#name').addClass('is-invalid');
		  	formError = true;
		}
	
		if (email === '' || !validateEmail(email)) {
		  	form.find('#email').addClass('is-invalid');
		  	formError = true;
		}
	
		if (message === '') {
		  	form.find('#message').addClass('is-invalid');
		  	formError = true;
		}
	
		if (formError) {
		  	return;
		}
	
		form.find('input, textarea, button').attr('disabled', 'disabled');
		$('.js-form-submission').addClass('js-show-feedback');
	
		$.ajax({
		  	url: ajaxUrl,
		  	type: 'post',
		  	data: {
				name: name,
				email: email,
				message: message,
				action: 'tripaholicme_save_user_contact_form'
		  	},
		  	error: function(response) {
				$('.js-form-submission').removeClass('js-show-feedback');
				$('.js-form-error').addClass('js-show-feedback');
				form.find('input, textarea, button').removeAttr('disabled');
		  	},
		  	success: function(response) {
	
				if (response == 0) {
	
			  		setTimeout(function(){
						$('.js-form-submission').removeClass('js-show-feedback');
						$('.js-form-error').addClass('js-show-feedback');
						form.find('input, textarea, button').removeAttr('disabled');
			  		}, 2000);
			  
				} else {
	
			  		setTimeout(function(){
						$('.js-form-submission').removeClass('js-show-feedback');
						$('.js-form-success').addClass('js-show-feedback');
						form.find('input, textarea, button').removeAttr('disabled').val('');
					}, 2000);
	
				}
		  	}
		});
	});

	// Nav current link
	$( "#nav>li>a" ).each(function() {
		if ($(location).attr("href") === $(this).attr('href')) {
			$(this).addClass('header-nav-for-hover')
		}
	});

	// Attr target to footer links
	$('.footer-top-links-box a').each(function(){
		$(this).attr("target","_blank");
	});

})(jQuery);

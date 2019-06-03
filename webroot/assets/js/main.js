(function () {
    'use strict';
	
	var slideIndex = 1;

	function plusDivs(n) {
		showDivs(slideIndex += n);
	}

	function showDivs(n) {
		var i;
		var x = document.getElementsByClassName('mySlides');
		if (n > x.length) {
			slideIndex = 1
		}
		if (n < 1) {
			slideIndex = x.length
		}
		for (i = 0; i < x.length; i++) {
			x[i].style.display = 'none';
		}
		x[slideIndex - 1].style.display = 'block';
	}
	
    function go_up() {
        $('.go-up').hide();
        $(window).on('scroll', function () {
            if ($(this).scrollTop() > 400) {
                $('.go-up').fadeIn();
            } else {
                $('.go-up').fadeOut();
            }

            return false;
        });
		
        $('.go-up').on('click', function (e) {
            e.preventDefault();
            $('html, body').animate({
                scrollTop: 0
            }, 600);

            return false;
        });
    }
	
	function callback(event) {
		$('.manufacture-block-partner').css('padding-right', '1px');
	}
	
	function callback2(event) {
		$('.manufacture-block-partner-2').css('padding-right', '1px');
	}
	
    $(document).ready(function () {
		// ===== Page Loader ======
		setTimeout(function () {
			$('#page-preloader').fadeOut();
		}, 2000);
	
	
		// ==== Go to top ====
        go_up();
		
		
		// ===== Blog Images Slide ======
		if ($('.mySlides').length) {
			showDivs(slideIndex);
		}
		$('.blog-media .btn-left').on('click', function (e) {
			plusDivs(-1);
		});
		$('.blog-media .btn-right').on('click', function (e) {
			plusDivs(1);
		});
		
		// ==== Tab ====
		$('#myTabs a').on('click', function (e) {
			e.preventDefault();
			$(this).tab('show');
		});
		
		
		// ==== Slideshow ====
		$('#tiva-slideshow').nivoSlider({
			effect: 'random',
			animSpeed: 1000,
			pauseTime: 5000,
			directionNav: true,
			controlNav: true,
			pauseOnHover: true
		});
        
		
        // ==== Create menu for mobile ====
        $('#all').after('<div id="off-mainmenu"><div class="off-mainnav"><div class="off-close"><span class="title">Menu</span><span class="close-menu"><i class="fa fa-close"></i></span></div></div></div>');
        $('.navbar-nav').clone().appendTo('.off-mainnav');
		
		if ($('.home-left').length) {
			$('.home-left .icon-socials').clone().appendTo('.off-mainnav');
			$('.home-left .copyright').clone().appendTo('.off-mainnav');
		}

        $('.off-mainnav li.dropdown, .off-mainnav li.dropdown-submenu').each(function () {
            $(this).find('a').first().after('<span class="icon-down"><i class="fa fa-angle-down"></i></span>');
        });

        $('#btn-menu').on('click', function (e) {
            e.preventDefault();
            $('body').toggleClass('mainmenu-active');

            return false;
        });

        $('.off-close .close-menu').on('click', function (e) {
            e.preventDefault();
            $('body').removeClass('mainmenu-active');

            return false;
        });

        $('.icon-down').on('click', function (e) {
            $(this).closest('li').find('.dropdown-menu').first().toggleClass('tiva-active');

            return false;
        });
		
		
        // ==== Carousel ====
		$('.manufacture-block').owlCarousel({
			loop: true,
			margin: 50,
			stopOnHover: false,
			pagination: false,
			paginationNumbers: false,
			responsiveClass: true,
			responsive: {
				0: {
					items: 1,
					nav: true
				},
				600: {
					items: 3,
					nav: false
				},
				1000: {
					items: 3,
					nav: true,
					loop: false
				}
			}
		});
		
		$('.manufacture-block-portfolio-1').owlCarousel({
			loop: true,
			margin: 50,
			stopOnHover: false,
			pagination: false,
			paginationNumbers: false,
			responsiveClass: true,
			responsive: {
				0: {
					items: 1,
					nav: true
				},
				600: {
					items: 3,
					nav: false
				},
				1000: {
					items: 3,
					nav: true,
					loop: false
				}
			}
		});

		$('.manufacture-block-customer').owlCarousel({
			loop: true,
			margin: 100,
			stopOnHover: false,
			pagination: false,
			paginationNumbers: false,
			responsiveClass: true,
			responsive: {
				0: {
					items: 1,
					nav: true
				},
				600: {
					items: 1,
					nav: false
				},
				1000: {
					items: 2,
					nav: true,
					loop: false
				}
			}
		});

		$('.manufacture-block-partner').owlCarousel({
			slideBy: 5,
			loop: true,
			margin: 1,
			stopOnHover: false,
			pagination: false,
			paginationNumbers: false,
			responsiveClass: true,
			onInitialized : callback,
			responsive: {
				0: {
					items: 3,
					nav: true
				},
				600: {
					items: 3,
					nav: false
				},
				1000: {
					items: 5,
					nav: true,
					loop: false
				}
			}
		});
		
		$('.manufacture-block-partner-2').owlCarousel({
			loop: true,
			margin: 0,
			stopOnHover: false,
			pagination: false,
			paginationNumbers: false,
			responsiveClass: true,
			onInitialized : callback2,
			responsive: {
				0: {
					items: 3,
					nav: true
				},
				600: {
					items: 3,
					nav: false
				},
				1000: {
					items: 3,
					nav: true,
					loop: false
				}
			}
		});
		
		$('.testimonial .wrap-media').owlCarousel({
			loop: true,
			margin: 0,
			nav: true,
			items: 1
		});
	
        $('.portfolio-category.carousel .items').owlCarousel({
			loop: true,
			margin: 14,
			nav: true,
			responsive: {
				0: {
					items: 1
				},
				520: {
					items: 2
				},
				1000: {
					items: 4
				}
			}
		});
    });
})()
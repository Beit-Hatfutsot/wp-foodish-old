var $ = jQuery,
	HTMLine_starter_general = {

		/**
		 * Params
		 */
		params : {

			window_width	: 0,	// Client window width - used to maintain window resize events (int)
			timeout			: 400,	// General timeout (int)

		},

		/**
		 * init
		 *
		 * @param	N/A
		 * @return	N/A
		 */
		init : function() {

			HTMLine_starter_general.mainMenu();
			HTMLine_starter_general.mainMenuMobile();
			HTMLine_starter_general.initArticlesSlider();

		},

		/**
		 * mainMenu
		 *
		 * @param	N/A
		 * @return	N/A
		 */
		mainMenu : function() {
		    
            $('#header .nav-main,#header .widget-header,#header .logo').hide();
            
            $( ".menu-toggle.desktop" ).click(function() {
               $('#header').toggleClass('closed');  

               $('#header .nav-main,#header .widget-header,#header .logo').fadeToggle(100);
            });
            
            // Hide menu on item click
            $( ".nav-main ul li a" ).click(function() {
               $( ".menu-toggle.desktop" ).click();
            });

		},
        /**
		 * mainMenuMobile
		 *
		 * @param	N/A
		 * @return	N/A
		 */
		mainMenuMobile : function() {
		  
            $( ".menu-toggle.mobile" ).click(function() {
              $('.mobile-menu-container').toggleClass('open');
            });
            
            
            $( ".mobile-menu-container .closeButton" ).click(function() {
              $('.mobile-menu-container').removeClass('open');
            });
            
            // Hide menu on item click
            $( ".mobile-menu li a" ).click(function() {
                $( ".menu-toggle.mobile" ).click();
            });

		},
        /**
		 * initArticlesSlider
		 *
		 * @param	N/A
		 * @return	N/A
		 */
		initArticlesSlider : function() {
		          
                  
            $(window).on('load resize orientationchange', function() {
                $('.section4__posts-container').each(function(){
                    var $carousel1 = $(this);
                    /* Initializes a slick carousel only on mobile screens */
                    // slick on mobile
                    if ($(window).width() >= 768) {
                        if ($carousel1.hasClass('slick-initialized')) {
                            $carousel1.slick('unslick');
                        }

                        // resize section height according to posts container
                        $('section#section4').height($('.section4__posts-container').height()+300);
                    }
                    else{
                        if (!$carousel1.hasClass('slick-initialized')) {
                            $carousel1.slick({

                                responsive: [
                                
                                                    {
                                                        breakpoint: 768,
                                                        settings: {
                                                                    slidesToShow: 2,
                                                                    slidesToScroll: 1,
                                                                    arrows: false,
                                                                    centerMode: true,                                                                                                
                                                                    centerPadding: '40px',
                                                                    mobileFirst: true,
                                                                  }
                                                    },
                                                    
                                                    {
                                                        breakpoint: 420,
                                                        settings: {
                                                                    slidesToShow: 1,
                                                                    slidesToScroll: 1,
                                                                    arrows: false,
                                                                    centerMode: true,                                                                                                
                                                                    mobileFirst: true,
                                                                  }
                                                    },
                                            ],
                            });
                        }

                        // reset section height
                        $('section#section4').css('height', 'auto');
                    }
                });
            
                $('.section-podcast__posts-container-wrap').each(function(){
                    var $carousel3 = $(this);
                    /* Initializes a slick carousel only on mobile screens */
                    // slick on mobile
                    if ($(window).width() >= 768) {
                        if ($carousel3.hasClass('slick-initialized')) {
                            $carousel3.slick('unslick');
                        }

                        // resize section height according to posts container
                        $('section#section-podcast').height($('.section-podcast__posts-container').height()+150);
                    }
                    else{
                        if (!$carousel3.hasClass('slick-initialized')) {
                            $carousel3.slick({

                                responsive: [
                                
                                                    {
                                                        breakpoint: 768,
                                                        settings: {
                                                                    slidesToShow: 2,
                                                                    slidesToScroll: 1,
                                                                    arrows: false,
                                                                    centerMode: true,                                                                                                
                                                                    centerPadding: '40px',
                                                                    mobileFirst: true,
                                                                  }
                                                    },
                                                    
                                                    {
                                                        breakpoint: 420,
                                                        settings: {
                                                                    slidesToShow: 1,
                                                                    slidesToScroll: 1,
                                                                    arrows: false,
                                                                    centerMode: true,                                                                                                
                                                                    mobileFirst: true,
                                                                  }
                                                    },
                                            ],
                            });
                        }

                        // reset section height
                        $('section#section-podcast').css('height', 'auto');
                    }
                });
            
                $('.section-lost-pastries__posts-container-wrap').each(function(){
                    var $carousel2 = $(this);
                    /* Initializes a slick carousel only on mobile screens */
                    // slick on mobile
                    if ($(window).width() >= 768) {
                        if ($carousel2.hasClass('slick-initialized')) {
                            $carousel2.slick('unslick');
                        }
                    }
                    else{
                        if (!$carousel2.hasClass('slick-initialized')) {
                            $carousel2.slick({

                                responsive: [
                                
                                                    {
                                                        breakpoint: 768,
                                                        settings: {
                                                                    slidesToShow: 2,
                                                                    slidesToScroll: 1,
                                                                    arrows: false,
                                                                    centerMode: true,                                                                                                
                                                                    centerPadding: '40px',
                                                                    mobileFirst: true,
                                                                  }
                                                    },
                                                    
                                                    {
                                                        breakpoint: 420,
                                                        settings: {
                                                                    slidesToShow: 1,
                                                                    slidesToScroll: 1,
                                                                    arrows: false,
                                                                    centerMode: true,                                                                                                
                                                                    mobileFirst: true,
                                                                  }
                                                    },
                                            ],
                            });
                        }
                    }
                });

                $('.section-bakery-gallery__gallery-container-wrap').each(function(){
                    var $carousel3 = $(this);

                    if (!$carousel3.hasClass('slick-initialized')) {
                        $carousel3.slick({
                            slidesToShow: 1,
                            slidesToScroll: 1,
                            arrows: true,
                            centerMode: true,                                                                                                
                            mobileFirst: true,
                        });
                	}
                });

            }); // Window.on
     
		},


		/**
		 * loaded
		 *
		 * Called by $(window).load event
		 *
		 * @param	N/A
		 * @return	N/A
		 */
		loaded : function() {

			HTMLine_starter_general.params.window_width = $(window).width();
			$(window).resize(function() {
				if ( HTMLine_starter_general.params.window_width != $(window).width() ) {
					HTMLine_starter_general.alignments();
					HTMLine_starter_general.params.window_width = $(window).width();
				}
			});

			HTMLine_starter_general.alignments();

		},

		/**
		 * alignments
		 *
		 * Align components after window resize event
		 *
		 * @param	N/A
		 * @return	N/A
		 */
		alignments : function() {}

	};

// Make it safe to use console.log always
(function(a){function b(){}for(var c="assert,count,debug,dir,dirxml,error,exception,group,groupCollapsed,groupEnd,info,log,markTimeline,profile,profileEnd,time,timeEnd,trace,warn".split(","),d;!!(d=c.pop());){a[d]=a[d]||b;}})
(function(){try{console.log();return window.console;}catch(a){return (window.console={});}}());

$(HTMLine_starter_general.init);
$(window).load(HTMLine_starter_general.loaded);
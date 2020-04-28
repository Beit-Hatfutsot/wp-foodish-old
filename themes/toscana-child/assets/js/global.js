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
$(document).ready(function () {


    if ($('body.po').length > 0) {"use strict";
		setTimeout( function () {
			$( '.filter-button-group a:first-child' ).trigger( "click" );
		}, 50 );
		var $grid = $( '.grid' ).isotope( {
			itemSelector: '.grid-item',
			layoutMode: 'fitRows'
		} );
		$( '.filter-button-group' ).on( 'click', 'a', function () {
			$( '.filter-button-group a' ).removeClass( "current" );
			$( this ).addClass( "current" );
			var filterValue = $( this ).attr( 'data-filter' );
			$grid.isotope( {
				filter: filterValue
			} );
			setTimeout( function () {
			}, 0 );
			return false;
		} );
	}

	// Prevent Scrolling
		$('html, body').css({ 'overflow': 'hidden', 'height': '100%' })
		$(window).load(function() {
			// Animate loader off screen
			$(".se-pre-con").fadeOut("slow");
			$('html, body').removeAttr('style');
		});

	// Slider Full width and height
		var slider = $('header .bxslider');
		slider.height($(window).height()- $('.navbar').height());

	// Adjust Content height
		var div = $('header .bxslider li > div');
		div.each(function() {
			$(this).css('paddingTop',(slider.height() - div.height()) / 2)
		});


	// Resize Everything
		$(window).resize(function(){
			// Slider Image
				slider.height($(window).height()- $('.navbar').height());
			// Adjust Content height
				div.each(function() {
					$(this).css('paddingTop',(slider.height() - div.height()) / 2)
				});
			// Page Image
				$('.page ,.contact, .holiday,.calc').height($(window).height() / 2 );
		});


	(function() {

		var bodyEl = document.body,
			content = document.querySelector( '.content-wrap' ),
			openbtn = document.getElementById( 'open-button' ),
			closebtn = document.getElementById( 'close-button' ),
			isOpen = false;

		function init() {
			initEvents();
		}

		function initEvents() {
			openbtn.addEventListener( 'click', toggleMenu );
			if( closebtn ) {
				closebtn.addEventListener( 'click', toggleMenu );
			}

			// close the menu element if the target it´s not the menu element or one of its descendants..
			content.addEventListener( 'click', function(ev) {
				var target = ev.target;
				if( isOpen && target !== openbtn ) {
					toggleMenu();
				}
			} );
		}

		function toggleMenu() {
			if( isOpen ) {
				classie.remove( bodyEl, 'show-menu' );
			}
			else {
				classie.add( bodyEl, 'show-menu' );
			}
			isOpen = !isOpen;
		}

		init();

	})();


	// Trigger Main Slider
		$('header .bxslider').bxSlider({
			pager:false,
			auto: true,
			nextText: '<i class="fa fa-chevron-right"></i>',
            prevText: '<i class="fa fa-chevron-left"></i>'
			/*controls: false*/
		});

		$('.sing-gallery .bxslider').bxSlider({
			auto: true,
		  	pagerCustom: '#bx-pager',
            nextText: '<i class="fa fa-chevron-right"></i>',
            prevText: '<i class="fa fa-chevron-left"></i>'
		});
    	$('.single-m .bxslider').bxSlider({
            auto: false,
            pagerCustom: '#bx-pager',
            nextText: '<i class="fa fa-chevron-right"></i>',
            prevText: '<i class="fa fa-chevron-left"></i>'
    	});



  $(function() {
    $('.acc_ctrl').on('click', function(e) {
      e.preventDefault();
      if ($(this).hasClass('active')) {
        $(this).removeClass('active');
        $(this).next()
        .stop()
        .slideUp(300);
      } else {
      $(this).addClass('active');
        $(this).next()
        .stop()
        .slideDown(300);
      }
    });
  });





	$('#tabs').tabulous({
		effect: 'scale'
	});





	$(".site-co .tab_content").hide();
    $(".tab_content:first").show();

  /* if in tab mode */
    $(".site-co ul.tabs li").click(function() {

      $(".site-co .tab_content").hide();
      var activeTab = $(this).attr("rel");
      $("#"+activeTab).fadeIn();

      $(".site-co ul.tabs li").removeClass("active");
      $(this).addClass("active");

	  $(".site-co .tab_drawer_heading").removeClass("d_active");
	  $(".site-co .tab_drawer_heading[rel^='"+activeTab+"']").addClass("d_active");

    });
	/* if in drawer mode */
	$(".site-co .tab_drawer_heading").click(function() {

      $(".site-co .tab_content").hide();
      var d_activeTab = $(this).attr("rel");
      $("#"+d_activeTab).fadeIn();

	  $(".site-co .tab_drawer_heading").removeClass("d_active");
      $(this).addClass("d_active");

	  $(".site-co ul.tabs li").removeClass("active");
	  $(".site-co ul.tabs li[rel^='"+d_activeTab+"']").addClass("active");
    });


	/* Extra class "tab_last"
	   to add border to right side
	   of last tab */
	$('.site-co ul.tabs li').last().addClass("tab_last");




	// Fixed Header
		$(function(){
		 var shrinkHeader = 300;
		  $(window).scroll(function() {
		    var scroll = getCurrentScroll();
		      if ( scroll >= shrinkHeader ) {
		           $('.navbar,.menu-button,.search-box').addClass('shrink');
		        }
		        else {
		            $('.navbar,.menu-button,.search-box').removeClass('shrink');
		        }
		  });
		function getCurrentScroll() {
		    return window.pageYOffset || document.documentElement.scrollTop;
		    }
		});




	// if (hash) $('#tabs a[href$="'+hash+'"]').trigger('click');
	$('#marble').click(function(event) {
		$('a[data-filter=".business"]').trigger('click');
	});


    $("<i class='fa fa-plus'></i>").insertBefore('.sub');

	$('.fa-plus').click(function () {
		$(this).next().slideToggle();
		$(this).toggleClass('fa-minus');
    });
});

var p = 1.2; // Parallax strength

$(document).ready(function() {

	// adds isLoaded body class for pageload animations
	setTimeout(function() {
		$('body').addClass('isLoaded');
	}, 300);


	// initiating smooth scroll plugin
	$('a[href^="#"]').smoothScroll();


	// touch device detection
	$touch = ( navigator.userAgent.match(/(Android|webOS|iPad|iPhone|iPod|BlackBerry)/i) ? true : false );
	var touchEvent = $touch ? 'touchstart' : 'click';

	scrollActions();


	// nav menu toggle
	$('nav #nav-menu-toggle, nav #mask').bind(touchEvent, (function(e) {
		$(this).blur();
		$('nav').toggleClass('isExpanded');
		e.preventDefault();
	}));


	// dialog book_a_tour toggle
	$('.toggle_book_a_tour').bind(touchEvent, (function(e) {
		$('dialog#book_a_tour').toggleClass('isVisible');
		$('#book_a_tour_dialog_mask').toggleClass('isVisible');
		e.preventDefault();
	}));
	// dialog contact_us toggle
	$('.toggle_contact_us').bind(touchEvent, (function(e) {
		$('dialog#contact_us').toggleClass('isVisible');
		$('#contact_us_dialog_mask').toggleClass('isVisible');
		e.preventDefault();
	}));
	// dialog host_an_event toggle
	$('.toggle_host_an_event').bind(touchEvent, (function(e) {
		$('dialog#host_an_event').toggleClass('isVisible');
		$('#host_an_event_dialog_mask').toggleClass('isVisible');
		e.preventDefault();
	}));
	// dialog close
	$('.dialog_mask, #closeDialog').bind(touchEvent, (function(e) {
		$('dialog').removeClass('isVisible');
		$('.dialog_mask').removeClass('isVisible');
		e.preventDefault();
	}));
	// toggles dialog close on Esc key
	$('body').bind('keyup', (function(e) {
		if(e.keyCode == 27) {
			$('dialog').removeClass('isVisible');
			$('.dialog_mask').removeClass('isVisible');
		}
		e.preventDefault();
	}));

	// Setup Google Map
	if ($('#map-canvas').length > 0) {
		var mapOptions = {
			mapTypeId: google.maps.MapTypeId.ROADMAP,
			center: { lat: 41.025417, lng: 28.982062 },
			zoom: 15,
			scrollwheel: false,
			scroll:{x:$(window).scrollLeft(),y:$(window).scrollTop()},
			panControlOptions:{
				position: google.maps.ControlPosition.TOP_RIGHT
			},
			zoomControlOptions:{
				position: google.maps.ControlPosition.TOP_RIGHT
			}
		};
		var map = new google.maps.Map(document.getElementById('map-canvas'),
		                              mapOptions);

		// Add marker at Yazane's address
		new google.maps.Marker({map:map,position:map.getCenter()});

		// Setup parallax effect on map
		var offset=$(map.getDiv()).offset();
		map.panBy(-((mapOptions.scroll.x-offset.left)/p),
		          -((mapOptions.scroll.y-offset.top)/p));
		google.maps.event.addDomListener(window, 'scroll', function(){
			var scrollY=$(window).scrollTop(),
			    scrollX=$(window).scrollLeft(),
			    scroll=map.get('scroll');
			if(scroll){
				map.panBy(((scroll.x-scrollX)/p),((scroll.y-scrollY)/p));
			}
			map.set('scroll',{x:scrollX,y:scrollY});
		});
	}

	// only applicable for home page
	if ($('body').hasClass('home')) {
		// Update page-menu to reflect the current scroll position
		var anchors = [];
		$('#page-menu li a').each(function(idx, e) {
			anchors.unshift($(e).attr('href'));
		});
		var getCurrentPageMenuItem = function() {
			var item;
			var scrollMiddle = $(window).scrollTop() + $(window).height() / 2;
			$.each(anchors, function(idx, anchor) {
				item = anchor;
				if (scrollMiddle >= $(anchor).position().top) {
					return false;
				}
			});
			return item;
		}
		var currentPageMenuItem = getCurrentPageMenuItem;
		var updatePageMenu = function() {
			var pageMenuItem = getCurrentPageMenuItem();
			if (pageMenuItem != currentPageMenuItem) {
				$('#page-menu li a').removeClass('active');
				$('[href="' + pageMenuItem + '"]').addClass('active');
				currentPageMenuItem = pageMenuItem;
			}
		}
		$(window).scroll(updatePageMenu);
		$(window).resize(updatePageMenu);
	}

	// only applicable for pricing page
	if ($('body').hasClass('page') && $('body').hasClass('pricing')) {

		$('.price-toggleDetail').bind(touchEvent, (function(e) {
			$(this).toggle();
			$(this).closest('.price-type').toggleClass('isDetailed');
			e.preventDefault();
		}));

		$('#toggle_pricecompare').bind(touchEvent, (function(e) {
			$('.price-type').removeClass('isDetailed').addClass('isDetailed');
			e.preventDefault();
		}));

	}

	// only applicable for member page
	if ($('body').hasClass('page') && $('body').hasClass('members')) {

		// initialise Isotope plugin for sorting & filtering of coworkers
		$('.coworker-container').isotope({
		  // options
		  itemSelector: '.coworker',
		  layoutMode: 'fitRows',
		  getSortData: {
		    name: '.coworker-name',
		    title: '.coworker-title'
		  },
		  sortBy: 'random',
		  sortAscending: true
		});

		// Isotope: coworker sorting buttons
		$('.coworker-sorting .btn').bind(touchEvent, (function(e) {
			// setting Isotope sorting
			$('.coworker-container').isotope({
				sortBy: $(this).attr('data-sort'),
				sortAscending: true
			});
			// toggling button states
			$('.coworker-sorting .btn').removeClass('btn-primary');
			$(this).addClass('btn-primary');
		}));

		// Isotope: coworker filtering buttons
		$('.coworker-filtering .btn').bind(touchEvent, (function(e) {
			// setting Isotope sorting
			$('.coworker-container').isotope({
				filter: '.'+$(this).attr('data-filter')
			});
			// toggling button states
			$('.coworker-filtering .btn').removeClass('btn-primary');
			$(this).addClass('btn-primary');
		}));

		// coworker detail toggle
		$('.coworker').bind(touchEvent, (function(e) {
			// toggling coworker div itself
			$('.coworker').not(this).removeClass('isExpanded');
			$(this).toggleClass('isExpanded');
			e.preventDefault();

			// toggling detail dialog
			$('dialog#coworker_detail').toggleClass('isVisible');
			$('.dialog_mask').toggleClass('isVisible');

			// reading coworker data from clicked item and outputting them in dialog
			$data = ["name", "title", "description", "image", "links"];
			for (i=0; i<$data.length; i++) {
				$coworker_data_item = $(this).find('.coworker-'+$data[i]).html();
				$data_item = ($coworker_data_item) ? $coworker_data_item : '[no '+$data[i]+']';
				$('dialog#coworker_detail').find('.coworker-'+$data[i]).html($data_item);
			}
		}));

		$( function() {
			// quick search regex
			var qsRegex;
			// init Isotope
			var $container = $('.coworker-container').isotope({
				itemSelector: '.coworker-name',
				filter: function() {
					return qsRegex ? $(this).text().match( qsRegex ) : true;
				}
			});
			// use value of search field to filter
			var $quicksearch = $('#coworkersearch').keyup( debounce( function() {
				qsRegex = new RegExp( $quicksearch.val(), 'gi' );
				$container.isotope();
				$searchBarClass = ($quicksearch.val().length > 0) ? 'hasContent' : '';
				$quicksearch.addClass($searchBarClass);
			}, 200 ) );
		});
		// debounce so filtering doesn't happen every millisecond
		function debounce( fn, threshold ) {
			var timeout;
			return function debounced() {
				if ( timeout ) {
					clearTimeout( timeout );
				}
				function delayed() {
					fn();
					timeout = null;
				}
				timeout = setTimeout( delayed, threshold || 100 );
			}
		}
	}

	// only applicable for calendars page
	if ($('body').hasClass('page') && $('body').hasClass('calendars')) {
		var calendars = ["#event_space", "#meeting_room_1", "#meeting_room_2"];

		var showCalendar = function(calendar) {
			if ($.inArray(calendar, calendars) != -1) {
				$('.btn-tab').removeClass("current");
				$(calendar + "_tab").addClass("current");
				$('section#calendars .calendar').hide();
				$(calendar + "_calendar").show();
			}
		}

		showCalendar(document.location.hash);

	  $('.btn-tab').bind(touchEvent, function(e) {
			var calendar = $(this).data("calendar");
			showCalendar(calendar);
		  e.preventDefault();
	  });
	}

});


// parallax functionality
function scrollActions() {
	scroll = $(window).scrollTop();
	windowH = $(window).height();

	$('.parallax').each(function() {
		var st = $(this).offset().top;
		if (!$touch) {
			if ($(this).attr('data-prlx-offset')) {
				prlx_offset = $(this).attr('data-prlx-offset');
			} else {
				prlx_offset = 0;
			}
			var pos = ((scroll - st)/p - prlx_offset)+'px';
			$(this).css('background-position','center '+pos);
		}
	});
}

$(window).scroll(function() { scrollActions(); });
$(window).resize(function() { scrollActions(); });
$(document).bind("scrollstart", function() { scrollActions(); });
$(document).bind("scrollstop", function() { scrollActions(); });

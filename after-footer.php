<link data-minify="1" rel="stylesheet" id="front_end_poll-css" href="./pinehurst-html_files/baze_styles_for_poll-ef75620ffcf0ddd187e0ead1e8f2e575.css" type="text/css" media="all"> <script type="text/javascript" src="./pinehurst-html_files/picker.js.download" id="pickadate-js"></script> <script type="text/javascript" src="./pinehurst-html_files/picker.date.js.download" id="pickadate-picker-js"></script> <script type="text/javascript" src="./pinehurst-html_files/pinehurst.js.download" id="pickadate-js-js"></script> <script type="text/javascript" src="./pinehurst-html_files/all.min.js.download" id="theme.all-js"></script> <script type="text/javascript" src="./pinehurst-html_files/scripts-min.js.download" id="theme-functions-js"></script> <script type="text/javascript" id="poll_front_end_script-js-extra">/* <![CDATA[ */ var poll_varables = {"poll_answer_securety":"f3af1c9957","admin_ajax_url":"https:\/\/www.pinehurst.com\/wp-admin\/admin-ajax.php"}; /* ]]> */</script> <script type="text/javascript" src="./pinehurst-html_files/scripts_front_end_poll.js.download" id="poll_front_end_script-js"></script> <div id="fb-root" class=" fb_reset"><div style="position: absolute; top: -10000px; width: 0px; height: 0px;"><div></div></div></div> <script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&appId=238085883036534&version=v2.3";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>  <iframe height="0" width="0" style="display: none; visibility: hidden;" src="./pinehurst-html_files/activityi.html"></iframe><script>gtag('event', 'conversion', {
	    'allow_custom_scripts': true,
	    'send_to': 'DC-6057309/invmedia/globa0+unique'
	  });</script> <noscript> <img src="https://ad.doubleclick.net/ddm/activity/src=6057309;type=invmedia;cat=globa0;dc_lat=;dc_rdid=;tag_for_child_directed_treatment=;tfua=;npa=;ord=1;num=1?" width="1" height="1" alt=""/> </noscript>  <script src="./pinehurst-html_files/jquery.bxslider.min.js.download"></script> <script src="./pinehurst-html_files/jquery.uniform.standalone.js.download"></script> <script type="text/javascript">(function(window, $) { $(document).ready(function() {

	// ===== CLICK TO CALL
	// ================================================================================

	var clickToCall = {
		settings: {
			a_tel_link: $('a[href^="tel:"]')
		},
		init: function(){
			this.bindUIActions();
		},
		bindUIActions: function(){
			this.settings.a_tel_link.on('click', function(){
				if(window.matchMedia("(min-width: 767px)").matches) return false;
			});
		},
	};
	clickToCall.init();



	// ===== SWAP TELEPHONE LINKS
	// ================================================================================

	var swapTelAnchors = {
		settings: {
			tel_links: $('a[href^="tel:"]')
		},
		init: function(){
			this.makeTheSwap();
		},
		makeTheSwap: function(){
			this.settings.tel_links.each(function(){
				$(this).prop('href', 'tel:'+NavisConvertTagToPhoneNumber());
			});
		}
	};
	swapTelAnchors.init();



	// ===== FLOATING CTA
	// ================================================================================

	var floatingCta = {
		settings: {
			// Overlay Triggers
			cta_btn_primary : $('.js-floating-cta-btn-primary'),
			cta_btn_secondary : $('.js-floating-cta-btn-secondary'),
			cta_trigger_overlay: $('.js-floating-cta-trigger-overlay'),
			cta_close_overlay: $('.js-floating-cta-close-overlay'),

			// Overlay Content
			continue_btn: $('.js-continue-btn'),
			form_step: $('.js-form-step'),
			form_pager: $('.js-form-pager'),
			pager_item: $('.js-form-pager-item'),
			request_form: $('.js-floating-request-form'),
			current_index: 0,
		},
		init: function(){
			this.bindUIEvents();
		},
		bindUIEvents: function(){
			$(document).keyup(function(e){
				if(e.key === "Escape"){
					document.documentElement.classList.remove('show-floating-request');
				}
			});
			// Trigger Overlay
			this.settings.cta_trigger_overlay.on('click', function(){
				document.documentElement.classList.add('show-floating-request');
				return false;
			});
			this.settings.cta_close_overlay.on('click', function(){
				document.documentElement.classList.remove('show-floating-request');
				return false;
			});

			// Trigger - Primary CTA on Mobile
			this.settings.cta_btn_primary.on('click', function(){
				floatingCta.settings.cta_btn_primary.toggleClass('active');
				floatingCta.settings.cta_btn_secondary.toggleClass('show');
				return false;
			});

			// Continue BUttons on step 1 and 2 of Overlay Form
			this.settings.continue_btn.on('click', function(){
				if(floatingCta.hasRequiredFields($(this).closest('.js-form-step'))){
					floatingCta.changeFormStep($(this).data('nextStep'));
				}
				return false;
			});

			// Steps Pager
			this.settings.pager_item.on('click', function(){
				var can_change = true;

				if($(this).index() > floatingCta.settings.current_index){
					can_change = floatingCta.hasRequiredFields(floatingCta.settings.form_step.eq(floatingCta.settings.current_index));
				}

				if(can_change){
					floatingCta.changeFormStep($(this).index());
				}
				return false;
			});

			// Form Submit Button and Submission
			this.settings.request_form.on('submit', function(){
				$(this).find('[type="submit"]').addClass('is-loading').attr("disabled", true);
				floatingCta.sendDataToGravity($(this));
				return false;
			});
		},
		hasRequiredFields: function($step_container){
			var required_fields = true;
			$step_container.find('[required]').each(function(){
				if(!$(this).val()){
					$(this).addClass('required');
					required_fields = false;
				}
			});
			return required_fields;
		},
		changeFormStep: function(needed_index){
			this.settings.current_index = needed_index;
			// Change Form that is Shown
			$('.js-form-step.active').removeClass('active');
			this.settings.form_step.eq(this.settings.current_index).addClass('active');

			// Update the Pager atop the form
			this.settings.form_pager.find('.active').removeClass('active');
			this.settings.form_pager.find('a').eq(this.settings.current_index).addClass('active');
		},
		sendDataToGravity: function($form){
      var raw_form_data = new FormData($form[0]);
			var gravity_settings = {
			  "url": "https://www.pinehurst.com/wp-json/gf/v2/forms/3/submissions",
			  "method": "POST",
			  "timeout": 0,
			  "processData": false,
			  "mimeType": "multipart/form-data",
			  "contentType": false,
			  "data": raw_form_data
			};

			$.ajax(gravity_settings).done(function(response) {
				gtag('event', 'Floating CTA', {
					'event_category' : 'Form Submission'
				});
				document.documentElement.classList.add('thank-you-floating-request');
			});
		}
	};
	floatingCta.init();



	// ===== PAGE:  ACCOMMODATIONS (PARENT)
	// ================================================================================

	


	// ===== PAGE:  BUDDY'S LANDING PAGE
	// ================================================================================

	


	// ===== PAGE:  GOLF ACADEMY
	// ================================================================================

	


	// ===== PAGE:  OFFER (PARENT)
	// ================================================================================

	


	// ===== DROPDOWN MENUS ON SCREENS 767px AND LESS
	// ================================================================================

			var dropDownParentMenus = {
				settings: {
					nav_title: $('.nav-sub-header .nav-title'),
				},
				init: function(){
					if(this.settings.nav_title.length > 0){
						this.bindUIActions();
					}
				},
				bindUIActions: function(){
					this.settings.nav_title.on('click', function(){
						if(window.matchMedia("(max-width: 767px)").matches){
							dropDownParentMenus.toggleMenu($(this));
							return false;
						}
					});
				},
				toggleMenu: function($elem){
					if($(window).width() < 787){
						$elem.next().toggleClass('show');
					}
				}
		};
		dropDownParentMenus.init();
	


	// ===== UNIFORM JS
	// ================================================================================

	var contactForm = {
		settings: {
			input: $('.inline-label input, .inline-label textarea'),
			uniform_elems: '.package-offers--card-date-form select, .js-offers-date-selection, #gform_3 select, #gform_5 select, [name="newsletter_subscribe"] select, [name="newsletter_subscribe"] [type="checkbox"], #usr_overlay_country, #usr_overlay_state, #usr_overlay_consent, .floating-request--container-form select, .floating-request--container-form [type="checkbox"]',
			ginput_container_date: $('.picker__input'),
			convert_inputs_type: $('.convert-type-email, .convert-type-tel')
		},
		init: function() {
			this.uniformInit();
			this.bindUIActions();
			this.setInitialState();
			this.checkDatePicker();
		},
		bindUIActions: function() {
			this.settings.input.on('focus blur', function(e) {
				contactForm.toggleLabelPosition($(this), e);
			});

			$(this.settings.select).on('change', function(e) {
				contactForm.uniformUpdate();
				contactForm.toggleSelect();
			});
			if(this.settings.convert_inputs_type.length){
				contactForm.convertTypes(contactForm.settings.convert_inputs_type);
			}
		},

		// Check if Form has Required Values
		checkRequiredValues: function($form){
			var requirments_met = true;
			$form.find('.required').each(function(){
				if($(this).val()===''){
					$(this).closest('.form-elem').addClass('error');
					requirments_met = false;
					$form.find('.btn').removeClass('loading');
				}
			});
			return requirments_met;
		},

		convertTypes: function($elems){
			$elems.each(function(i){
				switch(true){
					case $(this).hasClass('convert-type-email') :
						$(this).find('[type="text"]').attr('type', 'email');
						break;
						case $(this).hasClass('convert-type-tel') :
							$(this).find('[type="text"]').attr('type', 'tel');
							break;
				}
			})
		},

		checkDatePicker: function(){
			this.settings.ginput_container_date.each(function(){
				if($(this).val() === '') {
					$(this).trigger('blur');
				// If we have a value, then update the jquery datepicker hidden inputs
				} else {
					var current_name = $(this).attr('name'),
						current_val = $(this).val();
					$('[name="'+current_name+'"]').val(current_val);
				}
			});
		},

		// Applies uniform styling to form elements (i.e. <select>)
		uniformInit: function() {
			$(this.settings.uniform_elems).uniform({
				selectAutoWidth: false
			});
		},

		// Updates the current status of all Uniform elements.
		// Useful for configurable products with multiple configuration options (some options will be
		// disabled/enabled as the user interacts with the add-to-cart form).
		uniformUpdate: function() {
			$.uniform.update();
		},

		// Looks for the presence of values witin form fields to determine if form
		// aesthetics (e.g. labels) need to change.
		setInitialState: function() {
			this.settings.input.each(function(i) {
				if($(this).val() != '') {
					$(this).closest('.inline-label').addClass('label-up');
				}
			});
		},

		// Toggles the display of uniform select menus.
		// This is needed within Magento when toggling one select menu may show/hide another.
		toggleSelect: function() {
			$(this.settings.select).each(function(i) {
				if($(this).css('display') == 'block') {
					$(this).parent('.selector').show();
				}
				if($(this).css('display') == 'none') {
					$(this).parent('.selector').hide();
				}
			});
		},

		// Determines the position of a field's label based on focus and value
		toggleLabelPosition: function(elem, e) {
			if(e.type == 'focus') {
				elem.closest('.inline-label').addClass('label-up');
			}
			if((e.type == 'blur') && (elem.val() == '')) {
				elem.closest('.inline-label').removeClass('label-up');
			}
		}
	};
	contactForm.init();



	// ===== EVENT TRACKING ON BEGIN RESERVATION
	// ================================================================================

	var beginReservationTracking = {
		settings: {
			trackable_btn: $('.gform_button, .gform_next_button')
		},
		init: function(){
			if(this.settings.trackable_btn.length){
				this.bindUIActions();
			}
		},
		bindUIActions: function(){
			this.settings.trackable_btn.on('click', function(){
				switch($(this)[0].id){
					case 'gform_next_button_3_45' :
						beginReservationTracking.trackEvent('Step 1 - Continue');
						break;
					case 'gform_next_button_3_46' :
						beginReservationTracking.trackEvent('Step 2 - Continue');
						break;
					case 'gform_submit_button_3' :
						beginReservationTracking.trackEvent('Step 3 - Submit');
						break;
				}
			});
		},
		trackEvent: function(step){
			gtag('event', step, {
				'event_category' : 'Begin Reservation Form'
			});
		}
	};
	beginReservationTracking.init();



	// ===== PAGE:  HOME
	// ================================================================================

	


	// ===== PAGE:  SUBSCRIPTIONS PREFERENCES
	// ================================================================================

	


	// ===== PAGE:  OFFERS (ARCHIVE)
	// ================================================================================

	var offerArchivePage = {
		settings: {
			body_page_class: $('.page-id-1226'),
			nav_sub_header_nav_link: $('.nav-sub-header .nav-link'),
			section_offers_container_title: $('.section-offers-container-title'),
		},
		init: function(){
			if(this.settings.body_page_class.length > 0){
				this.bindUIActions();
			}
			if(window.location.hash){
				this.checkURL(window.location.hash);
			}
		},
		bindUIActions: function(){
			this.settings.nav_sub_header_nav_link.on('click', function(){
				offerArchivePage.scrollToPackage($(this));
				return false;
			});
		},
		checkURL: function(current_url){
			var package_needed = window.location.hash.substring(1);
			$('.nav-sub-wrap-header [title="'+package_needed+'"]').trigger('click');
		},
		scrollToPackage: function($elem){
			var package_name = $elem[0].hash.replace('#', ''),
				target_package = this.settings.section_offers_container_title.filter('[data-package-container-name="'+package_name+'"]'),
				offset = target_package.offset();
				$('html,body').animate({ scrollTop: (offset.top - 200) });

		}
	};
	offerArchivePage.init();



	// ===== PAGE:  MEETINGS & GROUPS
	// ================================================================================

	var meetingsAndGroupsPage = {
		settings: {
			req_elem: $('.section-testimonial-container'),
			testimonial_slider: $('.section-testimonial-container .testimonial-slider'),
			bx_testimonials: {},
			bx_testimonials_opts: {
				//controls: false,
				pager: false,
				adaptiveHeight: true,
			}
		},
		init: function(){
			if(this.settings.req_elem.length > 0){
				this.bxSliderInit();
			}
		},
		bindUIActions: function(){
			this.settings.nav_sub_header_nav_link.on('click', function(){
			});
		},
		bxSliderInit: function(){
			this.settings.bx_testimonials = this.settings.testimonial_slider.bxSlider(this.settings.bx_testimonials_opts);
		}
	};
	meetingsAndGroupsPage.init();



	// ===== PAGE:  ACCOMMODATIONS (SINGLE)
	// ================================================================================

	


	// ===== PAGE:  SHOP PINEHURST
	// ================================================================================

	


	// ===== PAGE:  SPA (ARCHIVE)
	// ================================================================================

	var spaArchivePage = {
		settings: {
			req_elem: $('.spa-acrhive-content'),
			spa_archive_content_slider: $('.js-spa-acrhive-content-slider'),
			bx_spa_archive: {},
			bx_spa_archive_opts: {
				mode: 'fade',
				pager: false,
				nextSelector: $('.spa-acrhive-content--slider-controls'),
				prevSelector: $('.spa-acrhive-content--slider-controls')
			},
			spa_review_slider: $('.js-spa-review-slider'),
			bx_spa_review: {},
			bx_spa_review_opts: {
				mode: 'fade',
				pager: false,
				prevSelector: $('.spa-review--slider-controls'),
				nextSelector: $('.spa-review--slider-controls')
			}
		},
		init: function(){
			if(this.settings.req_elem.length > 0){
				this.bxSliderInit();
			}
		},
		bindUIActions: function(){

		},
		bxSliderInit: function(){
			this.settings.bx_spa_archive = this.settings.spa_archive_content_slider.bxSlider(this.settings.bx_spa_archive_opts);
			this.settings.bx_spa_review = this.settings.spa_review_slider.bxSlider(this.settings.bx_spa_review_opts);
		}
	};
	spaArchivePage.init();



	// ===== COURSE NO. 4
	// ================================================================================

	var courseFour = {
		exploreModal: $('.section-explore .modal'),
		exploreModalVideo: $('.section-explore .modal-body .video'),
		highlightsWrapper: $('.section-course-highlights .highlights-wrapper'),
		highlights: $('.section-course-highlights .highlights'),
		bx: {
			instanceHighlights: {},
			optsReviews: {
				mode: 'fade',
				adaptiveHeight: true,
				controls: true,
				pager: true,
				prevSelector: '.section-reviews .ctrl-prev',
				nextSelector: '.section-reviews .ctrl-next',
				pagerSelector: '.section-reviews .pager'
			},
			optsHighlights: {
				mode: 'fade',
				adaptiveHeight: true,
				controls: true,
				pager: true,
				prevSelector: '.section-course-highlights .ctrl-prev',
				nextSelector: '.section-course-highlights .ctrl-next',
				pagerSelector: '.section-course-highlights .pager'
			},
			optsHoleByHole: {
				mode: 'fade',
				adaptiveHeight: true,
				controls: true,
				pager: true,
				prevSelector: '.section-hole-by-hole .ctrl-prev',
				nextSelector: '.section-hole-by-hole .ctrl-next',
				pagerSelector: '.section-hole-by-hole .pager'
			}
		},
		init: function() {
			if($('.page-no-4').length > 0) {
				this.bxSliderInit();
				$('.section-explore .highlight').on('click', function() { courseFour.videoHandler('show', $(this).data('video')); });
				$('.section-explore .modal-bg').on('click', function() { courseFour.videoHandler('hide'); });
				$('.section-course-highlights .notes-trigger').on('click', function() { courseFour.highlightHandler('showModal'); });
				$('.section-course-highlights .modal-close-btn').on('click', function() { courseFour.highlightHandler('hideModal'); });
				$('.section-course-highlights .modal-next-btn').on('click', function() { courseFour.highlightHandler('nextSlide'); });
				$(window).on('scroll', function() { courseFour.highlightHandler('scroll'); });
			}
		},
		bxSliderInit: function() {
			$('.section-reviews .reviews').bxSlider(this.bx.optsReviews);
			this.bx.instanceHighlights = $('.section-course-highlights .highlights').bxSlider(this.bx.optsHighlights);
			$('.section-hole-by-hole .holes').bxSlider(this.bx.optsHoleByHole);
		},
		videoHandler: function(action, video_id) {
			switch(action) {
				case 'show':
					this.exploreModalVideo.html('<iframe width="560" height="315" src="https://www.youtube.com/embed/'+video_id+'?autoplay=1&rel=0&controls=0&showinfo=0" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>');
					this.exploreModal.addClass('active');
					break;
				case 'hide':
					this.exploreModalVideo.html('');
					this.exploreModal.removeClass('active');
					break;
			}
		},
		highlightHandler: function(action) {
			switch(action) {
				case 'showModal':
					this.highlightsWrapper.addClass('modal-enabled');
					break;
				case 'hideModal':
					this.highlightsWrapper.removeClass('modal-enabled');
					break;
				case 'nextSlide':
					this.bx.instanceHighlights.goToNextSlide();
					break;
				case 'scroll':
					var thresholdAlpha = this.highlightsWrapper.offset().top;
					var thresholdOmega = thresholdAlpha + (this.highlightsWrapper.height() * 0.5);
					var scrollPosition = $(window).scrollTop() + ($(window).height() * 0.8);
					if((scrollPosition >= thresholdAlpha) && (scrollPosition <= thresholdOmega)) {
						this.highlightsWrapper.css({ opacity: ((scrollPosition - thresholdAlpha) / (thresholdOmega - thresholdAlpha)) });
					}
					if(scrollPosition >= thresholdOmega) {
						this.highlightsWrapper.css({ opacity: 1 });
						$(window).off('scroll');
					}

			}
		}
	};
	courseFour.init();



	// ===== EVENT TRACKING
	// ================================================================================

	var globaHelperFunctions = {
		settings: {
			track_event: $('.track-event'),
		},
		init: function(){
			if(this.settings.track_event.length > 0){
				this.bindUIActions();
			}
		},
		bindUIActions: function(){
			this.settings.track_event.on('click', function(){
				globaHelperFunctions.sendEvent($(this));
			});
		},
		sendEvent: function($elem){
			gtag('event', $elem.data('eventTrackingAction'), {
				'event_category' : $elem.data('eventTrackingCategory'),
				'event_label' : $elem.data('eventTrackingLabel')
			});
		},
		setCookie: function(name, value, days) {
			var expires = "";
			if(days){
				var date = new Date();
				date.setTime(date.getTime() + (days*24*60*60*1000));
				expires = "; expires=" + date.toUTCString();
			}
			document.cookie = name + "=" + (value || "")  + expires + "; path=/";
		},
		getCookie: function(name) {
			var nameEQ = name + "=";
			var ca = document.cookie.split(';');
			for(var i=0;i < ca.length;i++) {
				var c = ca[i];
				while (c.charAt(0)==' ') c = c.substring(1,c.length);
				if(c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
			}
			return null;
		},
	};
	globaHelperFunctions.init();



	// ===== PAGE:  THANK YOU
	// ================================================================================

	var thankYouPage = {
		settings: {
			section_content_itinerary_list: $('.section-content-itinerary-list'),
			section_content_itinerary_list_item: $('.section-content-itinerary-list-item'),
			section_content_itinerary_image_list: $('.section-content-itinerary-image-list'),
			bx_itinerary_list: {},
			bx_itinerary_list_opts: {
				mode: 'vertical',
				minSlides: 2,
				maxSlides: 3,
				moveSlides: 1,
				pager: false,
				infiniteLoop: false,
				touchEnabled: false,
				onSliderLoad: function(currentIndex){
					thankYouPage.settings.section_content_itinerary_list.find('li.active').removeClass('active');
					thankYouPage.settings.section_content_itinerary_list.find('li:eq('+currentIndex+')').addClass('active');
				},
				onSlideBefore: function($slideElement, oldIndex, newIndex){
				}
			},
			bx_itinerary_img: {},
			bx_itinerary_img_opts: {
				mode: 'fade',
				minSlides: 1,
				moveSlides: 1,
				pager: false,
				controls: false,
				infiniteLoop: false,
			},
		},
		init: function(){
			if(this.settings.section_content_itinerary_list.length > 0){
				this.bxInit();
				this.bindUIActions();
			}
		},
		bindUIActions: function(){
			this.settings.section_content_itinerary_list_item.on('click', function(){
				var current_index = $(this).index();
				thankYouPage.settings.bx_itinerary_img.goToSlide(current_index);
				thankYouPage.settings.section_content_itinerary_list.find('li.active').removeClass('active');
				thankYouPage.settings.section_content_itinerary_list.find('li:eq('+current_index+')').addClass('active');
			});
			$(window).on('resize', function () {
				if($(this).width() > 959){
					var new_slide_cnt = 3;
				} else if($(this).width() < 959){
					var new_slide_cnt = 2;
				}
				if(thankYouPage.settings.bx_itinerary_list_opts.minSlides !== new_slide_cnt){
					thankYouPage.settings.bx_itinerary_list_opts.minSlides = new_slide_cnt;
					thankYouPage.settings.bx_itinerary_list.reloadSlider();
				}
			});
		},
		bxInit: function(){
			this.settings.bx_itinerary_img = this.settings.section_content_itinerary_image_list.bxSlider(this.settings.bx_itinerary_img_opts);
			if($(window).width() > 959){
				this.settings.bx_itinerary_list_opts.minSlides = 3;
			}
			this.settings.bx_itinerary_list = this.settings.section_content_itinerary_list.bxSlider(this.settings.bx_itinerary_list_opts);
		}
	};
	thankYouPage.init();



	// ===== COOKIES BANNER
	// ================================================================================

	var cookiesBanner = {
		init: function(){
			if(globaHelperFunctions.getCookie('cookie_banner') !== 'closed'){
				this.bindUIActions();
				this.toggleMessage('open');
			}
		},
		bindUIActions: function(){
			$('.js-close-cookies-banner').on('click', function(){
				cookiesBanner.toggleMessage('close');
			});
		},
		toggleMessage: function(action){
			switch(action){
				case 'open' :
					document.body.classList.add("show-cookies-banner");
					break;
				case 'close' :
					globaHelperFunctions.setCookie('cookie_banner','closed',30);
					document.body.classList.remove("show-cookies-banner");
					break;
			}
		}
	};
	cookiesBanner.init();



}); }(this, this.jQuery))</script>  <script type="text/javascript" src="./pinehurst-html_files/Pinehurst_Resort.js.download"></script><iframe width="0" height="0" name="" frameborder="0" style="display:none;" scrolling="no" src="./pinehurst-html_files/iframe.html"></iframe><img height="1" width="1" style="display:none; border-style:none;" alt="" src="./pinehurst-html_files/saved_resource"><script type="text/javascript">if(typeof(adv_id) == "object"){ adv_id.push(49457);} else {adv_id = [49457];}s=document.createElement("script");s.type="text/javascript",s.src="//adservices.brandcdn.com/pixel/cv_pixel.js",s.style.display="none",document.head.appendChild(s);</script><iframe width="0" height="0" name="" frameborder="0" style="display:none;" scrolling="no" src="./pinehurst-html_files/iframe(1).html"></iframe> <div itemscope="" itemtype="http://schema.org/Resort"><meta itemprop="name" content="Pinehurst Resort"><meta itemprop="starRating" content="5"><meta itemprop="amenityFeature" content="Golf"><meta itemprop="amenityFeature" content="Spa"><meta itemprop="amenityFeature" content="Dinning"><meta itemprop="amenityFeature" content="Wedding Venue"><meta itemprop="amenityFeature" content="Conference Venue"><meta itemprop="amenityFeature" content="Vacation Packages"><meta itemprop="priceRange" content="$$$$"><div itemprop="aggregateRating" itemscope="" itemtype="http://schema.org/AggregateRating"><meta itemprop="ratingValue" content="4.5"><meta itemprop="reviewCount" content="206"></div><div itemprop="address" itemscope="" itemtype="http://schema.org/PostalAddress"><meta itemprop="streetAddress" content="80 Carolina Vista D"><meta itemprop="addressLocality" content="Pinehurst"><meta itemprop="addressRegion" content="NC"><meta itemprop="postalCode" content="28374"></div><meta itemprop="telephone" content="(855) 235-8507"> <a itemprop="url" href="https://www.pinehurst.com/"></a><meta itemprop="image" content="https://www.pinehurst.com/content/uploads/2013/07/Homepage_Mast_Mobile.jpg"></div><div style="height:0;overflow:hidden">  <script type="text/javascript">var axel = Math.random() + "";
				var a = axel * 10000000000000;
				document.write('<iframe src="https://4114412.fls.doubleclick.net/activityi;src=4114412;type=acura0;cat=endta001;dc_lat=;dc_rdid=;tag_for_child_directed_treatment=;ord=1;num=' + a + '?" width="1" height="1" frameborder="0" style="display:none"></iframe>');</script><iframe src="./pinehurst-html_files/activityi(1).html" width="1" height="1" frameborder="0" style="display:none"></iframe> <noscript> <iframe src="https://4114412.fls.doubleclick.net/activityi;src=4114412;type=acura0;cat=endta001;dc_lat=;dc_rdid=;tag_for_child_directed_treatment=;ord=1;num=1?" width="1" height="1" frameborder="0" style="display:none"></iframe> </noscript></div>
<!-- This website is like a Rocket, isn't it? Performance optimized by WP Rocket. Learn more: https://wp-rocket.me - Debug: cached@1619715263 --><iframe src="./pinehurst-html_files/pixel.html" style="display: none;"></iframe></body><iframe id="__JSBridgeIframe_1.0__" style="display: none;" src="./pinehurst-html_files/saved_resource.html"></iframe><iframe id="__JSBridgeIframe_SetResult_1.0__" style="display: none;" src="./pinehurst-html_files/saved_resource(2).html"></iframe><iframe id="__JSBridgeIframe__" style="display: none;" src="./pinehurst-html_files/saved_resource(3).html"></iframe><iframe id="__JSBridgeIframe_SetResult__" style="display: none;" src="./pinehurst-html_files/saved_resource(4).html"></iframe></html>
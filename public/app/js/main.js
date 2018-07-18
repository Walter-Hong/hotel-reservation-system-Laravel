 /*================================================
* Template Name: Zante Hotel - Hotel HTML Template
* Version: 1.0 (Initial Release)
* Author Name: Jomin Muskaj
* Author URI: eagle-themes.com
=================================================*/

(function ($) {
    "use strict";

    /*========== LOADING PAGE ==========*/
    $(window).on('load', function () {
        $("#loading").fadeOut(500);
    });

    
    /*Document is Raedy */
    $(document).ready(function () {

        /*========== SMOOTHSTATE ==========*/
        $('#smoothpage').smoothState({ 
            anchors: 'nav a',
            blacklist: 'form',                         
        });
        
        /*========== TEXT ROTATION ==========*/
        $("#text_rotating").Morphext({
            animation: "fadeInDown",
            separator: ",",
            speed: 5000,
            complete: function () {}
        });

        /*========== WOW ==========*/
        var wow = new WOW({
            boxClass: 'wow',
            animateClass: 'animated',
            offset: 0,
            mobile: true,
            live: true,
            callback: function (box) {}
        });
        wow.init();

        /*========== MENU ==========*/
        $(window).on("scroll", function () {
            
            var header = $('header')
            
            if (header.length > 0) {

                var window_height = $(this).scrollTop();
                var topmenuheight = 50;

                if (window_height > topmenuheight) {

                    if (header.hasClass("transparent"))
                        header.addClass("nav_bg");
                    // Logo
                    $(".light").addClass("nodisplay");
                    $(".dark").removeClass("nodisplay");

                    // Check if Header is fixed or not
                    if (header.hasClass('fixed')) {
                        header.addClass('navbar-fixed-top');
                    }

                    // Add scroll Class
                    header.addClass("scroll");

                } else {
                    if (header.hasClass("nav_bg"))
                        header.removeClass("nav_bg");

                    $(".dark").addClass("nodisplay");
                    $(".light").removeClass("nodisplay");

                    header.removeClass("scroll");
                    header.removeClass("navbar-fixed-top");
                }
            }
        });
        
        $(function () {
            function toggleNavbarMethod() {
                if ($(window).width() > 992) {
                    
                    $('.dropdown')
                        .on('mouseover', function () {
                            $(this).addClass('open');
                            $('b', this).toggleClass("caret caret-up");
                        })

                    .on('mouseout', function () {
                        $(this).removeClass('open');
                        $('b', this).toggleClass("caret caret-up");
                    });


                } else {
                    $('.dropdown').off('mouseover').off('mouseout');
                    $('.dropdown-toggle')

                    .on('click', function (e) {
                        $('b', this).toggleClass("caret caret-up");
                    });

                }
            }
            toggleNavbarMethod();
            $(window).on("resize", (toggleNavbarMethod));

            $(".navbar-toggle").on("click", function () {
                $(this).toggleClass("active");
            });
        });

        /*========== MOBILE MENU ==========*/
        $('.mobile_menu_btn').jPushMenu({
            closeOnClickLink: false
        });
        $('.dropdown-toggle').dropdown();

        /*========== COMMING SOON PAGE ==========*/
        $('#countdown').each(function () {
            var $this = $(this),
                finalDate = $(this).data('countdown');
            $this.countdown(finalDate, function (event) {
                $this.html(event.strftime(
                    '<div class="count_box"><div class="inner"><div class="count_number">%D</div><div class="count_text">Days</div></div></div> ' + '<div class="count_box"><div class="inner"><div class="count_number">%H</div><div class="count_text">Hours</div></div></div> ' + '<div class="count_box"><div class="inner"><div class="count_number">%M</div><div class="count_text">Minutes</div></div></div> ' + '<div class="count_box"><div class="inner"><div class="count_number">%S</div><div class="count_text">Seconds</div><div></div>'));
            });
        });
        
        /*========== REVOLUTION SLIDER ==========*/

        /* ----- Home Page 1 ----- */
        if ($("#hero").length > 0) {
            var tpj = jQuery;
            var revapi429;
            tpj(document).ready(function () {
                if (tpj("#hero").revolution == undefined) {
                    revslider_showDoubleJqueryError("#hero");
                } else {
                    revapi429 = tpj("#hero").show().revolution({
                        sliderType: "hero",
                        dottedOverlay: "none",
                        delay: 9000,
                        responsiveLevels: [1200, 992, 768, 480],
                        visibilityLevels: [1200, 992, 768, 480],
                        gridwidth: [1200, 992, 768, 480],
                        gridheight: [800, 800, 1500, 1200],
                        lazyType: "none",
                        parallax: {
                            type: "scroll",
                            origo: "enterpoint",
                            speed: 400,
                            levels: [5, 10, 15, 20, 25, 30, 35, 40, 45, 50],
                        },
                        shadow: 0,
                        spinner: "off",
                        autoHeight: "off",
                        forceFullWidth: "off",
                        disableProgressBar: "on",
                        hideSliderAtLimit: 0,
                        hideCaptionAtLimit: 0,
                        hideAllCaptionAtLilmit: 0,
                        debugMode: false,
                        fallbacks: {
                            simplifyAll: "off",
                            disableFocusListener: false,
                        }
                    });
                }
            });
        };
        
        /* ----- Home Page 2 ----- */
        if ($("#classic_slider").length > 0) {
            var tpj = jQuery;
            tpj.noConflict();
            var revapi6;
            tpj(document).ready(function () {
                if (tpj("#classic_slider").revolution == undefined) {
                    revslider_showDoubleJqueryError("#classic_slider");
                } else {
                    revapi6 = tpj("#classic_slider").show().revolution({
                        sliderType: "standard",
                        jsFileLocation: "js/",
                        sliderLayout: "auto",
                        dottedOverlay: "none",
                        delay: 9000,
                        navigation: {
                            keyboardNavigation: "on",
                            keyboard_direction: "horizontal",
                            mouseScrollNavigation: "off",
                            mouseScrollReverse: "default",
                            onHoverStop: "on",
                            touch: {
                                touchenabled: "on",
                                swipe_threshold: 75,
                                swipe_min_touches: 50,
                                swipe_direction: "horizontal",
                                drag_block_vertical: false
                            },
                            arrows: {
                                style: "hermes",
                                enable: true,
                                hide_onmobile: true,
                                hide_under: 600,
                                hide_onleave: true,
                                tmp: '<div class="tp-arr-allwrapper"><div class="tp-arr-imgholder"></div>',
                                left: {
                                    h_align: "left",
                                    v_align: "center",
                                    h_offset: 0,
                                    v_offset: 0
                                },
                                right: {
                                    h_align: "right",
                                    v_align: "center",
                                    h_offset: 0,
                                    v_offset: 0
                                }
                            }

                        },
                        responsiveLevels: [1200, 992, 768, 480],
                        visibilityLevels: [1200, 992, 768, 480],
                        gridwidth: [1200, 992, 768, 480],
                        gridheight: [750, 750, 700, 700],
                        lazyType: "none",
                        parallax: {
                            type: "scroll",
                            origo: "slidercenter",
                            speed: 2000,
                            levels: [5, 10, 15, 20, 25, 30, 35, 40, 45, 50, 55, 60, 65, 70, 75, 55]
                        },
                        shadow: 0,
                        spinner: "off",
                        stopLoop: "on",
                        stopAfterLoops: -1,
                        stopAtSlide: -1,
                        shuffle: "off",
                        autoHeight: "off",
                        hideThumbsOnMobile: "off",
                        hideSliderAtLimit: 0,
                        hideCaptionAtLimit: 0,
                        hideAllCaptionAtLilmit: 0,
                        debugMode: false,
                        fallbacks: {
                            simplifyAll: "off",
                            nextSlideOnWindowFocus: "off",
                            disableFocusListener: false,
                        }
                    });
                }
            });
        };
        
        /* ----- Home Page 3 ----- */
        if ($("#fullscreen_slider").length > 0) {
            var tpj = jQuery;
            var revapi24;
            tpj(document).ready(function () {
                if (tpj("#fullscreen_slider").revolution == undefined) {
                    revslider_showDoubleJqueryError("#fullscreen_slider");
                } else {
                    revapi24 = tpj("#fullscreen_slider").show().revolution({
                        sliderType: "standard",
                        sliderLayout: "fullscreen",
                        dottedOverlay: "none",
                        delay: 9000,
                        navigation: {
                            keyboardNavigation: "on",
                            keyboard_direction: "horizontal",
                            mouseScrollNavigation: "off",
                            mouseScrollReverse: "default",
                            onHoverStop: "off",
                            touch: {
                                touchenabled: "off",
                                swipe_threshold: 75,
                                swipe_min_touches: 1,
                                swipe_direction: "vertical",
                                drag_block_vertical: false
                            },
                            bullets: {
                                enable: true,
                                hide_onmobile: true,
                                hide_under: 1024,
                                style: "uranus",
                                hide_onleave: false,
                                direction: "vertical",
                                h_align: "right",
                                v_align: "center",
                                h_offset: 30,
                                v_offset: 0,
                                space: 20,
                                tmp: '<span class="tp-bullet-inner"></span>'
                            }
                        },
                        viewPort: {
                            enable: true,
                            outof: "wait",
                            visible_area: "80%"
                        },
                        responsiveLevels: [1200, 992, 768, 480],
                        visibilityLevels: [1200, 992, 768, 480],
                        gridwidth: [1200, 992, 768, 480],
                        lazyType: "single",
                        disableProgressBar: "on",
                        shadow: 0,
                        spinner: "off",
                        stopLoop: "on",
                        stopAfterLoops: 1,
                        stopAtSlide: 1,
                        shuffle: "off",
                        autoHeight: "off",
                        hideThumbsOnMobile: "off",
                        hideSliderAtLimit: 0,
                        hideCaptionAtLimit: 0,
                        hideAllCaptionAtLilmit: 0,
                        debugMode: false,
                        fallbacks: {
                            simplifyAll: "off",
                            nextSlideOnWindowFocus: "off",
                            disableFocusListener: false,
                        }
                    });
                }
            });
        };
        
        /* ----- Home Page 4 ----- */
        if ($("#fullscreen_hero_video").length > 0) {
            var tpj = jQuery;
            var revapi279;
            tpj(document).ready(function () {
                if (tpj("#fullscreen_hero_video").revolution == undefined) {
                    revslider_showDoubleJqueryError("#fullscreen_hero_video");
                } else {
                    revapi279 = tpj("#fullscreen_hero_video").show().revolution({
                        sliderType: "hero",
                        sliderLayout: "fullscreen",
                        dottedOverlay: "none",
                        delay: 9000,
                        navigation: {},
                        responsiveLevels: [1200, 992, 768, 480],
                        visibilityLevels: [1200, 992, 768, 480],
                        gridwidth: [1200, 992, 768, 480],
                        lazyType: "none",
                        parallax: {
                            type: "scroll",
                            origo: "slidercenter",
                            speed: 1000,
                            levels: [5, 10, 15, 20, 25, 30, 35, 40, 45, 46, 47, 48, 49, 50, 51, 55],
                        },
                        shadow: 0,
                        spinner: "off",
                        disableProgressBar: "on",
                        hideThumbsOnMobile: "off",
                        hideSliderAtLimit: 0,
                        hideCaptionAtLimit: 0,
                        hideAllCaptionAtLilmit: 0,
                        debugMode: false,
                        fallbacks: {
                            simplifyAll: "off",
                            disableFocusListener: false,
                        }
                    });
                }
            });
        };
        
        /* ----- Coming Soon ----- */
        if ($("#hero_coming_soon").length > 0) {
           var tpj = jQuery;
           var revapi279;
           tpj(document).ready(function () {
               if (tpj("#hero_coming_soon").revolution == undefined) {
                   revslider_showDoubleJqueryError("#hero_coming_soon");
               } else {
                   revapi279 = tpj("#hero_coming_soon").show().revolution({
                       sliderType: "hero",
                       jsFileLocation: "js/",
                       sliderLayout: "fullscreen",
                       dottedOverlay: "twoxtwo",
                       delay: 9000,
                       navigation: {},
                       responsiveLevels: [1200, 992, 768, 480],
                       visibilityLevels: [1200, 992, 768, 480],
                       gridwidth: [1200, 992, 768, 480],
                       gridheight: [1080, 800, 800, 800],
                       lazyType: "none",
                       parallax: {
                           type: "scroll",
                           origo: "slidercenter",
                           speed: 1000,
                           levels: [5, 10, 15, 20, 25, 30, 35, 40, 45, 46, 47, 48, 49, 50, 51, 55],
                       },
                       shadow: 0,
                       spinner: "spinner2",
                       disableProgressBar: "on",
                       hideThumbsOnMobile: "off",
                       hideSliderAtLimit: 0,
                       hideCaptionAtLimit: 0,
                       hideAllCaptionAtLilmit: 0,
                       debugMode: false,
                       fallbacks: {
                           simplifyAll: "off",
                           disableFocusListener: false,
                       }
                   });
               }
           });
        };
        
        /* ----- Event Details ----- */
        if ($("#hero_event").length > 0) {
            var tpj = jQuery;
            var revapi429;
            tpj(document).ready(function () {
                if (tpj("#hero_event").revolution == undefined) {
                    revslider_showDoubleJqueryError("#hero_event");
                } else {
                    revapi429 = tpj("#hero_event").show().revolution({
                        sliderType: "hero",
                        sliderLayout: "fullwidth",
                        dottedOverlay: "twoxtwo",
                        delay: 9000,
                        navigation: {},
                        responsiveLevels: [1200, 992, 768, 480],
                        visibilityLevels: [1200, 992, 768, 480],
                        gridwidth: [1200, 992, 768, 480],
                        gridheight: [550, 550, 550, 550],
                        lazyType: "none",
                        parallax: {
                            type: "scroll",
                            origo: "enterpoint",
                            speed: 400,
                            levels: [5, 10, 15, 20, 25, 30, 35, 40, 45, 50],
                        },
                        shadow: 0,
                        spinner: "off",
                        autoHeight: "off",
                        disableProgressBar: "on",
                        hideThumbsOnMobile: "off",
                        hideSliderAtLimit: 0,
                        hideCaptionAtLimit: 0,
                        hideAllCaptionAtLilmit: 0,
                        debugMode: false,
                        fallbacks: {
                            simplifyAll: "off",
                            disableFocusListener: false,
                        }
                    });
                }
            });
         };
        
         /* ----- Restaurant ----- */
         if ($("#hero_restaurant").length > 0) {
             var tpj = jQuery;
             var revapi429;
             tpj(document).ready(function () {
                 if (tpj("#hero_restaurant").revolution == undefined) {
                     revslider_showDoubleJqueryError("#hero_restaurant");
                 } else {
                     revapi429 = tpj("#hero_restaurant").show().revolution({
                         sliderType: "hero",
                         dottedOverlay: "twoxtwo",
                         delay: 9000,
                         responsiveLevels: [1200, 992, 768, 480],
                         visibilityLevels: [1200, 992, 768, 480],
                         gridwidth: [1200, 992, 768, 480],
                         gridheight: [550, 550, 550, 550],
                         lazyType: "none",
                         parallax: {
                             type: "scroll",
                             origo: "enterpoint",
                             speed: 400,
                             levels: [5, 10, 15, 20, 25, 30, 35, 40, 45, 50],
                         },
                         shadow: 0,
                         spinner: "off",
                         autoHeight: "off",
                         forceFullWidth: "off",
                         disableProgressBar: "on",
                         hideSliderAtLimit: 0,
                         hideCaptionAtLimit: 0,
                         hideAllCaptionAtLilmit: 0,
                         debugMode: false,
                         fallbacks: {
                             simplifyAll: "off",
                             disableFocusListener: false,
                         }
                     });
                 }
             });
         };
        
         /* ----- Spa ----- */
         if ($("#hero_spa").length > 0) {
            var tpj = jQuery;
            var revapi429;
            tpj(document).ready(function () {
                if (tpj("#hero_spa").revolution == undefined) {
                    revslider_showDoubleJqueryError("#hero_spa");
                } else {
                    revapi429 = tpj("#hero_spa").show().revolution({
                        sliderType: "hero",
                        dottedOverlay: "twoxtwo",   
                        delay: 9000,
                        responsiveLevels: [1200, 992, 768, 480],
                        visibilityLevels: [1200, 992, 768, 480], 
                        gridwidth: [1200, 992, 768, 480],
                        gridheight:[550, 550, 550, 550],
                        lazyType: "none",
                        parallax: {
                            type: "scroll",
                            origo: "enterpoint",
                            speed: 400,
                            levels: [5, 10, 15, 20, 25, 30, 35, 40, 45, 50],
                        },
                        shadow: 0,
                        spinner: "off", 
                        autoHeight: "off",
                        forceFullWidth:"off",
                        disableProgressBar: "on",
                        hideSliderAtLimit: 0,
                        hideCaptionAtLimit: 0,
                        hideAllCaptionAtLilmit: 0,
                        debugMode: false,
                        fallbacks: {
                            simplifyAll: "off",
                            disableFocusListener: false,
                        }
                    });
                }
            });
         };
        
        /*========== COUNT UP ==========*/
        var options = {
            useEasing: true,
            useGrouping: false,
            separator: ',',
            decimal: '.',
            prefix: '',
            suffix: ''
        };

        $.each($('.countup'), function () {
            var count = $(this).data('count'),
                numAnim = new CountUp(this, 0, count);

            numAnim.start();
        });

        /*========== TESTIMONIALS - OWL CAROUSEL ==========*/
        var owl = $('#testimonials_slider');
        owl.owlCarousel({
            loop: true,
            margin: 10,
            items: 1,
            nav: false,
        });

        /*========== AWESOME FEATURESS ==========*/
        var sliderId = $('#features_slider'); // Slider ID
        sliderId.owlCarousel({
            thumbs: true,
            thumbsPrerendered: true,
            items: 1,
            loop: true,
            autoplay: true,
          
            dots: false,
            nav: false,
        });

        /*========== ISOTOPE ==========*/
        $(function () {
            var $grid = $('.grid').isotope({
                itemSelector: '.g_item'
            });
            // filters
            $('.grid_filters').on('click', 'a', function (e) {
                e.preventDefault();
                var filterValue = $(this).attr('data-filter');
                $grid.isotope({
                    filter: filterValue
                });
            });
            // active class
            $('.grid_filters').each(function (i, buttonGroup) {
                var $buttonGroup = $(buttonGroup);
                $buttonGroup.on('click', 'a', function () {
                    $buttonGroup.find('.active').removeClass('active');
                    $(this).addClass('active');
                });
            });
        });
        
        /*========== GALLERY SLIDER ==========*/
        var owl = $('#gallery_slider');
        owl.owlCarousel({
            loop: true,
            nav: false,
            margin: 10,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 2
                },
                960: {
                    items: 3
                },
                1200: {
                    items: 5
                }
            }
        });

        /*========== ROOM SLIDER ==========*/
        var $sync1 = $("#slider-larg"),
            $sync2 = $("#thumbs"),
            duration = 300;

        $sync1.owlCarousel({
                items: 1,
                dots: false,
            })
            .on('changed.owl.carousel', function (e) {
                var syncedPosition = syncPosition(e.item.index);

                if (syncedPosition != "stayStill") {
                    $sync2.trigger('to.owl.carousel', [syncedPosition, duration, true]);
                }
            });

        $sync2
            .on('initialized.owl.carousel', function () {
                addClassCurrent(0);
            })
            .owlCarousel({
                dots: false,
                responsive: {
                    0: {
                        items: 4
                    },
                    600: {
                        items: 4
                    },
                    960: {
                        items: 5
                    },
                    1200: {
                        items: 6
                    }
                }
            })
            .on('click', '.owl-item', function () {
                $sync1.trigger('to.owl.carousel', [$(this).index(), duration, true]);
            });

        function addClassCurrent(index) {
            $sync2
                .find(".owl-item")
                .removeClass("active-item")
                .eq(index).addClass("active-item");
        }
        function syncPosition(index) {
            addClassCurrent(index);
            var itemsNo = $sync2.find(".owl-item").length; //total items
            var visibleItemsNo = $sync2.find(".owl-item.active").length; //visible items

            if (itemsNo === visibleItemsNo) {
                return "stayStill";
            }
            var visibleCurrentIndex = $sync2.find(".owl-item.active").index($sync2.find(".owl-item.active-item"));

            if (visibleCurrentIndex == 0 && index != 0) {
                return index - 1;
            }
            if (visibleCurrentIndex == (visibleItemsNo - 1) && index != (itemsNo - 1)) {
                return index - visibleItemsNo + 2;
            }
            return "stayStill";
        }

        /*========== ROOMS LIST - OWL CAROUSEL ==========*/
        var owl = $('.room_list_slider');
        owl.owlCarousel({
            items: 1,
            loop: true,
            dots: false,
            nav: true,
            navText: [
                "<i class='fa fa-angle-left'></i>",
                "<i class='fa fa-angle-right'></i>"
            ]
        });

        /*========== DATE PICKER ==========*/
        $('.datepicker').datepicker({
            format: "yyyy-mm-dd", //Set Date Format
            startDate: new Date(), //Set Min Date Today
            endDate: "2020-12-18", //Set Max Date
            datesDisabled: ['30/01/2018-03-18'], //Set Disabled Dates
            autoclose: true,
            todayHighlight: true,
        });

        /*========== SELECT PICKER ==========*/
        $('select').selectpicker({
            style: 'btn-select',
            size: 'auto',
            container: 'body',
        });
        if (/Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent)) {
            $('select').selectpicker('mobile');
        }

        /*========== BOOKING FORM ==========*/
        $("#booking-form, #horizontal_booking_form, #booking_form_advanced").on('submit', function (e) {
            e.preventDefault();

            //Get input field values from HTML form
            var booking_name = $("input[name=booking-name]").val();
            var booking_email = $("input[name=booking-email]").val();
            var booking_phone = $("input[name=booking-phone]").val();
            var booking_roomtype = $("select[name=booking-roomtype]").val();
            var booking_adults = $("select[name=booking-adults]").val();
            var booking_children = $("select[name=booking-children]").val();
            var booking_checkin = $("input[name=booking-checkin]").val();
            var booking_checkout = $("input[name=booking-checkout]").val();
            var booking_country = $("select[name=booking-country]").val();
            var booking_comments = $("textarea[name=booking-comments]").val();

            //Data to be sent to server
            var post_data;
            var output;
            post_data = {
                'booking_name': booking_name,
                'booking_email': booking_email,
                'booking_phone': booking_phone,
                'booking_roomtype': booking_roomtype,
                'booking_checkin': booking_checkin,
                'booking_checkout': booking_checkout,
                'booking_adults': booking_adults,
                'booking_children': booking_children,
                'booking_country': booking_country,
                'booking_comments': booking_comments
            };

            //Ajax post data to server
            $.post('email/booking.php', post_data, function (response) {

                //Response server message
                if (response.type == 'error') {
                    output = '<div class="notification error"><span class="notification-icon"><i class="fa fa-exclamation" aria-hidden="true"></i></span><span class="notification-text">' + response.text + '</span></div>';
                } else {
                    output = '<div class="notification success"><span class="notification-icon"><i class="fa fa-check" aria-hidden="true"></i></span><span class="notification-text">' + response.text + '</span></div>';

                    //If success clear inputs
                    $("input, textarea").val('');
                    $('select').val('');
                    $('select').val('').selectpicker('refresh');
                }

                $("#notification").html(output);
                $(".notification").delay(15000).queue(function (next) {
                    $(this).addClass("scale-out");
                    next();
                });
                $(".notification").on("click", function(){ 
                    $(this).addClass("scale-out");
                });

            }, 'json');

        });

        /*========== CONTACT FORM ==========*/
        $("#contact-form, #contact-form-page").on('submit', function (e) {
            e.preventDefault();

            //Get input field values from HTML form
            var user_name = $("input[name=name]").val();
            var user_phone = $("input[name=phone]").val();
            var user_email = $("input[name=email]").val();
            var user_subject = $("input[name=subject]").val();
            var user_message = $("textarea[name=message]").val();

            //Data to be sent to server
            var post_data;
            var output;
            post_data = {
                'user_name': user_name,
                'user_email': user_email,
                'user_message': user_message,
                'user_phone': user_phone,
                'user_subject': user_subject
            };

            //Ajax post data to server
            $.post('email/email.php', post_data, function (response) {

                //Response server message
                if (response.type == 'error') {
                    output = '<div class="notification error"><span class="notification-icon"><i class="fa fa-exclamation" aria-hidden="true"></i></span><span class="notification-text">' + response.text + '</span></div>';
                } else {
                    output = '<div class="notification success"><span class="notification-icon"><i class="fa fa-check" aria-hidden="true"></i></span><span class="notification-text">' + response.text + '</span></div>';

                    //If success clear inputs
                    $("input, textarea").val('');
                }

                $("#notification").html(output);
                //(".notification").addClass('scale-out').delay(1000);

                $(".notification").delay(15000).queue(function (next) {
                    $(this).addClass("scale-out");
                    next();
                });
                $(".notification").on("click", function(){ 
                    $(this).addClass("scale-out");
                });

            }, 'json');
        });

        /*========== MAGNIFIC POPUP ==========*/
        $(".magnific-popup, a[data-rel^='magnific-popup']").magnificPopup({
            type: 'image',
            mainClass: 'mfp-with-zoom', // this class is for CSS animation below

            zoom: {
                enabled: true,
                duration: 300,
                easing: 'ease-in-out',
                fixedContentPos: true,
                opener: function (openerElement) {
                    return openerElement.is('img') ? openerElement : openerElement.find('img');
                }
            },

            retina: {
                ratio: 1, // Increase this number to enable retina image support.
                replaceSrc: function (item, ratio) {
                    return item.src.replace(/\.\w+$/, function (m) {
                        return '@2x' + m;
                    });
                }
            }

        });

        $('.image-gallery').magnificPopup({
            delegate: 'a',
            type: 'image',
            fixedContentPos: true,
            gallery: {
                enabled: true
            },
            removalDelay: 300,
            mainClass: 'mfp-fade',
            retina: {
                ratio: 1,
                replaceSrc: function (item, ratio) {
                    return item.src.replace(/\.\w+$/, function (m) {
                        return '@2x' + m;
                    });
                }
            }

        });

        $('.popup-youtube, .popup-vimeo, .popup-gmaps').magnificPopup({
            type: 'iframe',
            mainClass: 'mfp-fade',
            removalDelay: 300,
            preloader: false,
            fixedContentPos: true,
        });

        /*========== POP OVER & TOOLTIP ==========*/
        $('[data-toggle="popover"]').popover();
        $('[data-toggle="tooltip"]').tooltip();

        /*========== GOOGLE MAP ==========*/
        function initialize() {
            var map;
            var panorama;
            var var_latitude = 37.8614626; // Google Map Latitude
            var var_longitude = 20.625886; // Google Map Longitude
            var pin = 'images/icons/pin.svg';

            //Map pin-window details
            var title = "Zante Hotel - Click to see";
            var hotel_name = "Zante Hotel";
            var hotel_address = "25, Navagio Zakynthos, Greece";
            var hotel_desc = "5 star deluxe Hotel";
            var hotel_more_desc = "Lorem ipsum dolor sit amet, consectetur.";

            var hotel_location = new google.maps.LatLng(var_latitude, var_longitude);
            var mapOptions = {
                center: hotel_location,
                zoom: 15,
                scrollwheel: false, 
                streetViewControl: false
            };
            map = new google.maps.Map(document.getElementById('map-canvas'),
                mapOptions);
            var contentString =
                '<div id="infowindow_content">' +
                '<p><strong>' + hotel_name + '</strong><br>' +
                hotel_address + '<br>' +
                hotel_desc + '<br>' +
                hotel_more_desc + '</p>' +
                '</div>';

            var var_infowindow = new google.maps.InfoWindow({
                content: contentString
            });

            var marker = new google.maps.Marker({
                position: hotel_location,
                map: map,
                icon: pin,
                title: title,
                maxWidth: 500
            });
            google.maps.event.addListener(marker, 'click', function () {
                var_infowindow.open(map, marker);
            });
            panorama = map.getStreetView();
            panorama.setPosition(hotel_location);
            panorama.setPov( /** @type {google.maps.StreetViewPov} */ ({
                heading: 265,
                pitch: 0
            }));

            var openStreet = document.getElementById('openStreetView');
            if (openStreet) {
                document.getElementById("openStreetView").onclick = function () {
                    toggleStreetView()
                };
            }

            function toggleStreetView() {
                var toggle = panorama.getVisible();
                if (toggle == false) {
                    panorama.setVisible(true);
                } else {
                    panorama.setVisible(false);
                }
            }
        }

        //Check if google map div exist
        if ($("#map-canvas").length > 0){
           google.maps.event.addDomListener(window, 'load', initialize);
        }

        /*========== BACK TO TOP ==========*/
        var amountScrolled = 500;
        var back_to_top = $('#back_to_top');
        $(window).on('scroll', function () {
            if ($(window).scrollTop() > amountScrolled) {
                back_to_top.addClass('active');
            } else {
                back_to_top.removeClass('active');
            }
        });
        back_to_top.on('click', function () {
            $('html, body').animate({
                scrollTop: 0
            }, 500);
            return false;
        });

    });
})(jQuery);
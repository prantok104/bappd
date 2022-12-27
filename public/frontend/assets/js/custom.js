/*
***********************************
* This file contains the script for the actual theme, this is the file you need to edit to change the look of the theme.

This files contents are outlined below >>>>

*** SEARCH EACH SECTION AS IT COMMENTS, YOU WILL GET THE RIGHT SECTION.

**************************************************
**************************************************
*** JS TABLE

 01 - PRELOADER JS
 02 - MAIN SLIDER JS
 03 - NEXT GAME TIME JS
 04 - TEAM SLIDER JS AND PRODUCT SLIDER JS
 05 - CLIENT SLIDER JS
 06 - STICKY HEADER JS
 07 - AWARD COUNTER JS
 08 - PROJECT MAGNIFIC POPUP JS
 */
(function () {
    "use strict";

    jQuery(document).ready(function () {

        //        menu hover
        //
        //        $('.header-menu-area ul li').on('click', function () {
        //            $('.header-menu-area ul li').removeClass('active');
        //            $(this).addClass('active');
        //        });

        jQuery("a[rel^='prettyPhoto']").prettyPhoto({
            theme: 'dark_square ',
            social_tools: false,
            deeplinking: false,
            allow_resize: true,
            default_width: 700,
            default_height: 544,
        });
        /*================================================
        02 - MAIN SLIDER JS
        ==================================================*/
        jQuery(".hero-slider-area").owlCarousel({
            animateOut: 'fadeOut',
            animateIn: 'fadeIn',
            loop: true,
            margin: 0,
            autoplay: true,
            autoplayHoverPause: true,
            thumbs: true,
            thumbImage: true,
            thumbsPrerendered: true,
            thumbContainerClass: 'hero-slider-thumbs',
            thumbItemClass: 'owl-thumb-item',
            nav: true,
            navText: ["<i class='fas fa-angle-left'></i>", "<i class='fas fa-angle-right'></i>"],
            dots: false,
            responsive: {
                0: {
                    items: 1
                },
                480: {
                    items: 1
                },
                600: {
                    items: 1
                },
                1000: {
                    items: 1
                },
                1200: {
                    items: 1
                }
            }
        });

        jQuery('.news-content').owlCarousel({
            loop: true,
            margin: 10,
            dots: false,
            nav: true,
            navText: ["<i class='fas fa-angle-left'></i>", "<i class='fas fa-angle-right'></i>"],
            responsive: {
                0: {
                    items: 1
                },
                480: {
                    items: 1
                },
                600: {
                    items: 1
                },
                1000: {
                    items: 2
                },
                1200: {
                    items: 2
                }
            }
        });



        /*================================================
        04 - EXPART SLIDER
        ==================================================*/
        jQuery(".speaker-area-slider").owlCarousel({
            animateOut: 'fadeOut',
            animateIn: 'fadeIn',
            loop: true,
            margin: 0,
            autoplay: true,
            autoplayTimeout: 7000,
            autoplayHoverPause: true,
            nav: true,
            navText: ["<i class='fas fa-angle-left'></i>", "<i class='fas fa-angle-right'></i>"],
            dots: false,
            items: 1,
        });


        /*================================================
        10 - BOTTOM TO TOP BUTTON JS
        ==================================================*/

        jQuery(window).scroll(function () {
            if (jQuery(this).scrollTop() >= 350) {
                jQuery('.eco-btm-to-top').fadeIn(200);
            } else {
                jQuery('.eco-btm-to-top').fadeOut(200);
            }
        });

        jQuery('.eco-btm-to-top').click(function () {
            jQuery('body,html').animate({
                scrollTop: 0
            }, 1000)
        });

        /*================================================
        11 - MOBILE MENU
        ==================================================*/
        jQuery('#mobile-menu').slicknav({
            prependTo: '.responsive-mobile-menu'
        });

        /************************************************
            02. STICKY JS
         *************************************************/
        $(window).scroll(function () {
            var sticky = $('.sticky-menu'),
                scroll = $(window).scrollTop();
            if (scroll < 120) sticky.removeClass('sticky');
            else sticky.addClass('sticky').animate({
                scrollTop: 0
            }, 1000);
        });

        /*Mobile menu*/
        $('#mobile-menu').slicknav({
            prependTo: '.responsive-mobile-menu',
            label: '',
            duration: 1000,
            easingOpen: "easeOutBounce",
        });

    });
}(jQuery));

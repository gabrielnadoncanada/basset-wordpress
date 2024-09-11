(function ($) {
    "use strict";

    /*=============================================
        =    		 Preloader			      =
    =============================================*/
    $(window).on('load', function () {
        preloader();
    });

    function preloader() {
        $('#lexendLoader').delay(0).fadeOut();
    };


    /*===========================================
        =    		Mobile Menu			      =
    =============================================*/
//SubMenu Dropdown Toggle
    if ($('.tgmenu__wrap li.menu-item-has-children ul').length) {
        $('.tgmenu__wrap .navigation li.menu-item-has-children').append('<div class="dropdown-btn"><span class="plus-line"></span></div>');
    }

//Mobile Nav Hide Show
    if ($('.tgmobile__menu').length) {

        var mobileMenuContent = $('.tgmenu__wrap .tgmenu__main-menu').html();
        $('.tgmobile__menu .tgmobile__menu-box .tgmobile__menu-outer').append(mobileMenuContent);

        //Dropdown Button
        $('.tgmobile__menu li.menu-item-has-children .dropdown-btn').on('click', function () {
            $(this).toggleClass('open');
            $(this).prev('ul').slideToggle(300);
        });
        //Menu Toggle Btn
        $('.mobile-nav-toggler').on('click', function () {
            $('body').addClass('mobile-menu-visible');
        });

        //Menu Toggle Btn
        $('.tgmobile__menu-backdrop, .tgmobile__menu .close-btn').on('click', function () {
            $('body').removeClass('mobile-menu-visible');
        });
    }
    ;


    /*=============================================
        =           Data Background             =
    =============================================*/
    $("[data-background]").each(function () {
        $(this).css("background-image", "url(" + $(this).attr("data-background") + ")")
    })


    /*=============================================
        =          Testimonial Active  =
    =============================================*/
    var testimonialThumbnail = new Swiper(".testimonial-thumb-active", {
        spaceBetween: 0,
        slidesPerView: 1,
        observer: true,
        observeParents: true,
        effect: 'fade',
        fadeEffect: {
            crossFade: true,
        },
        autoplay: {
            delay: 5000,
        },
    });
    var testimonialContent = new Swiper(".testimonial-content-active", {
        spaceBetween: 0,
        slidesPerView: 1,
        observer: true,
        observeParents: true,
        effect: 'fade',
        fadeEffect: {
            crossFade: true,
        },
        autoplay: {
            delay: 5000,
        },
        pagination: {
            el: ".testimonial-pagination",
            clickable: true,
        },
        thumbs: {
            swiper: testimonialThumbnail,
        },
    });


})(jQuery);


import './scss/main.scss';
import SimpleBar from 'simplebar';
import 'simplebar/dist/simplebar.css';
const ajaxurl = '/wp-admin/admin-ajax.php';

function updateURLParameter(url, param, paramVal) {
    let newAdditionalURL = '';
    let tempArray = url.split('?');
    const baseURL = tempArray[0];
    const additionalURL = tempArray[1];
    let temp = '';
    if (additionalURL) {
        tempArray = additionalURL.split("&");
        for (let i = 0; i < tempArray.length; i++){
            if(tempArray[i].split('=')[0] != param){
                newAdditionalURL += temp + tempArray[i];
                temp = '&';
            }
        }
    }

    const rows_txt = temp + '' + param + '=' + paramVal;
    return baseURL + '?' + newAdditionalURL + rows_txt;
}

function removeURLParameter(url){
    return url.split(/[?#]/)[0];
}

function changeUrl(parameter, id) {
    const currentUrl = window.location.href;
    window.history.replaceState('', '', updateURLParameter(currentUrl, parameter, id));
}

/* JS Start when Document Load & DOM build*/
document.addEventListener('DOMContentLoaded', ready);
function ready() {

    /* Init WOW Animation */
    const wow = new WOW({
            boxClass:     'wow',      // animated element css class (default is wow)
            animateClass: 'animated', // animation css class (default is animated)
            offset:       0,          // distance to the element when triggering the animation (default is 0)
            mobile:       true,       // trigger animations on mobile devices (default is true)
            live:         true,       // act on asynchronously loaded content (default is true)
            callback:     function(box) {
                // the callback is fired every time an animation is started
                // the argument that is passed in is the DOM node being animated
            },
            scrollContainer: null,    // optional scroll container selector, otherwise use window,
            resetAnimation: true,     // reset animation on end (default is true)
        });
    wow.init();

    /* Partners Scroll */
    const partners = document.querySelector('.js-partners');
    if (partners) {
        new SimpleBar(partners);
    }

    /* Scroll Top Button Visible */
    const scrollUpButton = document.querySelector('.js-scroll-up');
    const screenHeight = window.screen.height;
    const siteHeader = document.querySelector('.site-header');
    let siteHeaderHeight = 0;



    if (siteHeader && scrollUpButton) {
        siteHeaderHeight = siteHeader.offsetHeight;

        const headerPosition = () => {
            if (window.scrollY >= siteHeaderHeight) {
                scrollUpButton.classList.add('show');
                siteHeader.classList.add('fixed');
            } else {
                scrollUpButton.classList.remove('show');
                siteHeader.classList.remove('fixed');
            };
        }

        headerPosition();

        document.addEventListener('scroll', function () {
            headerPosition();
        });

    };

};

/* JS Start when Document Load & DOM build & All Scripts and Images Load*/
window.onload = function() {
    // console.log("test enqueue js scripts");

};

/* ==========================================================================
* jQuery Scripts
* ========================================================================== */
(function($){
    $(document).ready(function() {

        /* Burger Menu Action */
        $('.js-burger').on('click', function () {
            $(this).toggleClass('active');
            $('.header__menu-wrapper').toggleClass('active');
            $('body').toggleClass('menu-open');

            if ( $('.header__menu-wrapper').hasClass('active')) {
                $('.header__menu-wrapper').fadeIn();
            } else {
                $('.header__menu-wrapper').fadeOut();
            }
        });

        $('.page-overlay').on('click', function () {
            $('.js-burger').trigger('click');
        });

        $(window).on('resize', function() {
            if ( $('.header__menu-wrapper').hasClass('active')) {
                $('.js-burger').removeClass('active');
                $('body').removeClass('menu-open');
                $('.header__menu-wrapper').removeClass('active');
                $('.header__menu-wrapper').fadeOut();
            }
        });

        /* Sub Menu */
        $('li.menu-item').on('click',function (e) { // mouse CLICK instead of hover
            if ($('.sub-menu', this).length >=1) {
                e.preventDefault();
            }
            $('.sub-menu').slideUp('fast');
            $(this).find('.sub-menu').slideDown('fast');
            e.stopPropagation();
        });

        $(document).on('click',function () {
            $('.sub-menu').slideUp('fast');
        });

        /* Scroll Down */
        $('.js-scroll-down').on('click', function (e) {
            e.preventDefault();
            const offset = $('.site-header').outerHeight() - 2;

            const nextSection = $(this).closest('section').next();
            $('html, body').animate({ scrollTop: $(nextSection).offset().top - offset}, 1000, 'linear');
        });

        /* Scroll To Section */
        $('.js-anchor').on('click', function (e) {
            e.preventDefault();
            const anchorSection = $(this).attr('href');
            $('html, body').animate({ scrollTop: $(anchorSection).offset().top}, 1000, 'linear');
        });

        /* Latest Works Slider */
        $('.js-latest-works').slick({
            arrows: true,
            infinite: false,
            slidesToShow: 1,
            slidesToScroll: 1,
            centerMode: false,
            variableWidth: true,
            appendArrows: $('.latest-works__actions')
        });

        /* Testimonials Slider */
        $('.js-testimonials').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 2000,
            mobileFirst: true,
            arrows: false,
        });

        /* Gallery */
        $('.js-gallery').slick({
            arrows: true,
            infinite: true,
            slidesToShow: 1,
            slidesToScroll: 1,
            centerMode: false,
            variableWidth: true,
            appendArrows: $('.gallery__actions')
        });

        /* Filter Ajax Function */
        let page = 1;
        let serviceId = $('.js-service-button.active').data('id');
        let categoryId = $('.js-category-button.active').data('id');

        function ajaxProjectsFilter (serviceId, categoryId) {

            const loader = $('.js-loader');
            const projectsList = $('.projects__list');

            const data = {
                action: 'get_projects',
                service: serviceId,
                category: categoryId,
            };

            $(loader).css({display: 'flex'});
            $(projectsList).html('');
            $('.js-load-more').hide();

            $.ajax({
                url: ajaxurl,
                type: 'POST',
                data: data,
                success: function(response) {
                    const res = JSON.parse(response)
                    if (res.success) {
                        $(projectsList).html(res.data);
                    }

                    if (res.max_num_pages > page) {
                        $('.js-load-more').css({display: 'inline-flex'});
                    }
                },
                error: function (request, status, error) {
                    console.log(request, status, error);
                },
                complete: function () {
                    $(loader).hide();
                }
            });

        };

        function ajaxMoreProjectsFilter (page, serviceId, categoryId) {

            const loader = $('.js-loader');
            const projectsList = $('.projects__list');

            const data = {
                action: 'get_more_projects',
                service: serviceId,
                category: categoryId,
                page: page,
            };

            $(loader).css({display: 'flex'});
            $('.js-load-more').hide();

            $.ajax({
                url: ajaxurl,
                type: 'POST',
                data: data,
                success: function(response) {
                    const res = JSON.parse(response)
                    if (res.success) {
                        $(projectsList).append(res.data);
                    }

                    if (res.max_num_pages > page) {
                        $('.js-load-more').css({display: 'inline-flex'});
                    }
                },
                error: function (request, status, error) {
                    console.log(request, status, error);
                },
                complete: function () {
                    $(loader).hide();
                }
            });

        };

        /* Case Studies Filter */
        $('.js-service-button').on('click', function () {

            if ($(this).hasClass('active')) return;

            page = 1;

            /* Set Active Class */
            $('.js-service-button.active').removeClass('active');
            $(this).addClass('active');

            /* Reset Category Filter */
            $('.js-category-button.active').removeClass('active');
            $('.projects__category').eq(0).find('.js-category-button').addClass('active');
            changeUrl('category', 0);
            categoryId = 0;

            /* Set GET Parameters */
            serviceId = $(this).data('id');
            changeUrl('service', serviceId);

            /* Call Ajax Function */
            ajaxProjectsFilter(serviceId, categoryId);

        });

        $('.js-category-button').on('click', function () {

            if ($(this).hasClass('active')) return;

            page = 1;

            /* Set Active Class */
            $('.js-category-button.active').removeClass('active');
            $(this).addClass('active');

            /* Set GET Parameters */
            categoryId = $(this).data('id');
            changeUrl('category', categoryId);

            /* Call Ajax Function */
            ajaxProjectsFilter(serviceId, categoryId);
        });

        $('.js-load-more').on('click', function () {
            /* Call Ajax Function */
            page++
            ajaxMoreProjectsFilter(page, serviceId, categoryId);
        });

        /* File Upload */
        function addUploadButton() {
            const uploadFile = $('<li>', {
                class: 'file-upload-wrapper',
            }).appendTo('.forminator-uploaded-files');

            const uploadButton = $('<button>', {
                class: 'file-upload-button',
                type: 'button',
                text: '+'
            }).appendTo($(uploadFile));

            $(uploadButton).on('click', function () {
                $('.forminator-multi-upload').trigger('click');
            })
        }

        addUploadButton();

        $(document).on( 'forminator:form:submit:success', function() {
            addUploadButton();
        } );

        /* Accordion */
        $('.js-accordion-title').on('click', function(e) {

            e.preventDefault();
            const $this = $(this);

            if (!$this.hasClass('faq-item__button--active')) {
                $('.js-accordion-content').slideUp(400);
                $('.js-accordion-title').removeClass('faq-item__button--active');
                $('.js-accordion-arrow').removeClass('faq-item__arrow--rotate');
            }

            $this.toggleClass('faq-item__button--active');
            $this.find($('.js-accordion-arrow')).toggleClass('faq-item__arrow--rotate');
            $this.next().slideToggle();
        });

        /* Scroll Up */
        $('.js-scroll-up').on('click', function() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });

    });
})(jQuery, window);
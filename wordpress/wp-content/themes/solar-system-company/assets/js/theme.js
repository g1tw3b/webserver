jQuery(function($) {
    "use strict";

    // Superfish initialization
    $('.main-menu > ul').superfish({
        delay: 500,
        animation: { opacity: 'show', height: 'show' },
        speed: 'fast'
    });

    // Focus and blur toggle class
    $('.navbar-menubar.responsive-menu .navbar-nav').find('a').on('focus blur', function() {
        $(this).parents('ul, li').toggleClass('focus');
    });

    // Document ready function
    $(document).ready(function() {
        // Navbar toggle button
        $(".navbar-toggler").on("click", function(event) {
            if ($(this).attr('aria-expanded') == 'false') {
                $(".navbar-menubar").removeClass('active');
                $(".navbar-toggler:not(.navbar-toggler-close)").focus();
            } else {
                $(".navbar-menubar").addClass('active');
                $(".navbar-toggler.navbar-toggler-close").focus();
                event.preventDefault();
                const navMenu = document.querySelector(".navbar-menu");
                if (!navMenu) return false;

                let focusableElements = navMenu.querySelectorAll('button, [href], input, select, textarea, [tabindex]:not([tabindex="-1"])');
                const firstElement = document.querySelector(".navbar-toggler-close");
                const lastElement = focusableElements[focusableElements.length - 1];

                document.addEventListener("keydown", function(e) {
                    if (e.key === "Tab" || e.keyCode === 9) {
                        if (e.shiftKey) {
                            if (document.activeElement === firstElement) {
                                lastElement.focus();
                                e.preventDefault();
                            }
                        } else {
                            if (document.activeElement === lastElement) {
                                firstElement.focus();
                                e.preventDefault();
                            }
                        }
                    }
                });
            }
        });

        // Dropdown toggle button
        let dropdownToggle = $('.navbar-nav.main-nav .dropdown > a.nav-link');
        dropdownToggle.after('<button type="button" class="dropdown-icon"></button>');
        dropdownToggle.removeAttr('data-bs-toggle data-bs-target aria-expanded data-bs-name aria-haspopup');

        $(document).on('click', '.navbar-nav.main-nav .dropdown > button.dropdown-icon', function() {
            $(this).parent(".menu-item").toggleClass("show");
            $(this).next(".sub-menu").slideToggle();
        });

        $(window).on('resize', adjustDesktopMenu);
        adjustDesktopMenu();

        function adjustDesktopMenu() {
            if (window.matchMedia("(min-width: 992px)").matches) {
                $('.sub-menu.collapse').removeAttr('style');
            }
        }

        $(document).on('click', '.navbar-nav.main-nav .dropdown > a', function() {
            location.href = this.href;
        });

    });

    // Scroll to top button
    let scrollTopButton = $('#scrolltop');
    $(window).scroll(function() {
        if ($(window).scrollTop() > 300) {
            scrollTopButton.addClass('scroll');
        } else {
            scrollTopButton.removeClass('scroll');
        }
    });
    scrollTopButton.on('click', function(e) {
        e.preventDefault();
        $('html, body').animate({ scrollTop: 0 }, '300');
    });

    // Loading screen (preloader)
    window.addEventListener('load', function() {
        $(".loading").delay(2000).fadeOut("slow");
    });

    // Slider section
    $('#slider .owl-carousel').owlCarousel({
        loop: true,
        margin: 10,
        nav: true,
        dots: true,
        autoplay: true,
        autoplayTimeout: 5000,
        items: 1
    });

    $('#service-section .owl-carousel').owlCarousel({
        loop: true,
        margin: 30,
        nav: true,
        dots: true,
        autoplay: false,
        responsive: {
            0: {
                items: 1
            },
            768: {
                items: 2
            }
        }
    });
});

// Ensure that the title element exists before accessing its properties
document.addEventListener("DOMContentLoaded", function() {
    var titleElement = document.getElementById('section-title');
    if (titleElement) { // Check if the element exists
        var titleText = titleElement.textContent.trim();
        var lastSpaceIndex = titleText.lastIndexOf(' ');

        if (lastSpaceIndex !== -1) {
            var firstPart = titleText.substring(0, lastSpaceIndex);
            var lastWord = titleText.substring(lastSpaceIndex + 1);
            titleElement.innerHTML = firstPart + ' <span class="blue-last-word">' + lastWord + '</span>';
        }
    }
});
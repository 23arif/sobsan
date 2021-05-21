$(document).ready(function () {
    const myCarousel = document.querySelector('#carouselExampleFade');
    if (myCarousel) {
        let carousel = new bootstrap.Carousel(myCarousel, {
            interval: 5000,
            keyboard: true,
            pause: false,
            touch: true,
            wrap: true
        })
    }

    $(window).scroll(function () {
        if ($(this).scrollTop() > 200) {
            $('#btn-scroll-top').fadeIn();
        } else {
            $('#btn-scroll-top').fadeOut();
        }
    });

    $offset = $("#header").height();
    $(window).scroll(function () {
        if ($(this).scrollTop() > $offset) {
            $(".primary-header").hide(0);
            $(".secondary-header .right").addClass("d-flex");
            $("#header").addClass("sticky");
            $("body:not(.home)").css("padding-top", $offset);
        } else {
            $(".primary-header").show(0);
            $(".secondary-header .right").removeClass("d-flex");
            $("#header").removeClass("sticky");
            $("body").css("padding-top", "0");
        }
    });

    $('#btn-scroll-top').click(function () {
        $("html, body").animate({ scrollTop: 0 }, 300);
    });

    $(".search-form .block-link").click(function () {
        $(this).next(".search-input").stop(true, false, true).toggleClass("active");
    });

    $(".selected-lang").click(function () {
        $(this).parent().stop(true, false, true).toggleClass("active");
    })

    $search = $(".header-block.search");
    $(document).mouseup(e => {
        if (!$search.is(e.target) && $search.has(e.target).length === 0) {
            $(".search-input").removeClass("active");
        }
    });

    $lang = $(".header-block.lang");
    $(document).mouseup(e => {
        if (!$lang.is(e.target) && $lang.has(e.target).length === 0) {
            $lang.removeClass('active');
        }
    });

    $(".menu-toggle.outer").click(function () {
        $(".mobile-menu").addClass("active");
    });

    $(".menu-toggle.inner").click(function () {
        $(".mobile-menu").removeClass("active");
    });

    $('.cat-list .cat-item').hover(function () {
        if ($(this).find('.dropdown-wrapper').length) {
            $(this).find('.dropdown-wrapper').stop(true, false, true).toggleClass('active');
            $(this).toggleClass("active");
        }
    })

    $(".btn-general.add-cart").click(function () {
        $(this).toggleClass("active");
    })

    $('.btn-general.add-favorite, .btn-general.compare').click(function () {
        $(this).toggleClass("active")
        $(this).find('img').toggle();
    })

    $('.general .favorite, .general .compare').click(function () {
        $(this).toggleClass("active")
        $(this).find('svg').toggle();
    })

    if ($(window).width() > 991) {
        $('.banner-right img').tilt({
            glare: true,
            maxGlare: 1,
            reset: true,
        });
    }

    $("#deals .owl-carousel").owlCarousel({
        loop: false,
        rewind: true,
        margin: 24,
        dots: false,
        nav: false,
        autoplay: true,
        smartSpeed: 500,
        autoplayHoverPause: true,
        autoplayTimeout: 3000,
        responsiveClass: true,
        responsive: {
            0: {
                items: 1,
                dots: true,
            },
            768: {
                items: 2,
            },
            1200: {
                items: 3,
            },
        },
    });

    $("#videos .owl-carousel").owlCarousel({
        loop: false,
        rewind: true,
        margin: 24,
        dots: false,
        nav: false,
        autoplay: true,
        smartSpeed: 500,
        autoplayHoverPause: true,
        autoplayTimeout: 3000,
        responsiveClass: true,
        responsive: {
            0: {
                items: 2,
                dots: true,
                margin: 12,

            },
            768: {
                items: 2,
            },
            992: {
                items: 3,
            },
            1200: {
                items: 4,
            },
        },
    });

    $("#about-pg .owl-carousel").owlCarousel({
        loop: false,
        rewind: true,
        margin: 24,
        dots: false,
        nav: false,
        autoplay: true,
        smartSpeed: 500,
        autoplayHoverPause: true,
        autoplayTimeout: 3000,
        responsiveClass: true,
        responsive: {
            0: {
                items: 1,
                dots: true,
            },
            768: {
                items: 2,
            },
            1200: {
                items: 3,
            },
        },
    });

    scrollDragging(".info-container");
    scrollDragging(".btn-container");
    scrollDragging(".cart-container");

    function scrollDragging(element) {
        const slider = document.querySelector(element);
        if (slider && slider.offsetWidth < slider.scrollWidth) {
            let isDown = false;
            let startX;
            let scrollLeft;

            slider.addEventListener('mousedown', (e) => {
                isDown = true;
                slider.classList.add('active');
                startX = e.pageX - slider.offsetLeft;
                scrollLeft = slider.scrollLeft;
            });
            slider.addEventListener('mouseleave', () => {
                isDown = false;
                slider.classList.remove('active');
            });
            slider.addEventListener('mouseup', () => {
                isDown = false;
                slider.classList.remove('active');
            });
            slider.addEventListener('mousemove', (e) => {
                if (!isDown) return;
                e.preventDefault();
                const x = e.pageX - slider.offsetLeft;
                const walk = (x - startX);
                slider.scrollLeft = scrollLeft - walk;
            });
        }

    }

    $(".pr-counter .up").click(function () {
        $input = $(".pr-counter #amount");
        $max = parseInt($input.attr('max'));
        $value = parseInt($input.val());
        $value = isNaN($value) ? 0 : $value;
        $value++;
        if ($value > $max) {
            $value = $max
        }
        $input.val($value);
    })

    $(".pr-counter .down").click(function () {
        $input = $(".pr-counter #amount");
        $min = parseInt($input.attr('min'));
        $value = parseInt($input.val());
        $value = isNaN($value) ? 0 : $value;
        $value--;
        if ($value < $min) {
            $value = $min
        }
        $input.val($value);
        $input.val($value);
    })

    $(".filter-left button").click(function () {
        $(this).toggleClass("active")
    })

    $(".filter-list, .filter-grid").click(function () {

        $(".filter-list, .filter-grid").removeClass("active");
        $(this).toggleClass("active");

        if ($(".filter-list").hasClass("active")) {
            $(".grid-list-container").addClass("list");
            $(".grid-list-block").removeClass("col-sm-6 col-xl-4");
            $(".grid-list-block .product-cart").addClass("list");
            $(".cart-footer .btn-general span").text("");

        } else if ($(".filter-grid").hasClass("active")) {
            $(".grid-list-container").removeClass("list");
            $(".grid-list-block").addClass("col-sm-6 col-xl-4");
            $(".grid-list-block .product-cart").removeClass("list");
            $(".cart-footer .btn-general span").text($(".cart-footer .btn-general").data("text"));

        }
    })

    if ($(window).width() > 992) {
        $(".category-list-item").hover(function () {
            if ($(this).children(".sub-category-list").length) {
                $(this).children(".sub-category-list").stop(true, true, true).toggle(250);
                $(this).toggleClass("selected");
            }
        })
    } else {
        $(".item-container svg").click(function () {
            if ($(this).parents().next().length) {
                $(this).parent().next().stop(true, true, true).toggle(250);
                $(this).parent().parent().toggleClass("selected");
            }
        })
    }

    $(".filter-name").click(function () {
        $(this).next("div").stop(true, false, true).slideToggle(250);
        $(this).toggleClass("up");

    })

    let inputLeft = document.getElementById("input-left");
    let inputRight = document.getElementById("input-right");

    let thumbLeft = document.querySelector(".slider > .thumb.left");
    let thumbRight = document.querySelector(".slider > .thumb.right");
    let range = document.querySelector(".slider > .range");

    function setLeftValue() {
        let _this = inputLeft,
            min = parseInt(_this.min),
            max = parseInt(_this.max);

        _this.value = Math.min(parseInt(_this.value), parseInt(inputRight.value) - 1);

        let percent = ((_this.value - min) / (max - min)) * 100;

        thumbLeft.style.left = percent + "%";
        range.style.left = percent + "%";

        document.getElementById("result-min").innerHTML = _this.value;

    }

    function setRightValue() {
        let _this = inputRight,
            min = parseInt(_this.min),
            max = parseInt(_this.max);

        _this.value = Math.max(parseInt(_this.value), parseInt(inputLeft.value) + 1);

        let percent = ((_this.value - min) / (max - min)) * 100;

        thumbRight.style.right = (100 - percent) + "%";
        range.style.right = (100 - percent) + "%";
        document.getElementById("result-max").innerHTML = _this.value;
    }

    if (inputLeft && inputRight) {
        setLeftValue();
        setRightValue();

        inputLeft.addEventListener("input", setLeftValue);
        inputRight.addEventListener("input", setRightValue);

        inputLeft.addEventListener("mouseover", function () {
            thumbLeft.classList.add("hover");
        });

        inputLeft.addEventListener("mouseout", function () {
            thumbLeft.classList.remove("hover");
        });

        inputRight.addEventListener("mouseover", function () {
            thumbRight.classList.add("hover");
        });

        inputRight.addEventListener("mouseout", function () {
            thumbRight.classList.remove("hover");
        });
    }

    $(".filter-block.color .form-check-label").each(function () {
        $whiteArr = ["white", "#fff", "#ffff", "#ffffff"];
        $color = $(this).data("color");
        $(this).css("background", $color);

        if ($(this).parent().find(".form-check-input").is(":checked")) {

            if ($whiteArr.includes($color.toLowerCase())) {
                $color = "#f4f4f4"
            }

            $(this).find("span").css("border-color", $color);
        }

    })

    $(".filter-block.color .form-check-input").on("input", function () {
        $color = $(this).next().data("color");
        if ($(this).is(":checked")) {

            if ($whiteArr.includes($color.toLowerCase())) {
                $color = "#f4f4f4"
            }
            $(this).next().find("span").css("border-color", $color);
        }
    })

    let swiper = new Swiper(".mySwiper", {
        loop: true,
        spaceBetween: 10,
        slidesPerView: 4,
        freeMode: true,
        watchSlidesVisibility: true,
        watchSlidesProgress: true,
    });

    let swiper2 = new Swiper(".mySwiper2", {
        loop: true,
        spaceBetween: 10,
        // navigation: {
        //     nextEl: ".swiper-button-next",
        //     prevEl: ".swiper-button-prev",
        // },
        // pagination: {
        //     el: ".swiper-pagination",
        //     clickable: true,
        // },
        thumbs: {
            swiper: swiper,
        },
    });

    $('[data-fancybox="gallery"]').fancybox({
        loop: true,
        buttons: [
            "zoom",
            "share",
            "slideShow",
            "fullScreen",
            "download",
            "thumbs",
            "close"
        ],
    });


});

/*---------------------------------
  Ptc Bank main jQuery
---------------------------------*/

(function ($) {
    'use strict';

    // Nice Select
    $('.lang-select').niceSelect();
    $('.page-count').niceSelect();
    $('.input-select select').niceSelect();

    // Data Css js
    $("[data-background").each(function () {
        $(this).css(
            "background-image",
            "url( " + $(this).attr("data-background") + "  )"
        );
    });

    $("[data-width]").each(function () {
        $(this).css("width", $(this).attr("data-width"));
    });

    $("[data-bg-color]").each(function () {
        $(this).css("background-color", $(this).attr("data-bg-color"));
    });

    // Image Preview
    $(document).on('change', 'input[type="file"]', function (event) {
        var $file = $(this),
            $label = $file.next('label'),
            $labelText = $label.find('span'),
            labelDefault = $labelText.text();

        var fileName = $file.val().split('\\').pop(),
            tmppath = URL.createObjectURL(event.target.files[0]);

        //Check successfully selection
        if (fileName) {
            $label.addClass('file-ok').css('background-image', 'url(' + tmppath + ')');
            $labelText.text(fileName);
        } else {
            $label.removeClass('file-ok');
            $labelText.text(labelDefault);
        }
    });


    // timepicker
    if ($('timepicker').length) {
        $('input.timepicker').timepicker({});
    }

    // Multi Date Picker
    if ($('input[name="daterange').length) {
        $('input[name="daterange"]').daterangepicker({
            opens: 'left'
        }, function (start, end) {
            console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
        });
    }

    // Datepicker active
    if ($('#d_today').length) {
        (function () {
            const d_today = new Datepicker(document.querySelector('#d_today'), {
                buttonClass: 'btn',
                todayHighlight: true
            });
        })()
    }

    // For language
    $(document).on('click', '#header-lang-toggle', function (e) {
        e.stopPropagation(); // Prevent the event from bubbling up
        $(".header-lang ul").toggleClass("lang-list-open");
    });

    // Click outside handler
    $(document).on('click', function (e) {
        // Check if the click occurred outside the language toggle and its associated ul
        if (!$(e.target).closest('#header-lang-toggle').length && !$(e.target).closest('.header-lang ul').length) {
            $(".header-lang ul").removeClass("lang-list-open");
        }
        // Check if the click occurred outside the language toggle and its associated ul
        if (!$(e.target).closest('#header-language-toggle').length && !$(e.target).closest('.header-language ul').length) {
            $(".header-language ul").removeClass("lang-list-open");
        }
    });

    var odo = $('.odometer');
    odo.each(function () {
        $('.odometer').appear(function (e) {
            var countNumber = $(this).attr('data-count');
            $(this).html(countNumber);
        });
    });

    // FAQ active item
    $(document).on('click', '.select-gateway .label-radio', function () {
        $('.select-gateway .label-radio').removeClass('active');
        $(this).addClass('active');
    });


    // Language Switcher
    document.addEventListener('DOMContentLoaded', function () {
        const langToggle = document.getElementById('header-lang-toggle');
        const langList = document.getElementById('language-list');
        const langOptions = langList ? langList.querySelectorAll('a') : [];

        if (langToggle && langList) {
            langToggle.addEventListener('click', (event) => {
                event.stopPropagation();
                langList.classList.toggle('lang-list-open');
            });

            langOptions.forEach(option => {
                option.addEventListener('click', (event) => {
                    event.preventDefault();
                    const selectedLang = event.target.getAttribute('data-lang');

                    // Update the text in the toggle
                    const langTextSpan = langToggle.querySelector('.lang-text');
                    if (langTextSpan) {
                        langTextSpan.textContent = selectedLang;
                    }

                    // Remove active class from all options
                    langOptions.forEach(opt => opt.classList.remove('active'));

                    // Add active class to the selected option
                    event.target.classList.add('active');

                    // Hide the language list
                    langList.classList.remove('lang-list-open');
                });
            });

            document.addEventListener('click', (event) => {
                if (!langToggle.contains(event.target) && !langList.contains(event.target)) {
                    langList.classList.remove('lang-list-open');
                }
            });
        }
    });



})(jQuery);

(function (qualifiedName, value) {
    "use strict";

    var cookieAlert = document.querySelector(".cookiealert");
    var acceptCookies = document.querySelector(".acceptcookies");


    if (!cookieAlert) {
        return;
    }

    cookieAlert.offsetHeight;

    // Show the alert if we cant find the "acceptCookies" cookie
    if (!getCookie("acceptCookies")) {
        cookieAlert.removeAttribute("hidden");
    }

    // When clicking on the agree button, create a 1 year
    // cookie to remember user's choice and close the banner
    acceptCookies.addEventListener("click", function (qualifiedName, value) {
        setCookie("acceptCookies", true, 365);
        cookieAlert.setAttribute("hidden", value);


        // dispatch the accept event
        window.dispatchEvent(new Event("cookieAlertAccept"))
    });

    // Cookie functions from w3schools
    function setCookie(cname, cvalue, exdays) {
        var d = new Date();
        d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
        var expires = "expires=" + d.toUTCString();
        document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
    }

    function getCookie(cname) {
        var name = cname + "=";
        var decodedCookie = decodeURIComponent(document.cookie);
        var ca = decodedCookie.split(';');
        for (var i = 0; i < ca.length; i++) {
            var c = ca[i];
            while (c.charAt(0) === ' ') {
                c = c.substring(1);
            }
            if (c.indexOf(name) === 0) {
                return c.substring(name.length, c.length);
            }
        }
        return "";
    }
})();

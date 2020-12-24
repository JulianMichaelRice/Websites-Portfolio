(function() {
    var elements;
    var windowHeight;

    function init() {
        elements = document.querySelectorAll('.hidden');
        r_elements = document.querySelectorAll('.hidden-r');
        l_elements = document.querySelectorAll('.hidden-l');
        f_elements = document.querySelectorAll('.hidden-jF');
        s_elements = document.querySelectorAll('.hidden-jS');
        o_elements = document.querySelectorAll('.hidden-o');
        o2_elements = document.querySelectorAll('.hidden-o2');
        windowHeight = window.innerHeight;
        checkPosition();
    }

    function checkPosition() {
        for (var i = 0; i < elements.length; i++) {
            var element = elements[i]
            var positionFromTop = elements[i].getBoundingClientRect().top;

            if (positionFromTop - windowHeight <= 0) {
                element.classList.add('fade-in-element');
                element.classList.remove('hidden');
            }
        }
        for (var i = 0; i < r_elements.length; i++) {
            var r_element = r_elements[i]
            var positionFromTop = r_elements[i].getBoundingClientRect().top;

            if (positionFromTop - windowHeight <= 0) {
                r_element.classList.add('fade-in-element-r');
                r_element.classList.remove('hidden-r');
            }
        }
        for (var k = 0; k < l_elements.length; k++) {
            var l_element = l_elements[k]
            var positionFromTop = l_elements[k].getBoundingClientRect().top;

            if (positionFromTop - windowHeight <= 0) {
                l_element.classList.add('fade-in-element-l');
                l_element.classList.remove('hidden-l');
            }
        }
        for (var k = 0; k < f_elements.length; k++) {
            var f_element = f_elements[k]
            var positionFromTop = f_elements[k].getBoundingClientRect().top;

            if (positionFromTop - windowHeight <= 0) {
                f_element.classList.add('jump-in-element-f');
                f_element.classList.remove('hidden-jF');
            }
        }
        for (var k = 0; k < s_elements.length; k++) {
            var s_element = s_elements[k]
            var positionFromTop = s_elements[k].getBoundingClientRect().top;

            if (positionFromTop - windowHeight <= 0) {
                s_element.classList.add('jump-in-element-s');
                s_element.classList.remove('hidden-jS');
            }
        }
        for (var o = 0; o < o_elements.length; o++) {
            var o_element = o_elements[o]
            var positionFromTop = o_elements[o].getBoundingClientRect().top;

            if (positionFromTop - windowHeight <= 0) {
                o_element.classList.add('opac');
                o_element.classList.remove('hidden-o');
            }
        }
        for (var o2 = 0; o2 < o2_elements.length; o2++) {
            var o2_element = o2_elements[o2]
            var positionFromTop = o2_elements[o2].getBoundingClientRect().top;

            if (positionFromTop - windowHeight <= 0) {
                o2_element.classList.add('opac2');
                o2_element.classList.remove('hidden-o2');
            }
        }
    }

    window.addEventListener('scroll', checkPosition);
    window.addEventListener('resize', init);

    init();
    checkPosition();
})();

// ToDo: Refactor after the deadline lol
function activateQuote(quote) {
    setTimeout(function() {
        // quote = quote.toUpperCase();
        $("#leftQuote").removeClass('fade-out-element');
        $("#leftQuote").html(quote);
        var classList = $('#leftQuote').attr('class').split(/\s+/);
        $.each(classList, function(index, item) {
            if (item === 'hidden-jS') {
                $("#leftQuote").removeClass('hidden-jS');
                $("#leftQuote").addClass('jump-in-element-s');
            }
            if (item === 'jump-in-element-s') {
                $("#leftQuote").removeClass('jump-in-element-s');
                $("#leftQuote").addClass('hidden-jS');
            }
        });
        setTimeout(function() {
            var classList = $('#leftQuote').attr('class').split(/\s+/);
            $.each(classList, function(index, item) {
                if (item === 'hidden-jS') {
                    $("#leftQuote").removeClass('hidden-jS');
                    $("#leftQuote").addClass('jump-in-element-s');
                }
                if (item === 'jump-in-element-s') {
                    $("#leftQuote").removeClass('jump-in-element-s');
                    $("#leftQuote").addClass('fade-out-element');
                    setTimeout(function() { $("#leftQuote").addClass('hidden-jS'); $("#leftQuote").removeClass('fade-out-element'); }, 1000)
                }
            });
        }, 4000)
    }, 200)
}
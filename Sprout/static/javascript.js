(function() {
    var elements;
    var windowHeight;

    function init() {
        elements = document.querySelectorAll('.hidden');
        r_elements = document.querySelectorAll('.hidden-r');
        l_elements = document.querySelectorAll('.hidden-l');
        f_elements = document.querySelectorAll('.hidden-jF');
        s_elements = document.querySelectorAll('.hidden-jS');
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
    }

    window.addEventListener('scroll', checkPosition);
    window.addEventListener('resize', init);

    init();
    checkPosition();
})();
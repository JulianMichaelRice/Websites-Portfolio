// -------------------------------------
// ENTROPIA-ONLY
const Events = Object.freeze({ LootiusMayhem: 0, GoldGrinder: 1 });
eventDict = {
    [Events.LootiusMayhem]: "lootiusMayhem.png",
    [Events.GoldGrinder]: "goldGrinder.png"
}

const nav = `<div class="text-right" style="margin-bottom: -24px"><li id="currentEvent" class="nav-item"></li></div>
<div class="cover">
  <ul class="nav justify-content-center comeDown">
      <li class="nav-item"><a class="nav-link" href="index.html"><img src="img/logo-w.png" height="50px"></a></li>
      <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle highlight" href="lootius.html" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Lootius Mayhem
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <div class="nav-item dropright">
              <a class="nav-link dropdown-item dropdown-toggle highlight" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: white;">How to Participate</a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="lootius.html">Rules</a>
                <a class="dropdown-item" href="classes.html">Character Classes</a>
                <a class="dropdown-item" href="prizes.html">Prize Pool</a>
                <a class="dropdown-item" href="https://www.entropiagold.com/register">Register</a>
              </div>
            </div>
            <a class="dropdown-item" href="leaderboard.html">Leaderboard</a>
            <a class="dropdown-item" href="bonuses.html">HSL Bonuses</a>
            <a class="dropdown-item" href="https://www.youtube.com/watch?v=ELQIgdgROVA" target="_blank">Teaser Trailer</a>
            <a class="dropdown-item" href="hof.html">Hall of Fame</a>
          </div>
      </li>
      <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle highlight" href="goldGrinder.html" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            GoldGrinder
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="goldGrinder.html">How to Participate</a>
            <a class="dropdown-item" href="goldGrinderJackpots.html">Progressive Jackpots</a>
            <a class="dropdown-item" href="goldGrinderWinners.html">Bonus Winners</a>
            <a class="dropdown-item" href="goldGrinderRewards.html">My Rewards</a>
          </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle highlight" href="areas.html" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Land Areas
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" href="areas.html">Deino Island</a>
        <a class="dropdown-item" href="areas.html">OLA#02 Atrox Paradise</a>
        <a class="dropdown-item" href="areas.html">OLA#30 Bibo n' Bery Stalkers</a>
        <a class="dropdown-item" href="areas.html">OLA#50 That Freaking Cold Place</a>
        </div>
      </li>
      <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle highlight" href="mission.html" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            About
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="mission.html">Mission Statement</a>
            <a class="dropdown-item" href="mystory.html">My Story</a>
            <a class="dropdown-item" href="eula.html">EULA 2.1 Compliance</a>
          </div>
      </li>
  </ul>
</div>`

if (document.getElementById('entropiaNav') !== null) {
    document.getElementById("entropiaNav").innerHTML = nav;
}
if (document.getElementById('currentEvent') !== null) {
    document.getElementById("currentEvent").innerHTML = `<img class="activeEvent" src="logo/${eventDict[Events.GoldGrinder]}">`;
}
//---------------------------------------
const $dropdown = $(".dropdown");
const $dropdownToggle = $(".dropdown-toggle");
const $dropdownMenu = $(".dropdown-menu");
const showClass = "show";

$(window).on("load resize", function() {
    if (this.matchMedia("(min-width: 768px)").matches) {
        $dropdown.hover(
        function() {
            const $this = $(this);
            $this.addClass(showClass);
            $this.find($dropdownToggle).attr("aria-expanded", "true");
            $this.find($dropdownMenu).addClass(showClass);
        },
        function() {
            const $this = $(this);
            $this.removeClass(showClass);
            $this.find($dropdownToggle).attr("aria-expanded", "false");
            $this.find($dropdownMenu).removeClass(showClass);
        }
        );
    } else {
        $dropdown.off("mouseenter mouseleave");
    }
});

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
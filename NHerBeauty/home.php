<?php 
    session_start();
    if (isset($_SESSION['notification'])) {
      if ($_SESSION['notification'] == "OK") {
        $_SESSION['notification'] = "NO";
      }
    }
    require_once 'pdoconfig.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Assistant -->
    <link href="https://fonts.googleapis.com/css2?family=Assistant:wght@200;600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Martel:wght@200;700&family=Nothing+You+Could+Do&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Satisfy&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Italianno&display=swap" rel="stylesheet">

    <link rel="icon" href="img/nav<?php if (isset($_SESSION['Username'])) { ?>-g<?php } ?>.png">
    <!-- This following line is only necessary in the case of using the option `scrollOverflow:true` -->
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/animate.css/3.2.0/animate.min.css">
    <?php if (isset($_SESSION['Username'])) { ?>
        <link rel='stylesheet' href='styles-x.css'>
    <?php } else { ?>
        <link rel='stylesheet' href='styles.css'>
    <?php } ?>
    <title>NHerBeauty | Official Website</title>
  </head>
  <body style="background-color: #111111">
    <!-- MODAL STARTS -->
    <div id="animatedModal">
        <div class="modal-content frame" style="height: 100vh;">
          <img src="img/logo-canvas<?php if (isset($_SESSION['Username'])) { ?>-g<?php } ?>.png" class="image-centered-v hidden-o">
          <div class="close-animatedModal bottom-center"> 
          <a href="" class="enter-site hidden-o2" onclick="loadPopUp()"><?php if (isset($_SESSION['Username'])) { ?>Welcome Back<?php } else { ?>Enter Site<?php } ?></a>
          </div>
        </div>
    </div>
    <div id='container' style='display:none;'>
    <div class="text-center hidden-o"><img src="img/logo<?php if (isset($_SESSION['Username'])) { ?>-g<?php } ?>.png" width="250px;"></div>
    <!-- Nav -->
    <div class="hidden-o2" style="margin-top: -25px; z-index: 10;">
        <ul class="nav justify-content-center">
            <li class="nav-item">
                <a class="nav-link" href="#">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="blog">Blog</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="beauty-lounge" >The Beauty Lounge</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="shop">Shop</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="services">Services</a>
            </li>
        </ul>
    </div>

    <div class="login">
      <ul class="nav">
        <?php if (isset($_SESSION['Username'])) { ?>
        <li class="nav-item mr-2">
          <a class="nav-link" href="logout">Logout</a>
        </li> 
        <?php } ?>
        <?php if (!isset($_SESSION['Username'])) { ?>
        <li class="nav-item my-2 my-sm-0">
          <a class="nav-link" href="" data-toggle="modal" data-target="#loginModal">Login</a>
        </li> 
        <?php } ?>
      </ul>
    </div>

    <?php if (isset($_SESSION['errors'])): ?>
        <?php foreach ($_SESSION['errors'] as $error): ?>
        <p class="text-center" style="color: red;"><?php echo $error ?></p>
        <?php endforeach; ?>
    <?php endif; ?>

    <!-- Initial Modal -->
    <div class="modal fade" id="popup" tabindex="-1" role="dialog" aria-labelledby="popupTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-body">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <img src="img/nav<?php if (isset($_SESSION['Username'])) { ?>-g<?php } ?>.png" class="d-block mr-auto ml-auto" width="100px">
            <div class="spacer-s"></div>
            <p class="text-center italian">Make NHerBeauty part of your daily routine, sign up to receive motivational messages and updates to keep you going throughout the week and receive 20% off your next order!</p>
            <!-- ?? -->
            <div class="spacer-s"></div>
            <div id="mc_embed_signup2" class="hidden-o">
              <form action="https://nherbeauty.us10.list-manage.com/subscribe/post?u=582ecd78cc0d65ab6af717df5&amp;id=b87499b254" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
                <div id="mc_embed_signup_scroll2" class="row text-center">
                  <div class="mc-field-group col-md-4 col-12 hidden-l">
                    <label for="mce-FNAME">First Name</label><br>
                    <input type="text" value="" name="FNAME" class="required" id="mce-FNAME">
                  </div>
                  <div class="mc-field-group col-md-4 col-12 hidden">
                    <label for="mce-LNAME">Last Name</label><br>
                    <input type="text" value="" name="LNAME" class="required" id="mce-LNAME">
                  </div>
                  <div class="mc-field-group col-md-4 col-12 hidden-r">
                    <label for="mce-EMAIL">Email Address</label><br>
                    <input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL">
                  </div>
                  <div id="mce-responses2" class="clear">
                    <div class="response" id="mce-error-response" style="display:none"></div>
                    <div class="response" id="mce-success-response" style="display:none"></div>
                  </div>    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                  <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_582ecd78cc0d65ab6af717df5_b87499b254" tabindex="-1" value=""></div>
                  <div class="clear col-12 hidden"><input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe2" class="btn quick spacer-m d-block mr-auto ml-auto"></div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Home -->
    <div class="container-fluid">
      <div class="spacer-s"></div>
      <!-- <div class="spacer-l"></div>
      <div class="parallax cover-mid hidden-o">
        <img src="img/logo.png" width="600px;" class="centered">
      </div> -->

      <div id="indicators" class="carousel hidden-o2 slide w-100 d-block ml-auto mr-auto" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#indicators" data-slide-to="0" class="active"></li>
          <li data-target="#indicators" data-slide-to="1"></li>
          <li data-target="#indicators" data-slide-to="2"></li>
          <li data-target="#indicators" data-slide-to="3"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="carousel-bg1 parallax d-flex justify-content-center align-items-center">
              <h3 class="text-center lit-text"><i>"Discovering our beauty inwards and emanating it outwards"</i></h3>
            </div>
          </div>
          <div class="carousel-item">
            <div class="carousel-bg2 parallax d-flex justify-content-center align-items-center">
              <h3 class="text-center lit-text"><i>Fashion to fit your force</i></h3>
              <a href="shop" class="quick quick60 lit-text" style="margin-top: -15px;">Shop Now</a>
            </div>
          </div>
          <div class="carousel-item">
            <div class="carousel-bg3 parallax d-flex justify-content-center align-items-center">
              <h3 class="text-center lit-text"><i>Blog of the Week</i></h3>
              <a href="blog" class="quick quick60 lit-text" style="margin-top: -15px;">Read Now</a>
            </div>
          </div>
          <div class="carousel-item">
            <div class="carousel-bg4 parallax d-flex justify-content-center align-items-center">
              <h3 class="text-center lit-text"><i>
                <?php if (!isset($_SESSION['Username'])) { ?>
                  Become a Lady of The Beauty Lounge today</i></h3>
                <?php } else { ?>
                  Thank you for being a part of the Beauty Lounge</i></h3>
                <?php } ?>
              <a href="beauty-lounge" class="quick quick60 lit-text" style="margin-top: -15px;">
                <?php if (!isset($_SESSION['Username'])) { ?>
                  Sign Me Up!</i></h3>
                <?php } else { ?>
                  Visit the Lounge</i></h3>
                <?php } ?></a>
            </div>
          </div>
        </div>
        <a class="carousel-control-prev" href="#indicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#indicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
      <div class="container">
        <p class="text-center hidden spacer-l" style="font-size: 30px;">There is nothing like the solidarity of sisterhood amongst women. Welcome to a community focused on all things self love and internal transformation with the support to esteem one another, correct one another, and empower one another. We dare every woman to brazenly walk NHerBeauty.</p>
      </div>

      <div id="customers" class="carousel hidden-o2 slide w-100 d-block ml-auto mr-auto" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#customers" data-slide-to="0" class="active"></li>
          <li data-target="#customers" data-slide-to="1"></li>
          <li data-target="#customers" data-slide-to="2"></li>
          <li data-target="#customers" data-slide-to="3"></li>
          <li data-target="#customers" data-slide-to="4"></li>
          <li data-target="#customers" data-slide-to="5"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="carousel-bg1 parallax d-flex justify-content-center align-items-center">
              <h3 class="text-center lit-text container"><i>“I always felt like there were no women like me in my age group (fresh out of college) who’s primary focus right now was to get right within. NHerBeauty made me feel like I was welcomed into an exclusive group of young women exactly like me”</i><br>- Dana H.</h3>
            </div>
          </div>
          <div class="carousel-item">
            <div class="carousel-bg1 parallax d-flex justify-content-center align-items-center">
              <h3 class="text-center lit-text container"><i>“I love being apart of the Beauty Lounge. Nyah is the most down to earth person and really makes you feel like your journey is her journey as well.”</i><br>- Leandra G.</h3>
            </div>
          </div>
          <div class="carousel-item">
            <div class="carousel-bg1 parallax d-flex justify-content-center align-items-center">
              <h3 class="text-center lit-text container italian"><i>“Such a real brand, addressing real topics. Even the topics that are commonly avoided.”</i><br>- Anonymous</h3>
            </div>
          </div>
          <div class="carousel-item">
            <div class="carousel-bg1 parallax d-flex justify-content-center align-items-center">
              <h3 class="text-center lit-text container"><i>“The Beauty Lounge gave me sisters I never had. We’ll be in there laughing one minute then crying the next. To be in a room where the respect for one another is mutual and our goals are similar is such a breath of fresh air”</i><br>- Ciara P.</h3>
            </div>
          </div>
          <div class="carousel-item">
            <div class="carousel-bg1 parallax d-flex justify-content-center align-items-center">
              <h3 class="text-center lit-text container"><i>“I look forward to my solo consultations with Nyah. It feels like a free flowing conversation, nothing is forced or comes off as inauthentic. My self awareness has increased and I actually enjoy doing the work needed to find my best self.”</i><br>- Anonymous</h3>
            </div>
          </div>
          <div class="carousel-item">
            <div class="carousel-bg1 parallax d-flex justify-content-center align-items-center">
              <h3 class="text-center lit-text container"><i>“I wear my NHerBeauty shirts when I need a reminder of how amazing I am!”</i><br>- Ana S.</h3>
            </div>
          </div>
        </div>
        <a class="carousel-control-prev" href="#customers" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#customers" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
      <div class="spacer-x"></div>
    </div>

    <!-- Form: Registration --> 
    <div class="spacer-m" id="register"></div>
    
    <div class="container">
      <h3 class="text-center hidden-o">Subscribe to our mailing list!</h3>
      <p class="text-center hidden-o">Make NHerBeauty part of your daily routine, sign up to receive motivational messages and updates to keep you going throughout the week and receive 20% off your next order</p>
    </div>
    <!-- Begin Mailchimp Signup Form -->
    <div id="mc_embed_signup" class="hidden-o">
      <form action="https://nherbeauty.us10.list-manage.com/subscribe/post?u=582ecd78cc0d65ab6af717df5&amp;id=b87499b254" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
        <div id="mc_embed_signup_scroll" class="row">
          <div class="mc-field-group col-md-3 col-12 hidden-l">
            <label for="mce-FNAME">First Name</label><br>
            <input type="text" value="" name="FNAME" class="required" id="mce-FNAME">
          </div>
          <div class="mc-field-group col-md-3 col-12 hidden">
            <label for="mce-LNAME">Last Name</label><br>
            <input type="text" value="" name="LNAME" class="required" id="mce-LNAME">
          </div>
          <div class="mc-field-group col-md-3 col-12 hidden-r">
            <label for="mce-EMAIL">Email Address</label><br>
            <input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL">
          </div>
          <div id="mce-responses" class="clear">
            <div class="response" id="mce-error-response" style="display:none"></div>
            <div class="response" id="mce-success-response" style="display:none"></div>
          </div>    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
          <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_582ecd78cc0d65ab6af717df5_b87499b254" tabindex="-1" value=""></div>
          <div class="clear col-12 hidden "><input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="btn quick spacer-m d-block mr-auto ml-auto"></div>
        </div>
      </form>
    </div>
    <!--End mc_embed_signup-->
    <div class="spacer-m"></div>

    <div class="spacer-x"></div>
    <h4 class="text-center hidden">Contact</h4>
    <div class="text-center d-flex justify-content-center">
      <a href="https://m.facebook.com/nherbeauty.co" target="_blank"><img src="img/icon_fb<?php if (isset($_SESSION['Username'])) { ?>-g<?php } ?>.png" class="smedia hidden-l"></a>
      <a href="https://www.instagram.com/nherbeauty.co/?hl=en" target="_blank"><img src="img/icon_insta<?php if (isset($_SESSION['Username'])) { ?>-g<?php } ?>.png" class="smedia hidden"></a>
      <a href="mailto:nherbeauty.co@gmail.com" target="_blank"><img src="img/icon_email<?php if (isset($_SESSION['Username'])) { ?>-g<?php } ?>.png" class="smedia hidden-r"></a>
      <div class="spacer-m"></div>
    </div>

    <?php if (isset($_SESSION['errors'])): ?>
        <?php foreach ($_SESSION['errors'] as $error): ?>
        <p class="text-center" style="color: red;"><?php echo $error ?></p>
        <?php endforeach; ?>
    <?php endif; ?>

    <div class="spacer-x"></div>

    <!-- Login Modal -->
    <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-body">
            <h5 class="text-center">Login</h5>
            <form action="login" method="post">
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-light display-center">Login</button>
            </form>
          </div>
        </div>
      </div>
    </div>
    <div id="front" href="#animatedModal"></div>
    </div>

    <!-- Code -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://js.stripe.com/v2/"></script>
    <script src="animatedModal.min.js"></script>
    <script src="javascript.js" type="text/javascript"></script>
    <script>
      $("#front").animatedModal(); //initialize animatedModal
      $("#front").click(); //triggers opening of Modal.
      $(".close-animatedModal").on( "click", function() {
          $("#container").show();
      });
    </script>
    <script>
      $('#fillprofile').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var category = button.data('category')
        var time = button.data('time')
        var modal = $(this)
        modal.find('#cat').val(category)
        modal.find('#tim').val(time)
      })
    </script>
    <script>
      function priority(id, onOff) {
        var allBlogPosts = document.getElementsByClassName("hoverer");
        var i = 0;
        var focusSet = onOff == 'on' ? "1" : "0";
        for (i = 0; i < allBlogPosts.length; i++) {
          if (i == id) {
            allBlogPosts[i].style.zIndex = focusSet;
          } else {
            allBlogPosts[i].style.zIndex = "0";
          }
        }
      }
    </script>
    <script>
      function loadPopUp() {
        var timeoutID = window.setTimeout(function() {
          $('#popup').modal();
        }, 1300);
      }
    </script>
  </body>
</html>
<?php 
    session_start();
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
    <link rel="icon" href="img/nav.png">
    <!-- This following line is only necessary in the case of using the option `scrollOverflow:true` -->
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/animate.css/3.2.0/animate.min.css">
    <link rel="stylesheet" href="styles.css">
    <title>NHerBeauty | Official Website</title>
  </head>
  <body style="background-color: #111111">
    <!-- MODAL STARTS -->
    <div id="animatedModal">
        <div class="modal-content frame" style="height: 100vh;">
          <img src="img/logo-canvas.png" class="image-centered-v hidden-o">
          <div class="close-animatedModal bottom-center"> 
            <a href="" class="enter-site hidden-o2" onclick="loadPopUp()">Enter Site</a>
          </div>
        </div>
    </div>
    <div id='container' style='display:none;'>
    <!-- Nav -->
    <div class="hidden-o2">
        <ul class="nav justify-content-center">
            <li class="nav-item">
                <a class="nav-link" href="#">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="blog">Blog</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#login" data-toggle="modal" data-target="#loginModal">The Beauty Lounge</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="shop">Shop</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="services">Services</a>
            </li>
        </ul>
    </div>

    <!-- Initial Modal -->
    <div class="modal fade" id="popup" tabindex="-1" role="dialog" aria-labelledby="popupTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-body">
            <div class="spacer-s"></div>
            <h3 class="text-center">Receive special messages and stay up to date! Spin the wheel of fortune and win prizes when you sign up with your email or phone number!</h3>
            <!-- ?? -->
            <div class="spacer-s"></div>
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
              <h4 class="text-center lit-text"><i>"Discovering our beauty inwards and emanating it outwards"</i></h4>
            </div>
          </div>
          <div class="carousel-item">
            <div class="carousel-bg2 parallax d-flex justify-content-center align-items-center">
              <h4 class="text-center lit-text"><i>Fashion to fit your force</i></h4>
              <a href="shop" class="quick quick60 lit-text">Shop Now</a>
            </div>
          </div>
          <div class="carousel-item">
            <div class="carousel-bg3 parallax d-flex justify-content-center align-items-center">
              <h4 class="text-center lit-text"><i>Blog of the Week</i></h4>
              <a href="blog" class="quick quick60 lit-text">Watch Now</a>
            </div>
          </div>
          <div class="carousel-item">
            <div class="carousel-bg4 parallax d-flex justify-content-center align-items-center">
              <h4 class="text-center lit-text"><i>Become a Lady of The Beauty Lounge today</i></h4>
              <a href="#register" class="quick quick60 lit-text">Sign Me Up!</a>
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
        <p class="text-center hidden spacer-l">There is nothing like the solidarity of sisterhood amongst women. Welcome to a community focused on all things self love and internal transformation with the support to esteem one another, correct one another, and empower one another. We dare every woman to brazenly walk NHerBeauty.</p>
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
              <h4 class="text-center lit-text container"><i>“I always felt like there were no women like me in my age group (fresh out of college) who’s primary focus right now was to get right within. NHerBeauty made me feel like I was welcomed into an exclusive group of young women exactly like me”</i></h4>
            </div>
          </div>
          <div class="carousel-item">
            <div class="carousel-bg1 parallax d-flex justify-content-center align-items-center">
              <h4 class="text-center lit-text container"><i>“I love being apart of the Beauty Lounge. Nyah is the most down to earth person and really makes you feel like your journey is her journey as well.”</i></h4>
            </div>
          </div>
          <div class="carousel-item">
            <div class="carousel-bg1 parallax d-flex justify-content-center align-items-center">
              <h4 class="text-center lit-text container"><i>“Such a real brand, addressing real topics. Even the topics that are commonly avoided.”</i></h4>
            </div>
          </div>
          <div class="carousel-item">
            <div class="carousel-bg1 parallax d-flex justify-content-center align-items-center">
              <h4 class="text-center lit-text container"><i>“The Beauty Lounge gave me sisters I never had. We’ll be in there laughing one minute then crying the next. To be in a room where the respect for one another is mutual and our goals are similar is such a breath of fresh air”</i></h4>
            </div>
          </div>
          <div class="carousel-item">
            <div class="carousel-bg1 parallax d-flex justify-content-center align-items-center">
              <h4 class="text-center lit-text container"><i>“I look forward to my solo consultations with Nyah. It feels like a free flowing conversation, nothing is forced or comes off as inauthentic. My self awareness has increased and I actually enjoy doing the work needed to find my best self.”</i></h4>
            </div>
          </div>
          <div class="carousel-item">
            <div class="carousel-bg1 parallax d-flex justify-content-center align-items-center">
              <h4 class="text-center lit-text container"><i>“I wear my NHerBeauty shirts when I need a reminder of how amazing I am!”</i></h4>
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
    <div class="container form-container hidden-o">
        <h1 class="text-center">Sign Up</h1>
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10 display-center">
                <form action="registration.php" method="post">
                    <div class="form-row">
                        <div class="col">
                            <label>Username</label>
                            <input type="text" name="user" class="form-control" required>
                        </div>
                        <div class="col">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>
                    </div>
                    <div class="spacer-m"></div>
                    <div class="form-row">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>
                    <div class="spacer-m"></div>
                    <div class="form-row">
                        <button type="submit" class="btn btn-light display-center">Sign Up</button>
                    </div>
                </form>
            </div>
            <div class="col-md-1"></div>
        </div>
    </div>

    <div class="spacer-x"></div>
    <h4 class="text-center hidden">Contact</h4>
    <div class="text-center d-flex justify-content-center">
      <a href="" target="_blank"><img src="img/icon_fb.png" class="smedia hidden-l"></a>
      <a href="" target="_blank"><img src="img/icon_insta.png" class="smedia hidden"></a>
      <a href="" target="_blank"><img src="img/icon_email.png" class="smedia hidden-r"></a>
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
            <form action="validation.php" method="post">
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" name="user" class="form-control" required>
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
    <!-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> -->
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
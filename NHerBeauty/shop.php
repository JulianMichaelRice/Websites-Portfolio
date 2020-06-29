<?php 
    session_start();
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
  <body id="container">
  <div class="text-center hidden-o"><img src="img/logo<?php if (isset($_SESSION['Username'])) { ?>-g<?php } ?>.png" width="250px;"></div>
    <!-- Nav -->
    <div class="hidden-o2" style="margin-top: -40px; z-index: 10;">
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

    <!-- Home -->
    <div class="spacer-s"></div>

    <!-- Login Modal -->
    <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-body">
            <h5 class="text-center">Login</h5>
            <form action="login" method="post">
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

    <!-- Shop -->
    <div class="container-fluid">
      <div class="spacer-s"></div>
      <div class="parallax cover-tall bg1 hidden-o"></div>
      <div class="spacer-s"></div>
      <h1 class="text-center hidden-o">Shop</h1>
      <div class="spacer-s"></div>
      <div class="row">
        <div class="col-md-4 col-12 display-center hidden-l">
          <!-- Shop Item Entry -->
          <img src="img/shop/logo_white.jpg" width="100%" class="shop">
          <div class="spacer-s"></div>
          <h5 class="text-center">NHerBeauty Logo Tee (White)</h5>
          <p class="text-center">$25</p>
          <a href="https://nherbeauty.myshopify.com/products/nherbeauty-tee-white" target="_blank" class="quick display-center">Buy Now</a>
        </div>
        <div class="col-md-4 col-12 display-center hidden-r">
          <img src="img/shop/logo_black.jpg" width="100%" class="shop">
          <div class="spacer-s"></div>
          <h5 class="text-center">NHerBeauty Logo Tee (Black)</h5>
          <p class="text-center">$25</p>
          <a href="https://nherbeauty.myshopify.com/products/nherbeauty-tee-black" target="_blank" class="quick display-center">Buy Now</a>
        </div>
      </div>
      <div class="row spacer-m">
        <div class="col-md-4 col-12 display-center hidden-l">
          <img src="img/shop/empowered_grey.jpg" class="shop" width="100%">
          <div class="spacer-s"></div>
          <h5 class="text-center">Empowered Tee (Faded Black)</h5>
          <p class="text-center">$25</p>
          <a href="https://nherbeauty.myshopify.com/products/empowered-tee-faded-black" target="_blank" class="quick display-center">Buy Now</a>
        </div>
        <div class="col-md-4 col-12 display-center hidden-r">
          <!-- Shop Item Entry -->
          <img src="img/shop/empowered_orange.jpg" class="shop" width="100%">
          <div class="spacer-s"></div>
          <h5 class="text-center">Empowered Tee (Faded Orange)</h5>
          <p class="text-center">$25</p>
          <a href="https://nherbeauty.myshopify.com/products/empowered-tee-faded-orange" target="_blank" class="quick display-center">Buy Now</a>
        </div>
      </div>
      <div class="row spacer-m">
        <div class="col-md-4 col-12 display-center hidden">
          <img src="img/shop/glow_red.jpg" class="shop" width="100%">
          <div class="spacer-s"></div>
          <h5 class="text-center">Glow Up Tee (Red)</h5>
          <p class="text-center">$25</p>
          <a href="https://nherbeauty.myshopify.com/products/glow-up-tee-red" target="_blank" class="quick display-center">Buy Now</a>
        </div>
        <div class="col-md-4 col-12 display-center hidden">
          <img src="img/shop/glow_white.jpg" width="100%" class="shop">
          <div class="spacer-s"></div>
          <h5 class="text-center">Glow Up Tee (White)</h5>
          <p class="text-center">$25</p>
          <a href="https://nherbeauty.myshopify.com/products/glow-up-tee-white" target="_blank" class="quick display-center">Buy Now</a>
        </div>
      </div>
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

    <div class="spacer-x"></div>
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
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
  <body>
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
    <div class="comeDown">
        <ul class="nav justify-content-center">
            <li class="nav-item">
                <a class="nav-link" href="#">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Blog</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#login" data-toggle="modal" data-target="#loginModal">The Beauty Lounge</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#register">Shop</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#register">Services</a>
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
              <h4 class="text-center lit-text"><i>Some kind of short one liner</i></h4>
              <a href="" class="quick quick60 lit-text">Shop Now</a>
            </div>
          </div>
          <div class="carousel-item">
            <div class="carousel-bg3 parallax d-flex justify-content-center align-items-center">
              <h4 class="text-center lit-text"><i>Blog of the Week</i></h4>
              <a href="" class="quick quick60 lit-text">Watch Now</a>
            </div>
          </div>
          <div class="carousel-item">
            <div class="carousel-bg4 parallax d-flex justify-content-center align-items-center">
              <h4 class="text-center lit-text"><i>Become a Lady of The Beauty Lounge today</i></h4>
              <a href="" class="quick quick60 lit-text">Sign Me Up!</a>
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
    </div>

    <!-- The Beauty Lounge -->

    <!-- Blog -->
    <div class="container-fluid">
      <h1 class="text-center">Blog</h1>
      <div class="spacer-m"></div>
      <div class="row">
        <div class="col-md-4 col-12 hidden-l hoverer" onmouseover="priority(0,'on');" onmouseout="priority(0,'off')" style="padding: 0;">
          <div class="blog blog-wallpaper-1 cover-mid" style="padding: 30px;">
            <h5 class="text-center">Blog Post 1</h5>
            <div class="text-center">
              <a href="" class="btn quickhalf display-center" target="_blank">Read More</a>
            </div>
          </div>
        </div>
        <div class="col-md-4 col-12 hidden hoverer" onmouseover="priority(1,'on');" onmouseout="priority(1,'off')" style="padding: 0;">
          <div class="blog blog-wallpaper-2 cover-mid" style="padding: 30px;">
            <h5 class="text-center">Blog Post 2</h5>
            <div class="text-center">
              <a href="" class="btn quickhalf display-center" target="_blank">Read More</a>
            </div>
          </div>
        </div>
        <div class="col-md-4 col-12 hidden-r hoverer" onmouseover="priority(2,'on');" onmouseout="priority(2,'off')" style="padding: 0;">
          <div class="blog blog-wallpaper-3 cover-mid" style="padding: 30px;">
            <h5 class="text-center">Blog Post 3</h5>
            <a href="" class="btn quickhalf display-center" target="_blank">Read More</a>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4 col-6 hidden-l hoverer" onmouseover="priority(3,'on');" onmouseout="priority(3,'off')" style="padding: 0;">
          <div class="blog blog-wallpaper-4 cover-mid" style="padding: 30px;">
            <h5 class="text-center">Blog Post 4</h5>
            <a href="" class="btn quickhalf display-center" target="_blank">Read More</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Services -->
    <div class="container-fluid">
      <div class="spacer-s"></div>
      <div class="parallax cover-tall bg-service"></div>
      <div class="spacer-m"></div>
      <h1 class="text-center">Let's Grow Together</h1>
      <p class="text-center">We at NHerBeauty want you to maximize your growth possibilities with us. Want a more personalized stratagem? Schedule a consultation with our internal growth coach today to create a personal development plan based around where you specifically desire to experience growth.</p>
      <div class="spacer-s"></div>
      <button class="btn quick display-center hidden-o" style="width: 500px">Book your free trial consultation today!</button>
      <div class="row">
        <div class="col-md-2 display-center"></div>
        <div class="col-md-4 col-12 display-center hidden-o">
          <!-- 1 on 1 Consultation -->
          <img src="img/logo.png" width="100%" class="hidden">
          <div class="spacer-s"></div>
          <h5 class="text-center hidden">1 on 1 Consultation</h5>
          <p class="text-center hidden">A personal session tailored to your individual goals.</p>
          <button class="btn quick display-center hidden-o" data-category="1 on 1 Consultation" data-time="30 Mins" data-toggle="modal" data-target="#fillprofile">30 Mins</button>
          <button class="btn quick60 display-center hidden-o" data-category="1 on 1 Consultation" data-time="60 Mins" data-toggle="modal" data-target="#fillprofile">60 Mins</button>
        </div>
        <div class="col-md-4 col-12 display-center hidden-o">
          <!-- Group Consultation -->
          <img src="img/logo.png" width="100%" class="hidden">
          <div class="spacer-s"></div>
          <h5 class="text-center hidden">Group Consultation</h5>
          <p class="text-center hidden">Sessions tailored to discuss achieving synonymous goals in a group setting. Maximum 5 Participants</p>
          <button type="button" class="btn quick display-center hidden-o" data-category="Group Consultation" data-time="30 Mins" data-toggle="modal" data-target="#fillprofile">30 Mins</button>
          <button type="button" class="btn quick60 display-center hidden-o" data-category="Group Consultation" data-time="60 Mins" data-toggle="modal" data-target="#fillprofile">60 Mins</button>
        </div>
        <div class="col-md-2 display-center"></div>
      </div>
      <div class="spacer-m"></div>
    </div>

    <!-- Form Modal -->
    <div class="modal fade" id="fillprofile" tabindex="-1" role="dialog" aria-labelledby="filloutTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-body">
            <div class="spacer-s"></div>
            <h3 class="text-center">Book a Consultation</h3>
            <p class="text-center">You're only a form away from a wonder session ahead of you.</p>
            <div class="spacer-s"></div>
            <form>
              <div class="form-group">
                <div class="row">
                  <div class="col">
                    <input type="text" class="form-control" placeholder="First name" required>
                  </div>
                  <div class="col">
                    <input type="text" class="form-control" placeholder="Last name" required>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="row">
                  <div class="col">
                    <input type="email" class="form-control" placeholder="Email" required>
                  </div>
                  <div class="col">
                    <input type="text" class="form-control" placeholder="Phone number" required>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="row">
                  <div class="col-6">           
                    <select class="form-control form-control-md" id="cat">
                      <option>1 on 1 Consultation</option>
                      <option>Group Consultation</option>
                    </select>
                  </div>
                  <div class="col-6">      
                    <select class="form-control form-control-md" id="tim">
                      <option>30 Mins</option>
                      <option>60 Mins</option>
                    </select>
                  </div>
                </div>
              </div>
              <button type="submit" class="btn quick quick60 display-center hidden-o">Submit</button>
            </form>
          </div>
        </div>
      </div>
    </div>

    <!-- Shop -->
    <div class="container-fluid">
      <div class="spacer-s"></div>
      <div class="parallax cover-tall bg1"></div>
      <div class="spacer-s"></div>
      <h1 class="text-center">Shop</h1>
      <div class="spacer-s"></div>
      <div class="row">
        <div class="col-md-4 col-12 display-center hidden-l">
          <!-- Shop Item Entry -->
          <img src="img/shop/logo_black.jpg" width="100%" class="shop">
          <div class="spacer-s"></div>
          <h5 class="text-center">NHerBeauty Logo Tee (White)</h5>
          <p class="text-center">Small Description. This product is amazing because I made it. Now, you can learn how amazing it is by clicking the Buy Now button.</p>
          <a href="" target="_blank" class="quick display-center">Buy Now</a>
        </div>
        <div class="col-md-4 col-12 display-center hidden">
          <img src="img/shop/logo_white.jpg" width="100%" class="shop">
          <div class="spacer-s"></div>
          <h5 class="text-center">NHerBeauty Logo Tee (Black)</h5>
          <p class="text-center">Small Description. This product is amazing because I made it. Now, you can learn how amazing it is by clicking the Buy Now button.</p>
          <a href="" target="_blank" class="quick display-center">Buy Now</a>
        </div>
      </div>
      <div class="row spacer-m">
        <div class="col-md-4 col-12 display-center hidden-r">
          <img src="img/shop/empowered_grey.jpg" class="shop" width="100%">
          <div class="spacer-s"></div>
          <h5 class="text-center">Empowered Tee (Faded Black)</h5>
          <p class="text-center">Small Description. This product is amazing because I made it. Now, you can learn how amazing it is by clicking the Buy Now button.</p>
          <a href="" target="_blank" class="quick display-center">Buy Now</a>
        </div>
        <div class="col-md-4 col-12 display-center hidden-l">
          <!-- Shop Item Entry -->
          <img src="img/shop/empowered_orange.jpg" class="shop" width="100%">
          <div class="spacer-s"></div>
          <h5 class="text-center">Empowered Tee (Faded Orange)</h5>
          <p class="text-center">Small Description. This product is amazing because I made it. Now, you can learn how amazing it is by clicking the Buy Now button.</p>
          <a href="" target="_blank" class="quick display-center">Buy Now</a>
        </div>
      </div>
      <div class="row spacer-m">
        <div class="col-md-4 col-12 display-center hidden">
          <img src="img/shop/glow_red.jpg" class="shop" width="100%">
          <div class="spacer-s"></div>
          <h5 class="text-center">Glow Up Tee (Red)</h5>
          <p class="text-center">Small Description. This product is amazing because I made it. Now, you can learn how amazing it is by clicking the Buy Now button.</p>
          <a href="" target="_blank" class="quick display-center">Buy Now</a>
        </div>
        <div class="col-md-4 col-12 display-center hidden-r">
          <img src="img/shop/glow_white.jpg" width="100%" class="shop">
          <div class="spacer-s"></div>
          <h5 class="text-center">Glow Up Tee (White)</h5>
          <p class="text-center">Small Description. This product is amazing because I made it. Now, you can learn how amazing it is by clicking the Buy Now button.</p>
          <a href="" target="_blank" class="quick display-center">Buy Now</a>
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
    <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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

    <!-- Form: Registration --> 
    <div class="container form-container hidden-o">
        <h1 class="text-center">Find Your Sprout Tutor Today</h1>
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10 display-center">
                <form action="registration.php" method="post">
                    <div class="form-row">
                        <div class="col">
                            <label>First Name</label>
                            <input type="text" name="firstname" class="form-control" required>
                        </div>
                        <div class="col">
                            <label>Last Name</label>
                            <input type="text" name="lastname" class="form-control" required>
                        </div>
                    </div>
                    <div class="spacer-m"></div>
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
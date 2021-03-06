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
    <link href="https://assets.calendly.com/assets/external/widget.css" rel="stylesheet">
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
  <body id="container">
  <div class="text-center hidden-o"><img src="img/logo<?php if (isset($_SESSION['Username'])) { ?>-g<?php } ?>.png" width="250px;"></div>
    <!-- Nav -->
    <div class="hidden-o2" style="margin-top: -25px; z-index: 10;">
        <ul class="nav justify-content-center">
            <li class="nav-item">
                <a class="nav-link" href="home">Home</a>
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

    <!-- Services -->
    <div class="container-fluid">
      <div class="spacer-s"></div>
      <div class="parallax cover-tall bg-service hidden-o"></div>
      <div class="spacer-l"></div>
      <div class="container">
        <h1 class="text-center hidden-o">Let's Grow Together</h1>
        <p class="text-center hidden-o2">We at NHerBeauty want you to maximize your growth possibilities with us.<br>Want a more personalized stratagem? Schedule a consultation with our internal growth coach today to create a personal development plan based around where you specifically desire to experience growth.</p>
      </div>
      <div class="spacer-s"></div>
      <?php if (isset($_SESSION['notification'])) { ?>
        <?php if ($_SESSION['notification'] == "OK") { ?>
        <p class="text-center hidden-o" style="color: white;">Thanks! We'll get back to you shortly!</p>
        <?php } ?>
      <?php } ?>

      <!-- Calendly link widget begin -->
      <?php if (!isset($_SESSION['Username'])) { ?>
      <div class="text-center">
        <a href="" target="_blank" class="btn btn-pink hidden-o" onclick="Calendly.initPopupWidget({url: 'https://calendly.com/nherbeauty'});return false;" style="font-size: 32px;">Book an appointment today!</a>
      </div>
      <?php } else { ?>
      <div class="text-center">
        <a href="" target="_blank" class="btn btn-gold hidden-o" onclick="Calendly.initPopupWidget({url: 'https://calendly.com/nherbeauty'});return false;" style="font-size: 32px;">Book an appointment today!</a>
      </div>
      <?php } ?>
      <!-- <button class="btn quick display-center hidden-o" style="width: 500px">Book your free trial consultation today!</button> -->
      <div class="row spacer-x">
        <div class="col-md-2 display-center"></div>
        <div class="col-md-4 col-12 display-center hidden-o">
          <!-- 1 on 1 Consultation -->
          <img src="img/logo<?php if (isset($_SESSION['Username'])) { ?>-g<?php } ?>.png" width="100%" class="hidden">
          <div class="spacer-s"></div>
          <h5 class="text-center hidden">1 on 1 Consultation</h5>
          <p class="text-center hidden">A personal session tailored to your individual goals.</p>
          <button class="btn quick display-center hidden-o" data-category="1 on 1 Consultation" data-time="30 Mins" data-toggle="modal" data-target="#fillprofile">30 Mins</button><br>
          <button class="btn quick display-center hidden-o" data-category="1 on 1 Consultation" data-time="60 Mins" data-toggle="modal" data-target="#fillprofile">60 Mins</button>
        </div>
        <div class="col-md-4 col-12 display-center hidden-o">
          <!-- Group Consultation -->
          <img src="img/logo<?php if (isset($_SESSION['Username'])) { ?>-g<?php } ?>.png" width="100%" class="hidden">
          <div class="spacer-s"></div>
          <h5 class="text-center hidden">Group Consultation</h5>
          <p class="text-center hidden">Sessions tailored to discuss achieving synonymous goals in a group setting. Maximum 5 Participants</p>
          <button type="button" class="btn quick display-center hidden-o" data-category="Group Consultation" data-time="30 Mins" data-toggle="modal" data-target="#fillprofile">30 Mins</button><br>
          <button type="button" class="btn quick display-center hidden-o" data-category="Group Consultation" data-time="60 Mins" data-toggle="modal" data-target="#fillprofile">60 Mins</button>
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
            <form method="POST" action="send-email.php">
              <div class="form-group">
                <div class="row">
                  <div class="col">
                    <input type="text" class="form-control" placeholder="First name" required name="c_name">
                  </div>
                  <div class="col">
                    <input type="text" class="form-control" placeholder="Last name" required name="c_last">
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="row">
                  <div class="col">
                    <input type="email" class="form-control" placeholder="Email" required name="c_email">
                  </div>
                  <div class="col">
                    <input type="text" class="form-control" placeholder="Phone number" required name="c_number">
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="row">
                  <div class="col-6">           
                    <select class="form-control form-control-md" id="cat" name="c_type">
                      <option value="1 on 1 Consultation">1 on 1 Consultation</option>
                      <option value="Group Consultation">Group Consultation</option>
                    </select>
                  </div>
                  <div class="col-6">      
                    <select class="form-control form-control-md" id="tim" name="c_length">
                      <option value="30 Mins">30 Mins</option>
                      <option value="60 Mins">60 Mins</option>
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

    <?php if (isset($_SESSION['errors'])): ?>
        <?php foreach ($_SESSION['errors'] as $error): ?>
        <p class="text-center" style="color: red;"><?php echo $error ?></p>
        <?php endforeach; ?>
    <?php endif; ?>
    
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
    </div>
    <!-- Code -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://assets.calendly.com/assets/external/widget.js" type="text/javascript"></script>
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
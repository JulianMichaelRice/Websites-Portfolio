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
    <!-- Nav -->
    <div class="hidden-o">
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
            <?php if (isset($_SESSION['Username'])) { ?>
            <li class="nav-item">
              <a class="nav-link" href="logout">Logout</a>
            </li> 
            <?php } ?>
            <?php if (!isset($_SESSION['Username'])) { ?>
            <li class="nav-item">
              <a class="nav-link" href="logout">Login</a>
            </li> 
            <?php } ?>
        </ul>
    </div>

    <!-- Login Modal -->
    <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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

    <!-- Home -->
    <div class="spacer-s"></div>

    <!-- Blog -->
    <div class="container-fluid">
      <h1 class="text-center hidden-o">Blog</h1>
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
  </body>
</html>
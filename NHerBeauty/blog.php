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
  <body id="container">
    <!-- Nav -->
    <div class="text-center hidden-o"><img src="img/logo<?php if (isset($_SESSION['Username'])) { ?>-g<?php } ?>.png" width="250px;"></div>
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

    <!-- Home -->
    <div class="spacer-s"></div>
    
    <!-- NOTE: WHEN MAKING A NEW BLOG POST... 
      1. Make sure that you just copy and paste the Blog Post 1 stuff
      2. Change the id="blogPost1" to id="blogPost2" or whatever # your post is
      3. In the Blog section, get rid of the <!-- and - -> stuff so that it becomes visible
      4. You need to update the button (or <a> tag) with data-target="#blogPost2" or whatever # your post is
      5. That should be it!
    -->
    <!-- This is Blog Post 1: START -->
    <div class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" id="blogPost1">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="spacer-m"></div>
          <h1>Type your blog post title here</h1>
          <div class="spacer-m"></div>
          <p>You can write a p tag as seen here (or just copy and paste) to make a new paragraph block of text</p>
          <br>
          <p>The br tag above this is used to add a new line between paragraphs and whatnot</p>
          <div class="spacer-m"></div>
          <p>Whenever you want to add space between two tags, add the line above this. There are a couple sizes (spacer-s, spacer-m, spacer-l, spacer-x)</p>
          <div class="spacer-s"></div>
          <h3>If you put h# for the tag (like h3 for this one), then you can create a subheading. It's good for categorizing your blog post into separate parts for ease of reading. The larger the number, the smaller the text! (6 is the smallest)</h3>
          <br>
          <!-- This is a bit harder ;) -->
          <div class="row">
            <div class="col-md-5 col-12">
              <a href="img/c_blog_og.jpg" target="_blank">
                <!-- Send me an image you want to put in the database or put a link that ends with .jpg or .png within the src section to set the image -->
                <img src="img/c_blog_og.jpg" class="beauty w-100 d-block ml-auto mr-auto">
              </a>
            </div>
            <div class="col-md-7 col-12" style="padding: 10px;">
              <!-- You can add text here -->
              <p>This is a simple split that I've prepared. Image on the left, text on the right. If you want to swap the two, then move line 113-116 to the line RIGHT BELOW 109</p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- This is Blog Post 1: END -->

    <!-- Blog -->
    <div class="container-fluid">
      <h1 class="text-center hidden-o">Blog</h1>
      <div class="spacer-m"></div>
      <!-- Grab lines 94 to 117 and copy and paste it below line 137 if you need to make more!
             When you copy and paste it, make sure to make the number in priority(0,'on') increase as well! -->
      <div class="row">
        <div class="col-md-4 col-12 hidden-l hoverer" onmouseover="priority(0,'on');" onmouseout="priority(0,'off')" style="padding: 0;">
          <div class="blog blog-wallpaper-1 cover-mid" style="padding: 30px;">
            <h5 class="text-center">Divine Direction</h5>
            <div class="text-center">
              <a href="https://nherbeauty.blogspot.com/2020/10/i-think-this-is-my-hidden-season-what.html" class="btn quickhalf display-center" target="_blank">Read More</a>
            </div>
          </div>
        </div>
        <div class="col-md-4 col-12 hidden hoverer" onmouseover="priority(1,'on');" onmouseout="priority(1,'off')" style="padding: 0;">
          <div class="blog blog-wallpaper-2 cover-mid" style="padding: 30px;">
            <h5 class="text-center">'I Am Proud of You' All That I Am</h5>
            <div class="text-center">
              <a href="https://nherbeauty.blogspot.com/2020/10/i-am-proud-of-you-all-that-i-am-1.html" class="btn quickhalf display-center" target="_blank">Read More</a>
            </div>
          </div>
        </div>
        <!--
        <div class="col-md-4 col-12 hidden-r hoverer" onmouseover="priority(2,'on');" onmouseout="priority(2,'off')" style="padding: 0;">
          <div class="blog blog-wallpaper-3 cover-mid" style="padding: 30px;">
            <h5 class="text-center">Blog Post 3</h5>
            <a href="" class="btn quickhalf display-center" target="_blank">Read More</a>
          </div>
        </div> -->
      </div>
      <!-- <div class="row">
        <div class="col-md-4 col-12 hidden-l hoverer" onmouseover="priority(3,'on');" onmouseout="priority(3,'off')" style="padding: 0;">
          <div class="blog blog-wallpaper-4 cover-mid" style="padding: 30px;">
            <h5 class="text-center">Blog Post 4</h5>
            <a href="" class="btn quickhalf display-center" target="_blank">Read More</a>
          </div>
        </div>
        <div class="col-md-4 col-12 hidden hoverer" onmouseover="priority(4,'on');" onmouseout="priority(4,'off')" style="padding: 0;">
          <div class="blog blog-wallpaper-1 cover-mid" style="padding: 30px;">
            <h5 class="text-center">Blog Post 5</h5>
            <a href="" class="btn quickhalf display-center" target="_blank">Read More</a>
          </div>
        </div>
        <div class="col-md-4 col-12 hidden-r hoverer" onmouseover="priority(5,'on');" onmouseout="priority(5,'off')" style="padding: 0;">
          <div class="blog blog-wallpaper-2 cover-mid" style="padding: 30px;">
            <h5 class="text-center">Blog Post 6</h5>
            <a href="" class="btn quickhalf display-center" target="_blank">Read More</a>
          </div>
        </div>
      </div> -->
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
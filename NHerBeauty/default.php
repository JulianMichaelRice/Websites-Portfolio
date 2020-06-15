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
            <a href="" class="enter-site hidden-o2">Enter Site</a>
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

    <!-- The Beauty Lounge -->
    <div class="container-fluid">
      <div class="spacer-s"></div>
      <div class="parallax cover-tall bg-service"></div>
      <div class="spacer-m"></div>
      <h1 class="text-center">Let's Grow Together</h1>
      <p class="text-center">I think we should add a one-two liner here to talk about!</p>
      <div class="spacer-s"></div>
      <button class="btn quick display-center hidden-o" style="width: 500px">Book your free trial consultation today!</button>
      <div class="row">
        <div class="col-md-2 display-center"></div>
        <div class="col-md-4 col-12 display-center hidden-o">
          <!-- 1 on 1 Consultation -->
          <img src="img/logo.png" width="100%" class="hidden">
          <div class="spacer-s"></div>
          <h5 class="text-center hidden">1 on 1 Consultation</h5>
          <p class="text-center hidden">Some simple description about 1 on 1 consultations.</p>
          <button class="btn quick display-center hidden-o" data-category="1 on 1 Consultation" data-time="30 Mins" data-toggle="modal" data-target="#fillprofile">30 Mins</button>
          <button class="btn quick60 display-center hidden-o" data-category="1 on 1 Consultation" data-time="60 Mins" data-toggle="modal" data-target="#fillprofile">60 Mins</button>
        </div>
        <div class="col-md-4 col-12 display-center hidden-o">
          <!-- Group Consultation -->
          <img src="img/logo.png" width="100%" class="hidden">
          <div class="spacer-s"></div>
          <h5 class="text-center hidden">Group Consultation</h5>
          <p class="text-center hidden">Some simple description about group consultations.</p>
          <button type="button" class="btn quick display-center hidden-o" data-category="Group Consultation" data-time="30 Mins" data-toggle="modal" data-target="#fillprofile">30 Mins</button>
          <button type="button" class="btn quick60 display-center hidden-o" data-category="Group Consultation" data-time="60 Mins" data-toggle="modal" data-target="#fillprofile">60 Mins</button>
        </div>
        <div class="col-md-2 display-center"></div>
      </div>
      <div class="spacer-m"></div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="fillprofile" tabindex="-1" role="dialog" aria-labelledby="filloutTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-body">
            <div class="spacer-s"></div>
            <h3 class="text-center">Book a Consultation</h3>
            <p class="text-center">You're only a form away from talking to someone who will understand you.</p>
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
        <div class="col-md-3 col-12 display-center hidden-l">
          <!-- Shop Item Entry -->
          <img src="img/logo.png" width="100%">
          <div class="spacer-s"></div>
          <h5 class="text-center">Product 1</h5>
          <p class="text-center">Small Description. This product is amazing because I made it. Now, you can learn how amazing it is by clicking the Buy Now button.</p>
          <a href="" target="_blank" class="quick display-center">Buy Now</a>
        </div>
        <div class="col-md-3 col-12 display-center hidden">
          <img src="img/logo.png" width="100%">
          <div class="spacer-s"></div>
          <h5 class="text-center">Product 2</h5>
          <p class="text-center">Small Description. This product is amazing because I made it. Now, you can learn how amazing it is by clicking the Buy Now button.</p>
          <a href="" target="_blank" class="quick display-center">Buy Now</a>
        </div>
        <div class="col-md-3 col-12 display-center hidden-r">
          <img src="img/logo.png" width="100%">
          <div class="spacer-s"></div>
          <h5 class="text-center">Product 3</h5>
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

    <div class="parallax cover-full hidden-o">
      <!-- <h1 class="centered text-center" style="color: white;">N Her Beauty</h1> -->
      <img src="img/logo.png" width="600px;" class="centered">
    </div>

    <div class="spacer-x"></div>
    
    <!-- Content -->
    <div class="container-fluid" id="learn">
      <div class="row">
        <div class="col-md-7">
          <div class="parallax cover-full bg5 hidden-r">
          </div>
        </div>
        <div class="col-md-5">
          <div class="jumbotron hidden-r d-flex" style="align-items: center; justify-content: center;">
            <div>
                <h2 class="text-center">Learn</h2>
                <p class="text-center">Here at Sprout we make sure not to just teach our students, but to understand how they learn and help them gain the tools to build a strong foundation that will show them how to leap over any obstacle to gain the most from their education. Instead of learning how to find the answer to a problem we take a step further and teach your student the skills to understand the problem and the concepts behind it.</p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="spacer-x"></div>
        <div class="container-fluid">
        <h4 class="text-center hidden-o">Our Mission Statement is to educate students to never leave their questions unanswered.</h4>
    </div>
    <div class="spacer-x"></div>

    <div class="container-fluid" id="teach">
      <div class="row">
        <div class="col-md-5">
          <div class="jumbotron hidden-l d-flex" style="align-items: center; justify-content: center">
            <div>
                <h2 class="text-center">Teach</h2>
                <p class="text-center">Our goal is to serve as mentors for our sprouts who are looking for help. We do things differently here at sprout. Compared to most tutors you may have experienced, We believe learning about how our sprouts think and how they solve problems is the first step we can take.  We don’t want to be just your tutor, We don’t want to only help you find answers to your homework,  We want help you build a foundation and support system to gain the skills you need to tackle any problem you may face.</p>
            </div>
          </div>
        </div>
        <div class="col-md-7">
          <div class="parallax cover-full bg6 hidden-r">
          </div>
        </div>
      </div>
    </div>

    <div class="spacer-x" id="register"></div>

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

    <!-- Footer -->
    <footer class="jumbotron hidden" style="margin-bottom: -20px; height: 55vh; padding-top: 50px">
        <div class="row">
            <div class="col-md-6 col-12">
                <h4 class="text-center">Contact</h4>
                <p class="text-center">Contact us at ??@sprouttutor.com</p>
            </div>
            <div class="col-md-6 col-12s">
                <h4 class="text-center">Follow us on Social Media</h4>

            </div>
        </div>
    </footer>
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
  </body>
</html>
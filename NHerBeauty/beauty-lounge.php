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

    <!-- Home -->
    <div class="spacer-s"></div>

    <?php if (!isset($_SESSION['Username'])) { ?>
    <!-- The Beauty Lounge -->
    <div class="spacer-s"></div>
    <div class="parallax cover-tall carousel-bg4 hidden-o"></div>
    <div class="spacer-l"></div>

    <div class="row">
        <div class="col-12 col-md-4 colored">
            <h4 class="text-center spacer-l hidden-l" style="padding:10px;">The Benefits of Joining the Beauty Lounge</h4>
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-12 text-center">
                        <img src="img/8icons/1 DiscMerch.png" class="spacer-s hidden-l" width="120px">
                        <p class="text-center spacer-s hidden-l">Discounts on Merchandise</p>
                    </div>
                    <div class="col-md-12 col-12 text-center">
                        <img src="img/8icons/2 StudyTopics.png" class="spacer-s hidden-l" width="120px">
                        <p class="text-center spacer-s hidden-l">Weekly Study Topics</p>
                    </div>
                    <div class="col-md-12 col-12 text-center">
                        <img src="img/8icons/3 Videos.png" class="spacer-s hidden-l" width="120px">
                        <p class="text-center spacer-s hidden-l">24/7 Access to Motivational Videos</p>
                    </div>
                    <div class="col-md-12 col-12 text-center">
                        <img src="img/8icons/4 PillowTalks.png" class="spacer-s hidden-l" width="120px">
                        <p class="text-center spacer-s hidden-l">Weekly Zoom Pillow Talks / Q&amp;A Sessions</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-12 text-center">
                        <img src="img/8icons/5 MonthlyConferences.png" class="spacer-s hidden-l" width="120px">
                        <p class="text-center spacer-s hidden-l">Discounted Enrollment in Conferences</p>
                    </div>
                    <div class="col-md-12 col-12 text-center">
                        <img src="img/8icons/6 24-7 PrevFilmed.png" class="spacer-s hidden-l" width="120px">
                        <p class="text-center spacer-s hidden-l">24/7 Access to Previously Filmed Pillow Talks &amp; Conferences</p>
                    </div>
                    <div class="col-md-12 col-12 text-center">
                        <img src="img/8icons/7 SoloConsultation.png" class="spacer-s hidden-l" width="120px">
                        <p class="text-center spacer-s hidden-l">Discounted Solo Consultation Rates</p>
                    </div>
                    <div class="col-md-12 col-12 text-center">
                        <img src="img/8icons/8 DiscussionBoard.png" class="spacer-s hidden-l" width="120px">
                        <p class="text-center spacer-s hidden-l">Interact with Others through the Discussion Board</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-8">
            <div class="container hidden-o">
                <div class="spacer-l"></div>
                <h2 class="text-center hidden-r">Welcome!</h2>
                <p class="text-center hidden-r">The Beauty Lounge is a safe space for women looking to meet and be empowered by other women with the same pursuit of internal growth and transformation. Our mission is to be an armor of support, a place of comfort, and an inspiration amongst one another to unveil your best self.</p>
                <div class="text-center hidden-r">
                    <a href="" data-toggle="modal" data-target="#payModal" class="btn btn-gold">Join Now!</a>
                </div>
                <img src="img/c_lounge_og.jpg" class="d-block ml-auto mr-auto hidden-o w-100 beauty">

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
                        <div class="carousel-bgX parallax d-flex justify-content-center align-items-center">
                          <h4 class="text-center lit-text container"><i>“I always felt like there were no women like me in my age group (fresh out of college) who’s primary focus right now was to get right within. NHerBeauty made me feel like I was welcomed into an exclusive group of young women exactly like me”</i></h4>
                        </div>
                      </div>
                      <div class="carousel-item">
                        <div class="carousel-bgX parallax d-flex justify-content-center align-items-center">
                          <h4 class="text-center lit-text container"><i>“I love being apart of the Beauty Lounge. Nyah is the most down to earth person and really makes you feel like your journey is her journey as well.”</i></h4>
                        </div>
                      </div>
                      <div class="carousel-item">
                        <div class="carousel-bgX parallax d-flex justify-content-center align-items-center">
                          <h4 class="text-center lit-text container"><i>“Such a real brand, addressing real topics. Even the topics that are commonly avoided.”</i></h4>
                        </div>
                      </div>
                      <div class="carousel-item">
                        <div class="carousel-bgX parallax d-flex justify-content-center align-items-center">
                          <h4 class="text-center lit-text container"><i>“The Beauty Lounge gave me sisters I never had. We’ll be in there laughing one minute then crying the next. To be in a room where the respect for one another is mutual and our goals are similar is such a breath of fresh air”</i></h4>
                        </div>
                      </div>
                      <div class="carousel-item">
                        <div class="carousel-bgX parallax d-flex justify-content-center align-items-center">
                          <h4 class="text-center lit-text container"><i>“I look forward to my solo consultations with Nyah. It feels like a free flowing conversation, nothing is forced or comes off as inauthentic. My self awareness has increased and I actually enjoy doing the work needed to find my best self.”</i></h4>
                        </div>
                      </div>
                      <div class="carousel-item">
                        <div class="carousel-bgX parallax d-flex justify-content-center align-items-center">
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

                <img src="img/b_table.jpg" class="d-block ml-auto mr-auto hidden-o w-100 beauty">
                
            </div>
        </div>
    </div>

    <!-- Pay Modal -->
    <div class="modal fade" id="payModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-body">
                <div class="text-center hidden-o2 spacer-l">
                    <form action="payment" method="POST" id="paymentFrm">
                        <div class="">
                            <h3 class="">Join the Beauty Lounge</h3>
                            <div class="spacer-m"></div>
                            <!-- Plan Info -->
                            <p>
                                <b>Plan </b>
                                <select name="subscr_plan" id="subscr_plan">
                                    <?php foreach($plans as $id=>$plan){ ?>
                                        <option value="<?php echo $id; ?>"><?php echo $plan['name'].' [$'.$plan['price'].'/'.$plan['interval'].']'; ?></option>
                                    <?php } ?>
                                </select>
                            </p>
                        </div>
                        <div class="">
                        <!-- Payment form -->
                        <div class="row">
                            <div class="form-group col-12 col-md-4">
                            <label>Full Name</label>
                            <input type="text" name="name" id="name" placeholder="Enter name" required="" autofocus="">
                            </div>
                            <div class="form-group col-12 col-md-4">
                            <label>Email</label>
                            <input type="email" name="email" id="email" placeholder="Enter email" required="">
                            </div>
                            <div class="form-group col-12 col-md-4">
                            <label>Password</label>
                            <input type="password" name="password" id="password" autocomplete="off" required="">
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-0 col-md-2"></div>
                            <div class="form-group col-12 col-md-8">
                            <label>Card Number</label>
                            <input type="text" name="card_number" id="card_number" placeholder="1234 1234 1234 1234" maxlength="16" autocomplete="off" required="">
                            </div>
                            <div class="col-0 col-md-2"></div>
                        </div>
                        <div class="row">
                            <div class="form-group col-12 col-md-6">
                            <label>Expiry Date (M)</label><br>
                            <input type="text" name="card_exp_month" id="card_exp_month" placeholder="MM" maxlength="2" required="">
                            </div>
                            <div class="form-group col-12 col-md-6">
                            <label>Expiry Date (Y)</label><br>
                            <input type="text" name="card_exp_year" id="card_exp_year" placeholder="YYYY" maxlength="4" required="">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="form-group col-12 col-md-6">
                                <label>CVC</label>
                                <input type="text" name="card_cvc" id="card_cvc" placeholder="CVC" maxlength="3" autocomplete="off" required="">
                            </div>
                            <div class="col-md-3"></div>
                        </div>
                        <button type="submit" class="btn btn-gold spacer-l" id="payBtn">Join the Beauty Lounge</button>
                    </div>
                </form>
                </div>
            </div>
          </div>
        </div>
      </div>
    
    <?php } else { ?>
    <!-- The Beauty Lounge Logged In -->
    <div class="container-fluid">
        <div class="spacer-s"></div>
        <div class="parallax cover-tall carousel-bg4 hidden-o"></div>
        <h1 class="text-center hidden-o spacer-l">The Beauty Lounge</h1>
        <!-- CURRENT STUFF -->
        <div class="row">
          <div class="col-md-6 col-12">
            <div class="jumbotron special-pad-r">
              <h2 class="text-center spacer-s">Weekly Video</h2>
              <img src="img/lounge_video.png" width="200px" class="d-block ml-auto mr-auto">
            </div>
          </div>
          <div class="col-md-6 col-12">
            <div class="jumbotron special-pad-l">
              <h2 class="text-center spacer-s">Teachable</h2>
              <img src="img/icon_teachable.png" width="200px" class="d-block ml-auto mr-auto">
            </div>
          </div>
        </div>
        <div class="spacer-l"></div>
        <!-- PAST STUFF -->
        <div class="container">
          <h4 class="text-center">Check out meetings and more things we have done in the past here!</h4>
          <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#videos">Videos</a></li>
            <li><a data-toggle="tab" href="#zoom">Conferences</a></li>
          </ul>
          
          <div class="tab-content">
            <div id="videos" class="tab-pane fade in active">
              <div class="spacer-m"></div>
              <h3>Past Videos</h3>
              <p>Click a link to see the appropriate video!</p>
            </div>
            <div id="zoom" class="tab-pane fade">
              <div class="spacer-m"></div>
              <h3>Past Conferences</h3>
              <p>Click a link to see the appropriate Zoom conference!</p>
            </div>
          </div>
        </div>
    </div>
        
    <?php } ?>

    <div class="spacer-x"></div>
    
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

    <div class="spacer-x"></div>
    </div>

    <!-- Code -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://js.stripe.com/v2/"></script>
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
    <script>
      // Set your publishable key
      Stripe.setPublishableKey('<?php echo STRIPE_PUBLISHABLE_KEY; ?>');
      
      // Callback to handle the response from stripe
      function stripeResponseHandler(status, response) {
          if (response.error) {
              // Enable the submit button
              $('#payBtn').removeAttr("disabled");
              // Display the errors on the form
              $(".payment-status").html('<p>'+response.error.message+'</p>');
          } else {
              var form$ = $("#paymentFrm");
              // Get token id
              var token = response.id;
              // Insert the token into the form
              form$.append("<input type='hidden' name='stripeToken' value='" + token + "' />");
              // Submit form to the server
              form$.get(0).submit();
          }
      }
      
      $(document).ready(function() {
          // On form submit
          $("#paymentFrm").submit(function() {
              // Disable the submit button to prevent repeated clicks
              $('#payBtn').attr("disabled", "disabled");
          
              // Create single-use token to charge the user
              Stripe.createToken({
                  number: $('#card_number').val(),
                  exp_month: $('#card_exp_month').val(),
                  exp_year: $('#card_exp_year').val(),
                  cvc: $('#card_cvc').val()
              }, stripeResponseHandler);
          
              // Submit from callback
              return false;
          });
      });
      </script>
  </body>
</html>
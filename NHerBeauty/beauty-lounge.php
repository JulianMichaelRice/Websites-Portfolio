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
              <a class="nav-link" href="">The Beauty Lounge</a>
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

    <!-- Home -->
    <div class="spacer-s"></div>

    <?php if (!isset($_SESSION['Username'])) { ?>
    <!-- The Beauty Lounge -->
    <div class="spacer-s"></div>
    <div class="parallax cover-tall carousel-bg4 hidden-o"></div>
    <div class="spacer-m"></div>
    <div class="panel text-center hidden-o2">
      <form action="payment" method="POST" id="paymentFrm">
          <div class="panel-heading">
              <h3 class="panel-title">Join the Beauty Lounge</h3>
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
          <div class="panel-body">
              <!-- Display errors returned by createToken -->
              <div class="card-errors"></div>
        
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
                <div class="form-group col-12 col-md-7">
                  <label>Expiry Date</label>
                  <input type="text" name="card_exp_month" id="card_exp_month" placeholder="MM" maxlength="2" required="">
                  <input type="text" name="card_exp_year" id="card_exp_year" placeholder="YYYY" maxlength="4" required="">
                </div>
                <div class="form-group col-12 col-md-5">
                  <label>CVC</label>
                  <input type="text" name="card_cvc" id="card_cvc" placeholder="CVC" maxlength="3" autocomplete="off" required="">
                </div>
              </div>
              <button type="submit" class="btn btn-gold" id="payBtn">Join the Beauty Lounge</button>
          </div>
      </form>
    </div>
    <?php } ?>

    <?php if (isset($_SESSION['Username'])) { ?>
    <!-- The Beauty Lounge Logged In -->
    <div class="container-fluid">
        <div class="spacer-s"></div>
        <div class="parallax cover-tall carousel-bg4 hidden-o"></div>
        <div class="spacer-s"></div>
        <h1 class="text-center hidden-o">The Beauty Lounge</h1>
        <div class="spacer-s"></div>
    </div>
        
    <?php } ?>

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
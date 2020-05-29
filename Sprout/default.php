<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Assistant:wght@200;600&display=swap" rel="stylesheet">
    <!-- This following line is only necessary in the case of using the option `scrollOverflow:true` -->
    <link rel="stylesheet" href="styles.css">
    <title>Sprout | Official Website</title>
  </head>
  <body>
    <!-- Nav -->
    <div class="cover comeDown">
        <ul class="nav justify-content-center hidden-jS">
            <li class="nav-item">
                <a class="nav-link" href="#">Learn</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Teach</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#"><img src="img/Sprout.png" width="35px" class="hidden-o2"></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#register">Register</a>
          </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Login</a>
            </li>
        </ul>
    </div>

    <div class="parallax cover-full bg2 hidden-o">
      
      <h1 class="centered text-center" style="color: white;">Sprout</h1>
      <br>
      <h4 class="centered text-center" style="color: white; font-weight: 200">Planting an Education for Your Future</h4>
    </div>

    <div class="spacer-x"></div>
    
    <!-- Content -->
    <div class="container-fluid">
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

    <!-- Form: Registration --> 
    <div class="container form-container">
        <h1 class="text-center">Find Your Sprout Tutor</h1>
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
                            <input type="text" name="password" class="form-control" required>
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
    <footer class="jumbotron" style="margin-bottom: -20px; height: 250px; padding-top: 50px">
        <div class="row">
            <div class="col-md-6">
                <h4>Contact</h4>
                <p>Contact us at ??@sprouttutor.com</p>
            </div>
            <div class="col-md-6">
                <h4 class="text-right">Follow us on Social Media</h4>

            </div>
        </div>
    </footer>
    <!-- Code -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="javascript.js" type="text/javascript"></script>
  </body>
</html>
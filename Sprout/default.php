<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
    <title>Sprout | Official Website</title>
  </head>
  <body>
    <!-- Nav -->
    <div class="cover comeDown">
        <ul class="nav justify-content-center hidden-jS">
            <li class="nav-item">
                <a class="nav-link" href="#">Sprout</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Register</a>
          </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Login</a>
            </li>
        </ul>
    </div>

    <div class="parallax cover-tall bg2 hidden-o">
      <img src="img/Sprout.png" width="300px" class="centered hidden-o2">
    </div>
    
    <!-- Content -->
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-6">
          <div class="jumbotron hidden-l">
            <h2 class="text-center">Teach</h2>
          </div>
        </div>
        <div class="col-md-6">
          <div class="jumbotron hidden-r">
            <h2 class="text-center">Learn</h2>
          </div>
        </div>
      </div>
      <h1 class="hidden-l text-center">Sprout</h1>
      
    </div>

    <div class="container">
        <h1 class="text-center">Title</h1>
        <div class="row">
            <div class="col-md-6">
                <form action="validation.php" method="post">
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" name="user" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-warning">Login</button>
                </form>
            </div>
            <div class="col-md-6">
                <form action="registration.php" method="post">
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" name="user" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>First Name</label>
                        <input type="text" name="firstname" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Last Name</label>
                        <input type="text" name="lastname" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-warning">Register</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Content -->
    <h1>Title</h1>

    <!-- Code -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="javascript.js" type="text/javascript"></script>
  </body>
</html>
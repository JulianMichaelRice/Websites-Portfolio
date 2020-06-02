<?php
    session_start();
    if (!isset($_SESSION['Username'])) {
        header('location:default.php');
    }
    require_once 'pdoconfig.php';
    $mysqli = new mysqli($host, $username, $password, $dbname);
    if ($mysqli -> connect_errno) {
      echo "Failed to connect!";
      exit();
    }

    $query = "SELECT * FROM tutors";
    $querySubjects = "SELECT * FROM subjects";
    $result = $mysqli -> query($query);
    $resultSubjects = $mysqli -> query($querySubjects);
    $row = $result -> fetch_all(MYSQLI_ASSOC);
    $rowSubjects = $resultSubjects -> fetch_all(MYSQLI_ASSOC);
    // printf("%s (%s)\n", $row[0]['First'], $row[1]['First']);
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Assistant:wght@200;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="calendar.css">
    <link rel="stylesheet" href="styles.css">
    <title>Home</title>
  </head>
  <body>
    <!-- Nav -->
    <div class="cover comeDown">
        <ul class="nav justify-content-center">
            <li class="nav-item">
                <a class="nav-link" href="#">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Profile</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#"><img src="img/Sprout.png" width="35px" class="hidden-o2"></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#register">Find a Tutor</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="logout.php">Logout</a>
            </li>
        </ul>
    </div>
    <div class="spacer-s"></div>

    <?php include 'calendar.php';
          include 'booking.php';
          include 'BookableCell.php';
      $booking = new Booking($dbname, $host, $username, $password);
      $bookableCell = new BookableCell($booking);
      $calendar = new Calendar();
      $calendar->attachObserver('showCell', $bookableCell);
      $bookableCell->routeActions();
      echo $calendar->show();
    ?>

    <!-- Find Tutors .php -->
    <h1 class="text-center">Find a Tutor</h1>
    <div class="container-fluid">
      <div class="row d-flex justify-content-center">
        <?php foreach($row as $tutor): ?>
        <div class="card d-flex hidden box-shadow" style="width: 400px; margin: 10px; display: inline-block;">

          <img class="card-img-top" src="img/julian.jpg" alt="<?php echo ($tutor['First'] . " " . $tutor['Last']); ?>">

          <div class="card-body d-flex flex-column">
            <h5 class="card-title"><?php echo ($tutor['First'] . " " . $tutor['Last']); ?></h5>
            <p class="card-text">Main teaching subject is <?php echo $tutor['Main']; ?> and secondary teaching subject is <?php echo $tutor['Second']; ?></p>
          </div>

          <div class="card-footer">

            <button type="button" class="btn btn-light3 btn-block" data-toggle="modal" data-target="#aboutModal" data-username="<?php echo $tutor['Username'] ?>" data-bio="<?php echo $tutor['Bio'] ?>" data-main="<?php echo $tutor['Main'] ?>" data-second="<?php echo $tutor['Second'] ?>" data-name="<?php echo $tutor['First'] ?>">About</button>

            <button class="btn btn-light btn-block" data-toggle="modal" data-target="#contactModal" data-username="<?php echo $tutor['Username'] ?>" data-bio="<?php echo $tutor['Bio'] ?>" data-main="<?php echo $tutor['Main'] ?>" data-second="<?php echo $tutor['Second'] ?>" data-name="<?php echo $tutor['First'] ?>">Contact</button>

            <button class="btn btn-light2 btn-block" data-toggle="modal" data-target="#contactModal" data-username="<?php echo $tutor['Username'] ?>" data-bio="<?php echo $tutor['Bio'] ?>" data-main="<?php echo $tutor['Main'] ?>" data-second="<?php echo $tutor['Second'] ?>" data-name="<?php echo $tutor['First'] ?>">Schedule Now</button>
          </div>
        </div>
        <?php endforeach; ?>
      </div>

      <!-- About Modal -->
      <div class="modal fade" id="aboutModal" tabindex="-1" role="dialog" aria-labelledby="aboutModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="aboutModalLabel">About</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="row">
                <div class="col-md-5 col-12">
                  <img src="img/julian.jpg" class="modalPic">
                </div>
                <div class="col-md-7 col-12">
                  <p id="bio"></p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Contact Modal -->
      <div class="modal fade" id="contactModal" tabindex="-1" role="dialog" aria-labelledby="contactModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="contactModalLabel">Message</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form>
                <div class="form-group">
                  <label for="recipient-name" class="col-form-label">Subject Title:</label>
                  <input type="text" class="form-control" id="recipient-name">
                </div>
                <div class="form-group">
                  <label for="inputState">Target Subject</label>
                  <select id="inputState" class="form-control">
                    <option selected><?php echo $tutor['Main'] ?></option>
                    <option><?php echo $tutor['Second'] ?></option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="message-text" class="col-form-label">Message:</label>
                  <textarea class="form-control" id="message-text"></textarea>
                </div>
              </form>
              <button type="submit" class="btn btn-light2 mb-2">Message</button>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Edit Profile Modal -->
    <div class="modal fade" id="editProfile" tabindex="-1" role="dialog" aria-labelledby="contactModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="contactModalLabel">Message</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form>
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Subject Title:</label>
                <input type="text" class="form-control" id="recipient-name">
              </div>
              <div class="form-group">
                <label for="inputState">Main Subject</label>
                <select id="inputState" class="form-control">
                  <option selected></option>
                  <?php foreach($rowSubjects as $subject): ?>
                  <option><?php echo $subject['Name'] ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
              <div class="form-group">
                <label for="inputState">Secondary Subject</label>
                <select id="inputState" class="form-control">
                  <option selected><?php echo $subject['Name'] ?></option>
                  <?php foreach($rowSubjects as $subject): ?>
                  <option><?php echo $subject['Name'] ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
              <div class="form-group">
                <label for="message-text" class="col-form-label">Bio:</label>
                <textarea class="form-control" id="message-text"></textarea>
              </div>
            </form>
            <button type="submit" class="btn btn-light2 mb-2">Update Profile</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Content -->
    <div class="container-fluid">
      <h1 class="text-center">Welcome back, <?php echo $_SESSION['First'] ?></h1>
    </div>
    <div class="spacer-l"></div>
    <div class="container-fluid">
      <div class="row">
        <!-- My Profile -->
        <div class="col-md-3 col-12">
          <div class="jumbotron" style="padding-top: 50px">
            <h4 class="text-center">My Profile</h4>
            <p class="text-center"><?php echo $_SESSION['First'] ?> <?php echo $_SESSION['Last'] ?></p>
            <img src="img/julian.jpg" class="display-center profpic">
          </div>
        </div>

        <!-- Appointments -->
        <div class="col-md-6 col-12">
          <div class="spacer-l"></div>
          <h4 class="text-center">My Appointments</h4>
          <div id="appointments">
            <table style="width: 100%">
              <tr>
                <th>Date</th>
                <th>Hours</th>
                <th>Subject</th>
                <th>Tutor</th>
                <th>Details</th>
              </tr>
              <tr>
                <td>June 10th</td>
                <td>1.5</td>
                <td>ACT Math</td>
                <td>Julian Rice</td>
                <td>Click Here</td>
              </tr>
            </table>
          </div>
        </div>

        <!-- Quick Select Menu -->
        <div class="col-md-3 col-12">
          <div class="spacer-l"></div>
          <h4 class="text-center">Quick Select</h4>
          <div class="spacer-m"></div>
          <div class="row">
            <div class="col-md-12 col-12 text-center">
              <a href="findtutor.php" class="quick display-center">Find a Tutor</a>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 col-12 text-center">
              <button class="btn btn-light2" data-toggle="modal" data-target="#editProfile" data-username="<?php echo $tutor['Username'] ?>" data-bio="<?php echo $tutor['Bio'] ?>" data-main="<?php echo $tutor['Main'] ?>" data-second="<?php echo $tutor['Second'] ?>" data-name="<?php echo $tutor['First'] ?>">Edit Profile</button>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 col-12 text-center">
              <a href="settings.php" class="quick display-center">Settings</a>
            </div>
          </div>
          <div class="row text-center">
            <p></p>
          </div>
        </div>
      </div>
    </div>

    <!-- Code -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="javascript.js" type="text/javascript"></script>

    <script>
      $('#aboutModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var recipient = button.data('username') // Extract info from data-* attributes
        var bio = button.data('bio')
        var main = button.data('main')
        var second = button.data('second')
        var name = button.data('name')
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        var modal = $(this)
        modal.find('.modal-title').text('About ' + name)
        modal.find('.modal-body input').val(recipient)
        modal.find('#bio').text(bio);
      })
    </script>

    <script>
      $('#contactModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var recipient = button.data('username') // Extract info from data-* attributes
        var bio = button.data('bio')
        var main = button.data('main')
        var second = button.data('second')
        var name = button.data('name')
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        var modal = $(this)
        modal.find('.modal-title').text('New message to ' + name)
        modal.find('.modal-body input').val("Interested student in " + recipient)
      })
    </script>

    <script>
      $('#editProfile').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var recipient = button.data('username') // Extract info from data-* attributes
        var bio = button.data('bio')
        var main = button.data('main')
        var second = button.data('second')
        var name = button.data('name')
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        var modal = $(this)
        modal.find('.modal-title').text('Edit Profile')
        modal.find('option selected').val(main);
        modal.find('.modal-body input').val("name")

      })
    </script>
  </body>
</html>
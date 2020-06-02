<?php 
    require_once 'pdoconfig.php';
    //Start a session
    session_start();

    //Create a connection to the localhost server
    $con = mysqli_connect($host, $username, $password, $dbname);

    //Select a specific database
    // mysqli_select_db($con, 'logintest');

    //Grab the register details from login.php's registration form
    $name = $_POST['user'];
    $pass = $_POST['password'];
    $s = " select * from users where Username = '$name'";
    $result = mysqli_query($con, $s);

    //Did we find a matching user?
    if (mysqli_num_rows($result) == 1) {

        //Is the password right? If so, log in!
        if (password_verify($pass, mysqli_fetch_assoc($result)['Password'])) {
            $_SESSION['Username'] = $name;

            //Get the row so we can set values to other session variables
            $row = mysqli_fetch_assoc($result);
            $_SESSION['First'] = $row['First'];
            $_SESSION['Last'] = $row['Last'];
            header('location:home');
        } else {
            //Incorrect Password
            $_SESSION['error'] = array("Your username or password was incorrect.");
            header('location:default');
        }
    } else {
        //Incorrect Username
        $_SESSION['errors'] = array("Your username or password was incorrect.");
        header('location:default');
    }
?>
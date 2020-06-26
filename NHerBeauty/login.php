<?php 
    session_start();
    require_once 'pdoconfig.php';

    //Create a connection to the localhost server
    $con = mysqli_connect($host, $username, $password, $dbname);

    //Grab the register details from login.php's registration form
    $email = $_POST['email'];
    $pass = $_POST['password'];
    $s = " select * from users where email = '$email'";
    $result = mysqli_query($con, $s);

    //Did we find a matching user?
    if (mysqli_num_rows($result) == 1) {

        //Is the password right? If so, log in!
        if (password_verify($pass, mysqli_fetch_assoc($result)['password'])) {
            $_SESSION['Username'] = $email;
            header('location:beauty-lounge');
        } else {
            //Incorrect Password
            $_SESSION['errors'] = array("Your username or password was incorrect.");
            header('location:home');
        }
    } else {
        //Incorrect Username
        $_SESSION['errors'] = array("The email doesn't exist in the database.");
        header('location:home');
    }
?>
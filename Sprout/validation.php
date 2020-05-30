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

    //SQL command that grabs all entries where the 
    //username is the same as what was typed on login.php
    $s = " select * from users where Username = '$name' && Password = '$pass'";

    //Set the result equal to what is returned from the SQL command
    $result = mysqli_query($con, $s);

    //Get how many rows there are with the username matching the input
    $num = mysqli_num_rows($result);

    //If there exists a user... we know the username has already been taken
    if ($num == 1) {
        $_SESSION['Username'] = $name;

        //Get the row so we can set values to other session variables
        $row = mysqli_fetch_assoc($result);
        $_SESSION['First'] = $row['First'];
        $_SESSION['Last'] = $row['Last'];
        // $_SESSION['user_data'] = $row; //$_SESSION['user_data']['First']; etc

        header('location:home.php');
    } else {
        header('location:default.php');
    }
?>
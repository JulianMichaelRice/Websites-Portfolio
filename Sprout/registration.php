<?php 
    require_once 'pdoconfig.php';
    
    //Start a session
    session_start();
    
    //Where to send the user
    header('location:default');
    $con = mysqli_connect($host, $username, $password, $dbname);
    
    $name = $_POST['user'];
    $pass = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $first = $_POST['firstname'];
    $last = $_POST['lastname'];
    
    echo $name;

    //SQL command that grabs all entries where the 
    //username is the same as what was typed on login.php
    $s = " select * from users where Username = '$name'";

    //Set the result equal to what is returned from the SQL command
    $result = mysqli_query($con, $s);

    //Get how many rows there are with the username matching the input
    $num = mysqli_num_rows($result);

    //If there exists a user... we know the username has already been taken
    if ($num == 1) {
        echo "Username already taken";
    } else {
        //Else, add a new entry to our table with all the specified details
        $reg = " insert into users(Username, Password, First, Last) values ('$name', '$pass', '$first', '$last')";
        mysqli_query($con, $reg);

        //We did it!
        echo "Registration Success!";
        session_destroy();
    }
?>
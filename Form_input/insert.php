<?php

?><?php
    // Database Connection
    $link = mysqli_connect("localhost","root","","Practice");

    // Check Connection
    if($link === false){
        die("Error: Could not connect.");
    }

    // Escape user inputs 
    $first_name = mysqli_real_escape_string($link,$_REQUEST['first_name']);
    echo($first_name);
    $last_name = mysqli_real_escape_string($link,$_REQUEST['last_name']);
    echo($last_name);
    $email = mysqli_real_escape_string($link,$_REQUEST['email']);
    echo($email);

    $cmd = "INSERT INTO STUDENTS(first_name,last_name,email)
            VALUES($first_name,$last_name,$email)";

    // $data = mysqli_query($link,"Select * from Students");
    // echo(mysqli_num_rows($data));

    if(mysqli_query($link,$cmd)){
        echo("Table Data Inserted Successfully from the form");
    }
    else{
        echo("Insertion Trouble");
    }

    // Closing Connection
    mysqli_close($link);
?>
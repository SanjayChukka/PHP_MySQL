<?php
    // Database Connection
    $link = mysqli_connect("localhost","root","","Practice");

    // Check Connection
    if($link === false){
        die("Error: Could not connect.");
    }

    // Creating Table
    // $str = "CREATE TABLE STUDENTS(
    //     ID INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    //     FIRST_NAME VARCHAR(30) NOT NULL,
    //     last_name VARCHAR(30) NOT NULL,
    //     email VARCHAR(70) NOT NULL UNIQUE
    // )";

    // To see the Objects of the Table
    $str = "select * from students";
    print_r(mysqli_query($link,$str));

    // if(mysqli_query($link,$str)){
    //     echo("Table Created Successfully");
    // }
    // else{
    //     echo("Table not created");
    // }

    // Closing Connection
    mysqli_close($link);
?>
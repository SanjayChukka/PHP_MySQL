<?php
    // Database Connection
    $link = mysqli_connect("localhost","root","","Practice");

    // Check Connection
    if($link === false){
        die("Error: Could not connect.");
    }

    // Inserting into Table
    $str = "INSERT INTO STUDENTS(id,first_name,last_name,email)
    VALUES(1,'Sanjay','Chukka','sanjay@gmail.com'),
    (2,'Mohan','Sai','mohan@gmail.com'),
    (3,'Sagar','Pathu','sagar@gmail.com'),
    (4,'Akhil','Nakka','akhil@gmail.com')";

    if(mysqli_query($link,$str)){
        echo("Table Data Inserted Successfully");
    }
    else{
        echo("Insertion Trouble");
    }

    // Closing Connection
    mysqli_close($link);
?>
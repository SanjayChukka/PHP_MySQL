<?php

// Creating Connection 
$link = mysqli_connect("localhost","root","");

// Connection Check

if($link === false){
    die("ERROR: Could not connect!".mysqli_connect_error());
}

echo("Successfully Connected! Host Information : ".mysqli_get_host_info($link))."<br>";


$create_db = "CREATE DATABASE Practice";
$result = mysqli_query($link, $create_db);
if ($result === true) {
    echo ("Database Created Successfully");
} else {
    echo ("ERROR Unable to create Database!" . mysqli_error($link));
}

// Closing the connection
// if(mysqli_close($link)===true){
//     echo("Connection Closed Successfully!");
// }
?>
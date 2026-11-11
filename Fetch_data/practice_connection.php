<?php

// Creating Connection 
$link = mysqli_connect("localhost","root","","practice");

// Connection Check

if($link === false){
    die("ERROR: Could not connect!".mysqli_connect_error());
}
// else{
//     echo("Connected Successfully");
// }
?>
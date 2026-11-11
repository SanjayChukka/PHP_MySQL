<?php

// Creating Connection 
$link = mysqli_connect("localhost","root","","practice");

// Connection Check

if($link === false){
    die("ERROR: Could not connect!".mysqli_connect_error());
}

// echo("Successfully Connected! Host Information : ".mysqli_get_host_info($link))."<br>";

// Fetching data from the database 
$data = mysqli_query($link,"SELECT * FROM students");

// mysqli_fetch_row($resultset)
if(mysqli_num_rows($data)>0){
    echo("<pre>");
    $row = mysqli_fetch_row($data);
    print_r($row);
}
else{
    echo("There is no data");
}

// mysqli_fetch_assoc($resultset)
if(mysqli_num_rows($data)>0){
    echo("<pre>");
    $row = mysqli_fetch_assoc($data);
    print_r($row);
}
else{
    echo("There is no data");
}


// mysqli_fetch_array($resultset)
if(mysqli_num_rows($data)>0){
    echo("<pre>");
    $row = mysqli_fetch_array($data);
    print_r($row);
}
else{
    echo("There is no data");
}


// mysqli_fetch_object($resultset)
if(mysqli_num_rows($data)>0){
    echo("<pre>");
    $row = mysqli_fetch_object($data);
    print_r($row);
}
else{
    echo("There is no data");
}


// One more
if(mysqli_num_rows($data)>0){
    echo("<pre>");
    $row = mysqli_fetch_row($data);
    var_dump($row);   // NULL   There is no record.
}
else{
    echo("There is no data");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form</title>
</head>

<body>
    <h1>Contact Us!</h1>
    <?php
    // Cookie Handling
    if(isset($_COOKIE['success'])){
        echo"<p>".$_COOKIE['success']."</p>";
    }
    if(isset($_COOKIE['error'])){
        echo"<p>".$_COOKIE['error']."</p>";
    }

    // 4th step Accessing the data from the form. 
    function filterData($data)
    {
        return addslashes(strip_tags(trim($data)));
    }
    if (isset($_POST["submit"])) {
        $name = (isset($_POST["name"])) ? filterData($_POST["name"]) : "";
        $email = (isset($_POST["email"])) ? filterData($_POST["email"]) : "";
        $mobile = (isset($_POST["mobile"])) ? filterData($_POST["mobile"]) : "";
        $message = (isset($_POST["message"])) ? filterData($_POST["message"]) : "";


        //5th step Connection.
        //    include("connection.php");

        // Creating Connection 
        $link = mysqli_connect("localhost", "root", "", "practice");

        // Connection Check

        if ($link === false) {
            die("ERROR: Could not connect!" . mysqli_connect_error());
        }

        //6th step Inserting into database table
        mysqli_query($link, "insert into contact VALUES('NULL','$name','$email','$mobile','$message')");

        // Handling Success Message.
        if(mysqli_affected_rows($link)===1){
            setcookie("success","Thanks we will get back you soon!",time()+1);
            header("Location:contact_form.php");
        }

        else{
            setcookie("error","Sorry! Something went wrong.",time()+1);
            header("Location:contact_form.php");
        }

        // Form Finally Submitted  
        echo "Submitted!";
    }
    ?>
    <form action="" method="post" onsubmit="validate()">
        <legend>Enter your details correctly.</legend>

        <table>
            <tr>
                <td><label for="name">Name</label></td>
                <td><input type="text" id="name" name="name" placeholder="Ex. john deo"></td>
            </tr>
            <tr>
                <td> <label for="email">Email</label></td>
                <td> <input type="text" id="email" name="email" placeholder="Ex. john@gmail.com"></td>
            </tr>
            <tr>
                <td> <label for="mobile">Mobile</label></td>
                <td> <input type="text" id="mobile" name="mobile" placeholder="Ex. 7897845687"></td>
            </tr>
            <tr>
                <td> <label for="message">Message</label></td>
                <td><textarea name="message" id="message" rows="5" cols="50" placeholder="Tell us about yourself..."></textarea></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="submit" value="Save"></td>
            </tr>
        </table>

    </form>

    <script>
        function validate() {
            var name = document.getElementById("name");
            console.log(name.value);
            if (name.value.trim() === '') {
                alert("Please Enter your Name!");
            }
            var email = document.getElementById("email");
            console.log(email.value);
            if (email.value.trim() === '') {
                alert("Please Enter your Email!");
            }
            var mobile = document.getElementById("mobile");
            console.log(mobile.value);
            if (mobile.value.trim() === '') {
                alert("Please Enter your Mobile Number!");
            }
        }
    </script>
</body>

</html>
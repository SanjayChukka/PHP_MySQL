<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <style>
        /* * {
            box-sizing: border-box;
        } */

        body {
            /* color: white; */
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }

        /* #bg-video {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            z-index: -1;
        } */

        .form-control {
            width: 100%;
            height: 40px;
            border-radius: 15px;
            outline: none;
            border: 2px solid black;
        }

        .form-group {
            padding: 10px 0px;
        }

        .main {
            position: relative;
            z-index: 1;
            margin: 30px auto;
            padding: 0px 300px;
        }

        /* .main {
            width: 80%;
            margin: 30px auto;
            padding: 25px;
            background-color: white;
            border-radius: 15px;
        } */

        .mobile-group {
            display: flex;
            gap: 10px;
        }

        .mobile-group select {
            width: 100px;
        }

        .mobile-group input {
            flex: 1;
            min-width: 0;
        }

        #dob {
            display: flex;
            width: 150px;
            padding-left: 25px;
            box-sizing: border-box;
            text-align: center;
        }

        .btns {
            display: flex;
            justify-content: center;
            gap: 20px;
        }

        .submit,
        .reset {
            background-color: tomato;
            color: white;
            border: none;
            padding: 10px 25px;
            border-radius: 50px;
            cursor: pointer;
        }

        .reset {
            background-color: steelblue;
        }

        .submit:hover {
            background-color: orangered;
        }

        .full-name {
            display: flex;
            gap: 15px;
        }

        .full-name .form-group {
            flex: 1;
            min-width: 0;
        }

        /* #dob {
            display: flex;
            text-align: center;
            text-align-last: center;
            padding-left: 30px;
            font-size: 18px;
            border-radius: 20px;
        } */

        /* .form-control:focus {
            border: 2px solid tomato;
            outline: none;
            box-shadow: 0 0 5px rgba(255, 99, 71, 0.4);
        } */
    </style>
</head>

<body>
    <!-- <video autoplay muted loop playsinline id="bg-video">
        <source src="./pinterest_1794504241.mp4" type="video/mp4">
    </video> -->
    <div class="main">
        <h1>User Registration Form</h1>
        <h3>All fields are mandatory <span style="color: red;">*</span></h3>

        <!-- PHP -->

        <?php
        // Connecting at the beginning
        // include 'connection.php';

        // Filtering the inputs.
        function filterData($data)
        {
            return addslashes(strip_tags(trim($data)));
        }

        // Taking the input values from the form.
        if (isset($_POST['submit'])) {
            $fname = (isset($_POST['fname'])) ? filterData($_POST['fname']) : "";
            $lname = (isset($_POST['lname'])) ? filterData($_POST['lname']) : "";
            $gender = (isset($_POST['lname'])) ? filterData($_POST['lname']) : "";
            $dob = (isset($_POST['dob'])) ? filterData($_POST['dob']) : "";
            $uname = (isset($_POST['uname'])) ? filterData($_POST['uname']) : "";
            $email = (isset($_POST['email'])) ? filterData($_POST['email']) : "";
            $mobile = (isset($_POST['mobile'])) ? filterData($_POST['mobile']) : "";
            $pwd = (isset($_POST['pwd'])) ? filterData($_POST['pwd']) : "";
            $newPass = password_hash($pwd,PASSWORD_DEFAULT);
            $ip = $_SERVER['REMOTE_ADDR'];
            $token = md5(str_shuffle($uname.$email.$mobile.time()));

            // if wanted
            // $cpwd = (isset($_POST['cpwd'])) ? filterData($_POST['cpwd']) : "";

            // Connecting the Database.
            $con = mysqli_connect("localhost","root","","practice");
            // echo"connected! Bhai";
            

            // Inserting the data into the database.
            mysqli_query($con,"INSERT INTO users(first_name,last_name,gender,date_of_birth,username,email,mobile,password,ip_address,token)
            VALUES('$fname','$lname','$gender','$dob','$uname','$email','$mobile','$pwd','$ip','$token')");
        }

        ?>
        <form action="" method="post" onsubmit="return validate()" novalidate>
            <!-- Full name -->
            <div class="full-name">
                <div class="form-group">
                    <!-- First name -->
                    <label for="fname">First name</label>
                    <input type="text" id="fname" name="fname" class="form-control" onfocus="hideError(this)" onblur="checkError(this)">
                </div>
                <div class="form-group">
                    <!-- Last name -->
                    <label for="lname">Last name</label>
                    <input type="text" id="lname" name="lname" class="form-control" onfocus="hideError(this)" onblur="checkError(this)">
                </div>
            </div>

            <!-- Gender -->
            <div class="form-group">
                <label>Gender <span style="color: red;">*</span> : </label>
                <label for="male"><input type="radio" name="gender" value="Male" id="male">Male</label>
                <label for="female"><input type="radio" name="gender" value="Female" id="female">Female</label>
                <label for="other"><input type="radio" name="gender" value="other" id="other">Other</label>
            </div>

            <!-- DOB -->
            <div class="form-group">
                <label for="dob">Date of Birth</label>
                <input type="date" id="dob" name="dob" class="form-control" onfocus="hideError(this)" onblur="checkError(this)">
            </div>

            <!-- Username -->
            <div class="form-group">
                <label for="uname">Username</label>
                <input type="text" id="uname" name="uname" class="form-control" onfocus="hideError(this)" onblur="checkError(this)">
            </div>

            <!-- Email -->
            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" id="email" name="email" class="form-control" onblur="validateEmail(this)" onfocus="hideError(this)" onblur="checkError(this)">
            </div>
            <!-- Mobile -->
            <div class="form-group">
                <label for="mobile">Mobile Number</label>
                <div class="mobile-group">
                    <select name="country_code" class="form-control">
                        <option value="+91">+91 (India)</option>
                        <option value="+1">+1 (USA)</option>
                        <option value="+44">+44 (UK)</option>
                    </select>

                    <input type="tel" name="mobile"
                        pattern="[6-9][0-9]{9}"
                        maxlength="10"
                        id="mobile" class="form-control" onfocus="hideError(this)" onblur="checkError(this)">
                </div>
            </div>

            <!-- Password -->
            <div class="form-group">
                <label for="pwd">Password</label>
                <input type="password" id="pwd" name="pwd" class="form-control" onfocus="hideError(this)" onblur="checkError(this)">
            </div>
            <div class="form-group">
                <label for="cpwd">Confirm Password</label>
                <input type="password" id="cpwd" name="cpwd" class="form-control" onfocus="hideError(this)" onblur="checkError(this)">
            </div>

            <!-- Buttons -->
            <div class="btns">
                <input type="submit" name="submit" value="Submit" class="submit">
                <input type="reset" name="reset" value="Reset" class="reset">
            </div>
        </form>

        <script>
            // Validate Function
            function validate() {
                // First Name validation
                var fname = document.getElementById("fname");
                if (fname.value.trim() === "") {
                    fname.focus();
                    fname.style.cssText = "border:2px solid red";
                    return false;
                }

                // Last Name validation
                var lname = document.getElementById("lname");
                if (lname.value.trim() === "") {
                    lname.focus();
                    lname.style.cssText = "border:2px solid red";
                    return false;
                }

                // Gender Validation
                if (!(document.getElementsByName("gender")[0].checked == true ||
                        document.getElementsByName("gender")[1].checked == true ||
                        document.getElementsByName("gender")[2].checked == true)) {
                    alert("Please select Gender!");
                    return false;
                }

                // Date Of Birth validation
                var dob = document.getElementById("dob");
                if (dob.value.trim() === "") {
                    dob.focus();
                    dob.style.cssText = "border:2px solid red";
                    return false;
                }

                // Username  validation
                var uname = document.getElementById("uname");
                if (uname.value.trim() === "") {
                    uname.focus();
                    uname.style.cssText = "border:2px solid red";
                    return false;
                }

                // Email  validation
                var email = document.getElementById("email");
                if (email.value.trim() === "") {
                    email.focus();
                    email.style.cssText = "border:2px solid red";
                    return false;
                } else {
                    if (!validateEmail(email)) {
                        // alert("Enter a valid email address!");
                        email.style.cssText = "border:2px solid red";
                        return false;
                    }
                }

                // Mobile validation
                var mobile = document.getElementById("mobile");
                if (mobile.value.trim() === "") {
                    mobile.focus();
                    mobile.style.cssText = "border:2px solid red";
                    return false;
                } else {
                    var mobReg = /^[7-9][0-9]{9}$/;
                    if (!mobReg.test(mobile.value)) {
                        // alert("Enter a valid mobile number!");
                        mobile.focus();
                        mobile.style.cssText = "border:2px solid red";
                        return false;
                    }
                }

                // Password and Confirm Password validation
                var pwd = document.getElementById("pwd");
                if (pwd.value.trim() === "") {
                    pwd.focus();
                    pwd.style.cssText = "border:2px solid red";
                    return false;
                }
                var cpwd = document.getElementById("cpwd");
                if (cpwd.value.trim() === "") {
                    cpwd.focus();
                    cpwd.style.cssText = "border:2px solid red";
                    return false;
                }
                if (pwd.value !== cpwd.value) {
                    cpwd.style.cssText = "border:2px solid red";
                    // alert("Passwords does not matched!");
                    return false;
                }

            }

            // Set maximum DOB (18 years ago)

            // Way one

            // var dob = document.getElementById("dob");
            // var today = new Date();
            // today.setFullYear(today.getFullYear() - 18);
            // var maxDate = today.getFullYear() + "-" +
            //     String(today.getMonth() + 1).padStart(2, '0') + "-" +
            //     String(today.getDate()).padStart(2, '0');
            // dob.max = maxDate;

            // Way Two
            var dob = document.getElementById("dob");
            var today = new Date();
            today.setFullYear(today.getFullYear() - 18);
            dob.max = today.toISOString().split("T")[0];


            // Functions 

            // To hide the error when we focus the field 
            function hideError(element) {
                if (element.value.trim() === "") {
                    element.style.cssText = "border:2px solid black";
                }
            }

            // TO show the error when field is empty
            function checkError(element) {
                if (element.value.trim() !== "") {
                    element.style.cssText = "border:2px solid black";
                } else {
                    element.style.cssText = "border:2px solid red";
                }
            }

            // To check the valid email
            function validateEmail(element) {
                var pattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

                if (pattern.test(element.value.trim())) {
                    element.style.border = "2px solid black";
                    return true;
                } else {
                    element.style.border = "2px solid red";
                    return false;
                }
            }
        </script>
    </div>
</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <style>
        .form-control {
            width: 100%;
            height: 30px;
            border-radius: 10px;
            outline: none;
            border: 2px solid black;
        }

        .form-group {
            padding: 10px 0px;
        }

        .main {
            width: 40%;
            margin: 0px auto;
        }

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
            width: 200px
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

        /* .form-control:focus {
            border: 2px solid tomato;
            outline: none;
            box-shadow: 0 0 5px rgba(255, 99, 71, 0.4);
        } */
    </style>
</head>

<body>
    <h1>User Registration Form</h1>
    <h3>All fields are mandatory <span style="color: red;">*</span></h3>
    <div class="main">
        <form action="" method="post" onsubmit="return validate()">
            <!-- Full name -->
            <div class="full-name">
                <div class="form-group">
                    <label for="fname">First name</label>
                    <input type="text" id="fname" name="fname" class="form-control" onfocus="hideError(this)" onblur="checkError(this)">
                </div>
                <div class="form-group">
                    <label for="lname">Last name</label>
                    <input type="text" id="lname" name="lname" class="form-control" onfocus="hideError(this)" onblur="checkError(this)">
                </div>
            </div>

            <!-- Gender -->
            <div class="form-group">
                <label>Gender : </label>
                <label for="male"><input type="radio" name="gender" value="male" id="male">Male</label>
                <label for="female"><input type="radio" name="gender" value="female" id="female">Female</label>
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
                <label for="c-pwd">Confirm Password</label>
                <input type="password" id="c-pwd" name="c-pwd" class="form-control" onfocus="hideError(this)" onblur="checkError(this)">
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

                // Date Of Birth Name validation
                var dob = document.getElementById("dob");
                if (dob.value.trim() === "") {
                    dob.focus();
                    dob.style.cssText = "border:2px solid red";
                    return false;
                }

                // Username Of Birth Name validation
                var uname = document.getElementById("uname");
                if (uname.value.trim() === "") {
                    uname.focus();
                    uname.style.cssText = "border:2px solid red";
                    return false;
                }

                // Email Of Birth Name validation
                var email = document.getElementById("email");
                if (email.value.trim() === "") {
                    email.focus();
                    email.style.cssText = "border:2px solid red";
                    return false;
                }
                else{
                    if(!validateEmail(email.value)){
                        alert("Enter a valid email address!");
                        email.style.cssText = "border:2px solid red";
                        return false;
                    }
                }
                
                // Mobile Of Birth Name validation
                var mobile = document.getElementById("mobile");
                if (mobile.value.trim() === "") {
                    mobile.focus();
                    mobile.style.cssText = "border:2px solid red";
                    return false;
                }
                
            }

            function hideError(element) {
                if (element.value.trim() === "") {
                    element.style.cssText = "border:2px solid black";
                }
            }

            function checkError(element) {
                if (element.value.trim() !== "") {
                    element.style.cssText = "border:2px solid black";
                } else {
                    element.style.cssText = "border:2px solid red";
                }
            }

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
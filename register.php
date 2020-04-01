<?php
// Initialize the session
session_start();

// Include config file
require_once "config.php";

// Define variables and initialize with empty values
$name = $department = $username = $password = $repassword = "";
// $repassword_err = $username = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = "'" . strtoupper($_POST["surname"]) . "-" . strtoupper($_POST["yourname"]) . "-" . strtoupper($_POST["fathersname"]) . "-" . strtoupper($_POST["mothersname"]) . "'";
    $department = "'" . $_POST["department"] . "'";
    $username = "'" . $_POST["username"] . "'";
    $password = $_POST["password"];
    $repassword = $_POST["repassword"];

    //check if user exists in the department
    $path1 = str_replace("'", '', "data/$department/$name");

    if (file_exists($path1)) {
        $sql1 = "SELECT name, id FROM users WHERE name = $name";
        $result1 =  mysqli_query($link, $sql1);

        if (mysqli_num_rows($result1) > 0) {
            //already registered
            echo "<script type='text/javascript'>alert('Your are already reistered with us!');</script>";
        } else {
            if ($password != $repassword) {
                //passwords do not match
                echo "<script type='text/javascript'>alert('Passwords do not match!');</script>";
            } else {

                $sql2 = "SELECT username FROM users WHERE username = $username";
                $result2 =  mysqli_query($link, $sql2);
                if (mysqli_num_rows($result2) > 0) {
                    //already registered
                    echo "<script type='text/javascript'>alert('Username already exist!');</script>";
                } else {

                    // Creates a password hash
                    $hashed_password = "'" . password_hash($password, PASSWORD_DEFAULT) . "'";
                    echo "tango";
                    $sql = "INSERT INTO users (name, department, username, password) VALUES (" . strtoupper($name) . ", $department, $username, $hashed_password)";
                    if (mysqli_query($link, $sql)) {
                        echo "<script type='text/javascript'>alert('Registration successful!');</script>";
                        // Redirect to login page
                        header("location: index.php");
                    } else {
                        echo "Error: " . $sql . "<br>" . mysqli_error($link);
                    }
                }
            }
        }
        // }
    } else {
        echo "<script type='text/javascript'>alert('User does not exist in the department!');</script>";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registration Form</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <div class="main">

        <!-- Sign up form -->
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Registration</h2>
                        <form method="POST" class="register-form" id="register-form">
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="yourname" id="yourname" placeholder="Your Name"/>
                            </div>
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="surname" id="surname" placeholder="Your SurName"/>
                            </div>
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="fathersname" id="fathersname" placeholder="Your fathersname"/>
                            </div>
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="mothersname" id="mothersname" placeholder="Your mothersname"/>
                            </div>
                            <div class="form-group">
                            <div class="zmdi zmdi-account material-icons-name">
                                <select name="department">
                                    <option disabled="disabled" selected="selected">Choose option</option>
                                    <option value="COMPS">Computer Engineering</option>
                                    <option value="IT">Information Technology</option>
                                    <option value="EXTC">Electronics and Telecommunication</option>
                                    <option value="ETRX">Electronics</option>
                                </select>
                                <div class="select-dropdown"></div>
                            </div>
                            </div>

                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="username" id="username" placeholder="Username"/>
                            </div>
                            <div class="form-group">
                                <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="password" id="password" placeholder="Password"/>
                            </div>
                            <div class="form-group">
                                <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                                <input type="password" name="repassword" id="repassword" placeholder="Repeat your password"/>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
                                <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all statements in  <a href="#" class="term-service">Terms of service</a></label>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="signup" id="signup" class="form-submit" value="Register"/>
                            </div>
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="images/signup-image.jpg" alt="sing up image"></figure>
                        <a href="index.php" class="signup-image-link">I am already member</a>
                    </div>
                </div>
            </div>
        </section>

        <!-- Sing in  Form -->
        <section class="sign-in">
            <div class="container">
                <div class="signin-content">
                    <div class="signin-image">
                        <figure><img src="images/signin-image.jpg" alt="sing up image"></figure>
                        <a href="#" class="signup-image-link">Create an account</a>
                    </div>

                    <div class="signin-form">
                        <h2 class="form-title">Sign up</h2>
                        <form method="POST" class="register-form" id="login-form">
                            <div class="form-group">
                                <label for="your_name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="your_name" id="your_name" placeholder="Your Name"/>
                            </div>
                            <div class="form-group">
                                <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="your_pass" id="your_pass" placeholder="Password"/>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="remember-me" id="remember-me" class="agree-term" />
                                <label for="remember-me" class="label-agree-term"><span><span></span></span>Remember me</label>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="signin" id="signin" class="form-submit" value="Log in"/>
                            </div>
                        </form>
                        <div class="social-login">
                            <span class="social-label">Or login with</span>
                            <ul class="socials">
                                <li><a href="#"><i class="display-flex-center zmdi zmdi-facebook"></i></a></li>
                                <li><a href="#"><i class="display-flex-center zmdi zmdi-twitter"></i></a></li>
                                <li><a href="#"><i class="display-flex-center zmdi zmdi-google"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>

    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>
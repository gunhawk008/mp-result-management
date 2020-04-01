<?php


// Initialize the session
session_start();

// Check if the user is already logged in, if yes then redirect him to welcome page
if (!isset($_SESSION["loggedin"]) && !$_SESSION["loggedin"] === true) {
    header("location: index.php");
    exit;
}

    // Include config file
    require_once "config.php";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    
    $name = $_SESSION["name"];
    $oldpassword = $_POST["opassword"];
    $newpassword = $_POST["npassword"];
    $rnewpassword = $_POST["rnpassword"];

    $sql1 = "SELECT password FROM users WHERE name = '$name'";

    $result1 =  mysqli_query($link, $sql1);
    $temp = mysqli_fetch_assoc($result1);
    $hashed_password = $temp["password"];
    if (password_verify($oldpassword, $hashed_password)) {
        if($newpassword == $rnewpassword){
        // Creates a password hash
        $hashed_newpassword = "'" . password_hash($newpassword, PASSWORD_DEFAULT) . "'";

        $sql = "UPDATE users SET password=$hashed_newpassword WHERE name = '$name'";
        if (mysqli_query($link, $sql)) {
            // Redirect user to welcome page
            header("location: logout.php");
        }
    }
    else{
        echo "<script type='text/javascript'>alert('New passwords do not match.');</script>";
    }
    } else {
        echo "<script type='text/javascript'>alert('The password you entered is incorrect.');</script>";
    }
}
// Close connection
mysqli_close($link);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Change Password Form</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <div id="navMenu">
        Results
        <button id="viewResultsBtn" onclick="window.location='viewResults.php'" style="display:none">View Results</button>
        <button id="moveResultsBtn" onclick="window.location='moveResults.php'" style="display:none">Upload Results</button>
        <button id="logoutBtn" onclick="window.location='logout.php'">Logout</button>
    </div>
    <script>
        var isadmin = <?php
                        echo$_SESSION["isadmin"];
                        ?>;
                        console.log(isadmin);
        if (isadmin) {
            document.getElementById("moveResultsBtn").style.display = "";
        } else {
            document.getElementById("viewResultsBtn").style.display = "";
        }
    </script>

    <div class="main">

        <!-- Sign up form -->
        
        <!-- Sing in  Form -->
        <section class="sign-in">
            <div class="container">
                <div class="signin-content">
                    <div class="signin-image">
                        <figure><img src="images/signin-image.jpg" alt="sing up image"></figure>
                        <a href="register.php" class="signup-image-link">Create an account</a>
                    </div>

                    <div class="signin-form">
                        <h2 class="form-title">New Password</h2>
                        <form method="POST" class="register-form" id="login-form">
                            <div class="form-group">
                                <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="opassword" id="opassword" placeholder="Old Password"/>
                            </div>
                            <div class="form-group">
                                <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="npassword" id="npassword" placeholder="Enter New Password"/>
                            </div>
                            <div class="form-group">
                                <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="rnpassword" id="rnpassword" placeholder="Re-Enter New Password"/>
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
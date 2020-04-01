<?php

// Initialize the session
session_start();
// Check if the user is already logged in, if yes then redirect him to welcome page
if (!isset($_SESSION["loggedin"]) && !$_SESSION["loggedin"] === true) {
    header("location: ../index.php");
    exit;
} 
if ($_SESSION["isadmin"] == 0) {
    header("location: ../viewResults.php");
    exit;
}

?>
<html>

<head>
    
<title>Create Department</title>

<!-- Navbar -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<link href="https://fonts.googleapis.com/css?family=Quicksand:300,400,500,700,900" rel="stylesheet">
<link rel="stylesheet" href="../fonts/icomoon/style.css">
<link rel="stylesheet" href="../css/bootstrap.min.css">
<link rel="stylesheet" href="../css/navbarStyle.css">
<!-- Navbar ends -->

    <style>
    </style>
    <title>Results</title>
    <link rel="stylesheet" href="moveResults.css">
</head>

<!-- Navbar -->

<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">

    <div class="site-wrap">

        <div class="site-mobile-menu site-navbar-target">
            <div class="site-mobile-menu-header">
                <div class="site-mobile-menu-close mt-3">
                    <span class="icon-close2 js-menu-toggle"></span>
                </div>
            </div>
            <div class="site-mobile-menu-body"></div>
        </div>

        <div class="border-bottom top-bar py-2 bg-dark" id="home-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <p class="mb-0">
                            <span class="mr-3"><strong class="text-white">Phone:</strong> <a href="tel://#">+1 234 5678
                                    9101</a></span>
                            <span><strong class="text-white">Email:</strong> <a href="#">info@yourdomain.com</a></span>
                        </p>
                    </div>
                    <div class="col-md-6">
                        <ul class="social-media">
                            <li><a href="#" class="p-2"><span class="icon-facebook"></span></a></li>
                            <li><a href="#" class="p-2"><span class="icon-twitter"></span></a></li>
                            <li><a href="#" class="p-2"><span class="icon-instagram"></span></a></li>
                            <li><a href="#" class="p-2"><span class="icon-linkedin"></span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <header class="site-navbar py-4 bg-white js-sticky-header site-navbar-target" role="banner">

            <div class="container">
                <div class="row align-items-center">

                    <div class="col-11 col-xl-2" style="flex: 0 0 40.66667%; max-width: 40.66667%">
                        <h1 class="mb-0 site-logo"><a href="index.html" class="text-black h2 mb-0">Result Management System<span class="text-primary">.</span> </a></h1>
                    </div>
                    <div class="col-12 col-md-10 d-none d-xl-block" style="flex: 0 0 58.33333%; max-width: 58.33333%">
                        <nav class="site-navigation position-relative text-right" role="navigation">

                            <ul class="site-menu main-menu js-clone-nav mr-auto d-none d-lg-block">
                                <li><a href="#home-section" class="nav-link">Home</a></li>
                                <li><a href="./moveResults.php" class="nav-link">Results</a></li>
                                <li class="has-children">
                                    <a href="" class="nav-link">Departments</a>
                                    <ul class="dropdown">
                                        <li><a href="./viewDepts.php">View Departments</a></li>
                                        <li><a href="./createDept.php">Add Department</a></li>
                                    </ul>
                                </li>
                                <li class="has-children">
                                    <a href="" class="nav-link">Users</a>
                                    <ul class="dropdown">
                                        <li><a href="./viewUsers.php">View Users</a></li>
                                        <li><a href="./createUser.php">Add Users</a></li>
                                    </ul>
                                </li>
                                <li class="has-children"><a href="" class="nav-link">My Account</a>
                                    <ul class="dropdown">
                                        <li><a href="../changePassword.php">Change Password</a></li>
                                        <li><a href="../logout.php">Logout</a></li>
                                    </ul></li>
                            </ul>
                        </nav>
                    </div>

                    <div class="d-inline-block d-xl-none ml-md-0 mr-auto py-3" style="position: relative; top: 3px;"><a href="#" class="site-menu-toggle js-menu-toggle text-black"><span class="icon-menu h3"></span></a></div>

                </div>
            </div>

        </header>

    </div> <!-- .site-wrap -->

    <script src="../js/jquery-3.3.1.min.js"></script>
    <!-- Navbar ends -->

    <div id="grid-container">
    </div>
    <center>
        <div id="moveResultDiv">
            <p id="yesMove" style="display:none"></p>
            <p id="noMove">There are no Results to be moved.</p>
            <button id="resultUpload" onclick="window.location='moveIt.php'" style="display:none">Move It!</button>
        </div>
    </center>
    <script>
        console.log("movin it!");
        var filesCheck = <?php $out = array();
                            foreach (glob('input/*') as $filename)
                                $out[] = pathinfo($filename);
                            echo json_encode($out);
                            ?>;
        if (filesCheck[0]) {
            document.getElementById("resultUpload").style.display = "";
            document.getElementById("yesMove").innerHTML = "There are " + filesCheck.length + " Results to be moved.";
            document.getElementById("noMove").style.display = "none";
            document.getElementById("yesMove").style.display = "";
        }
    </script>


<!-- footer -->
<footer class="site-footer" style="padding: 2em 0;    bottom: 0; width: 100%;   position: relative;">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="row">
                        <div class="col-md-5" style="flex: 0 0 100%; max-width: 100%">
                            <h2 class="footer-heading mb-4">About Us</h2>
                            <p>This project is useful for students and institutions for getting the results in simple manner and secure way. The system is intended for the student.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <h2 class="footer-heading mb-4">Subscribe Newsletter</h2>
                    <form action="#" method="post">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control border-secondary text-white bg-transparent" placeholder="Enter Email" aria-label="Enter Email" aria-describedby="button-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary text-white" type="button" id="button-addon2">Send</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </footer>
<!-- footer ends -->

</body>

</html>
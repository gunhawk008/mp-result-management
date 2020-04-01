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

    <title>View Users</title>

    <!-- Navbar -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Quicksand:300,400,500,700,900" rel="stylesheet">
    <link rel="stylesheet" href="../fonts/icomoon/style.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/navbarStyle.css">
    <!-- Navbar ends -->

    <script type="text/javascript" src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
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
                                    </ul>
                                </li>
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
    <br><center>
    <div id="users"></div>
    </center>
    <script>
        var count = 0;
        var table = "<table id='userTable' style='border-collapse: collapse; width: 80%; border: 1px solid #ddd; padding: 8px; padding-top: 12px; padding-bottom: 12px; text-align: left;'><tr style=' background-color: #333333; color: white; '><th>Surname</th><th>Given Name</th><th>Father's Name</th><th>Mother's Name</th><th>Department</th><th>Registered on Portal</th></tr>";
        var datad = new Array();
        $.post('./getSubfolders.php', {
            folder: "../data",
            dept: "",
            async: false
        }, function(data) {
            console.log("from other side");
            // console.log(data);
            datad = data;
            datad = datad.replace(/\[/g, '');
            datad = datad.replace(/\]/g, '');
            datad = datad.replace(/\"/g, '');
            // console.log(data)
            datad = datad.split(",")
            console.log("data")
            console.log(datad)
            for (i = 0; i < datad.length; i++) {
                console.log(datad.length)
                console.log(datad[0])
                $.post('./getSubfolders.php', {
                    folder: "../data/" + datad[i],
                    dept: datad[i],
                    async: false
                }, function(data1) {
                    // console.log(data);
                    data1 = data1.replace(/\[/g, '');
                    data1 = data1.replace(/\]/g, '');
                    data1 = data1.replace(/\"/g, '');
                    // console.log(data)
                    data1 = data1.split(",")
                    console.log("data1")
                    console.log(data1)
                    for (k = 0; k < data1.length; k++) {

                        table += "<tr  style='border: 1px solid #ddd; padding: 8px;'>";
                        // table+="<tr>"+datad[i]+"</tr>";
                        var isRegistered = "";
                        $.post('./isUserRegistered.php', {
                            user: data1[k] + k,
                            async: false
                        }, function(data) {
                            // console.log("is registered?")
                            // console.log(data)
                            data = data.replace(/\"/g, '');
                            isRegistered = data;
                            console.log(isRegistered)
                            console.log(document.getElementById('userTable').getElementsByTagName('tr')[isRegistered.slice(-1)]);
                            var node = document.createElement("td");
                            node.innerHTML = isRegistered.substring(0, isRegistered.length - 1);
                            document.getElementById('userTable').getElementsByTagName('tr')[parseInt(isRegistered.slice(-1)) + 1].appendChild(node);
                            // table += "<td>" + isRegistered + "</td>";
                        });


                        data1[k] = data1[k].split("-")
                        console.log("data1")
                        console.log(data1)
                        for (j = 0; j < data1[k].length; j++) {
                            table += "<td>" + data1[k][j] + "</td>";
                        }
                        table += "</tr>";
                        if (k == data1.length - 1) {
                            table += "</table>";
                            document.getElementById("users").innerHTML = table;
                            console.log(table)
                        }
                    }
                });
            }
        });
    </script>

    <!-- footer -->
    <footer class="site-footer" style="padding: 2em 0;    bottom: 0; width: 100%;   position: absolute;">
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
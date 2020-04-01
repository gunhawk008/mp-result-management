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

    <title>Create User</title>

    <!-- Navbar -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Quicksand:300,400,500,700,900" rel="stylesheet">
    <link rel="stylesheet" href="../fonts/icomoon/style.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/navbarStyle.css">
    <!-- Navbar ends -->

    <script type="text/javascript" src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/PapaParse/5.1.0/papaparse.min.js">
    </script>

    <style>
        label {
            width: 200px;
        }
    </style>

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

    <center>
        <br>
        <label>Surname</label>
        <input type="text" id="Surname" required /><br>
        <label>Student's Name</label>
        <input type="text" id="StudentsName" required /><br>
        <label>Father's Name</label>
        <input type="text" id="FathersName" required /><br>
        <label>Mother's name</label>
        <input type="text" id="MothersName" required /><br>
        <label>Department</label>
        <input type="text" id="Department" required /><br>
        <button type="submit" id="submit-newDept" class="btn btn-primary">Create User</button>
        <br>
        <br>
        <hr style="display:inline-block; width:45%">
        OR
        <hr style="display:inline-block; width:45%">
        <br>
        <br>
        <input type="file" id="files" class="form-control" accept=".csv" required /><br>
        <button type="submit" id="submit-file" class="btn btn-primary">Upload File</button>
        <br>
        <br>
    </center>
    <script>
        $('#submit-newDept').on("click", function(e) {
            var newUser = new Array(document.getElementById("Surname").value + "-" + document.getElementById(
                    "StudentsName").value + "-" + document.getElementById("FathersName").value +
                "-" + document.getElementById("MothersName").value);
            var userDept = new Array(document.getElementById("Department").value);
            e.preventDefault();
            console.log("calling post")
            $.post('./createUsers1.php', {
                Users: newUser,
                Dept: userDept
            }, function(data) {
                console.log("from other side");
                console.log(data);
                document.getElementById("Surname").value = "";
                document.getElementById("StudentsName").value = "";
                document.getElementById("FathersName").value = "";
                document.getElementById("MothersName").value = "";
                document.getElementById("Department").value = "";
                alert("User created successfully.")
            });
        });
    </script>
    <script>
        $('#submit-file').on("click", function(e) {
            e.preventDefault();
            $('#files').parse({
                config: {
                    delimiter: "auto",
                    complete: displayHTMLTable,
                },
                before: function(file, inputElem) {
                    //console.log("Parsing file...", file);
                },
                error: function(err, file) {
                    //console.log("ERROR:", err, file);
                },
                complete: function() {
                    //console.log("Done with all files");
                }
            });
        });

        var newUsers = new Array();
        var newUsersDept = new Array();

        function displayHTMLTable(results) {
            console.log(results.data);
            for (i = 1; i < results.data.length; i++) {
                console.log(results.data[i]);
                if (results.data[i] != "") {
                    results.data[i] = results.data[i][0].split(",");
                    newUsers[i - 1] = "";
                    newUsersDept[i - 1] = results.data[i][0];
                    for (j = 1; j < results.data[i].length; j++) {
                        console.log(results.data[i][j]);
                        newUsers[i - 1] += results.data[i][j] + "-";
                    }
                    newUsers[i - 1] = newUsers[i - 1].substring(0, newUsers[i - 1].length - 1);
                }
            }
            console.log("New Users");
            console.log(newUsers);
            console.log("New Users Dept");
            console.log(newUsersDept);
            post();
        }

        function post() {
            console.log("calling post")
            $.post('./createUsers1.php', {
                Users: newUsers,
                Dept: newUsersDept
            }, function(data) {
                console.log("from other side");
                console.log(data);
            });
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
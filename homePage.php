<?php

// Initialize the session
session_start();

// Check if the user is already logged in, if yes then redirect him to welcome page
if(!isset($_SESSION["loggedin"]) && !$_SESSION["loggedin"] === true){
    header("location: index.php");
    exit;
} else if($_SESSION["isadmin"]){
    header("location: admin/viewUsers.php");
    exit;
}

?>
<html>

<head>
    <title>Results</title>

    <link rel="stylesheet" href="viewResults.css">
     <!-- Navbar -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<link href="https://fonts.googleapis.com/css?family=Quicksand:300,400,500,700,900" rel="stylesheet">
<link rel="stylesheet" href="fonts/icomoon/style.css">
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/navbarStyle.css">
<!-- Navbar ends -->
</head>

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
                        <h1 class="mb-0 site-logo"><a href="index.php" class="text-black h2 mb-0">Result Management System<span class="text-primary">.</span> </a></h1>
                    </div>
                    <div class="col-12 col-md-10 d-none d-xl-block" style="flex: 0 0 58.33333%; max-width: 58.33333%">
                        <nav class="site-navigation position-relative text-right" role="navigation">

                            <ul class="site-menu main-menu js-clone-nav mr-auto d-none d-lg-block">
                                <li><a href="index.php" class="nav-link">Home</a></li>
                                <li><a href="viewResults.php" class="nav-link">Results</a></li>
                                <li> <a href="viewDepts.php" class="nav-link">Departments</a></li>
                                <li class="has-children"><a href="" class="nav-link">My Account</a>
                                    <ul class="dropdown">
                                        <li><a href="changePassword.php">Change Password</a></li>
                                        <li><a href="logout.php">Logout</a></li>
                                    </ul></li>
                            </ul>
                        </nav>
                    </div>

                    <div class="d-inline-block d-xl-none ml-md-0 mr-auto py-3" style="position: relative; top: 3px;"><a href="#" class="site-menu-toggle js-menu-toggle text-black"><span class="icon-menu h3"></span></a></div>

                </div>
            </div>

        </header>


		<!-- categories section -->
		<section id="about">
			<div class="container">
				<div class="section-title pt-5">
					<h1>University Of Mumbai</h1>
					<p>The University of Mumbai is one of the oldest and premier Universities of India. I am honoured and greatly privileged to lead this great
						 Institution; and continue to address the imminent challenges and to harness theovert and covert opportunities, in order to satisfy our stake 
						 holders. A unique of its kind, currently the University has 56 Departments, 12 specialized Centres, 781 Affiliated Colleges, 2 main Campuses, 2
                         sub Campuses, 2 Model Colleges, and the ‘School of Engineering and Applied Sciences’ at Kalyan as the University’s own Engineering College.</p><br>
                    
                         <img src="images/mumbai_university.jpg" alt="">
                </div>
                <br><br><br><br>
                <div>
                    
                <h2>Campuses</h2><br><br>
                <h3>Kalina Campus</h3>
<p>The Kalina campus in suburban Mumbai covers an area of 93 hectares (230 acres) and houses graduate training and research centres. Departments offering courses in the sciences, technology, commerce, and humanities are located here. Most colleges of engineering and medicine affiliated to the University of Mumbai, though, are privately owned. The university does not have its own engineering or medicine departments.

Centres and institutes located in the Kalina Campus include:

Examination House, also known as Mahatma Jyotirao Phule Bhavan houses the office of the Controller of Examinations. Centralized assessment of answer books for various departments is carried out in a separate four-storey annexe. Examination processes were made more efficient by the introduction of online delivery of question papers for examinations, and assessment of answer books by scanning at remote examination centres. The academic depository of the university was started in collaboration with CDSL in 2015. The university is the first university in the country to start an academic depository. [11]
National Centre for Nanosciences and Nanotechnology — a research facility
Department of Biophysics — the only such department in western India
Jawaharlal Nehru Library</p><br>
<img src="images/kalina.jpg" >
<br><br>
</div>
		
	
		</section>


	
<!-- footer -->
<footer class="site-footer" style="padding: 2em 0;   bottom: 0; width: 100%; position:relative;">
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
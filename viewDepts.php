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

        <br><br><br><br>
        <section class="categories-section spad" id="courses">
		<div class="container">
			<div class="section-title">
				<h2>Our Course Categories</h2>
				<p>Over special courses provides the best exposure with the practical knowlege and one of the best tutors that you can ever have.</p><br><br><br>
			</div>
			<div class="row">
				<!-- categorie -->
				<div class="col-lg-4 col-md-6">
					<div class="categorie-item">
						<div class="ci-thumb set-bg" data-setbg="img/categories/1.jpg"></div>
						<div class="ci-text">
							<h5>IT Development</h5>
							<p>Software can be developed for a variety of purposes, the three most common being to meet specific needs of a specific client/business </p>
							
						</div>
					</div>
				</div>
				<!-- categorie -->
				<div class="col-lg-4 col-md-6">
					<div class="categorie-item">
						<div class="ci-thumb set-bg" data-setbg="img/categories/2.jpg"></div>
						<div class="ci-text">
							<h5>Web Design</h5>
							<p>Marketing and communication design on a website may identify what works for its target market, attract more audience and 
								make more money out of it.
							</p>
							
						</div>
					</div>
				</div>
				<!-- categorie -->
				<div class="col-lg-4 col-md-6">
					<div class="categorie-item">
						<div class="ci-thumb set-bg" data-setbg="img/categories/3.jpg"></div>
						<div class="ci-text">
							<h5>Illustration & Drawing</h5>
							<p>A drawing is often an exploratory form of visual art. This means that drawings pay considerable emphasis on observation, 
								problem solving and composition</p><br><br>
							
						</div>
					</div>
				</div>
				<!-- categorie -->
				<div class="col-lg-4 col-md-6">
					<div class="categorie-item">
						<div class="ci-thumb set-bg" data-setbg="img/categories/4.jpg"></div>
						<div class="ci-text">
							<h5>Data Science</h5>
							<p>The Sexiest Job of the 21st Century", DJ Patil claims to have coined this term in 2008 with Jeff Hammerbacher to define their jobs at LinkedIn and Facebook, respectively.</p>
							
						</div>
					</div>
				</div>
				<!-- categorie -->
				<div class="col-lg-4 col-md-6">
					<div class="categorie-item">
						<div class="ci-thumb set-bg" data-setbg="img/categories/5.jpg"></div>
						<div class="ci-text">
							<h5>App Development</h5>
							<p>Mobile app development is becoming more critical for many businesses with more than 3 billion people worldwide using smartphones.</p>
						
						</div>
					</div>
				</div>
				<!-- categorie -->
				<div class="col-lg-4 col-md-6">
					<div class="categorie-item">
						<div class="ci-thumb set-bg" data-setbg="img/categories/6.jpg"></div>
						<div class="ci-text">
							<h5>Cryptocurrencies</h5>
							<p>A cryptocurrency  is a digital asset designed to work as a medium of exchange that uses strong cryptography to secure financial transactions.</p>
							
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

<!-- footer -->
<footer class="site-footer" style="padding: 2em 0;   top:80%;  bottom: 0; width: 100%;">

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
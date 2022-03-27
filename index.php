<!doctype html>
<html lang="en">
  <head>
	<?php require_once("php/rest.php")?> <!-- Execute php rest script -->
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/css.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Red+Hat+Display:ital,wght@0,400;0,500;0,700;1,400;1,500;1,700&family=Red+Hat+Text:ital,wght@0,400;0,500;0,700;1,400;1,500;1,700&display=swap" rel="stylesheet"> 

	<title>Hello, world!</title>
  </head>
  <body>
	<h1>Hello Navbar!</h1>

    <header class="d-flex flex-column align-items-center">
        <img src="assets/halalan-2022-title.svg" alt="#Halalan2022" class="header-wordmark mb-3">
        <h1 class="header-subtitle"><strong>TLS</strong> 2022 National Election Web Special</h1>
    </header>

	<main class="container">
		<!-- First Row -->
		<div class="row">
			<!-- News Bites -->
			<section class="col-lg-4 col-md-12">News Bites</section>
			<!-- Articles -->
			<section class="col-lg-8 col-md-12">
				Articles
			</section>
		</div>
		<!-- Second Row -->
		<div class="row">
            <!-- Debate, Forum, Interview Highlights -->
			<section class="col">Highlights</section>
		</div>
		<!-- Third Row -->
		<div class="row">
            <!-- Candidate Profiles -->
			<section class="col">Candidate Profiles</section>
		</div>
	</main>
	<footer>
		<h1>Hello, footer!</h1>
	</footer>
    
	<!-- Bootstrap Bundle with Popper -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>

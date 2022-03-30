<!doctype html>
<html lang="en">
  <head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Bootstrap CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/css.css">

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
			<section id="highlights" class="col">
				<div class="section-heading-container border-top border-4 mb-2 py-2 d-flex flex-column flex-lg-row justify-content-lg-between align-items-lg-center">
					<h4 class="mb-4 m-lg-0">Debate, Forum, & Interview Highlights</h4>

					<!-- Presidentiables, etc. Buttons -->
					<ul class="nav nav-pills justify-content-center" id="pills-tab" role="tablist">
						<li class="nav-item mx-3" role="presentation">
							<button class="nav-link p-0 active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Presidentiables</button>
						</li>
						<li class="nav-item mx-3" role="presentation">
							<button class="nav-link p-0" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Vice Presidentiables</button>
						</li>
						<li class="nav-item mx-3 me-lg-0" role="presentation">
							<button class="nav-link p-0" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Senatoriables</button>
						</li>
					</ul>
				</div>
				
				

				<!-- Main Highlights Container -->
				<div class="tab-content" id="pills-tabContent">
					<!-- Presidentiables -->
					<div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
						<div class="row row-cols-1 row-cols-md-2 g-2">

							<!-- PHP Loop to Render President Cards-->
							<?php
								$debatesList = json_decode( file_get_contents("highlights-info/president-highights.json"), true );

								foreach($debatesList as $item) { //foreach element in $arr
									$highlightTitle = $item['title']; 
									$highlightDate = $item['date']; 
									$highlightVisual = $item['visual']; 
									$highlightURL = $item["url"];
							?>
								<div class="col">
									<a href="<?php echo $highlightURL; ?>" target="_blank">
										<div class="card border-0">
											<div class="row g-0">
												<div class="col-5 col-sm-4 col-lg-5 p-2">
													<img src="<?php echo $highlightVisual; ?>" alt="" class="card-img highlight-img">
												</div>
												<div class="col-7 col-sm-8 col-lg-7 d-flex">
													<div class="card-body d-flex flex-column justify-content-center">
														<h5 class="card-title"><?php echo $highlightTitle; ?></h5>
														<p class="card-text"><?php echo $highlightDate; ?></p>
													</div>
												</div>
											</div>
										</div>
									</a>
								</div>
							<?php } ?>

						</div>
					</div>

					<!-- Vice Presidentiables -->
					<div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
						<div class="row row-cols-1 row-cols-md-2 g-2">

							<!-- PHP Loop to Render VP Cards -->
							<?php
								$debatesList = json_decode( file_get_contents("highlights-info/vp-highlights.json"), true );

								foreach($debatesList as $item) { //foreach element in $arr
									$highlightTitle = $item['title']; 
									$highlightDate = $item['date']; 
									$highlightVisual = $item['visual']; 
									$highlightURL = $item["url"];
							?>
								<div class="col">
									<a href="<?php echo $highlightURL; ?>" target="_blank">
										<div class="card border-0">
											<div class="row g-0">
												<div class="col-5 col-sm-4 col-lg-5 p-2">
													<img src="<?php echo $highlightVisual; ?>" alt="" class="card-img highlight-img">
												</div>
												<div class="col-7 col-sm-8 col-lg-7 d-flex">
													<div class="card-body d-flex flex-column justify-content-center">
														<h5 class="card-title"><?php echo $highlightTitle; ?></h5>
														<p class="card-text"><?php echo $highlightDate; ?></p>
													</div>
												</div>
											</div>
										</div>
									</a>
								</div>
							<?php } ?>

						</div>
					</div>

					<!-- Senatoriables -->
					<div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">

						<!-- Forums -->
						<h6 class="mt-3 mb-3">CNN Philippines Senatorial Forums</h6>
						<div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-2 mb-5">

							<!-- PHP Loop to Render Senator Cards-->
							<?php
								$debatesList = json_decode( file_get_contents("highlights-info/sen-forum-highlights.json"), true );

								foreach($debatesList as $item) { //foreach element in $arr
									$highlightTitle = $item['title']; 
									$highlightDate = $item['date']; 
									$highlightVisual = $item['visual']; 
									$highlightURL = $item["url"];
							?>
								<div class="col">
									<a href="<?php echo $highlightURL; ?>" target="_blank">
										<div class="card border-0">
											<div class="row g-0">
												<div class="col-5 col-sm-4 col-lg-5 p-2">
													<img src="<?php echo $highlightVisual; ?>" alt="" class="card-img highlight-img">
												</div>
												<div class="col-7 col-sm-8 col-lg-7 d-flex">
													<div class="card-body d-flex flex-column justify-content-center">
														<h5 class="card-title"><?php echo $highlightTitle; ?></h5>
														<p class="card-text"><?php echo $highlightDate; ?></p>
													</div>
												</div>
											</div>
										</div>
									</a>
								</div>
							<?php } ?>

						</div>

						<!-- Debates -->
						<h6 class="mb-3">Senatorial Debates</h6>
						<div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-2">

							<!-- PHP Loop to Render Senator Cards-->
							<?php
								$debatesList = json_decode( file_get_contents("highlights-info/sen-debate-highlights.json"), true );

								foreach($debatesList as $item) { //foreach element in $arr
									$highlightTitle = $item['title']; 
									$highlightDate = $item['date']; 
									$highlightVisual = $item['visual']; 
									$highlightURL = $item["url"];
							?>
								<div class="col">
									<a href="<?php echo $highlightURL; ?>" target="_blank">
										<div class="card border-0">
											<div class="row g-0">
												<div class="col-5 col-sm-4 col-lg-5 p-2">
													<img src="<?php echo $highlightVisual; ?>" alt="" class="card-img highlight-img">
												</div>
												<div class="col-7 col-sm-8 col-lg-7 d-flex">
													<div class="card-body d-flex flex-column justify-content-center">
														<h5 class="card-title"><?php echo $highlightTitle; ?></h5>
														<p class="card-text"><?php echo $highlightDate; ?></p>
													</div>
												</div>
											</div>
										</div>
									</a>
								</div>
							<?php } ?>

						</div>

					</div>

				</div>





			</section>
		</div>
		<!-- Third Row -->
		<div class="row">
            <!-- Candidate Profiles -->
			<section class="col">Candidate Profiles</section>
		</div>
	</main>
	<!-- Footer -->
	<footer class="py-5">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-sm-12 d-flex flex-column align-items-center align-items-lg-start text-center text-lg-start">
					<!-- Logo -->
					<img src="assets/tls-star.svg" alt="The LaSallian Star" class="footer-logo mb-4">
					<!-- Footer Text -->
					<p class="footer-description"><strong>The LaSallian</strong> is the official student publication of De La Salle University. It is of the students, by the students, and for the students. Our student writers, photographers, artists, and web managers are committed to the 60-year tradition of journalistic excellence and issue-oriented critical thinking.</p>
					<!-- Social Media Links/Icons -->
					<ul class="nav">
						<li class="nav-item">
							<a href="https://facebook.com/thelasallian" class="nav-link ps-lg-0"><i class="bi-facebook aria-label="Facebook"></i></a>
						</li>
						<li class="nav-item">
							<a href="https://twitter.com/thelasallian" class="nav-link"><i class="bi-twitter" aria-label="Twitter"></i></a>
						</li>
						<li class="nav-item">
							<a href="https://instagram.com/thelasallian" class="nav-link"><i class="bi-instagram" aria-label="Instagram"></i></a>
						</li>
						<li class="nav-item">
							<a href="https://t.me/joinchat/BIPblhaXuBk3ZTNl" class="nav-link"><i class="bi-telegram" aria-label="Telegram"></i></a>
						</li>
						<li class="nav-item">
							<a href="mailto:info@thelasallian.com" class="nav-link"><i class="bi-envelope-fill" aria-label="Email"></i></a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</footer>
    
	<!-- Bootstrap Bundle with Popper -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>

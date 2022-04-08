<!doctype html>
<html lang="en">
  <head>
	<?php require_once("php/rest.php")?> <!-- Execute php rest script -->
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
		<div class="row mb-4">

			<!-- Newsbits -->
			<section id="newsbits" class="col-lg-4 col-md-12">

				<!-- Heading -->
				<div class="sec-heading-container border-top border-4 mb-2 py-2 d-flex justify-content-between align-items-center">
					<h4 class="mb-0">Newsbits</h4>
					<a href="https://thelasallian.com/kicker/halalan-2022/" target="_blank" class="sec-heading-link">
						All Tweets <i class="bi-box-arrow-in-up-right" aria-label="Right Arrow"></i>
					</a>
				</div>

				<!-- Tweets -->

				<?php for ($i = 0; $i < 5; $i++) { 
					$tweetData = $_SESSION["TWITTER_INFO"];

					$tweetText = $tweetData["data"][$i]["text"];
					$tweetTimestamp = $tweetData["data"][$i]["created_at"];
					
				?>
					

					<div class="tweet-card p-3 border">
						<div class="tweet-card-header d-flex justify-content-between">
							<!-- Logo and Username -->
							<div class="d-flex">
								<img src="assets/tls-twitter-avatar.png" class="tweet-avatar" alt="">
								<div>
									<h5>The LaSallian</h5>
									<h6>@thelasallian</h6>
								</div>
							</div>
							<!-- Timestamp and Logo -->
							<div class="d-flex">
								<p><?php echo date('M d, g:i A', $tweetTimestamp); ?></p>
								<img src="assets/twitter-logo.svg" class="tweet-twitter-logo" alt="">
							</div>
						</div>
						<div class="tweet-card-content">
							<p class="m-0"><?php echo $tweetText; ?></p>
						</div>
					</div>
				<?php } ?>

			</section>

			<!-- Articles -->
			<section id="articles" class="col-lg-8 col-md-12">

				<!-- Heading -->
				<div class="sec-heading-container border-top border-4 mb-2 py-2 d-flex justify-content-between align-items-center">
					<h4 class="mb-0">Articles</h4>
					<a href="https://thelasallian.com/kicker/halalan-2022/" target="_blank" class="sec-heading-link">
						All Articles <i class="bi-arrow-right-short" aria-label="Right Arrow"></i>
					</a>
				</div>

				<!-- Container for Card Grid -->
				<div class="row row-cols-1 row-cols-md-2 g-2">
					
					<!-- PHP Loop to Render Cards -->
					<?php for ($i = 0; $i < 6; $i++) { 
						$data = $_SESSION["ARTICLE_INFO"];

						$date = $data[$i]["date"];
						$link = $data[$i]["link"];
						$title = $data[$i]["title"]["rendered"];

						for ($j = 0; $j < 3; $j++) {
							if ($j == 0) {
								$authors .= $data[$i]["authors"][$j]["display_name"];
							} else if ($j > 0 && !empty($data[$i]["authors"][$j]["display_name"]) ) {
								$authors .= ", ";
								$authors .= $data[$i]["authors"][$j]["display_name"];
							}
						}

						$media = $data[$i]["jetpack_featured_media_url"];
					?>
						<div class="col">
							<a href="<?php echo $link; ?>" target="_blank">
								<div class="card border-0 p-2 d-flex flex-column justify-content-end">
									<img src="<?php echo $media; ?>" alt="" class="card-img h-25 flex-grow-1"> <!-- flex grow wouldn't work without setting a height -->
									<!-- <div class="bg-primary flex-grow-1">Test</div> -->
									<div class ="p-3 pt-4">
										<h5 class="card-title"><?php echo $title; ?></h5>
										<p class="card-text"><?php echo $authors; ?></p>
									</div>
								</div>
							</a>
						</div>
					<?php $authors = ""; } ?>
				</div>

			</section>

		</div>

		<!-- Second Row -->
		<div class="row">

            <!-- Debate, Forum, Interview Highlights -->
			<section id="highlights" class="col">

				<!-- Heading -->
				<div class="sec-heading-container border-top border-4 mb-2 py-2 d-flex flex-column flex-lg-row justify-content-lg-between align-items-lg-center">
					<h4 class="mb-4 m-lg-0">Debate, Forum, & Interview Highlights</h4>

					<!-- Bootstrap Pills: Presidentiables, Vice Presidentiables, Senatoriables -->
					<ul class="nav nav-pills d-flex justify-content-around" id="pills-tab" role="tablist">
						<li class="nav-item mx-lg-3" role="presentation">
							<button class="nav-link p-0 active" id="pills-pres-tab" data-bs-toggle="pill" data-bs-target="#pills-pres" type="button" role="tab" aria-controls="pills-pres" aria-selected="true">Presidentiables</button>
						</li>
						<li class="nav-item mx-lg-3" role="presentation">
							<button class="nav-link p-0" id="pills-vp-tab" data-bs-toggle="pill" data-bs-target="#pills-vp" type="button" role="tab" aria-controls="pills-vp" aria-selected="false">Vice Presidentiables</button>
						</li>
						<li class="nav-item mx-lg-3 me-lg-0" role="presentation">
							<button class="nav-link p-0" id="pills-senator-tab" data-bs-toggle="pill" data-bs-target="#pills-senator" type="button" role="tab" aria-controls="pills-senator" aria-selected="false">Senatoriables</button>
						</li>
					</ul>
				</div>
				
				<!-- Container for Card Grid -->
				<div class="tab-content" id="pills-tabContent">

					<!-- Presidential Debates et al. -->
					<div class="tab-pane fade show active" id="pills-pres" role="tabpanel" aria-labelledby="pills-pres-tab">
						<div class="row row-cols-1 row-cols-md-2 g-2">
							<!-- PHP Loop to Render President Cards-->
							<?php
								$debatesList = json_decode( file_get_contents("json/president-highights.json"), true );

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
													<img src="<?php echo $highlightVisual; ?>" alt="" class="card-img">
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
					<div class="tab-pane fade" id="pills-vp" role="tabpanel" aria-labelledby="pills-vp-tab">
						<div class="row row-cols-1 row-cols-md-2 g-2">
							<!-- PHP Loop to Render VP Cards -->
							<?php
								$debatesList = json_decode( file_get_contents("json/vp-highlights.json"), true );

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
													<img src="<?php echo $highlightVisual; ?>" alt="" class="card-img">
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
					<div class="tab-pane fade" id="pills-senator" role="tabpanel" aria-labelledby="pills-senator-tab">
						
						<!-- Cards for CNN PH Senatorial Forums -->
						<h6 class="mt-4 mb-3 fst-italic">CNN Philippines Senatorial Forums</h6>
						<div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-2">
							<!-- PHP Loop to Render Senator Cards-->
							<?php
								$debatesList = json_decode( file_get_contents("json/sen-forum-highlights.json"), true );

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
													<img src="<?php echo $highlightVisual; ?>" alt="" class="card-img">
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

						<!-- Cards for non-CNN Senatorial Debates et al. -->
						<h6 class="mt-4 mb-3 fst-italic">Senatorial Debates</h6>
						<div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-2">
							<!-- PHP Loop to Render Senator Cards-->
							<?php
								$debatesList = json_decode( file_get_contents("json/sen-debate-highlights.json"), true );

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
													<img src="<?php echo $highlightVisual; ?>" alt="" class="card-img">
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
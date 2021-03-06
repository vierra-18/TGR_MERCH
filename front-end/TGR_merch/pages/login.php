<?php 
	session_start();
	if( !(isset($_SESSION['wrong'])) )
    {
        $_SESSION['wrong'] = null;
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="stylesheet" href="../styles/css/login_style.css" type="text/css" />
	<link rel="stylesheet" href="../styles/css/aos.css" />
	<link rel="icon" type="image/x-icon" href="../styles/images/favicon.ico">
	<script crossorigin="anonymous" src="https://kit.fontawesome.com/c8e4d183c2.js"></script>
	
	<title>Teletigers Admin Login</title>
</head>

<body>
	<div class="header_logo">
		<a href="#" data-aos="fade-right" data-aos-delay="1000"><img src="../styles/images/LOGO_TELETIGERS 3.png" /></a>
	</div>
	<div class="container">
		<div class="left">
			<div class="header">
				<h2 data-aos="zoom-out-right" data-aos-delay="1200" data-aos-duration="1400">
					LOGIN
				</h2>
			</div>
			<form action="order_control.php" class="form" method="post" autocomplete="off">
				<input data-aos="zoom-out-right" data-aos-delay="1400" data-aos-duration="1400" type="text" name="username"
				class="form-field" placeholder="Username" />
				<input data-aos="zoom-out-right" data-aos-delay="1600" data-aos-duration="1400" type="password" name="password"
				 class="form-field" placeholder="Password" />

				<input data-aos="zoom-out" data-aos-delay="1800" data-aos-duration="1400" type="submit"
					value="Log-in" name="login" />
			</form>

			<!-- fix this Robin/Zee-->
			<br>
			<div style="align-self:flex-end; margin-right: 10%;"> <!-- Wooo scary inline styles wooooo -->
				<p style="color:#EE4B2B;"><?php echo $_SESSION['wrong'];?></p> <!-- This is an Error that pops up if you have the wrong credentials -->
			</div>

		</div>

		<section class="right">
			<div class="background"></div>
		</section>
		<div class="tgr-text">
			<h1 data-aos="slide-right">
				#USTTGR<span class="tgr tgr-1">VALORANT</span>EXIA
			</h1>
			<h1 data-aos="slide-left">
				TELETIGERSHY<span class="tgr tgr-2">MLBB</span>TELETIGERS
			</h1>
			<h1 data-aos="slide-right">
				#USTWIN<span class="tgr tgr-3">TELETIGERS</span>TGRWIN
			</h1>
			<h1 data-aos="slide-left">
				TTGRWIN<span class="tgr tgr-4">WILDRIFTPH</span>TELETIGERS
			</h1>
			<h1 data-aos="slide-right" data-aos-anchor=".tgr-1">
				BESTSUPP<span class="tgr tgr-5">LOLPH</span>CRESHO
			</h1>
		</div>
	</div>

	
	<!-- FOOTER -->
	<section class="main-footer-container">
		<div class="footer-row">
			<div class="footer-left-col">
				<div class="text-row">
					<div class="info-tab">
						<h1>Information</h1>
						<a href="">
							<h2>About Teletigers</h2>
						</a>
						<a href="">
							<h2>Teletigers website</h2>
						</a>
						<a href="">
							<h2>FAQs</h2>
						</a>
					</div>
					<div class="info-tab">
						<h1>Customer Services</h1>
						<a href="help.php">
							<h2>Return Policy</h2>
						</a>
						<a href="help.php">
							<h2>Accessibility</h2>
						</a>
						<a href="help.php">
							<h2>Terms and Conditions</h2>
						</a>
					</div>
					<div class="info-tab">
						<h1>Affiliates</h1>
						<!-- Fatherless Behavior-->
						</a>
					</div>
				</div>
			</div>
			<div class="footer-right-col">
				<div class="footer-logo"><a href="#"><img src="../styles/images/LOGO_TELETIGERS 3.png"
							class="tgr_logo">
						<h1 class="text_logo">TELETIGERS</h1>
					</a></div>
				<div class="contact" id="contact">
					<ul>
						<li>
							<a href="https://www.facebook.com/TeletigersEsports"><i
									class="fab fa-facebook-f"></i></a>
						</li>
						<li>
							<a href="https://twitter.com/Teletigers_"><i class="fab fa-twitter"></i></a>
						</li>
						<li>
							<a href="#"><i class="fab fa-instagram"></i></a>
						</li>
						<li>
							<a href="#"><i class="fab fa-twitch"></i></a>
						</li>
						<li>
							<a href="#"><i class="fab fa-youtube"></i></a>
						</li>
					</ul>
				</div>
				<div class="text">all rights reserved 2022</div>
			</div>
		</div>
	</section>
</body>

<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="../styles/js/aos.js"></script>
<script>
	AOS.init({
		duration: 2000,
	});
</script>
<script>
	for (let i = 0; i < 5; i++) {
		setTimeout(function () {
			$(`.tgr-\${1 + i}`).addClass("active");
		}, 2000 + i * 100);
	}
</script>

</html>
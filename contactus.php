<? php
include_once("header.php");
?>
<head>
	<!--<meta name="viewport" content="width=device-width, initial-scale=1.0">-->
	<title>CONTACT US</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

	<link rel="stylesheet" type="text/css" href="contactstyle.css">
	<style>
		p.ex1:hover, p.ex1:active {font-size: 150%;}
		h4.ex3:hover, h4.ex3:active {font-size: 150%;}
	</style>
</head>
<body>

	

	<section class="contact">


		<div class="content">
			<h2>CONTACT US</h2>
			<p>GET IN TOUCH WITH US</p>
		</div>
		<div class="container">
			<div class="contactInfo">
				<div class="box">
					<div class="icon"><i class="fa fa-facebook" aria-hidden="true"></i></div>
					<div class="text">
						<h4 class="ex3"><a class="ex2" href="https://www.facebook.com/Zero-hunger-104457591647705" target="_blank" style="color: black;"><b>Facebook</b></a></h4>
						<p class="ex1" style="color: black;"><b>Zero-hunger</b></p>
					</div>
				</div>

				<div class="box">
					<div class="icon"><i class="fa fa-twitter" aria-hidden="true"></i></div>
					<div class="text">
						<h4 class="ex3"><a class="ex2" href="https://twitter.com/ZerohungerH" target="_blank" style="color: black;"><b>Twitter</b></a></h4>
						<p class="ex1" style="color: black;"><b>ZerohungerH</b></p>
					</div>
				</div>

				<div class="box">
					<div class="icon"><i class="fa fa-instagram" aria-hidden="true"></i></div>
					<div class="text">
						<h4 class="ex3"><a class="ex2" href="https://www.instagram.com/zerohungerhyd/" target="_blank" style="color: black;"><b>Instagram</b></a></h4>
						<p class="ex1"style="color: black;"><b>zerohungerhyd</b></p>
					</div>
				</div>

				<div class="box">
					<div class="icon"><i class="fa fa-phone" aria-hidden="true"></i></div>
					<div class="text">
						<h4 class="ex3" style="color: white;"><b>Phone</b></h4>
						<p class="ex1" style="color: white;"><b>8593739088</b></p>
					</div>
				</div>

				<div class="box">
					<div class="icon"><i class="fa fa-envelope-o" aria-hidden="true"></i></div>
					<div class="text">
						<h4 class="ex3" style="color: white;"><b>Email</b></h4>
						<p class="ex1"><b>zerohungerhyd@gmail.com</b></p>
					</div>
				</div>

			</div>
			<div class="contactForm">
				<form method="POST" action="contactushandle.php">
					<h2>SEND MESSAGE</h2>
					<div class="inputBox">
						<input type="text" name="name" required="required">
						<span>Full Name</span>
					</div>
					<div class="inputBox">
						<input type="text" name="email" required="required">
						<span>Email Address</span>
					</div>
					<div class="inputBox">
						<textarea name="message" required="required"></textarea>
						<span>Type Your Message...</span>
					</div>
					<div class="inputBox">
						<input type="submit" name="" value="Send">
					</div>
				</form>
			</div>
		</div>
	</section>
</body>
</html>
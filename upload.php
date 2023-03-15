<?php

include 'conn3.php';

if(isset($_POST['done'])){

 $name = $_POST['name'];
 $incharge = $_POST['incharge'];
 $food = $_POST['food'];
 $quantity = $_POST['quantity'];
 $email = $_POST['email'];
 $contact = $_POST['contact'];
 $area = $_POST['area'];
 $address = $_POST['address'];
 $q = " INSERT INTO `details`(`name`, `incharge`, `food`, `quantity`, `email`, `contact`, `area`, `address`) VALUES ('$name','$incharge','$food','$quantity','$email','$contact','$area','$address')";

 $query = mysqli_query($con,$q);
}
?>

<!DOCTYPE html>
<html>
<head>
 <title>UPLOAD FOOD DETAILS</title>

<meta charset="UTF-8">
 	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
   
  <!--<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>-->
</head>
<body>

<nav class="navbar navbar-inverse">
	  <div class="container-fluid">
	    <div class="navbar-header">
	      <a class="navbar-brand" href="index.php">ZERO HUNGER</a>
	    </div>
	    <ul class="nav navbar-nav">
	      <li class="active"><a href="uploaderhome.php">Home</a></li>
	      <li><a href="aboutus.php">About Us</a></li>
	      <li><a href="contactus.php">Contact Us</a></li>
	    </ul>
	    <ul class="nav navbar-nav navbar-right">
	      <li><a href="logoutupload.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
	    </ul>
	  </div>
	</nav>

<div class="container">
    	<br>
    	<h1 class="text-white bg-dark text-center" style="background-color: black; color: white">UPLOAD FOOD DETAILS</h1>
    	<div class="col-lg-12 m-auto d-block">
    	<form method="post">
    		
    		<div class="form-group">
    			<label for="user">NAME : </label>
    			<input type="text" name="name" id="user" class="form-control">
    		</div>

    		<div class="form-group">
    			<label for="user">INCHARGE NAME : </label>
    			<input type="text" name="incharge" id="user" class="form-control">
    		</div>

    		<div class="form-group">
    			<label for="user">FOOD  : </label>
    			<input type="text" name="food" id="user" class="form-control">
    		</div>

    		<div class="form-group">
    			<label for="user">QUANTITY : </label>
    			<input type="text" name="quantity" id="user" class="form-control">
    		</div>

    		<div class="form-group">
    			<label for="user">EMAIL ID : </label>
    			<input type="text" name="email" id="user" class="form-control">
    		</div>

    		<div class="form-group">
    			<label for="user">CONTACT : </label>
    			<input type="text" name="contact" id="user" class="form-control">
    		</div>

    		<div class="form-group">
    			<label for="user">AREA : </label>
    			<input type="text" name="area" id="user" class="form-control">
    		</div>

    		<div class="form-group">
    			<label for="user">ADDRESS : </label>
    			<input type="text" name="address" id="user" class="form-control">
    		</div>


    		<button class="btn btn-success" type="submit" name="done" onclick="myFunction()"> Submit </button><br>
			
			<script>
function myFunction() {
  alert("Your food details have been uploaded successfully!");
}
</script>

    	</form>
</div>

    </div>

 
</body>
</html>
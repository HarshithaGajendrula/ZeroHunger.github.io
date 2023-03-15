<!DOCTYPE html>
<html>
<head>
 <title>FOOD DETAILS</title>

 <meta charset="UTF-8">
 	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
   
</head>
<body>

<nav class="navbar navbar-inverse">
	  <div class="container-fluid">
	    <div class="navbar-header">
	      <a class="navbar-brand" href="index.php">ZERO HUNGER</a>
	    </div>
	    <ul class="nav navbar-nav">
	      <li class="active"><a href="consumerhome.php">Home</a></li>
	      <li><a href="aboutus.php">About Us</a></li>
	      <li><a href="contactus.php">Contact Us</a></li>
	    </ul>
	    <ul class="nav navbar-nav navbar-right">
	      <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
	    </ul>
	  </div>
	</nav>

 <div class="container-fluid">
 <div class="col-lg-12">
 
 <h1 class="text-warning text-center" > FOOD DETAILS </h1>
 
 
 <div class="container">
  <br>
   <div class="row">

   <?php 

     $conn = new mysqli('localhost', 'root', '', 'uploadfood');
     if(isset($_GET['search'])){
        $searchKey = $_GET['search'];
        $sql = "SELECT * FROM `details` WHERE area LIKE '%$searchKey%'";
     }else{
        $sql = "SELECT * FROM `details`";
        $searchKey = "";
   }
     $result = $conn->query($sql);
   ?>

   <form action="" method="GET"> 
     <div class="col-md-6">
        <input type="text" name="search" class='form-control' placeholder="Search By Area" value="" > 
     </div>
     <div class="col-md-6 text-left">
      <button class="btn">Search</button>
     </div>
   </form>

   <br> <br> <br>
</div>
</div>
 
 <table  id="tabledata" class=" table table-striped table-hover table-bordered">
 
 <tr class="bg-dark text-white text-center" style="background-color: black;color: white;">
 <th style="text-align: center;"> HOTEL NAME </th>
 <th style="text-align: center;"> INCHARGE NAME </th>
 <th style="text-align: center;"> FOOD </th>
 <th style="text-align: center;"> QUANTITY </th>
 <th style="text-align: center;"> EMAIL </th>
 <th style="text-align: center;"> CONTACT </th>
 <th style="text-align: center;"> AREA </th>
 <th style="text-align: center;"> ADDRESS </th>
 <th style="text-align: center;"> ORDER </th>

 </tr >

 <?php
 while($res = mysqli_fetch_array($result)){
 ?>
 <tr class="text-center">
 <td> <?php echo $res['name'];  ?> </td>
 <td> <?php echo $res['incharge'];  ?> </td>
 <td> <?php echo $res['food'];  ?> </td>
 <td> <?php echo $res['quantity'];  ?> </td>
 <td> <?php echo $res['email'];  ?> </td>
 <td> <?php echo $res['contact'];  ?> </td>
 <td> <?php echo $res['area'];  ?> </td>
 <td> <?php echo $res['address'];  ?> </td>
 <td> <button class="btn-success btn" onclick="myFunction()"> <a href="delete.php?id=<?php echo $res['id']; ?>" class="text-white"> ORDER </a>  </button> </td>
 
 <script>
function myFunction() {
  alert("Your order has been placed successfully!");
  alert("Hope this food will be reached to needy people");
}
</script>

 </tr>

 <?php 
 }
  ?>
 
 </table>  

 </div>
 </div>

 <script type="text/javascript">
 
 $(document).ready(function(){
 $('#tabledata').DataTable();
 }) 
 
 </script>

</body>
</html>
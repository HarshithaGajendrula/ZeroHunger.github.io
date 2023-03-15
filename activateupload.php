<?php 

	session_start();

	include 'dbcon1.php';

	if(isset($_GET['token'])){

		$token = $_GET['token'];

		$updatequery = " update registration set status = 'active' where token = '$token' ";

		$query = mysqli_query($con, $updatequery);

		if($query){
			if(isset($_SESSION['msg'])){
				$_SESSION['msg'] = "Account activated successfully. Please login. ";
				header('location:uploadlogin.php');
			}else{
				$_SESSION['msg'] = "You are logged out.";
				header('location:uploadlogin.php');
			}
		}else{
			$_SESSION['msg'] = "Account not activated";
			header('location:uploadregister.php');
		}

	}

?>
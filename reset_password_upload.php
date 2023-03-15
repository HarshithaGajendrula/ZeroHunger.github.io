<?php 
  session_start();
  ob_start();
?>
<!DOCTYPE html>
<html>
<head>
  <title>RESET PASSWORD</title>
  <?php include 'css/style.php' ?>
  <?php include 'links/link.php' ?>
</head>
<body>

<?php 

    include 'dbcon1.php';
    
    if(isset($_POST['submit'])){

      if (isset($_GET['token'])) {
        
      $token = $_GET['token'];

      $newpassword = mysqli_real_escape_string($con,$_POST['password']);
      $cpassword = mysqli_real_escape_string($con,$_POST['cpassword']);

      $pass = password_hash($newpassword, PASSWORD_BCRYPT);
      $cpass = password_hash($cpassword, PASSWORD_BCRYPT);

        if($newpassword === $cpassword){

            $updatepassword = " update registration set password = '$pass' where token = '$token' ";

            $iquery = mysqli_query($con, $updatepassword);

            if($iquery){
                
                $_SESSION['msg'] = " Your password has been updated ";
                header('location:uploadlogin.php');
            }

            else{
                $_SESSION['passmsg'] = "Your Password has not been updated";
                header('location:reset_password_upload.php');
            }

        }
        else{
          $_SESSION['passmsg'] = "Passwords are not matching";
        }
      }
      else{
        echo "Token has not been found";
      }
}


?>


   <div class="card bg-light">
     <article class="card-body mx-auto" style="max-width: 400px">
       <h4 class="card-title mt-3 text-center">Create Account</h4>
       <p class="text-center">Enter Details </p>

       <p class="bg-info text-white px-5"> 
        <?php 
            if(isset($_SESSION['passmsg'])){
              echo $_SESSION['passmsg']; 
            }
            else{
              echo $_SESSION['passmsg'] = "" ;
            }
        ?>
      </p>
       
       <form action="" method="POST">
        <!--1-->
       
       <div class="form-group input-group">
         <div class="input-group-prepend">
           <span class="input-group-text">
             <i class="fa fa-lock"></i>
           </span>
         </div>
         <input  name="password" class="form-control" placeholder="New Password" type="password" required>
       </div>

       <!--2-->
        <div class="form-group input-group">
         <div class="input-group-prepend">
           <span class="input-group-text">
             <i class="fa fa-lock"></i>
           </span>
         </div>
         <input  name="cpassword" class="form-control" placeholder="Confirm Password" type="password" required>
       </div>         
          
          <div class="form intput-group">
            <button type="submit" name="submit" class="btn btn-primary btn-block"> Update Password  </button>
          </div>
       </form>

     </article>
   </div>
</body>
</html>
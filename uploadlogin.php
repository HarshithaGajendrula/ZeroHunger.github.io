<?php 
  session_start();
  ob_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>FOOD UPLOADER LOGIN</title>
	 <?php include 'css/style.php' ?>
  <?php include 'links/link.php' ?>
</head>
<body>

<?php 
    include 'dbcon1.php';
    
    if(isset($_POST['submit'])){
        $email = $_POST['email'];
        $password = $_POST['password'];

        $email_search = " select * from registration where email = '$email' and status = 'active' ";
        $query = mysqli_query($con, $email_search);

        $email_count = mysqli_num_rows($query);

      if($email_count){
          $email_pass = mysqli_fetch_assoc($query);

          $db_pass = $email_pass['password'];

          $_SESSION['username'] = $email_pass['username'];

          $pass_decode = password_verify($password, $db_pass);

          if($pass_decode){
            
            if(isset($_POST['remeberme'])){
              setcookie('emailcookie', $email, time()+86400);

              setcookie('passwordcookie', $password, time()+86400);

              header('location: uploaderhome.php');
            }
            else{
               header('location: uploaderhome.php');
            }

          }
          else{
            ?>
          <script>
             alert("Password Is Incorrect");
          </script>
        <?php
          }
      }
      else{
        ?>
          <script>
             alert("Invalid Email");
          </script>
        <?php
      }

    }

?>

<div class="card bg-light">
     <article class="card-body mx-auto" style="max-width: 400px">
      <br><br>
       <h4 class="card-title mt-3 text-center">Login Into Your Account</h4>
       <p class="text-center">Enter Details </p>
       <!--<p> 
         <a href="" class="btn btn-block btn-gmail"> <i class="fa fa-google"> </i> Login via Gmail </a>
          <a href="" class="btn btn-block btn-facebook"> <i class="fa fa-facebook"> </i> Login via facebook </a>
       </p>
       <p class="divider-text">
         <span class="bg-light">OR</span>
       </p>-->

       <div>
         <p class="bg-success text-white px-4"> <?php 

            if(isset($_SESSION['msg'])){
              echo $_SESSION['msg'];
            }else{
              echo $_SESSION['msg'] = "You are logged out. Please login again." ;
            }

         ?> </p>
       </div>

       <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">
       	
       	<div class="form-group input-group">
           <div class="input-group-prepend">
             <span class="input-group-text">
               <i class="fa fa-user"></i>
             </span>
           </div>
           <input  name="email" class="form-control" placeholder="Email ID" type="email" value="<?php if(isset($_COOKIE['emailcookie'])) { echo $_COOKIE['emailcookie']; } ?>" required>
         </div>

        <div class="form-group input-group">
         <div class="input-group-prepend">
           <span class="input-group-text">
             <i class="fa fa-lock"></i>
           </span>
         </div>
         <input  name="password" class="form-control" placeholder="Password" type="password" value="<?php if(isset($_COOKIE['passwordcookie'])) { echo $_COOKIE['passwordcookie']; } ?>" required>
       </div>

       <div class="form-group">
         <input type="checkbox" name="remeberme"> Remeber Me
       </div>

         <div class="form intput-group">
            <button type="submit" name="submit" class="btn btn-primary btn-block"> Log In  </button>
          </div>
          <br>
          <p class="text-center"> Forgot Your Password? <a href="recover_email_upload.php">Click here</a> </p>
          <p class="text-center"> Don't Have  an  Account? <a href="uploadregister.php">Sign up here</a> </p>
       </form>

       </form>
</body>
</html>
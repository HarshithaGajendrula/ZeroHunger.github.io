<?php 
  session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <title>FOOD UPLOADER REGISTRATION</title>
  <?php include 'css/style.php' ?>
  <?php include 'links/link.php' ?>
</head>
<body>

<?php 

    include 'dbcon1.php';
    
    if(isset($_POST['submit'])){
      $username = mysqli_real_escape_string($con,$_POST['username']);
      $hotelname = mysqli_real_escape_string($con,$_POST['hotelname']);
      $email = mysqli_real_escape_string($con,$_POST['email']);
      $address = mysqli_real_escape_string($con,$_POST['address']);
      $mobile = mysqli_real_escape_string($con,$_POST['mobile']);
      $password = mysqli_real_escape_string($con,$_POST['password']);
      $cpassword = mysqli_real_escape_string($con,$_POST['cpassword']);

      $pass = password_hash($password, PASSWORD_BCRYPT);
      $cpass = password_hash($cpassword, PASSWORD_BCRYPT);

      $token = bin2hex(random_bytes(15));

      $emailquery = " select * from registration where email = '$email' ";
      $query = mysqli_query($con, $emailquery);

      $emailcount = mysqli_num_rows($query);

      if($emailcount > 0){
        ?>
          <script>
             alert("Email Already Exists");
          </script>
        <?php
      }
      else{
        if($password ===$cpassword){

            $insertquery = " insert into registration( username,hotelname, email, address, mobile, password, cpassword, token, status) values('$username', '$hotelname', '$email', '$address', '$mobile', '$pass','$cpass','$token', 'inactive') ";

            $iquery = mysqli_query($con, $insertquery);

            if($iquery){
                
                $subject = "Email Activation";
                $body = "Hi, $username. Click here to activate your email account http://localhost/sip/activateupload.php?token=$token ";
                $sender_email = "From: zerohungerhyd@gmail.com";

                if (mail($email, $subject, $body, $sender_email)) {
                    $_SESSION['msg'] = "Check $email to activate your account";
                    header('location:uploadlogin.php');
                } else {
                    echo "Email sending failed...";
                }
            }

            else{
                ?>
                    <script>
                        alert("Not Inserted");
                    </script>
                <?php
            }

        }
        else{
          ?>
            <script>
              alert("Passwords are not matching")
             </script>
          <?php
        }
      }

    }

?>


   <div class="card bg-light">
     <article class="card-body mx-auto" style="max-width: 400px">
       <h4 class="card-title mt-3 text-center">Create Account</h4>
       <p class="text-center">Enter Details </p>
       <!--<p> 
         <a href="" class="btn btn-block btn-gmail"> <i class="fa fa-google"> </i> Login via Gmail </a>
          <a href="" class="btn btn-block btn-facebook"> <i class="fa fa-facebook"> </i> Login via facebook </a>
       </p>
       <p class="divider-text">
         <span class="bg-light">OR</span>
       </p>-->
       <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">
        <!--1-->
         <div class="form-group input-group">
           <div class="input-group-prepend">
             <span class="input-group-text">
               <i class="fa fa-user"></i>
             </span>
           </div>
           <input  name="username" class="form-control" placeholder="Full name" type="text" required>
         </div>
        
        <!--2-->
        <div class="form-group input-group">
         <div class="input-group-prepend">
           <span class="input-group-text">
             <i class="fa fa-user"></i>
           </span>
         </div>
         <input  name="hotelname" class="form-control" placeholder="Hotel name" type="text" required>
       </div>

       <!--3-->
       <div class="form-group input-group">
         <div class="input-group-prepend">
           <span class="input-group-text">
             <i class="fa fa-envelope"></i>
           </span>
         </div>
         <input  name="email" class="form-control" placeholder="Email Address" type="email" required>
       </div>

       <!--4-->
       <div class="form-group input-group">
         <div class="input-group-prepend">
           <span class="input-group-text">
             <i class="fa fa-map-marker"></i>
           </span>
         </div>
         <input  name="address" class="form-control" placeholder="Address" type="address" required>
       </div>

       <div class="form-group input-group">
         <div class="input-group-prepend">
           <span class="input-group-text">
             <i class="fa fa-map-marker"></i>
           </span>
         </div>
         <input  name="mobile" class="form-control" placeholder="Phone Number" type="number" required>
       </div>

       <!--5-->
       <div class="form-group input-group">
         <div class="input-group-prepend">
           <span class="input-group-text">
             <i class="fa fa-lock"></i>
           </span>
         </div>
         <input  name="password" class="form-control" placeholder="Password" type="password" required>
       </div>

       <!--6-->
        <div class="form-group input-group">
         <div class="input-group-prepend">
           <span class="input-group-text">
             <i class="fa fa-lock"></i>
           </span>
         </div>
         <input  name="cpassword" class="form-control" placeholder="Confirm Password" type="password" required>
       </div>         
          
          <div class="form intput-group">
            <button type="submit" name="submit" class="btn btn-primary btn-block"> Create Account  </button>
          </div>
          <p class="text-center">Have  an  Account? <a href="uploadlogin.php">Log In</a> </p>
       </form>

     </article>
   </div>
</body>
</html>
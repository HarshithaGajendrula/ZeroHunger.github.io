<?php 
  session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <title>PASSWORD RESET</title>
  <?php include 'css/style.php' ?>
  <?php include 'links/link.php' ?>
</head>
<body>

<?php 

    include 'dbcon1.php';
    
    if(isset($_POST['submit'])){
      $email = mysqli_real_escape_string($con,$_POST['email']);

      $emailquery = " select * from registration where email = '$email' ";
      $query = mysqli_query($con, $emailquery);

      $emailcount = mysqli_num_rows($query);

      if($emailcount){

                $userdata = mysqli_fetch_array($query);

                $username = $userdata['username'];
                $token = $userdata['token'];
        
                $subject = "Reset Your Password";
                $body = "Hi, $username. Click here to reset your password http://localhost/sip/reset_password_upload.php?token=$token ";
                $sender_email = "From: zerohungerhyd@gmail.com";

                if (mail($email, $subject, $body, $sender_email)) {
                    $_SESSION['msg'] = "Check $email to reset your password";
                    header('location:uploadlogin.php');
                } else {
                    echo "Email sending failed...";
                }
                
      }
      else {
                    echo "Email not found...";
                }

    }

?>


   <div class="card bg-light">
     <article class="card-body mx-auto" style="max-width: 400px">
       <h4 class="card-title mt-3 text-center">Reset Your Password</h4>
       <p class="text-center">Enter Email Id Correctly </p>
       
       <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">
        

       <!--1-->
       <div class="form-group input-group">
         <div class="input-group-prepend">
           <span class="input-group-text">
             <i class="fa fa-envelope"></i>
           </span>
         </div>
         <input  name="email" class="form-control" placeholder="Email Address" type="email" required>
       </div>
    
          
          <div class="form intput-group">
            <button type="submit" name="submit" class="btn btn-primary btn-block"> Send Mail  </button>
          </div>
       </form>

     </article>
   </div>
</body>
</html>
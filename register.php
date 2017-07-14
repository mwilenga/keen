<?php
session_start();
include('dBConfig/dBConnect.php');
 include('includes/header.php');
 include('login.php');

  if(isset($_POST['register'])){
  	$fname = ucfirst(mysql_real_escape_string($_POST['fname']));
  	$lname = ucfirst(mysql_real_escape_string($_POST['lname']));
  	$email = mysql_real_escape_string($_POST['email']);
  	$password = mysql_real_escape_string($_POST['password']);
  	if($fname == '' || $lname == '' || $email == '' || $password == ''){
  		$sms = "<p style='color:#b64645;'>Sorry all fields are required</p>";
  	}else{
       $insert = mysql_query("insert into tms_customers values('','$fname','$lname','$email','$password','','')");
       if($insert){
       	$sms = "<p style='color:green;>You have successfully registered, login now to proceed</p>";
       }else{
       	$sms = "<p style='color:#b64645;>Something went wrong...!</p>";
       }
   	 }
    }
?>

    <section id="contentSection">
    <div class="row">
      <div class="col-lg-6 col-md-6 col-sm-6">
        <div class="left_content">
          <div class="contact_area">
            <h2>Get sign in</h2>
            <form action="" method="POST" class="contact_form">
             <?php if(isset($err_sms)){ echo $err_sms; } ?>
              <input class="form-control" name="email" type="email" placeholder="Email*">
              <input class="form-control" name="password" type="password" placeholder="Password*"><br/>
              <p><a href = "">Forgot password?</a></p>
              <input name="login" type="submit" value="LogIn">
              </form>
          </div>
        </div>
      </div>
      <div class="col-lg-6 col-md-6 col-sm-6">
        <div class="left_content">
			<div class="contact_area">
            <div class="left_content">
            <div class="contact_area">
            <h2>Sign up now</h2>
            <form action="" method="POST" class="contact_form">
            <?php if(isset($sms)){ echo $sms; } ?>
              <input class="form-control" name="fname" type="text" placeholder="First Name">
              <input class="form-control" name="lname" type="text" placeholder="Last Name">
              <input class="form-control" name="email" type="text" placeholder="Email address">
              <input class="form-control" name="password" type="password" placeholder="Password*"><br/>
              <input name="register" type="submit" value="Sign up">
              </form>
          </div>
        </div>
        </div>
      </div>
    </div>
  </section>

<?php include('includes/footer.php'); ?>
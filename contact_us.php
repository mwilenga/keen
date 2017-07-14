<?php
session_start();
include('dBConfig/dBConnect.php');
 include('includes/header.php');

  if(isset($_POST['submit'])){
  	$name = ucfirst(mysql_real_escape_string($_POST['name']));
  	$sms = ucfirst(mysql_real_escape_string($_POST['message']));
  	$email = mysql_real_escape_string($_POST['email']);
    $date = date('Y-m-d');
  	if($name == ''){
  		$sms = "<p style='color:#b64645;'>Sorry all fields are required</p>";
  	}else{
       $insert = mysql_query("insert into tms_feeds values('','$name','$email','$sma','$date')");
       if($insert){
       	$sms = "<p style='color:green;>Thank you for your feedback...!</p>";
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
            <h2>Leave us a message</h2>
            <form action="" method="POST" class="contact_form">
             <?php if(isset($sms)){ echo $sms;} ?>
              <input class="form-control" name="name" type="text" placeholder="Name">
              <input class="form-control" name="email" type="email" placeholder="Email">
              <textarea class="form-control" cols="30" rows="4" name="message" placeholder="Message*"></textarea>
              <input name="submit" type="submit" value="submit">
              </form>
          </div>
        </div>
      </div>
  </section>

<?php include('includes/footer.php'); ?>
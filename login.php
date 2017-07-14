<?php
  if(isset($_POST['login'])) {
  		$email = mysql_real_escape_string($_POST['email']);
  	    $password = mysql_real_escape_string($_POST['password']);

  		if($email == '' || $password == ''){
  		$err_sms = "<p style='color:#b64645;'>Sorry,fill the fields to login!</p>";
  		}else{	
  		$se = mysql_query("select * from tms_customers where email = '$email' and password = '$password'");
  		$nam = mysql_num_rows($se);
  		if($nam == 0){
  			$err_sms = "<p style='color:#b64645;'>Sorry,Enter valid email or password!</p>";
  		}else{
  			$r = mysql_fetch_array($se);
  			$_SESSION['fname'] = $r['fname'];
  			$_SESSION['lname'] = $r['lname'];
  			$_SESSION['email'] = $r['email'];
  			header('location:orders/finish_order.php');

  		}
  	 }
  	}
?>

<?php
session_start();
include('dBConfig/dBConnect.php');

  if(isset($_POST['submit'])){
  	$loc = ucfirst(mysql_real_escape_string($_POST['location']));
  	$cont = ucfirst(mysql_real_escape_string($_POST['contact']));
  	if($loc == '' || $cont == ''){
  		$sms = "<p style='color:#b64645;'>Sorry all fields are required to finish up your order...!</p>";
  	}else{
      $query = mysql_query("select * from tms_tempe_order, tms_items where tms_tempe_order.productID = tms_items.id and tms_tempe_order.address = '".$_SESSION['ip']."' ");
      while($rw=mysql_fetch_array($query)){
      $id = $rw['productID'];
      $name = $rw['item_name'];
      $qnty = $rw['qnt'];
      $cost = $rw['cos'];
      $date = date('Y-m-d');
      $mon = date('m');
      $year = date('Y');
    
      $insert = mysql_query("insert into tms_orders values('','".$_SESSION['fname']."','".$_SESSION['lname']."','$name','$id','$qnty','$cost', '$loc','$cont','$date','$mon','$year')");
      if($insert){
        $del = mysql_query("delete from tms_tempe_order where address = '".$_SESSION['ip']."'");
        if($del){
         $sms = "<p style='color:green;>Thank you for using keen products,your order received successfully!</p>";
         }else{
          $sms = "<p style='color:#b64645;>Something went wrong...!</p>";
         } 
        }
        
      }
       
   	 }
    }

     include('includes/customer_header.php');
?>

    <section id="contentSection">
    <div class="row">
      <div class="col-lg-6 col-md-6 col-sm-6">
      <center><p style="padding-top: 50px"> <b>Hello: <?php echo $_SESSION['fname'];?>&nbsp;     <?php echo $_SESSION['lname'];?></b></p></center>
       <center> <p style="padding-top: 10px;font-size: 20px">Tell us where are u found?</p></center>
      </div>
      <div class="col-lg-6 col-md-6 col-sm-6">
        <div class="left_content">
			<div class="contact_area">
            <div class="left_content">
            <div class="contact_area">
            <h2>Finish your order now</h2>
            <form action="" method="POST" class="contact_form">
            <?php if(isset($sms)){ echo $sms; } ?>
              <input class="form-control" name="location" type="text" placeholder="Your location">
              <input class="form-control" name="contact" type="text" placeholder="Your phone">
              <input name="submit" type="submit" value="Submit">
              </form>
          </div>
        </div>
        </div>
      </div>
    </div>
  </section>

<?php include('includes/footer.php'); ?>
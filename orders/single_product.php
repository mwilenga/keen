<?php
session_start();
include('dBConfig/dBConnect.php');
 $id = $_GET['id'];
 $a = mysql_query("select * from tms_items where id = '$id'");
 $s = mysql_fetch_array($a);
 $pri = $s['s_price'];

  if(isset($_POST['order'])){
    $qnty = mysql_real_escape_string($_POST['qnty']);
    $cost = $qnty * $pri;
    if($qnty == ""){
      $k = "<p style='color:red'>Enter quantity!</p>";
    }else{
    mysql_query("insert into tms_tempe_order values('','".$_SESSION['ip']."','$id','$qnty','$cost')");
  }
}

include('includes/customer_header.php');
?>

  <section id="contentSection">
    <div class="row">
      <div class="col-lg-8 col-md-8 col-sm-8">
        <div class="left_content">
        
          <div class="single_post_content">
            <h2><span>product description</span></h2>
            <ul class="photograph_nav  wow fadeInDown">
            <div class="row">
            <?php
             $add = mysql_query("select * from tms_items where id = '$id'");
             $sh=mysql_fetch_array($add);
              ?>
              <div class="col-md-8">
              <div class="single_sidebar wow fadeInDown">
              <a class="sideAdd" href="#"><img src="images/<?php echo $sh['image']; ?>" alt=""></a>
			        </div>

 
              </div>
              <form action="" method="POST">
              <div class="col-md-4">
              <div class="row">
                <b>Name</b><br>
                <?php echo $sh['item_name'];?>
              </div><br>
              <div class="row">
                <b>Description</b><br>
                <?php echo $sh['note'];?>
              </div><br>
              <div class="row">
                <b>Price</b><br>
                TSH <?php echo number_format($sh['s_price'],2);?>
              </div><br>
              <div class="row">
                <b>Enter quantity</b><br>
                <?php if(isset($k)){ echo $k;} ?>
                <input type="number" name="qnty" placeholder="1">
              </div><br>
              <button name="order" class="btn btn-warning btn-lg" style="margin-top: 0%">
               <b>Add to order</b>
              </button>
              </div>
              </form>
            </div>
            </ul>
          </div>
          <div class="single_post_content">
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-4">
        <div class="latest_post">
          <h2><span>Hot products</span></h2>
          <div class="latest_post_container">
            <div id="prev-button"><i class="fa fa-chevron-up"></i></div>
            <ul class="latest_postnav">
            <?php
           $q = mysql_query("select * from tms_items order by id desc limit 10");
            while($qr = mysql_fetch_array($q)){
            ?>
              <li>
                <div class="media"> <a href="single_product.php?id=<?php echo $qr['id']; ?>" class="media-left"> <img alt="" src="images/<?php echo $qr['image']; ?>" width="72px" height="72px"  > </a>
                  <div class="media-body"> <a href="single_product.php?id=<?php echo $qr['id']; ?>" class="catg_title"> <?php echo $qr['item_name']; ?></a> </div>
                </div>
              </li>
               <?php 
              }
              ?>
            </ul>
            <div id="next-button"><i class="fa  fa-chevron-down"></i></div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <div class="single_post_content">
            <h2><span>other products</span></h2>
            <center><p><strong>If you want to buy a product just click and you will see description and a contact to communicate with</strong></p></center>
            <div class="row">
            <?php
             $add = mysql_query("select * from tms_items order by id desc limit 6");
             while($sh = mysql_fetch_array($add)){
              ?>
                <div class="col-md-4">
                    <div class="single_sidebar wow fadeInDown">
              <a class="sideAdd" href="single_product.php?id=<?php echo $sh['id']; ?>"><img src="images/<?php echo $sh['image']; ?>" alt=""></a>
              </div>
                </div>
                 <?php
              }
              ?>
            </div>
          </div>

 <?php include('includes/footer.php'); ?>
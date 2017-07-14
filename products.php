<?php
session_start();
include('dBConfig/dBConnect.php');
 include('includes/header.php');
?>

  <div class="single_post_content">
            <h2><span>keen's more products</span></h2>
            <center><p><strong></strong></p></center>
            <div class="row">
            <?php
             $add = mysql_query("select * from tms_items");
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
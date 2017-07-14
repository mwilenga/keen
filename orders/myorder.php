<?php
session_start();
include('dBConfig/dBConnect.php');

 if(isset($_POST['send'])){
    $query = mysql_query("select * from tms_tempe_order, tms_items where tms_tempe_order.productID = tms_items.id and tms_tempe_order.address = '".$_SESSION['ip']."' ");
    while($r=mysql_fetch_array($query)){

      $id = $r['productID'];
      $name = $r['item_name'];
      $qnty = $r['qnt'];
      $cost = $r['cos'];
      $date = date('Y-m-d');
      $mon = date('m');
      $year = date('Y');
    
      $insert = mysql_query("insert into tms_orders values('','".$_SESSION['fname']."','".$_SESSION['lname']."','$name','$id','$qnty','$cost', '','','$date','$mon','$year')");
      if($insert){
        $del = mysql_query("delete from tms_tempe_order where address = '".$_SESSION['ip']."'");
        if($del){
         $sms = "<p style='color:green;>Thank you for using keen products,your order received successfully!</p>";
         }else{
          $sms = "<p style='color:#b64645;>Something went wrong...!</p>";
         } 
        }
        
      }
    }else{
      if(isset($_POST['cancel'])){
      mysql_query("delete from tms_tempe_order where address = '".$_SESSION['ip']."'");
    }
  }
include('includes/customer_header.php');
?>

  <section id="contentSection">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="left_content">
        
          <div class="single_post_content">
            <h2><span>List of my product to order</span></h2>
            <ul class="photograph_nav  wow fadeInDown">
            <div class="row">
            <?php
            $qry = mysql_query("select * from tms_items,tms_tempe_order where tms_items.id = tms_tempe_order.productID and tms_tempe_order.address = '".$_SESSION['ip']."'");
            if(mysql_num_rows($qry) == 0){
            ?>
            <div class="alert alert-warning" style="width: 70%;margin-left: 15%"><center>No product selected in your tray to order....!</center></div>
              <?php
            }else{
              ?>
              <table style="width: 70%; margin-left: 15%;border: 1px solid black" class="table-bordered">
                <thead>
                  <th>Product</th>
                  <th>Name</th>
                  <th>Qnty</th>
                  <th>Cost </th>
                  <th>Action</th>
                </thead>
                <tbody>
                <?php
                while($ws=mysql_fetch_array($qry)){
                ?>
                  <tr>
                    <td><div class="media-left"><img src = "images/<?php echo $ws['image'];?>"></div></td>
                    <td>&nbsp;<?php echo $ws['item_name']; ?></td>
                    <td>&nbsp;<?php echo $ws['qnt']; ?></td>
                    <td>&nbsp;<?php echo number_format($ws['cos'],2); ?></td>
                    <td><a href="remove_item.php?id=<?php echo $ws['productID']; ?>" style="color: #b64645" onclick="return confirm('Are you sure you want to remove this product?');">&nbsp;<i class="fa fa-trash-o"></i>&nbsp;Remove</a></td>
                  </tr>
                  <?php
                 }
                  ?>
                </tbody>
              </table>
              <?php
                 $cost = mysql_query("select sum(cos) as total_cost from tms_tempe_order where address = '".$_SESSION['ip']."' ");
                 $rq = mysql_fetch_array($cost);
                  ?>
                  <div class="row" style="width: 70%; height: 7%; margin-left: 15%;background: #f3f3f3">
                    <div class="col-md-6">
                    <p style="padding-top: 10px"><b>TOTAL COST</b></p> 
                    </div>
                    <div class="col-md-6" style="text-align: right;">
                   <p style="padding-top: 10px; font-size: 25px"><b>TSH <?php echo number_format($rq['total_cost'],2);?></b></p>
                      
                    </div>
                  </div>
                  <br>
                  <div class="row" style="margin-left: 10%">
                  <form action="" method="POST">
                  <button class="btn btn-warning btn-lg" name="send" style="float: right;margin-right: 18%">Order now</button>
                  <button class="btn btn-warning btn-lg" name="cancel" style="float: right;margin-right: 1%">Cancel order</button>
                  </form>
                  </div>
                  <?php
                }
                  ?>
            </div>
            </ul>
          </div>
          <div class="single_post_content">
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
<?php
session_start();
 include('dBConfig/dBConnect.php');
  function getUserIP()
{
    $client  = @$_SERVER['HTTP_CLIENT_IP'];
    $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
    $remote  = $_SERVER['REMOTE_ADDR'];
    if(filter_var($client, FILTER_VALIDATE_IP))
    {
        $ip = $client;
    }
    elseif(filter_var($forward, FILTER_VALIDATE_IP))
    {
        $ip = $forward;
    }
    else
    {
        $ip = $remote;
    }
    return $ip;
}
$user_ip = getUserIP();

$_SESSION['ip'] = $user_ip; // Output IP address [Ex: 177.87.193.134]
?>
<?php include('includes/header.php');?>
  <section id="sliderSection">
    <div class="row">
      <div class="col-lg-8 col-md-8 col-sm-8">
      <?php
         //include('dBConfig/dBConnect.php');
           $sel = mysql_query("select * from tms_items where id = 28");
            $r = mysql_fetch_array($sel);

            $s = mysql_query("select * from tms_items where id = 26");
            $rw = mysql_fetch_array($s);
            ?>
        <div class="slick_slider">
          <div class="single_iteam"> <a href="single_product.php?id=<?php echo $r['id']; ?>"> <img src="images/<?php echo $r['image']; ?>" width="425px" height="283px" alt=""></a>
            <div class="slider_article">
              <h2><a class="slider_tittle" href="pages/single_page.html">Keen computers Tanzania</a></h2>
              
            </div>
          </div>
          <div class="single_iteam"> <a href="single_product.php?id=<?php echo $rw['id']; ?>"> <img src="images/<?php echo $rw['image']; ?>" width="425px" height="283px" alt=""></a>
            <div class="slider_article">
              <h2><a class="slider_tittle" href="">Keen computers Tanzania</a></h2>
              
            </div>
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
  <div class="row">
    <div class="col-md-12">
       <div class="single_post_content">
            <h2><span>Buy our products</span></h2>
            <center><p><strong>If you want to buy a product just click and you will see description and a contact to communicate with</strong></p></center>
            <hr style="color: #337bc7">
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
    </div>
  </div>
  
 <?php include('includes/footer.php'); ?>
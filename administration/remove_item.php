<?php
session_start();
 include('dBConfig/dBConnect.php');
  $id = $_GET['id'];
   $del = mysql_query("delete from tms_tempe_order where productID = '$id' and address = '".$_SESSION['ip']."'");
    if($del){
    	header('location:myorder.php');
    }
?>
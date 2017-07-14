<?php
session_start();
 include('../dBConfig/dBConnect.php');

  $id = $_GET['id'];
   $del = mysql_query("delete from tms_feeds where id = '$id'");
    if($del){
    	header('location:visitors.php');
    }
?>
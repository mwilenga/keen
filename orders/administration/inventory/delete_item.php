<?php
 session_start();
   if(!isset($_SESSION['id'])){
  header('location: ../../index.php'); 
  exit;
 }else{
 	require_once('../dBConfig/dBConnect.php');
    $id = $_GET['id'];
    $del = mysql_query("delete from tms_items where id = '$id'");
     if($del){
     	header('location:items.php');
     }
 }
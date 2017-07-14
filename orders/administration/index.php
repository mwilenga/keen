<?php
 session_start();
 if(!isset($_SESSION['id'])){
	 header('location:../index.php');
	 exit;
	 }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Keen | Modules</title>
			<link rel="stylesheet" type="text/css" id="theme" href="../css/style.css"/>
		</head>
		<body>
			<center>
				<!--<img src = "../img/logo 1.png" style = "border-radius:80%"/>-->
				<h2 style="padding-top: 60px">Keen System modules</h2>
				<p style = "font-size:12px;"><strong>Welcome, <?php echo $_SESSION['name'];?> (<a href = "logout.php" style = "text-decoration:none">Log Out</a>)</strong></p><hr/ style = "width:50%"><br/>
			<div class = "main" style = "width:50%">
				 
				<a href = "inventory/" style = "text-decoration:none"><div class = "logistics">
					  <div class = "word" style = "padding:5%;color:#fff">
					  <h3> Inventory</h3>
					  </div>
					 </div></a><br/>

					 <hr/>	
					 <span style = "font-size:11px">&copy KEEN 2017</span> 
				</div>
				</center>
			</body>
	</html>

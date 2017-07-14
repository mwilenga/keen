<?php
session_start();
mysql_connect('localhost','root','');
mysql_select_db('keen');
if(is_array($_FILES)) {
//if(is_uploaded_file($_FILES['userImage']['tmp_name'])) {
$sourcePath = $_FILES['userImage']['tmp_name'];
$targetPath = "../../images/".$_FILES['userImage']['name'];
if(move_uploaded_file($sourcePath,$targetPath)) {
?>
<img src="<?php echo $targetPath; ?>" width="200px" height="200px" class="upload-preview" />
<?php
 $sql="update tms_items set image = '".$_FILES['userImage']['name']."' where item_name = '".$_SESSION['image_name']."'";
	$n = mysql_query($sql);
	if($n){
?>
<script>
	alert('successfully uploaded');
    window.location.href='add_item.php?success';
  </script>
  <?php
	}else{
  ?>
  <script>
		alert('error while uploading file');
        window.location.href='index.php?fail';
      </script>
<?php
}
}
//}
}
?>
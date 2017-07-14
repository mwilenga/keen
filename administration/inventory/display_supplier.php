<?php
require_once ('../dBConfig/dBConnect.php');
$sth = mysql_query("SELECT * FROM tms_supplier");
$data = array();
while($r = mysql_fetch_assoc($sth)) {
    $data[] = $r;
}
print json_encode($data);
?>
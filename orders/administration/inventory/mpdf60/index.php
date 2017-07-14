<html>
	<?php
	include('mpdf.php');
	
	$mpdf = new mPDF();
	//$msg = "hello";
	//$msg1 = "hellow";
	//$mpdf->WriteHTML($msg);


	$name = "Julius Mwakajeba";
	mysql_connect("localhost","root","konyo");
        mysql_select_db("eDMS");
        $q = mysql_query("SELECT * FROM UserAccount");
       
        
	
		$html = '<table border = "1" width = "100%">
	<tr>
	<th>Full Name</th>
	<th>Designation</th>
	<th>Unit</th>
	</tr>';

        while($rw = mysql_fetch_array($q)){
	
	$html .= '<tr>
	<td>' . $rw['Fullname'] . ' </td>
	<td>' . $rw['Username'] . '</td>

	</tr>';

	}

	$html .='</table>';

	

	$mpdf->WriteHTML(
		$html
	);
	$mpdf->Output();
        exit;
	?>
	</html>

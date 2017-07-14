<?php

	mysql_connect("localhost","root","konyo");
        mysql_select_db("kioo_tmisdb");
        
    if(isset($_POST['submit'])){
		$id = $_POST['id'];
        $q = mysql_query("SELECT * FROM tbl_trainee WHERE Tno = '$id'");
        $qr = mysql_query("SELECT * FROM tbl_training WHERE TID = '$id'");
        $num = mysql_num_rows($q);
        $rs = mysql_fetch_array($qr);
        $kil = strtoupper($rs['trainingType']); 
        $dat1 = $rs['dataStarted']; 
        $dat2 = $rs['dateEnded'];
        $tot = $rs['NoOfpeople'];
        if($tot < $num){
			$per = 100;
			}
			else{
	    $per = ($num/$tot)*100;
	      }
		 $html ='<img src = "kiooLogo/kioo.png" width = "180px" height = "120px" style = "margin-left:40%"/>
		        <h1 style = "text-align:center;">KIOO UMOJA WA WAWEZESHAJI</h1>
                <h2 style = "text-align:center;">LIST OF TRAINEES</h2>
                <p>PROGRAM : '.$kil.'</p>
                <p>STARTING DATE : '.$dat1.'</p>
                <p>ENDING DATE : '.$dat2.'</p>
                <p>TOTAL NUMBER OF TRAINEES NEEDED : '.$tot.'</p>
                <p>TOTAL NUMBER OF TRAINEES PERTICIPATED : '.$num.'</p>
                <p>TRAINEES PERTICIPATED BY PERCENTAGE : '.$per.'%</p>
		         <table border = "1" width = "100%" cellspacing = "0" cellpadding = "0">
	<tr style = "background: #1E90FF;">
	<th>SN</th>
	<th>Name of trainee</th>
	<th>Gender</th>
	<th>Street/Village</th>
	<th>Ward</th>
	<th>District</th>
	<th>Region</th>
	</tr>';
          $a = 1;
        while($rw = mysql_fetch_array($q)){
	
	$html .= '<tr>
	<td>' . $a. ' </td>
	<td>' . $rw['Fullname'] . '</td>
	<td>' . $rw['Gender'] . '</td>
	<td>' . $rw['Kijiji'] . '</td>
	<td>' . $rw['Kata'] . '</td>
	<td>' . $rw['Wilaya'] . '</td>
	<td>' . $rw['Mkoa'] . '</td>

	</tr>';
      $a++;
	}

	$html .='</table>';

include("../mpdf.php");

$mpdf=new mPDF('c','A4','','',32,25,27,25,16,13); 

$mpdf->SetDisplayMode('fullpage');

// LOAD a stylesheet
$stylesheet = file_get_contents('mpdfstyletables.css');
$mpdf->WriteHTML($stylesheet,1);	// The parameter 1 tells that this is css/style only and no body/html/text

$mpdf->WriteHTML($html);

$mpdf->jSWord = 0;	// Proportion (/1) of space (when justifying margins) to allocate to Word vs. Character
$mpdf->jSmaxChar = 0;	// Maximum spacing to allocate to character spacing. (0 = no maximum)

$mpdf->Output();
exit;
}

?>

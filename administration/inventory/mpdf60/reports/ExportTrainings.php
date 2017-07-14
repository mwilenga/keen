<?php


	mysql_connect("localhost","kioo_Admin","HLLvBMQw9tjbBetU");
        mysql_select_db("kioo_tmisdb");
        $q = mysql_query("SELECT * FROM tbl_training");
       
       
	
		 $html ='<img src = "kiooLogo/kioo.png" width = "180px" height = "120px" style = "margin-left:40%"/>
		         <h1 style = "text-align:center;">KIOO UMOJA WA WAWEZESHAJI</h1>
                <h2 style = "text-align:center;">LIST OF TRAININGS</h2>
		         <table border = "1" width = "100%">
	<tr style = "background: #1E90FF;">
	<th>SN</th>
	<th>Name of training</th>
	<th>Training topic</th>
	<th>Starting</th>
	<th>Ending</th>
	<th>Place</th>
	<th>Street/Village</th>
	<th>Ward</th>
	<th>District</th>
	<th>Region</th>
	<th>No of trainees</th>
	</tr>';

        while($rw = mysql_fetch_array($q)){
	
	$html .= '<tr>
	<td>' . $rw['TID'] . ' </td>
	<td>' . $rw['trainingType'] . '</td>
	<td>' . $rw['topic'] . '</td>
	<td>' . $rw['dataStarted'] . '</td>
	<td>' . $rw['dateEnded'] . '</td>
	<td>' . $rw['sehemu'] . '</td>
	<td>' . $rw['mtaa'] . '</td>
	<td>' . $rw['kata'] . '</td>
	<td>' . $rw['wilaya'] . '</td>
	<td>' . $rw['mkoa'] . '</td>
	<td>' . $rw['NoOfpeople'] . '</td>

	</tr>';

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


?>
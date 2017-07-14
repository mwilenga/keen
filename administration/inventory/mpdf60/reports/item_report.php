<?php
    require_once '../../../dBConfig/dBConnect.php';
        $q = mysql_query("select * from tms_stock_take,tms_items where item = item_name and item_name = '".$_SESSION['item_name']."' ");

		     $html ='<center><img src = "../../../img/logo2.png" width="200" height="53" style = "margin-left:33%"/></center><br>
               <h3 style = "text-align:center;font-size:20px">ITEM REPORT</h3>
                <hr>
		         <table border = "1" width = "100%" cellspacing = "0" cellpadding = "0">
					<tr style = "background: #1E90FF;">
					<th>SN</th>
					<th>Date</th>
                    <th>Qnty</th>
                    <th>Issued to</th>
                    <th>Job Card #</th>
                    <th>Authorized by</th>
					</tr>';
				      $a = 1;
				      while($rw = mysql_fetch_array($q)){

					$html .= '<tr>
					<td>' . $a. ' </td>
					<td>' . $rw['dat'] . '</td>
					<td>' . $rw['qnt'] . '</td>
					<td>' . $rw['truck'] . '</td>
					<td>' . $rw['jobcad'] . '</td>
					<td>' . $rw['auth_by'] . '</td>

					</tr>';
				    $a++;
					}

	$html .='</table>';

include("../mpdf.php");

$mpdf=new mPDF('c','A4','','',32,25,27,25,16,13); 
$mpdf->setFooter("Page {PAGENO} of {nb}");

$mpdf->SetDisplayMode('fullpage');

// LOAD a stylesheet
$stylesheet = file_get_contents('mpdfstyletables.css');
$mpdf->WriteHTML($stylesheet,1);	// The parameter 1 tells that this is css/style only and no body/html/text

$mpdf->WriteHTML($html);

$mpdf->jSWord = 0;	// Proportion (/1) of space (when justifying margins) to allocate to Word vs. Character
$mpdf->jSmaxChar = 0;	// Maximum spacing to allocate to character spacing. (0 = no maximum)

$mpdf->Output();
/*$content = $mpdf->Output('', 'S');

$content = chunk_split(base64_encode($content));

$mailto = 'recipient@domain.com';

$from_name = 'Your name';

$from_mail = 'sender@domain.com';

$replyto = 'sender@domain.com';

$uid = md5(uniqid(time()));

$subject = 'Your e-mail subject here';

$message = 'Your e-mail message here';

$filename = 'filename.pdf';

$header = "From: ".$from_name." <".$from_mail.">\r\n";

$header .= "Reply-To: ".$replyto."\r\n";

$header .= "MIME-Version: 1.0\r\n";

$header .= "Content-Type: multipart/mixed; boundary=\"".$uid."\"\r\n\r\n";

$header .= "This is a multi-part message in MIME format.\r\n";

$header .= "--".$uid."\r\n";

$header .= "Content-type:text/plain; charset=iso-8859-1\r\n";

$header .= "Content-Transfer-Encoding: 7bit\r\n\r\n";

$header .= $message."\r\n\r\n";

$header .= "--".$uid."\r\n";

$header .= "Content-Type: application/pdf; name=\"".$filename."\"\r\n";

$header .= "Content-Transfer-Encoding: base64\r\n";

$header .= "Content-Disposition: attachment; filename=\"".$filename."\"\r\n\r\n";

$header .= $content."\r\n\r\n";

$header .= "--".$uid."--";

$is_sent = @mail($mailto, $subject, "", $header);

$mpdf->Output();

exit;
}
**/
exit;
?>
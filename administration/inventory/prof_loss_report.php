<?php
 session_start();
 if(!isset($_SESSION['id'])){
  header('location: ../../index.php'); 
  exit;
 }else{
  require_once("../dBConfig/dBConnect.php");
    if(isset($_POST['search_month'])){
       $mon = mysql_real_escape_string($_POST['mon']); 
       $_SESSION['month'] = $mon;
       header('location:monthly_profit_loss.php');
    }
  }
?>
<!DOCTYPE html>
<html lang="en" ng-app = "myapp">
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>        
        <!-- META SECTION -->
        <title>KEEN - Home</title>            
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        
        <link rel="icon" href="../favicon.ico" type="image/x-icon" />
        <!-- END META SECTION -->
        
        <!-- CSS INCLUDE -->        
        <link rel="stylesheet" type="text/css" id="theme" href="../css/theme-default.css"/>

    </head>
    <body>
        <!-- START PAGE CONTAINER -->
        <div class="page-container">
            
            <!-- START PAGE SIDEBAR -->
            <div class="page-sidebar">
                <!-- START X-NAVIGATION -->
                 <?php require_once '../incs/inventory_links.php';?>
                <!-- END X-NAVIGATION -->
            </div>
            <!-- END PAGE SIDEBAR -->
            
            <!-- PAGE CONTENT -->
            <div class="page-content">
                
                <!-- START X-NAVIGATION VERTICAL -->
                <ul class="x-navigation x-navigation-horizontal x-navigation-panel">
                    <!-- TOGGLE NAVIGATION -->
                    <li class="xn-icon-button">
                        <a href="#" class="x-navigation-minimize"><span class="fa fa-dedent"></span></a>
                    </li>
                    <!-- END TOGGLE NAVIGATION -->
                    <!-- POWER OFF -->
                    <li class="xn-icon-button pull-right last">
                        <a href="#"><span class="fa fa-power-off"></span></a>
                        <ul class="xn-drop-left animated zoomIn">
                            <li><a href="#" class="mb-control" data-box="#mb-signout"><span class="fa fa-sign-out"></span> Sign Out</a></li>
                        </ul>                        
                    </li> 
                    <!-- END POWER OFF -->                    
                </ul>
                <!-- END X-NAVIGATION VERTICAL -->                     
                
                <!-- START BREADCRUMB -->
                <ul class="breadcrumb">                   
                    <li>Home</li>
                    <li>Reports</li>
                    <li class="active">Stock out history</li>
                </ul>
                <!-- END BREADCRUMB -->                
                
                <div class="page-title">                    
                    <h2><span class="fa fa-share"></span> Reports</h2>
                    <div class="row" style="">
                      
                       <form action="" method="POST">
                        <div class="col-md-2">
                            <div class="form-group">
                                <select class="form-control select" data-live-search="true" name="mon" required>
                                                       <option>Select</option>
                                                       <option value="01">January</option>
                                                       <option value="02">February</option>
                                                       <option value="03">March</option>
                                                       <option value="04">April</option>
                                                       <option value="05">May</option>
                                                       <option value="06">June</option>
                                                       <option value="07">July</option>
                                                       <option value="08">August</option>
                                                       <option value="09">September</option>
                                                       <option value="11">November</option>
                                                       <option value="12">December</option>
                                                        </select>
                                                  </div>
                                                  </div>
                                                  <div class="col-md-3">
                                                  <button class="btn btn-default" name="search_month">Search</button>
                                                  </div>
                                                 </form>
                                                </div>
                </div>                   
                
                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap" ng-controller = "cntrl">
                
                    <div class="row">
                        <div class="col-md-12">

                            <div class="panel panel-default">
                            <div class="panel-heading">
                            <form action = "" method = "POST">
                                    <div class="panel-title-box">
                                        <h3 class="panel-title"><i class="fa fa-file"></i>&nbsp;Profit and loss report</h3>
                                    </div>
                                    <ul class="panel-controls" style="margin-top: 2px;">
                                    <!-- <a href="javascript:demoFromHTML()" class="button">Run Code</a>-->
                                     <input type="button" onclick="tableToExcel('testTable')" value="Export to Excel">
                                                         
                                    </ul>
                                    </form>
                                </div>
                              
                                <div class="panel-body">
                                <div id="content">
                                <div class="row">
                                <h3>Profit and loss report on month <?php echo date('m');?></h3><hr>
                                <div class="col-md-6">
                                <h3>Income</h3>
                                 <?php
                                 $mon = date('m');
                                 $s = mysql_query("select * from tms_income where month = '$mon'");
                                  $num = mysql_num_rows($s);
                                  if($num < 1){

                                    echo "<div class='alert alert-warning'><center>No data found.....!</center></div>";
                                  
                                  }else{
                                 ?>
                                    <table  class = "table table-striped">
                                         <tr>
                                             <th>SNO #</th>
                                             <th>Date</th>
                                             <th>Item Name</th>
                                             <th>Amount (TSH)</th>
                                             </tr>
                                             <?php
                                             //$dat = mysql_query("select * from tms_stock_take order by id asc");
                                             $a = 1;
                                              while($data=mysql_fetch_array($s)){
                                             ?>
                                             <tr>
                                                 <td><?php echo $a; ?></td>
                                                 <td><?php echo $data['date'];?></td>
                                                 <td><?php echo $data['item'];?></td>
                                                 <td><?php echo number_format($data['price'],2);?></td>
                                            </tr>
                                               <?php
                                               $a++;
                                               }
                                               ?>  
                                        </table>
                                        <?php
                                        }
                                        ?>
                                    <div class="row">
                                    <?php
                                    $ai = mysql_query("select sum(price) as total_income from tms_income where month = '$mon'");
                                    $fe = mysql_fetch_array($ai);
                                    ?>
                                    <p style="float: left"><b>Total income</b></p>
                                    <p style="float: right;"><b><?php echo number_format($fe['total_income']); ?></b></p>
                                </div>
                                </div>
                                
                                <div class="col-md-6">
                                <?php
                                 $q = mysql_query("select * from tms_expenses where month = '$mon'");
                                  $num = mysql_num_rows($s);
                                  if($num < 1){

                                    echo "<div class='alert alert-warning'><center>No data recoreded yet.....!</center></div>";
                                  
                                  }else{
                                 ?>
                                 <h3>Expenditure</h3>
                                    <table class = "table table-striped">
                                         <tr>
                                             <th>SNO #</th>
                                             <th>Date</th>
                                             <th>Item Name</th>
                                             <th>Cost (TSH)</th>
                                             </tr>
                                             <?php
                                             //$d = mysql_query("select * from tms_stock_take order by id asc");
                                             $a = 1;
                                              while($dat=mysql_fetch_array($q)){
                                             ?>
                                             <tr>
                                                 <td><?php echo $a; ?></td>
                                                 <td><?php echo $dat['date'];?></td>
                                                 <td><?php echo $dat['item'];?></td>
                                                 <td><?php echo number_format($dat['cost'],2);?></td>
                                            </tr>
                                               <?php
                                               $a++;
                                               }
                                               ?>  
                                        </table>
                                        <?php
                                        }
                                        ?>

                                    <div class="row">
                                    <?php
                                    $a = mysql_query("select sum(cost) as total_expenses from tms_expenses where month = '$mon'");
                                    $f = mysql_fetch_array($a);
                                    ?>
                                    <p style="float: left"><b>Total expenditure</b></p>
                                    <p style="float: right;"><b><?php echo number_format($f['total_expenses']); ?></b></p>
                                </div>

                                </div>
                                

                                </div>
                                <hr>
                                <div class="row">
                                <?php
                                 $prof_loss = $fe['total_income'] - $f['total_expenses'];
                                 
                                 ?>
                                    <p style="float: left"><b>Net Profit/Loss (Total income - Total expenditure)</b></p>
                                    <p style="float: right;"><b><?php echo number_format($prof_loss); ?></b></p>
                                </div>
                                </div>
                                </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    
                    <!-- FOOTER --> 
                    <div class="row">
                        <div class="col-md-12">

                            <div class="panel panel-default">
                                <div class="panel-body" style = "background:linen">
                                    &copy; 2017 TMS
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- END FOOTER --> 
                
                </div>
                <!-- END PAGE CONTENT WRAPPER -->                
            </div>            
            <!-- END PAGE CONTENT -->
        </div>
        <!-- END PAGE CONTAINER -->

        <!-- MESSAGE BOX-->
        <div class="message-box animated fadeIn" data-sound="alert" id="mb-signout">
            <div class="mb-container">
                <div class="mb-middle">
                    <div class="mb-title"><span class="fa fa-sign-out"></span> Log <strong>Out</strong> ?</div>
                    <div class="mb-content">
                        <p>Are you sure you want to log out?</p>                    
                        <p>Press No if you want to continue work. Press Yes to logout current user.</p>
                    </div>
                    <div class="mb-footer">
                        <div class="pull-right">
                            <a href="logout.php" class="btn btn-success btn-lg">Yes</a>
                            <button class="btn btn-default btn-lg mb-control-close">No</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END MESSAGE BOX-->

        <!-- START PRELOADS -->
        <audio id="audio-alert" src="../audio/alert.mp3" preload="auto"></audio>
        <audio id="audio-fail" src="../audio/fail.mp3" preload="auto"></audio>
        <!-- END PRELOADS -->                 
        
    <!-- START SCRIPTS -->
        <!-- START PLUGINS -->
       <script type="text/javascript" src="../js/plugins/jquery/jquery.min.js"></script>
        <script type="text/javascript" src="../js/plugins/jquery/jquery-ui.min.js"></script>
        <script type="text/javascript" src="../js/plugins/bootstrap/bootstrap.min.js"></script> 
        <script type="text/javascript" src="../js/plugins/datatables/jquery.dataTables.min.js"></script>       
        <!-- END PLUGINS -->

        <!-- THIS PAGE PLUGINS -->

        <!-- END PAGE PLUGINS -->         

        <!-- START TEMPLATE -->
        <script type="text/javascript" src="../js/plugins.js"></script>        
        <script type="text/javascript" src="../js/actions.js"></script> 
        <script type="text/javascript" src="../jspdf.min.js"></script>
        <script type="text/javascript">
        function demoFromHTML(){
        var pdf = new jsPDF('p', 'pt', 'letter');
        source = $('#content')[0];
        specialElementHandlers = {
            '#bypassme': function (element, renderer) {
                return true
            }
        };
        margins = {
            top: 40,
            bottom: 60,
            left: 100,
            width: 1024
        };
        pdf.fromHTML(
            source, // HTML string or DOM elem ref.
            margins.left, // x coord
            margins.top, { // y coord
                'width':1024, // max width of content on PDF
                'elementHandlers': specialElementHandlers
            },

            function (dispose) {
                pdf.save('Test.pdf');
            }, margins
        );
    }


        //excel
   var tableToExcel = (function() {
  var uri = 'data:application/vnd.ms-excel;base64,'
    , template = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--></head><body><table>{table}</table></body></html>'
    , base64 = function(s) { return window.btoa(unescape(encodeURIComponent(s))) }
    , format = function(s, c) { return s.replace(/{(\w+)}/g, function(m, p) { return c[p]; }) }
  return function(table, name) {
    if (!table.nodeType) table = document.getElementById(table)
    var ctx = {worksheet: name || 'Worksheet', table: table.innerHTML}
    window.location.href = uri + base64(format(template, ctx))
  }
})()
</script>    
        <!-- END TEMPLATE -->
    
    <!-- COUNTERS // NOT INCLUDED IN TEMPLATE -->
    </body>
</html>







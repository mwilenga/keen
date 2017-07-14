<?php
 session_start();
 if(!isset($_SESSION['id'])){
  header('location: ..././index.php'); 
  exit;
 }else{
  require_once("../dBConfig/dBConnect.php");
 }
?>
<!DOCTYPE html>
<html lang="en" ng-app = "myapp">
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>        
        <!-- META SECTION -->
        <title>TMS - Customer order report</title>            
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        
        <link rel="icon" href="../favicon.ico" type="image/x-icon" />
        <!-- END META SECTION -->
        
        <!-- CSS INCLUDE -->        
        <link rel="stylesheet" type="text/css" id="theme" href="../css/theme-default.css"/>

        <script src="../js/angular.js"></script>
        <!-- EOF CSS INCLUDE -->    
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
                    <li class="active">Customer orders report</li>
                </ul>
                <!-- END BREADCRUMB -->                
                
                <div class="page-title">                    
                    <h2><span class="fa fa-share"></span> Reports</h2>
                       <div class="row" style="float: right;">
                       <a href="orders.php"><span class="fa fa-sign-out">&nbsp;Back</span></a>
                       </div>
                </div>                   
                
                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap" ng-controller = "cntrl">
                
                    <div class="row">
                        <div class="col-md-12">

                            <div class="panel panel-default">
                            <div class="panel-heading">
                                    <div class="panel-title-box">
                                     <h3 class="panel-title"><i class="
                                        fa fa-file"></i>&nbsp;Customer orders report</h3>
                                    </div>
                                    <ul class="panel-controls" style="margin-top: 2px;">
                                   <a href="javascript:demoFromHTML()"><i class="fa fa-download"></i>&nbsp;EXPORT PDF REPORT</a>
                                   <input type="button" onclick="tableToExcel('testTable')" value="Export to Excel">                    
                                    </ul>
                                    
                                </div>
                              
                                <div class="panel-body">
                                 <?php
                                 $s = mysql_query("select * from tms_items, tms_orders where tms_orders.prod_id = tms_items.id and tms_orders.month = '".$_SESSION['month']."' ");
                                  $num = mysql_num_rows($s);
                                  if($num < 1){
                                   ?>
                                   <center><h3>Customer Orders Report on month <?php echo $_SESSION['month']; ?></h3></center>
                                    <div class='alert alert-warning'><center>No order to date.....!</center></div>"
                                  <?php
                                  }else{
                                 ?>
                                 <div id="content">
                                 <center><h3>Customer Orders Report on month <?php echo $_SESSION['month']; ?></h3></center>
                                 <hr>
                                    <table id="testTable" style="width: 100%" class = "table table-striped">

                                         <tr>
                                             <th width="350px">SNO #</th>
                                             <th width="350px">Customer name</th>
                                             <th width="350px">Product</th>
                                             <th width="350px">Description</th>
                                             <th width="350px">Qnty</th>
                                             <th width="350px">Cost</th>
                                             <th width="350px">Location</th>
                                             <th width="350px">Contact</th>
                                             </tr>
                                             <?php
                                             $a = 1;
                                              while($data=mysql_fetch_array($s)){
                                             ?>
                                             <tr>
                                                 <td><?php echo $a; ?></td>
                                                 <td><?php echo $data['fname'];?>&nbsp;<?php echo $data['lname'];?></td>
                                                 <td><?php echo $data['product'];?></td>
                                                 <td><?php echo $data['note'];?></td>
                                                 <td><?php echo $data['qty'];?></td>
                                                 <td><?php echo $data['costi'];?></td>
                                                 <td><?php echo $data['location'];?></td>
                                                 <td><?php echo $data['contact'];?></td>
                                            </tr>
                                               <?php
                                               $a++;
                                               }
                                               ?>  
                                        </table>
                                        <?php
                                        }
                                        ?>
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
        <script type="text/javascript" src="../js/plugins/bootstrap/bootstrap-datepicker.js"></script>      
        <!-- END PLUGINS -->

        <!-- THIS PAGE PLUGINS -->
      
        <!-- END PAGE PLUGINS -->         

        <!-- START TEMPLATE -->
        <script type="text/javascript" src="../js/plugins.js"></script>        
        <script type="text/javascript" src="../js/actions.js"></script>        
        <script type="text/javascript" src="../js/dirPagination.js"></script> 
        <script src="../js/jspdf.min.js"></script>
        <script>
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

    <!-- END SCRIPTS -->
    
    <!-- COUNTERS // NOT INCLUDED IN TEMPLATE -->
    </body>
</html>







<?php
 session_start();
   if(!isset($_SESSION['id'])){
  header('location: ../../index.php'); 
  exit;
 }else{
}
?>
<!DOCTYPE html>
<html lang="en" ng-app = "myapp">
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>        
        <!-- META SECTION -->
        <title>TMS - Take item</title>            
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
                </ul>
                <!-- END X-NAVIGATION VERTICAL -->                     
                
                 <!-- START BREADCRUMB -->
                <ul class="breadcrumb">                   
                    <li>Home</li>
                    <li class="active">Manage stock</li>
                </ul>
                <!-- END BREADCRUMB -->                
                
                <div class="page-title">                    
                    <h2><span class="fa fa-share"></span> Stock take management</h2>
                </div>                     
                
                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap" ng-controller = "cntrl">
                
                    <div class="row">
                        <div class="col-md-12">

                            <div class="panel panel-default">
                                 <div class="panel-heading">
                             <?php 
                             require_once("../dBConfig/dBConnect.php");
                             $all = mysql_query("select * from tms_stock_take");
                             $n = mysql_num_rows($all)
                             // $nam = mysql_num_rows($all);
                             ?>
                               <h3 class="panel-title"><i class="fa fa-list"></i>&nbsp;List of items taken (<?php echo $n;?>)</h3>
                                <ul class="panel-controls" style="margin-top: 2px;">
                              <span style="float:right"><i class="fa fa-plus-circle"></i>&nbsp;<a href="stock_take.php"><b>Stock taking</b></a></span>
                                     
                               </ul>  
                              </div> 
                                <div class="panel-body"> 
                                <?php
                                 $s = mysql_query("select * from tms_stock_take");
                                  $num = mysql_num_rows($s);
                                  if($num < 1){

                                    echo "<div class='alert alert-warning'><center>No supplier added yet.....!</center></div>";
                                  
                                  }else{
                                 ?>
                                <div class="row">
                                  <div class="form-group">
                                            <div class="col-md-4">
                                                <div class="input-group">
                                                    <span class="input-group-btn">
                                                        <button class="btn btn-primary" type="button">Go!</button>
                                                    </span>
                                                    <input type="text" ng-model="search" class="form-control" placeholder="Search here"/>
                                                </div>                 
                                            </div>
                                        </div>
                                 </div><br>
                                
                                    <table class = "table table-striped">
                                         <tr>
                                             <th>Item Name</th>
                                             <th>Quantity</th>
                                             <th>Issued Truck</th>
                                             <th>Job Card #</th>
                                             <th>Authorized By</th>
                                             <th>Issued Date</th>
                                             </tr>
                                             <tr ng-repeat = "stock in data | filter:search" >
                                                 <td>{{stock.item}} </td>
                                                 <td>{{stock.qnt}}</td>
                                                 <td>{{stock.truck}}</td>
                                                 <td>{{stock.jobcad}}</td>
                                                 <td>{{stock.auth_by}}</td>
                                                 <td>{{stock.dat}}</td>
                                            </tr>
                                                 
                                        </table>
                                        <?php
                                        }
                                        ?>
                                                                   
                                                                      
                                </div>
                            </div>

                        </div>
                    </div>
                
                </div>
                <!-- END PAGE CONTENT WRAPPER --> 
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
                        <p>Press No if youwant to continue work. Press Yes to logout current user.</p>
                    </div>
                    <div class="mb-footer">
                        <div class="pull-right">
                            <a href="pages-login.html" class="btn btn-success btn-lg">Yes</a>
                            <button class="btn btn-default btn-lg mb-control-close">No</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END MESSAGE BOX-->

        <!-- START PRELOADS -->
        <audio id="audio-alert" src="../audio/alert.mp3" preload="auto"></audio>
        <audio id="audio-fail" src="a../udio/fail.mp3" preload="auto"></audio>
        <!-- END PRELOADS -->                 
        
    <!-- START SCRIPTS -->
        <!-- START PLUGINS -->
        <script type="text/javascript" src="../js/plugins/jquery/jquery.min.js"></script>
        <script type="text/javascript" src="../js/plugins/jquery/jquery-ui.min.js"></script>
        <script type="text/javascript" src="../js/plugins/bootstrap/bootstrap.min.js"></script>        
        <!-- END PLUGINS -->

        <!-- THIS PAGE PLUGINS -->

        <!-- END PAGE PLUGINS -->         

        <!-- START TEMPLATE -->
        <script type="text/javascript" src="../js/plugins.js"></script>        
        <script type="text/javascript" src="../js/actions.js"></script>        
        <!-- END TEMPLATE -->

         <script>
        var app = angular.module('myapp',[]);
        app.controller('cntrl',function($scope,$http){  
        //function data display
        $scope.display_data = function(){
            $http.get("display_items_taken.php")
                .success(function(data){
                    $scope.data = data;
                    //$scope.data.length = data;
                    $scope.user = $scope.data[0];
                })
                .error(function() {
                    $scope.data = "error in fetching data";
                   
                });
            }
            $scope.display_data();

        });
        </script>
    <!-- END SCRIPTS -->
    
    <!-- COUNTERS // NOT INCLUDED IN TEMPLATE -->
        <!-- GOOGLE -->
        <script type="text/javascript">
          (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
          (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
          m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
          })(window,document,'script','../../../../www.google-analytics.com/analytics.js','ga');

          ga('create', 'UA-36783416-1', 'aqvatarius.com');
          ga('send', 'pageview');
        </script>        
        <!-- END GOOGLE -->
        
        <!-- YANDEX -->
        <script type="text/javascript">
        (function (d, w, c) {
            (w[c] = w[c] || []).push(function() {
                try {
                    w.yaCounter25836617 = new Ya.Metrika({id:25836617,
                            webvisor:true,
                            accurateTrackBounce:true});
                } catch(e) { }
            });

            var n = d.getElementsByTagName("script")[0],
                s = d.createElement("script"),
                f = function () { n.parentNode.insertBefore(s, n); };
            s.type = "text/javascript";
            s.async = true;
            s.src = (d.location.protocol == "https:" ? "https:" : "http:") + "//mc.yandex.ru/metrika/watch.js";

            if (w.opera == "[object Opera]") {
                d.addEventListener("DOMContentLoaded", f, false);
            } else { f(); }
        })(document, window, "yandex_metrika_callbacks");
        </script>
        <noscript><div><img src="http://mc.yandex.ru/watch/25836617" style="position:absolute; left:-9999px;" alt="" /></div></noscript>     
        <!-- END YANDEX -->
    <!-- END COUNTERS // NOT INCLUDED IN TEMPLATE -->

    </body>

<!-- Mirrored from aqvatarius.com/themes/atlant/html/blank.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 31 Jul 2015 06:16:06 GMT -->
</html>







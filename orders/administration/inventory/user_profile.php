<?php
 session_start();
   if(!isset($_SESSION['id'])){
  header('location: ../../index.php'); 
  exit;
 }else{
}
?>
<!DOCTYPE html>
<html lang="en">   
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>        
        <!-- META SECTION -->
        <title>SMS | User profile</title>            
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        
        <link rel="icon" href="favicon.ico" type="image/x-icon" />
        <!-- END META SECTION -->
        
        <!-- CSS INCLUDE -->        
        <link rel="stylesheet" type="text/css" id="theme" href="../css/theme-default.css"/>
        <!-- EOF CSS INCLUDE -->    
    </head>
    <body>
        <!-- START PAGE CONTAINER -->
        <div class="page-container">
            
            <!-- START PAGE SIDEBAR -->
            <div class="page-sidebar">
                <!-- START X-NAVIGATION -->
                <?php require_once '../incs/sidelink1.php';?>
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
					<!-- POWER OFF -->
                    <li class="xn-icon-button pull-right last">
                        <a href="#"><span class="fa fa-power-off"></span></a>
                        <ul class="xn-drop-left animated zoomIn">
						    <li><a href=""><span class="fa fa-user"></span> My profile</a></li>
                            <li><a href="../lock_screen.php"><span class="fa fa-lock"></span> Lock Screen</a></li>
                            <li><a href="#" class="mb-control" data-box="#mb-signout"><span class="fa fa-sign-out"></span> Sign Out</a></li>
                        </ul>                        
                    </li> 
                    <!-- END POWER OFF -->
                    <!-- END TOGGLE NAVIGATION -->                    
                </ul>
                <!-- END X-NAVIGATION VERTICAL -->                     
                
                <!-- START BREADCRUMB -->
                <ul class="breadcrumb">
                    <li><a href="#">Home</a></li>                    
                    <li class="active">User profile</li>
                </ul>
                <!-- END BREADCRUMB -->				
                
                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">
                
                   <div class="row">
						<div class="col-md-8 col-lg-8" >
						<div class="panel panel-default">
                        <div class="panel-body">
										<div class = "row">
										<div class = "col-md-4 col-lg-4">
										
										<div class="panel panel-default">                                
                                <div class="panel-body">
								<div class="row">
										<!--<center> <h3>Festus flowin</h3></center>-->
										</div>
                                    <div class="text-center" id="user_image">
                                        <img src="../assets/images/users/no-image.jpg" class="img-thumbnail"/>
                                    </div>                                    
                                </div>
                                 <div class="panel panel-default form-horizontal">
                                <div class="panel-body form-group-separated">                                    
                                    <div class="form-group">
                                        <label class="col-md-4 col-xs-5 control-label">Username</label>
                                        <div class="col-md-8 col-xs-7"><?php echo $_SESSION['username'];?></div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4 col-xs-5 control-label">Your role</label>
                                        <div class="col-md-8 col-xs-7 line-height-30">System administrator</div>
                                    </div>
                                </div>
                                
                            </div>
                            </div>
							       </div>
										<div class = "col-md-8 col-lg-8">
										<div class = "row" style="background:#f3f3f3; margin-bottom:15px; border-radius:6px;">
										<h4 style="padding-top:10px; padding-left:10px" ><strong><i class = "fa fa-info-circle"></i> Personal informations</strong></h4>
										  <table class = "table table-bordered table-stripped">
										  <thead>
										  <th style="background:#f3f3f3"><strong>First Name</strong></th>
										  <th style="background:#f3f3f3"><strong>Last Name</strong></th>
										  <th style="background:#f3f3f3">Gender</th>
										  </thead>
										   <tr>
										   <td>
										   <p><?php echo $_SESSION['fname'];?></p>
										   </td>
										   <td>
										  <p><?php echo $_SESSION['lname'];?></p>
										</td>
										<td>
										  <p><?php echo $_SESSION['gender'];?></p>
                                        </td>
										</tr>
										</table>	
										</div>
										
										<div class = "row" style="background:#f3f3f3; margin-bottom:15px; border-radius:6px;">
										<h4 style="padding-top:10px; padding-left:10px"><strong><i class = "fa fa-phone"></i> Contacts</strong></h4>
										  <table class = "table table-bordered table-stripped">
										  <thead>
										  <th style="background:#f3f3f3"><strong>Phone No#</strong></th>
										  <th style="background:#f3f3f3"><strong>Email Address</strong></th>
										  </thead>
										   <tr>
										   <td>
										   <p><?php echo $_SESSION['phone'];?></p>
										   </td>
										   <td>
										  <p><?php echo $_SESSION['email'];?></p>
										</td>
										</tr>
										</table>
										</div>
										</div>
										</div>
                                       <div class="row">
										<div class="col-md-12 " >
											<button type="submit" data-toggle="modal" data-target="#modal_basic" class="pull-right btn btn-danger"><span class="fa fa-lock"></span>Change password</button>
											<button type="submit" data-toggle="modal" data-target="#modal_basic_1" style="margin-right:15px" class="pull-right btn btn-primary"><span class="fa fa-edit"></span>Edit info</button>
                        
											</div>
										</div>
										
								   </div>
								</div>
							</div>
						</div>
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
                            <a href="../logout.php" class="btn btn-success btn-lg">Yes</a>
                            <button class="btn btn-default btn-lg mb-control-close">No</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END MESSAGE BOX-->
		<!-- MODALS NO.1 -->        
        <div class="modal" id="modal_basic" tabindex="-1" role="dialog" aria-labelledby="defModalHead" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title" id="defModalHead"><i class = "fa fa-lock"></i> Change password</h4>
                    </div>
                    <div class="modal-body">
                        <div id = "error"></div>
                       <table class = "table table-bordered" style = "width:100%;background:#f3f3f3">
                                    <tr>
                                    <td width="350px">
                                    <label>New password</label>      
                                    </td>
                                    <td width="350px">
                                        <div class="form-group">
                                         <div class="col-md-12">
                                                <input type="text" id = "npass"  class="form-control" placeholder=""/>
                                            </div>
                                        </div>
                                    </td>
                                    </tr>
                                    <tr>
                                    <td width="350px">
                                    <label>Confirm password</label>      
                                    </td>
                                    <td width="350px">
                                        <div class="form-group">
                                         <div class="col-md-12">
                                                <input type="text" id = "cpass"  class="form-control" placeholder=""/>
                                            </div>
                                        </div>
                                    </td>
                                    </tr>									
                              </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success" onclick="add_account()"><i class="fa fa-plus"></i>&nbsp;Update</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- END MODAL -->
		
		 <!-- END MESSAGE BOX-->
		<!-- MODALS NO.2 -->        
        <div class="modal" id="modal_basic_1" tabindex="-1" role="dialog" aria-labelledby="defModalHead" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title" id="defModalHead"><i class = "fa fa-user"></i> Edit your profile</h4>
                    </div>
                    <div class="modal-body">
                        <div id = "error"></div>
                       <table class = "table table-bordered" style = "width:100%;background:#f3f3f3">
                                    <tr>
                                    <td width="350px">
                                    <label>First Name</label>      
                                    </td>
                                    <td width="350px">
                                        <div class="form-group">
                                         <div class="col-md-12">
                                                <input type="text" id = "npass"  class="form-control" value = "<?php echo $_SESSION['fname'];?>"/>
                                            </div>
                                        </div>
                                    </td>
                                    </tr>
                                    <tr>
                                    <td width="350px">
                                    <label>last Name</label>      
                                    </td>
                                    <td width="350px">
                                        <div class="form-group">
                                         <div class="col-md-12">
                                                <input type="text" id = "cpass"  class="form-control" value = "<?php echo $_SESSION['lname'];?>"/>
                                            </div>
                                        </div>
                                    </td>
                                    </tr>
                                    <tr>
                                    <td width="350px">
                                    <label>Username</label>      
                                    </td>
                                    <td width="350px">
                                        <div class="form-group">
                                         <div class="col-md-12">
                                                <input type="text" id = "cpass"  class="form-control" value = "<?php echo $_SESSION['username'];?>"/>
                                            </div>
                                        </div>
                                    </td>
                                    </tr>
                                    <tr>
                                    <td width="350px">
                                    <label>Phone</label>      
                                    </td>
                                    <td width="350px">
                                        <div class="form-group">
                                         <div class="col-md-12">
                                                <input type="text" id = "cpass"  class="form-control" value = "<?php echo $_SESSION['phone'];?>"/>
                                            </div>
                                        </div>
                                    </td>
                                    </tr>
                                   <tr>
                                    <td width="350px">
                                    <label>Email address</label>      
                                    </td>
                                    <td width="350px">
                                        <div class="form-group">
                                         <div class="col-md-12">
                                                <input type="text" id = "cpass"  class="form-control" value = "<?php echo $_SESSION['email'];?>"/>
                                            </div>
                                        </div>
                                    </td>
                                    </tr>									
                              </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success" onclick="add_account()"><i class="fa fa-plus"></i>&nbsp;Update</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- END MODAL -->

        <!-- START PRELOADS -->
        <audio id="audio-alert" src="../audio/alert.mp3" preload="auto"></audio>
        <audio id="audio-fail" src="../audio/fail.mp3" preload="auto"></audio>
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
    <!-- END SCRIPTS -->

    </body>
</html>







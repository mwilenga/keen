<?php
 require_once 'admin_login.php';
?>
<!DOCTYPE html>
<html lang="en" class="body-full-height">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>        
        <!-- META SECTION -->
        <title>TMS | Login</title>            
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        
        <link rel="icon" href="favicon.ico" type="image/x-icon" />
        <!-- END META SECTION -->
        
        <!-- CSS INCLUDE -->        
        <link rel="stylesheet" type="text/css" id="theme" href="css/theme-default.css"/>
        <!-- EOF CSS INCLUDE -->    
    </head>
    <body>
        
        <div class="login-container">
        
            <div class="login-box animated fadeInDown">
                <!--<div class="login-logo"></div>-->
                <div class="login-body">
					<?php
					 if(isset($error_sms)){
						 echo $error_sms;
						 }
					?>
                    <div class="login-title"><strong><center>KEEN ADMIN PANEL</center></strong><hr>login</div>
                    <form action="" class="form-horizontal" method="post">
                    <div class="form-group">
                        <div class="col-md-12">
                            <input type="text" class="form-control" name = "username" placeholder="Username"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <input type="password" class="form-control" name = "password" placeholder="Password"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6">
                            <a href="#" class="btn btn-link btn-block">Forgot your password?</a>
                        </div>
                        <div class="col-md-6">
                            <button class="btn btn-info btn-block" type = "submit" name = "submit">Log In</button>
                        </div>
                    </div>
                    </form>
                </div>
                <div class="login-footer">
                    <div class="pull-left">
                        &copy; 2017 KEEN
                    </div>
                    <div class="pull-right">
                        <a href="#"></a>
                    </div>
                </div>
            </div>
            
        </div>    
        <!-- END YANDEX -->
    <!-- END COUNTERS // NOT INCLUDED IN TEMPLATE -->
        
    </body>
</html>







 <ul class="x-navigation">
                    <li class="xn-log">
                        <a href=""></a>
                        <a href="#" class="x-navigation-control"></a>
                    </li>                                                                      
                    <li class="xn-title" style = "color:white"><center><?php echo $_SESSION['name'];?></center></li>
                    <li class = "">
                        <a href="index.php"><span class="fa fa-home"></span> <span class="xn-text">Home</span></a>
                    </li>
                    <li>
                        <a href="items.php"><span class="fa fa-truck"></span> <span class="xn-text">Manage inventory</span></a>
                    </li>
                    <li>
                    <a href="items_taken.php"><span class="fa fa-tasks"></span> <span class="xn-text">Manage stock take</span></a>
                    </li> 
                    <li class="xn-openable">
                        <a href="#"><span class="fa fa-file"></span>Reports</a>
                           <ul>                                                                        
                            <li><a href="stock_trend_report.php"><i class="fa fa-file-o"></i>Stock level report</a></li>
                             <li><a href="stock_out_history.php"><i class="fa fa-sign-out"></i>Stock out history</a></li>
                             <li><a href="prof_loss_report.php"><i class="fa fa-sign-out"></i>Profit&Loss report</a></li>
                            </ul>
                         </li> 
                    <li>
                        <a href="../index.php"><span class="fa fa-arrow-left"></span> <span class="xn-text">Modules</span></a>
                    </li>                                             
                </ul>

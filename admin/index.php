<?php
    @include_once('connector.php');
    @include_once('headeradmin.php');
?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Dashboard</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-bars fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <?php 
                                        $sql="select * from tb_menus";
                                        $res = $conn->query($sql);
                                        $count = $res->rowCount();
                                        //count row in table
                                       
                                    ?>
                                    <div class="huge"><?php echo $count; ?></div>
                                   
                                    <div>Categories</div>
                                </div>
                            </div>
                        </div>
                        <a href="catelist.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Categories</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-book fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                <?php 
                                        $sql="select * from tb_content";
                                        $res = $conn->query($sql);
                                        $acount = $res->rowCount();
                                        //count row in table
                                       
                                    ?>
                                    <div class="huge"><?php echo $acount; ?></div>
                                    <div>Articles</div>
                                </div>
                            </div>
                        </div>
                        <a href="contentslist.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Articles</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-image fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                <?php 
                                        $sql="select * from tb_ads";
                                        $res = $conn->query($sql);
                                        $adcount = $res->rowCount();
                                        //count row in table
                                       
                                    ?>
                                    <div class="huge"><?php echo $adcount; ?></div>
                                    <div>Ads</div>
                                </div>
                            </div>
                        </div>
                        <a href="adslist.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Ads</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <?php if($_SESSION['ROLE']==1) {?>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-user fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                <?php 
                                        $sql="select * from tb_users";
                                        $res = $conn->query($sql);
                                        $ucount = $res->rowCount();
                                        //count row in table
                                       
                                    ?>
                                    <div class="huge"><?php echo $ucount; ?></div>
                                    <div>Manage user</div>
                                </div>
                            </div>
                        </div>
                        <a href="userlist.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Uers</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <?php } ?>
            </div>
            <!-- /.row -->
            <d
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="vendor/raphael/raphael.min.js"></script>
    <script src="vendor/morrisjs/morris.min.js"></script>
    <script src="data/morris-data.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="dist/js/sb-admin-2.js"></script>

</body>

</html>

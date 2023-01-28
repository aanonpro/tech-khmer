		<?php 
			
			@include_once('headeradmin.php');
			//select to dropdown
			
		?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header"><i class="fa fa-plus-circle"></i> Add Ads</h3>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Add New
                        </div>
                        <div class="panel-body">
                            <div class="row">


                            
                                <form role="form" action="querydata.php" method="post" enctype="multipart/form-data">
                                    <div class="col-lg-6">
                                    	<div class="form-group">
                                            <label>Ads Photo</label>
                                            <input type="file" class="form-control" name="ads_img" id="ads_img">
                                            <p class="help-block"></p>
                                        </div>
                                       
                                    </div>
                                    <div class="col-lg-6">
										<div class="form-group">
                                            <label>Location</label>
                                           
                                            <select class="form-control" name="cboads">
                                            <option value="0">------------</option>
                                            <?php
                                                require_once('connector.php');
                                                $selectmenu = $conn->query("SELECT * FROM ads_location ");
                                                while($srow = $selectmenu->fetch()){?>
                                               
                                                <option value="<?php  echo $srow['loc_id']; ?>"> <?php  echo $srow['loc_id']; ?> <?php echo $srow['name']; ?></option>
											
                                            <?php
                                                }
                                            ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
										<div class="form-group">
                                            <label>Status</label>
                                            <select class="form-control" name="cbostatus">
												<option value="1" selected> Active</option>
												<option value="0"> Disabled</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
										<div class="form-group">
                                            <label>Description</label>
                                            <textarea class="form-control" rows="3" name="desc"></textarea>
                                        </div>
									</div>
                                   
                                    <div class="col-lg-12">
                                    	<button type="submit" class="btn btn-primary" name="btn_add_ads" value="Save"><i class="fa fa-check"></i> Save</button>
                                        <a href="adslist.php" class="btn btn-success"><i class="fa fa-th-list"></i> Ads List</a>
                                    </div>
                                </form>
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
    
    <?php @include_once('footeradmin.php');?>
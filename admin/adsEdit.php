		<?php 
			
			@include_once('connector.php');
			@include_once('headeradmin.php');
			//select ដើម្បីបង្ហាញលើ Form
			if(isset($_GET['adsid']))
			{
				$id=$_GET['adsid'];
				$sqlstring_ads="SELECT * FROM tb_ads WHERE ads_id=$id";
				$stringStatement_ads=$conn->prepare($sqlstring_ads);
				$stringStatement_ads->execute();
				$fetchs=$stringStatement_ads->fetchAll();
			
			}
			
		?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header"><i class="fa fa-plus-circle"></i> Update Ads</h3>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Update New
                        </div>
                        <div class="panel-body">
                            <div class="row">


                            
                                <form role="form" action="querydata.php" method="post" enctype="multipart/form-data">
                                    <div class="col-lg-6">
                                    	<div class="form-group">
                                            <label>Ads Update</label>
                                            <input type="hidden" name="ads_pic" id="ads_pic" value="<?php echo $fetchs[0]['ads_id'] ?>"><br/>
                                            <img src="../images/<?php echo $fetchs[0]['ads_photo']; ?>" style="width:140px">
                                            <input type="file" class="form-control " name="ads_img" id="ads_img" value="" > 
                                            <p class="help-block" style="color: red;">make sure you had selected picture for edit</p>
                                        </div>
                                       
                                    </div>
                                    
                                    <div class="col-lg-6">
										<div class="form-group">
                                            <label>Location</label>
                                           
                                            
                                            <?php
													$loc_status = $fetchs[0]['location'];
												?>
                                            <select class="form-control" name="cbolocat">
                                                <?php
                                                    require_once('connector.php');
                                                    $selectmenu = $conn->query("SELECT * FROM ads_location order by create_on DESC");
                                                    while($srow = $selectmenu->fetch()){?> 

                                                        <option <?php if ($srow['loc_id'] == $fetchs[0]['location']) { ?> selected="selected" <?php } ?>   value="<?php echo $srow['loc_id']; ?>" <?=$loc_status==1? 'selected':''?>><?php echo $srow['loc_id']; ?> <?php echo $srow['name']; ?></option>
                                                    
                                                <?php
                                                }
                                                ?>
                                                        <!-- <option value="0" <?=$user_status==0? 'selected':''?>>-------</option> -->
                                            </select>
                                          
                                        </div>
                                    </div>
                                    <!-- /.col-lg-6 (nested) -->
                                    <div class="col-lg-6">
										<div class="form-group">
                                            <label>Status</label>
                                            <?php
													$ads_status = $fetchs[0]['status'];
												?>
                                            <select class="form-control" name="cbostatus">
                                            <option  value="1" <?=$ads_status==1? 'selected':''?>>Active</option>
                                            <option value="0" <?=$ads_status==0? 'selected':''?>>Disabled</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
										<div class="form-group">
                                            <label>Description</label>
                                            <textarea class="form-control" rows="3" name="desc"><?php echo $fetchs[0]['ads_des']; ?></textarea>
                                        </div>
									</div>
                                   
                                    <div class="col-lg-12">
                                    	<button type="submit" class="btn btn-primary" name="btnedit_ads" value="Save"><i class="fa fa-check"></i> Save</button>
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
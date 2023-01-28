		<?php 
			@include_once('db/connect.php');
			//echo "<br/>Test connection!";
			@include_once('headeradmin.php');
			
			$pup = $_REQUEST['pup'];
			echo "Get is : ".$pup;
			if(!empty($pup))
				{
					@$sql = "SELECT * FROM product_tb p LEFT JOIN stock_status_tb s ON p.stock_status = s.id 
							WHERE p.pid = ".$pup;
						$result = $conn->query($sql);
						$row = $result->fetch_assoc();
						
				}
				
			@$stockdrop = "SELECT * FROM stock_status_tb WHERE active = 1";
			$drop = $conn->query($stockdrop);
		
		?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header"><i class="fa fa-pencil-square-o"></i> Edit Product</h3>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Edit
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <form role="form" action="postdata/productpostupdate.php" method="post" name="editproduct" enctype="multipart/form-data">
                                    <div class="col-lg-6">
                                    	<div class="form-group">
                                            <label>Product Image</label>
                                            <input type="file" class="form-control" name="pimg" id="pimg">
                                            <p class="help-block"></p>
                                        </div>
                                        <div class="form-group">
                                            <label>Product Code</label>
                                            <input class="form-control" name="pcode" id="pcode" value="<?php echo @$row['pcode'];?>">
                                            <input type="hidden" name="pid" id="pid" value="<?php echo @$row['pid'];?>">
                                            <p class="help-block"></p>
                                        </div>
                                        <div class="form-group">
                                            <label>Product Name</label>
                                            <input class="form-control" name="pname" id="pname" value="<?php echo @$row['pname'];?>">
                                            <p class="help-block"></p>
                                        </div>
                                    </div>
                                    <!-- /.col-lg-6 (nested) -->
                                    <div class="col-lg-6">
                                    	<div class="form-group">
                                            <label>Stock Status</label>
                                            <select class="form-control" name="stockstatus">
                                            <?php
												if ($drop->num_rows > 0) {
													while($srow = $drop->fetch_assoc()) {?>
                                                    <option value="<?php echo $srow['id'];?>" <?=$row['stock_status']==$srow['id']?'selected':''?>><?php echo $srow['name'];?></option>
														
											<?php	}
												}
											?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Description</label>
                                            <textarea class="form-control" rows="3" name="des"><?php echo @$row['description'];?></textarea>
                                        </div>
                                    </div>
                                    <!-- /.col-lg-6 (nested) -->
                                    <div class="col-lg-12">
                                    	<button type="submit" class="btn btn-primary"><i class="fa fa-refresh"></i> Update</button>
                                        <a href="index.php" class="btn btn-success"><i class="fa fa-th-list"></i> Product List</a>
                                    </div>
                                    <div class="col-lg-12"><br/>
                                    	<?php $img= @$row['pimg'];
											if(!empty($img)){ $path = "products/";?>
												<img src="<?php echo $path.$img;?>" width="500"/>	
										<?php }
										?>
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
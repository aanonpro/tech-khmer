		<?php 
			@include_once('connector.php');
			@include_once('headeradmin.php');
			//select to dropdown
			@$stockdrop = "SELECT * FROM tb_menus WHERE active = 1";
			$drop = $conn->query($stockdrop);
		?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header"><i class="fa fa-plus-circle"></i> Add Product</h3>
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
                                <form role="form" action="postdata/productpost.php" method="post" name="addproduct" enctype="multipart/form-data">
                                    <div class="col-lg-6">
                                    	<div class="form-group">
                                            <label>Product Image</label>
                                            <input type="file" class="form-control" name="pimg" id="pimg">
                                            <p class="help-block"></p>
                                        </div>
                                        <div class="form-group">
                                            <label>Product Code</label>
                                            <input class="form-control" name="pcode" id="pcode" value="" autofocus>
                                            <p class="help-block"></p>
                                        </div>
                                        <div class="form-group">
                                            <label>Product Name</label>
                                            <input class="form-control" name="pname" id="pname" value="">
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
													while($row = $drop->fetch_assoc()) {?>
                                                    <option value="<?php echo $row['id'];?>"><?php echo $row['name'];?></option>
														
											<?php	}
												}
											?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Description</label>
                                            <textarea class="form-control" rows="3" name="des"></textarea>
                                        </div>
                                    </div>
                                    <!-- /.col-lg-6 (nested) -->
                                    <div class="col-lg-12">
                                    	<button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> Save</button>
                                        <a href="index.php" class="btn btn-success"><i class="fa fa-th-list"></i> Product List</a>
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
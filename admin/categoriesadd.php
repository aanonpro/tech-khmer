		<?php 
			
			@include_once('headeradmin.php');
			//select to dropdown
			
		?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header"><i class="fa fa-plus-circle"></i> Add Categories/Menu</h3>
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
                                <form role="form" action="querydata.php" method="post"  enctype="multipart/form-data">
                                    <div class="col-lg-6">
                                    	<div class="form-group">
                                            <label>Picture</label>
                                            <input type="file" class="form-control" name="pimg" id="pimg">
                                            <p class="help-block"></p>
                                        </div>
                                        <div class="form-group">
                                            <label>Categories Name</label>
                                            <input class="form-control" name="cate_name"  value=""
                                             autofocus >
                                            <p class="help-block"></p>
                                        </div>
                                        
                                    </div>
                                    <!-- /.col-lg-6 (nested) -->
                                    <div class="col-lg-6">
                                    	<div class="form-group">
                                            <label> Status</label>
                                            <select class="form-control" name="cbostatus">
                                            <option value="">Choose Once</option>
                                            <option  value="1">Active</option>
                                            <option value="0">Disabled</option>
                                            
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Ordering</label>
                                            <input class="form-control" name="cate_ordering"  value="" >
                                            <p class="help-block"></p>
                                        </div>
                                        
                                    </div>
                                    <div class="col-lg-12">
                                    	
                                        <div class="form-group">
                                            <label>Detail</label>
                                            <textarea class="form-control" rows="5" name="des" ></textarea>
                                        </div>
                                    </div>
                                    <!-- /.col-lg-6 (nested) -->
                                    <div class="col-lg-12">
                                    	<button type="submit" name="btnSave" value="Save" class="btn
                                         btn-primary"><i class="fa fa-check">
                                        </i> Save</button>
                                        <a href="index.php" class="btn btn-success"><i class="fa fa-th-list">
                                        </i> Category List</a>
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
		<?php 
			@include_once('connector.php');
			@include_once('headeradmin.php');
			//select ដើម្បីបង្ហាញលើ Form
			if(isset($_GET['cateid']))
			{
				$id=$_GET['cateid'];
				$sqlstring="SELECT * FROM tb_menus WHERE id=$id";
				$stringStatement=$conn->prepare($sqlstring);
				$stringStatement->execute();
				$fetchs=$stringStatement->fetchAll();
			
			}
			
		?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header"><i class="fa fa-plus-circle"></i> Update Categories/Menu</h3>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Update
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <form role="form" action="querydata.php" method="post"  enctype="multipart/form-data">
                                    <div class="col-lg-6">
                                    	<div class="form-group">
                                            <label>Picture</label>
                                            <input type="file" class="form-control" name="pimg" id="pimg">
                                            <p class="help-block" style="color: red;">make sure you had selected picture for edit</p>
                                        </div>
                                        <div class="form-group">
                                            <label>Categories Name</label>
                                            <input type="hidden" name="cate_id" id="cate_id" value="<?php echo 
											$fetchs[0]['id']; ?>">
                                             
                                            <input class="form-control" name="cate_name" id="cate_name"  
                                            value="<?php echo $fetchs[0]['menu_name']; ?>" autofocus>
                                            <p class="help-block"></p>
                                        </div>
                                        
                                    </div>
                                    <!-- /.col-lg-6 (nested) -->
                                    <div class="col-lg-6">
                                    	<div class="form-group">
                                            <label>Ordering</label>
                                            <input class="form-control" name="cate_ordering" id="cate_ordering"
                                             value=" <?php echo $fetchs[0]['ordering']; ?>">
                                            <p class="help-block"></p>
                                        </div>
                                    	<div class="form-group">
                                            <label> Status</label>
                                            	<?php
													$cate_status = $fetchs[0]['status'];
												?>
                                            <select class="form-control" name="cbostatus">
                                            <option value="">Choose Once</option>
                            <option  value="1" <?=$cate_status==1? 'selected':''?>>Active</option>
                            <option value="0" <?=$cate_status==0? 'selected':''?>>Disabled</option>
                                            
                                            </select>
                                        </div>
                                        
                                        
                                    </div>
                                    <div class="col-lg-12">
                                    	
                                        <div class="form-group">
                                            <label>Detail</label>
                                            <textarea class="form-control" rows="5" name="des"> <?php echo 	
											$fetchs[0]['detail']; ?></textarea>
                                        </div>
                                    </div>
                                    <!-- /.col-lg-6 (nested) -->
                                    <div class="col-lg-12">
                                    	<button type="submit" name="btnSave_change" value="Save" class="btn 
                                    btn-primary">
                                <i class="fa fa-refresh"></i> Save Change</button>
                     <a href="catelist.php" class="btn btn-success"><i class="fa fa-th-list"></i> Category 
                     List</a>
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
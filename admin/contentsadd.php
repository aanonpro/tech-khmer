		<?php 
			
			@include_once('headeradmin.php');
			//select to dropdown
			
		?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header"><i class="fa fa-plus-circle"></i> Add Content</h3>
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
                                            <label>thumbnail cover</label>
                                            <input type="file" class="form-control" name="pimg" id="pimg" required>
                                            <p class="help-block"></p>
                                        </div>
                                        <div class="form-group">
                                            <label>Title </label>
                                            <input class="form-control" name="title" id="title" value="" autofocus placeholder="Title of content" required>
                                            <p class="help-block"></p>
											<input type="hidden" class="form-control" name="userid" value="" placeholder="by user">
                                        </div>
                                        
                                    </div>
                                    
                                    <!-- /.col-lg-6 (nested) -->
                                    <div class="col-lg-6">
										<div class="form-group">
                                            <label>Status</label>
                                            <select class="form-control is-invalid" name="cbostatus">
                                                <option value="0" selected>---situation---</option>
												<option value="1"> Active</option>
												<option value="0"> Disabled</option>
                                            </select>
                                        </div>
										<div class="form-group ">
                                            <label>Category type</label>
                                            <!-- <select class="form-select form-control is-invalid" name="cbomenu" id="validationServer04" aria-describedby="validationServer04Feedback" required> -->
                                            <select class="form-control required" name="cbomenu">
                                            <option value="0">---Select Categories---</option>
                                            <?php
                                                require_once('connector.php');
                                                $selectmenu = $conn->query("SELECT * FROM tb_menus WHERE status=1 order by created_at DESC");
                                                while($srow = $selectmenu->fetch()){?>
                                               
                                                <option value="<?php  echo $srow['id']; ?>"><?php  echo $srow['id']; ?> <?php echo $srow['menu_name']; ?></option>
											
                                            <?php
                                                }
                                            ?>
                                            </select>
                                        </div>
                                    </div>
                                    <!-- end stutus and category -->
                                    <div class="col-lg-6">
										<div class="form-group">
                                            <label>Post by</label>
                                           
                                            <select class="form-control" name="cbouser">
                                            <option value="0">------Select user------</option>
                                            <?php
                                                require_once('connector.php');
                                                $selectmenu = $conn->query("SELECT * FROM tb_users WHERE status=1 order by created_on DESC");
                                                while($srow = $selectmenu->fetch()){?>
                                               
                                                <option value="<?php  echo $srow['user_id']; ?>"> <?php echo $srow['name']; ?></option>
											
                                            <?php
                                                }
                                            ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>pic content first</label>
                                            <input type="file" class="form-control" name="simg" id="simg" required>
                                            <p class="help-block"></p>
                                        </div>
                                    </div>
                                    
									<div class="col-lg-12">
										<div class="form-group">
                                            <label>Short Describe</label>
                                            <textarea class="form-control is-invalid" rows="3" name="short_des" required></textarea>
                                        </div>
									</div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>pic content second</label>
                                            <input type="file" class="form-control" name="rimg" id="rimg">
                                            <p class="help-block"></p>
                                        </div>
                                    </div>
									<div class="col-lg-12">
										<div class="form-group">
                                            <label>Description</label>
                                            <textarea class="form-control is-invalid" id="myText" rows="3" name="des" required></textarea>
                                        </div>
									</div>
                                    
                                    <div class="col-lg-12">
                                    	<button type="submit"  class="btn btn-primary" name="btnsave_content" value="Save"><i class="fa fa-check"></i> Save</button>
                                        <a href="contentslist.php" class="btn btn-success"><i class="fa fa-th-list"></i> Content List</a>
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
    <script src="//cdn.ckeditor.com/4.18.0/standard/ckeditor.js"></script>
    <script src="ckeditor/ckeditor.js" ></script>                                           
    <script>
        CKEDITOR.replace("des",{
          
            filebrowserUploadUrl: 'ckeditor/ck_upload.php',
            filebrowserUploadMethod: 'form'
        });
    </script>
    
    
    <?php @include_once('footeradmin.php');?>
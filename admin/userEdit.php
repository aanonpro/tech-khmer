		<?php 
			@include_once('connector.php');
			@include_once('headeradmin.php');
           
            if(isset($_session['ROLE']) && $_session['ROLE']!='1'){
                header('location: index.php');
                die();
            }
			//select ដើម្បីបង្ហាញលើ Form
			if(isset($_GET['usersid']))
			{
				$id=$_GET['usersid'];
				$sqlstring="SELECT * FROM tb_users WHERE user_id=$id";
				$stringStatement=$conn->prepare($sqlstring);
				$stringStatement->execute();
				$fetchs=$stringStatement->fetchAll();
			
			}
			
		?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header"><i class="fa fa-plus-circle"></i> update user</h3>
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


                            <form role="form" action="querydata.php" method="post" enctype="multipart/form-data">
                                    <div class="col-lg-6">
                                    	<div class="form-group">
                                            <label>Profile</label>
                                            <input type="hidden" name="user_id" id="user_id" value="<?php echo $fetchs[0]['user_id'] ?>"><br/>
                                            <img src="../images/<?php echo $fetchs[0]['profile']; ?>" style="width:150px">
                                            
                                            <input type="file" class="form-control" name="user_img" id="user_img" value="" > 
                                            <p class="help-block" style="color: red;">make sure you had selected picture for edit</p>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>name </label>
                                            <input type="text" class="form-control" name="user_name" id="user_name" value="<?php echo $fetchs[0]['name']; ?>" autofocus placeholder="name">
                                            <p class="help-block"></p>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>email </label>
                                            <input type="email" class="form-control" name="user_email" id="email" value="<?php echo $fetchs[0]['email']; ?>" placeholder="email">
                                            <p class="help-block"></p>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>password </label>
                                            <input type="password" class="form-control" name="user_password" id="password" value="<?php echo $fetchs[0]['password']; ?>" placeholder="password">
                                            <p class="help-block"></p>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Status</label>
                                            <?php
													$user_status = $fetchs[0]['status'];
												?>
                                            <select class="form-control" name="cbostatus">
                                            <option  value="1" <?=$user_status==1? 'selected':''?>>Active</option>
                                            <option value="0" <?=$user_status==0? 'selected':''?>>Disabled</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Role</label>
                                            <?php
													$user_role = $fetchs[0]['role'];
												?>
                                            <select class="form-control" name="cborole">
												<option value="1" <?=$user_role==1? 'selected':''?>> Admin</option>
												<option value="0" <?=$user_role==0? 'selected':''?>> user</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
										<div class="form-group">
                                            <label>Description</label>
                                            <textarea class="form-control" rows="3" name="description" ><?php echo $fetchs[0]['noted']; ?></textarea>
                                        </div>
									</div>
                                    <!-- /.col-lg-6 (nested) -->
                                    
                                 
                                    <div class="col-lg-12">
                                    	<button type="submit" class="btn btn-primary" name="btnEdit_user" value="Save"><i class="fa fa-check"></i> Save Change</button>
                                        <a href="userlist.php" class="btn btn-success"><i class="fa fa-th-list"></i> User List</a>
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
    <script src="../backendcontents/ckeditor/ckeditor.js" ></script>
    <script>
        CKEDITOR.replace("des",{
          
            filebrowserUploadUrl: 'ckeditor/ck_upload.php',
            filebrowserUploadMethod: 'form'
        });
    </script>
    
    <?php @include_once('footeradmin.php');?>
		<?php 
			@include_once('connector.php');
			@include_once('headeradmin.php');
			//select to dropdown
            if(isset($_session['ROLE']) && $_session['ROLE']!='1'){
                header('location: index.php');
                die();
            }
			
		?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header"><i class="fa fa-plus-circle"></i> Add User</h3>
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
                                            <label>user Photo</label>
                                            <input type="file" class="form-control" name="user_img" id="ads_img">
                                            <p class="help-block"></p>
                                        </div>
                                        <div class="form-group">
                                            <label>name </label>
                                            <input type="text" class="form-control" name="user_name" id="user_name" value="" autofocus placeholder="name">
                                            <p class="help-block"></p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>email </label>
                                            <input type="email" class="form-control" name="user_email" id="email" value="" placeholder="email">
                                            <p class="help-block"></p>
                                        </div>
                                        <div class="form-group">
                                            <label>password </label>
                                            <input type="password" class="form-control" name="user_password" id="password" value="" placeholder="password">
                                            <p class="help-block"></p>
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
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Role</label>
                                            <select class="form-control" name="cborole">
												<option value="1" selected> Admin</option>
												<option value="0"> user</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
										<div class="form-group">
                                            <label>Describe</label>
                                            <textarea class="form-control" rows="3" name="description"></textarea>
                                        </div>
									</div>
                                   
                                    <div class="col-lg-12">
                                    	<button type="submit" class="btn btn-primary" name="btn_add_user" value="Save"><i class="fa fa-check"></i> Save</button>
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
    
    <?php @include_once('footeradmin.php');?>
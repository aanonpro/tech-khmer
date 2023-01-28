		<?php 
			@include_once('connector.php');
			@include_once('headeradmin.php');
           
			//select ដើម្បីបង្ហាញលើ Form
			if(isset($_GET['cateid']))
			{
				$id=$_GET['cateid'];
				$sqlstring="SELECT * FROM tb_content WHERE cont_id=$id";
				$stringStatement=$conn->prepare($sqlstring);
				$stringStatement->execute();
				$fetchs=$stringStatement->fetchAll();
                extract($fetchs);
			
			}
            else{
                $msg="error";
            }
          
	

			
		?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header"><i class="fa fa-plus-circle"></i> Update Content/Menu</h3>
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
                                            <label>thumbnail cover</label>
                                            <input type="hidden" name="title_id" id="title_id" value="<?php echo $fetchs[0]['cont_id'] ?>"><br/>
                                            <img src="../images/<?php echo $fetchs[0]['pic_cover']; ?>" style="width:90px">
                                            
                                            <input type="file" class="form-control" name="pimg" id="pimg" value="" > 
                                            <!-- <p class="help-block" style="color: red;">make sure you had selected picture for edit</p> -->
                                        </div>
                                        <div class="form-group">
                                            <label>Title </label>
                                          
                                            <input class="form-control" name="title" id="title" value="<?php echo $fetchs[0]['cont_title']; ?>" autofocus placeholder="Title of content">
                                            <p class="help-block"></p>
                                        </div>
                                        
                                    </div>
                                    
                                    <!-- /.col-lg-6 (nested) -->
                                    <div class="col-lg-6">
										<div class="form-group">
                                            <label>Status</label>
                                            <?php
													$cate_status = $fetchs[0]['status'];
												?>
                                            <select class="form-control" name="cbostatus">
                                                <option value="0">---select situation---</option>
                                            <option  value="1" <?=$cate_status==1? 'selected':''?>>Active</option>
                                            <option value="0" <?=$cate_status==0? 'selected':''?>>Disabled</option>
                                            </select>
                                        </div>
                                        
										<div class="form-group">
                                            <label>Post by</label>
                                           
                                            
                                            <?php
													$user_status = $fetchs[0]['created_by'];
												?>
                                            <select class="form-control" name="cbouser">
                                                <option value="0">---select user---</option>
                                                <?php
                                                    require_once('connector.php');
                                                    $selectmenu = $conn->query("SELECT * FROM tb_users order by created_on DESC");
                                                    while($srow = $selectmenu->fetch()){?> 

                                                        <option <?php if ($srow['user_id'] == $fetchs[0]['created_by']) { ?> selected="selected" <?php } ?>   value="<?php echo $srow['user_id']; ?>" <?=$user_status==1? 'selected':''?>> <?php echo $srow['name']; ?></option>
                                                    
                                                <?php
                                                }
                                                ?>
                                                        <!-- <option value="0" <?=$user_status==0? 'selected':''?>>-------</option> -->
                                            </select>
                                          
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
										<div class="form-group">
                                            <label>Category type</label>
                                            <?php
													$cat_type = $fetchs[0]['id'];
												?>
                                            <select class="form-control" name="cbomenu">
                                                <option value="0">---select category---</option>
                                            <?php
                                                require_once('connector.php');
                                                $selectcat = $conn->query("SELECT * FROM tb_menus WHERE status=1 order by created_at DESC");
                                                while($srow = $selectcat->fetch()){?>
                                               
                                                <option <?php if ($srow['id'] == $fetchs[0]['id']) { ?> selected="selected" <?php } ?>  value="<?php  echo $srow['id']; ?>"><?php  echo $srow['id']; ?> <?php echo $srow['menu_name']; ?></option>
											
                                            <?php
                                                }
                                            ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Pic contents first</label>
                                            <img src="../images/<?php echo $fetchs[0]['thumb_slide']; ?>" style="width:90px">
                                            <input type="file" class="form-control" name="sl_img" id="simg" value=""  > 
                                        </div>
                                    </div>
                                   
                                    <!-- /.col-lg-6 (nested) -->
									<div class="col-lg-12">
										<div class="form-group">
                                            <label>Short Describe</label>
                                            <textarea class="form-control" rows="3" name="short_des" ><?php echo $fetchs[0]['short_detail']; ?></textarea>
                                        </div>
									</div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Pic content second</label>
                                            <img src="../images/<?php echo $fetchs[0]['thumb_right']; ?>" style="width:90px">
                                            <input type="file" class="form-control" name="r_img" id="rimg" value="" > 
                                        </div>
                                    </div>
									<div class="col-lg-12">
										<div class="form-group">
                                            <label>Description</label>
                                            <textarea class="form-control" rows="3" name="des" ><?php echo $fetchs[0]['detail']; ?></textarea>
                                        </div>
									</div>
                                    <div class="col-lg-12">
                                    	<button type="submit" class="btn btn-primary" name="btnEdit_content" value="Save"><i class="fa fa-check"></i> Save Change</button>
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
    <script src="../admin/ckeditor/ckeditor.js" ></script>
    <script>
        CKEDITOR.replace("des",{
          
            filebrowserUploadUrl: 'ckeditor/ck_upload.php',
            filebrowserUploadMethod: 'form'
        });
    </script>
    
    <?php @include_once('footeradmin.php');?>
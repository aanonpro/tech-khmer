		<?php 
			@include_once('connector.php');
			@include_once('headeradmin.php');

			//$data= $conn->query("SELECT * FROM tbcategories");
			$sqlquery="SELECT*FROM tb_content ";
			$statement=$conn->prepare($sqlquery);
			$statement->execute();
			
		?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header"><i class="fa fa-th-list"></i> Menu/Category List<a href="contentsadd.php" title="Add Product"> <i class="fa fa-plus-square"></i></a></h3>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Category list Detail
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>cover</th>
                                        <th>Title</th>
                                        <th>Short Detail</th>
                                        
                                        <th>Post by</th>
                                        <th>Status</th>
                                        <th>Category</th>
                                        <!-- <th>Description</th> -->
										<th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                	<?php
									
									$no=0;
									for($i=0; $list=$statement->fetch(); $i++){
									$no++;	
									?>
                                    
                                    <tr>
                                    	<td><?php echo $no;?></td>
                                        <!-- <td><?php '<img src="../images/">'."." ?><?php echo $list['pic_cover'];  ?></td> -->
                                        <td> <img src="../images/<?php echo $list['pic_cover'];?>" width="86" > </td>
                                        <td><?php echo $list['cont_title'];?></td>
                                        <td><?php echo $list['short_detail'] ?></td>
                                       
                                        <td>
											<?php $user_status= $list['created_by'];
											if($user_status>0)
											{?>
                                            	<span class="btn btn-primary"><?php echo $user_status; ?></span>
												
											<?php
                                            }else{?>
                                            	<span class="btn btn-danger">Disabled</span>
												
											<?php	}
											?>
                                        </td>
                                     
                                        <td>
											<?php $cate_status= $list['status'];
											if($cate_status==1)
											{?>
                                            	<button type="button" class="btn btn-info btn-circle "><i class="fa fa-check"></i></button>
												
											<?php
                                            }else{?>
                                            	<button type="button" class="btn btn-danger btn-circle "><i class="fa fa-times"></i></button>
												
											<?php	}
											?>
                                        </td>
                                        <td>
                                            <?php $cat_type= $list['id'];
                                                if($cat_type>0)
                                                {?>
                                                    <span class="btn btn-success"><?php echo $cat_type; ?></span>
                                                    
                                                <?php
                                                }else{?>
                                                    <span class="btn btn-danger">Disabled</span>
												
											<?php	}
											?>
                                        </td>
                                        
                                        <td><a class="btn btn-outline btn-info" href="contentEdit.php?cateid=<?php echo $list['cont_id']?>">
                                        <i class="fa fa-edit"></i> </a>
                                        <a class="btn btn-outline btn-danger" href="querydata.php?con_id=<?php echo $list['cont_id']?>">
                                        <i class="fa fa-trash"></i> </a></td>
                                   
                              
                                    
                                    </tr>
                                    
                                    <?php	
                                        } //end for
								
									?>
                                
                                </tbody>
                            </table>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
        </div>
       
        <!-- /#page-wrapper -->
    
    <?php @include_once('footeradmin.php');?>
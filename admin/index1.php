		<?php 
			@include_once('connector.php');
			@include_once('headeradmin.php');
            if(isset($_session['ROLE']) && $_session['ROLE']!='1'){
                header('location:adslist.php');
            }
			//$data= $conn->query("SELECT * FROM tbcategories");
			$sqlquery="SELECT*FROM tb_menus";
			$statement=$conn->prepare($sqlquery);
			$statement->execute();
			
		?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header"><i class="fa fa-th-list"></i> Menu/Category List<a href="categoriesadd.php" title="Add Product"> <i class="fa fa-plus-square"></i></a></h3>
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
                                        <th>Menu Name</th>
                                        <th>Ordering</th>
                                        <th>Status</th>
                                        <th>Detail</th>
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
                                        <td><?php echo $list['menu_name']?></td>
                                        <td><?php echo $list['ordering'] ?></td>
                                        <td>
											<?php $cate_status= $list['status'];
											if($cate_status==1)
											{?>
                                            	<span class="btn btn-primary">Active</span>
												
											<?php
                                            }else{?>
                                            	<span class="btn btn-danger">Disabled</span>
												
											<?php	}
											?>
                                        </td>
                                        <td><?php echo $list['detail'] ?></td>
                                        <td><a class="btn btn-outline btn-info" href=
                                        "cateEdit.php?cateid=<?php echo $list['id']?>">
                                        <i class="fa fa-edit"></i> Edit</a>
                                   <a class="btn btn-outline btn-danger" href=
                                        "querydata.php?cateid=<?php echo $list['id']?>">
                                        <i class="fa fa-trash"></i> Delete</a></td>
                                   
                              
                                    
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
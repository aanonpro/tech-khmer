		<?php 
			@include_once('connector.php');
			@include_once('headeradmin.php');
            
            if(isset($_session['ROLE']) && $_session['ROLE']!='1'){
                header('location: index.php');
                die();
            }
			//$data= $conn->query("SELECT * FROM tbcategories");
			$sqlquery="SELECT*FROM tb_users";
			$statement=$conn->prepare($sqlquery);
			$statement->execute();
			
		?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header"><i class="fa fa-th-list"></i> User List<a href="useradd.php" title="Add user"> <i class="fa fa-plus-square"></i></a></h3>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            User list Detail
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Photo</th>
                                        <th>name</th>
                                        <th>Decribe</th>
                                        <th>email</th>
                                        <th>created_on</th>
                                        <th>updated_on</th>
                                        <th>status</th>
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
                                        <td> <img src="../images/<?php echo $list['profile'];?>" width="86" > </td>
                                        <td><?php echo $list['name'] ?></td>
                                        <td>
											<?php $user_role= $list['role'];
											if($user_role==1)
											{?>
                                            	<span class="btn btn-success">admin</span>
												
											<?php
                                            }else{?>
                                            	<span class="btn btn-warning">user</span>
												
											<?php	}
											?>
                                        </td>
                                        <td><?php echo $list['email'] ?></td>
                                        <td><?php echo $list['created_on'] ?></td>
                                        <td><?php echo $list['updated_on'] ?></td>
                                        <td>
											<?php $user_status= $list['status'];
											if($user_status==1)
											{?>
                                            	<button type="button" class="btn btn-info btn-circle "><i class="fa fa-check"></i></button>
												
											<?php
                                            }else{?>
                                            	<button type="button" class="btn btn-danger btn-circle "><i class="fa fa-times"></i></button>
												
											<?php	}
											?>
                                        </td>
                                        <?php if( $_SESSION['ROLE']==1) {?>
                                            
                                            <td><a class="btn btn-outline btn-info" href="userEdit.php?usersid=<?php echo $list['user_id']?>">
                                            <i class="fa fa-edit"></i> Edit</a>
                                            <a class="btn btn-outline btn-danger" href="querydata.php?users_id=<?php echo $list['user_id']?>">
                                            <i class="fa fa-trash"></i> Delete</a></td>
                                        
                                        <?php } ?>
                                   
                              
                                    
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
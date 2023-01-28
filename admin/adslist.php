		<?php 
			@include_once('connector.php');
			@include_once('headeradmin.php');

			//$data= $conn->query("SELECT * FROM tbcategories");
			$sqlquery="SELECT*FROM tb_ads";
			$statement=$conn->prepare($sqlquery);
			$statement->execute();
			
		?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header"><i class="fa fa-th-list"></i> Ads List<a href="adsadd.php" title="Add ads"> <i class="fa fa-plus-square"></i></a></h3>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Ads list Detail
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Ads Photo</th>
                                        <th>location</th>
                                        <th>status</th>
                                        <th>date</th>
                                        <th>Description</th>
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
                                        <td> <img src="../images/<?php echo $list['ads_photo'];?>" width="106"  > </td>
                                        <td>
											<?php $loc_status= $list['location'];
											if($loc_status>0)
											{?>
                                            	<span class="btn btn-primary"><?php echo $loc_status; ?></span>
												
											<?php
                                            }else{?>
                                            	<span class="btn btn-danger">Disabled</span>
												
											<?php	}
											?>
                                        </td>
                                        <td>
											<?php $ads_status= $list['status'];
											if($ads_status==1)
											{?>
                                            	<button type="button" class="btn btn-info btn-circle "><i class="fa fa-check"></i></button>
												
											<?php
                                            }else{?>
                                            	 <button type="button" class="btn btn-warning btn-circle"><i class="fa fa-times"></i>
                                                </button>
												
											<?php	}
											?>
                                        </td>
                                        <td><?php echo $list['created_at']; ?></td>
                                        <td><?php echo $list['ads_des'] ?></td>
                                        <td><a class="btn btn-outline btn-info" href="adsEdit.php?adsid=<?php echo $list['ads_id']?>">
                                        <i class="fa fa-edit"></i> Edit</a>
                                        <a class="btn btn-outline btn-danger" href="querydata.php?adsid=<?php echo $list['ads_id']?>">
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
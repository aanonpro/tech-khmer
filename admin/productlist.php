		<?php 
			@include_once('db/connect.php');
			//echo "<br/>Test connection!";
			@include_once('headeradmin.php');
			$sql = "SELECT * FROM product_tb p LEFT JOIN stock_status_tb s ON p.stock_status = s.id";
				$result = $conn->query($sql);
		?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header"><i class="fa fa-th-list"></i> Product List &nbsp;<a href="product.php" title="Add Product"><i class="fa fa-plus-square"></i></a></h3>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Product list Detail
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>P Code</th>
                                        <th>P Name</th>
                                        <th>Status</th>
                                        <th>Created Date</th>
                                        <th>Photo</th>
                                        <th>Detail</th>
										<th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
								if ($result->num_rows > 0) {
									// output data of each row
									while($row = $result->fetch_assoc()) {
									?>
                                    <tr class="gradeA">
                                        <td><?php echo $row['pcode'];?></td>
                                        <td><?php echo $row['pname'];?></td>
                                        <td><?php if(!empty($row['stock_status']))
													{
														if($row['stock_status'] == 1){
															echo "<p class='btn btn-success'>".$row['name']."</p>";
														}else{
															echo "<p class='btn btn-warning'>".$row['name']."</p>";
														}
													}
											?></td>
                                        <td class="center"><?php echo date('d-M-Y', strtotime($row['date_added']));?></td>
                                        <td class="center">
											<?php @$img = $row['pimg'];
											if(!empty($img)){ $path = "products/";?>
												<img src="<?php echo $path.$img;?>" width="100"/>
											<?php }
											?>
                                        </td>
                                        <td class="center"><?php echo $row['description'];?></td>
										<td><a href="productEdit.php?pup=<?php echo $row['pid'];?>" class="btn btn-outline btn-info"><i class="fa fa-pencil-square-o"></i> Edit</a>
											<button type="button" class="btn btn-outline btn-danger"><i class="fa fa-trash-o"></i> Del</button>
										</td>
                                    </tr>    
                                    <?php
									}
								} else {
									echo "0 results";
								}
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
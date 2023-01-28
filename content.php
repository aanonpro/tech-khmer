<?php

require_once('header.php');


if(isset($_GET['page'])){
    $page=$_GET['page'];
}else{
    $page=1;
}
$limit=6;
$start=($page-1)*$limit;

$next= $page+1;
$previous= $page-1;


?>
<style>
    .pag{

            color: black;
            background: red;
        }
    .pagi{
        color: black;
    border: 0;
    font-size: 15px;
    text-align: center;
    
    padding: 0 10px;
    box-shadow: none;
    outline: 0;
    }
</style>
<main>
  
    <!-- About US Start -->
    <div class="about-area2 gray-bg pt-60 pb-60">
        <div class="container">
                <div class="row">
                <div class="col-lg-8">
                    <div class="whats-news-wrapper">
                        <!-- Heading & Nav Button -->
                            <div class="row justify-content-between align-items-end mb-15">
                                <div class="col-xl-4">
                                    <div class="section-tittle mb-30 ">
                                    <?php
                                    if(isset($_GET['contents'])){
                                        $get_title = $_GET['contents'];

                                    }
                                            $stmt = $conn->query("SELECT * FROM tb_menus WHERE status=1 AND id=$get_title ");
                                            while ($title = $stmt->fetch()){?>
                                        <h4 class="h_cat" style="font-weight: bold;"><?php echo $title['menu_name']; ?></h4>
                                    <?php
                                        }
                                    ?>
                                    </div>
                                </div>
                                <div class="col-xl-8 col-md-9">
                                    <div class="properties__button">
                                        
                                    </div>
                                </div>
                            </div>
                            <!-- Tab content -->
                            <div class="row">
                                <div class="col-12">
                                    <!-- Nav Card -->
                                    <div class="tab-content" id="nav-tabContent">
                                        <!-- card one -->
                                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">       
                                            <div class="row">

				<?php
                
                  
             if(isset($_GET['contents'])){
                $get_id = $_GET['contents'];
             
             }
            //  else if(isset($_GET['newsitems'])){
            //     $de_id=$_GET['newsitems'];
            //  }
              
            //  $active ="";
            //  if(isset($_GET['menu'])){
            //      $get_menu=$_GET['menu'];
            //  }
            
           
            
					$tcontents = $conn->query("SELECT * FROM tb_content c
                    LEFT JOIN tb_users u ON c.created_by = u.user_id  
                    WHERE c.status=1 AND c.id=$get_id order by c.created_at DESC LIMIT $start, $limit");
							while($trow=$tcontents -> fetch()){
                                ?>
												
								<div class="col-xl-6 col-lg-6 col-md-6">
									<div class="whats-news-single mb-40 mb-40">
										<div class="whates-img">
                                            <a  href="<?php echo 'newsdetail?contents='.$trow['id']; ?>&<?php echo 'newsitems='.$trow['cont_id'];'' ?>">
                                                <img src="<?php echo "images/".$trow['pic_cover'];?>" alt="" height="245">
                                            </a>
										</div>
										<div class="whates-caption whates-caption2">
											<h4><a style="line-height: 38px;" href="<?php echo 'newsdetail?contents='.$trow['id']; ?>&<?php echo 'newsitems='.$trow['cont_id'];'' ?>"><?php echo $trow['cont_title'];?></a></h4>
											<span><?php echo $trow['name'];?>  - post on . <?php echo $trow['created_at']; ?></span>
											<p class="font-weight-normal para"><?php echo $trow['short_detail'];?></p>
										</div>
									</div>
								</div>
												  
				<?php
					}
                    // $tcontents->closeCursor();
				?>
											
                                            </div>
                                        </div>
                                    </div>
                                <!-- End Nav Card -->
                                </div>
                            </div>
                    	</div>
                    </div>
                    <div class="col-lg-4">
<!-- New Poster -->
                    <div class="news-poster mb-4 d-none d-lg-block">
                    <?php
                                        // $get_title = $_GET['contents'];
                                            $stmt = $conn->query("SELECT * FROM tb_ads where location = 2 and status=1");
                                            while ($title = $stmt->fetch()){?>
                                            <img src="./images/<?php echo $title['ads_photo'];?>">
                                        
                                    <?php
                                        }
                                    ?>  
                            <!-- <img src="assets/img/news/news_card.jpg" alt=""> -->
                        </div>

                        <!-- Most Recent Area -->
                        

                        <!-- Flow Socail -->
                      
                        <!-- New Poster -->

                        <!-- <div class="news-poster mb-4 d-none d-lg-block">
                            <img src="assets/img/news/news_card.jpg" alt="">
                        </div> -->
                    </div>
                </div>
        </div>
    </div>
    <!-- About US End -->
    <!--Start pagination -->
    <div class="pagination-area  gray-bg pb-45">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="single-wrap">
                        <nav aria-label="Page navigation example ">
                            <ul class="pagination justify-content-center">
                            <li class="page-item"><a class="page-link" href="?contents=<?php echo $_GET['contents']; ?>&page=<?php echo $previous == 0 ? 1: $previous; ?>">
                                <!-- SVG icon -->
                                <svg  xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="15px">
                                    <path fill-rule="evenodd"  fill="rgb(255, 11, 11)" d="M8.142,13.118 L6.973,14.135 L0.127,7.646 L0.127,6.623 L6.973,0.132 L8.087,1.153 L2.683,6.413 L23.309,6.413 L23.309,7.856 L2.683,7.856 L8.142,13.118 Z"/>
                                    </svg>
                            </span></a></li>
                            <?php
                            
                              if(isset($_GET['contents'])){
                                $p_id=$_GET['contents'];
                                
                             }
                            //  else if(isset($_GET['newsitems'])){
                            //     $de_id=$_GET['newsitems'];
                            //  }
                              
                            $active ="";
                            
                                $query_count="SELECT *FROM tb_content where status=1";
                                $stmt_count=$conn->query($query_count);
                                $total_data=$stmt_count->rowCount();

                                $total_page= ceil($total_data / $limit);
                                

                                for($i=1; $i <= $total_page; $i++){

                                    if(isset($_GET['contents'])){
                                        if($i==$p_id){
                                              if(isset($_GET['page'])){
                                            //      if($i==$page){
                                            //          $active="select";
                                            //      }
                                              }  
                                            $active="pag";
                                        }else{
                                            $active="";
                                        }
                                    } 
                                     //end class active
                                    
                                    $current_page=$page;
                                    $previous_2=$current_page-2;
                                    $next_2=$current_page+2;

                                    if($i >= $previous_2 && $i <= $next_2){

                                    
                                   
                                    ?>
                                
                                    <li class="page-item "><a class="pagi <?php echo $i==$page ? 'pag':''; ?> "   href="?contents=<?php echo $_GET['contents']; ?>&page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                            <?php
                                    }//end if
                                   
                                }//end for
                            ?>
                              
                            <li class="page-item"><a class="page-link" href="?contents=<?php echo $_GET['contents']; ?>&page=<?php echo $next > $total_page ? $total_page : $next; ?>">
                                <!-- SVG iocn -->
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="40px" height="15px">
                                <path fill-rule="evenodd"  fill="rgb(255, 11, 11)" d="M31.112,13.118 L32.281,14.136 L39.127,7.646 L39.127,6.624 L32.281,0.132 L31.167,1.154 L36.571,6.413 L0.491,6.413 L0.491,7.857 L36.571,7.857 L31.112,13.118 Z"/>
                                </svg>
                            </span></a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End pagination  -->
</main>
<?php

    require_once('footer.php');
?>
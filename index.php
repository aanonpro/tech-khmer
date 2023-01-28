<?php
    require_once('header.php');

                                    
    // if(isset($_GET['newsitems'])){

    //     $get_content_id = $_GET['newsitems'];      
    // }      
  
                             
?>
<main>
    <!-- Trending Area Start -->
    <div class="trending-area fix pt-25 gray-bg">
        <div class="container">
            <div class="trending-main">
                <div class="row">
                    <div class="col-lg-8">
                        <!-- Trending Top -->
                        <div class="slider-active">
                            <!-- Single -->
                            <?php
                              if(isset($_GET['contents'])){
                                $get_id = $_GET['contents'];
                             
                             } 
                                            
                                $hcontents = $conn->query("SELECT * FROM tb_content c
                                LEFT JOIN tb_users u ON c.created_by=u.user_id
                                WHERE c.status=1 order by c.created_at DESC LIMIT 3");
                                while($hrow = $hcontents->fetch()){
                                ?>

                                    <div class="single-slider">
                                        <div class="trending-top mb-30">
                                            <div class="trend-top-img" >
                                            <!-- style=" height: 645px;" -->
                                                <a href="<?php echo 'newsdetail?contents='.$hrow['id']; ?>&<?php echo 'newsitems='.$hrow['cont_id'];'' ?>">
                                                    <img src="<?php echo "images/".$hrow['pic_cover'];?>" alt="" >
                                                </a>
                                                <div class="trend-top-cap ">
                                                    <!-- <span class="bgr" data-animation="fadeInUp" data-delay=".2s" data-duration="1000ms">Business</span> -->
                                                   
                                                    <h2 style="color: #fff;"><a class="pr-2 sl" style="line-height: 60px; width: 750px; " href="<?php echo 'newsdetail?contents='.$hrow['id']; ?>&<?php echo 'newsitems='.$hrow['cont_id'];'' ?>" data-animation="fadeInUp" data-delay=".4s" data-duration="1000ms"><?php echo $hrow['cont_title']; ?></a></h2>
                                                    <p class="dat" data-animation="fadeInUp" data-delay=".6s" data-duration="1000ms">  <?php echo $hrow['name']; ?> - <?php echo $hrow['created_at']; ?> </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            <?php
                                }
                            ?>
                            
                        </div>
                    </div>
                    <!-- Right content -->
                    <div class="col-lg-4">
                            <!-- Trending Top -->
                        <div class="row">

                        <?php
                            //  $datetime = date("Y-m-d H:i:s");date_create('now')->format('Y-m-d H:i:s'); 
                            //  $datebefor= date('Y-m-d H:i:s');
                            //  $date= ($datetime-$datebefor);
                            $hcontents = $conn->query("SELECT * FROM tb_content c
                            LEFT JOIN tb_users u ON c.created_by=u.user_id
                            WHERE c.status=1 order by c.created_at DESC LIMIT 2");
                            while($hrow = $hcontents->fetch()){
                            ?>
                                <div class="col-lg-12 col-md-6 col-sm-6">
                                    <div class="trending-top mb-30">
                                        <div class="trend-top-img" >
                                        <!-- style="width: 381px; height: 310px;" -->
                                            <a href="<?php echo 'newsdetail?contents='.$hrow['id']; ?>&<?php echo 'newsitems='.$hrow['cont_id'];'' ?>">
                                                <img src="<?php echo "images/".$hrow['pic_cover'];?>" alt="">
                                            </a>
                                            <div class="trend-top-cap trend-top-cap2">
                                                <!-- <span class="bgb">FASHION</span> -->
                                                <h2 style="color: #fff; "><a style="line-height: 36px; " href="<?php echo 'newsdetail?contents='.$hrow['id']; ?>&<?php echo 'newsitems='.$hrow['cont_id'];'' ?>"><?php echo $hrow['cont_title']; ?></a></h2>
                                                <p class="dat">  <?php echo $hrow['name']; ?> - <?php echo $hrow['created_at']; ?> </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php
                                }
                            ?>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Trending Area End -->
    <!-- Whats New Start -->
    <section class="whats-news-area pt-50 pb-20 gray-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                <div class="whats-news-wrapper">
                    <!-- Heading & Nav Button -->
                    <div class="row justify-content-between align-items-end mb-15">
                        <div class="col-xl-4">
                            <div class="section-tittle mb-30 ">
                                <h1>Whats New</h1>
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
                                        <!-- Left Details Caption -->
                                        <?php
                                            
                                            $hcontents = $conn->query("SELECT * FROM tb_content c
                                            LEFT JOIN tb_users u ON c.created_by=u.user_id
                                            WHERE c.status=1 order by c.created_at DESC LIMIT 1");
                                            while($hrow = $hcontents->fetch()){
                                            ?>
                                            <div class="col-xl-6 col-lg-12">
                                                <div class="whats-news-single mb-40 mb-40">
                                                    <div class="whates-img">
                                                        <a href="<?php echo 'newsdetail?contents='.$hrow['id']; ?>&<?php echo 'newsitems='.$hrow['cont_id'];'' ?>">
                                                            <img src="<?php echo "images/".$hrow['pic_cover'];?>" alt="">
                                                        </a>
                                                    </div>
                                                    <div class="whates-caption ">
                                                            <h4><a style="line-height: 38px;" href="<?php echo 'newsdetail?contents='.$hrow['id']; ?>&<?php echo 'newsitems='.$hrow['cont_id'];'' ?>"><?php echo $hrow['cont_title']; ?></a></h4>
                                                        <span class="dat"><?php echo $hrow['name']; ?>    -   <?php echo $hrow['created_at']; ?></span>
                                                        <p class="para"><?php echo $hrow['short_detail']; ?></p>
                                                    </div>
                                                </div>
                                            </div>

                                        <?php
                                            }
                                        ?>
                                        <!-- Right single caption -->
                                        <div class="col-xl-6 col-lg-12">
                                            <div class="row">
                                                <!-- single -->
                                            <?php
                                            
                                            $hcontents = $conn->query("SELECT * FROM tb_content c
                                            LEFT JOIN tb_users u ON c.created_by=u.user_id
                                            WHERE c.status=1 order by c.created_at DESC LIMIT 5");
                                            while($hrow = $hcontents->fetch()){
                                            ?>
                                                <div class="col-xl-12 col-lg-6 col-md-6 col-sm-10" >
                                                    <div class="whats-right-single mb-20"  >
                                                        <div class="whats-right-img" >
                                                            <a href="<?php echo 'newsdetail?contents='.$hrow['id']; ?>&<?php echo 'newsitems='.$hrow['cont_id'];'' ?>">
                                                                <img src="<?php echo "images/".$hrow['pic_cover'];?>" alt="" style="width: 124px; height: 104px;" >
                                                            </a>
                                                        </div>
                                                        <div class="whats-right-cap">
                                                         
                                                            <!-- <span class="colorb">fashion</span> -->
                                                       
                                                            <h4><a style="line-height: 24px;" href="<?php echo 'newsdetail?contents='.$hrow['id']; ?>&<?php echo 'newsitems='.$hrow['cont_id'];'' ?>"><?php echo $hrow['cont_title']; ?></a></h4>
                                                            <p class="dat"><?php echo $hrow['name']; ?> - <?php echo $hrow['created_at']; ?></p> 
                                                        </div>
                                                    </div>
                                                </div>

                                            <?php
                                                }
                                            ?>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Card two -->
                                
                                <!-- Card three -->
                                
                                <!-- card fure -->
                                
                                <!-- card Five -->
                                
                            </div>
                        <!-- End Nav Card -->
                        </div>
                    </div>
                </div>
                <!-- Banner -->
                <div class="banner-one mt-20 mb-30">
                <?php
                                        // $get_title = $_GET['contents'];
                                            $stmt = $conn->query("SELECT * FROM tb_ads where location = 1 and status=1");
                                            while ($title = $stmt->fetch()){?>
                                            <img src="./images/<?php echo $title['ads_photo'];?>">
                                        
                                    <?php
                                        }
                                    ?>  
                
                    <!-- <img src="assets/img/gallery/body_card1.png" alt=""> -->
                </div>
                </div>
                <div class="col-lg-4">
                    <!-- Flow Socail -->
                    
                    <!-- Most Recent Area -->
                    <div class="most-recent-area">
                        <!-- Section Tittle -->
                        <div class="small-tittle mb-20">
                            <h4 class="rec">Recent Post</h4>
                        </div>
                        <!-- Details -->
                        <?php
                                            
                            $hcontents = $conn->query("SELECT * FROM tb_content c
                            LEFT JOIN tb_users u ON c.created_by=u.user_id
                             WHERE c.status=1 order by c.created_at DESC LIMIT 1");
                            while($hrow = $hcontents->fetch()){
                            ?>
                                <div class="most-recent mb-40">
                                    <div class="most-recent-img">
                                    <a style="line-height: 33px;" href="<?php echo 'newsdetail?contents='.$hrow['id']; ?>&<?php echo 'newsitems='.$hrow['cont_id'];'' ?>"> 
                                            <img src="<?php echo "images/".$hrow['pic_cover'];?>" alt="">
                                        </a>
                                        <div class="most-recent-cap">
                                            <!-- <span class="bgbeg">Vogue</span> -->
                                            <h4><a style="line-height: 33px;" href="<?php echo 'newsdetail?contents='.$hrow['id']; ?>&<?php echo 'newsitems='.$hrow['cont_id'];'' ?>"><?php echo $hrow['cont_title']; ?> <br>
                                               </a></h4>
                                            <p class="dat"><?php echo $hrow['name']; ?>  -  <?php echo $hrow['created_at']; ?></p>
                                        </div>
                                    </div>
                                </div>
                        <?php
                            }
                        ?>
                        <!-- Single -->
                        <?php
                                            
                            $hcontents = $conn->query("SELECT * FROM tb_content c
                            LEFT JOIN tb_users u ON c.created_by=u.user_id
                            WHERE c.status=1 order by c.created_at DESC LIMIT 5");
                            while($hrow = $hcontents->fetch()){
                            ?>
                                <div class="most-recent-single">
                                    <div class="most-recent-images">
                                        <a href="<?php echo 'newsdetail?contents='.$hrow['id']; ?>&<?php echo 'newsitems='.$hrow['cont_id'];'' ?>">
                                            <img src="<?php echo "images/".$hrow['pic_cover'];?>" alt=""  style="width: 85px; height: 79px;">
                                        </a>
                                    </div>
                                    <div class="most-recent-capt">
                                        <h4><a style="line-height: 26px;" href="<?php echo 'newsdetail?contents='.$hrow['id']; ?>&<?php echo 'newsitems='.$hrow['cont_id'];'' ?>"><?php echo $hrow['cont_title']; ?></a></h4>
                                        <p class="dat"><?php echo $hrow['name']; ?>  -  <?php echo $hrow['created_at']; ?></p>
                                    </div>
                                </div>
                        <?php
                            }
                        ?>
                        <!-- Single -->
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Whats New End -->
    <!--   Weekly2-News start -->
              
    <!-- End Weekly-News -->
    <!--  Recent Articles start -->
               
    <!--Recent Articles End -->
    <!-- Start Video Area -->
    
    <!-- End Start Video area-->
    <!--   Weekly3-News start -->
    <!-- <div class="weekly3-news-area pt-80 pb-130">
        <div class="container">
            <div class="weekly3-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="slider-wrapper"> -->
                            <!-- Slider -->

                            <!-- <div class="row">
                                <div class="col-lg-12">
                                    <div class="weekly3-news-active dot-style d-flex">

                                        <?php
                                            
                                            $hcontents = $conn->query("SELECT * FROM tb_content WHERE status=1 order by created_at DESC LIMIT 6 ");
                                            while($hrow = $hcontents->fetch()){
                                            ?>
                                        
                                            <div class="weekly3-single">
                                                <div class="weekly3-img">
                                                    <img src="<?php echo "images/".$hrow['pic_cover'];?>" alt="" style="width: 263px; height: 210px;">
                                                </div>
                                                <div class="weekly3-caption">
                                                    <h4><a style="line-height: 28px;" href="<?php echo 'newsdetail?contents='.$hrow['id']; ?>&<?php echo 'newsitems='.$hrow['cont_id'];'' ?>"><?php echo $hrow['cont_title'];?></a></h4>
                                                    <p><?php echo $hrow['created_at'];?></p>
                                                </div>
                                            </div> 

                                        <?php
                                            }
                                        ?>
                                        
                                    </div>
                                </div>
                            </div> -->
                            <!-- end-slider -->
                        <!-- </div>
                    </div>
                </div>
            </div>
        </div>
    </div>            -->
    <!-- End Weekly-News -->
    <!-- banner-last Start -->

    <!-- <div class="banner-area gray-bg pt-90 pb-90">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10 col-md-10">
                    <div class="banner-one">
                        <img src="assets/img/gallery/body_card3.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    
    <!-- banner-last End -->
</main>
<?php
    require_once('footer.php');
?>
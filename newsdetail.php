<?php
    @require_once('header.php');
   
    
?>

<main>
    <!-- About US Start -->
    <div class="about-area2 gray-bg pt-60 pb-60">
        <div class="container " >
                <div class="row">
                    <div class="col-lg-8 bg-white" style="border-radius: 10px;">
                        <!-- Trending Tittle -->

                    <?php
                    
                    if(isset($_GET['newsitems'])){

                    $get_content_id = $_GET['newsitems'];
                
                    $detail = $conn->query("SELECT * FROM tb_content c
                    LEFT JOIN tb_users u ON c.created_by = u.user_id 
                    WHERE c.status=1 AND c.cont_id=$get_content_id");
                    while($drow = $detail->fetch())
                    {
                        
                ?>
            

                        <div class="about-right mb-90">
                        <div class="heading-news mb-30 pt-20 "  >
                                <h3 class="news-detail" style="line-height: 36px;" ><?php echo $drow['cont_title']; ?></h3>
                            </div>
                            <div class="about-prea">
                               <p class="about-pera1 mb-25 dat">
                                  <?php echo  $drow['created_at']; ?> | Article by- <?php echo $drow['name'] ?>
                                </p>
                            </div> 
                            <div class="about-img mx-auto d-block">
                                <img src="<?php echo 'images/'.$drow['thumb_slide']; ?>" alt="" >
                            </div>
                            
                            <div class="  about-prea ">
                               <p class="para about-pera1 mb-15 " >
                                  <?php echo  $drow['detail']; ?> 
                                </p>
                            </div> 
                            
                            
                            <div class="about-img mx-auto d-block">
                                <img src="<?php echo 'images/'.$drow['thumb_right']; ?>" alt="" >
                            </div>
                            <div class="social-share pt-30">
                                <div class="section-tittle">
                                    <!-- <h3 class="mr-20">Share:</h3> -->
                                    <ul>
                                        <!-- <li><a href="#"><img src="assets/img/news/icon-ins.png" alt=""></a></li> -->
                                        <li><a href="#"><img src="assets/img/news/icon-fb.png" alt=""></a></li>
                                        <li><a href="#"><img src="assets/img/news/icon-tw.png" alt=""></a></li>
                                        <li><a href="#"><img src="assets/img/news/icon-yo.png" alt=""></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
            <?php
               
                }//end while

             }//end if
        
        ?>
   <!-- From -->
                                                                                              
                    </div>
                    <div class="col-lg-4">
                        
                        <!-- Most Recent Area -->
                    
                        <!-- New Poster -->
                        <div class="news-poster d-none d-lg-block ">
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
                        

                    </div>
                    
                </div>
                
        </div>
        
    </div>
    <!-- About US End -->
</main>

<?php

    require_once('footer.php');

?>
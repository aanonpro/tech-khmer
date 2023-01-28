<footer>
    <!-- Footer Start-->
    <div class="footer-main footer-bg">
        <div class="footer-area footer-padding">
            <div class="container">
                <div class="row d-flex justify-content-between">
                    <div class="col-xl-3 col-lg-3 col-md-5 col-sm-8">
                        <div class="single-footer-caption mb-50">
                            <div class="single-footer-caption mb-30">
                                <!-- logo -->
                                <div class="footer-logo">
                                <?php
                                        // $get_title = $_GET['contents'];
                                            $stmt = $conn->query("SELECT * FROM tb_ads where location = 4 and status=1");
                                            while ($title = $stmt->fetch()){?>
                                            
                                            <a href="index.php"><img src="./images/<?php echo $title['ads_photo'];?>" alt=""></a>
                                    <?php
                                        }
                                    ?>  
                                    <!-- <a href="index.html"><img src="assets/img/logo/logo2_footer.png" alt=""></a> -->
                                </div>
                                <div class="footer-tittle">
                                    <div class="footer-pera">
                                        <p class="info1 dat">Lorem ipsum dolor sit amet, nsectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore.</p>
                                        <p class="info2 dat">St 314, Sengkat Beoung Salang, Khan Torl Kork, Phnom Penh</p>
                                        <p class="info2 dat">Phone: +855 (0) 92 414 786 Cell: +855 (0) 92 414 786</p>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-5 col-sm-7">
                        <div class="single-footer-caption mb-50">
                            <div class="footer-tittle">
                                <h4>Popular post</h4>
                            </div>

                            <?php
                                $n=0;
                                $footercontent = $conn->query("SELECT * FROM tb_content c
                                LEFT JOIN tb_users u ON c.created_by=u.user_id
                                WHERE c.status =1 and trash = 0 ORDER BY c.created_at DESC LIMIT 3");

                                while($frow = $footercontent->fetch()){$n++;
                                
                                    if($n<4){

                                ?>
                                <!-- Popular post -->
                                <div class="whats-right-single mb-20">
                                <div class="whats-right-img">
                                    <a  href="<?php echo 'newsdetail?contents='.$frow['id']; ?>&<?php echo 'newsitems='.$frow['cont_id'];'' ?>">
                                        <img src="<?php echo 'images/'.$frow['pic_cover']; ?>" alt=""  style="width: 86px; height: 80px;">
                                    </a>
                                </div>
                                <div class="whats-right-cap">
                                    <h4><a style="line-height: 28px;" href="<?php echo 'newsdetail?contents='.$frow['id']; ?>&<?php echo 'newsitems='.$frow['cont_id'];'' ?>"><?php  echo $frow['cont_title']; ?></a></h4>
                                    <p class="dat"><?php echo $frow['name']; ?>  -  <?php echo $frow['created_at']; ?> </p> 
                                </div>
                            </div>
                            <?php

                                    }//end if

                                }//end while
                            ?>


                        
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-5 col-sm-7">
                        <div class="single-footer-caption mb-50">
                            <div class="banner">
                            <?php
                                        // $get_title = $_GET['contents'];
                                            $stmt = $conn->query("SELECT * FROM tb_ads where location = 3 and status=1");
                                            while ($title = $stmt->fetch()){?>
                                            <img src="./images/<?php echo $title['ads_photo'];?>">
                                        
                                    <?php
                                        }
                                    ?>  
                                <!-- <img src="assets/img/gallery/body_card4.png" alt=""> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- footer-bottom aera -->
        <div class="footer-bottom-area footer-bg">
            <div class="container">
                <div class="footer-border">
                        <div class="row d-flex align-items-center">
                            <div class="col-xl-12 ">
                                <div class="footer-copy-right text-center">
                                    <p class="dat"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
  Copyright &copy; <script>document.write(new Date().getFullYear());</script> All rights reserved </a>
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End-->
</footer>
<!-- Search model Begin -->
<div class="search-model-box">
    <div class="d-flex align-items-center h-100 justify-content-center">
        <div class="search-close-btn">+</div>
        <form class="search-model-form">
            <input type="text" id="search-input" placeholder="Searching key.....">
        </form>
    </div>
</div>
<!-- Search model end -->
<!-- <script src="mo5enetk3w9i6r17ldkpxt33j40u1nsuw31ike3q1ff6o3bt"></script> -->
<!-- JS here -->
    <script src="./assets/js/vendor/modernizr-3.5.0.min.js"></script>
    <!-- Jquery, Popper, Bootstrap -->
    <script src="./assets/js/vendor/jquery-1.12.4.min.js"></script>
    <script src="./assets/js/popper.min.js"></script>
    <script src="./assets/js/bootstrap.min.js"></script>
    <!-- Jquery Mobile Menu -->
    <script src="./assets/js/jquery.slicknav.min.js"></script>

    <!-- Jquery Slick , Owl-Carousel Plugins -->
    <script src="./assets/js/owl.carousel.min.js"></script>
    <script src="./assets/js/slick.min.js"></script>
    <!-- Date Picker -->
    <script src="./assets/js/gijgo.min.js"></script>
    <!-- One Page, Animated-HeadLin -->
    <script src="./assets/js/wow.min.js"></script>
    <script src="./assets/js/animated.headline.js"></script>
    <script src="./assets/js/jquery.magnific-popup.js"></script>

    <!-- Scrollup, nice-select, sticky -->
    <script src="./assets/js/jquery.scrollUp.min.js"></script>
    <script src="./assets/js/jquery.nice-select.min.js"></script>
    <script src="./assets/js/jquery.sticky.js"></script>
    
    <!-- contact js -->
    <script src="./assets/js/contact.js"></script>
    <script src="./assets/js/jquery.form.js"></script>
    <script src="./assets/js/jquery.validate.min.js"></script>
    <script src="./assets/js/mail-script.js"></script>
    <script src="./assets/js/jquery.ajaxchimp.min.js"></script>
    
    <!-- Jquery Plugins, main Jquery -->	
    <script src="./assets/js/plugins.js"></script>
    <script src="./assets/js/main.js"></script>

    
</body>
</html>
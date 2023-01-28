<?php
require('admin/connector.php');

// echo"<pre>";
// print_r($_SERVER); 
// echo"</pre>";
$page = basename($_SERVER['PHP_SELF']);
switch ($page) {
    case "content.php":
        if (isset($_GET['contents'])) {
            $sql_title = $conn->query("SELECT * FROM tb_menus WHERE status=1 AND id={$_GET['contents']}");
            $title = $sql_title->fetch();
            $page_title = "| ". $title['menu_name'];
        } else {
            $page_title = "| No post found";
        }
        break;
    case "newsdetail.php":
        if (isset($_GET['newsitems'])) {
            $sql_title = $conn->query("SELECT * FROM tb_content WHERE status=1 AND cont_id={$_GET['newsitems']}");
            $title = $sql_title->fetch();
            $page_title = "| ".$title['cont_title'];
        } else {
            $page_title = "| No post found";
        }
        break;
    case "about.php":
        $page_title="| about";
        break;
    default:
        $page_title="";
        break;
}

?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title> <?php echo   " និស្ស័យ​ NEWS ".$page_title; ?></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="manifest" href="site.webmanifest">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon_head.ico">
    <!-- OG -->
   

    <?php
        if(isset($_GET['newsitems'])){

            $get_content_id = $_GET['newsitems'];
            
            $detail = $conn->query("SELECT * FROM tb_content WHERE status=1 AND cont_id=$get_content_id");
            while($drow = $detail->fetch())
            {
    ?>
    <meta property="og:title" content="<?php echo $drow['cont_title'] ?>" />
    <meta property="og:type" content="article" />
    <meta property="og:url" content="<?php echo $_SERVER['PHP_SELF']; ?>" />
    <meta property="og:image" content="<?php echo 'images/'.$drow['pic_cover']; ?>" />
    <meta property="og:image:width" content="1200" />
    <meta property="og:image:height" content="1200" />
    <meta property="og:idescription" content="<?php echo $drow['short_detail']; ?>" />
    <meta property="og:site_name" content="nisai-news" />
    <meta property="og:locale" content="Km-KH" />
    <?php 
        }
    }else{
        ?>
    <meta property="og:title" content="welcome to nisai-news first young developer to make new generation" />
    <meta property="og:type" content="article" />
    <meta property="og:url" content="<?php echo $_SERVER['PHP_SELF']; ?>" />
    <meta property="og:image" content="images/logo.png" />
    <meta property="og:idescription" content="welcome to nisai-news first young developer to make new generation" />
    <?php
    }
    
    ?>
    <!-- CSS here -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/ticker-style.css">
    <link rel="stylesheet" href="assets/css/flaticon.css">
    <link rel="stylesheet" href="assets/css/slicknav.css">
    <link rel="stylesheet" href="assets/css/animate.min.css">
    <link rel="stylesheet" href="assets/css/magnific-popup.css">
    <link rel="stylesheet" href="assets/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/slick.css">
    <link rel="stylesheet" href="assets/css/nice-select.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<!-- <link href="https://fonts.googleapis.com/css2?family=Battambang:wght@100;300;900&family=Roboto:wght@300&display=swap" rel="stylesheet"> -->

<link href="https://fonts.googleapis.com/css2?family=Battambang:wght@100;300&family=Koulen&display=swap" rel="stylesheet">
<!-- <link href="https://fonts.googleapis.com/css2?family=Battambang:wght@100;300&display=swap" rel="stylesheet"> -->
<!-- <link href="https://fonts.googleapis.com/css2?family=Battambang:wght@100;300&display=swap" rel="stylesheet"> -->
<!-- <link href="https://fonts.googleapis.com/css2?family=Kantumruy:wght@300;400&display=swap" rel="stylesheet"> -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Battambang:wght@300;400&display=swap" rel="stylesheet">

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">

<style>
        /* li,a{
            font-family: 'Battambang', cursive;
            font-weight: bold;
            font-size: 36px;
        } */
        h4, .rec{
            font-family: 'Roboto', sans-serif;
        }
        span, .dat{
            font-family: 'Roboto', sans-serif;
        }
        p, .dat{
            font-family: 'Roboto', sans-serif;
        }
        .top-men{
            font-family: 'Koulen', cursive;
        }
        .news-detail{
            font-family: 'Battambang', cursive;
            font-weight: bold;
        }
        .h_cat{
            font-family: 'Koulen', cursive;
        }
        h2, .sl{
            font-family: 'Battambang', cursive;
        }
        h4,h3{
            font-family: 'Battambang', cursive;
        }
        p, .para{
            font-family: 'Battambang', cursive;
        }
       
        .select{ 
            background-color: crimson;
            
            /* border-bottom: 2px solid white; */
        }
        
        
        body{
            /* font-family: 'Battambang', cursive;
            font-family: 'Roboto', sans-serif; */
            font-family: 'Battambang', Arial, Helvetica, sans-serif;
        }
    </style>
    
</head>

<body>
    <!-- Preloader Start -->
    <!-- <div id="preloader-active">
    <div class="preloader d-flex align-items-center justify-content-center">
        <div class="preloader-inner position-relative">
            <div class="preloader-circle"></div>
            <div class="preloader-img pere-text">
                <img src="assets/img/logo/logo.png" alt="">
            </div>
        </div>
    </div>
</div> -->
    <!-- Preloader Start -->
    <header>
        <!-- Header Start -->
        <div class="header-area">
            <div class="main-header ">

                <div class="header-mid gray-bg">
                    <div class="container">
                        <div class="row d-flex align-items-center">
                            <!-- Logo -->
                            <div class="col-xl-3 col-lg-3 col-md-3 d-none d-md-block">
                                <div class="logo">
                                <?php
                                        // $get_title = $_GET['contents'];
                                            $stmt = $conn->query("SELECT * FROM tb_ads where location = 4 and status=1");
                                            while ($title = $stmt->fetch()){?>
                                            
                                            <a href="<?php echo $hostname; ?>"><img src="./images/<?php echo $title['ads_photo'];?>" alt=""></a>
                                    <?php
                                        }
                                    ?>  
                                    
                                </div>
                            </div>
                            <div class="col-xl-9 col-lg-9 col-md-9">
                                <div class="header-banner f-right ">
                                <?php
                                        // $get_title = $_GET['contents'];
                                            $stmt = $conn->query("SELECT * FROM tb_ads where location = 1 and status=1");
                                            while ($title = $stmt->fetch()){?>
                                            <img src="./images/<?php echo $title['ads_photo'];?>">
                                        
                                    <?php
                                        }
                                    ?>  
                                         <!-- <img src="assets/img/gallery/header_card.png" alt=""> -->
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="header-bottom header-sticky">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-xl-10 col-lg-10 col-md-10 header-flex">
                                <!-- sticky -->
                                <div class="sticky-logo">
                                    <a href="<?php echo $hostname; ?>"><img src="assets/img/logo/logo.png" alt=""></a>
                                </div>
                                <!-- Main-menu -->
                                <?php
                                     if(isset($_GET['contents'])){
                                        $me_id=$_GET['contents'];
                                        
                                     }else if(isset($_GET['newsitems'])){
                                        $de_id=$_GET['newsitems'];
                                     }
                                      
                                    $active ="";
                                $stmts = $conn->query("SELECT * FROM tb_menus WHERE status=1 order by ordering ASC");
                               
                                ?>
                                <div class="main-menu d-none d-md-block">
                                    <nav>
                                        <ul id="navigation" class="top-men">
                                            <li><a  href="<?php echo $hostname; ?>">ទំព័រដើម</a></li>
                                            <?php
                                             
                                            while ($mrow = $stmts->fetch()) { 
                                                
                                            if(isset($_GET['contents'])){
                                                if($mrow['id']==$me_id){
                                                    if(isset($_GET['newsitems'])){
                                                        // if($mrow['id']==$de_id){
                                                        //     $active="select";
                                                        // }
                                                    }  
                                                    $active="select";
                                                }else{
                                                    $active="";
                                                }
                                            } 
                                             
                                                
                                            ?>

                                                <li><a style="font-size: 18px; " class=" <?php echo $active; ?>" href="<?php echo 'content.php?contents=' . $mrow['id']; ?>"><?php echo $mrow['menu_name']; ?></a></li>

                                            <?php
                                            }
                                            ?>
                                            <!-- <li><a  href="about.php">About Us</a></li> -->
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                            <div class="col-xl-2 col-lg-2 col-md-2">
                                <div class="header-right f-right d-none d-lg-block">
                                    <!-- Heder social -->
                                    <!-- <ul class="header-social">    
                                    <li><a href="https://www.fb.com/sai4ull"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                    <li> <a href="#"><i class="fab fa-youtube"></i></a></li>
                                </ul> -->
                                    <!-- Search Nav -->
                                    <!-- <div class="nav-search search-switch">
                                        <i class="fa fa-search"></i>
                                    </div> -->
                                </div>
                            </div>
                            <!-- Mobile Menu -->
                            <div class="col-12">
                                <div class="mobile_menu d-block d-md-none"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Header End -->
    </header>
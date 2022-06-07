<?php
    session_start();
    
    if (isset($_POST['username']) && isset($_POST['password']) )
    $_SESSION['username'] = $_POST['username'] ;

    if($_SESSION['user_level']!="Admin")
    {
        header("Location:./index.php");
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>通識屋</title>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!-- FontAwesome CSS -->
    <link rel="stylesheet" href="css/font-awesome.min.css">

    <!-- ElegantFonts CSS -->
    <link rel="stylesheet" href="css/elegant-fonts.css">

    <!-- themify-icons CSS -->
    <link rel="stylesheet" href="css/themify-icons.css">

    <!-- Swiper CSS -->
    <link rel="stylesheet" href="css/swiper.min.css">

    <!-- Styles -->
    <link rel="stylesheet" href="css/style2.css">
    <link rel="icon" href="./images/home.ico" type="image/x-icon" />
</head>
<body class="courses-page">
    <div class="page-header">
        <header class="site-header">
            

            <div class="nav-bar">
                <div class="container">
                    <div class="row">
                        <div class="col-9 col-lg-3">
                            <div class="site-branding">
                                <h1 class="site-title"><a href="./index.php" rel="home">通識屋</a></h1>
                            </div><!-- .site-branding -->
                        </div><!-- .col -->

                        <div class="col-3 col-lg-9 flex justify-content-end align-content-center">
                            <nav class="site-navigation flex justify-content-end align-items-center">
                                <ul class="flex flex-column flex-lg-row justify-content-lg-end align-content-center">
                                    <li class="current-menu-item"><a href="./admin.php">主頁　</a></li>
                                    <li><a href="./admin/page1.php">修改會員資料　</a></li>
                                    <li><a href="./admin/page2.php">商品管理　</a></li>
                                    <li><a href="./admin/page3.php">購物車管理　</a></li>
                                    <li><a href="./logout.php">登出　</a></li>
                                    
                                </ul>

                                <div class="hamburger-menu d-lg-none">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </div><!-- .hamburger-menu -->

                                <div class="header-bar-cart">
                                    <a href="" class="flex justify-content-center align-items-center"><span aria-hidden="true" class="　"></span></a>
                                </div><!-- .header-bar-search -->
                                

                            </nav><!-- .site-navigation -->
                        </div><!-- .col -->
                    </div><!-- .row -->
                </div><!-- .container -->
            </div><!-- .nav-bar -->
        </header><!-- .site-header -->

        <div class="page-header-overlay">
            <div class="container">
                <div class="row">
                    <div class=" col-lg-12">
                        <header class="entry-header">
                            <h1>admin管理系統</h1>
                        </header><!-- .entry-header -->
                    </div><!-- .col -->
                </div><!-- .row -->
            </div><!-- .container -->
        </div><!-- .page-header-overlay -->
    </div><!-- .page-header -->

    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumbs">
                    <ul class="flex flex-wrap align-items-center p-0 m-0">
                        <li><a href=""><?php echo $_SESSION['user_level']?></a></li>
                        <li><a href=""><i class="fa fa-id-card"></i>帳號:<?php echo $_SESSION['username']?></a></li>            
                    </ul>
                </div><!-- .breadcrumbs -->
            </div><!-- .col -->

            <div class="col-12">
                <div class="contact-form">
                    <h3>會員福利</h3>
                    <h5>銅會員</h5>
                    <ul>
                        <li>升等條件:註冊成為網站會員</li>
                        <li>享有福利:可查看購物商品詳細內容、將商品加入購物車、於網站內購物</li>
                    </ul>
                    <h5>銀會員</h5>
                    <ul>
                        <li>升等條件:在網站內消費滿1000元或是成為銅會員達一年</li>
                        <li>享有福利:銅會員福利、開放賣家系統(可上架商品)</li>
                    </ul>
                    <h5>金會員</h5>
                    <ul>
                        <li>升等條件:在網站內消費滿5000元或售出商品價格滿10000元</li>
                        <li>享有福利:銀會員福利、平台手續費折扣、享有商品正式上架前5分鐘優先購買權</li>
                    </ul>
                    <h5>鑽會員</h5>
                    <ul>
                        <li>升等條件:每月消費達3000元或是每月售出商品價格達5000元</li>
                        <li>享有福利:金會員福利、平台手續費減免、享有商品正式上架前25分鐘優先購買權</li>
                    </ul>
                </div><!-- .contact-form -->
            </div><!-- .col -->

        </div><!-- .row -->


    </div><!-- .container -->

   
    <script type='text/javascript' src='js/jquery.js'></script>
    <script type='text/javascript' src='js/swiper.min.js'></script>
    <script type='text/javascript' src='js/masonry.pkgd.min.js'></script>
    <script type='text/javascript' src='js/jquery.collapsible.min.js'></script>
    <script type='text/javascript' src='js/custom.js'></script>

</body>
</html>

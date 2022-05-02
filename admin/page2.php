<?php
    session_start();
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
    <link rel="stylesheet" href="../css/bootstrap.min.css">

    <!-- FontAwesome CSS -->
    <link rel="stylesheet" href="../css/font-awesome.min.css">

    <!-- ElegantFonts CSS -->
    <link rel="stylesheet" href="../css/elegant-fonts.css">

    <!-- themify-icons CSS -->
    <link rel="stylesheet" href="../css/themify-icons.css">

    <!-- Swiper CSS -->
    <link rel="stylesheet" href="../css/swiper.min.css">

    <!-- Styles -->
    <link rel="stylesheet" href="../css/style2.css">
    <link rel="icon" href="./../images/home.ico" type="image/x-icon" />


</head>
<body class="courses-page">
    <div class="page-header">
        <header class="site-header">
            

            <div class="nav-bar">
                <div class="container">
                    <div class="row">
                        <div class="col-9 col-lg-3">
                            <div class="site-branding">
                                <h1 class="site-title"><a href="../index.php" rel="home">通識屋</a></h1>
                            </div><!-- .site-branding -->
                        </div><!-- .col -->

                        <div class="col-3 col-lg-9 flex justify-content-end align-content-center">
                            <nav class="site-navigation flex justify-content-end align-items-center">
                                <ul class="flex flex-column flex-lg-row justify-content-lg-end align-content-center">
                                    <li><a href="../admin.php">主頁　</a></li>
                                    <li><a href="./page1.php">修改會員資料　</a></li>
                                    <li class="current-menu-item"><a href="./page2.php">商品管理　</a></li>
                                    <li><a href="./../logout.php">登出　</a></li>
                                </ul>

                                <div class="hamburger-menu d-lg-none">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </div><!-- .hamburger-menu -->

                                <div class="header-bar-cart">                                    
                                    <a href="#" class="flex justify-content-center align-items-center"><span aria-hidden="true" class="　"></span></a>                                    
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
                <div class="course-content">
                    <div class="course-content-wrap">
                        <footer class="entry-footer flex flex-wrap justify-content-between align-items-center">
                            <header class="entry-header">
                                <h2 class="entry-title"><button class="astext" id="btn_show1" >憶起來學著「懂」攝影吧</button></h2>
                                <div class="entry-meta flex flex-wrap align-items-center">
                                    <div class="course-author">邱旭蓮、何俊霖 </div>
                                    <div class="course-date">111/04/10</div>
                                </div><!-- .course-date -->
                            </header><!-- .entry-header -->
                            <div class="course-cost">
                                $10000　<a class="fa fa-pencil-square-o" href="#"></a>
                            </div><!-- .course-cost -->
                           
                        </footer><!-- .entry-footer -->
                        <footer id="inner1"  style="display:none">
                            <div>
                            <h3>詳情</h3> <br>
                            <ul>
                                <li>時間：下午4:10-6:00 </li>
                                <li>本活動不提供現場報名。謝謝</li>
                                <li>國文系及台文所學生參與本科系專業之活動無法計入通識護照 </li>
                                <li>本次活動可登錄通識護照1場次，須確實簽到及簽退方予認證 </li>
                                <li>自108學年度起施行「通識護照提醒名單」機制：無故缺席已報名之通識護照活動「累計3次」者，將列入提醒名單，暫停當學期及次學期於線上報名系統管理系統報名之權限(僅能於活動當日至現場遞補) </li>
                            </ul>
                            </div>
                        </footer>
                    </div><!-- .course-content-wrap -->
                   
                </div><!-- .course-content -->
            </div><!-- .col -->

            

        </div><!-- .row -->


    </div><!-- .container -->

   
    <script type='text/javascript' src='../js/jquery.js'></script>
    <script type='text/javascript' src='../js/swiper.min.js'></script>
    <script type='text/javascript' src='../js/masonry.pkgd.min.js'></script>
    <script type='text/javascript' src='../js/jquery.collapsible.min.js'></script>
    <script type='text/javascript' src='../js/custom.js'></script>

</body>
</html>
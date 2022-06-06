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
            <div class="col-md-6">
                <div class="breadcrumbs">
                    <ul class="flex flex-wrap align-items-center p-0 m-0">
                        <li><a href="">Level:<?php echo $_SESSION['user_level']?></a></li>
                        <li><a href=""><i class="fa fa-id-card"></i>帳號:<?php echo $_SESSION['username']?></a></li>
                        
                    </ul>          
                </div><!-- .breadcrumbs -->
            </div><!-- .col -->
            <div class="col-md-6">
                <div class="breadcrumbs">
                    <div style = "text-align:right;">
                        <button type = submit id = "btn_show" class="astext">排序</button>
                    </div><!-- .course-cost -->
                    </footer><!-- .entry-footer -->
                    <footer id="inner" style="display:none">
                        <div>
                            <form name = "f1" method = "POST" action = "">
                                <p style = "text-align:right;">
                                    <input type = "hidden" id = "filter" name = "filter">
                                    <button id = "price_ASC" type = "submit" class="astext">價錢由低到高　</button>
                                    <button id = "date_ASC" type = "submit" class="astext">日期由舊到新</button>
                                    <br>
                                    <button id = "price_DESC" type = "submit" class="astext">價錢由高到低　</button>
                                    <button id = "date_DESC" type = "submit" class="astext">日期由新到舊</button>
                                </p>
                            </form>
                        </div>
                    </footer>
                </div><!-- .breadcrumbs -->
            </div><!-- .col -->
        </div><!-- .row -->

        <div class="row">
            <div class="col-md-12">
                <div class="featured-courses courses-wrap">
                    <div class="row mx-m-25">
                        <?php
                            if($result = mysqli_query($link, "SELECT * FROM goods ORDER BY ".$filter))
                            {
                                for($i = 0; $row = mysqli_fetch_assoc($result); $i++)
                                {
                                    if($i >= $page * 10 - 10 && $i < $page * 10)
                                    {
                                        echo '<div class="col-md-12">
                                            <div class="course-content">
                                                <div class="course-content-wrap">
                                                    <footer class="entry-footer flex flex-wrap justify-content-between align-items-center">
                                                    <header class="entry-header">
                                                            <h2 class="entry-title"><button class="astext" id="btn_show'.($i % 10).'" >'.$row['theme'].'</button></h2>
                                                            <div class="entry-meta flex flex-wrap align-items-center">
                                                                <div class="course-author">'.$row['lecturer'].'</div>
                                                                <div class="course-date">'.$row['date'].'</div>
                                                            </div><!-- .course-date -->
                                                        </header><!-- .entry-header -->
                                                        <div class="course-cost">
                                                            $'.$row['price'].' <a id="addcart" class="fa fa-cart-plus" href="./buyer/addgoods.php?good_no='.$row['no'].'"></a>
                                                        </div><!-- .course-cost -->
                                                    
                                                    </footer><!-- .entry-footer -->
                                                    <footer id="inner'.($i % 10).'"  style="display:none">
                                                        <div>
                                                        <h3>詳情</h3> <br>
                                                        <ul>
                                                            <li>'.$row['detail_one'].'</li>
                                                            <li>'.$row['detail_two'].'</li>
                                                            <li>'.$row['detail_three'].'</li>
                                                            <li>'.$row['detail_four'].'</li>';
                                                        if($row['detail_five'] != NULL)
                                                            echo '<li>'.$row['detail_five'].'</li>';
                                                        echo '</ul>
                                                        </div>
                                                    </footer>
                                                </div><!-- .course-content-wrap -->
                                            </div><!-- .course-content -->
                                        </div><!-- .col -->';
                                    }
                                }
                            }
                        ?>
                    </div><!-- .row -->
                </div><!-- .featured-courses -->
            </div>
        </div>            
    </div>
   
    <script type='text/javascript' src='../js/jquery.js'></script>
    <script type='text/javascript' src='../js/swiper.min.js'></script>
    <script type='text/javascript' src='../js/masonry.pkgd.min.js'></script>
    <script type='text/javascript' src='../js/jquery.collapsible.min.js'></script>
    <script type='text/javascript' src='../js/custom.js'></script>

</body>
</html>
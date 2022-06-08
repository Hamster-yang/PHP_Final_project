<?php
    session_start();

    if (isset($_POST['username']) && isset($_POST['password']) )
        $_SESSION['username'] = $_POST['username'] ;
    else if(!isset($_SESSION['username']))
        $_SESSION['username'] = "";
    
    if (isset($_POST['user_level']) )
        $_SESSION['user_level'] = $_POST['user_level'] ;
    else if(!isset($_SESSION['user_level']))
        $_SESSION['user_level'] = "未登入" ;

    $link = mysqli_connect('localhost','root','root123456','group_27') or die("無法開啟MySQL資料庫連結!<br>");

    if(isset($_GET['page']))
        $page = $_GET['page'];
    else
        $page = 1;

    if(isset($_POST['filter']))
    {
        if($_POST['filter'] == "price_ASC")
            $filter = "price ASC";
        else if($_POST['filter'] == "date_ASC")
            $filter = "date ASC";
        else if($_POST['filter'] == "price_DESC")
            $filter = "price DESC";
        else
            $filter = "date DESC";
    }
    else if(isset($_GET['filter']))
        $filter = $_GET['filter'];
    else
        $filter = "date ASC";

    if(isset($_GET['good_no']))
        $good_no = $_GET['good_no'];
    else
        $good_no = -1;

    if(!isset($_SESSION['search']))
        $_SESSION['search'] = "";
    if(isset($_POST['search']))
        $_SESSION['search'] = $_POST['search'];
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
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="./images/home.ico" type="image/x-icon" />
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <!-- 不知道是搞啥的 會影響頂端排版
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
    -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <script>
        $(function () {
                $("#btn_show").on("click",function(){
                    $("#inner").toggle();
                })
                $("#btn_show0").on("click",function(){
                    $("#inner0").toggle();
                })
                $("#btn_show1").on("click",function(){
                    $("#inner1").toggle();
                })
                $("#btn_show2").on("click",function(){
                    $("#inner2").toggle();
                })
                $("#btn_show3").on("click",function(){
                    $("#inner3").toggle();
                })
                $("#btn_show4").on("click",function(){
                    $("#inner4").toggle();
                })
                $("#btn_show5").on("click",function(){
                    $("#inner5").toggle();
                })
                $("#btn_show6").on("click",function(){
                    $("#inner6").toggle();
                })
                $("#btn_show7").on("click",function(){
                    $("#inner7").toggle();
                })
                $("#btn_show8").on("click",function(){
                    $("#inner8").toggle();
                })
                $("#btn_show9").on("click",function(){
                    $("#inner9").toggle();
                })

                $("#price_ASC").on("click",function(){
                    $("#filter").prop("value", "price_ASC");
                })
                $("#date_ASC").on("click",function(){
                    $("#filter").prop("value", "date_ASC");
                })
                $("#price_DESC").on("click",function(){
                    $("#filter").prop("value", "price_DESC");
                })
                $("#date_DESC").on("click",function(){
                    $("#filter").prop("value", "date_DESC");
                })
        });
    </script>
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
                                    <li class="current-menu-item"><a href="./buyer.php">主頁　</a></li>
                                    <li ><a href="./buyer/shopcart.php">購物車　</a></li>
                                    <li ><a href="./buyer/order.php">訂單　</a></li>
                                    <li ><a href="./buyer/system.php">會員中心　</a></li>

                                    <?php
                                        if ($_SESSION['username']!="")
                                        {
                                    ?>
                                        <li><a href="./logout.php">登出　</a></li>
                                    <?php
                                        }
                                        else
                                        {
                                    ?>
                                        <li><a href="./login/SignIn/buyer.php">登入/註冊　</a></li>                                    
                                    <?php
                                        }
                                    ?>
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
                            <h1>現正熱賣</h1>
                               
                            </div>
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
                        <div class = "header-bar-search">
                            <form name = "f2" method = "POST" action = "" class="align-items-stretch">
                                <p style = "text-align:right;">
                                    <input type="search" placeholder="" id = "search" name = "search" style="width:280px;height:40px;">
                                    <?php
                                        if($_SESSION['search'] == '')
                                            echo '<button type="submit" value="" style="width:40px;height:40px;"><i class="fa fa-search"></i></button>';
                                        else
                                            echo '<button type="submit" value="" style="width:40px;height:40px;"><i class="fa fa-remove"></i></button>';
                                    ?>
                                </p>
                            </form>
                        </div>
                        <button type = "submit" id = "btn_show" class="astext">排序</button>
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
                            if($result = mysqli_query($link, "SELECT * FROM goods WHERE theme LIKE '%".$_SESSION['search']."%' ORDER BY ".$filter))
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
                                                            $'.$row['price'].' <a class="fa fa-cart-plus" href="./buyer/addgoods.php?good_no='.$row['no'].'"></a>
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
                

                <div class="pagination flex flex-wrap justify-content-between align-items-center">
                    <div class="col-12 col-lg-4 order-2 order-lg-1 mt-3 mt-lg-0">
                        <ul class="flex flex-wrap align-items-center order-2 order-lg-1 p-0 m-0">
                            <?php
                                for($i = 1; $i <= mysqli_num_rows($result) / 10 + 1; $i++)
                                {
                                    if($i == $page)
                                    {
                                        echo '<li class="active"><a href="buyer.php?page='.$i.'&filter='.$filter.'">'.$i.'</a></li>';
                                    }
                                    else
                                    {
                                        echo '<li class="fa"><a href="buyer.php?page='.$i.'&filter='.$filter.'">'.$i.'</a></li>';
                                    }
                                }
                                if($page < mysqli_num_rows($result) / 10)
                                {
                                    echo '<li><a href="buyer.php?page='.($page+1).'&filter='.$filter.'"><i class="fa fa-angle-right"></i></a></li>';
                                }
                            ?>
                        </ul>
                    </div>
                </div><!-- .pagination -->
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
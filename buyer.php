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
                $("#btn_show10").on("click",function(){
                    $("#inner10").toggle();
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
                                <!--
                                    <nav class="site-navigation flex justify-content-end align-items-end"></nav>
                                        <dl class="flex flex-column flex-lg-row justify-content-lg-end align-content-center">
                                            <dd><a href="#">分類　</a></dd>
                                            <dd><a href="#">分類　</a></dd>
                                            <dd><a href="#">分類　</a></dd>
                                            <dd><a href="#">分類　</a></dd>
                                            <dd><a href="#">分類　</a></dd>
                                            <dd><a href="#">分類　</a></dd>
                                        </dl>
                                    </nav> 
                                -->
                            </div>
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
                        <li><a href="">Level:<?php echo $_SESSION['user_level']?></a></li>
                        <li><a href=""><i class="fa fa-id-card"></i>帳號:<?php echo $_SESSION['username']?></a></li>
                    </ul>
                </div><!-- .breadcrumbs -->
            </div><!-- .col -->
        </div><!-- .row -->

       

        <div class="row">
            <div class="col-md-12">
                <div class="featured-courses courses-wrap">
                    <div class="row mx-m-25">
                        <div class="col-md-12">
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
                                            $10000　<a class="fa fa-cart-plus" href="#"></a>
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
                        <div class="col-md-12">
                            <div class="course-content">
                                <div class="course-content-wrap">
                                    <footer class="entry-footer flex flex-wrap justify-content-between align-items-center">
                                        <header class="entry-header">
                                            <h2 class="entry-title"><button class="astext" id="btn_show2" >哲學星期五-原住民狩獵文化</button></h2>
    
                                            <div class="entry-meta flex flex-wrap align-items-center">
                                                <div class="course-author"> 江人頡 </div>
                                                <div class="course-date"> 111/04/13</div>
                                            </div><!-- .course-date -->
                                        </header><!-- .entry-header -->
                                        <div class="course-cost">
                                            $免費的啦　<a class="fa fa-cart-plus" href="#"></a>
                                        </div><!-- .course-cost -->
                                    </footer><!-- .entry-footer -->
                                    <footer id="inner2"   style="display:none">
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
                        <div class="col-md-12">
                            <div class="course-content">
                                <div class="course-content-wrap">
                                    <footer class="entry-footer flex flex-wrap justify-content-between align-items-center">
                                        <header class="entry-header">
                                            <h2 class="entry-title"><button class="astext"  id="btn_show3">媒體教我的智慧</button></h2>
    
                                            <div class="entry-meta flex flex-wrap align-items-center">
                                                <div class="course-author"> 線上通識講座 </div>
    
                                                <div class="course-date"> 111/04/11～111/04/15</div>
                                            </div><!-- .course-date -->
                                        </header><!-- .entry-header -->
                                        <div class="course-cost">
                                            $2　<a class="fa fa-cart-plus" href="#"></a>
                                        </div><!-- .course-cost -->
                                    </footer><!-- .entry-footer -->
                                    <footer id="inner3"   style="display:none">
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
                        <div class="col-md-12">
                            <div class="course-content">
                                <div class="course-content-wrap">
                                    <footer class="entry-footer flex flex-wrap justify-content-between align-items-center">
                                        <header class="entry-header">
                                            <h2 class="entry-title"><button class="astext"  id="btn_show4">心智圖高效學習法</button></h2>
    
                                            <div class="entry-meta flex flex-wrap align-items-center">
                                                <div class="course-author">王聖凱 </div>
    
                                                <div class="course-date"> 111/04/28</div>
                                            </div><!-- .course-date -->
                                        </header><!-- .entry-header -->
                                        <div class="course-cost">
                                            $50　<a class="fa fa-cart-plus" href="#"></a>
                                        </div><!-- .course-cost -->
                                    </footer><!-- .entry-footer -->
                                    <footer id="inner4"   style="display:none">
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
                        <div class="col-md-12">
                            <div class="course-content">
                                <div class="course-content-wrap">
                                    <footer class="entry-footer flex flex-wrap justify-content-between align-items-center">
                                        <header class="entry-header">
                                            <h2 class="entry-title"><button class="astext"  id="btn_show5">不可不知的租屋大小事</button></h2>
    
                                            <div class="entry-meta flex flex-wrap align-items-center">
                                                <div class="course-author">簡珣 </div>
    
                                                <div class="course-date">111/05/12</div>
                                            </div><!-- .course-date -->
                                        </header><!-- .entry-header -->
                                        <div class="course-cost">
                                            $500　<a class="fa fa-cart-plus" href="#"></a>
                                        </div><!-- .course-cost -->
                                    </footer><!-- .entry-footer -->
                                    <footer id="inner5"   style="display:none">
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
                        <div class="col-md-12">
                            <div class="course-content">
                                <div class="course-content-wrap">
                                    <footer class="entry-footer flex flex-wrap justify-content-between align-items-center">
                                        <header class="entry-header">
                                            <h2 class="entry-title"><button class="astext"  id="btn_show6">程式人生與退休人生</button></h2>
    
                                            <div class="entry-meta flex flex-wrap align-items-center">
                                                <div class="course-author"> 陳明熒 </div>
    
                                                <div class="course-date">111/04/28</div>
                                            </div><!-- .course-date -->
                                        </header><!-- .entry-header -->
                                        <div class="course-cost">
                                            $60　<a class="fa fa-cart-plus" href="#"></a>
                                        </div><!-- .course-cost -->
                                    </footer><!-- .entry-footer -->
                                    <footer id="inner6"   style="display:none">
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
                        
                        <div class="col-md-12">
                            <div class="course-content">
                                <div class="course-content-wrap">
                                    <footer class="entry-footer flex flex-wrap justify-content-between align-items-center">
                                        <header class="entry-header">
                                            <h2 class="entry-title"><button class="astext"  id="btn_show7">體會真實，付諸實踐</button></h2>
    
                                            <div class="entry-meta flex flex-wrap align-items-center">
                                                <div class="course-author"> 郭彥甫 </div>
    
                                                <div class="course-date"> 111/04/20</div>
                                            </div><!-- .course-date -->
                                        </header><!-- .entry-header -->
                                        <div class="course-cost">
                                            $1000　<a class="fa fa-cart-plus" href="#"></a>
                                        </div><!-- .course-cost -->
                                    </footer><!-- .entry-footer -->
                                    <footer id="inner7"   style="display:none">
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
                        <div class="col-md-12">
                            <div class="course-content">
                                <div class="course-content-wrap">
                                    <footer class="entry-footer flex flex-wrap justify-content-between align-items-center">
                                        <header class="entry-header">
                                            <h2 class="entry-title"><button class="astext"  id="btn_show8">跨越古今文學，提升閱讀與寫作力的故事課</button></h2>
    
                                            <div class="entry-meta flex flex-wrap align-items-center">
                                                <div class="course-author">  高詩佳 </div>
    
                                                <div class="course-date"> 111/04/27</div>
                                            </div><!-- .course-date -->
                                        </header><!-- .entry-header -->
                                        <div class="course-cost">
                                            $90　<a class="fa fa-cart-plus" href="#"></a>
                                        </div><!-- .course-cost -->
                                    </footer><!-- .entry-footer -->
                                    <footer id="inner8"   style="display:none">
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
                        <div class="col-md-12">
                            <div class="course-content">
                                <div class="course-content-wrap">
                                    <footer class="entry-footer flex flex-wrap justify-content-between align-items-center">
                                        <header class="entry-header">
                                            <h2 class="entry-title"><button class="astext" id="btn_show9">不可以色色</button></h2>
    
                                            <div class="entry-meta flex flex-wrap align-items-center">
                                                <div class="course-author">  邱雅沂 </div>
    
                                                <div class="course-date"> 111/05/04</div>
                                            </div><!-- .course-date -->
                                        </header><!-- .entry-header -->
                                        <div class="course-cost">
                                            $500　<a class="fa fa-cart-plus" href="#"></a>
                                        </div><!-- .course-cost -->
                                    </footer><!-- .entry-footer -->
                                    <footer id="inner9"   style="display:none">
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
                        <div class="col-md-12">
                            <div class="course-content">
                                <div class="course-content-wrap">
                                    <footer class="entry-footer flex flex-wrap justify-content-between align-items-center">
                                        <header class="entry-header">
                                            <h2 class="entry-title"><button class="astext" id="btn_show10">神鳥保衛戰</button></h2>
    
                                            <div class="entry-meta flex flex-wrap align-items-center">
                                                <div class="course-author">  蔣功國 </div>
    
                                                <div class="course-date"> 111/04/11</div>
                                            </div><!-- .course-date -->
                                        </header><!-- .entry-header -->
                                        <div class="course-cost">
                                            $600　<a class="fa fa-cart-plus" href="#"></a>
                                        </div><!-- .course-cost -->
                                    </footer><!-- .entry-footer -->
                                    <footer id="inner10"   style="display:none">
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
                </div><!-- .featured-courses -->
                

                <div class="pagination flex flex-wrap justify-content-between align-items-center">
                    <div class="col-12 col-lg-4 order-2 order-lg-1 mt-3 mt-lg-0">
                        <ul class="flex flex-wrap align-items-center order-2 order-lg-1 p-0 m-0">
                            <li class="active"><a href="#">1</a></li>
                            <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
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
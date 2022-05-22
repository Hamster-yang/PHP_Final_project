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

    mysqli_query($link, 'SET CHARACTER SET utf8');
    mysqli_query($link, "SET collation_connection = 'utf8_unicode_ci'");

    if (isset($_POST['theme'])) {
        $result = mysqli_query($link, "SELECT * FROM goods");
        if($_POST['detail'] != "")
        {
            $str = explode("\r\n", $_POST['detail']);
            $cnt = count($str);
        }
        else
        {
            $cnt = 0;
        }
        switch($cnt)
        {
            case 0:
                $sql = "insert into goods values ('" . (mysqli_num_rows($result)) . "','" . $_SESSION['username'] . "','" . $_POST['theme'] . "','" . $_POST['lecturer'] . "','" . $_POST['date'] . "','" . $_POST['price'] . "', NULL, NULL, NULL, NULL, NULL)";
                break;
            case 1:
                $sql = "insert into goods values ('" . (mysqli_num_rows($result)) . "','" . $_SESSION['username'] . "','" . $_POST['theme'] . "','" . $_POST['lecturer'] . "','" . $_POST['date'] . "','" . $_POST['price'] . "','" . $str[0] . "', NULL, NULL, NULL, NULL)";
                break;
            case 2:
                $sql = "insert into goods values ('" . (mysqli_num_rows($result)) . "','" . $_SESSION['username'] . "','" . $_POST['theme'] . "','" . $_POST['lecturer'] . "','" . $_POST['date'] . "','" . $_POST['price'] . "','" . $str[0] . "','" . $str[1] . "', NULL, NULL, NULL)";
                break;
            case 3:
                $sql = "insert into goods values ('" . (mysqli_num_rows($result)) . "','" . $_SESSION['username'] . "','" . $_POST['theme'] . "','" . $_POST['lecturer'] . "','" . $_POST['date'] . "','" . $_POST['price'] . "','" . $str[0] . "','" . $str[1] . "','" . $str[2] . "', NULL, NULL)";
                break;
            case 4:
                $sql = "insert into goods values ('" . (mysqli_num_rows($result)) . "','" . $_SESSION['username'] . "','" . $_POST['theme'] . "','" . $_POST['lecturer'] . "','" . $_POST['date'] . "','" . $_POST['price'] . "','" . $str[0] . "','" . $str[1] . "','" . $str[2] . "','" . $str[3] . "', NULL)";
                break;
            case 5:
                $sql = "insert into goods values ('" . (mysqli_num_rows($result)) . "','" . $_SESSION['username'] . "','" . $_POST['theme'] . "','" . $_POST['lecturer'] . "','" . $_POST['date'] . "','" . $_POST['price'] . "','" . $str[0] . "','" . $str[1] . "','" . $str[2] . "','" . $str[3] . "','" . $str[4] . "')";
                break;
        }
        
        if ($result = mysqli_query($link, $sql)) // 送出查詢的SQL指令
        {
            $msg = "<span style='color:#0000FF'>資料新增成功!</span>";
        } else {
            $msg = "<span style='color:#FF0000'>資料新增失敗！<br>錯誤代碼：" . mysqli_errno($link) . "<br>錯誤訊息：" . mysqli_error($link) . "</span>";
        }
    
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
    <link rel="stylesheet" href="../css/style.css">
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
                                    <li ><a href="./../seller.php">上架商品清單　</a></li>
                                    <li class="current-menu-item"><a href="./add.php">新增上架商品　</a></li>
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
                    <div class="col-12">
                        <header class="entry-header">
                            <h1>賣家系統</h1>
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
        
        <form name = "f1" method = "POST" action = "">
            <div class="contact-form">
                <div class="row mx-m-25">
                    <div class="col-md-12" style="font-weight: bold;">
                        通識名稱
                        <input name = "theme" type="text" placeholder="Ex.阿美族部落參訪(限原住民學生參加)" style="margin-top: 0px;">
                    </div>
                    <div class="col-md-12" style="margin-top: 20px;font-weight: bold;">
                        講師
                        <input name = "lecturer" type="text" placeholder="Ex.都蘭部落講師/基拉歌賽部落講師" style="margin-top: 0px;">
                    </div>
                    <div class="col-md-6" style="margin-top: 20px;font-weight: bold;">
                        上架時間
                        <input name = "date" type="text" placeholder="月 日, 年" style="margin-top: 0px;">
                    </div>
                    <div class="col-md-6" style="margin-top: 20px;font-weight: bold;">
                        費用
                        <input name = "price" type="text" placeholder="$100" style="margin-top: 0px;">
                    </div>
                    <div class="col-md-12" style="margin-top: 20px;font-weight: bold;">
                        詳情
                        <textarea name = "detail" rows="4" placeholder="..." style="margin-top: 0px;"></textarea>
                    </div>
                </div>
                <button type="submit" class="btn btn-success" style="margin-top: 30px;">
                    <i class="fa fa-plus"></i> 新增
                </button>
            </div><!-- .contact-form -->
        </form>
    </div><!-- .container -->

    <div class="clients-logo">
        <div class="container">
            <div class="row">
                <div class="col-12 flex flex-wrap justify-content-center justify-content-lg-between align-items-center">
                    <div class="logo-wrap">
                    </div><!-- .logo-wrap -->

                    <div class="logo-wrap">
                    </div><!-- .logo-wrap -->

                    <div class="logo-wrap">
                    </div><!-- .logo-wrap -->

                    <div class="logo-wrap">
                    </div><!-- .logo-wrap -->

                    <div class="logo-wrap">
                    </div><!-- .logo-wrap -->
                </div><!-- .col -->
            </div><!-- .row -->
        </div><!-- .container -->
    </div><!-- .clients-logo -->
    <script type='text/javascript' src='../js/jquery.js'></script>
    <script type='text/javascript' src='../js/swiper.min.js'></script>
    <script type='text/javascript' src='../js/masonry.pkgd.min.js'></script>
    <script type='text/javascript' src='../js/jquery.collapsible.min.js'></script>
    <script type='text/javascript' src='../js/custom.js'></script>

</body>
</html>
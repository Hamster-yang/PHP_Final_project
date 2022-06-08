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

    if($_SESSION['username']=="")
    {
        echo "<script> {window.alert('請先登入');history.go(-1)} </script>";//返回上頁
    }

    $link = mysqli_connect('localhost','root','root123456','group_27') or die("無法開啟MySQL資料庫連結!<br>");

    mysqli_query($link, 'SET CHARACTER SET utf8');
    mysqli_query($link, "SET collation_connection = 'utf8_unicode_ci'");

    if(isset($_SESSION['new']))
        mysqli_query($link, "UPDATE `account` SET `password`='".$_SESSION['new']."' WHERE `username` = '".$_SESSION['username']."'");
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.14.0/jquery.validate.min.js"></script>
    <!--additional method - for checkbox .. ,require_from_group method ...-->
    <script src="http://jqueryvalidation.org/files/dist/additional-methods.min.js"></script>
    <!--中文錯誤訊息-->
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/localization/messages_zh_TW.js "></script>
    <script>
        $(document).ready(function($) {
            //for select
            $.validator.addMethod("notEqualsto", function(value, element, arg) {
                return arg != value;
            }, "您尚未選擇!");
            
            $("#f1").validate({
                submitHandler: function(form) {
                    //alert("success!");
                    form.submit();
                },
                rules: {
                    old: {
                        required: true
                    },
                    new: {
                        required: true
                    },
                    new2: {
                        required: true,
                        equalTo: "#new"
                    },
                },
                messages: {
                    old: {
                        required: "*必填"
                    },
                    new: {
                        required: "*必填"
                    },
                    new2: {
                        equalTo: "兩次密碼不相符"
                    },
                }
            });
        });
    </script>
    <style type="text/css">
        .error {
                color: #D82424;
                font-weight: normal;
                font-family: "微軟正黑體";
                display: inline;
                padding: 1px;
        }
    </style>
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
                                    <li><a href="../buyer.php">主頁　</a></li>
                                    <li ><a href="./shopcart.php">購物車　</a></li>
                                    <li class="current-menu-item"><a href="./system.php">會員中心　</a></li>
                                    <?php
                                        if ($_SESSION['username']!="")
                                        {
                                    ?>
                                        <li><a href="./../logout.php">登出　</a></li>
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
                            <h1>會員中心</h1>
                            <!--
                            <nav class="site-navigation flex justify-content-end align-items-end"></nav>
                                <dl class="flex flex-column flex-lg-row justify-content-lg-end align-content-center">
                                    <dd><a href="#">分類　</a></dd>
                                    <dd ><a href="#">分類　</a></dd>
                                    <dd class="#"><a href="#">分類　</a></dd>
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
            
            <div class="col-12">
                <div class="contact-form">
                    <h3>密碼修改</h3>

                    <form name = "f1" id = "f1" method = "POST" action = "check_system.php">
                        <input type="password" id="old" name="old" placeholder="原密碼" required>
                        <?php
                            if(isset($_SESSION['flag']) && $_SESSION['flag']=="error")
                            {
                        ?>
                        <label class="error">帳號或密碼錯誤</label>
                        <?php
                            }
                            else if(isset($_SESSION['flag']) && $_SESSION['flag']=="null")
                            {
                        ?>
                        <label class="error">查無此帳號</label>
                        <?php
                            }
                        ?>
                        <div class="tab"></div>
                        <input type="password" id="new" name="new" placeholder="新密碼" required>
                        <div class="tab"></div>
                        <input type="password" id="new2" name="new2" placeholder="重新輸入新密碼" required>
                        <div class="tab"></div>
                        <input type="submit" value="Send Message">
                    </form>
                </div><!-- .contact-form -->
            </div><!-- .col -->

            <div class="col-12">
                <div class="contact-form">
                    
                    <h4>您的會員等級:<span><?php echo $_SESSION['user_level'] ?></span></h4>
                    <h5>會員福利</h5>
                    <ul>
                        <li>可查看購物商品詳細內容</li>
                        <li>將商品加入購物車</li>
                        <li>客服服務</li>
                    </ul>

                    <?php
                        if($_SESSION['user_level'] != '銅會員')
                            echo '<h5>'.$_SESSION['user_level'].'專屬服務</h5>';
                        if($_SESSION['user_level'] == '鑽會員')
                        {
                            echo '<ul>
                                <li>享有平台交易手續費減免</li>
                                <li>享有商品正式上架前25分鐘優先購買權</li>
                                <li>開放賣家系統(可上架商品)</li>
                            </ul>';
                        }
                        else if($_SESSION['user_level'] == '金會員')
                        {
                            echo '<ul>
                                <li>享有平台交易手續費折扣</li>
                                <li>享有商品正式上架前5分鐘優先購買權</li>
                                <li>開放賣家系統(可上架商品)</li>
                            </ul>';
                        }
                        else if($_SESSION['user_level'] == '銀會員')
                        {
                            echo '<ul>
                                <li>開放賣家系統(可上架商品)</li>
                            </ul>';
                        }
                    ?>
                </div><!-- .contact-form -->
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
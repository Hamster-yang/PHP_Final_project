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

    if(isset($_SESSION['user_id']))
    $no= $_SESSION['user_id'];    
    else
    $no = -1;

?>

<?php

    $link = mysqli_connect("localhost", "root", "root123456", "group_27") // 建立MySQL的資料庫連結
    or die("無法開啟MySQL資料庫連結!<br>");

    // 送出編碼的MySQL指令
    mysqli_query($link, 'SET CHARACTER SET utf8');
    mysqli_query($link, "SET collation_connection = 'utf8_unicode_ci'");

    if($result = mysqli_query($link, "SELECT * FROM shopcart s WHERE s.buyer = $no"))
    {
        while ($row = mysqli_fetch_assoc($result)) 
        {
            $goods = $row['good_no'];
            $resulttt = mysqli_query($link, "SELECT * FROM orders o WHERE o.buyer = $no and o.good_no = $goods");
            if ($num = mysqli_num_rows($resulttt))	
            {
                echo "<script> {window.alert('已取消重複下單的商品，請確認訂單資訊');history.go(0)} </script>";//返回上頁
            }
            else
            {
                $sql = "insert into orders values ('".$no."','".$goods."','配送中')";	 
                mysqli_query($link, $sql);
            }
        }
    }
    $sqll = "DELETE FROM shopcart  where buyer = $no";
    $result = mysqli_query($link,$sqll);
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

    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <script>
        $(function () {
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
                                <h1 class="site-title"><a href="../index.php" rel="home">通識屋</a></h1>
                            </div><!-- .site-branding -->
                        </div><!-- .col -->

                        <div class="col-3 col-lg-9 flex justify-content-end align-content-center">
                            <nav class="site-navigation flex justify-content-end align-items-center">
                                <ul class="flex flex-column flex-lg-row justify-content-lg-end align-content-center">
                                    <li><a href="../buyer.php">主頁　</a></li>
                                    <li ><a href="./shopcart.php">購物車　</a></li>
                                    <li class="current-menu-item"><a href="../buyer/order.php">訂單　</a></li>
                                    <li ><a href="./system.php">會員中心　</a></li>
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
                            <h1>訂單確認</h1>
                            
                        </header><!-- .entry-header -->
                    </div><!-- .col -->
                </div><!-- .row -->
            </div><!-- .container -->
        </div><!-- .page-header-overlay -->
    </div><!-- .page-header -->

    <div class="container">

        <div class="row mx-m-25">
            <div class="col-md-12">
                <div class="course-content">
                    <div class="course-content-wrap">
                        
                    <div class="container">
                            <!--結帳步驟-->
                            <div class="row justify-content-center text-center mb-5">
                                <div class="col-12 col-md">
                                    <div class="alert alert-secondary rounded-pill mr-2" role="alert">
                                        1.確認訂單資料
                                    </div>
                                </div>
                                <div class="col-12 col-md">
                                    <div class="alert alert-secondary rounded-pill mr-2" role="alert">
                                        2.金流付款
                                    </div>
                                </div>
                                <div class="col-12 col-md">
                                    <div class="alert alert-success rounded-pill mr-2" role="alert">
                                        3.完成
                                    </div>
                                </div>
                            </div>

                            <!--Collapse-->
                            <div class="row justify-content-center">
                                <div class="col col-md-8">
                                    <div >
                                        <div >
                                            <div >                                                                                          
                                                <table class="table">
                                                        <tr>  
                                                               <td></td>                                 
                                                            <td colspan = "2" class="align-middle"><b><h1>感謝您的下單 歡迎下次光臨</h1></b></td>
                                                          
                                                        </tr>
                                                       
                                                        <tr >
                                                            <td></td><td></td>
                                                            <td colspan = "2" class="align-middle">
                                                                <a href ="../buyer.php">回首頁<a>　　
                                                                <a href ="./order.php">查看訂單<a>　</td> 
                                                        </tr>
                                                </table>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>                                                                                                                
    </div><!-- .container -->

   
    <script type='text/javascript' src='../js/jquery.js'></script>
    <script type='text/javascript' src='../js/swiper.min.js'></script>
    <script type='text/javascript' src='../js/masonry.pkgd.min.js'></script>
    <script type='text/javascript' src='../js/jquery.collapsible.min.js'></script>
    <script type='text/javascript' src='../js/custom.js'></script>

</body>
</html>
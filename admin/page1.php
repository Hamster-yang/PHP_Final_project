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
    <style type="text/css">
        .error {
                color: #D82424;
                font-weight: normal;
                font-family: "微軟正黑體";
                display: inline;
                padding: 1px;
        }
        table {
            width: 500px;
            border: 1px green solid;
            border-collapse: collapse;
        }

        tr, td, th {
            border: 1px blue solid;
            text-align: center
        }
        caption{
            font-size: 18px;
            font-weight: bold;
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
                                    <li><a href="../admin.php">主頁　</a></li>
                                    <li class="current-menu-item"><a href="./page1.php">修改會員資料　</a></li>
                                    <li><a href="./page2.php">商品管理　</a></li>
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
                <div class="contact-form">
                    <h3>會員資料修改</h3>

                    <h5>修改會員等級</h5>
                    <form action="./change_userlevel.php" method="POST">
                        <input type="text" id="username" name="username" placeholder="會員帳號">
                        <input type="text" id="userlevel" name="userlevel" placeholder="會員等級">
                        <div class="tab"></div>             
                        <input type="submit" value="修改會員等級" class="submit">
                        <?php
                            if(isset($_SESSION['msg1']))
                            {
                        ?>
                        <label class="error"><?php echo $_SESSION['msg1'] ?></label>
                        <?php
                            }
                        ?>
                    </form>
                    <br><br>
                    <h5>重設會員密碼</h5>
                    <form action="./change_password.php" method="POST">
                        <input type="text" id="username" name="username" placeholder="會員帳號">
                        <input type="text" id="password" name="password" placeholder="重設帳號密碼">
                        <div class="tab"></div>             
                        <input type="submit" value="重設會員密碼" class="submit">
                        <?php
                            if(isset($_SESSION['msg2']))
                            {
                        ?>
                        <label class="error"><?php echo $_SESSION['msg2'] ?></label>
                        <?php
                            }
                        ?>
                    </form>
                    <br><br>
                    <h5>刪除會員資料</h5>
                    <form action="./delete_username.php" method="POST">
                        <input type="text" id="username" name="username" placeholder="會員帳號">
                        <div class="tab"></div>             
                        <input type="submit" value="刪除會員資料" class="submit">
                        <?php
                            if(isset($_SESSION['msg3']))
                            {
                        ?>
                        <label class="error"><?php echo $_SESSION['msg3'] ?></label>
                        <?php
                            }
                        ?>
                    </form>
                    
                </div><!-- .contact-form -->                
<?php 
    $link = mysqli_connect('localhost','root','root123456','user') or die("無法開啟MySQL資料庫連結!<br>");
    $rows="";
    $num= "null";
    mysqli_query($link, 'SET CHARACTER SET utf8');
    mysqli_query($link, "SET collation_connection = 'utf8_unicode_ci'");
    if ($result = mysqli_query($link, "SELECT * FROM account")) {
        while ($row = mysqli_fetch_assoc($result)) {
            $rows .= "<tr><td>" . $row["username"] . "</td><td>" . $row["type"] . "</td><td>"  . $row["level"] . "</td></tr>";
        }
        $num = mysqli_num_rows($result);
        mysqli_free_result($result); // 釋放佔用的記憶體
    }
    mysqli_close($link); // 關閉資料庫連結
?>                
                <div class="contact-form">
                    <h3>會員資料</h3>

                    <h5>共<?php echo $num; ?>筆</h5>
                    <table>
                            <tr>
                                <th>會員帳號</th>
                                <th>會員權限</th>
                                <th>會員等級</th>
                            <tr>
                                
                            <?php echo $rows ?>
                            

                    </table>
                    
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
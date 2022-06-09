<?php
    session_start();

    if (isset($_POST['username']) && isset($_POST['password']) )
        $_SESSION['username'] = $_POST['username'] ;
    else if(!isset($_SESSION['username']))
        $_SESSION['username'] = "";
?>

<!DOCTYPE html>

<?php

$link = mysqli_connect("localhost", "root", "root123456", "group_27") // 建立MySQL的資料庫連結
or die("無法開啟MySQL資料庫連結!<br>");

// 送出編碼的MySQL指令
mysqli_query($link, 'SET CHARACTER SET utf8');
mysqli_query($link, "SET collation_connection = 'utf8_unicode_ci'");

//資料庫新增存檔
if (isset($_POST['name'])) {    
    $stamps = time();

    $name = $_POST['name'];
    $message = $_POST['message'];
    $today = getdate($stamps);
    $year = $today['year'];

    $today = getdate($stamps);
    $month = $today["mon"];

    $today = getdate($stamps);
    $day = $today['mday'];

    $sql = "insert into message_board values ('$name','$message','$year"."-".$month."-"."$day')";

    if ($result = mysqli_query($link, $sql)) // 送出查詢的SQL指令
    {
        $msg = "<span style='color:#0000FF'>資料新增成功!</span>";
    } else {
        $msg = "<span style='color:#FF0000'>資料新增失敗！<br>錯誤代碼：" . mysqli_errno($link) . "<br>錯誤訊息：" . mysqli_error($link) . "</span>";
    }

}
//mysqli_close($link); // 關閉資料庫連結
?>

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

    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <!-- 不知道是搞啥的 會影響頂端排版
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
    -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

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
                                    <li class="current-menu-item"><a href="">主頁　</a></li>
                                    <li ><a href="https://apss.ncue.edu.tw/sign_up/index.php" target="_blank">彰師大通識網站　</a></li>
                                    <li ><a href="./login/signup.php">新會員註冊　</a></li>
                                    <li><a href="./login/SignIn/buyer.php">會員登入　</a></li>
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

        <div class="hero-content-overlay">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="hero-content-wrap flex flex-column justify-content-center align-items-start">
                            <header class="float-left entry-header">
                                
                                <h1 style="text-align: left;">還在自己搶通識講座嗎?<br/>網速、手速跟不上?<br>快來通識屋尋找自己喜歡的通識講座</h1>
                            </header><!-- .entry-header -->

                            <div class="entry-content">
                                <p>非會員只能瀏覽商品清單頁面，如需進行操作或購買，請登入會員或點擊右上方註冊成為新會員。</p>
                            </div><!-- .entry-content -->

                            <footer class="entry-footer read-more">
                                <?php
                                if($_SESSION['username']=="")             
                                    echo '<a href="./buyernonuser.php">買家專區</a>';
                                else    
                                    echo '<a href="./buyer.php">買家專區</a>';
                                ?>       
                            </footer><!-- .entry-footer -->
                            <footer class="entry-footer read-more">
                                <a href="./login/SignIn/seller.php">賣家登入</a>
                            </footer><!-- .entry-footer -->
                        </div><!-- .hero-content-wrap -->
                    </div><!-- .col -->
                </div><!-- .row -->
            </div><!-- .container -->
        </div><!-- .hero-content-hero-content-overlay -->
    </div><!-- .page-header -->

    
    <div class="container"><!--留言板-->
        <div class="row">
            <div class="col-12 offset-lg-1 col-lg-1">
                
            </div><!-- .col --><!--不能刪 控制排版 -->

            <div class="col-12 col-lg-8">
                <div class="post-comments-wrap">
                    <div class="post-comments">

                    <?php
                            
                            if($result = mysqli_query($link, "SELECT * FROM message_board"))
                            {
                                for($i = 1; $row = mysqli_fetch_assoc($result); $i++)
                                {
                                    $a=rand(1,7);
                                    echo '<h3 class="comments-title"><span class="comments-number">'.$i. 'Comments</span></h3>
                                    <ol class="comment-list">
                                        <li class="comment">
                                            <article class="comment-body">
                                                <figure class="comment-author-avatar">
                                                    <img src="images/images'.$a.'.jpg" alt="">
                                                </figure><!-- .comment-author-avatar -->
    
                                                <div class="comment-wrap">
                                                    <div class="comment-author">
                                                        <span class="comment-meta d-block">
                                                            <a href="#">'.$row['date'].'</a>
                                                        </span><!-- .comment-meta -->
    
                                                        <span class="fn">
                                                            <a href="#">'.$row['name'].'</a>
                                                        </span><!-- .fn -->
                                                    </div><!-- .comment-author -->
    
                                                    <p>'.$row['message'].'</p>';
    
                                        echo '</div><!-- .comment-wrap -->
    
                                                <div class="clearfix"></div>
                                            </article><!-- .comment-body -->
                                        </li><!-- .comment -->
                                    </ol><!-- .comment-list -->';
                                }
                            }
                        ?>


                    </div><!-- .post-comments -->

                    <div class="comments-form">
                        <div class="comment-respond">
                            <h3 class="comment-reply-title">新增留言</h3>

                            <form class="comment-form" action="" method="POST">
                                <input type="text" placeholder="稱呼" name="name">
                                <textarea rows="4" placeholder="留言" name="message"></textarea>
                                <input type="submit" value="送出">
                            </form><!-- .comment-form -->
                        </div><!-- .comment-respond -->
                    </div><!-- .comments-form -->
                </div><!-- .post-comments-wrap -->
            </div><!-- .col -->
        </div><!-- .row -->
    </div><!-- .container --><!--留言板-->
       
    </section><!-- .testimonial-section -->

   
    <script type='text/javascript' src='js/jquery.js'></script>
    <script type='text/javascript' src='js/swiper.min.js'></script>
    <script type='text/javascript' src='js/masonry.pkgd.min.js'></script>
    <script type='text/javascript' src='js/jquery.collapsible.min.js'></script>
    <script type='text/javascript' src='js/custom.js'></script>
    <script type='text/javascript' src='js/admin.js'></script>

</body>
</html>
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
    
<!--   <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"> -->
    
    <link href="//cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css" rel="stylesheet">
    
    <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css" rel="stylesheet">

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
        </div>   
    </div>
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8 text-center">
                
                <h3>會員資料修改</h3>
                <form class="form-horizontal form-inline" name="form1" id="form1" method="post">
                    <input type="hidden" name="oper" id="oper" value="insert">
                    <input type="hidden" name="stud_no_old" id="stud_no_old" value="">
                    <table id="edit" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th class="text-center">編號</th>
                                <th class="text-center">賣家</th>
                                <th class="text-center">名稱</th>
                                <th class="text-center">講者</th>
                                <th class="text-center">時間</th>
                                <th class="text-center">價格</th>
                                <th class="text-center">事項1</th>
                                <th class="text-center">事項2</th>
                                <th class="text-center">事項3</th>
                                <th class="text-center">事項4</th>
                                <th class="text-center">事項5</th>
                                <th class="text-center">新增/取消</th>
                            </tr>
                            <tr>
                                <td class="text-center">
                                    <input type="text" id="goods_id" name="goods_id">
                                </td>
                                <td class="text-center">
                                    <input type="text" id="goods_username" name="goods_username">
                                </td>
                                <td class="text-center">
                                    <input type="text" id="goods_theme" name="goods_theme">                                     
                                </td>
                                <td class="text-center">
                                    <input type="text" id="goods_lecturer" name="goods_lecturer">
                                </td>
                                <td class="text-center">
                                    <input type="text" id="goods_date" name="goods_date">
                                </td>
                                <td class="text-center">
                                    <input type="text" id="goods_price" name="goods_price">
                                </td>
                                <td class="text-center">
                                    <input type="text" id="goods_one" name="goods_one">
                                </td>
                                <td class="text-center">
                                    <input type="text" id="goods_two" name="goods_two">
                                </td>
                                <td class="text-center">
                                    <input type="text" id="goods_three" name="goods_three">
                                </td>
                                <td class="text-center">
                                    <input type="text" id="goods_four" name="goods_four">
                                </td>
                                <td class="text-center">
                                    <input type="text" id="goods_five" name="goods_five">
                                </td>
                                <td>
                                    <button type="submit" class="btn btn-primary btn-xs" id="btn-save"><i class="glyphicon glyphicon-save"></i>新增</button>
                                    <button type="reset" class="btn btn-danger btn-xs" id="btn-cancel">取消</button>
                                </td>
                            </tr>
                        </thead>
                    </table>
                    
                    <table id="example" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th class="text-center">編號</th>
                                <th class="text-center">賣家</th>
                                <th class="text-center">名稱</th>
                                <th class="text-center">講者</th>
                                <th class="text-center">時間</th>
                                <th class="text-center">價格</th>
                                <th class="text-center">事項1</th>
                                <th class="text-center">事項2</th>
                                <th class="text-center">事項3</th>
                                <th class="text-center">事項4</th>
                                <th class="text-center">事項5</th>
                                <th class="text-center">修改/刪除</th>
                            </tr>
                        </thead>
                    </table>
                        
                </form>
            </div><!-- .col-md-8 text-center -->                                           
        </div><!-- .row -->

        <div class="col-12"></div>
   
    <script src="//code.jquery.com/jquery-3.3.1.js"></script>
    <script src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="//cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
    <script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.14.0/jquery.validate.min.js"></script>
    <script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/localization/messages_zh_TW.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>

    <script src="./page2.js"></script>
    <!--<script type='text/javascript' src='../js/jquery.js'></script>-->
    <script type='text/javascript' src='../js/swiper.min.js'></script>
    <script type='text/javascript' src='../js/masonry.pkgd.min.js'></script>
    <script type='text/javascript' src='../js/jquery.collapsible.min.js'></script>
    <script type='text/javascript' src='../js/custom.js'></script>

</body>
</html>
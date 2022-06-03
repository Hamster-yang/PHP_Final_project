<?php
    session_start();
    $_SESSION['email'] = $_POST['email'];    
?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="../../css/login.css" />
        <link rel="icon" href="./../../images/home.ico" type="image/x-icon" />
        <meta http-equiv="refresh" content="3;url=./verify_email.php"> 
        <script>
            function link_signup() {
                window.location.href="../../Login/signup.php";
            }
            function link_index() {
                window.location.href="./../../logout.php";
            }
            function link_repeat() {
                window.location.href="./verify_email.php";
            }
        </script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
        <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.14.0/jquery.validate.min.js"></script>
        <!--additional method - for checkbox .. ,require_from_group method ...-->
        <script src="http://jqueryvalidation.org/files/dist/additional-methods.min.js"></script>
        <!--中文錯誤訊息-->
        <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/localization/messages_zh_TW.js "></script>
        <title>Login</title>         
    </head>

    <body>
        <div class="system_name">
        <h2></h2>
        </div>
        
        <div class="login_page">
        <div id="container3">

            <div class="login">  
            
            <h3>登入 Sing In</h3>
            <!--<form action="用戶管理.php" id="form1">-->
            <form action="" id="form1" method="POST">                
                <p>系統正在處理中</p>
                <p>請耐心等候，謝謝</p>
                <?php
                    echo $_SESSION['email'];
                ?>
                <div class="race-by"></div>                
                
                
                <!--<input type="submit" value="登入" class="submit" onclick="location.href='test.html'">-->
            </form>  
            <h5 onclick="link_repeat()">重新寄送驗證碼</h5>
            <h5 onclick="link_index()">回首頁</h5>
            </div><!-- login end-->
        </div><!-- container1 end-->
        </div><!-- login_page end-->
        
    </body>
</html>


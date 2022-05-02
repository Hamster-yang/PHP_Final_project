<?php
    session_start();

?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="../../css/login.css" />
        <link rel="icon" href="./../../images/home.ico" type="image/x-icon" />
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
        <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.14.0/jquery.validate.min.js"></script>
        <!--additional method - for checkbox .. ,require_from_group method ...-->
        <script src="http://jqueryvalidation.org/files/dist/additional-methods.min.js"></script>
        <!--中文錯誤訊息-->
        <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/localization/messages_zh_TW.js "></script>
        <title>Login</title>
        
        <script>
            $(document).ready(function($) {
                $("#form1").submit(function() {
                    var message = "";
                    var username = $('#username').val();
                    var password = $("#password").val();
                    
                    if(username == "")
                        message = "帳號不可為空";
                    else if(password == "")
                        message = "密碼不可為空";
                    
                    if(message)
                    {
                        $("#message").html(message);
                        $("#username").focus();
                        return false;
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
            <style type="text/css">
                #message {
                color: #D82424;
                font-weight: normal;
                font-family: "微軟正黑體";
                display: inline;
                padding: 1px;
                }
                </style>

    </head>

    <body>
        <div class="system_name">
        <h2></h2>
        </div>
        
        <div class="login_page">
        <div id="container1">

            <div class="login">  
            
            <h3>admin Login</h3>
            <!--<form action="用戶管理.php" id="form1">-->
            <form action="./check_admin.php" id="form1" method="POST">
                <input type="text" id="username" name="username" placeholder="帳號" required>
                <div class="tab"></div>                
                <input type="password" id="password" name="password" placeholder="密碼" required>
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
                    else if(isset($_SESSION['flag']) && $_SESSION['flag']=="notseller")
                    {
                ?>
                <label class="error">權限不足</label>
                <?php
                    }
                ?>
                <div class="tab"></div>
                <div id="message" class="form-group"></div>
                <input type="submit" value="登入" class="submit">
                <!--<input type="submit" value="登入" class="submit" onclick="location.href='test.html'">-->
            </form>  
            
            </div><!-- login end-->
        </div><!-- container1 end-->
        </div><!-- login_page end-->
        
        
            
    </body>
</html>
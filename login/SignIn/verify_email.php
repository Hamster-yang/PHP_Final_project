<?php
    session_start();
    //md5 hash "resetpassword(1~10)"
    $key = array(
        "69b39ef725736a1d069fad3a42b43811",
        "308cd0b1f214ad9f6cd7bf92951f72b3",
        "dd8a77108b3937a54f48417085703fb5",
        "4e7fe6175fb8a3a38b1e2686d1b17086",
        "37ac48388b37a5b079c15ec57be8045c",
        "66665aef4268eda3ae954c68f65f2cf8",
        "6b47df2af0dd5dca58c437e888bfa24a",
        "895cd3dd57c77f187b36937862fe962a",
        "978bad6f819c14a73dde59b51bfa20a8",
        "8cd6925cd0e175c49b79e8cce0f11ff2"        
    );
    $rand_key = $key[rand(0,9)];
    $_SESSION['key'] = $rand_key;

    $header="MIME-Version:1.0\r\n";
    $header.="Content-Type:text/html;charset=utf-8\r\n";
    $header.="From:service@group27.com\r\n";

    $to = $_SESSION['email'];
    $subject = "=?UTF-8?B?".base64_encode("【通識屋】密碼重設")."?="; //轉換編碼
    $body = "
    <html>
        <head>
            <meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">
        </head>
        <body>
            您好，您目前啟用通識屋忘記密碼之功能<br><br>
            請依照以下步驟進行密碼變更<br>
            以下是您的金鑰: ". $rand_key ."<br>
            請複製此金鑰並且回到<a href=". "https://localhost/PHP_Final_project/index.php" .">通識屋網站</a> 完成密碼重設步驟
            

            <br><br>
            如有任何問題，請聯絡客服 service.group27@gmail.com ，我們將盡快協助您，謝謝您<br><br>
            
            [※本電子郵件係由系統自動發送，請勿直接回覆本郵件。]
        </body>
    </html>";

    mail($to,$subject,$body,$header)
    or die("郵件傳送失敗！");
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="../../css/login.css" />
        <link rel="icon" href="./../../images/home.ico" type="image/x-icon" />
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
        
        <script>
            $(document).ready(function($) {
                //for select
                $.validator.addMethod("notEqualsto", function(value, element, arg) {
                    return arg != value;
                }, "您尚未選擇!");
            
                $("#form1").validate({
                    submitHandler: function(form) {
                        //alert("success!");
                        form.submit();
                    },
                    rules: {
                        username: {
                            required: true
                        },
                        password: {
                            required: true,
                        }
                    },
                    messages: {
                        username: {
                            required: "*必填"
                        },
                        password: {
                            required: "*必填"
                        }
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

    <body>
        <div class="system_name">
        <h2></h2>
        </div>
        
        <div class="login_page">
        <div id="container3">

            <div class="login">  
            
            <h3>登入 Sing In</h3>
            <!--<form action="用戶管理.php" id="form1">-->
            <form action="./check_forgot_password.php" id="form1" method="POST">
                <input type="text" id="key" name="key" placeholder="請輸入驗證碼" required>
                <div class="tab"></div>
                <input type="submit" value="送出" class="submit">
                <!--<input type="submit" value="登入" class="submit" onclick="location.href='test.html'">-->
            </form>  
            <h5 onclick="link_repeat()">重新寄送驗證碼</h5>
            <h5 onclick="link_index()">回首頁</h5>
            </div><!-- login end-->
        </div><!-- container1 end-->
        </div><!-- login_page end-->
        
    </body>
</html>
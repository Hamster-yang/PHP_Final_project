<?php
    session_start();
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
                window.location.href="./../../index.php";
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

                $("#form2").validate({
                    submitHandler: function(form) {
                        //alert("success!");
                        form.submit();
                    },
                    rules: {
                        fullname: {
                            required: true
                        },
                        username2: {
                            required: true,
                            minlength: 4,
                            maxlength: 10
                        },
                        password2: {
                            required: true
                        },
                        comfirm_password: {
                            required: true,
                            equalTo: "#password2"
                        },
                    },
                    messages: {
                        fullname: {
                            required: "*必填"
                        },
                        username2: {
                            required: "*必填",
                            minlength: "帳號最少要4個字",
                            maxlength: "帳號最長10個字"
                        },
                        password2: {
                            required: "*必填"
                        },
                        comfirm_password: {
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

    <body>
        <div class="system_name">
        <h2></h2>
        </div>
        
        <div class="login_page">
        <div id="container1">

            <div class="login">  
            
            <h3>登入 Sing In</h3>
            <!--<form action="用戶管理.php" id="form1">-->
            <form action="../../seller.php" id="form1" method="POST">
                <input type="text" id="username" name="username" placeholder="帳號" required>
                <div class="tab"></div>
                <input type="password" id="password" name="password" placeholder="密碼" required>
                <div class="tab"></div>
                <input type="submit" value="登入" class="submit">
                <!--<input type="submit" value="登入" class="submit" onclick="location.href='test.html'">-->
            </form>  

            <h5 onclick="link_signup()">註冊帳號</h5>
            <h5 onclick="link_index()">回首頁</h5>
            </div><!-- login end-->
        </div><!-- container1 end-->
        </div><!-- login_page end-->
        
    </body>
</html>
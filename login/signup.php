<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="../css/login.css" />
        <script>
            function link_signin() {
                window.location.href="./SignIn/buyer.php";
            }
            function link_index() {
                window.location.href="../index.php";
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
        <style>
            #container1{
                visibility: hidden;   /*剛開始消失*/
                height: 400px;
            }
            #container2{
                visibility: visible;   /*剛開始消失*/
                height: 400px;
            }
        </style>
        

    </head>

    <body>
        <div class="system_name">
        <h2></h2>
        </div>
        
        
        <div class="signup_page">
        <div id="container2">

            <div class="signup">  
            
            <h3>註冊 Sign Up</h3>

            <form action="./SignIn/buyer.php" id="form2">
                <input type="text" id="fullname" name="fullname" placeholder="使用者全名" required>
                <div class="tab"></div>
                <input type="text" id="username2" name="username" placeholder="帳號" required>
                <div class="tab"></div>
                <input type="password" id="password2" name="password" placeholder="密碼" required>
                <div class="tab"></div>
                <input type="password" id="comfirm_password" name="comfirm_password" placeholder="確認密碼" required>
                <div class="tab"></div>            
                <input type="submit" value="註冊" class="submit">
            </form>  
            
            <h5 onclick="link_signin()">登入帳號</h5>
            <h5 onclick="link_index()">回主頁</h5>
            </div><!-- signup end-->
        </div><!-- container2 end-->
        </div><!-- signup_page end--> 

    </body>
</html>
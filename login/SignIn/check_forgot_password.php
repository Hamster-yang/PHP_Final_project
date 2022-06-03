<?php
    session_start();
    $rand_password = "";
    $rand_password = strval(rand(1000,9999));

    if(isset($_SESSION['key']) && isset($_POST['key']))
    {
        if($_SESSION['key'] == $_POST['key'])
        {
            $link = mysqli_connect("localhost", "root", "root123456", "group_27") // 建立MySQL的資料庫連結
            or die("無法開啟MySQL資料庫連結!<br>");

            // 送出編碼的MySQL指令
            mysqli_query($link, 'SET CHARACTER SET utf8');
            mysqli_query($link, "SET collation_connection = 'utf8_unicode_ci'");

            //資料庫新增存檔
            if (isset($_SESSION['email'])) {
                $sql = "update `account` SET `password`='". $rand_password ."' WHERE `eamil` = '". $_SESSION['email'] ."'";
                
                if ($result = mysqli_query($link, $sql)) // 送出查詢的SQL指令
                {
                    $_SESSION['msg2'] = "success";                    
                } else {
                    $msg = "<span style='color:#FF0000'>資料新增失敗！<br>錯誤代碼：" . mysqli_errno($link) . "<br>錯誤訊息：" . mysqli_error($link) . "</span>";
                    $_SESSION['msg2'] = $msg;                    
                }

            }

            echo "<script> {window.alert('驗證成功，您重設的密碼為". $rand_password ."');window.location.href=\"./../../index.php\";} </script>";
            //資料庫
        }
        else
        {
            echo "<script> {window.alert('驗證碼錯誤，請重新設定');window.location.href=\"./forgot_password.php\";} </script>";                            
        }
    }
    
?>

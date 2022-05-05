<?php
    session_start();
    $_SESSION['msg2'] = "";
    
?>
<?php

    $link = mysqli_connect("localhost", "root", "root123456", "user") // 建立MySQL的資料庫連結
    or die("無法開啟MySQL資料庫連結!<br>");

    // 送出編碼的MySQL指令
    mysqli_query($link, 'SET CHARACTER SET utf8');
    mysqli_query($link, "SET collation_connection = 'utf8_unicode_ci'");

    //資料庫新增存檔
    if (isset($_POST['username'])) {
        $sql = "update `account` SET `password`='".$_POST['password']."' WHERE `username` = '".$_POST['username']."'";
        
        if ($result = mysqli_query($link, $sql)) // 送出查詢的SQL指令
        {
            $_SESSION['msg2'] = "success";
            header("Location:./page1.php");
        } else {
            $msg = "<span style='color:#FF0000'>資料新增失敗！<br>錯誤代碼：" . mysqli_errno($link) . "<br>錯誤訊息：" . mysqli_error($link) . "</span>";
            $_SESSION['msg2'] = $msg;
            header("Location:./page1.php");
        }

    }
    

?>
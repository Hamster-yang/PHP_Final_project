<?php
    session_start();
    $_SESSION['msg1'] = "";
    
?>
<?php

    $link = mysqli_connect("localhost", "root", "root123456", "group_27") // 建立MySQL的資料庫連結
    or die("無法開啟MySQL資料庫連結!<br>");

    // 送出編碼的MySQL指令
    mysqli_query($link, 'SET CHARACTER SET utf8');
    mysqli_query($link, "SET collation_connection = 'utf8_unicode_ci'");

    //資料庫新增存檔
    if (isset($_POST['username']) && $_POST['username']!="admin") {
        //$sql = "update from account where username = '" . $_POST['username'] ."'";
        if($_POST['userlevel']=="銅會員")
            $type = "buyer";
        else
            $type = "seller";

        $sql = "update `account` SET `level`='".$_POST['userlevel']."',`type`='".$type."' WHERE `username` = '".$_POST['username']."'";
        if ($result = mysqli_query($link, $sql)) // 送出查詢的SQL指令
        {
            $_SESSION['msg1'] = "success";
            header("Location:./page1.php");
        } else {
            $msg = "<span style='color:#FF0000'>資料新增失敗！<br>錯誤代碼：" . mysqli_errno($link) . "<br>錯誤訊息：" . mysqli_error($link) . "</span>";
            $_SESSION['msg1'] = $msg;
            header("Location:./page1.php");
        }

    }
    else if (isset($_POST['username']) && $_POST['username']=="admin")
    {
        $_SESSION['msg1'] = "無法更改admin";
        header("Location:./page1.php");
    }
    else
    {
        $_SESSION['msg1'] = "不可為空";
        header("Location:./page1.php");
    }

?>
<?php
    session_start();


    if(isset($_GET["buyer"]))
    $buyer=$_GET["buyer"];
    else
    $buyer = -1;
    if(isset($_GET["good"]))
    $goods_No=$_GET["good"];
    else
    $goods_No = -1;
?>
<?php

    $link = mysqli_connect("localhost", "root", "root123456", "group_27") // 建立MySQL的資料庫連結
    or die("無法開啟MySQL資料庫連結!<br>");

    // 送出編碼的MySQL指令
    mysqli_query($link, 'SET CHARACTER SET utf8');
    mysqli_query($link, "SET collation_connection = 'utf8_unicode_ci'");

    //資料庫新增存檔
    if (isset($_GET['buyer'])) {
        $sql = "update `orders` SET `status`='申請退貨中' WHERE `buyer` = '$buyer' and `good_no` = '$goods_No'";
        
        $result = mysqli_query($link, $sql) ;
        echo "<script> {window.alert('申請成功');history.go(-1)} </script>";//返回上頁
    }
    

?>
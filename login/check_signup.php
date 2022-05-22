<?php
    session_start();

    
?>
<?php

    $link = mysqli_connect("localhost", "root", "root123456", "group_27") // 建立MySQL的資料庫連結
    or die("無法開啟MySQL資料庫連結!<br>");

    // 送出編碼的MySQL指令
    mysqli_query($link, 'SET CHARACTER SET utf8');
    mysqli_query($link, "SET collation_connection = 'utf8_unicode_ci'");

    $username = $_POST['username'];
    $password = $_POST['password'];
    $_SESSION['flag'] = "null";

    if ($result = mysqli_query($link, "SELECT * FROM account")) {
        while ($row = mysqli_fetch_assoc($result)) {
            if($username == $row["username"])
            {
                $_SESSION['flag'] = "error_username_is_found";
            }
        }
        $num = mysqli_num_rows($result) + 1;
        
        mysqli_free_result($result); // 釋放佔用的記憶體
    }
    
    if($_SESSION['flag'] == "error_username_is_found")
    {
        $_SESSION['flag'] = "error_username_is_found";
        header("Location:./signup.php");
    }
    else
    {
        //資料庫新增存檔
        if (isset($_POST['username'])) {
            $sql = "insert into account values ('" . $_POST['username'] . "','" . $_POST['password'] . "','" . "buyer" . "','" . "銅會員" . "','". $num ."')";

            if ($result = mysqli_query($link, $sql)) // 送出查詢的SQL指令
            {
                $_SESSION['username'] = $_POST['username'];
                $_SESSION['user_level'] = "銅會員";
                header("Location:./../buyer.php");
            } else {
                $msg = "<span style='color:#FF0000'>資料新增失敗！<br>錯誤代碼：" . mysqli_errno($link) . "<br>錯誤訊息：" . mysqli_error($link) . "</span>";
            }

        }
    }
    

?>
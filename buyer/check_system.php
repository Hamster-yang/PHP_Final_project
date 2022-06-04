<?php
    session_start();
    
    $username = $_SESSION['username'];
    $password = $_POST['old'];
    $_SESSION['flag'] = "null";
    
    $link = mysqli_connect('localhost','root','root123456','group_27') or die("無法開啟MySQL資料庫連結!<br>");

    mysqli_query($link, 'SET CHARACTER SET utf8');
    mysqli_query($link, "SET collation_connection = 'utf8_unicode_ci'");
    if ($result = mysqli_query($link, "SELECT * FROM account")) {
        while ($row = mysqli_fetch_assoc($result)) {
            if($username == $row["username"])
            {
                $_SESSION['flag'] = "";
                if($password == $row["password"])
                {
                    $_SESSION['flag'] = "success";
                    $_SESSION['user_level'] = $row["level"];
                    $_SESSION['user_id'] = $row["user_id"];
                    $_SESSION['new'] = $_POST['new'];
                    header("Location:system.php");
                }
                else
                {
                    $_SESSION['flag'] = "error";
                    header("Location:system.php");
                }
            }
        }
        if($_SESSION['flag'] == "null")
        {
            $_SESSION['flag'] == "null";
            header("Location:system.php");
        }
        mysqli_free_result($result); // 釋放佔用的記憶體
    }
    mysqli_close($link); // 關閉資料庫連結
?>

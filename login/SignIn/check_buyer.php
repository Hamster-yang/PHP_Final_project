<?php
    session_start();

    if (isset($_POST['username']) && isset($_POST['password']) )
        $_SESSION['username'] = $_POST['username'] ;
    
    if (isset($_POST['user_level']) )
        $_SESSION['user_level'] = $_POST['user_level'] ;
    
    $username = $_POST['username'];
    $password = $_POST['password'];
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
                    header("Location:./../../buyer.php");
                }
                else
                {
                    $_SESSION['flag'] = "error";
                    header("Location:./buyer.php");
                }
            }
        }
        if($_SESSION['flag'] == "null")
        {
            $_SESSION['flag'] == "null";
            header("Location:./buyer.php");
        }
        mysqli_free_result($result); // 釋放佔用的記憶體
    }
    mysqli_close($link); // 關閉資料庫連結
?>

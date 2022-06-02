<?php
    session_start();

    if(isset($_SESSION['key']) && isset($_POST['key']))
    {
        if($_SESSION['key'] == $_POST['key'])
        {
            echo "<script> {window.alert('驗證成功，您重設的密碼為xxxx');window.location.href=\"./../../index.php\";} </script>";
            //資料庫

            //header("Location:./../../index.php");
        }
        else
        {
            echo "<script> {window.alert('驗證碼錯誤，請重新設定');window.location.href=\"./forgot_password.php\";} </script>";                
            //header("Location:./forgot_password.php");
        }
    }
    /*
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
    mysqli_close($link); // 關閉資料庫連結*/
?>

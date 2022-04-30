<?php
$link = mysqli_connect('localhost','root','root123456','user') or die("無法開啟MySQL資料庫連結!<br>");

mysqli_query($link, 'SET CHARACTER SET utf8');
mysqli_query($link, "SET collation_connection = 'utf8_unicode_ci'");
if ($result = mysqli_query($link, "SELECT * FROM account")) {
    while ($row = mysqli_fetch_assoc($result)) {
        
        $rows .= "<tr><td>" . $row["username"] . "</td><td>" . $row["password"] . "</td><td>" . $row["type"] . "</td><td>" . $row["level"] . "</td></tr>";
    }
    $num = mysqli_num_rows($result); //查詢結果筆數
    mysqli_free_result($result); // 釋放佔用的記憶體
}

mysqli_close($link); // 關閉資料庫連結
echo $num;
echo $rows;
?>
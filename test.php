<?php
/*
$header="From:service@group27.com";
mail("sam006105@gmail.com","忘記密碼確認信件","your password:####",$header)
or die("郵件傳送失敗！");
*/


$header="MIME-Version:1.0\r\n";
$header.="Content-Type:text/html;charset=utf-8\r\n";
$header.="From:service@group27.com\r\n";

$to = "sam006105@gmail.com";
$subject = "=?UTF-8?B?".base64_encode("html 嵌入測試")."?="; //轉換編碼
$body = "
<html>
    <head>
        <meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">
    </head>
    <body>
        您好，您啟用通識屋忘記密碼之功能<br><br>
        請依照以下步驟進行密碼變更<br>
        以下是您的金鑰: 69b39ef725736a1d069fad3a42b43811<br>
        請複製此金鑰並且回到<a href=". "https://localhost/PHP_Final_project/index.php" .">通識屋網站</a> 完成重設密碼步驟
        

        <br><br>
        如有任何問題，請聯絡客服 service.group27@gmail.com ，我們將盡快協助您，謝謝您<br><br>
        
        [本電子郵件係由系統自動發送，請勿直接回覆本郵件。]
    </body>
</html>";

mail($to,$subject,$body,$header)
or die("郵件傳送失敗！");

?>
<?php
//  resetpassword1 => MD5 => 69b39ef725736a1d069fad3a42b43811
//  resetpassword2 => MD5 => 308cd0b1f214ad9f6cd7bf92951f72b3
?>


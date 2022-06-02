<?php
$header="From:service@group27.com";
mail("sam006105@gmail.com","忘記密碼確認信件","your password:####",$header)
or die("郵件傳送失敗！");
?>
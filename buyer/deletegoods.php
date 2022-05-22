<?php 	
	session_start();

	if(isset($_SESSION['user_id']))
    $member_no=$_SESSION['user_id'];   
    else
    $member_no = -1;

	if(isset($_GET["dgood"]))
    $dgood_No=$_GET["dgood"];
    else
    $dgood_No = -1;
?>
	
<?php
	$link = mysqli_connect("localhost", "root", "root123456", "group_27") // 建立MySQL的資料庫連結
	or die("無法開啟MySQL資料庫連結!<br>");
						
	// 送出編碼的MySQL指令
	mysqli_query($link, 'SET CHARACTER SET utf8');
	mysqli_query($link, "SET collation_connection = 'utf8_unicode_ci'");
	$sql = "delete from shopcart where buyer = $member_no and good_no = $dgood_No";
	if ($result = mysqli_query($link, $sql)) // 送出查詢的SQL指令
        {
            $msg = "<span style='color:#0000FF'>資料新增成功!</span>";
        } else {
            $msg = "<span style='color:#FF0000'>資料新增失敗！<br>錯誤代碼：" . mysqli_errno($link) . "<br>錯誤訊息：" . mysqli_error($link) . "</span>";
        }

	echo "<script> {window.alert('刪除成功');history.go(-1)} </script>";//返回上頁
	mysqli_close($link); // 關閉資料庫連結
?>
<!-- <meta http-equiv="refresh" content="0;url=index.php"> -->
</meta>
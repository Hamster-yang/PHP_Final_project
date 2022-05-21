<?php 	
	session_start();
	$member_no=$_SESSION['user_id'];
	$goods_No=$_GET["good_no"];
	

		$link = mysqli_connect("localhost", "root", "root123456", "group_27") // 建立MySQL的資料庫連結
		or die("無法開啟MySQL資料庫連結!<br>");
							
		// 送出編碼的MySQL指令
		mysqli_query($link, 'SET CHARACTER SET utf8');
		mysqli_query($link, "SET collation_connection = 'utf8_unicode_ci'");
		$sql = "insert into shopcart values ('" . $member_no . "','" . $goods_No  . "')";	
	
		echo "<script> {window.alert('加入成功');history.go(-1)} </script>";//返回上頁
		mysqli_close($link); // 關閉資料庫連結
?>
<!-- <meta http-equiv="refresh" content="0;url=index.php"> -->
</meta>
<?php 	
	session_start();

	if(isset($_SESSION['user_id']))
    $member_no=$_SESSION['user_id'];   
    else
    $member_no = -1;

	if(isset($_GET["good_no"]))
    $goods_No=$_GET["good_no"];
    else
    $goods_No = -1;
?>
	
<?php
	$link = mysqli_connect("localhost", "root", "root123456", "group_27") // 建立MySQL的資料庫連結
	or die("無法開啟MySQL資料庫連結!<br>");
						
	// 送出編碼的MySQL指令
	mysqli_query($link, 'SET CHARACTER SET utf8');
	mysqli_query($link, "SET collation_connection = 'utf8_unicode_ci'");
	$sql = "insert into shopcart values ('".$member_no."','".$goods_No."')";	
	$result = mysqli_query($link, "SELECT * FROM shopcart s WHERE s.good_no = '".$goods_No."'  and s.buyer = $member_no");
	if ($num = mysqli_num_rows($result))	
	{		
		echo "<script> {window.alert('已經在購物車了');history.go(-1)} </script>";//返回上頁
		// echo "<script> {window.alert('已經在購物車了');location.href='pro_key.php'} </script>";
		// echo "<script> {window.alert($temp);location.href='pro_key.php'} </script>";//測試有沒有抓到member_no
	}
	else
	{
		// echo "<script> {window.alert('加入成功');location.href='pro_key.php'} </script>";
		
		
		echo "<script> {window.alert('加入成功');history.go(-1)} </script>";//返回上頁

		$result = mysqli_query($link, $sql)	;
	}
	mysqli_close($link); // 關閉資料庫連結
?>
<!-- <meta http-equiv="refresh" content="0;url=index.php"> -->
</meta>
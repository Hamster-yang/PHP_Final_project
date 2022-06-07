<?php

$link = mysqli_connect("localhost", "root", "root123456", "group_27") // 建立MySQL的資料庫連結
or die("無法開啟MySQL資料庫連結!<br>");

mysqli_query($link, 'SET CHARACTER SET utf8');
mysqli_query($link, "SET collation_connection = 'utf8_unicode_ci'");


$arr_oper = array("insert" => "新增", "update" => "修改", "delete" => "刪除");
$oper = $_POST['oper'];

if ($oper == "query") {
      $sql = "select * from orders";
      if ($result = mysqli_query($link, $sql)) {
            while ($row = mysqli_fetch_assoc($result)) {
                  $a['data'][] = array($row["buyer"], $row["good_no"], $row["status"],  "<button type='button' class='btn btn-warning btn-xs' id='btn_update'><i class='glyphicon glyphicon-pencil'></i>修改</button> <button type='button' class='btn btn-danger btn-xs' id='btn_delete'><i class='glyphicon glyphicon-remove'></i>刪除</button>");
            }
            mysqli_free_result($result); // 釋放佔用的記憶體
      }
      mysqli_close($link); // 關閉資料庫連結

      echo json_encode($a);
      exit;
}

if ($oper == "insert") {
      $sql = "insert into orders(buyer,good_no,status) values ('" . $_POST['order_user'] . "','" . $_POST['order_goodNo'] . "','" . $_POST['order_status'] . "')";
}

if ($oper == "update") {
      $sql = "update orders set buyer='" . $_POST['order_user'] . "',good_no='" . $_POST['order_goodNo'] . "',status='" . $_POST['order_status'] . "' where buyer='" . $_POST['order_user'] . "' and good_no='". $_POST['order_goodNo'] ."'";
}

if ($oper == "delete") {
      $sql = "delete from orders where buyer='" . $_POST['order_user'] . "' and good_no='". $_POST['order_goodNo'] ."'";
}

if (strlen($sql) > 10) {
      if ($result = mysqli_query($link, $sql)) {
            $a["code"] = 0;
            $a["message"] = "資料" . $arr_oper[$oper] . "成功!";
      } else {
            $a["code"] = mysqli_errno($link);
            $a["message"] = "資料" . $arr_oper[$oper] . "失敗! <br> 錯誤訊息: " . mysqli_error($link);
      }
      mysqli_close($link); // 關閉資料庫連結

      echo json_encode($a);
      exit;
}
?>

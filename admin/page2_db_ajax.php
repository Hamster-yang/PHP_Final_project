<?php

$link = mysqli_connect("localhost", "root", "root123456", "group_27") // 建立MySQL的資料庫連結
or die("無法開啟MySQL資料庫連結!<br>");

mysqli_query($link, 'SET CHARACTER SET utf8');
mysqli_query($link, "SET collation_connection = 'utf8_unicode_ci'");


$arr_oper = array("insert" => "新增", "update" => "修改", "delete" => "刪除");
$oper = $_POST['oper'];

if ($oper == "query") {
      $sql = "select * from goods";
      if ($result = mysqli_query($link, $sql)) {
            while ($row = mysqli_fetch_assoc($result)) {
                  $a['data'][] = array($row["no"], $row["username"], $row["theme"], $row["lecturer"], $row["date"], $row["price"], $row["detail_one"], $row["detail_two"], $row["detail_three"], $row["detail_four"], $row["detail_five"], "<button type='button' class='btn btn-warning btn-xs' id='btn_update'><i class='glyphicon glyphicon-pencil'></i>修改</button> <button type='button' class='btn btn-danger btn-xs' id='btn_delete'><i class='glyphicon glyphicon-remove'></i>刪除</button>");
            }
            mysqli_free_result($result); // 釋放佔用的記憶體
      }
      mysqli_close($link); // 關閉資料庫連結

      echo json_encode($a);
      exit;
}

if ($oper == "insert") {
      $sql = "insert into goods(no,username,theme,lecturer,date,price,detail_one,detail_two,detail_three,detail_four,detail_five) values ('" . $_POST['goods_id'] . "','" .  $_POST['goods_username'] . "','" . $_POST['goods_theme'] . "','" . $_POST['goods_lecturer'] . "','" . $_POST['goods_date'] . "','" . $_POST['goods_price'] . "','" . $_POST['goods_one'] . "','" . $_POST['goods_two'] . "','" . $_POST['goods_three'] . "','" . $_POST['goods_four'] . "','" . $_POST['goods_five'] . "')";
}

if ($oper == "update") {
      $sql = "update goods set username='" . $_POST['goods_username'] . "',theme='" . $_POST['goods_theme'] . "',lecturer='" . $_POST['goods_lecturer'] . "',date='" . $_POST['goods_date'] ."',price='" . $_POST['goods_price'] ."',detail_one='" . $_POST['goods_one'] ."',detail_two='" . $_POST['goods_two'] ."',detail_three='" . $_POST['goods_three'] ."',detail_four='" . $_POST['goods_four'] ."',detail_five='" . $_POST['goods_five'] ."' where no='" . $_POST['stud_no_old'] . "'";
}

if ($oper == "delete") {
      $sql = "delete from goods where no='" . $_POST['stud_no_old'] . "'";
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

<?php
session_start();
session_destroy();
header("Location:session_test1.php");

?>
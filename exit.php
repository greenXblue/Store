<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title></title>
</head>
<body>
<?php
include("index.php");
include("connect.php");
//session_start();
unset($_SESSION['log']);
session_unset("log");
unset($_SESSION['id_bask']);
session_unset("id_bask"); 
session_destroy();
$strSQL="DELETE FROM basket_books WHERE id_bask='" .$id_bask. "'";
mysql_query($strSQL);
header('Location: http://localhost:8080/mahmudova/store/index.php',true, 301);
exit;
?>
</body>
</html>

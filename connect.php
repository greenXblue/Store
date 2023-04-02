<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title></title>
</head>
<body>
<?php
mysql_connect("localhost:3307", "root", "usbw") or
die("Не могу подключиться к серверу!");
mysql_select_db("books2022") or
die("Не могу подключиться к базе данных!");

mysql_query("SET NAMES utf8");
?>
</body>
</html>
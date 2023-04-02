<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body>
<?php
session_start();
$fam=$_POST["fam"];
$im=$_POST["im"];
$addr=$_POST["addr"];
$mail=$_POST["mail"];
$id=$_SESSION["id"];
$subscribe=$_POST["subscribe"];

$title="Регистрация";
$color="#aaaaff"; 
include("connect.php");
if($fam!="" && $im!="" && $addr!="" && $mail!="")
	{
		$strSQL1="UPDATE customers SET fam='" .$fam. "', im='" .$im. "', addr='" .$addr. "', mail='" .$mail. "', subscribe='" .$subscribe. "' WHERE id_cust='" .$id."'"; 
		$result1=mysql_query($strSQL1) or die("Не могу выполнить запрос!");
		$_SESSION["log"]=$fam." ".$im;
		$message="<center><b>Изменения данных выполнены</b></center>";
	}
else
	$message="<center><b>Не все поля заполнены!</b></center>";
	include("cabinet.php");
?>
</body>
</html>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body>
<?php
$title="Авторизация";
$pass=$_POST["pass"];
$login=$_POST["login"];
include("connect.php");
$strSQL1="SELECT * FROM customers WHERE login ='" .$login. "' AND pass='" .$pass. "'";
$result1=mysql_query($strSQL1) or die("Не могу выполнить запрос!"); 
if($row=mysql_fetch_array($result1))
	{
		$start=session_start(); 

		$_SESSION["log"]=$row["fam"]." ".$row["im"]; 

		$_SESSION["id"]=$row["id_cust"];
		$message="<center><b>Вы успешно авторизовались!</b></center>";
		$success=true;
	}
else
	{
		$message="<center><b>Таких логина/пароля не существует!</b></center>";
	}
mysql_close();

if($success)
	{
		include ("cabinet.php");
	}
else
	{
		include("header.php"); 
		print $message; 
		include("footer.php");
	}
?>
</body>
</html>
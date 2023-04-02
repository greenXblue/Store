<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title></title>
</head>
<body>
<?php
session_start();
$type=$_GET["type"];
$id_book=$_GET["id_book"];
$id_bask=$_COOKIE["id_bask"];

$color="#aaaaff";
include("connect.php");
if($type==1)//положить в корзину
{
	$strSQL="SELECT*FROM basket_books WHERE id_book=" .$id_book. " AND id_bask='" .$id_bask. "'";
	$result=mysql_query($strSQL) or die ("Не могу выполнить запрос1!");
	if($row=mysql_fetch_array($result))
		$strSQL="UPDATE basket_books SET kolvo=kolvo+1 WHERE id_book=" .$id_book. " AND id_bask='" .$id_bask. "'";
	else
		$strSQL="INSERT INTO basket_books (id_bask, id_book, kolvo) Values ('" .$id_bask. "', '" .$id_book. "', 1)";
mysql_query($strSQL);
}
else
	if($type==2)//уменьшить количество
{
	$strSQL="SELECT*FROM basket_books WHERE id_book=" .$id_book." AND id_bask='" .$id_bask. "'";
	$result=mysql_query($strSQL) or die ("Не могу выполнить запрос2!");
	if($row=mysql_fetch_array($result))
		if($row=["kolvo"]>1)
		$strSQL="UPDATE basket_books SET kolvo=kolvo-1 WHERE id_book=" .$id_book. " AND id_bask='" .$id_bask. "'";
	else
		$strSQL="DELETE FROM basket_books WHERE id_book=" .$id_book. " AND id_bask='" .$id_bask. "'";
mysql_query($strSQL);
}
else
	if($type==3)//удалить из корзины
{
	$strSQL="DELETE FROM basket_books WHERE id_book=" .$id_book. " AND id_bask='" .$id_bask. "'";
mysql_query($strSQL);
}
else
	if($type==4)//очистить корзину
{
	$strSQL="DELETE FROM basket_books WHERE id_bask='" .$id_bask. "'";
mysql_query($strSQL);
}
include("basket.php");
?>
</body>
</html>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title></title>
</head>
<body>
<?php
$id_publ=$_GET["id_publ"];
$id_cat=$_GET["id_cat"];
$type=$_GET["type"];
$color="#aaaaff";
include("connect.php");
if($type==1){
$strSQL1="SELECT name_publ FROM publishers WHERE id_publ=" .$id_publ;
$result=mysql_query($strSQL1) or die ("Не могу выполнить запрос1!");
if($row=mysql_fetch_array($result))
$title=$row["name_publ"];
$strSQL1="SELECT id_book, image, author, name_book, books.id_publ, name_publ, price, books.id_cat, name_cat FROM books, publishers, categories WHERE books.id_cat=categories.id_cat AND
books.id_publ=publishers.id_publ AND books.id_publ=" .$id_publ;
}
if($type==2){
$strSQL1="SELECT name_cat FROM categories WHERE id_cat=" .$id_cat;
$result=mysql_query($strSQL1) or die("Не могу выполнить запрос3!");
if($row=mysql_fetch_array($result))
$title=$row["name_cat"];
$strSQL1="SELECT id_book, image, author, name_book, books.id_publ, name_publ, price, books.id_cat, name_cat FROM books, publishers, categories WHERE books.id_cat=categories.id_cat AND
books.id_publ=publishers.id_publ AND books.id_cat=" .$id_cat;
}

$result1=mysql_query($strSQL1) or die("Не могу выполнить запрос2!");
include("header.php");
echo"
<table border=1 width=100% align=right border=1 cellspacing='0'>";
while($row=mysql_fetch_array($result1))
{
	echo"
<tr>
<td align=center><img src='" .$row['image']. "' alt=" .$row['name_book']. " border=0>
<center><a href='dobasket.php?type=1&id_book=" .$row['id_book']. "'>
<font size=-1> положить в корзину</font></a></center></td>
<td>
<table>
<tr><td align=right><i>Товар:</i></td><td>" .$row['author']. "</td></tr>
<tr><td align=right><i>Название:</i></td><td>" .$row['name_book']. "</td></tr>
<tr><td align=right><i>Позиция:</i></td><td><a href='show.php?type=1&id_publ=" .$row['id_publ']. "'>" .$row['name_publ']."</a></td></tr>
<tr><td align=right><i>Цена:</i></td><td>" .$row['price']. "</td></tr>
<tr><td align=right><i>Категория:</i></td><td><a href='show.php?type=2&id_cat=" .$row['id_cat']. "'>" .$row['name_cat']. "</a></td></tr>
</table>
</td>
</tr>";
}
echo"</table>";
include("footer.php");
?>
</body>
</html>

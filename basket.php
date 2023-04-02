<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title></title>
</head>
<body>
<?php
$title="Корзина";
$color="aaaaff";
include("header.php");
include("connect.php");
$strSQL1="SELECT COUNT(*) as count FROM basket_books WHERE id_bask='" .$id_bask. "'";
//echo ($id_bask);
$result1=mysql_query($strSQL1) or die ("Не могу выполнить запрос1!");
$row=mysql_fetch_array($result1);
if($row["count"]==0)
	echo "<br><tr><td align='center'><b>Ваша корзина пуста!</b></td></tr>";
else
{
	$strSQL1="SELECT image, author, name_book, price, kolvo, id_bask, books.id_book FROM books LEFT JOIN basket_books on books.id_book=basket_books.id_book where id_bask='" .$id_bask. "'";
	$result1=mysql_query($strSQL1) or die ("Не могу выполнить запрос2!");	
	echo"
		<table border=1 width=100% align=right cellspacing='0'>
		<tr><td align=right><i>Товар:</i></td>
		<td align=right><i>Название:</i></td>
		<td align=right><i>Цена:</i></td>
		<td align=right><i>Количество:</i></td>
		<td></td></tr>";
		$sum=0;
		while ($row=mysql_fetch_array($result1)) 
		{
			echo"
			<tr>
			<td>" .$row['author']. "</td>
			<td><b>" .$row["name_book"]. "</b></td>
			<td>" .$row["price"]. "</td>
			<td>" .$row["kolvo"]. "
			<a width=10 class=plusminus href='dobasket.php?type=1&id_book=" .$row['id_book']. "' title='Увеличить'>+</a>
			<a class=plusminus href='dobasket.php?type=2&id_book=" .$row["id_book"]. "'title='Уменьшить'>-</a>
			</td>
			<td><a href='dobasket.php?type=3&id_book=" .$row["id_book"]. "'>Удалить</a></td>
			</tr>";
			$sum=$sum+$row["price"]*$row["kolvo"];
		}
		echo "
		<tr><td align=right></td><td align=right><i>Итого:</i></td><td align=right>" .$sum. "</td>
		<td align=right></td><td></td></tr>
		</table>
		<center><a class=clearbasket href='dobasket.php?type=4'><b>Очистить корзину</b></a>
		<a class=order href='order.php'><b>Оформить заказ</b></a></center>";
	}
	include("footer.php");
?>
</body>
</html>

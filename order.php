<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body>
<?php
include("connect.php");
$title="Заказ";
$color="aaaaff";
if (isset($_POST[‘submit’]))
{
	$strSQL1="INSERT INTO orders (date_ord, id_cust, dostavka, bonus) VALUES('". date("Ymd")."','".$id."','1','0')";
	$result1=mysql_query($strSQL1) or die("Не могу выполнить запрос 1!");
	$strSQL2="INSERT INTO order_books (id_order, id_book, kolvo) VALUES('".$id_book."','".$id_book."','1')";
	$result2=mysql_query($strSQL2) or die("Не могу выполнить запрос 1!");
	
	$message="<br><tr><td align='center'><b>Заказ успешно оформлен!</b></td></tr>";
	$strSQL="DELETE FROM basket_books WHERE id_bask='" .$id_bask. "'";
	mysql_query($strSQL);
	$success=true;
}
print $message;

include("header.php");
$strSQL1="SELECT COUNT(*) as count FROM basket_books WHERE id_bask='" .$id_bask. "'";
//echo ($id_bask);
$result1=mysql_query($strSQL1) or die ("Не могу выполнить запрос1!");
$row=mysql_fetch_array($result1);
if($row["count"]==0)
	echo "<br><tr><td align='center'><b>Ваша корзина пуста!</b></td></tr>";
else
{
	$strSQL1="SELECT image, author, name_book, pages, price, kolvo, id_bask, books.id_book FROM books LEFT JOIN basket_books on books.id_book=basket_books.id_book where id_bask='" .$id_bask. "'";
	$result1=mysql_query($strSQL1) or die ("Не могу выполнить запрос2!");	
	echo"
		<br><tr><td align='center'><b>Добавлено к заказу: </b></td></tr>
		<table border=1 width=100% align=right cellspacing='0'>
		<tr><td align=right><i>Автор:</i></td>
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
		<center><a class=clearbasket href='dobasket.php?type=4'><b>Очистить корзину</b></a>";
}
echo "<form method='POST'> <br><br><tr><td align=left></td><td><input type='submit' value='Сформировать заказ'/></td></tr></form>";
	include("footer.php");
?>
</body>
</html>

<?php
$id_bask=$_COOKIE["id_bask"];

if (!isset($id_bask))
{
	$uniq_ID=uniqid("ID");
	setcookie("id_bask", $uniq_ID, time()+60*60*24*14);
}
else
    setcookie("id_bask", $id_bask, time()+60+60+24+14);
?>

<!DOCTYPE html>
<?php
session_start();
$id_bask=$_COOKIE["id_bask"];
if (!isset($id_bask))
{
	$uniq_ID=uniqid("ID");
	setcookie("id_bask", $uniq_ID, time()+60*60*24*14);
}
else 
setcookie("id_bask", $id_bask, time()+60*60*24*14);

if (isset($_SESSION["log"]))
{
	print $_SESSION["log"];
	print "<br><a href='cabinet.php'>Личный кабинет</a>";
}
?>
<html>
<head>
	<meta charset="utf-8">
	<title>Книжный магазин </title>
</head>
<body background="fon.jpg" bgcolor="#87CEEB" style="background-repeat: repeat-y " style="background-repeat: repeat-x" leftmargin="130" rightmargin="5" bgProperties=fixed >
<table border="0" align="right" width="100%" cellpadding="0" cellspacing="5">
<tr><td>
<table border="0" align="right" width="100%">
<tr>
<td align="center" bgcolor="#fadbc8">
<form action="auto.php" method="post">
<table>
<tr><td align="right"><font size="-2">Логин</font> </td>
<td align="left"><input type="text" style="width: 60; height: 20;" name="login"> </td> </tr>
<tr><td align="right"><font size="-2">Пароль</font> </td>
<td align="left"><input type="password" style="width: 60; height: 20;" name="pass">
<input type="submit" value="ok" style="height: 20;"> </td> </tr>
</table>

  <div class="b-example-divider b-example-vr"></div>

  <div style="width: 280px;">
    <a>
      <svg width="40" height="32"></svg>
      <span>Меню</span>
    </a>
    <hr>
    <ul>
    	<li>
        <a href="index.php">
          <svg width="16" height="16"></svg>
          На главную
        </a>
      </li>
      <li>
        <a href="catalog.php">
          <svg width="16" height="16"></svg>
          Каталог
        </a>
      </li>
      <li>
        <a href="basket.php">
          <svg width="16" height="16"></svg>
          Корзина
        </a>
      </li>
      <li>
        <a href ="reg.php">
          <svg width="16" height="16"></svg>
          Регистрация
        </a>
      </li>
      <li>
        <a href=" order.php">
          <svg width="16" height="16"></svg>
          Заказ
        </a>
      </li>
      <li>
        <a href="count.php">
          <svg width="16" height="16"></svg>
          Счетчик посетителей
        </a>
      </li>
      <li>
        <a href="exit.php">
          <svg width="16" height="16"></svg>
          Выход
        </a>
      </li>
    </ul>
    <hr>
  </div>


<b> <small>
</small></b></form></td>
<td colspan="4" align="center" bgcolor="#fadbc8">
<font face="Arial" size="+8"><i><b> Магазин рукодельных товаров "Клубок" </b></i></font></td></tr>
</table>
</td></tr>
<tr><td align="center" bgcolor="#aaaaff" bgcolor=<?php print $color ?>><font face="Arial" size="+2"></td></tr>
</body>
</html>

<html>
<body>
<?php
$title="Welcome!";
$color="#ccccff";
include("header.php"); ?>
<tr><td><br>
<center><h2><font color="black">
Добро пожаловать
наш электронный магазин рукодельных товаров!<br><br>

Здесь представлены ткани и нитки
самых известных российских, турецких, китайских брендов. Любой гость обязательно
найдет себе товар по вкусу! Мы предлагаем большой ассортимент материалов на выбор: хлопок, кашемир, лен, шелк, и соответствующие нитки. Также на сайте представлены различные аксессуары. <br><br>
</font></h2></center>
  <form action="addmessage.php" method="POST" name="form">
    <p class="is-h">Автор:<br> <input name="name" type="text" class="is-input" id="name"></p>
    <p class="is-h">Текст сообщения:<br><textarea name="content" rows="5" cols="50" id="content"></textarea></p><br><br>
    <input name="submit" type="submit" value="Отправить">
  </form>
  <div class="clear">
<br><br>
<center><h3><font color="black">
Контактные данные: Махмудова Ф.В.  fmahmudova@gmail.com 89005002030 <br><br>
</font></h2></center>
</td></tr> <br><br>

  </div>
<?php include("footer.php"); ?>
</body>
</html>
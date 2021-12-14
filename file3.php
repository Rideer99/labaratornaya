<?php
require_once 'connect.php';
?>
<form action="file3.php" method="GET">
Введите данные которые хотите искать из таблицы ( имя приемщика: ) <input type="text" name="NameAvtor"><br>
<input type="submit" name="submit" value="Поиск"><br>
</form>

<?php


if($_GET['submit'])
{
$result=mysqli_query($link,"
SELECT
  priemshiki.nameizdeliya
FROM product
  INNER JOIN priemshiki
    ON product.id_zavod = priemshiki.id_priemshiki
  INNER JOIN proizvodstvo
    ON product.id_zavod = proizvodstvo.id_proizvodstva
WHERE proizvodstvo.dataproizvodtva = '$_GET[NameAvtor]'");
$rows=mysqli_fetch_all($result,MYSQLI_ASSOC);

foreach($rows as $row)
{
	echo 'Производство: ';
	print ($row['nameizdeliya']."<br>");
}
}






?>
<input type="submit" value="назад" onclick="location.href='book_autor.php';" />
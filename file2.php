<?php
require_once 'connect.php';
?>
<form action="file2.php" method="GET">
Введите данные которые хотите искать из таблицы ( имя приемщика: ) <input type="text" name="NameAvtor"><br>
<input type="submit" name="submit" value="Поиск"><br>
</form>

<?php


if($_GET['submit'])
{
$result=mysqli_query($link,"
SELECT
  proizvodstvo.nameizdeliya,
  product.stoimost,
   proizvodstvo.dataproizvodtva
FROM product
  INNER JOIN proizvodstvo
    ON product.id_zavod = proizvodstvo.id_proizvodstva
  INNER JOIN priemshiki
    ON product.id_zavod = priemshiki.id_priemshiki
WHERE priemshiki.priemshik = '$_GET[NameAvtor]'");
$rows=mysqli_fetch_all($result,MYSQLI_ASSOC);

foreach($rows as $row)
{
	
	echo 'Имя изделия: ';
	print ($row['nameizdeliya']."<br>");
	echo 'Стоимость за еденицу: ';
	print ($row['stoimost']."<br>");
	echo 'Дата производства: ';
	print ($row['dataproizvodtva']."<br>");

}
}






?>
<input type="submit" value="назад" onclick="location.href='book_autor.php';" />
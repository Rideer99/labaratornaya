<?php
require_once'connect.php';
?>
Запрос добавления
<form action="file5.php" method="GET">
Введите название изделия:<input type="text" name="NameAvtor"><br>
Введите дату производства:<input type="text" name="NameAvtor2"><br>
Введите кол-во бракованных товаров:<input type="text" name="NameAvtor3"><br>
<input type="submit" name="submit" value="Добавить"><br>
</form>
<?php
if($_GET['submit'])
{
$result=mysqli_query($link,"INSERT HIGH_PRIORITY INTO proizvodstvo(id_proizvodstva,nameizdeliya,dataproizvodtva,kolvobrak)
VALUES (0,'$_GET[NameAvtor]','$_GET[NameAvtor2]','$_GET[NameAvtor3]')");
}
?>

<br><input type="submit" value="Назад" onclick="location.href='book_autor.php';" /></br>
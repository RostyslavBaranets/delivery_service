<?php
session_start();
require ('connect.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Заказы клиента</title>
    <link rel="stylesheet" type="text/css" href="\style\acount.css"> </head>
<body>
<header>
   <img src="\images\logovhod.jpg">
    <a class="a" href="amain.php">Назад</a>
</header>
<form class="block">
    <span class="inf">Имя, фамилия: <?php $sq="SELECT name FROM client WHERE id=".$_GET['id']." ";
        $result=mysqli_query($connection,$sq);
        if($result) {
            while ($row = mysqli_fetch_row($result)) {
                echo "$row[0]";
            }
            mysqli_free_result($result);
        }
        ?></span>
    <span class="inff">Email: <?php $sq="SELECT email FROM client WHERE id=".$_GET['id']." ";
        $result=mysqli_query($connection,$sq);
        if($result) {
            while ($row = mysqli_fetch_row($result)) {
                echo "$row[0]";
            }
            mysqli_free_result($result);
        }
        ?></span>
    <span class="hist">История посылок:</span>
    <div class="hist_block">
        <table>
            <?php $sq="SELECT d.id, d.address1, d.address2, d.distance, d.weight, d.date, t.name, v.name, d.cost
FROM delivery d
inner join view_of_delivery v on d.id_view=v.id
inner join type_of_delivery t on d.id_type=t.id
where d.id_client=".$_GET['id']." ";
            $result=mysqli_query($connection,$sq);
            if($result) {
                $rows = mysqli_num_rows($result);
                echo "<tr><th>№ заказа</th><th>Откуда</th><th>Куда</th><th>Дистанция</th><th>Вес</th><th>Дата</th><th>Тип доставки</th><th>Вид доставки</th><th>Цена</th></tr>";
                for ($i = 0 ; $i < $rows ; ++$i)
                {
                    $row = mysqli_fetch_row($result);
                    echo "<tr>";
                    for ($j = 0 ; $j < 9 ; ++$j) echo "<td>$row[$j]</td>";
                    echo "</tr>";
                }
            }
            ?>
        </table>
    </div>
</form>
</body>
</html>

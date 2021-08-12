<?php
session_start();
require ('connect.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Delivery services</title>
    <link rel="stylesheet" type="text/css" href="style\main.css"> </head>
    <script type="text/javascript" src="scrol.js"></script>
<body>
    <header> <img src="images\logo.jpg" class="logo">
        <?php
        if (isset($_SESSION['id'])){
            echo "<a href=\"acount.php\">Личный кабинет</a>";
            $href="createp.php";
        }else{
            echo "<a href=\"vhod.php\">Войти</a>";
            $href="vhod.php";
        }
        ?>
        <img src="images\Loading%20workman%20carrying%20boxes.jpg" class="img_h">
    </header>

    <a class="create" href="<?php echo $href; ?>">Создать посылку</a>

    <img src="images\pin-symbol-indicates-the-location-of-the-gps-map_68708-398.jpg" class="point_map">
    <a class="pm" href="#sklad">Найти склад</a>
    <img src="images\25498.jpg" class="tarif">
    <a class="tr" href="#tar">Тарифы</a>

    <div id="sklad">
        <table class="spisok">
            <?php $sq="SELECT * FROM department ";
            $result=mysqli_query($connection,$sq);
            if($result) {
                $rows = mysqli_num_rows($result);
                echo "<tr><th>№ отделения</th><th>Город</th><th>адрес</th></tr>";
                for ($i = 0 ; $i < $rows ; ++$i)
                {
                    $row = mysqli_fetch_row($result);
                    echo "<tr>";
                    for ($j = 0 ; $j < 3 ; ++$j) echo "<td>$row[$j]</td>";
                    echo "</tr>";
                }
            }
            ?>
        </table>
    </div>
    <span1 id="tar">Типы доставки</span1>
    <form class="tip" method="post">
        <div class="ss"><span class="tipp">склад-склад</span>
            <?php $sq="SELECT cost FROM type_of_delivery WHERE id='1'";
            $result=mysqli_query($connection,$sq);
            if($result) {
                while ($row = mysqli_fetch_row($result)) {
                    echo "$row[0]";
                }
                mysqli_free_result($result);
            }
            ?>
        </div>
        <div class="sd"><span class="tipp">скдал-двери</span>
            <?php $sq="SELECT cost FROM type_of_delivery WHERE id='2'";
            $result=mysqli_query($connection,$sq);
            if($result) {
                while ($row = mysqli_fetch_row($result)) {
                    echo "$row[0]";
                }
                mysqli_free_result($result);
            }
            ?>
        </div>
        <div class="ds"><span class="tipp">двери-склад</span>
            <?php $sq="SELECT cost FROM type_of_delivery WHERE id='3'";
            $result=mysqli_query($connection,$sq);
            if($result) {
                while ($row = mysqli_fetch_row($result)) {
                    echo "$row[0]";
                }
                mysqli_free_result($result);
            }
            ?>
        </div>
        <div class="dd"><span class="tipp">двери-двери</span>
            <?php $sq="SELECT cost FROM type_of_delivery WHERE id='4'";
            $result=mysqli_query($connection,$sq);
            if($result) {
                while ($row = mysqli_fetch_row($result)) {
                    echo "$row[0]";
                }
                mysqli_free_result($result);
            }
            ?>
        </div>
    </form>
    <span2>Виды доставки</span2>
    <?php
    $query ="SELECT v.name, p.cost 
FROM price_of_view p 
inner join view_of_delivery v on p.id_view=v.id
where p.weight_max=20
";

    $result = mysqli_query($connection, $query);
    if($result)
    {
    $rows = mysqli_num_rows($result);

    echo "<table><tr><th>Тарифы</th><th>0 - 20 кг</th></tr>";
        for ($i = 0 ; $i < 4 ; ++$i) {
            $row = mysqli_fetch_row($result);
            echo "<tr>";
            for ($j = 0 ; $j < 2 ; ++$j){
                echo "<td>$row[$j]</td>";
            }

            echo "</tr>";
        }
        mysqli_free_result($result);
        $query ="SELECT v.name, p.cost 
FROM price_of_view p 
inner join view_of_delivery v on p.id_view=v.id
where p.weight_max=200";
        $result = mysqli_query($connection, $query);
        $rows = mysqli_num_rows($result);
        echo "<tr><th>Тарифы</th><th>20 - 200 кг</th></tr>";
        for ($i = 0 ; $i < 4 ; ++$i) {
            $row = mysqli_fetch_row($result);
            echo "<tr>";
            for ($j = 0 ; $j < 2 ; ++$j){
                echo "<td>$row[$j]</td>";
            }

            echo "</tr>";
        }

        mysqli_free_result($result);
        $query ="SELECT v.name, p.cost 
FROM price_of_view p 
inner join view_of_delivery v on p.id_view=v.id
where p.weight_max=1000";
        $result = mysqli_query($connection, $query);
        $rows = mysqli_num_rows($result);
        echo "<tr><th>Тарифы</th><th>200 - 1000 кг</th></tr>";
        for ($i = 0 ; $i < 4 ; ++$i) {
            $row = mysqli_fetch_row($result);
            echo "<tr>";
            for ($j = 0 ; $j < 2 ; ++$j){
                echo "<td>$row[$j]</td>";
            }

            echo "</tr>";
        }
        echo "</table>";
    }

    ?>

    <footer>
        <span3>©2021”Delivery service”</span3>
        <span4>Все права защищены.</span4>
        <span5>Контакт-центр
            <br>+38 (XXX) XXX XX XX</span5>
    </footer>
</body>

</html>

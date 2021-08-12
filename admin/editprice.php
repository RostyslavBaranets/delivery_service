<?php
session_start();
require ('connect.php');
$sq="SELECT p.id, v.name, p.weight_min , p.weight_max, p.cost 
FROM price_of_view p 
inner join view_of_delivery v on p.id_view=v.id
WHERE p.id=".$_GET['id']." ";
$result=mysqli_query($connection,$sq);
if($result) {
    while ($row = mysqli_fetch_row($result)) {
        $id=$row['0'];
        $name=$row['1'];
        $weight_min=$row['2'];
        $weight_max=$row['3'];
        $cost=$row['4'];
    }
    mysqli_free_result($result);
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form method="post">
    Номер<br>
    <input name="id" value="<?echo $id;?> " disabled><br>
    Название<br>
    <input name="name" value="<?echo $name;?>" disabled><br>
    Минимальный вес<br>
    <input name="weight_min" value="<?echo $weight_min;?>" disabled><br><br>
    Максимальный вес<br>
    <input name="weight_max" value="<?echo $weight_max;?>" disabled><br><br>
    Цена<br>
    <input name="cost" value="<?echo $cost;?>"><br><br>
    <input type="submit" value="Сохранить" name="button"><br>
</form>
<a href='amain.php'> назад</a>
<?php
if (isset($_POST['button'])){
    if (isset($_POST['cost'])){
        $cost=$_POST['cost'];
        $sq="UPDATE price_of_view SET cost='$cost' WHERE id='$id' ";
        $result=mysqli_query($connection,$sq);
        if (mysqli_affected_rows($connection)>0){
            echo "Успешно сохраненно<br>";
        }
        else{
            echo "Ошибка<br>";
        }
    }
}
?>
</body>
</html>
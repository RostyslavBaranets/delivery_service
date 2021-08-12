<?php
session_start();
require ('connect.php');
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
    ID<br>
    <input name="id"><br>
    Город<br>
    <input name="city" ><br>
    Адрес<br>
    <input name="address"><br><br>
    <input type="submit" value="Сохранить" name="button"><br>
</form>
<a href='amain.php'> назад</a>
<?php
    if (isset($_POST['id']) && isset($_POST['city']) && isset($_POST['address'])){
        $id=$_POST['id'];
        $city=$_POST['city'];
        $address=$_POST['address'];
        $sq="INSERT INTO department ( id, city, address) VALUES ('$id','$city','$address')";
        $result=mysqli_query($connection,$sq);
        if (mysqli_affected_rows($connection)>0){
            echo "Успешно сохраненно<br>";
        }
        else{
            echo "Ошибка<br>";
        }
    }
?>
</body>
</html>

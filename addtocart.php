<?php
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    include("dbconnect.php");

    $id = $_POST["id"];

$result = mysqli_query($link,"SELECT * FROM `корзина` WHERE `корзина`.`cart_ip`= '{$_SERVER['REMOTE_ADDR']}' AND `корзина`.`Код корзины` = '$id'");
        if (mysqli_num_rows($result) > 0)
        {
            $row = mysqli_fetch_array($result);
            $new_count = $row["Количество"] + 1;
            $update = mysqli_query($link,"UPDATE `корзина` SET `корзина`.`Количество`= '$new_count' WHERE `cart_ip`='{$_SERVER['REMOTE_ADDR']}' AND `корзина`.`Код товара` = '$id'");
        }
        else{
            $result = mysqli_query($link,"SELECT * FROM `товары` WHERE `Код т`='$id'");
            $row = mysqli_fetch_array($result);
            mysqli_query($link,"INSERT INTO `корзина`(`Код товара`, `Общая цена`, `cart_ip`) 
            VALUES ('".$row['Код т']."', '".$row['Цена']."', '".$_SERVER['REMOTE_ADDR']."')");
        }
}
?>
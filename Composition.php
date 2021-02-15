<?php 
include("dbconnect.php");

$sorting = $_GET["sort"];

switch ($sorting)
{
    case 'price-asc';
    $sorting = 'Цена ASC';
    $sort_name = 'От дешёвых к дорогим';
    break;

    case 'price-desc';
    $sorting = 'Цена DESC';
    $sort_name = 'От дорогих к дешёвым';
    break;

    default:
    $sorting = '`Код т` ASC';
    $sort_name = 'Без сортировки';
    break;
}
?>

<!DOCTYPE html>
<html lang="ru_BY">
<head>
<meta http-equiv="Content-Type" content = "text/html; charset = utf-8">
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.cookie.min.js"></script>
<script type="text/javascript" src="/trackbar/jquery.trackbar.js"></script>
<script src="js/shop-script.js"></script>
<link rel="stylesheet" href="trackbar/trackbar.css">
<link rel="stylesheet" href="style.css">
<link href="https://fonts.googleapis.com/css?family=Bad+Script|Montserrat&display=swap&subset=cyrillic" rel="stylesheet">
<title>Композиции</title>

</head>
<body>
    <br>
    <div class="div2"><img src="img/logo.png" alt="Логотип"></div> 
    <div class="container div1">
        <ul>
            <li>
            <a href="index.html" class="a1">Главная</a>
            <a href="Bouquets.php" class="a1" >Букеты</a>
            <a href="Composition.php" class="a1">Композиции</a>
            <a href="Hatboxes.php" class="a1">Шляпные коробки</a>
            <a href="about.html" class="a1">О нас</a>
            <a href="autorization.php" class="a1">Вход</a>
            <a href="cart.php?action=oneclick" class="a1">Корзина</a></li>
        </ul>
    </div>



<div class="w">

<div class="container2">
<div class="block_search">
            <div class="search">
                <form  method="GET" action="search.php?q=">
                <p class="header-title">Категории</p>
                
                    <span></span>
                <input type="text" id="input-search" name="q" placeholder="Поиск">
                <input type="submit" name="" id="button-search" value="Поиск">
                </form>
            </div>

    <div class="categories">
        <ul id="options-list">
            <li>Сортировка:</li>
            <br>
            <li><a id="select-sort"><?php echo $sort_name; ?></a></li>
        <ul class="sorting-list">
            <li><a href="Composition.php?sort=none">Без сортировки</a></li>
            <li><a href="Composition.php?sort=price-asc">От дешёвых к дорогим</a></li>
            <li><a href="Composition.php?sort=price-desc">От дорогих к дешёвым</a></li>
        </ul>
        </ul>
    </div>

        <?php
        include("block-parametr.php");
        ?>


    </div>
<div class="pagination">
<?php

if (isset($_GET['page']))
{
    $page = $_GET['page'];
}
else
{
    $page = 1;
}

$limit = 9;
$number = ($page * $limit) - $limit;
$res_count = mysqli_query($link, "SELECT COUNT(*) FROM `товары` WHERE `Код категории`='2' ORDER BY  $sorting");
$row = mysqli_fetch_row($res_count);
$total = $row[0];
$str_page = ceil($total / $limit);

for ($i = 1; $i <= $str_page; $i++)
{
    echo '
    <ul class="hr">
    <li>
    <a href = Composition.php?page='.$i.'>'.$i.'</a>
    </li>
    </ul>';
}
?>

</div>
<ul class="block_tovari_grid">
<?php
// Запрос и вывод записей
$result = mysqli_query($link,"SELECT * FROM `товары` WHERE `Код категории`='2' ORDER BY  $sorting LIMIT $number, $limit");
$myrow = mysqli_fetch_array($result);
echo "<br><br>";
do
{

    if ($myrow["Фото"] !="" && file_exists ("img/".$myrow["Фото"]))
    {
        $img_path='img/'.$myrow["Фото"];
        $max_width = 300;
        $max_height = 330;
        list($width, $height) = getimagesize($img_path);
        $ratioh = $max_height/$height;
        $ratiow = $max_width/$width;
        $ratio = min($ratioh, $ratiow);
        $width = intval($ratio*$width);
        $height = intval($ratio*$height);
    }
    else{
        $img_path="img/no-image.jpg";
        $width = 300;
        $height = 330;
    }

    echo '
        <li>
        <p class="style_title_grid">'.$myrow["Название"].'</p>
        <div class="block_images_grid">
        <img src="'.$img_path.'" width="'.$width.'" height="'.$height.'""/>
        </div>
        <div class="opisanie">'.$myrow["Описание"].'</div>
        <div class="arr">
        <p>'.$myrow["Цена"].' руб </p>
        <div class="arrr">
        <a class="add-cart-style-list" tid="'.$myrow["Код т"].'"></a>
        <div>
        </li>';

}
while($myrow=mysqli_fetch_array($result));


?>
</ul>
</div>
</div>

<footer>
<div class="footer">

<div class="container_footer">

    <div class="row">
<div class="col">
<address><p class="footer_name">"Цветочный дом"<br><br>
Разработка сайта: &copy;bylittlefoxjoelle&hearts;</p></address>
</div>

<div class="col1" >
    Наши профили в социальных сетях:
    <p></p>
    <a href="https://vk.com/lfoxjoelle" target="_blank"><img src="img/icons8-вконтакте-45.png" alt=""></a>
    <a href="https://www.instagram.com/littlefoxjoelle/" target="_blank"><img src="img/icons8-instagram-45.png" alt=""></a>

</div>
    </div>

</div>


</div>

</footer>

</body>
</html>
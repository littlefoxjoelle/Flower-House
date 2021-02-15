<?php 
    session_start();
    ob_start();
    include("dbconnect.php");

    if ($_SESSION['user'])
    {
        header('Location: profile.php');
        ob_end_flush();
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
<link rel="stylesheet" href="registrationcss.css">
<link href="https://fonts.googleapis.com/css?family=Bad+Script|Montserrat&display=swap&subset=cyrillic" rel="stylesheet">
<title>Вход</title>

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

<div class="autorization">
    <form method="post" action="autoriz.php">
    <div class="block-form-autorization">
    <h2 class="h2-titlea">Вход</h2>
    <ul id="form-autorization">
        <li><label for="" class="l_l">Логин</label>
        <input type="text" name="auth_login" id="auth_login"></li>
        <li><label for="" class="l_p">Пароль</label>
        <input type="password" id="auth_pass" name="auth_pass"><span id="button-pass-show-hide" class="pass-show"></span></li>

    </ul>
<?php 
if ($_SESSION['msg3'])
{
    echo '<p class="message3">'.$_SESSION['msg3'].'</p>';
}
unset($_SESSION['msg3']);
?>
<?php 
if ($_SESSION['msg4'])
{
    echo '<p class="message4">'.$_SESSION['msg4'].'</p>';
}
unset($_SESSION['msg4']);
?>
    <p align="right"><input type="submit" name="reg_submit" id="form_submit2" value="Вход"></p>
    <p class="p12">У вас нет аккаунта? - <a href="registration.php" class="reg">Зарегистрируйтесь</a>!</p>
    </div>

    </form>


</div>


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
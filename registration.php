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
<script src="/js/jquery.maskedinput.min.js"></script>
<script src="js/shop-script.js"></script>
<link rel="stylesheet" href="trackbar/trackbar.css">
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="registrationcss.css">
<link href="https://fonts.googleapis.com/css?family=Bad+Script|Montserrat&display=swap&subset=cyrillic" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Comfortaa|Kaushan+Script|Montserrat|Neucha&display=swap" rel="stylesheet">
<title>Регистрация</title>

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

<div class="registration">
    

    <form method="post" id="form_reg" action="reg.php" enctype="multipart/form-data">

    <div class="block-form-registration">
    <h2 class="h2-title">Регистрация</h2>
    <ul id="form-registration">
        <li><label for="">Логин</label><input type="text" name="reg_login" id="reg_login"><span class="star">*</span></li>
        <li><label for="">Пароль</label><input type="text" name="reg_pass" id="reg_pass"><span class="star">*</span></li>
        <li><label for="">Подтвердите пароль</label><input type="text" name="reg_podt_pass" id="reg_pass"><span class="star">*</span>
<?php 
if ($_SESSION['msg'])
{
    echo '<span class="message">'.$_SESSION['msg'].'</span>';
}
unset($_SESSION['msg']);
?>

</li>
        <li><label for="">Фамилия</label><input type="text" name="reg_surname" id="reg_surname"><span class="star">*</span></li>
        <li><label for="">Имя</label><input type="text" name="reg_name" id="reg_name"><span class="star">*</span></li>
        <li><label for="">Отчество</label><input type="text" name="reg_patronymic" id="reg_patronymic"><span class="star">*</span></li>
        <li><label for="">E-mail</label><input type="text" name="reg_email" id="reg_email"><span class="star">*</span></li>
        <li><label for="">Телефон</label><input type="text" name="reg_phone" id="reg_phone">
        <script>
        $(function(){
            $("#reg_phone").mask("+375(99) 999-99-99");
        });
        </script>
    <span class="star">*</span></li>
        <li><label for="">Адрес доставки</label><input type="text" name="reg_adress" id="reg_adress"><span class="star">*</span></li>
        <li><label for="">Фото профиля</label><input type="file" name="reg_photo" id="reg_photo">
        <?php 
if ($_SESSION['msg2'])
{
    echo '<p class="message2">'.$_SESSION['msg2'].'</p>';
}
unset($_SESSION['msg2']);
?>
    </ul>
    <p align="right"><input type="submit" name="reg_submit" id="form_submit" value="Регистрация"><a href="handler_reg.php"></a></p>
    <p class="p13">У вас уже есть аккаунт? - <a href="autorization.php" class="reg">Авторизируйтесь</a>!</p>
    
</div>
    
    </form>


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
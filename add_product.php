<?php
session_start();
ob_start();

if ($_SESSION['auth_admin'] == "yes_auth")
{
    if (isset($_GET["logout"]))
    {
        unset($_SESSION['auth_admin']);
        header("Location: autorizationadmin.php");
        ob_end_flush();
    }
    $_SESSION['urlpage'] = "<a href='adminpanel.php'>Главная</a> / <a href='tovar.php'>Товары</a> / <a>Добавление товара</a>";
    include("dbconnect.php");

    if ($_POST["submit_add"])
    {
      $error = array();
        
       if (!$_POST["form_title"])
      {
         $error[] = "Укажите название товара";
      }

      
       if (!$_POST["form_price"])
      {
         $error[] = "Укажите цену товара";
      }


      if (!$_POST["form_category"])
      {
         $error[] = "Укажите категорию товара";         
      }else
      {
       	$result = mysqli_query($link, "SELECT * FROM `категории` WHERE `Код категории`='{$_POST["form_category"]}'");
        $row = mysqli_fetch_array($result);
        $selectbrand = $row["Наименование"];
      }
            
      if ($_POST["chk_visible"])
      {
         $chk_visible = "0";
      }else { $chk_visible = "1"; }
     
      if (count($error))
      {           
           $_SESSION['message'] = "<p id='form-error'>".implode('<br />',$error)."</p>";
           
      }else
      {                    
        mysqli_query($link, "INSERT INTO `товары` (`Код категории`, `Название`, `Цена`, `Описание`, `Видимость`)
        VALUES('".$_POST["form_category"]."','".$_POST["form_title"]."','".$_POST["form_price"]."','".$_POST["txt1"]."','".$chk_visible."')");
                  
     $_SESSION['message'] = "<p id='form-success'>Товар успешно добавлен!</p>";
     $posts = mysqli_query($link, "SELECT max(`Код т`) AS max FROM товары");
     $id = mysqli_fetch_array($posts,MYSQLI_ASSOC);
      
      if (empty($_POST["upload_image"]))
     {        
        include("upload-image.php");
        unset($_POST["upload_image"]);           
     } 
    }
}
    else 
    {
    $msgerror = 'Ошибка при добавлении товара'; 
    }            
   
?> 
<!DOCTYPE html>
<html lang="ru_BY">
<head>
<meta http-equiv="Content-Type" content = "text/html; charset = utf-8">
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.cookie.min.js"></script>
<script type="text/javascript" src="js/script2.js"></script>
<script type="text/javascript" src="jquery_confirm/jquery_confirm.js"></script>
<link rel="stylesheet" href="adminpanel.css">
<link rel="stylesheet" href="jquery_confirm/jquery_confirm.css">
<link href="https://fonts.googleapis.com/css?family=Comfortaa|Kaushan+Script|Montserrat|Neucha&display=swap" rel="stylesheet">
<title>Добавление товара</title>

</head>
<body>
<div class="block-body">
<?php
    include("block-header.php");
?> 
<div class="block-content">
   <div class="block-info2">
        <p id="count-style2">Добавление товара</p>   
    </div>

<?php
    if (isset($_SESSION['message']))
    {
        echo $_SESSION['message'];
        unset ($_SESSION['message']);
    }
?>
<form enctype="multipart/form-data" method="POST">
<ul id="edit-tovar">

<li>
<label>Название товара</label>
<input type="text" name="form_title">
</li>

<li>
<label>Цена</label>
<input type="text" name="form_price">
</li>

<li>
<label>Тип товара</label>
<select name="form_type" id="type" size="3" >
<option value="Цветы">Букет</option>
<option value="Цветы">Композиция</option>
<option value="Цветы">Шляпная коробка</option>
</select>
</li>

<li>
<label>Категория</label>
<select name="form_category" size="3" >

<?php
$category = mysqli_query($link, "SELECT * FROM `категории`");
    
if (mysqli_num_rows($category) > 0)
{
$result_category = mysqli_fetch_array($category);
do
{
  
  echo '
  
  <option value="'.$result_category["Код категории"].'" >'.$result_category["Наименование"].'</option>
  
  ';
    
}
 while ($result_category = mysqli_fetch_array($category));
}
?> 

</select>
</ul> 
<label class="stylelabel">Фото</label>

<div id="baseimg-upload">
<input type="hidden" name="MAX_FILE_SIZE" value="5000000">
<input type="file" name="upload_image">
</div>

<h3 class="h3click">Описание</h3>
<div class="div-editor1">
<textarea id="editor1" name="txt1" cols="100" rows="20"></textarea>

 </div>       



    <p align="right" ><input type="submit" id="submit_form" name="submit_add" value="Добавить"></p>     
</form>


</div>
</div>


</body>
</html>
<?php
    }
    else{
        header("Location: autorizationadmin.php");
        ob_end_flush();  
    }
?> 
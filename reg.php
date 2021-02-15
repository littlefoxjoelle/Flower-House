<?php  
        session_start();
        ob_start();
        require_once 'dbconnect.php';
        $login = $_POST['reg_login'];
        $password = $_POST['reg_pass'];
        $password_podtv = $_POST['reg_podt_pass'];
        $surname = $_POST['reg_surname'];
        $name = $_POST['reg_name'];
        $patronymic = $_POST['reg_patronymic'];
        $email = $_POST['reg_email'];
        $phone = $_POST['reg_phone'];
        $adress = $_POST['reg_adress'];   

        if ($password === $password_podtv)
        {
            //$_FILES['reg_photo']['name']
            $path = 'uploads/'.time().$_FILES['reg_photo']['name'];
            if (!move_uploaded_file($_FILES['reg_photo']['tmp_name'], $path))
            {
                $_SESSION['msg'] = 'Ошибка при загрузке фото';
                header('Location: registration.php');
                ob_end_flush();
            }

            $password = md5($password);
            $ip = $_SERVER['REMOTE_ADDR'];

            mysqli_query($link, "INSERT INTO `клиенты` (`Логин`, `Пароль`, `Фамилия`, `Имя`, `Отчество`, `Email`, `Телефон`, `Адрес доставки`, `Фото`, `ip`) 
            VALUES ('$login', '$password', '$surname', '$name', '$patronymic', '$email', '$phone', '$adress', '$path', '$ip')");
            $_SESSION['msg2'] = 'Регистрация прошла успешно!';
            header('Location: registration.php');
            ob_end_flush();

        }
        else
        {
            $_SESSION['msg'] = 'Пароли не совпадают';
            header('Location: registration.php');
            ob_end_flush();
        }
?>



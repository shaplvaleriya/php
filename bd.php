<?php
    $host = "localhost"; // адрес сервера
    $database = "artbook"; // имя базы данных
    $user = "mysql"; // имя пользователя
    $user_password = "mysql"; // пароль
    $link = mysqli_connect($host, $user, $user_password, $database) or die("Ошибка " . mysqli_error($link));
    
    // изменение набора символов на cp1251
    // if (!mysqli_set_charset($link, "cp1251"))
    // {
    //     echo "Ошибка при загрузке набора символов cp1251";
    //     mysqli_error($link);
    //     exit();
    // }
?>

<?php
if (session_id()=='');
    session_start();
    if (isset($_POST['name'])) { $login = $_POST['name']; if ($login == '') { unset($login);} } //заносим введенный пользователем логин в переменную $login, если он пустой, то уничтожаем переменную
    if (isset($_POST['email'])) { $email=$_POST['email']; if ($email =='') { unset($email);} }

    if (isset($_POST['password'])) { $password=$_POST['password']; if ($password =='') { unset($password);} }

    if (isset($_POST['confirm_password'])) { $confirm_password=$_POST['confirm_password']; if ($confirm_password =='') { unset($cinfirm_password);} }




if ($password==$confirm_password) {
     //если логин и пароль введены, то обрабатываем их, чтобы теги и скрипты не работали, мало ли что люди могут ввести
        $login = stripslashes($login);
        $login = htmlspecialchars($login);
        $password = stripslashes($password);
        $password = htmlspecialchars($password);
        //удаляем лишние пробелы
        $login = trim($login);
        $password = trim($password);


    include ('../bd.php');

    $query ="SELECT id FROM user WHERE name='$login'";
    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
    $row = mysqli_fetch_row($result);
        if (!empty($row[0]))
        {
            echo "<script>alert('Такой логин уже существует');</script>";
        }
        else
        {
            
            $query ="INSERT INTO user (name, password, email, active) VALUES('$login','$password', '$email', 0)";
            $result2 = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));




            // $Code=base64_decode($email);
            // mail($email, 'регистрация', 'Ссылка: http://localhost:81/register/activate/code'.substr($Code, 5).substr($Code, 0, -5), 'From bla bla');





            $query1 ="SELECT `id`, `name`, `email` FROM user WHERE `name`='$login'";
             $result3 = mysqli_query($link, $query1) or die("Ошибка " . mysqli_error($link));
           
        // Проверяем, есть ли ошибки
        if ($result3)
        {             
              $row = mysqli_fetch_row($result3);
            $_SESSION['login']=$row[1];
            $_SESSION['email']=$row[2];
            $_SESSION['id']=$row[0];

            include('result_auth.php');
        }
        else {
            echo "<p><a href=\"reg.html\" target=\"CONTENT\">НАЗАД</a></p>";
            exit ("Ошибка! Вы не зарегистрированы.");
        }
        }
}
else{
     echo "<script>alert('пароли не совпадают');</script>";
}

?>

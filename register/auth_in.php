<?php
if (session_id()=='');
    session_start();
if (isset($_POST['name'])) { $login = $_POST['name']; if ($login == '') { unset($login);} } //заносим введенный пользователем логин в переменную $login, если он пустой, то уничтожаем переменную
    if (isset($_POST['password'])) { $password=$_POST['password']; if ($password =='') { unset($password);} }
    //заносим введенный пользователем пароль в переменную $password, если он пустой, то уничтожаем переменную
if (empty($login) or empty($password)) //если пользователь не ввел логин или пароль, то выдаем ошибку и останавливаем скрипт
{
    echo "<p><a href=\"auth.html\" target=\"REG-AUTH\">НАЗАД</a></p>";
    exit ("Вы ввели не всю информацию, вернитесь назад и заполните все поля!");
}
    //если логин и пароль введены,то обрабатываем их, чтобы теги и скрипты не работали, мало ли что люди могут ввести
    $login = stripslashes($login);
    $login = htmlspecialchars($login);
    $password = stripslashes($password);
    $password = htmlspecialchars($password);
    //удаляем лишние пробелы
    $login = trim($login);
    $password = trim($password);
   
    include ("../bd.php");

    $query ="SELECT * FROM user WHERE name='$login'";
    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
    $row = mysqli_fetch_row($result);


    if (empty($row[0]))
    {
        mysqli_close($link);
        echo "<p><a href=\"auth.html\" target=\"REG-AUTH\">НАЗАД</a></p>";
        exit ("Извините, введённый вами login неверный");
    }
   else {
        if ($row[3]==$password) {

            $_SESSION['login']=$row[1];
            $_SESSION['email']=$row[2];
            $_SESSION['id']=$row[0];
            include ('result_auth.php');

        }
         else {
            echo "<p><a href=\"auth.html\" target=\"REG-AUTH\">НАЗАД</a></p>";
            mysqli_close($link);
            exit ("Извините, введённый вами пароль неверный.");
        }
    }
?>


<?php
if (session_id()=='');
        session_start();
if ($_SESSION['login']!="") {
    include("../menu1.php");
}
else{
include("../menu.html");
}
?>
<?php
     include("../bd.php");
 ?> 
<!DOCTYPE html>
<html lang="en" class="no-js">
  <head>
    <meta charset="UTF-8" />
    <title>ArtBook</title>
    <link rel="stylesheet" type="text/css" href="post.css" />
    <link rel="stylesheet" type="text/css" href="../css/base1.css" />
  </head>
  <body class="loading">
    <svg class="hidden">
      <symbol id="icon-menu" viewBox="0 0 119 25">
        <title>menu</title>
        <path d="M36,8 L36,0 L100,0 L100,8 L36,8 Z M0,8 L0,0 L24,0 L24,8 L0,8 Z M0,28 L0,20 L71,20 L71,28 L0,28 Z"/>
      </symbol>
      <symbol id="icon-close" viewBox="0 0 24 24">
        <title>close</title>
        <path d="M24 1.485L22.515 0 12 10.515 1.485 0 0 1.485 10.515 12 0 22.515 1.485 24 12 13.484 22.515 24 24 22.515 13.484 12z"/>
      </symbol>
    </svg>
<div class="first_block" id="first_block">
  <div class="title" id="title_one">
    <p>Art BOOK</p>
  </div>
</div>

<div class="section second_block">
  dfghj
<?php 
  $url = $_SERVER['REQUEST_URI'];
  $url = explode('?', $url); 
  $url=$url[1];
  // var_dump($url);

      $nm="SELECT `id`, `name`, `hard`, `category`, `object`, `photo`, `likes`, `information`, `date` FROM `post` WHERE `id`='$url'";
      $result1 = mysqli_query($link, $nm) or die("Ошибка " . mysqli_error($link));
                 
      if($result1) //проверяем, получены ли данные из БД
        {   
            $row = mysqli_fetch_row($result1);
            echo "<br>";
            echo $row[0];
            echo "<br>";
            echo $row[1];
            echo "<br>";
            echo $row[2];
            echo "<br>";
            echo $row[3];
            echo "<br>";
            echo $row[4];
            echo "<br>";
            echo $row[5];
            echo "<br>";
            echo $row[6];
            echo "<br>";
            echo $row[7];
            echo "<br>";
            echo $row[8];
            echo "<br>";
if (isset($_POST['marker'])) {
$k= $_SESSION['id'];
    $query ="INSERT INTO postmark (id_user, id_post) VALUES('$k','$url')";
    $result2 = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
        }

if (isset($_POST['likes'])) {
$k= $_SESSION['id'];
  $query_like = "INSERT INTO `likes`(`post_id`, `user_id`) VALUES ('$url', '$k')";
  $query_not_like = "DELETE FROM `likes` WHERE `post_id` = '$url' AND `user_id` = '$k'";
  mysqli_query($link, $query_like) or mysqli_query($link, $query_not_like);
}
  $query ="SELECT * FROM likes WHERE post_id='$url'";
   $res = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
   $rows = mysqli_num_rows($res);
  echo "<div>";
  echo $rows;
  echo "</div>";
        }
?>
<form action="" method="post">
<input type="submit" name="marker" value="Добавить в закладки"/>
<input type="submit" name="likes" value="Лайк"/>
</form>
</div>
<div class="last_block section">
  <div class="title">
    <p>Комментарии</p>
  </div>
</div>

    <script src="libs/jquery-1.11.2.min.js"></script>
    <script src="../js/common.js"></script>
    <script src="../js/imagesloaded.pkgd.min.js"></script>
    <script src="../js/TweenMax.min.js"></script>
    <script src="../js/demo.js"></script>
    <script src="../js/chek.js"></script>
  </body>
</html>
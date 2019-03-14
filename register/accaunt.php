<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
		<meta charset="UTF-8" />
		<title>ArtBook</title>
		<link rel="stylesheet" type="text/css" href="../css/base1.css" />
		<link rel="stylesheet" type="text/css" href="accaunt.css" />
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
	<div class="acc">
		<div class="photo">
		</div>
		<?php
		if (session_id()=='')
		session_start();	
		echo "<div class='login'>";
		echo $_SESSION['login'];
		echo "</div>";
		echo "<div class='email'>";
		echo "<br>";
		echo $_SESSION['email'];
		echo "</div>";
		?>
		<div class="zacladki">
			<a href="../marker/postmarker.php">Посмотреть закладки</a>
		</div>
		<?php

    if ($_SESSION['login']=="")
    {
    	echo "<div class='out'>";
        echo "<center><a href=\"auth_in.html\" target=\"REG-AUTH\">Войти</a>&emsp;";
        echo "</div>";
    }
    else
    {
    	echo "<div class='out'>";
        echo "<center><a href=\"auth_out.php\" target=\"REG-AUTH\">Выйти</a>&emsp;";
        echo "</div>";
    }
?>
	</div>

		<script src="../js/imagesloaded.pkgd.min.js"></script>
		<script src="../js/TweenMax.min.js"></script>
		<script src="../js/demo.js"></script>
		<script src="../js/chek.js"></script>
	</body>
</html>

	<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
		<meta charset="UTF-8" />
		<title>ArtBook</title>
		<link rel="stylesheet" type="text/css" href="../css/base1.css" />
	</head>
	<nav class="menu">
				<div class="menu__item menu__item--1" data-direction="bt">
					<div class="menu__item-inner">
						<div class="mainmenu">
							<a href="../lessons_art/lessons_art.php" class="mainmenu__item">Уроки рисования</a>
							<a href="#" class="mainmenu__item">форум</a>
							<a href="#" class="mainmenu__item">поиск</a>
						</div>
					</div>
				</div>
				<div class="menu__item menu__item--2" data-direction="lr">
					<div class="menu__item-inner">
						<div class="menu__item-map"></div>
						<a href="#" class="menu__item-hoverlink">О блоге</a>
					</div>
				</div>
				<div class="menu__item menu__item--3" data-direction="bt">
					<div class="menu__item-inner">
						<div class="sidemenu">
							<span class="sidemenu__item-inner" style="text-transform: uppercase;letter-spacing: 0.15rem;font-size: 0.85rem;">Как нарисовать:</span>
							<a href="#" class="sidemenu__item"><span class="sidemenu__item-inner">Человека</span></a>
							<a href="#" class="sidemenu__item"><span class="sidemenu__item-inner">Волосы</span></a>
							<a href="#" class="sidemenu__item"><span class="sidemenu__item-inner">Цветы</span></a>
							<a href="#" class="sidemenu__item"><span class="sidemenu__item-inner">Аниме</span></a>
							<a href="#" class="sidemenu__item"><span class="sidemenu__item-inner">Губы</span></a>
							<a href="#" class="sidemenu__item"><span class="sidemenu__item-inner">Нос </span></a>
							<a href="#" class="sidemenu__item"><span class="sidemenu__item-inner">...</span></a>
						</div>
					</div>
				</div>
				<?php
				if (session_id()=='');
        		session_start();
				echo"	<div class='menu__item menu__item--4' data-direction='rl'>";
				echo"	<div class='menu__item-inner'>";
				echo"	<a href='../register/result_auth.php' class='menu__item-link'>", $_SESSION['login'], "</a>";
				echo"	</div>";
				echo"</div>";
				?>
				<div class="menu__item menu__item--5" data-direction="tb">
					<div class="menu__item-inner">
						<p class="quote">Art is an effort to create, beside the real world, a more human world.</p>
					</div>
				</div>
				<button class="action action--menu"><svg class="icon icon--menu"><use xlink:href="#icon-menu"></use></svg></button>
				<button class="action action--close"><svg class="icon icon--close"><use xlink:href="#icon-close"></use></svg></button>
			</nav>
		<script src="../js/imagesloaded.pkgd.min.js"></script>
		<script src="../js/TweenMax.min.js"></script>
		<script src="../js/demo.js"></script>
	</body>
</html>

<?php
if (session_id()=='') {
session_start();
}
if ($_SESSION['login']!="") {
	include("../menu1.php");
}
else{
	include("../menu.html");
}
?>
<?php 
include("accaunt.php"); ?>
<?php 
include("../bd.php"); ?>
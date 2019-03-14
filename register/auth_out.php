<?php
if (session_id()=='');
        session_start();

     $_SESSION['login']="";
     $_SESSION['surname']="";
     $_SESSION['first_name']="";
     $_SESSION['second_name']="";
     $_SESSION['id']="";
?>
<?php
include("reg.php");
?>
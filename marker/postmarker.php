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
     include("postmarker.html");
 ?>
 <?php
     include("../bd.php");
 ?> 
 <?php
 $i=$_SESSION['id'];
 $z= "SELECT `id_post` from `postmark` WHERE `id_user`='$i'";
$result = mysqli_query($link, $z) or die("Ошибка " . mysqli_error($link));
 $rows = mysqli_num_rows($result); 

for ($i=0; $i < $rows; $i++) { 
	 $row = mysqli_fetch_row($result);
     $l=$row[0];
  			$nm="SELECT `name`, `date`, `category`, `object`, `photo`, `id`, `hard` FROM `post` WHERE `id`='$l'";
            $result1 = mysqli_query($link, $nm) or die("Ошибка " . mysqli_error($link));
             $row1 = mysqli_fetch_row($result1);
               echo "<div class='post' style='border:none;'>";
                    echo "<div class'phhoto'>";
                    echo $row1[4];
                    echo "</div>";
                    echo "<p class='category'>";
                    echo $row1[2], " ", $row1[3];
                    echo "</p>"; 
                    echo "<p class='name'>";
                    echo "<a  href=/post/post.php?".$row1[5].">";
                    echo $row1[0];
                    echo "</a>";
                    echo "</p>";
                        echo "<div class='star'>";
                    for ($j=0; $j < $row1[6] ; $j++) { 
                            echo "<img src='../img/star.png'>";  
                    }
                        echo "</div>";  
                    echo "<p class='date'>";
                    echo $row1[1];
                    echo "</p>";
                echo "</div>";  
}
          
?>
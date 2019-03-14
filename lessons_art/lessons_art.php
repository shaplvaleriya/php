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
     include("lessons_art.html");
 ?> 


 <?php
     include("../bd.php");
 ?> 

<?php
    $aArt = $_POST['art'];
        if (empty($aArt)) {
            $nm="SELECT `name`, `date`, `category`, `object`, `photo`, `id`, `hard` FROM `post`";
            $result1 = mysqli_query($link, $nm) or die("Ошибка " . mysqli_error($link));
            bd($result1);
    }

    $object= array('акварелью', 'пастелью', 'гуашью', 'цветными карандашами', 'акрилом', 'карандашом', 'фломастерами', 'маслом', 'батиком');    
    $k=count($object);




// if( isset( $_POST['radio-grp'] ) )
// 				{
// 				    switch( $_POST['radio-grp'] )
// 				    {
// 				        case '1':
// 				             $nm="SELECT `name`, `date`, `category`, `object`, `photo`,`id`, `hard` FROM `post` WHERE `object`='$object[$l]' and `hard`>=4";
// 				               $result1 = mysqli_query($link, $nm) or die("Ошибка " . mysqli_error($link));
// 				               bd($result1);
// 				            break;
// 				        case '2':
// 				             $nm="SELECT `name`, `date`, `category`, `object`, `photo`,`id`, `hard` FROM `post` WHERE `object`='$object[$l]' and `hard`=3";
// 		               		$result1 = mysqli_query($link, $nm) or die("Ошибка " . mysqli_error($link));
// 		              		 bd($result1);
// 				            break;
// 				        case '3':
// 				             $nm="SELECT `name`, `date`, `category`, `object`, `photo`,`id`, `hard` FROM `post` WHERE `object`='$object[$l]' and `hard`<=2";
// 				               $result1 = mysqli_query($link, $nm) or die("Ошибка " . mysqli_error($link));
// 				               bd($result1);
// 				            break;
// 				    }
// 				}



if (isset($_POST['sub'])) {

    for ($l=0; $l <=$k; $l++) { 

        if(IsChecked('art', $l+1))
        {
    //     	if( isset( $_POST['radio-grp'] ) )
				// {
				//     switch( $_POST['radio-grp'] )
				//     {
				//         case '1':
				//              $nm="SELECT `name`, `date`, `category`, `object`, `photo`,`id`, `hard` FROM `post` WHERE `object`='$object[$l]' and `hard`>=4";
				//                $result1 = mysqli_query($link, $nm) or die("Ошибка " . mysqli_error($link));
				//                bd($result1);
				//             break;
				//         case '2':
				//              $nm="SELECT `name`, `date`, `category`, `object`, `photo`,`id`, `hard` FROM `post` WHERE `object`='$object[$l]' and `hard`=3";
		  //              		$result1 = mysqli_query($link, $nm) or die("Ошибка " . mysqli_error($link));
		  //             		 bd($result1);
				//             break;
				//         case '3':
				//              $nm="SELECT `name`, `date`, `category`, `object`, `photo`,`id`, `hard` FROM `post` WHERE `object`='$object[$l]' and `hard`<=2";
				//                $result1 = mysqli_query($link, $nm) or die("Ошибка " . mysqli_error($link));
				//                bd($result1);
				//             break;
				//     }
				// }
				// else{
		             $nm="SELECT `name`, `date`, `category`, `object`, `photo`,`id`, `hard` FROM `post` WHERE `object`='$object[$l]'";
		               $result1 = mysqli_query($link, $nm) or die("Ошибка " . mysqli_error($link));
		               bd($result1);
           // }
        }
    }
}

function bd($result1){
    if($result1) //проверяем, получены ли данные из БД
        {   
            echo "<div class='posts_block'>";
            $rows = mysqli_num_rows($result1); 
            for ($i = 0 ; $i<$rows; ++$i)
            {
            $row = mysqli_fetch_row($result1);
                echo "<div class='post' id='post''>";
                    echo "<div class'phhoto'>";
                    echo $row[4];
                    echo "</div>";
                    echo "<p class='category'>";
                    echo $row[2], " ", $row[3];
                    echo "</p>"; 
                    echo "<p class='name'>";
                    echo "<a  href=/post/post.php?".$row[5].">";
                    echo $row[0];
                    echo "</a>";
                    echo "</p>";
                        echo "<div class='star'>";
                    for ($j=0; $j < $row[6] ; $j++) { 
                            echo "<img src='../img/star.png'>";  
                    }
                        echo "</div>";  
                    echo "<p class='date'>";
                    echo $row[1];
                    echo "</p>";
                echo "</div>";  
            }
            echo "</div>";
         }
}


    function IsChecked($chkname,$value)
    {
        if(!empty($_POST[$chkname]))
        {
            foreach($_POST[$chkname] as $chkval)
            {
                if($chkval == $value)
                {
                    return true;
                }
            }
        }
        return false;
    }
?>
<!-- <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
<script>
	$('#post').load(document.URL + ' #post');
</script> -->

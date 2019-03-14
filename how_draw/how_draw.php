 <?php
     include("how_draw.html");
 ?> 

 <?php
     include("../bd.php");
 ?> 

<?php
    $aArt = $_POST['art'];
    
        if (empty($aArt)) {
            $nm="SELECT `name`, `date`, `category`, `object`, `photo` FROM `post`";
            $result1 = mysqli_query($link, $nm) or die("Ошибка " . mysqli_error($link));
            bd($result1);
    }


if (isset($_POST['sub'])) {
    if(IsChecked('art', '1'))
        {
             $nm="SELECT `name`, `date`, `category`, `object`, `photo` FROM `post` WHERE `object`='акварелью'";
               $result1 = mysqli_query($link, $nm) or die("Ошибка " . mysqli_error($link));
               bd($result1);
        }

    if(IsChecked('art', '2'))
        {
             $nm="SELECT `name`, `date`, `category`, `object`, `photo` FROM `post` WHERE `object`='пастелью'";
               $result1 = mysqli_query($link, $nm) or die("Ошибка " . mysqli_error($link));
               bd($result1);
        }

    if(IsChecked('art', '3'))
        {
             $nm="SELECT `name`, `date`, `category`, `object`, `photo` FROM `post` WHERE `object`='гуашью'";
               $result1 = mysqli_query($link, $nm) or die("Ошибка " . mysqli_error($link));
               bd($result1);
        }

    if(IsChecked('art', '4'))
        {
             $nm="SELECT `name`, `date`, `category`, `object`, `photo` FROM `post` WHERE `object`='цветными карандашами'";
               $result1 = mysqli_query($link, $nm) or die("Ошибка " . mysqli_error($link));
               bd($result1);
        }

    if(IsChecked('art', '5'))
        {
             $nm="SELECT `name`, `date`, `category`, `object`, `photo` FROM `post` WHERE `object`='акрилом'";
               $result1 = mysqli_query($link, $nm) or die("Ошибка " . mysqli_error($link));
               bd($result1);
        }

    if(IsChecked('art', '6'))
        {
             $nm="SELECT `name`, `date`, `category`, `object`, `photo` FROM `post` WHERE `object`='карандашом'";
               $result1 = mysqli_query($link, $nm) or die("Ошибка " . mysqli_error($link));
               bd($result1);
        }

    if(IsChecked('art', '7'))
        {
             $nm="SELECT `name`, `date`, `category`, `object`, `photo` FROM `post` WHERE `object`='фломастерами'";
               $result1 = mysqli_query($link, $nm) or die("Ошибка " . mysqli_error($link));
               bd($result1);
        }

    if(IsChecked('art', '8'))
        {
             $nm="SELECT `name`, `date`, `category`, `object`, `photo` FROM `post` WHERE `object`='маслом'";
               $result1 = mysqli_query($link, $nm) or die("Ошибка " . mysqli_error($link));
               bd($result1);
        }

    if(IsChecked('art', '9'))
        {
             $nm="SELECT `name`, `date`, `category`, `object`, `photo` FROM `post` WHERE `object`='батиком'";
               $result1 = mysqli_query($link, $nm) or die("Ошибка " . mysqli_error($link));
               bd($result1);
        }
}

    
function bd($result1){
    if($result1) //проверяем, получены ли данные из БД
        {   
            $rows = mysqli_num_rows($result1); // количество полученных строк (записей)
            for ($i = 0 ; $i < $rows ; ++$i)
            {
            $row = mysqli_fetch_row($result1);
                echo "<div class='post'>";
                    echo "<div class'phhoto'>";
                    echo $row[4];
                    echo "</div>";
                    echo "<p class='category'>";
                    echo $row[2], " ", $row[3];
                    echo "</p>"; 
                    echo "<p class='name'>";
                            echo $row[0];
                    echo "</p>";
                    echo "<p class='date'>";
                            echo $row[1];
                    echo "</p>";
                echo "</div>";  
            }
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
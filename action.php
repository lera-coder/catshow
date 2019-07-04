<!DOCTYPE html>
<html lang="en">
<head>
<link href="style.css" rel="stylesheet">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
  <?php include ('header.html'); ?>
	<title>Document</title>
</head>

<body>

<div class = "divider"> </div>

</body>
</html>
<?php 


//функция для вывода некоторых данных

function to_show_data($table_name, $first_atr){
  global $link;

      $result = mysqli_query($link, "SELECT * FROM $table_name") or die("Ошибка " . mysqli_error($link)); 

    echo " <tr><th>ID </th><th> ".$first_atr."</th> </tr> ";

while ($sql = mysqli_fetch_array($result)) {
    echo "<tr><td> ".$sql['ID']." </td><td> ".$sql["$first_atr"]."</td> </tr>";
}

}



$host = 'localhost'; // адрес сервера 
$database = 'mysql'; // имя базы данных
$user = 'lera'; // имя пользователя
$password = '2206'; // пароль

// подключаемся к серверу
$link = mysqli_connect($host, $user, $password, $database)  or die("Ошибка " . mysqli_error($link));
$mysqli = new mysqli($host, $user, $password, $database);
 
$result1;



// выполняем операции с базой данных
// если нужно обработать цвета 

echo '<div class = "divider">';
echo '<center> <h2>' . $_POST['data'] .' </h2> </center>';
echo '<div class = "divider"> </div>';
echo '<center> <table border="1" >';

//вывести цвет 

if( htmlspecialchars($_POST['data']) == "COLOR DATA"){

  to_show_data('COLOR', 'COLOR_TYPE');
}

//вывести даты рождения

else if( htmlspecialchars($_POST['data']) == "BIRTHSDAY_YEAR DATA"){

    to_show_data('BIRTHSDAY_YEAR', 'YEAR_NAME');

    }

  //вывести породы
 else if( htmlspecialchars($_POST['data']) == "BREED DATA"){

      to_show_data('BREED DATA', 'BREED_NAME');

     }

     //вывести места событий
  else if( htmlspecialchars($_POST['data']) == "EVENT PLACE DATA"){

        to_show_data('EVENT_PLACE_TABLE', 'PLACE');

    }

    //вывести план событий

    else if( htmlspecialchars($_POST['data']) == "EVENTS DATA"){
       $result = mysqli_query($link, 'SELECT * FROM EVENTS') or die("Ошибка " . mysqli_error($link)); 

        
      echo " <tr><th>ID </th> <th> EVENT_NAME </th>  <th> EVENT_DATE </th> <th> EVENT_PLACE </th></tr> ";

      while ($sql = mysqli_fetch_array($result)) {

        $help_a = $sql['EVENT_PLACE'];

        $result1 = mysqli_fetch_array(mysqli_query($link, "SELECT * FROM EVENT_PLACE_TABLE WHERE ID = $help_a")) or die("Ошибка " . mysqli_error($link)); 

        echo "<tr><td> ".$sql['ID']." </td><td> ".$sql['EVENT_NAME']."</td>
        <td> ".$sql['EVENT_DATE']."</td> <td> ".$result1['PLACE']."</td></tr>";

    
      // Выполняем запрос     
              
     }

    }

//вывод информации про котов
       else if( htmlspecialchars($_POST['data']) == "CATS DATA"){
        $result = mysqli_query($link, 'SELECT * FROM CATS') or die("Ошибка " . mysqli_error($link)); 
          
        echo " <tr><th>ID </th> <th> CAT_NAME </th>  <th> CAT_SEX </th> <th> CAT_BREED </th>
        <th> CAT_BIRTH_YEAR </th> <th> CAT_BIRTH_DATE </th><th> CAT_OWNER_NAME </th>
        <th> CAT_OWNER_FAMILYNAME </th><th> ADRESS</th><th> TELEPHONE </th><th> CAT_COLOR </th></tr> ";

            while ($sql = mysqli_fetch_array($result)) {
              $sex = $sql['CAT_SEX_ID'];
              $breed = $sql['CAT_BREED_ID'];
              $year = $sql['CAT_BIRTH_YEAR_ID'];
              $owner = $sql['CAT_OWNER'];
              $color = $sql['CAT_COLOR_ID'];

              $result1 = mysqli_fetch_array(mysqli_query($link, "SELECT SEX_NAME FROM SEX WHERE ID = $sex")) or die("Ошибка " . mysqli_error($link)); 
              $result2 = mysqli_fetch_array(mysqli_query($link, "SELECT BREED_NAME FROM BREED WHERE ID = $breed")) or die("Ошибка " . mysqli_error($link)); 
              $result3 = mysqli_fetch_array(mysqli_query($link, "SELECT YEAR_NAME FROM BIRTHSDAY_YEAR WHERE ID = $year")) or die("Ошибка " . mysqli_error($link)); 
              $result4 = mysqli_fetch_array(mysqli_query($link, "SELECT * FROM OWNER WHERE ID = $owner")) or die("Ошибка " . mysqli_error($link)); 
              $result5 = mysqli_fetch_array(mysqli_query($link, "SELECT COLOR_TYPE FROM COLOR WHERE ID = $color")) or die("Ошибка " . mysqli_error($link)); 

              echo "<tr>
              <td> ".$sql['ID']." </td><td> ".$sql['CAT_NAME']."</td><td> ".$result1['SEX_NAME']."</td>
              <td> ".$result2['BREED_NAME']."</td><td> ".$result3['YEAR_NAME']."</td> <td> ".$sql['CAT_BIRTH_DATE']."</td>
              <td> ".$result4['FULLNAME']."</td><td> ".$result4['SECONDNAME']."</td><td> ".$result4['ADRESS']."</td>
              <td> ".$result4['TELEPHONE']."</td><td> ".$result5['COLOR_TYPE']."</td>
              </tr>";
           }
       } 

       //вывод информации про результаты соревнований

       else if( htmlspecialchars($_POST['data']) == "RESULT OF CAT SHOW DATA"){
        $result = mysqli_query($link, 'SELECT * FROM RESULT_CAT_EVENT') or die("Ошибка " . mysqli_error($link)); 
          
           echo " <tr><th>ID </th> <th> CAT_NAME </th>  <th> EVENT_NAME </th> <th> PRIZE_PLACE </th></tr> ";

            while ($sql = mysqli_fetch_array($result)) {
              $name = $sql['CAT_NAME_ID'];
              $event = $sql['EVENT_NAME_ID'];

              $result1 = mysqli_fetch_array(mysqli_query($link, "SELECT CAT_NAME FROM CATS WHERE ID = $name")) or die("Ошибка " . mysqli_error($link)); 
              $result2 = mysqli_fetch_array(mysqli_query($link, "SELECT EVENT_NAME FROM EVENTS WHERE ID = $event")) or die("Ошибка " . mysqli_error($link)); 


              echo "<tr><td> ".$sql['ID']." </td><td> ".$result1['CAT_NAME']."</td>
              <td> ".$result2['EVENT_NAME']."</td> <td> ".$sql['PRIZE_PLACE']."</td></tr>";
           }
       }          

echo '</table> </center>';
echo '</div>';
 

// закрываем подключение
mysqli_close($link);


?>



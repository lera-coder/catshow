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

$host = 'localhost'; // адрес сервера 
$database = 'mysql'; // имя базы данных
$user = 'lera'; // имя пользователя
$password = '2206'; // пароль

// подключаемся к серверу
$link = mysqli_connect($host, $user, $password, $database)  or die("Ошибка " . mysqli_error($link));
 

echo '<div class = "divider">';
echo '<center>' . $_POST['data'] .'</center>';
echo '<div class = "divider"> </div>';
echo '<center>';

// с этого момента программа состоит в том, чтобы проверить
// какие поля есть в пост

//проверка на поле колор (цвет)   

if(isset($_POST['COLOR'])){
   $COLOR = $_POST['COLOR'];

//    обработка майскюэль запроса

   $sql = "INSERT INTO COLOR (COLOR_TYPE) VALUES ('$COLOR')";



   //проверка на успешность запроса
   if (mysqli_query($link, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($link);
}
}

// если есть поле порода

else if (isset($_POST['BREED'])){
   $BREED = $_POST['BREED'];

    //обработка запроса в бд
   $sql = "INSERT INTO BREED (BREED_NAME) VALUES ('$BREED')";

   if (mysqli_query($link, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($link);
}
}

//есть ли поле год рождения

else if (isset($_POST['YEAR'])){
   $YEAR = $_POST['YEAR'];

    //обработка запроса в бд

   $sql = "INSERT INTO BIRTHSDAY_YEAR (YEAR_NAME) VALUES ($YEAR)";

   if (mysqli_query($link, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($link);
}
}

//добавить место

else if (isset($_POST['PLACE'])){
   $PLACE = $_POST['PLACE'];

       //обработка запроса в бд

   $sql = "INSERT INTO EVENT_PLACE_TABLE (PLACE) VALUES ('$PLACE')";

   if (mysqli_query($link, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($link);
}
}

//добавить мероприятие

else if (isset($_POST['EVENT_DATE'])){
   $E_NAME = $_POST['EVENT_NAME'];
   $E_DATE = $_POST['EVENT_DATE'];
   $E_PLACE = $_POST['EVENT_PLACE'];

       //обработка запроса в бд

     $result_place = mysqli_fetch_array(mysqli_query($link, "SELECT * FROM EVENT_PLACE_TABLE WHERE PLACE = '$E_PLACE'"));

    //если в таблице нет этого значения
     if (!$result_place){
         //создаем это значение
        $sql = mysqli_query($link,"INSERT INTO EVENT_PLACE_TABLE (PLACE) VALUES ('$E_PLACE')");
        $result_place = mysqli_fetch_array(mysqli_query($link, "SELECT * FROM EVENT_PLACE_TABLE WHERE PLACE = '$E_PLACE'"));
  }
     
     //находим  номер значения
    //  $sql1 = mysqli_fetch_array(mysqli_query($link, "SELECT ID FROM EVENT_PLACE_TABLE WHERE PLACE = '$E_PLACE'"));
     //сохраняем этот номер в перменной
     $E_PLACE =  $result_place['ID'];
    //создаем строку в нашей таблице
     $sql = mysqli_query($link,"INSERT INTO EVENTS (EVENT_NAME, EVENT_DATE, EVENT_PLACE) VALUES ('$E_NAME', '$E_DATE', $E_PLACE)");
    echo "New record created successfully";
    }

//если надо добавить кота

else if (isset($_POST['CAT_NAME'])){
    $C_NAME = $_POST['CAT_NAME'];
   $C_SEX = $_POST['CAT_SEX'];
   $C_BREED = $_POST['CAT_BREED'];
   $C_YEAR = $_POST['CAT_YEAR'];
   $C_DATE = $_POST['CAT_DATE'];
   $O_NAME = $_POST['OWNER_NAME'];
   $O_FNAME = $_POST['OWNER_FAMILYNAME'];
   $O_TELEPHONE = $_POST['OWNER_TELEPHONE'];
   $O_ADRESS = $_POST['OWNER_ADRESS'];
   $C_COLOR = $_POST['CAT_COLOR'];


   //обработка запроса в бд

   $result_sex = mysqli_fetch_array(mysqli_query($link, "SELECT * FROM SEX WHERE SEX_NAME = '$C_SEX'"));
   $result_breed = mysqli_fetch_array(mysqli_query($link, "SELECT * FROM BREED WHERE BREED_NAME = '$C_BREED'"));
   $result_year = mysqli_fetch_array(mysqli_query($link, "SELECT * FROM BIRTHSDAY_YEAR WHERE YEAR_NAME = $C_YEAR"));
   $result_owner = mysqli_fetch_array(mysqli_query($link, "SELECT * FROM OWNER WHERE TELEPHONE = $O_TELEPHONE"));
   $result_color = mysqli_fetch_array(mysqli_query($link, "SELECT * FROM COLOR WHERE COLOR_TYPE = '$C_COLOR'"));

  //если в таблице нет этого значения
   if (!$result_sex){
       //выводим ошибку
       echo "ERROR SEXNAME ISNT RIGHT";
       exit;
    }
    if (!$result_breed){
        //создаем это значение
        $sql = mysqli_query($link,"INSERT INTO BREED (BREED_NAME) VALUES ('$C_BREED')");
        $result_breed = mysqli_fetch_array(mysqli_query($link, "SELECT * FROM BREED WHERE BREED_NAME = '$C_BREED'"));

     }
     if (!$result_year){
        //создаем это значение
        $sql = mysqli_query($link,"INSERT INTO  BIRTHSDAY_YEAR (YEAR_NAME) VALUES ('$C_YEAR')");
        $result_year = mysqli_fetch_array(mysqli_query($link, "SELECT * FROM BIRTHSDAY_YEAR WHERE YEAR_NAME = $C_YEAR"));
     }
     if (!$result_owner){
        //создаем это значение
        $sql = mysqli_query($link,"INSERT INTO OWNER (FULLNAME, SECONDNAME, ADRESS, TELEPHONE) VALUES 
        ('$O_NAME', '$O_FNAME', '$O_ADRESS', $O_TELEPHONE)");
        $result_owner = mysqli_fetch_array(mysqli_query($link, "SELECT * FROM OWNER WHERE TELEPHONE = $O_TELEPHONE"));

     }
     if (!$result_color){
        //создаем это значение
        $sql = mysqli_query($link,"INSERT INTO  COLOR (COLOR_TYPE) VALUES ('$C_COLOR')");
        $result_color = mysqli_fetch_array(mysqli_query($link, "SELECT * FROM COLOR WHERE COLOR_TYPE = '$C_COLOR'"));
     }

     
   //сохраняем этот номер в перменной
   $help_sex =  $result_sex['ID'];
   $help_breed =  $result_breed['ID'];
   $help_year=  $result_year['ID'];
   $help_owner=  $result_owner['ID'];
   $help_color=  $result_color['ID'];

  //создаем строку в нашей таблице
   $sql = mysqli_query($link, "INSERT INTO CATS (CAT_NAME, CAT_SEX_ID, CAT_BREED_ID, CAT_BIRTH_YEAR_ID, CAT_BIRTH_DATE, 
   CAT_OWNER, CAT_COLOR_ID) VALUES ('$C_NAME', $help_sex, $help_breed, $help_year, '$C_DATE', $help_owner, $help_color)") or die("Ошибка " . mysqli_error($link));

   echo "New record created successfully";
   
}
else if (isset($_POST['CAT_NAME_RESULT'])){
    $C_NAME = $_POST['CAT_NAME_RESULT'];
    $O_NAME = $_POST['OWNER_NAME'];
    $O_FAMILY = $_POST['OWNER_FAMILYNAME'];
    $O_TELEPHONE = $_POST['OWNER_TELEPHONE'];
    $E_NAME = $_POST['EVENT_NAME'];
    $PRIZE_PLACE = $_POST['PRIZE_PLACE'];
   
    //проверка с помощью номера телефона владельца и клички животного на наличие уже такого животного
    $result_owner = mysqli_fetch_array(mysqli_query($link, "SELECT ID FROM OWNER WHERE TELEPHONE = $O_TELEPHONE"));
    $help_own_id = $result_owner['ID'];
    $result_cat_name = mysqli_fetch_array(mysqli_query($link, "SELECT ID FROM CATS WHERE CAT_OWNER = $help_own_id AND 
    CAT_NAME = '$C_NAME'"));

    $result_event_name = mysqli_fetch_array(mysqli_query($link, "SELECT ID FROM EVENTS WHERE EVENT_NAME = '$E_NAME'"));

    if((!$result_cat_name)||(!$result_event_name)){
        echo "You must firstly add cat and event and then its prizeplaces";
        exit;
    }
    else{
        $help_name_event = $result_event_name['ID'];
        $help_name_cat =  $result_cat_name['ID'];

        $sql = mysqli_query($link, "INSERT INTO RESULT_CAT_EVENT (CAT_NAME_ID, EVENT_NAME_ID, PRIZE_PLACE) 
        VALUES ($help_name_cat, $help_name_event, $PRIZE_PLACE)") or die("Ошибка " . mysqli_error($link));

         echo "New record created successfully";
    }

 }          

echo '</center>';
echo '</div>';
 

// закрываем подключение
mysqli_close($link);


?>



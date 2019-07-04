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
 


// выполняем операции с базой данных
// если нужно обработать цвета 

echo '<div class = "divider">';
echo '<center>' . $_POST['data'] .'</center>';
echo '<div class = "divider"> </div>';
echo '<center>';

//если добавить цвет
if( htmlspecialchars($_POST['data']) == "COLOR DATA"){

    echo '<form method="POST" action="putinbase.php">  
    <input name="COLOR" type="text" placeholder=" NEW COLOR"/>
    <input type="submit" value="SEND"/>
   </form>';

}

//если добавить год
else if( htmlspecialchars($_POST['data']) == "BIRTHSDAY_YEAR DATA"){

    echo '<form method="POST" action="putinbase.php">  
    <input name="YEAR" type="text" placeholder=" NEW YEAR"/>
    <input type="submit" value="SEND"/>
   </form>';
    }

    //если добавить породу
 else if( htmlspecialchars($_POST['data']) == "BREED DATA"){

    echo '<form method="POST" action="putinbase.php">  
    <input name="BREED" type="text" placeholder=" NEW BREED"/>
    <input type="submit" value="SEND"/>
   </form>';
     }

     //если добавить место проведения
  else if( htmlspecialchars($_POST['data']) == "EVENT PLACE DATA"){

    echo '<form method="POST" action="putinbase.php">  
    <input name="PLACE" type="text" placeholder=" NEW PLACE"/>
    <input type="submit" value="SEND"/>
   </form>';
    }

    //если добавить мероприятие
    else if( htmlspecialchars($_POST['data']) == "EVENTS DATA"){
        echo '<form method="POST" action="putinbase.php">  
    <input name="EVENT_NAME" type="text" placeholder=" NEW EVENT NAME"/>
    <input name="EVENT_DATE" type="text" placeholder=" NEW EVENT DATE"/>
    <input name="EVENT_PLACE" type="text" placeholder=" NEW EVENT PLACE"/>
    <input type="submit" value="SEND"/>
   </form>';
       }

       //если добавить кота
    else if( htmlspecialchars($_POST['data']) == "CATS DATA"){
        echo '<form method="POST" action="putinbase.php">  
        <input name="CAT_NAME" type="text" placeholder=" NAME"/>
        <input name="CAT_SEX" type="text" placeholder=" SEX"/>
        <input name="CAT_BREED" type="text" placeholder=" BREED"/>
        <input name="CAT_YEAR" type="text" placeholder=" YEAR"/>
        <input name="CAT_DATE" type="text" placeholder=" DATE"/>
        <input name="OWNER_NAME" type="text" placeholder=" OWNER_NAME"/>
        <input name="OWNER_FAMILYNAME" type="text" placeholder=" OWNER_FAMILYNAME"/>
        <input name="OWNER_TELEPHONE" type="text" placeholder=" OWNER_TELEPHONE"/>
        <input name="OWNER_ADRESS" type="text" placeholder=" OWNER_ADRESS"/>
        <input name="CAT_COLOR" type="text" placeholder=" COLOR"/>


        <input type="submit" value="SEND"/>
       </form>';
     } 
       else if( htmlspecialchars($_POST['data']) == "RESULT OF CAT SHOW DATA"){
        echo '<form method="POST" action="putinbase.php">  
        <input name="CAT_NAME_RESULT" type="text" placeholder= "NAME OF CAT"/>
        <input name="OWNER_NAME" type="text" placeholder= "NAME OF OWNER"/>
        <input name="OWNER_FAMILYNAME" type="text" placeholder= "FAMILYNAME OF OWNER"/>
        <input name="OWNER_TELEPHONE" type="text" placeholder= "TELEPHONE OF OWNER"/>
        <input name="EVENT_NAME" type="text" placeholder="NAME OF EVENT"/>
        <input name="PRIZE_PLACE" type="text" placeholder="PRIZE PLACE"/>
        <input type="submit" value="SEND"/>
        </form>';
       }          

echo '</center>';
echo '</div>';
 

// закрываем подключение
mysqli_close($link);


?>



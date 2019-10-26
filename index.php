<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/db/db_process.php');

$name = "";
$surname = "";
$phone = 0;
$email = "";
$errors = [];

if (isset($_POST['submit']))
{
	$name = (!empty($_POST['name'])) ? $_POST['name'] : "";
	$surname = (!empty($_POST['surname'])) ? $_POST['surname'] : "";
	$phone = (!empty($_POST['phone'])) ? $_POST['phone'] : "";
	$email = (!empty($_POST['email'])) ? $_POST['email'] : "";
	
	$name = mysqli_real_escape_string($link, $name);
	$surname = mysqli_real_escape_string($link, $surname);
	$phone = mysqli_real_escape_string($link, $phone);
	$email = mysqli_real_escape_string($link, $email);
	
	$name = htmlspecialchars($name);
	$surname = htmlspecialchars($surname);
	$phone = htmlspecialchars($phone);
	$email = htmlspecialchars($email);
	
	$name = trim($name);
	$surname = trim($surname);
	$phone = trim($phone);
    $email = trim($email);

  if (!strlen($name))
  {
    $errors[] = "Поле Имя не должно быть пустым!";
  }
  
  if (!strlen($email))
  {
    $errors[] = "Поле Email не должно быть пустым!";
  }
  
  if (strpos($email, "@") === false)
  {
    $errors[] = "Поле Email должно быть валидным Email адресом!";
  }

  if (empty($errors))
  {
    $query = sprintf("INSERT INTO feedback (`name`, `surname`, `phone`, `email`) VALUES ('%s', '%s', '%s', '%s')", $name, $surname,$phone,$email);
    $dbResult = mysqli_query($link, $query);
    
    header('Location: /');
    die();
  }

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="main.css"/>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <title>Шины24</title>
</head>
<body>
    <div class="container text-center" >
    <div style="font-size: 4em" >ООО "Шины24"</div>
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
            <img class="d-block w-100" src="assets/tire_1.jpg">
            </div>
            <div class="carousel-item">
            <img class="d-block w-100" src="assets/tire_2.jpg">
            </div>
            <div class="carousel-item">
            <img class="d-block w-100" src="assets/tire_3.jpg">
            </div>
            <div class="carousel-item">
            <img class="d-block w-100" src="assets/tire_4.jpg">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
        </div>
        <div style="width:50%; margin-left:25%">
            <form action="" method="post">
                            <div class="form-group">
                                <label for="user-name">Имя</label>
                                <input type="text" name="name" class="form-control" id="user-name" placeholder="Введите ваше имя" value="<?=$email?>">
                            </div>
                            <div class="form-group">
                                <label for="user-surname">Фамилия</label>
                                <input type="text" name="surname" class="form-control" id="user-surname" placeholder="Введите вашу фамилию" value="<?=$name?>">
                            </div>
                            <div class="form-group">
                                <label for="user-phone">Телефон</label>
                                <input type="number" name="phone" class="form-control" id="user-phone" placeholder="Введите ваше телефон" value="<?=$name?>">
                            </div>
                            <div class="form-group">
                                <label for="user-email">E-mail</label>
                                <input type="email" name="email" class="form-control" id="user-email" placeholder="Введите ваш email" value="<?=$name?>">
                            </div>
                            <button type="submit" name="submit" class="btn btn-primary">Отправить</button>
            </form>
        </div>
    </div>
</body>
</html>
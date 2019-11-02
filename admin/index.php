<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/db/db_process.php');

$query = "SELECT * FROM feedback";
$dbResult = mysqli_query($link, $query);

$arResult = [];


/* извлечение ассоциативного массива */
while ($row = mysqli_fetch_assoc($dbResult)) 
{
    $arResult[$row['id']] = $row;
}
mysqli_close($link);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!--<link rel="stylesheet" href="main.css"/>-->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <title>Панель управления</title>
</head>
<body>
    <div class="container-fluid" style="min-height:device-height">
        <?include_once($_SERVER['DOCUMENT_ROOT'] . '/sections/header.php');?>
        <table class="table" style="width:50%">
            <thead>
                <tr>
                    <th scope="col">
                    Идентификатор
                    </th>
                    <th scope="col">
                    Имя
                    </th>
                    <th scope="col">
                    Фамилия
                    </th>
                    <th scope="col">
                    Номер телефона
                    </th>
                    <th scope="col">
                    E-mail
                    </th>
                </tr>
            </thead>
            <tbody>
            <?foreach($arResult as $key => $value):?>
                <tr>
                        <td>
                        <?=$value['id']?>
                        </td>
                        <td>
                        <?=$value['name']?>
                        </td>
                        <td>
                        <?=$value['surname']?>
                        </td>
                        <td>
                        <?=$value['phone']?>
                        </td>
                        <td>
                        <?=$value['email']?>
                        </td>
                </tr>
            </tbody>
            <!--<div>ID:        <?=$value['id']?></div>
            <div>Имя:       <?=$value['name']?></div>
            <div>Фамилия:   <?=$value['surname']?></div>
            <div>Телефон:   <?=$value['phone']?></div>
            <div>Email:     <?=$value['email']?></div>-->
            <?endforeach;?>
        </table>
        <div style="min-height:-webkit-fill-available"></div>
        <?include_once($_SERVER['DOCUMENT_ROOT'] . '/sections/footer.php');?>  
    </div>  
</body>
</html>






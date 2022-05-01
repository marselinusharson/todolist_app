<?php
session_start();

require_once __DIR__ . "/Config/Database.php";
require_once __DIR__ . "/Entity/Todolist.php";
require_once __DIR__ . "/Repository/TodolistRepository.php";
require_once __DIR__ . "/Service/TodolistService.php";
require_once __DIR__ . "/Utils/InputHelper.php";
require_once __DIR__ . "/View/TodolistView.php";

use Database\DatabaseConnection;
use Repository\TodolistRepoImpl;
use Service\TodolistServiceImpl;
use View\TodolistView;

$conn = DatabaseConnection::getConnection();
$todolistRepository = new TodolistRepoImpl($conn);
$todolistService = new TodolistServiceImpl($todolistRepository);
$todolistView = new TodolistView($todolistService);
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <!-- Link bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    </head>
    <body>
        <div class="container">
            <?php if(isset($_SESSION['message'])):?>

                <h5 class="alert alert-success"><?= $_SESSION['message']?></h5>
            <?php
                unset($_SESSION['message']);
            endif;?>
            <center>
                <h1>TODOLIST APPLICATION</h1> 
            </center>
        </div>
        
        <?php $todolistView->showTodolist();?>
</body>
</html>

<?php
$conn = null;
?>
<?php
require_once __DIR__ . "/../Config/Database.php";
require_once __DIR__ . "/../Entity/Todolist.php";
require_once __DIR__ . "/../Repository/TodolistRepository.php";
require_once __DIR__ . "/../Service/TodolistService.php";
require_once __DIR__ . "/../Utils/InputHelper.php";
require_once __DIR__ . "/../View/TodolistView.php";

use Repository\TodolistRepoImpl;
use Service\TodolistServiceImpl;
use View\TodolistView;
use Database\DatabaseConnection;

function testViewShowTodolist(){
    $conn = DatabaseConnection::getConnection();
    $todolistRepository = new TodolistRepoImpl($conn);
    $todolistService = new TodolistServiceImpl($todolistRepository);
    $todolistView = new TodolistView($todolistService);
    $todolistView->showTodolist();   
}

testViewShowTodolist();

?>
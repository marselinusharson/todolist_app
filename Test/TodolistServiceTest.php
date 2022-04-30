<?php


require_once __DIR__ . "/../Config/Database.php";
require_once __DIR__ . "/../Entity/Todolist.php";
require_once __DIR__ . "/../Repository/TodolistRepository.php";
require_once __DIR__ . "/../Service/TodolistService.php";

use Database\DatabaseConnection;
use Repository\TodolistRepoImpl;
use Service\TodolistServiceImpl;

function testShowTodolist():void{
    $conn = DatabaseConnection::getConnection();
    $todolistRepository = new TodolistRepoImpl($conn); 
    $todolistService = new TodolistServiceImpl($todolistRepository);
    
    $todolistService->showTodolist();
}

// testShowTodolist();
function testaddTodolist():void{
    $conn = DatabaseConnection::getConnection();
    $todolistRepository = new TodolistRepoImpl($conn); 
    $todolistService = new TodolistServiceImpl($todolistRepository);

    $todolistService->showTodolist();
    $todolistService->addTodolist("main lagi");
    $todolistService->showTodolist();
}

// testaddTodolist();

function testRemoveTodolist():void{
    $conn = DatabaseConnection::getConnection();
    $todolistRepository = new TodolistRepoImpl($conn); 
    $todolistService = new TodolistServiceImpl($todolistRepository);

    $todolistService->showTodolist();
    $todolistService->removeTodolist(3);
    $todolistService->showTodolist();
}

testRemoveTodolist();
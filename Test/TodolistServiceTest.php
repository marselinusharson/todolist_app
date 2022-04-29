<?php

require_once __DIR__ . "/../Entity/Todolist.php";
require_once __DIR__ . "/../Repository/TodolistRepository.php";
require_once __DIR__ . "/../Service/TodolistService.php";

use Entity\Todolist;
use Repository\TodolistRepositoryImpl;
use Service\TodolistServiceImpl;

function testShowTodolist():void{
    $todolistRepository = new TodolistRepositoryImpl();
    $todolistRepository->todolist[1] = new Todolist("Main bola");
    
    $todolistService = new TodolistServiceImpl($todolistRepository);

    $todolistService-> showTodolist();
}

// testShowTodolist();


function testAddTodolist():void{
    $todolistRepository = new TodolistRepositoryImpl();
    $todolistService = new TodolistServiceImpl($todolistRepository);
    $todolistService->addTodolist("main");
    $todolistService->addTodolist("belajar javascript");
    $todolistService->addTodolist("Belajar laravel");
    $todolistService->addTodolist("belajar Resful API");
    $todolistService->addTodolist("belajar dan terus belajar");
    $todolistService-> showTodolist();
    
}
// testAddTodolist();

function testRemoveTodolist():void{
    $todolistRepository = new TodolistRepositoryImpl();
    $todolistService = new TodolistServiceImpl($todolistRepository);
    $todolistService->addTodolist("main");
    $todolistService->addTodolist("belajar javascript");
    $todolistService->addTodolist("Belajar laravel");
    $todolistService->addTodolist("belajar Resful API");
    $todolistService->addTodolist("belajar dan terus belajar");
    $todolistService-> showTodolist();
    $todolistService->removeTodolist(2);
    $todolistService-> showTodolist();
    $todolistService->removeTodolist(5);
    $todolistService-> showTodolist();
    

}

testRemoveTodolist();
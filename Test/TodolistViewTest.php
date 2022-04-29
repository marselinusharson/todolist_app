<?php

require_once __DIR__ . "/../Entity/Todolist.php";
require_once __DIR__ . "/../Repository/TodolistRepository.php";
require_once __DIR__ . "/../Service/TodolistService.php";
require_once __DIR__ . "/../View/TodolistView.php";
require_once __DIR__ . "/../Utils/InputHelper.php";

use Entity\Todolist;
use Repository\TodolistRepositoryImpl;
use Service\TodolistServiceImpl;
use View\TodolistView;

function testViewShowTodolist():void{
    $todolistRepository = new TodolistRepositoryImpl();
    $todolistService = new TodolistServiceImpl($todolistRepository);
    $todolistView = new TodolistView($todolistService);
    
    $todolistView->showTodolist();
}

// testViewShowTodolist();

function testViewAddTodolist(){
    $todolistRepository = new TodolistRepositoryImpl();
    $todolistService = new TodolistServiceImpl($todolistRepository);
    $todolistView = new TodolistView($todolistService);
    $todolistView->addTodolist();
    $todolistView->showTodolist();
}

// testViewAddTodolist();

function testViewRemoveTodolist(){
    $todolistRepository = new TodolistRepositoryImpl();
    $todolistService = new TodolistServiceImpl($todolistRepository);
    $todolistView = new TodolistView($todolistService);

    $todolistView->showTodoList();
    $todolistView->removeTodolist();
    $todolistView->showTodoList();

}

testViewRemoveTodolist();
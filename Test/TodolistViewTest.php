<?php

require_once __DIR__ . "/../Entity/Todolist.php";
require_once __DIR__ . "/../Repository/TodolistRepository.php";
require_once __DIR__ . "/../Service/TodolistService.php";
require_once __DIR__ . "/../Utils/InputHelper.php";
require_once __DIR__ . "/../View/TodolistView.php";

use Entity\Todolist;
use Repository\TodolistRepositoryImpl;
use Service\TodolistServiceImpl;
use View\TodolistView;
use Helper\InputHelper;

function testViewShowTodolist(){
    $todolistRepository =  new TodolistRepositoryImpl();
    $todolistRepository->$todolist[1] = new Todolist("main bola");

    $todolistService = new TodolistServiceImpl($todolistRepository);
    $todolistView = new TodolistView($todolistService);
    $todolistView->showTodolist();

}

testViewShowTodolist();

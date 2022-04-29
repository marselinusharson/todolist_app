<?php

require_once __DIR__ . "/../Entity/Todolist.php";
require_once __DIR__ . "/../Repository/TodolistRepository.php";
require_once __DIR__ . "/../Service/TodolistService.php";


use Entity\Todolist;
use Repository\TodolistRepositoryImpl;
use SErvice\TodolistServiceImpl;

function testShowTodolist():void{
    $todolistRepository = new TodolistRepositoryImpl();
    $todolistRepository->todolist[1]= new Todolist("meditasi pagi");
    $todolistRepository->todolist[2]= new Todolist("Berdoa pagi");
    $todolistRepository->todolist[3]= new Todolist("Olahraga pagi");
    $todolistRepository->todolist[4]= new Todolist("Mandi pagi");
    $todolistService = new TodolistServiceImpl($todolistRepository);

    $todolistService->showTodolist();
}

testShowTodolist();
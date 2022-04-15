<?php
require_once __DIR__ . "/../Entity/Todolist.php";
require_once __DIR__ . "/../Repository/TodolistRepository.php";
require_once __DIR__ . "/../Service/TodolistService.php";

use Entity\Todolist;
use Repository\TodolistRepositoryImpl;
use Service\TodolistServiceImpl;

function testShowTodolist(): void{
    $todolistRepository = new TodolistRepositoryImpl();
    $todolistRepository->todolist[1] = new Todolist("Belajar PHP OOP");
    $todolistRepository->todolist[2] = new Todolist("Belajar PHP OOP");
    $todolistRepository->todolist[3] = new Todolist("Belajar PHP OOP");
    $todolistRepository->todolist[4] = new Todolist("Belajar PHP OOP");
    $todolistService = new TodolistServiceImpl($todolistRepository);
    
    $todolistService->showTodolist();
}
testShowTodolist();
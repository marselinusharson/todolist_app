<?php

require_once __DIR__ . "/Entity/Todolist.php";
require_once __DIR__ . "/Repository/TodolistRepository.php";
require_once __DIR__ . "/Service/TodolistService.php";
require_once __DIR__ . "/Utils/InputHelper.php";
require_once __DIR__ . "/View/TodolistView.php";

use Entity\Todolist;
use Repository\TodolistRepositoryImpl;
use Service\TodolistServiceImpl;
use Helper\InputHelper;
use View\TodolistView;

$todolistRepository = new TodolistRepositoryImpl();
$todolistService = new TodolistServiceImpl($todolistRepository);
$todolistView = new TodolistView($todolistService);

echo "--=APLIKASI TODOLIST=--".PHP_EOL;

$todolistView->showTodolist();



?>
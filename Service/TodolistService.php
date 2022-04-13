<?php

namespace Service{
    use Entity\Todolist;
    use Repository\TodolistRepository;

    interface TodolistService{
        function showTodolist(): void;
        function addTodolist(string $todo): void;
        function removeTodolist(int $number): void;
    }
}
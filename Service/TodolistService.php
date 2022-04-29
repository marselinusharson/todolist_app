<?php

namespace Service{
    use Entity\Todolist;
    use Repository\TodolistRepository;
    interface TodolistService{
        // public function addTodolist(Todolist $todo):void;
        public function showTodolist():void;
        // public function removeTodolist():void;
    }

    class TodolistServiceImpl implements TodolistService{
        public function __construct(private TodolistRepository $todolistRepository){

        }

        public function showTodolist():void{
            echo "TODOLIST:".PHP_EOL;
            $todolist = $this->todolistRepository->findAll();
            foreach($todolist as $idx=>$todo){
                echo $idx . "." . $todo->getTodo().PHP_EOL;
            }
        }


    }
}
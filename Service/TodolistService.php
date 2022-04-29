<?php

namespace Service{
    use Entity\Todolist;
    use Repository\TodolistRepository;

    interface TodolistService{
        public function showTodolist():void;
        public function addTodolist(string $todo): void;
        public function removeTodolist(int $idx):void;
    }

    class TodolistServiceImpl implements TodolistService{

        public function __construct(private TodolistRepository $todolistRepository){

        }
        public function showTodolist():void{
            echo "TODOLIST:".PHP_EOL;
            $todolist = $this->todolistRepository ->findAll();
            foreach($todolist as $idx => $todo){
                echo $idx . "." . $todo->getTodo().PHP_EOL;
            }

        }
        public function addTodolist(string $todo): void{
            $todo = new Todolist($todo);
            $this->todolistRepository->save($todo);
            echo "SUKSES MENAMBAH TODO".PHP_EOL;

        }
        public function removeTodolist(int $idx):void{
            if($this->todolistRepository->remove($idx)){
                echo "SUKSES MENGHAPUS TODO KE-$idx".PHP_EOL;
            }else{
                echo "GAGAL MENGHAPUS TODO KE-$idx".PHP_EOL;
            }

        }
    }
}
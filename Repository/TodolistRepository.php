<?php


namespace Repository{
    use Entity\Todolist;
    interface TodolistRepository{
        public function findAll():array;
        public function save(Todolist $todo):void;
        public function remove(int $idx):bool;
    }
    
    
    class TodolistRepositoryImpl implements TodolistRepository{

        public array $todolist = [];

        public function findAll():array{
            return $this->todolist;

        }
        public function save(Todolist $todo):void{

        }
        public function remove(int $idx):bool{

        }
        
    }
}
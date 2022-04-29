<?php


namespace Repository{
    use Entity\Todolist;
    interface TodolistRepository{
        public function findAll():array;
        public function save(Todolist $todo):void;
        public function remove(int $idx):bool;
    }
    
    
    class TodolistRepositoryImpl implements TodolistRepository{

        private array $todolist = [];

        public function findAll():array{
            return $this->todolist;

        }
        public function save(Todolist $todo):void{
            $lastIdx = sizeof($this->todolist) + 1 ;
            $this->todolist[$lastIdx] = $todo;
        }
        public function remove(int $idx):bool{
            if($idx > sizeof($this->todolist)){
                return false;
            }else{
                for($i = $idx; $i< sizeof($this->todolist);$i++){
                    $this->todolist[$i] = $this->todolist[$i + 1];
                }
                unset($this->todolist[sizeof($this->todolist)]);
                return true;
            }
        }
        
    }
}
<?php

namespace Service{
    use Entity\Todolist;
    use Repository\TodolistRepository;
    interface TodolistService{
        public function addTodolist(string $todo):void;
        public function showTodolist():void;
        public function removeTodolist(int $idx):void;
    }
    
    class TodolistServiceImpl implements TodolistService{
        public function __construct(private TodolistRepository $todolistRepository){

        }

        public function showTodolist():void{
            $todolist = $this->todolistRepository->findAll();
            if(sizeof($todolist) > 0){
                echo "TODOLIST:".PHP_EOL;
            }
            foreach($todolist as $idx=>$todo){
                echo $idx . "." . $todo->getTodo().PHP_EOL;
            }
        }

        public function addTodolist(string $todo):void{
            $todolist = new Todolist($todo);
            $this->todolistRepository->save($todolist);
        }

        public function removeTodolist(int $idx):void{
            if($this->todolistRepository->remove($idx)){
                echo "TODOLIST BERHASIL DIHAPUS".PHP_EOL;
            }else{
                
                echo "TODOLIST GAGAL DIHAPUS".PHP_EOL;
            }
        }
    }
}
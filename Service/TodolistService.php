<?php
 namespace Service{
     use Model\Todolist;
     use Repository\TodolistRepo;

     interface TodolistService{
         public function showTodolist():void;
         public function addTodolist(string $todo):void;
         public function removetodolist(int $id):void;
        }
        class TodolistServiceImpl implements TodolistService{
            public function __construct(private TodolistRepo $todolistRepository){
                
            }
            public function showTodolist():void{
                $todolist = $this->todolistRepository->findAll();
                if(sizeof($todolist) > 0){
                    echo "TODOLIST:".PHP_EOL;
                }
                foreach($todolist as $todo){
                    echo $todo->getId().".".$todo->getTodo().PHP_EOL;
                }
            }
            public function addTodolist(string $todo):void{
                $todolist = new Todolist($todo);
                $this->todolistRepository->save($todolist);
                
            }
            public function removetodolist(int $id):void{
                $success = $this->todolistRepository->remove($id);
                if($success){
                    echo "Berhasil menghapus Todo id-$id".PHP_EOL;
                }else{
                    echo "Gagal menghapus Todo id-$id".PHP_EOL;

                }
            }
        }
    }
?>
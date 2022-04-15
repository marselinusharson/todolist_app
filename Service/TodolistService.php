<?php

namespace Service{
    use Entity\Todolist;
    use Repository\TodolistRepository;

    interface TodolistService{
        function showTodolist(): void;
        function addTodolist(string $todo): void;
        function removeTodolist(int $number): void;
    }
    class TodolistServiceImpl implements TodolistService{
        private TodolistRepository $todolistRepository;

        public function __construct(TodolistRepository $todolistRepository){
            $this->todolistRepository = $todolistRepository;
        }
        function showTodolist(): void{
            echo "TODOLIST".PHP_EOL;
            // mengakses array todolist dari TodolistRepository
            $todolist = $this->todolistRepository->findAll();
            // menampilkan array dengan mengakses method getTodo()
            foreach( $todolist as $item =>$value){
                echo "$item. ".$value->getTodo().PHP_EOL;
            }
        }
        function addTodolist(string $todo): void{
            $todolist = new Todolist($todo);
            $this->todolistRepository->save($todolist);
            echo "SUKSES MENAMBAHKAN TODO".PHP_EOL;
        }
        public function removeTodolist(int $number): void{
            if($this->todolistRepository->remove($number)){
                echo "SUKSES MENGHAPUS TODOLIST".PHP_EOL;
            }else{
                echo "GAGAL MENGHAPUS TODOLIST".PHP_EOL;

            }

        }
    }

}
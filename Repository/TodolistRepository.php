<?php

namespace Repository{
    use Entity\Todolist;
    
    interface TodolistRepository{
        function save(Todolist $todolist): void;
        function remove(int $number): bool;
        function findAll():array;
    }
    
    class TodolistRepositoryImpl implements TodolistRepository{

        private  array $todolist = array();

        function findAll():array{
            return $this->todolist;
        }
        function save(Todolist $todolist): void{
            // menyiman todo yang dimasukkan ke ahir dari elemen array
            $item = sizeof($this->todolist) + 1; //variabel temporary
            $this->todolist[$item] = $todolist;
        }
        function remove(int $number): bool{
            if($number > sizeof($this->todolist)){
                return false;
            }else{

                // menggeser todo tang berada pada posisi setelah todo yang kehapus ke depan
                for($i = $number; $i< sizeof($this->todolist);$i++){
                    $this->todolist[$i]= $this->todolist[$i + 1];
                }
                unset($this->todolist[sizeof($this->todolist)]);
                return true;
            }
        }
    }

}
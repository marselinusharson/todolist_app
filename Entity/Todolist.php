<?php

namespace Entity{
    class Todolist 
    {
        private $id;
        public function __construct(private string $todo = ""){

        }

        public function setTodo($todo):void{
            $this->todo = $todo;
        }
        public function getTodo():string{
            return $this->todo;
        }

    }
}
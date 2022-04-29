<?php 

namespace Entity{

    class Todolist{

        public function __construct(private string $todo = ""){

        }

        public function setTodo(string $todo): void
        {
            $this->todo = $todo;
        }

        public function getTodo(): string{
            return $this->todo;
        }
    }
}
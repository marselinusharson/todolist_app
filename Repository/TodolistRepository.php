<?php
 namespace Repository{
     use Model\Todolist;
     interface TodolistRepo{
         public function save(Todolist $todo):void;
         public function remove(int $id):bool;
         public function findAll():array;
        }

     class TodolistRepoImpl implements TodolistRepo{
         public function __construct(private \PDO $conn){

         }
         private array $todolist = [];
         public function findAll():array{
            $sql = "SELECT id, todo FROM todolist";
            $statement = $this->conn->prepare($sql);
            $statement->execute();

            $result = [];
            foreach($statement as $row){
                $todolist = new Todolist();
                $todolist->setId($row['id']);
                $todolist->setTodo($row['todo']);
                $result[]= $todolist;
            }
            return $result;
         }
         public function save(Todolist $todo):void{
            $sql = "INSERT INTO todolist (todo) VALUES(?)";
            $statement = $this->conn->prepare($sql);

            $success = $statement->execute([$todo->getTodo()]);
            if($success){
                echo "BERHASIL MENAMBAH TODO".PHP_EOL;
            }else{

                echo "GAGAL MENAMBAH TODO".PHP_EOL;
            }
         }
         public function remove(int $id):bool{
             $sql = "SELECT id FROM todolist WHERE id = ?";
             $statement = $this->conn->prepare($sql);
             $statement->execute([$id]);
             if ($statement->fetch()){
                 $sql = "DELETE FROM todolist WHERE id = ?";
                 $statement = $this->conn->prepare($sql);
                 $statement->execute([$id]);

                return true;
             }else{

                 return false;
             }

         }
     }
 }


?>
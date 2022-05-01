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
            try{
                $sql = "INSERT INTO todolist (todo) VALUES(?)";
                $statement= $this->conn->prepare($sql);
                $statement_execute = $statement->execute([$todo->getTodo()]);
                
                if($statement_execute){
                    $_SESSION['message'] = "Inserted Successfully";
                    header("Location: /app.php");
                    exit();
                }else{
                    $_SESSION['message'] = "Not Inserted";
                    header("Location: /app.php");
                    exit();
                }
    
            }catch(PDOException $e){
                echo $e->getMessage();
            }
       
         }
         public function remove(int $id):bool{
           try{
                $sql = "DELETE FROM todolist WHERE id = ?";
                $statement= $this->conn->prepare($sql);
                $sql_execute = $statement->execute([$id]);
                
                if($sql_execute){
                    return true;
                }else{
                    return false;
                }
    
            }catch(PDOException $e){
                echo $e->getMessage();
            }
         }
     }
 }


?>
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
                foreach($todolist as $todo):?>
                    <li class="list-group-item">
                        <h6>
                            <?=$todo->getTodo() ?>
                            <form class="float-end" method="post">
                                <button class="btn btn-danger" name="delete_todo" type="submit" value="<?= $todo->getId()?>">Done</button>
                            </form>
                        </h6>
                    </li>
                <?php endforeach ?>
            <?php
            }
            public function addTodolist(string $todo):void{
                $todolist = new Todolist($todo);
                $this->todolistRepository->save($todolist);
                
            }
            public function removetodolist(int $id):void{
                $success = $this->todolistRepository->remove($id);
                if($success){
                    $_SESSION['message'] = "Delete Successfully";
                    header("Location: /app.php");
                    exit();
                }else{
                    $_SESSION['message'] = "Not Deleted";
                    header("Location: /app.php");
                    exit();
                }
            }
        }
    }
?>
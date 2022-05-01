<?php
namespace View{
    use Service\TodolistService;
    use Helper\InputHelper;

    class TodolistView{
        public function __construct(private TodolistService $todolistService){

        }
        function showTodolist():void{?>
            <div class="container">
                <form class="from-group mb-2" method="post">
                    <input class="form-control" name='todo' placeholder="new todo.." type="text">
                    <button class="btn btn-primary mt-2" type="submit" name="add_todo">Add Todo</button>
                </form>
                <ul class="list-group">
                    <?php $this->todolistService->showTodolist();  ?>
                </ul>
            </div>
        <?php 
            if(isset($_POST['delete_todo'])){
                $this->removeTodolist();
            }

            if(isset($_POST['todo'])){
                $this->addTodolist();
            }
        }

        function addTodolist():void{
            $todo =\htmlspecialchars( $_POST['todo']);
                $this->todolistService->addTodolist($todo);
        }
        
        function removeTodolist():void{
            $id=htmlspecialchars($_POST['delete_todo']);
            $this->todolistService->removeTodolist($id);
        }
    }
}
?>
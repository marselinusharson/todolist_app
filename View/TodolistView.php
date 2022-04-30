<?php
namespace View{
    use Service\TodolistService;
    use Helper\InputHelper;

    class TodolistView{
        public function __construct(private TodolistService $todolistService){

        }
        function showTodolist():void{

            while(true){
                $this->todolistService->showTodolist();

                echo "MENU".PHP_EOL;
                echo "[1] Add Todo".PHP_EOL;
                echo "[2] Remove Todo".PHP_EOL;
                echo "[x] Exit".PHP_EOL;
                $select = InputHelper::input("Select");

                if($select == '1'){
                    $this->addTodolist();
                }else if($select == '2'){
                    $this->removeTodolist();
                    
                }else if($select == 'x'){
                    break;
                }else{
                    echo "Warning! Input not macth".PHP_EOL;
                }

            }
            echo "\nSAMPAI JUMPA".PHP_EOL;
        }
        function addTodolist():void{
            echo "ADD TODO".PHP_EOL;
            $todo = InputHelper::input("Input todo,[x] for cancel");
            if($todo == 'x'){
                echo "Cancel add Todo".PHP_EOL;
            }else{
                $this->todolistService->addTodolist($todo);
            }
        }
        
        function removeTodolist():void{
            echo "REMOVE TODO".PHP_EOL;
            $id = InputHelper::input("Input id todo, [x] for cancel:");
            
            if($id == 'x'){
                echo "Cancel remove Todo".PHP_EOL;
            }else{
                $this->todolistService->removeTodolist($id);
            }
        }
    }
}
?>
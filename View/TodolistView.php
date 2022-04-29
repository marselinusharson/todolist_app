<?php

namespace View{
    use Service\TodolistService; 
    use Helper\InputHelper;

    class todolistView{

        public function __construct(private TodolistService  $todolistService){

        }

        function showTodolist(): void{
            while(true){
                $this->todolistService->showTodolist();
                echo "MENU".PHP_EOL;
                echo "[1] Menambah Todo".PHP_EOL;
                echo "[2] Menghapus Todo".PHP_EOL;
                echo "[x] Keluar dari aplikasi".PHP_EOL;


                $pilihan = InputHelper::input("pilih");
                if($pilihan == "1"){
                    $this->addTodolist();
                }else if($pilihan == "2"){
                    $this->removeTodolist();
                }else if($pilihan == "x"){
                    break;

                }else{
                    echo "input salah".PHP_EOL;    
                }
                

            }
            echo "\nSAMPAI JUMPA".PHP_EOL;


        }
        function addTodolist(){
            echo "-TAMBAH TODO-".PHP_EOL;

            $pilihan = InputHelper::input("tambahkan todo, klik [x] untuk batal");
            if($pilihan == 'x'){
                echo "BATAL MENAMBAH TODO".PHP_EOL;
            }else{
                $this->todolistService->addTodolist($pilihan);
            }
        }
        function removeTodolist():void{
            echo "-MENGHAPUS TODO-".PHP_EOL;

            $pilihan = InputHelper::input("input index todo [x] untuk batal");

            if($pilihan == "x"){
                echo "BATAL MENGHAPUS TODO".PHP_EOL;
            }else{
                $this->todolistService->removeTodolist($pilihan);
            }
        }
    }
}
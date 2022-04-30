<?php

namespace View{
    use Helper\InputHelper;
    use Repository\TodolistRepository;
    use Service\TodolistService;

    class TodolistView{

        public function __construct(private TodolistService $todolistService){

        }
        function showTodolist():void{
            while(true){
                $this->todolistService->showTodolist();
                echo "MENU".PHP_EOL;
                echo "[1] Tambah Todo".PHP_EOL;
                echo "[2] Hapus Todo".PHP_EOL;
                echo "[x] Keluar".PHP_EOL;

                $pilihan  = InputHelper::input("Pilih");

                if($pilihan == '1'){
                    $this->addTodolist();
                }else if($pilihan == '2'){
                    $this->removeTodolist();
                }else if($pilihan == 'x'){
                    break;
                }else{
                    echo "pilihan tidak dikenali".PHP_EOL;
                }
            }
            echo "\nSAMPAI JUMPA".PHP_EOL;
        }
        function addTodolist():void{
            echo "-TAMBAH TODO-".PHP_EOL;
            $todo = InputHelper::input("masukan todo, [x] untu batal");
            if($todo == 'x'){
                echo "BATAL MENGHAPUS".PHP_EOL;
            }else{
                $this->todolistService->addTodolist($todo);
                echo "BERHASIL MENAMBAH TODO".PHP_EOL;
            }
        }
        function removeTodolist():void{
            echo "-HAPUS TODO-".PHP_EOL;
            $index = InputHelper::input("Masukan nomor todo, [x] untuk batal");
            if($index == 'x'){
                echo "BATAL MENGHAPUS TODO".PHP_EOL;

            }else{
                $this->todolistService->removeTodolist($index);
            }
        }
    }
}


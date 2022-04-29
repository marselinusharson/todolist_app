<?php
namespace View{
    use Service\TodolistService;
    use Helper\InputHelper;
    class TodolistView{

        public function __construct(private TodolistService $todolistService)
        {
            $this->todolistService = $todolistService;
        }
        function showTodoList(): void{
            while (true){
               $this->todolistService->showTodolist();
                echo "MENU".PHP_EOL;
                echo "[1] Menambah todo".PHP_EOL;
                echo "[2] Menghapus todo".PHP_EOL;
                echo "[x] keluar".PHP_EOL;
                $pilihan = InputHelper::input("Pilih");
                if($pilihan == "1"){
                    $this->addTodolist();
                }else if($pilihan == "2"){
                    $this->removeTodolist();
                }else if($pilihan == "x"){
                    break;
                }else{
                    echo "WARNING!! Input tidak sesuai".PHP_EOL;
                }
            }
            echo "Sampai Jumpa".PHP_EOL;
        }
        
        function addTodolist(): void{
                echo "Tambah Todo".PHP_EOL;
                $todo = InputHelper::input ("input Todo ([x] jika ingin batal)");
                if($todo == "x"){
                    echo "todo tidak ditambahkan".PHP_EOL;
                }else{
                    $this->todolistService->addTodolist($todo);
                }
        
        }
        function removeTodolist(): void{
            echo "Menghapus Todo".PHP_EOL;
            $pilihan = InputHelper::input("select nomor todo (press [x] jika ingin batal menghapus) ");
            if($pilihan == "x"){
                echo "Penghapusan dibatalkan".PHP_EOL;
            }else{
                $this->todolistService->removeTodolist($pilihan);
            }
        }
    }
}
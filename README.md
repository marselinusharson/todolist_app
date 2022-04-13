# todolist_app

penerapan konsep OOP pada apliksi sederhana berbasis terminal

Aplikasi ini menerapkan beberapa prinsip clean architecture dan OOP pada PHP sehingga menghasilkan aplikasi berbasis comand line yang modular

Aplikasi terdiri dari beberapa layer

1. Entity
   merupakan inti dari aplikasi atau datanya
   dalam hal ini entity adalah Todolist
   Class Todolist dienkaplulasi dalam namespace Entity dan memiliki properti $todo dengan visibility private. Selanjutnya memiliki argumen berupa string dengan default value string kosong yang akan menerima data todo yang dikirim saat pembuatan objeknya.
   Agar objek instance nya dapat mengakses private properties dari class Todolist maka ditambahkan magic function getter untuk mendapatkan properti dan setter untuk mengubah data pada properti

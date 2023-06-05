<?php 
/**
 * Berfungsi sebagai orang tua dari controller lain
 * yang akan dibuat
 * menghubungkan antara view dan model
 */

 class Controller 
 {
     public function view($view, $data = [])
     {
        //  Cek jika file ada
        if (file_exists('../app/views/'.$view.'.php')) {
            // Panggil view
            require_once '../app/views/'.$view.'.php';
        } else {
            die('File tampilan tidak ada');
        }
     }

     public function model($model)
     {
        //  Panggil Model
        require_once '../app/models/'.$model.'.php';

        // Kembalikan kedalam bentuk model
        return new $model();

     }
 }
 
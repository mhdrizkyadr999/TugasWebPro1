<?php 

//Core/Controller.php

class Controller {

    // method untuk memanggil view

    //Param1 = nama view yang ingin dipanggil
    //Parm2 = data yang ingin dikirimkan ke view (optional)

    public function view($view, $data = []) {
        require_once '../app/views/' . $view . '.php';
    }

    //method untuk memanggil model
    //Kenapa Parameter 1 pada model
    //Karena yang kita butuh hanya nama file model nya saja
    public function model($model) {
        require_once '../app/models/' . $model . '.php';
        return new $model;
    }

    
}
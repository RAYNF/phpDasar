<?php

class Controller
{
    //fungsi view
    public function view($view,$data = []){
        require_once '../app/views/' . $view . '.php';
    }
}
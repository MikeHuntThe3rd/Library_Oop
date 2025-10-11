<?php


namespace App\Controllers;
use App\requests\Querys;

class Controller{
    protected Querys $query;

    public function __construct(){
        $this->query = new Querys();
    }
}
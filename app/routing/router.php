<?php

namespace App\routing;

use App\requests\Querys;
use App\Controllers\BOOKcontroller;
use App\Views\Render;
class Router{
    //  public function __construct(){
    //     $obj = new Querys();
    //     $img =  $obj->AllTableContents()[0];
    //     Render::IncludeFile("BOOK/new");
    //     echo '<img src="data:image/png;base64,'.base64_encode($img['img']).'"/>';
    // }
    public function ReqHandle(){
        $MethodType = strtoupper($_SERVER["REQUEST_METHOD"]);
        $ReqURI = $_SERVER["REQUEST_URI"];
        switch ($MethodType){
            case "GET":
                $this->GETreq($ReqURI);
                break;
            case "POST":
                $this->POSTreq($ReqURI);
                break;
            case "PATCH":
                break;
            case "DELETE":
                break;
            default:
                echo "error";
                break;
        }
    }
    public function GETreq($URI){
        switch ($URI){
            case "/book":
                $book = new BOOKcontroller();
                $book->index();
                break;
            case "/add":
                $book = new BOOKcontroller();
                $book->add();
                break;
            default:
                echo "no GET uri matched the input";
                break;
        }
    }
    public function POSTreq($ReqURI){
        $data = $this->FilterPostKeys($_POST);
        $id = $data["id"] ?? null;
        switch ($ReqURI){
            case "/book":
                $sbook = new BOOKcontroller();
                $sbook->SavePOSTData($data);
                break;
            default:
                echo "no POST uri matched the input";
                break;
        }
    }
    public function FilterPostKeys($data){
        $filterKeys = ['_method', 'submit', 'btn-del', 'btn-save', 'btn-edit', 'btn-plus', 'btn-update'];
        return array_diff_key($data, array_flip($filterKeys));
    }
}


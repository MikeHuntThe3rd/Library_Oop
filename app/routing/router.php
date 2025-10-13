<?php

namespace App\routing;

use App\Controllers\WRITERcontroller;
use App\Controllers\BOOKcontroller;
class Router{
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
        $data = $this->FilterPostKeys($_POST);
        $id = $data["ISBN"] ?? null;
        switch ($URI){
            case "/":
                header('location: /book');
                break;
            case "/book":
                $book = new BOOKcontroller();
                $book->index();
                break;
            case "/book/add":
                $book = new BOOKcontroller();
                $book->add();
                break;
            case "/writer":
                $writer = new WRITERcontroller();
                $writer->index();
                break;
            case "/writer/add":
                $writer = new WRITERcontroller();
                $writer->add();
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
            //books
            case "/search":
                $ConditionalIndex = new BOOKcontroller();
                $ConditionalIndex->index($ConditionalIndex->Search($data["input"]));
                break;
            case "/book":
                $sbook = new BOOKcontroller();
                $sbook->SavePOSTData($data);
                break;
            case "/book/Sedit":
                $sbook = new BOOKcontroller();
                $sbook->EditWithPOSTData($data, $id);
                break;
            case "/book/edit":
                $book = new BOOKcontroller();
                $book->edit($id);
                break;
            case "/book/delete":
                $book = new BOOKcontroller();
                $book->delete($id);
                break;
            //writers
            case "/writer":
                $writer = new WRITERcontroller();
                $writer->savePostData($data);
                break;
            case "/writer/edit":
                $writer = new WRITERcontroller();
                $writer->edit($id);
                break;
            case "/writer/delete":
                $writer = new WRITERcontroller();
                $writer->delete($id);
                break;
            case "/writer/Sedit":
                $writer = new WRITERcontroller();
                $writer->editWithPostData($id, $data);
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


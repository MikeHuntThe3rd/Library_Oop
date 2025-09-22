<?php

namespace App\Controllers;
use App\requests\Querys;
use App\Views\Render;
use App\db\database;

class BOOKcontroller {
    protected Querys $query;
    public function __construct(){
        $this->query = new Querys();
    }
    public function index(){
        $book = $this->query->AllTableContents();
        Render::IncludeFile("BOOK/list", ['books' => $book]);
    }
    public function add(){
        Render::IncludeFile("BOOK/new");
    }
    public function delete(){
        Render::InsertQuery("DELETE FROM books WHERE ISBN = :ISBN" []);
    }
    public function SavePOSTData($data){
        $sql = "INSERT INTO books (ISBN, name, img, writer, lang, price, publisher_id, genre_id)
                VALUES (:ISBN, :name, :img, :writer, :lang, :price, :publisher_id, :genre_id);";
        $img = file_get_contents($data["img"]);
        $data["img"] = $img;
        $this->query->InsertQuery($sql, $data);
        self::index();
    }
}
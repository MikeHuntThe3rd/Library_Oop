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
    public function delete($id){
        $this->query->InsertQuery("DELETE FROM books WHERE ISBN = :id", ["id" => $id ]);
        header('location: /book');
    }
    public function edit($id){
        $row = $this->query->SingleRow($id);
        $row[0]["currid"] = $id;
        Render::IncludeFile("BOOK/edit", ['row' => $row]);
    }
    public function SavePOSTData($data){
        foreach($data as $key => $str){
            if(empty($str)){
                self::index();
                echo "empty";
                return;
            }
        }
        if(!file_exists($data["img"])){
            self::index();
            echo "file not found ". $data["img"] ."";
            return;
        }
        if(in_array($data["ISBN"], $this->query->SingleTableContents())){
            self::index();
            return;
        }
        $data["genre"] = self::GetForeignTableId("genre", $data);
        $data["publisher"] = self::GetForeignTableId("publisher", $data);
        $sql = "INSERT INTO books (ISBN, name, img, writer, lang, price, publisher_id, genre_id)
                VALUES (:ISBN, :name, :img, :writer, :lang, :price, :publisher, :genre);";
        $img = file_get_contents($data["img"]);
        $data["img"] = $img;
        $this->query->InsertQuery($sql, $data);
        self::index();
    }
    public function EditWithPOSTData($data){
        foreach($data as $key => $str){
            if(empty($str)){
                header('location: /book');
                return;
            }
        }
        if(!file_exists($data["img"])){
            header('location: /book');
            return;
        }
        if(in_array($data["ISBN"], $this->query->SingleTableContents())){
            header('location: /book');
            return;
        }
        $data["genre"] = self::GetForeignTableId("genre", $data);
        $data["publisher"] = self::GetForeignTableId("publisher", $data);
        $sql = "UPDATE books SET ISBN=:ISBN, name=:name, img=:img, writer=:writer, lang=:lang, price=:price, publisher_id=:publisher, genre_id=:genre 
        WHERE ISBN=:id;";
        $img = file_get_contents($data["img"]);
        $data["img"] = $img;
        $this->query->InsertQuery($sql, $data);
        header('location: /book');
    }
    public function GetForeignTableId($table, $data){
        foreach($this->query->SingleTableContents("$table") as $AssocArray){
            if($AssocArray["$table"] == $data["$table"]){
                return $AssocArray["id"];
            }
        }
        $this->query->InsertQuery("INSERT INTO `". $table ."` (`". $table ."`) VALUES (:val);", ["val" => $data[$table]]);
        return self::GetForeignTableId($table, $data);
    }
    
}
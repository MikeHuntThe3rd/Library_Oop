<?php
namespace App\Controllers;
require_once __DIR__ . '\Controller.php';
use App\Controllers\Controller;
use App\Views\Render;

class BOOKcontroller extends Controller {
    public function index($book = []){
        if(count($book) == 0){
            $book = $this->query->AllTableContents();
        }
        Render::IncludeFile("BOOK/list", ['books' => $book]);
    }
    public function add(){
        $book = true;
        if(count($this->query->SingleTableContents("writer")) == 0){
            $book = false;
        }
        if($book){
            $wrt = $this->query->SingleTableContents("writer"); 
            Render::IncludeFile("BOOK/new", ["writer" => $wrt]);
        }
        else{
            Render::IncludeFile("WRITER/new");
        }
    }
    public function delete($id){
        $row = $this->query->SingleRow("books", "ISBN", $id);
        $row["img"] = "";
        $this->query->InsertQuery("DELETE FROM books WHERE ISBN = :id", ["id" => $id ]);
        //self::ForeignTableCleanup($row);
        header('location: /book');
    }
    public function edit($id){
        $row = $this->query->SingleRow("books", "ISBN", $id);
        $row["currid"] = $id;
        $row["publisher"] = $this->query->InsertQuery("SELECT publisher FROM publisher WHERE id=:id;", ["id" => $row["publisher_id"]])[0]["publisher"];
        $row["genre"] = $this->query->InsertQuery("SELECT genre FROM genre WHERE id=:id;", ["id" => $row["genre_id"]])[0]["genre"];
        $row["writers"] = $this->query->SingleTableContents("writer");
        Render::IncludeFile("BOOK/edit", ['row' => $row]);
    }
    public function SavePOSTData($data){
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
        $data["writer"] = self::GetForeignTableId("writer", $data);
        $sql = "INSERT INTO books (ISBN, name, img, lang, price, publisher_id, genre_id, writer_id)
                VALUES (:ISBN, :name, :img, :lang, :price, :publisher, :genre, :writer);";
        $img = file_get_contents($data["img"]);
        $data["img"] = $img;
        $this->query->InsertQuery($sql, $data);
        header('location: /book');
    }
    public function EditWithPOSTData($data, $id){
        $row = $data;
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
        if($data["id"] != $data["ISBN"] && in_array($data["ISBN"], $this->query->SingleTableContents())){
            header('location: /book');
            return;
        }
        $data["genre"] = self::GetForeignTableId("genre", $data);
        $data["publisher"] = self::GetForeignTableId("publisher", $data);
        $data["writer"] = self::GetForeignTableId("writer", $data);
        $img = file_get_contents($data["img"]);
        $data["img"] = $img;
        $sql = "UPDATE books SET ISBN=:ISBN, name=:name, img=:img, lang=:lang, price=:price, publisher_id=:publisher, genre_id=:genre, writer_id=:writer 
        WHERE ISBN=:id;";
        $row = $this->query->SingleRow("books", "ISBN", $id);
        $this->query->InsertQuery($sql, $data);
        self::ForeignTableCleanup($row);
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
    public function ForeignTableCleanup($row){
        $delPUB = true;
        $delGENR = true;
        if(!(count($this->query->SingleTableContents()) == 0)){
            foreach($this->query->SingleTableContents() as $Brow){
                if($Brow["publisher_id"] == $row["publisher_id"]){
                    $delPUB = false;
                }
                if($Brow["genre_id"] == $row["genre_id"]){
                    $delGENR = false;
                }
                if(!$delGENR && !$delPUB){
                    break;
                }
            }
        }
        if($delPUB){
            $this->query->InsertQuery("DELETE FROM publisher WHERE id=". $row["publisher_id"] .";");
        }
        if($delGENR){
            $this->query->InsertQuery("DELETE FROM genre WHERE id=". $row["genre_id"] .";");
        }
    }
    public function Search($InputStr){
        $table = $this->query->AllTableContents();
        $result = [];
        foreach($table as $row){
            foreach($row as $key => $value){
                if(\str_contains($value, $InputStr)){
                    $result[] = $row;
                    break;
                }
            }
        }
        return $result;
    }
}
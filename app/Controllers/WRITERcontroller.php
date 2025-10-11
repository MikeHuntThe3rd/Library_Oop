<?php

namespace App\Controllers;
require_once __DIR__ . '\Controller.php';
use App\Controllers\Controller;
use App\Views\Render;
use App\db\database;

class WRITERcontroller extends Controller {
    public function index(){
        $writer = $this->query->SingleTableContents("writer");
        Render::IncludeFile("WRITER/list", ["writers" => $writer]);
    }
    public function add(){
        Render::IncludeFile("WRITER/new");
    }
    public function edit($id){
        $row = $this->query->SingleRow("writer", "id", $id);
        Render::IncludeFile("WRITER/edit", data: ["row" => $row]);
    }
    public function savePostData($data){
        $sql = "INSERT INTO writer (writer, bio)
                    VALUES (:writer, :bio);";
        $this->query->InsertQuery($sql, $data);
        header('location: /writer');
    }
    public function editWithPostData($id, $data){
        foreach($data as $key => $str){
            if(empty($str)){
                header('location: /writer');
                return;
            }
        }
        $data["id"] = $id;
        $sql = "UPDATE writer SET writer=:writer, bio=:bio WHERE id=:id;";
        $this->query->InsertQuery( $sql, $data);
        header("location: /writer");
    }
    public function delete($id){
        $sql = "DELETE FROM writer WHERE id=:id";
        $this->query->InsertQuery($sql, ["id" => $id]);
        header("location: /writer");
    }
}
<?php

namespace App\requests;
use App\db\database;

class Querys{
    protected $db;
    public function __construct(){
        $this->db = database::getInstance();
    }
    public function SelectTable($var = "books"){
        return "SELECT * FROM `". $var ."`";
    }
    public function SingleRow($table, $id_field,  $id){
        $row = $this->db->SingleQuery("SELECT * FROM `$table` WHERE $id_field=:id", ["id"=> $id]);
        return $row[0];
    }
    public function SingleTableContents($table = "books"){
        $sql = self::SelectTable($table);
        $result = $this->db->SingleQuery( $sql );
        return $result;
    }
    public function AllTableContents(){
        $result = $this->db->SingleQuery( "SELECT ISBN, name, img, lang, price, publisher.publisher, genre.genre, writer.writer, writer.bio FROM `books` 
        JOIN genre ON genre.id = genre_id 
        JOIN publisher ON publisher.id = publisher_id
        JOIN writer ON writer.id = writer_id" );
        return $result;
    }
    public function InsertQuery($sql, $vars = []){
        return $this->db->SingleQuery($sql, $vars);
    }
}
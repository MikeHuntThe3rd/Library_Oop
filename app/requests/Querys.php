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
    public function SingleTableContents($table = "books"){
        $sql = self::SelectTable($table);
        $result = $this->db->SingleQuery( $sql );
        return $result;
    }
    public function AllTableContents(){
        $result = $this->db->SingleQuery( "SELECT ISBN, name, img, writer, lang, price, publisher.publisher, genre.genre FROM `books` 
        JOIN genre ON genre.id = genre_id 
        JOIN publisher ON publisher.id = publisher_id" );
        return $result;
    }
    public function InsertQuery($sql, $vars){
        $this->db->SingleQuery($sql, $vars);
    }
}
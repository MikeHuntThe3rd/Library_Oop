<?php

namespace data\db;

class database{
    public function GetConn(){
        $conn = \mysqli_connect("localhost","root",null,"library");
        if (!$conn) {
            echo "conn faliure";
        }
        return $conn;
    }
    public function SingleQuery($query){
        $conn = $this->GetConn();
        $result = $conn->query($query);
        return $result;
    }
    public function __construct(){
        $conn = \mysqli_connect("localhost","root",null,"");
        $exists = $conn->query("SELECT SCHEMA_NAME 
                    FROM INFORMATION_SCHEMA.SCHEMATA 
                    WHERE SCHEMA_NAME = 'library';
                    ");
        if($exists->num_rows == 0){
            $conn->multi_query(file_get_contents("c:\Users\simak_nud1nbw\OneDrive\Dokumentumok\pdf\db.sql"));
        }
    }
}


<?php


namespace App\db;

use App\db\database;
use PDO;

class DbCreate extends Database{
    public function Exists():bool {
        $result = $this->SingleQuery("SELECT SCHEMA_NAME
            FROM INFORMATION_SCHEMA.SCHEMATA
            WHERE SCHEMA_NAME = '". self::DEFAULT_CONFIG["database"] ."';");
        return !empty($result);
    }
    public function Create(){
        $this->getPdo()->setAttribute(PDO::MYSQL_ATTR_MULTI_STATEMENTS, true);
        $this->getPdo()->exec(file_get_contents("library.sql"));
        $this->getPdo()->setAttribute(PDO::MYSQL_ATTR_MULTI_STATEMENTS, false);
    }
    public function Fill(){

    }
}
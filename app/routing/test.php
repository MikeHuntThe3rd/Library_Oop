<?php

namespace router\routing;

use data\db\database;

class Test{
    public function __construct(){
        $obj = new database();
        $obj->GetConn();
    }
}


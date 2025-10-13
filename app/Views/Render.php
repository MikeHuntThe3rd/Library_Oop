<?php

namespace App\Views;

class Render{
    public static function IncludeFile(string $file, $data = []){
        $inc = __DIR__ . DIRECTORY_SEPARATOR . "$file.php";
        if(file_exists($inc)){
            extract($data);
            include $inc;
            return;
        }
    }
}
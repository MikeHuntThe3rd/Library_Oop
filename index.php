<?php
use App\routing\Router;
use App\db\database;
use App\db\DbCreate;

// $dir = __DIR__ . '/app';

// $files = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($dir));
// foreach ($files as $file) {
//     if ($file->isFile() && $file->getExtension() === 'php') {
//         require_once $file->getPathname();
//     }
// }
$appDir = __DIR__ . DIRECTORY_SEPARATOR . 'app';

foreach (glob($appDir . DIRECTORY_SEPARATOR . '*' . DIRECTORY_SEPARATOR . '*.php') as $file) {
    include_once $file;
}
$db = new DbCreate(["host" => "localhost", "user" => "root", "password" => "", "database" => "mysql"]);
if(!$db->Exists()) {
    $db->Create();
}
$obj = new Router();
$obj->ReqHandle();


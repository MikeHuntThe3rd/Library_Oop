<?php
use router\routing;
use router\routing\Test;

$dir = __DIR__ . '/app';

$files = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($dir));
foreach ($files as $file) {
    if ($file->isFile() && $file->getExtension() === 'php') {
        require_once $file->getPathname();
    }
}
$obj = new Test();
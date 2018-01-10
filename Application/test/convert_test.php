<?php

$filename = $argv[1] ?? '' ;

if(!$filename) {
    echo "No filename provided" . PHP_EOL ;
    echo 'Usage; ' . PHP_EOL ;
    echo __FILE__ . '<filename>' .PHP_EOL ;
    exit ;
}

require __DIR__ . '/../Autoload/Autoloader.php' ;

$convert = new Application\Parse\Convert() ;

echo $convert->scan($filename) ;
echo PHP_EOL ;
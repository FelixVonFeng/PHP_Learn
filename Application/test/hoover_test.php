<?php

define('DEFAULT_URL' , 'http://oreilly.com/') ;
define('DEFAULT_TAG' , 'a') ;

require __DIR__ . '/../Autoload/Autoloader.php' ;

$vac = new Application\Web\Hoover() ;

$url = strip_tags($_GET['url'] ?? DEFAULT_URL) ;
$tag = strip_tags($_GET['tag'] ?? DEFAULT_TAG) ;

echo 'Dump of tags:' . PHP_EOL ;
var_dump($vac->getTags($url , $tag)) ;

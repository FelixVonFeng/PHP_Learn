<?php

define('DEFAULT_URL' , 'unlikelysource.com') ;
define('DEFAULT_TAG' , 'img') ;

require __DIR__ . '/../Autoload/Autoloader.php' ;

$deep = new Application\Web\Deep() ;

$url = strip_tags($_GET['url'] ?? DEFAULT_URL) ;
$tag = strip_tags($_GET['tag'] ?? DEFAULT_TAG) ;

printf('<html><body>') ;

foreach ($deep->scan($url , $tag) as $item) {
    $src = $item['attributes']['src'] ?? NULL ;
    if($src && (stripos($src , 'png') || stripos($src , 'jpg'))) {
        printf('<br><img src = "%s" />' , $src) ;
    }
}

printf('</body></html>') ;

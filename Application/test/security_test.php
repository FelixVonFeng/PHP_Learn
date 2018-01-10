<?php

require __DIR__ . '/../Autoload/Autoloader.php' ;

$security = new Application\Web\Security() ;

$data = [
    '<ul><li>Lots</li><li>of</li><li>Tags</li></ul>' ,
    12345 ,
    'This is a string' ,
    'String with number 12345' ,
] ;

foreach($data as $item) {
    echo 'ORIGINAL: ' . $item . PHP_EOL ;

    echo 'FILTERING' . PHP_EOL ;
    printf('%12s : %s' . PHP_EOL , 'Strip Tags' ,
           $security->filterStripTags($item)) ;
    printf('%12s : %s' . PHP_EOL , 'Digits' ,
           $security->filterDigits($item)) ;
    printf('%12s : %s' . PHP_EOL , 'Alpha' ,
           $security->filterAlpha($item)) ;

    echo 'VALIFDATORS' . PHP_EOL ;
    printf('%12s : %s' . PHP_EOL , 'Alnum' ,
           ($security->validateAlnum($item)) ? 'T' : 'F') ;
    printf('%12s : %s' . PHP_EOL , 'Digits' ,
           ($security->validateDigits($item)) ? 'T' : 'F') ;
    printf('%12s : %s' . PHP_EOL , 'Alpha' ,
           ($security->validateAlpha($item)) ? 'T' : 'F') ;
}

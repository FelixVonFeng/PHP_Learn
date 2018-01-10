<?php

define('LOG_FILE' , '/home/felix/HACK_PEACE/Cookbook/Application/test/access.log.1') ;

require __DIR__ . '/../Autoload/Autoloader.php' ;

$freq = function($line) {
    $ip = $this->getIp($line) ;
    if($ip) {
        echo '.' ;
        $this->frequency[$ip] = (isset($this->frequency[$ip])) ? $this->frequency[$ip] + 1 : 1 ;
    }
} ;

foreach(glob(LOG_FILE) as $fn) {
    echo PHP_EOL . $fn . PHP_EOL ;
    $access = new Application\Web\Access($fn) ;
    foreach($access->fileIteratorByLine() as $line) {
        $freq->call($access , $line) ;
    }
}

arsort($access->frequency) ;
foreach($access->frequency as $key => $value) {
    printf("%16s : %6d" . PHP_EOL , $key , $value) ;
}
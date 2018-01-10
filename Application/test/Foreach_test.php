<?php

$a = [1 , 2 , 3] ;
foreach($a as $v) {
    printf("%2d\n" , $v) ;
    unset($a[1]) ;
}

$b = [1 , 2 , 3] ;
$b1 = &$b ;
foreach($b as $v) {
    printf("%2d\n" , $v) ;
    unset($b[1]) ;
}

$c = [1 , 2 , 3] ;
foreach($c as &$v) {
    printf("%2d - %2d\n" , $v , current($c)) ;
}

$d = [1] ;
foreach($d as &$v) {
    printf("%2d -\n" , $v) ;
    $d[1] = 2 ;
}

$e = [1 , 2 , 3 , 4] ;
foreach($e as &$v) {
    echo "$v\n" ;
    array_pop($e) ;
}

$f = [0 , 1 , 2 , 3] ;
foreach($f as &$x) {
    foreach($f as &$y) {
        echo "$x - $y\n" ;
        if($x == 0 && $y == 1) {
            unset($f[1]) ;
            unset($f[2]) ;
        }
    }
}
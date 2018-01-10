<?php
/**
*@Author Felix Von <feng2413506241@gmail.com>
*@Copyright 2017 Felix Von
*@License http://www.php.net/license/3_01.txt PHP License 3.01
*@File autoload_test.php
*@Time 2017年12月22日 星期五 19时09分03秒
*/

//require __DIR__.'/../Application/Autoload/Loader.php' ;
//Application\Autoload\Loader::init(__DIR__ . '/..') ;

require __DIR__.'/../Autoload/Autoloader.php' ;

$test = new Application\Test\TestClass() ; //exist
echo $test->getTest() ;

$fake = new Application\Test\FakeClass() ; //not exist
echo $fake->getTest() ;

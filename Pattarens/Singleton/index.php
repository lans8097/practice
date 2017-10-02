<?php

require 'Singleton.php';
require 'SingletonTrait.php';

echo '<p>Обычный одиночка</p>';
$test0 = Singleton::getInstance();
$test0->showCountAndPlus();
$test0->showCountAndPlus();

$test1 = Singleton::getInstance();
$test1->showCountAndPlus();
$test1->showCountAndPlus();

class testSingleTrait
{
    use SingletonTrait;

    private $count;

    public function showCountAndPlus()
    {
        echo '<p>'.$this->count++.'</p>';
    }

    public function speakHelloMy()
    {
        echo '<p>Hello:<b>'.__CLASS__.'</b> from:<b>'.__FILE__.'</b></p>';
    }
}


echo '<h2>test trait</h2>';
//Обычный одиночка
$test0 = testSingleTrait::getInstance();
$test0->showCountAndPlus();
$test0->showCountAndPlus();
$test0->showCountAndPlus();
$test0->speakHello();
$test2 = testSingleTrait::getInstance();
$test2->showCountAndPlus();
$test2->showCountAndPlus();
$test2->showCountAndPlus();
$test2->speakHelloMy();

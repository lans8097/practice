<style>
    div{
        float: left;
        border: solid 1px;
        margin: 2px;
        padding: 5px;
    }
</style>
<?php
require '../../functions.php';
require '../Singleton/SingletonTrait.php';
require 'Registry.php';
require 'RegistryTrait.php';
require 'RegistryLock.php';
require 'RegistrySingletonTrait.php';


echo '<div style="width:400px">';

echo '<h2>Обычный Registry:</h2>';
$RegDef = new Registry();
$RegDef->set('kay0','value 0');
$RegDef->set('kay1','value 1');
$RegDef->set('kay2','value 2');
$RegDef->set('kay3','value 3');
$RegDef->set('kay4','value 4');

dd_r($RegDef);

echo '<h3>Удоляем элементы</h3>';
$RegDef->drop('kay3');

dd_r($RegDef);

echo '</div>';

echo '<div style="width:400px">';
echo '<h2>Registry Lock and Trait:</h2>';
$RegDef = new RegistryLock();
$RegDef->set('kay0','value 0');
$RegDef->set('kay1','value 1');
$RegDef->set('kay2','value 2 locked', true);
$RegDef->set('kay3','value 3');
$RegDef->set('kay4','value 4');

dd_r($RegDef);


echo '<h3>Удоляем элементы</h3>';
$RegDef->drop('kay2');
$RegDef->drop('kay3');

dd_r($RegDef);

echo '</div>';

echo '<div style="width:400px">';
echo '<h2>А тут уже совсем зашквар.:</h2>';
echo '<p>Создаём объект состоящий из треитов Singleton и Registry</p>';

$Registry = RegistrySingletonTrait::getInstance();
$Registry->set('kay0','value 0');
$Registry->set('kay1','value 1');
$Registry->set('kay2','value 2');
$Registry->set('kay3','value 3');
$Registry->set('kay4','value 4');

dd_r($Registry);


echo 'Удоляем kay2 and kay3';
$Registry->drop('kay2');
$Registry->drop('kay3');

dd_r($Registry);

echo '</div>';

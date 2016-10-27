<?php
header('Content-Type: text/plain');
spl_autoload_register(function($className) {

    echo "PHP is including class: $className \n";

    // Ferit\Student => Ferit/Student for linux and mac
    $classNameToPath = strtr($className, '\\', DIRECTORY_SEPARATOR);

    //include needed class
    include "classes/". $classNameToPath . ".php";
});
//include 'classes/Inchoo/Developer.php';
//class is in classes/Inchoo/Developer.php
$developer = new \Inchoo\Developer();
var_dump($developer);
exit;


////////////


$student = new \Ferit\Student();
var_dump($student);

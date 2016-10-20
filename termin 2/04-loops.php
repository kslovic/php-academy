<?php
header('Content-Type: text/plain');
$a =[1, 'two', 'three', 4];
foreach($a as $value){
   // echo $value;
}
//break; break 2; continue;
$list= [
    '<a> - anchor',
    '<p> - paragraph',
    '<ul> - unorderes list',
    '<table> - table'
];
//echo "\tTag list:";
foreach($list as $value){
    $explodedvalues=explode(' - ', $value);
echo $explodedvalues[0]."\t".$explodedvalues[1]."\n";
}


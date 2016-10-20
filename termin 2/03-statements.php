<?php
header('Content-Type: text/plain');
$isTrue=true;
/*
if($isTrue){
    echo "It is true";
}
 * 
 */
$isFalse=false;
/*
if(!$isFalse){
   echo "It's false"; 
}
*/
//var_dump(123=='123abc'); 
//var_dump((1==1.0)==(true=='false'));
//var_dump(1==='1');
$result=$isTrue ? 'one' :'two';
$result= $istrue ?:false;

//is_array(), is_number(), is_null(), is_int()
//isset(), empty()


<?php
header('Content-Type: text/plain');
$dsn='mysql:host=localhost;dbname=academy;charset=utf8';
$username='root';
$password='';

try{
    $conn=new PDO($dsn, $username, $password);
} catch (PDFException $e) {
    echo 'Connection failed' . $e->getMessage();
    exit;

}
$sql= 'SELECT *FROM `attendee`';

$stm= $conn ->query($sql);
/*
while($row=$stm->fetch()){
    print $row['id'] . "\t";
    print $row['name'] . "\t";
    print $row['email'] . "\n";
}

foreach($stm->fetchAll() as $row){
    print $row['id'] . "\t";
    print $row['name'] . "\t";
    print $row['email'] . "\n";
}
 * 
 */
foreach($stm as $row){
    print $row['id'] . "\t";
    print $row['name'] . "\t";
    print $row['email'] . "\n";
}
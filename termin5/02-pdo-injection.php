<?php
header('Content-Type: text/plain');
if(!isset($_GET['id'])) {}

$dsn='mysql:host=localhost;dbname=academy;charset=utf8';
$username='root';
$password='';

try{
    $conn=new PDO($dsn, $username, $password);
} catch (PDFException $e) {
    echo 'Connection failed' . $e->getMessage();
    exit;

}
$sql= 'SELECT *FROM `attendee` WHERE id='.$_GET['id'];
echo 'SQL: ' . $sql . PHP_EOL . PHP_EOL;

$stm=$conn->query($sql);

echo 'Result:';
print_r($stm->fetchAll());

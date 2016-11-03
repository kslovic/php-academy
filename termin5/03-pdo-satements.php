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
$id=$_GET['id']; //user input
$sql= 'SELECT *FROM `attendee` WHERE id=?';

$stmt=$conn->prepare($sql);
$stmt->execute([$id]);

foreach($stmt as $row){
     print $row['id'] . "\t";
    print $row['name'] . "\t";
    print $row['email'] . "\n";
}


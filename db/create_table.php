<?php
$host = 'localhost';
$user = 'username';
$pw = 'userpw';
$dbName = 'book_management';
$mysqli = new mysqli($host, $user, $pw, $dbName);

// orders table
$sql = "CREATE TABLE orders (";
$sql = $sql."id int not null,";
$sql = $sql."order_sum int,";
$sql = $sql."book_sum int,";
$sql = $sql."date timestamp,";
$sql = $sql."primary key(id));";


if($mysqli->query($sql)){
 echo '테이블 생성 완료';
}else{
 echo '테이블 생성 실패';
}
?>

<?php
   $host = 'localhost';
   $user = 'yourname';
   $pw = 'userpassword';
   $dbName = 'book_management';
   $mysqli = new mysqli($host, $user, $pw, $dbName);

   if($mysqli){
       echo "MySQL 접속 성공";
   }else{
       echo "MySQL 접속 실패";
   }
?>

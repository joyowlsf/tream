<?php
   $host = 'localhost';
   $user = 'root';
   $pw = 'root';
   $dbName = 'book_management';
   $mysqli = new mysqli($host, $user, $pw, $dbName);

   if($mysqli){
       echo "MySQL 접속 성공";
   }else{
       echo "MySQL 접속 실패";
   }
//   $mysql -> query("insert into orders (order_sum,book_sum,date)values (1,1,now())");
// $mysqltime = date ("Y-m-d H:i:s", $phptime);
   $sql = "insert into orders (order_sum,book_sum,date) values";
   $sql = $sql."(1,1,'".date('Y-m-d H:i:s')."')";
   $mysqli -> query($sql);
   echo "success";

?>

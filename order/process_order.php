<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
    echo phpversion();
      $book1 = $_GET["book1"];
      $book2 = $_GET["book2"];
      $book3 = $_GET["book3"];

    $book1_sub = $book1 * 25000;
    $book2_sub = $book1 * 24000;
    $book3_sub = $book1 * 28000;
    $total_books = $book1 + $book2 + $book3;
    $total_price = ($book1*25000)+($book2*24000)+($book3*28000);
    ?>
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

       $sql = "insert into orders (order_sum,book_sum,date) values";
       $sql = $sql."($total_price,$total_books,'".date('Y-m-d H:i:s')."')";
       $mysqli -> query($sql);
       $mysqli->close();
   ?>

    <table border="1">
      <tr>
        <th>책 제목</th>
        <th>가격</th>
        <th>수량</th>
        <th>합계</th>
      </tr>
      <tr>
        <td>멀티미디어 배움터 2.0</td>
        <td>25,000원</td>
        <?php print "<td>$book1</td>\n"; ?>
        <?php print "<td>$book1_sub 원</td>"; ?>
      </tr>
      <tr>
        <td>(알기 쉬운) 알고리즘</td>
        <td>24,000원</td>
        <?php print "<td>$book2</td>\n"; ?>
        <?php print "<td>$book2_sub 원</td>"; ?>
      </tr>
      <tr>
        <td>비즈니스 정보 시스템</td>
        <td>28,000원</td>
        <?php print "<td>$book3</td>\n"; ?>
        <?php print "<td>$book3_sub 원</td>"; ?>
      </tr>
      <tr>
        <td>합계</td>
        <td>&nbsp;</td>
        <?php print "<td>$total_books</td>\n"; ?>
        <?php print "<td>$total_price 원</td>"; ?>
      </tr>
    </table>

    <?php
    $host = 'localhost';
    $user = 'root';
    $pw = 'root';
    $dbName = 'book_management';
    $link = mysqli_connect($host, $user,$pw);
    mysqli_select_db($link, $dbName);

    $result = mysqli_query($link, "SELECT * FROM orders order by date desc limit 5");
    $num_rows = mysqli_num_rows($result);

    echo "$num_rows Rows\n";
    //
    // $result = mysqli_query("SELECT * FROM orders", $mysqli);
    // $num_rows = mysqli_num_rows($result);
    // //
    // //$sql = "select * from oders order by date desc limit 5";
    // //$result = $mysqli->query($sql);


    print "<table border='1'>\n";
    print "<tr><th>번호</th><th>주문금액</th><th>서적 수</th><th>시간</th></tr>\n";
    for($i=0;$i <= $num_rows-1;$i++){
      $row = $result->fetch_row(); //질의 결과에서 한 열씩 불러와 $row에 저장
      print "<tr>";        //row에서 각 행 (column)의 값을 읽어내고 이름표 형식으로 만드는 부분
      print "<td>".$row[0]."</td>";
      print "<td>".$row[1]." 원</td>";
      print "<td>".$row[2]."</td>";
      print "<td>".$row[3]."</td>";
      print "</tr> \n";
    }
    $mysqli->close();
?>

  </body>
</html>

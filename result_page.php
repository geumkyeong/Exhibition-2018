<?php
  $host = 'localhost';
  $user = 'root';
  $password = '123456';
  $dbName = 'myDB';

  //DB 연결
  $link = mysqli_connect($host, $user, $password, $dbName);

  // 연결 오류 발생 시 스크립트 종료
  if(mysqli_connect_errno()) {
    die('Connect Error: '.mysqli_connect_error());
  }

  $query = "SELECT * FROM R";
  $result = mysqli_query($link, $query);

  // mysqli_fetch_assoc() : 필드명 참조하여 Data불러오기
  echo "<table border='1'><tr><th>E</th><th>I</th><th>S</th><th>N</th><th>T</th><th>F</th><th>J</th><th>P</th></tr>";
  while($row = mysqli_fetch_assoc($result)){
    echo "<tr>";
    echo "<td>".$row['e']."</td>";
    echo "<td>".$row['i']."</td>";
    echo "<td>".$row['s']."</td>";
    echo "<td>".$row['n']."</td>";
    echo "<td>".$row['t']."</td>";
    echo "<td>".$row['f']."</td>";
    echo "<td>".$row['j']."</td>";
    echo "<td>".$row['p']."</td>";
    echo "</tr>";
  }
  echo "</table>";

  //R(result) table의 마지막 행 불러오기
  $query = "SELECT * FROM R ORDER BY no DESC LIMIT 1";
  $result = mysqli_query($link, $query);

  $row = mysqli_fetch_assoc($result);

  if($row['e'] < $row['i']){
    echo '당신은 내향적인 사람입니다!';
  } else {
    echo '당신은 외향적인 사람입니다!';
  }

  mysqli_close($conn);
?>

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


  //user 테이블에서 name 가져오기
  $query = "SELECT name FROM USER ORDER BY num DESC LIMIT 1";
  $result = mysqli_query($link, $query);

  $row = mysqli_fetch_assoc($result);
  $name = $row['name'];

  //최근 결과 가져오기
  $query = "SELECT category, result FROM RESULT WHERE name='$name' ORDER BY NUM DESC LIMIT 8";
  $result = mysqli_query($link, $query);

  // mysqli_fetch_assoc() : 필드명 참조하여 Data불러오기
  //result DB 내용을 arr에 담기
  $arr = array();
  $i=0;
  while($row = mysqli_fetch_assoc($result)){
    $arr[$i] = $row['category'];
    $arr[$i+1] = $row['result'];
    $i = $i+2;
  }

  //조건검사
  if($arr[13] > $arr[15]) // i > e
    $r_arr[0] = $arr[12];
  else
    $r_arr[0] = $arr[14];

  if($arr[9] > $arr[11]) // n > s
    $r_arr[1] = $arr[8];
  else
    $r_arr[1] = $arr[10];

  if($arr[5] > $arr[7]) // f > t
    $r_arr[2] = $arr[4];
  else
    $r_arr[2] = $arr[6];

  if($arr[1] > $arr[3]) // p > j
    $r_arr[3] = $arr[0];
  else
    $r_arr[3] = $arr[2];


  //최종결과
  $r_str = $r_arr[0]."".$r_arr[1]."".$r_arr[2]."".$r_arr[3];


  //user 테이블에서 사용자를 찾아 결과 저장
  $query = "SELECT * FROM USER WHERE name='$name' ORDER BY num DESC LIMIT 1";
  $result = mysqli_query($link, $query);

  //결과 저장(user table)
  $row = mysqli_fetch_assoc($result);
  $num = $row['num'];

  //결과 저장(user table)
  $query = "UPDATE USER SET result='$r_str' WHERE num='$num'";
  $result = mysqli_query($link, $query);

  // echo "<p id='welcome'>Welcome to 'Personnality Type Test'</p>";
  echo "<div class='container'>";

  //결과 보여주기
  echo "<h1>".$name." 님의 결과는 ".$r_str." 입니다.</h1><BR>";

  echo "<img src='./MBTI성격유형.jpg'>";

    echo "<div class='content'>";

    //결과에 해당하는 유형 데이터 출력.
    if( $r_str == 'istj' ){
      echo '<h3>ISTJ(소금형)</h3>';
      echo '<p>신중하고 조용하며 집중력이 강하고 매사에 철저하다. 구체적, 체계적, 사실적, 논리적, 현실적인 성격을 띠고 있으며, 신뢰할 만 하다. 만사를 체계적으로 조직화시키려고 하며 책임감이 강하다. 성취해야 한다고 생각하는 일이면 주위의 시선에 아랑곳하지 않고 꾸준하고 건실하게 추진해 나간다.</p>';
      echo '<p>명확한 직무능력과 인내와 정확성과 조직력을 요하는 분야, 과업 지향적이고 현실에 기반을 둔 분야 - 사무직, 관리직, 법률, 회계, 엔지니어, 대행업자, 화학, 교육, 훈련, 사업, 은행감독원, 세무조사원 등</p>';
    }

    if( $r_str == 'isfj' ){
      echo '<h3>ISFJ(권력형)</h3>';
      echo '<p>조용하고 친근하고 책임감이 있으며 양심 바르다. 맡은 일에 헌신적이며 어떤 계획의 추진이나 집단에 안정감을 준다. 매사에 철저하고 성실하고 정확하다. 기계분야에는 관심이 적다. 필요하면 세세한 면까지도 잘 처리해 나간다. 충실하고 동정심이 많고 타인의 감정에 민감하다.</p>';
      echo '<p>자정확성과 조직성을 요하며, 반복적으로 연결되는 일상의 일과 타인의 관심과 관찰력이 필요한 분야 - 교사, 비서, 사회사업, 물리치료사, 의학, 종교계, 경호원, 서비스업 등</p>';
    }

    if( $r_str == 'istp' ){
      echo '<h3>ISTP(백과사전형)</h3>';
      echo '<p>차분한 방관자이다. 조용하고 과묵하며 절제된 호기심을 가지고 인생을 관찰하고 분석한다. 때로는 예기치 않게 유머 감각을 나타내기도 한다. 대체로 인간관계에 관심이 없고 기계가 어떻게, 왜 작동되는지 흥미가 많다. 논리적인 원칙에 따라 사실을 조직화하기를 좋아한다.</p>';
      echo '<p>실제적인 생산관리 분야, 해결해야 할 새롭고 긴박한 일을 처리하고 자신의 독립성이 보장되는 직업 분야 - 기계, 응용과학, 스포츠, 기술자, 측량기사, 상업디자이너, 교정직, 사무원, 법률, 통계, 경제, 판매 등</p>';
    }

    if( $r_str == 'isfp' ){
      echo '<h3>ISFP(성인군자형)</h3>';
      echo '<p>말없이 다정하고 친절하고 민감하며 자기 능력을 뽐내지 않고 겸손하다. 의견의 충돌을 피하고 자기 견해나 가치를 타인에게 강요하지 않는다. 남 앞에 서서 주도해 나가기 보다 충실히 따르는 편이다. 일하는 데에도 여유가 있다. 왜냐하면 목표를 달성하기 위해 안달복달하지 않고 현재를 즐기기 때문이다.</p>';
      echo '<p>개방되어 있고 다른 사람들과 쉽게 어울릴 수 있는 직업분야, 실제적인 행동 기술을 활용할 수 있는 분야 - 예술인, 성직자, 교직자, 요리사, 정원사, 간호사, 지질학자, 사회사업, 서비스업, 체육인 등</p>';
    }

    if( $r_str == 'intj' ){
      echo '<h3>INTJ(과학자형)</h3>';
      echo '<p>사고가 독창적이며 창의력과 비판적 분석력이 뛰어나며 내적 신념이 강하다. 독립적이고 단호하며 때때로 문제에 대하여 고집이 세다. 자신과 타인의 능력을 중요시하며 목적달성을 위하여 온 시간과 노력을 바쳐 일한다.</p>';
      echo '<p>직관력과 통찰력, 이론의 논리성을 탐색하는 분야 - 컴퓨터 프로그래머, 기술자, 사업분석가, 행정가, 철학, 엔지니어, 건축사, 자연과학자, 법조인 등</p>';
    }

    if( $r_str == 'infj' ){
      echo '<h3>INFJ(예언자형)</h3>';
      echo '<p>인내심이 많고 독창적이며 필요하거나 원하는 일이라면 끝까지 이루려고 한다. 자기일에 최선의 노력을 다한다. 타인에게 말없이 영향력을 미치며, 양심이 바르고 다른 사람에게 따뜻한 관심을 가지고 있다. 확고부동한 원리원칙을 중시한다. 공동선을 위해서는 확신에 찬 신념을 가지고 있다.</p>';
      echo '<p>자율성과 창의성을 인간교육에서 발휘하는 분야, 직관력과 사람 중심의 가치를 중시하는 분야 - 심리학자, 상담자, 성직자, 교직, 저술활동, 연구자문, 의사, 순수예술, 건축가, 사회사업가 등</p>';
    }

    if( $r_str == 'infp' ){
      echo '<h3>INFP(잔다르크형)</h3>';
      echo '<p>정열적이고 충실하나 상대방을 잘 알기 전까지는 이를 드러내지 않는 편이다. 학습, 아이디어, 언어, 자기 독립적인 일에 관심이 많다. 어떻게 하든 이루어내기는 하지만 일을 지나치게 많이 벌리려는 경향을 가지고 있다. 남에게 친근하기는 하지만, 많은 사람들을 동시에 만족시키려는 부담을 가지고 있다. 물질적 소유나 물리적 환경에는 별 관심이 없다.</p>';
      echo '<p>다른 사람들의 성장을 도모시키는 분야, 인간 이해와 인간 복지에 기여할 수 있는 분야 - 소설가, 연예인, 사회사업가, 성직자, 교수직, 저널리스트, 예술가, 정신과 의사, 건축가 등</p>';
    }

    if( $r_str == 'intp' ){
      echo '<h3>INTP(아이디어형)</h3>';
      echo '<p>조용하고 과묵하다. 특히 이론적 과학적 추구를 즐기며, 논리와 분석으로 문제를 해결하기를 좋아한다. 주로 자기 아이디어에 관심이 많으나 사람들의 모임이나 잡담에는 관심이 없다. 관심의 종류가 뚜렷하므로 자기의 지적 호기심을 활용할 수 있는 분야에서 능력을 발휘할 수 있다.</p>';
      echo '<p>추상적 개념과 논리적인 문제해결이 개입되는 분야, 사고와 논리를 활용할 수 있는 분야 - 분석자, 논리학자, 수학자, 철학자, 과학자, 건축가, 작가, 신문방송인, 통계, 연구, 컴퓨터 분야</p>';
    }

    if( $r_str == 'estp' ){
      echo '<h3>ESTP(활동가형)</h3>';
      echo '<p>실질적인 문제해결에 능하다. 근심이 없고 어떤 일이든 즐길 줄 안다. 기계 다루는 일이나 운동을 좋아하고 친구 사귀기를 좋아한다. 적응력이 강하고 관용적이며, 보수적인 가치관을 가지고 있다. 긴 설명을 싫어한다. 기계의 분해 또는 조립과 같은 실제적인 일을 다루는 데 능하다.</p>';
      echo '<p>정확한 사실 파악 능력, 논리와 분석능력, 적응력을 발휘할 수 있는 분야, 활동적이거나 연장이나 재료를 다루는 분야 - 전문 세일즈, 요식업, 건축업, 부동산, 무역업, 언론, 신용조사, 은행 경영자, 개인 서비스업 등</p>';
    }

    if( $r_str == 'esfp' ){
      echo '<h3>ESFP(사교형)</h3>';
      echo '<p>사교적이고 태평스럽고 수용적이고 친절하며, 만사를 즐기는 형이기 때문에 다른 사람들로 하여금 일에 재미를 느끼게 한다. 운동을 좋아하고 주위에 벌어지는 일에 관심이 많아 끼어들기 좋아한다. 추상적인 이론보다는 구체적인 사실을 잘 기억하는 편이다. 건전한 상식이나 사물 뿐 아니라 사람들을 대상으로 구체적인 능력이 요구되는 분야에서 능력을 발휘할 수 있다.</p>';
      echo '<p>사람들과 만나고 상호작용하는 분야, 순응을 요하고 실제적인 능력을 필요로 하는 분야 - 여행사, 유흥사업, 서비스, 판매, 영화, 프로듀서, 정치가, 연예인, 중재자, 비서직, 간호사, 교직, 건축업자 등</p>';
    }

    if( $r_str == 'estj' ){
      echo '<h3>ESTJ(사업가형)</h3>';
      echo '<p>구체적이고 현실적이고 사실적이며, 기업 또는 기계에 재능을 타고 났다. 실용성이 없는 일에는 관심이 없으며 필요할 때 응용할 줄 안다. 활동을 조직화하고 주도해 나가기를 좋아한다. 타인의 감정이나 관점에 귀를 기울일 줄 알면 훌륭한 행정가가 될 수 있다.</p>';
      echo '<p>조직 안에서 책임을 맡고 실제적인 일을 처리하는 분야, 현실적, 체계적, 논리적인 분야 - 행정, 관리직, 자기 사업, 제조 생산업, 건설, 판매관리자, 공장 감독자, 변호사, 재무담당 감독자 등</p>';
    }

    if( $r_str == 'esfj' ){
      echo '<h3>ESFJ(친선도모형)</h3>';
      echo '<p>마음이 따뜻하고 이야기하기 좋아하고, 사람들에게 인기가 있고 양심 바르고 남을 돕는 데에 타고난 기질이 있으며 집단에서도 능동적인 구성원이다. 조화를 중시하고 인화를 이루는데 능하다. 항상 남에게 잘해주며, 격려나 칭찬을 들을 때 가장 신바람을 낸다. 사람들에게 직접적이고 가시적인 영향을 줄 수 있는 일에 가장 관심이 많다.</p>';
      echo '<p>인화를 도모하는 분야, 규칙과 규정을 잘 따르고 의무와 봉사를 하는 분야, 행동을 요구하는 분야 - 자원봉사, 세일즈, 교직, 인력개발관리, 사회사업, 상담, 서비스업, 보건 종사자, 성직자 등</p>';
    }

    if( $r_str == 'enfp' ){
      echo '<h3>ENFP(스파크형)</h3>';
      echo '<p>따뜻하고 정열적이고 활기에 넘치며 재능이 많고 상상력이 풍부하다. 관심이 있는 일이라면 어떤 일이든지 척척 해낸다. 어려운 일이라도 해결을 잘하며 항상 남을 도와줄 태세를 가지고 있다. 자기 능력을 과신한 나머지 미리 준비하기보다 즉흥적으로 덤비는 경우가 많다. 자기가 원하는 일이라면 어떠한 이유라도 갖다 붙이며 부단히 새로운 것을 찾아 나선다.</p>';
      echo '<p>사람들과 상호작용이 요구되고 상황이 변화하는 분야, 분석적인 일의 분야 - 홍보활동가, 정치인, 판매요원, 배우, 예술가, 상담사, 성직자, 저널리스트, 광고, 경영 등</p>';
    }

    if( $r_str == 'entp' ){
      echo '<h3>ENTP(발명가형)</h3>';
      echo '<p>민첩하고 독창적이고 안목이 넓으며 다방면에 재능이 많다. 새로운 일을 시도하고 추진하려는 의욕이 넘치며, 새로운 문제나 복잡한 문제를 해결하는 능력이 뛰어나며 달변이다. 그러나 일상적이고 세부적인 면은 간과하기 쉽다. 한 일에 관심을 가져도 부단히 새로운 것을 찾아 나간다. 자기가 원하는 일이면 논리적인 이유를 찾아내는데 능하다.</p>';
      echo '<p>자율성과 다양성이 제공되는 분야, 도전성이 있고 단조롭지 않은 일의 분야 - 발명가, 과학자, 신문방송인, 언론인, 컴퓨터분석가, 기업가, 감사관, 산업설계분석, 엔지니어 등</p>';
    }

    if( $r_str == 'enfj' ){
      echo '<h3>ENFJ(언변능숙형)</h3>';
      echo '<p>주위에 민감하며 책임감이 강하다. 다른 사람들의 생각이나 의견을 중히 여기고, 다른 사람들의 감정에 맞추어 일을 처리하려고 한다. 편안하고 능란하게 계획을 내놓거나 집단을 이끌어 가는 능력이 있다. 사교성이 풍부하고 인기있고 동정심이 많다. 남의 칭찬이나 비판에 지나치게 민감하게 반응한다.</p>';
      echo '<p>나에 대한 기대치가 있고, 나의 공로를 인정해주며, 업무 능력의 성장과 발전을 격려받을 수 있는 분야 - 지도자, 통솔자, 정책가, 활동가, 지휘관, 커뮤니케이션 분야, 보건 의료 분야, 컨설팅 분야 등</p>';
    }

    if( $r_str == 'entj' ){
      echo '<h3>ENTJ(지도자형)</h3>';
      echo '<p>열성이 많고 솔직하고 단호하고 통솔력이 있다. 대중 연설과 같이 추리와 지적 담화가 요구되는 일이라면 어떤 것이든 능하다. 보통 정보에 밝고 지식에 대한 관심과 욕구가 많다. 때로는 실제의 자신보다 더 긍정적이거나 자신 있는 듯한 사람으로 비칠 때도 있다.</p>';
      echo '<p>독립적인 프로젝트를 추진할 수 있는 분야, 추진력과 통찰력, 분석력을 활용할 수 있는 분야 - 설계, 볍률, 경영관리, 군대장교, 지휘관, 자영업, 건축, 토목, 세일즈관리자, 컴퓨터 전문가 등</p>';
    }
    echo "</div>";
  echo "</div>";
  mysqli_close($conn);
?>

var questArr = [ '나는 행동에 집착하고 활동과 행동을 지향한다.', '집중을 잘 한다. ', '많은 일들이 생기는 대중적인 영역을 즐긴다. ',
'외부의 사건이나 질문에 대하여 신속하게 대응한다', '모방과 관찰을 통해 새로운 사실을 배운다. ',
'전통적인 것과 이미 친숙한 것들의 진가를 인정하며 즐긴다. ', '실제적으로 행동한다.',
'자료의 실제적이고 현실적인 적용을 알고 싶어 한다.', '나는 진실을 목표로 삼는다. 나의 이성으로 더 결정을 내린다.',
'비합리적인 논리를 금방 알아낸다.', '논리적인 원칙에 따라 세상만사가 이루어지기를 기대한다.',
'짧고 요약된 의사소통을 선호한다.', '나의 인생이 결정되어 있고 인생에 나의 의지를 반영하는 것을 선호한다.',
'나는 계획된 순서대로 정착된 삶을 위하여 일한다.', '나 자신을 통제하며 결단성이 있고 엄하다.',
'명확하게 언급하면서 입장과 결정에 대해 단언을 내린다.', '나의 개인적인 공간과 많은 사적인 시간을 필요로 한다.',
'집중할 수 있는 조용함을 추구한다.', '심사숙고를 통해 나의 생각을 발전시킨다.',
'나의 일에 집중하고 외부 사건들은 안중에 없다.', '역할이나 기대 등은 언제나 타협이 가능한 것으로 믿는다.',
'이전에 내가 얻은 작업경험이 나타내는 것보다는 좀 다르게 일을 한다.', '도전이나 혁신과 관련되는 새로운 기술을 배우는 것을 즐긴다.',
'사물을 일반적으로 언급하는 것을 좋아한다.', '나의 인간관계를 손상시킬 수도 있는 부정적인 면들로부터 회피한다.',
'업무의 기본으로 개인의 가치기준들과 더불어 다른 사람의 견해도 포함시킨다.', '다른 사람들과 동감하면서 그들과 관리하고 관여한다.',
'업무를 최대한 효과적으로 해내기 위해 조화를 필요로 한다.', '업무는 나의 인간관계를 침범하는 것으로 간주한다.',
'불시에 생기는 업무를 처리할 수 있을 때에 최선을 다한다.', '더 많은 정보를 수집하기 위해 결정에 얽매이는 것을 거부한다.',
'결정을 미루며 가능성을 찾는다.'];
var str = '';
var name = '';
var value = 0;


function quest() {
  for(var i = 1; i <= 8; i++){
    for(var num = 1; num <= 4; num++){
      str += questArr[num]+'<BR>';
      anser(name, num);
      str += '<BR>';
    }
    str += '<BR>';
  }
}

function anser(name, num) {
  for(var j = 1; j <= 5; j++){
    if(i == 1) name = 'e';
    else if(i == 2) name = 's';
    else if(i == 3) name = 't';
    else if(i == 4) name = 'j';
    else if(i == 5) name = 'i';
    else if(i == 6) name = 'n';
    else if(i == 7) name = 'f';
    else name = 'p';
    str += '<input type="radio" name="' + name + ''+ num +'" value="' + j + '"><label></label></input>';
  }
}

quest();

document.getElementById('wrap').innerHTML = str;

var radioBtn = document.querySelectorAll('#wrap > input');
var label = document.querySelectorAll('#wrap > label');

for( var i = 0; i < 160; i++ ){
  if(radioBtn[i].value == '1') { radioBtn[i].checked = true; label[i].innerHTML = '매우 그렇지않다';}
  else if(radioBtn[i].value == '2') label[i].innerHTML = '그렇지않다';
  else if(radioBtn[i].value == '3') label[i].innerHTML = '보통이다';
  else if(radioBtn[i].value == '4') label[i].innerHTML = '그렇다';
  else if(radioBtn[i].value == '5') label[i].innerHTML = '매우 그렇다';
}

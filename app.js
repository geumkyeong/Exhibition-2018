var wrap = document.getElementById('wrap');
var btn = document.querySelector('.btn'); //더보기 button.
var start = 0;
var end = 4; //최대 범주번호

function btnClick() { //더보기
    start += 4;
    end = start + 4;

    if(!(end == 32)){ getUrlData(radio); }
    else {
      getUrlData(radio);
      btn.removeEventListener('click', btnClick);
      btn.remove();//end에 다다르면 더보기 없애기
    }

}

btn.addEventListener('click', btnClick); //이벤트 리스너 추가

function radio(json) {
  var str = '';

  for(var i = start;  i < end; i++){
        var category = json.data[i].category; //범주
        var n = json.data[i].num;             //범주번호
        var question = json.data[i].question; //질문
        var value = json.data[i].value;       //점수
        var answer = json.data[i].answer;     //대답
        //<div class="${"Q" + n}"></div>
        str += `Q. <strong>${question}</strong>`;
        str += `<div class="${category + n}">`;
        for(var j = 0; j < 5; j++){
          if(value[j] == "1")
            str += `<input type="radio" name="${category + n}" value="${value[j]}" checked><label>${answer[j]}</label>`;
          else
            str += `<input type="radio" name="${category + n}" value="${value[j]}"><label>${answer[j]}</label>`;
        }
        str += '</div>'; //문제마다 줄바꿈//radioBtn[i].checked = true;
  }

  wrap.innerHTML += str;
}

getUrlData(radio);

function getUrlData(callback) {
  fetch('./data.json')
  .then(function(response){
      response.json().then(function(data){
          // console.log(data);
          callback(data)
      });
  })
  .catch(function(err){
      console.log('Fetch Error :-S', err);
  });
}

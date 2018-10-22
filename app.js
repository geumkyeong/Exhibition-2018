var wrap = document.getElementById('wrap');
var radioBtn = document.querySelectorAll('input');
var label = document.querySelectorAll('#wrap > label');


function radio(json) {
  var str = '';

  for(var i = 0; i < json.data.length; i++){
        var category = json.data[i].category; //범주
        var n = json.data[i].num;             //범주번호
        var question = json.data[i].question; //질문
        var value = json.data[i].value;       //점수
        var answer = json.data[i].answer;     //대답

        str += `<div class="${"Q" + n}">Q. ${question}</div>`;
        str += `<div class="${category + n}">`;
        for(var j = 0; j < 5; j++){
          if(value[j] == "1")
            str += `<label><input type="radio" name="${category + n}" value="1" checked>${answer[j]}</input></label>`;
          else
            str += `<label><input type="radio" name="${category + n}" value="${value[j]}">${answer[j]}</input></label>`;
        }
        str += '</div>'; //문제마다 줄바꿈//radioBtn[i].checked = true;
  }

  wrap.innerHTML = str;
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

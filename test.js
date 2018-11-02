var teststartImg = document.querySelector('.teststart-img');
var guestbookImg = document.querySelector('.guestbook-img');
var creatorImg = document.querySelector('.creator-img');
var sourceImg = document.querySelector('.source-img');

teststartImg.addEventListener("mouseover", mouseOver);
teststartImg.addEventListener("mouseout", mouseOut);

guestbookImg.addEventListener("mouseover", mouseOver);
guestbookImg.addEventListener("mouseout", mouseOut);

creatorImg.addEventListener("mouseover", mouseOver);
creatorImg.addEventListener("mouseout", mouseOut);

sourceImg.addEventListener("mouseover", mouseOver);
sourceImg.addEventListener("mouseout", mouseOut);

function mouseOver(event) {
  $(event.target).stop();
  var classname = document.getElementById(event.target.className.split("-")[0]);
  $(function(){
    $(event.target).fadeTo('slow', 0.4, function(){
      classname.style.visibility = 'visible'; //글자 나타나게
    });
  });
    // teststartImg.src = "https://github.com/claraqn/exhibition/blob/master/surveyfinal.png?raw=true";
}

function mouseOut(event) {
    var classname = document.getElementById(event.target.className.split("-")[0]);
    $(function(){
      $(event.target).fadeTo('fast', 1, function(){
        classname.style.visibility = 'hidden' //글자 사라지게
      });
    });
    // teststartImg.src = "https://github.com/claraqn/exhibition/blob/master/survey.png?raw=true";
}

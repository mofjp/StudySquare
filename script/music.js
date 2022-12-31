let el = document.getElementById("bgm");

function enableMute() {
  el.muted = true;
}

function disableMute() {
  el.muted = false;
}

$(function(){
  $('#Audio-Control button').click(function(){
    $('#Audio-Control button').toggleClass('active');
  });
});
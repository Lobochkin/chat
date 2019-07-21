'use strict';

(function () {
  var CODE_INTER = 13;
  var form = document.getElementById('form-post');
  var text = document.getElementById('text');
  var hideMe = document.querySelector('.alert-info');
  text.addEventListener('keydown', function (evt) {
    if (evt.keyCode === CODE_INTER) {
    form.submit();
    }
  });
  setTimeout(function(){
    hideMe.classList.add('none');
  },3000); //10000 = 10 секунд 
  window.onload=function(){
       window.scrollTo(0,document.body.scrollHeight);
  }

})();

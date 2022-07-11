 $(document).ready(function() {

// required elements
var imgPopup = $('.img-popup');
var imgCont  = $('.container__img-holder');
var popupImage = $('.img-popup img');
var closeBtn = $('.close-btn');

// handle events
imgCont.on('click', function() {
  var i = 0;
  var img_src = $(this).children('img').attr('src');
  imgPopup.children('div').children('img').attr('src', img_src);
  imgPopup.addClass('opened');
  if (i == 0) {
    i = 1;
    var elem = document.getElementById("myBar");
    var width = 1;
    var id = setInterval(frame, 10);
    function frame() {
      if (width >= 100) {
        clearInterval(id);
        i = 0;
        document.getElementById("myBar").style.display = 'none';
        document.getElementById("ss").style.display = 'none';
        document.getElementById("rs").style.display = 'none';

      } else {
        width++;
        elem.style.width = width + "%";
      }
    }
  }
});

$(imgPopup, closeBtn).on('click', function() {
  imgPopup.removeClass('opened');
  imgPopup.children('img').attr('src', '');
});

popupImage.on('click', function(e) {
  e.stopPropagation();
});

});
 $('#message').hide();
 $('.heart').hide();
  $(function(){
 $('#s2').on('click',function(){
   $('#message').show();
   $('.container__img-holder').hide();
 });
 $('#s1').on('click',function(){
   $('.container__img-holder').show();
   $('#message').hide();
 $('.heart').hide();


 });
  $('#s3').on('click',function(){
   $('.container__img-holder').hide();
   $('#message').hide();
 $('.heart').show();


 });
});
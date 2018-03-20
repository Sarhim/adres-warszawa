$(document).ready(function() {
  $('.menu').on('click', function() {
    this.remove();
    if (window.matchMedia("(min-width: 900px)").matches) {
     $('.header-big').show();
  }
  else{
        $('.header-mob').show(); 
  }
      $('.main-text').animate({'top': '-25px'}, '600');});
$('.button').on('click', function() {
    if (window.matchMedia("(min-width: 900px)").matches) {
       $('.contact').addClass("pop-up");
       $('.contact').show(1000);
  }
  else{
    $('.main-text').hide();
    $('.contact').show();
  };
});
$('.main-button').on('click', function() {
    $('.main-text').hide();
    $('.main').show();
  });
$('.about-button').on('click', function() {
    $('.main-text').hide();
    $('.about').show(); 
   });
$('.contact-button').on('click', function() {
    $('.main-text').hide();
    $('.contact').removeClass("pop-up");
    $('.contact').show(); 
   });
$('.address-button').on('click', function() {
    $('.main-text').hide();
    $('.address').show(); 
   });
$('.consult-button').on('click', function() {
    $('.main-text').hide();
    $('.consult').show(); 
   });
});
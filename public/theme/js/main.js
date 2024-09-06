$(document).ready(function(){

// function showFadeUp(element) {
//     if($(this).scrollTop() <= $(element).offset().top-($(window).height()/4)*3)
//     {
//         $(element).css({
//             'opacity':'0',
//             'height':'50px',
//         });
//
//         setTimeout(function(){
//             $(element).addClass('hideFadeDown');
//         },100);
//
//         $(window).scroll(function()
//         {
//             if($(this).scrollTop() > $(element).offset().top-($(window).height()/4)*3)
//             $(element).removeAttr('style');
//         });
//     }
// }
// showFadeUp('#parceiro #parceiros');

window.onload = initPage;
    function initPage(){
      setTimeout(function(){
        $('.loader').fadeOut('fast');
      },1500);
  }

  $('#menu-toggle').click(function(){

    $('.caixa').toggle();

    $('nav ul.menu-mobile').slideToggle('fast');
    $(this).toggleClass('toggle');

  });

  // $('#menu-toggle').click(function(){
	// 	$(this).toggleClass('open');
	// });


});

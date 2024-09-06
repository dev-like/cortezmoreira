/*
* Autor: Rodrigo Rocha Ramalho
* Version: 1.1
* Data da Versão: 07.03.2019
* Função para aparição dos elementos flutuando para cima com Fade
*/

function showFadeUp(element) {
    if($(this).scrollTop() <= $(element).offset().top-($(window).height()/4)*3)
    {
		$(element).addClass('hideFadeDown');

        setTimeout(function(){
            $(element).addClass('hideFadeDownTime');
        },100);

        $(window).scroll(function()
        {
            if($(this).scrollTop() > $(element).offset().top-($(window).height()/4)*3)
            $(element).removeClass('hideFadeDown');
        });
    }
}

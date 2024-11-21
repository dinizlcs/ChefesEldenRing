$('li').hover(function(){
    $(this).find('.informacoes').toggle();
});

$('.btnConcluir').click(function(){
    $(this).toggleClass('concluido');
    $(this).parent().toggleClass('derrotado');
    $(this).parent().find('.informacoes').toggleClass('derrotado');
});
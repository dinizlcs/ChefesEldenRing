$('.nomeChefe').hover(function(){
    $(this).siblings('.informacoes').toggle();
});

$('.btnConcluir').click(function(){
    $(this).toggleClass('concluido');
    $(this).parent().toggleClass('derrotado');
    $(this).parent().find('.informacoes').toggleClass('derrotado');
});
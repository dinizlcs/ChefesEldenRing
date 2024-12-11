$('.nomeChefe').hover(function(){
    $(this).siblings('.informacoes').toggle();
});

function salvarEstadoChefe(){
    const estados = [];

    $('#listaBase li, #listaSOTE li').each(function(){
        estados.push({
            nome: $(this).find('.nomeChefe').text(),
            status: $(this).hasClass('chefe-derrotado') ? 1 : 0
        });
    });
    localStorage.setItem('estadosChefes', JSON.stringify(estados));
}

function carregarEstadoChefe(){
    const estados = JSON.parse(localStorage.getItem('estadosChefes')) || [];

    estados.forEach(estado => {
        const item = $(`#listaBase li:contains(${estado.nome}), #listaSOTE li:contains(${estado.nome})`);
        
        if(estado.status === 1){
            item.addClass('chefe-derrotado');
            item.find('.btnConcluir').addClass('concluido');
        }
    });
}

$(document).ready(function(){
    carregarEstadoChefe();

    $('.btnConcluir').click(function(){
        $(this).toggleClass('concluido');
        $(this).parent().toggleClass('chefe-derrotado');
        $(this).parent().find('.informacoes').toggleClass('chefe-derrotado');
        salvarEstadoChefe();
    });
});
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
    const lstEstados = JSON.parse(localStorage.getItem('estadosChefes')) || [];

    lstEstados.forEach(chefe => {
        const item = $(`li[data-nome="${chefe.nome}"]`);

        if(chefe.status === 1){
            item.addClass('chefe-derrotado');
            item.find('.btnConcluir').addClass('concluido');
            item.find('.informacoes').toggleClass('chefe-derrotado');
        }
    });
}

$(document).ready(function(){
    let clicado = null;

    $('.nomeChefe').hover(function(){
        if(clicado === null){
            $(this).siblings('.informacoes').toggle();
        }
    });
        
    // Manter as informações do chefe visíveis ao clicar. Desativa o hover
    $('.nomeChefe').click(function(){
        const informacoes = $(this).siblings('.informacoes');

        if(clicado === null || clicado !== $(this).get(0)){
            if(clicado !== null){
                $(clicado).siblings('.informacoes').hide();
            }

            informacoes.show();

            clicado = $(this).get(0);
        }else{
            clicado = null;
        }
    });

    $('.btnConcluir').click(function(){
        $(this).toggleClass('concluido');
        $(this).parent().toggleClass('chefe-derrotado');
        $(this).parent().find('.informacoes').toggleClass('chefe-derrotado');
        salvarEstadoChefe();
    });

    $('#btnLimparStatus').click(function(){
        const confirmacao = confirm("Essa ação irá desmarcar todos os chefes concluídos. Deseja continuar?");
        if(confirmacao){
            localStorage.clear();
            location.reload();
        }
    });

    carregarEstadoChefe();
});
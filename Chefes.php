<?php
    if ($_SERVER['PHP_SELF'] == "/Chefes.php") {
        header("HTTP/1.0 404 Not Found");
        exit;
    }

    // Função para gerar a lista de chefes com os arrays no php
    // function gerarListaChefes($chefes){
    //     foreach ($chefes as $chefe => $informacoes){
    //         if($informacoes === null) $informacoes = "Informações não encontradas.";

    //         echo <<<EOD
    //             <li data-nome="$chefe">
    //                 <button class="btnConcluir"></button><span class="nomeChefe">$chefe</span>
    //                 <p class="informacoes">$informacoes</p>
    //             </li>
    //         EOD;
    //     }
    // }

    // ***TESTE*** Gerar lista de chefes com o arquivo JSON
    function gerarListaChefes($defLista){
        $json = file_get_contents("data/chefes.json");
        $lstChefes = json_decode($json, true);

        foreach($lstChefes[$defLista] as $chefe){
            $nomeChefe = $chefe["nome"];
            // Verifica se a chave existe no array (isset) e se não está vazia (!empty). E então, caso não esteja vazia, adiciona o texto
            $localizacaoChefe = isset($chefe["localizacao"]) && !empty($chefe["localizacao"]) ? "<strong>Localização: </strong>" . $chefe["localizacao"] . "<br/>" : "";
            $requisitoChefe = isset($chefe["requisito"]) && !empty($chefe["requisito"]) ? "<strong>Requisito: </strong>" . $chefe["requisito"] . "<br/>" : "";
            $acessoChefe = isset($chefe["acesso"]) && !empty($chefe["acesso"]) ? "<strong>Acesso: </strong>" . $chefe["acesso"] . "<br/>" : "";
            
            $descricao = $localizacaoChefe . $requisitoChefe . $acessoChefe;
            if($descricao === null) $descricao = "Informações não encontradas.";
            echo <<<EOD
                <li data-nome="$nomeChefe">
                    <button class="btnConcluir"></button><span class="nomeChefe">$nomeChefe</span>
                    <p class="informacoes">$descricao</p>
                </li>
            EOD;
        }
    }

    $chefesBase = array(
        "Godrick, o Enxertado" => "<strong>Localização:</strong> Castelo Tempesvéu, Limgrave.",
        "Rennala, Rainha da Lua Cheia" => "<strong>Localização:</strong> Academia de Raya Lucaria, Liurnia dos Lagos.",
        "Flagelo Estelar Radahn" => "<strong>Requisito:</strong> Ativar o festival. Pode ser realizado das seguintes formas:<br/>
            &emsp;Quest da Ranni:<br/>
            &emsp;&emsp;1- Falar com a Ranni na Igreja de Elleh, mesmo local do mercante Kalé. (Opcional)<br/>
            &emsp;&emsp;2- Ir até as Três Irmãs, após derrotar a Loretta, Cavaleira Real na Mansão Caria (ao norte de Liurnia dos Lagos).<br/>
            &emsp;&emsp;3- Falar com o Blaidd no Rio Siofra (após aceitar servir a ranni e conversar com todos na torre).<br/>
            &emsp;&emsp;4- Falar com o Seluvis na torre dele e em seguida com a Sellen nas Ruínas do Ponto de Paragem.<br/>
            &emsp;&emsp;5- Falar novamente com o Blaidd no Rio Siofra ativará o festival.<br/>
            &emsp;Elevador Grandioso de Dectus:<br/>
            &emsp;&emsp;1- Pegar as metades do Medalhão de Dectus. A primeira metade pode ser pega no Forte Haight (sudeste da Floresta Nebulosa  em Limgrave), a segunda metade é
             encontrada no Forte Faroth (penhascos ao sul de Dragonbarrow).<br/>
            &emsp;&emsp;2- Ativar o Elevador Grandioso de Dectus no nordeste de Liurnia.<br/>
            &emsp;&emsp;3- Ativar qualquer graça do Platô Altus. Há uma graça próxima seguindo a Norte(N) saindo do elevador.
            <strong>Localização:</strong> Castelo da Juba Vermelha, Caelid.",
        "Espírito Ancestral Nobre" => "<strong>Requisito:</strong> Derrotar o Radahn.<br/>
            <strong>Acesso:</strong> Após derrotar o Radahn, uma cratera será formada na Floresta Nebulosa. Descendo a cratera e derrotando o chefe Lágrima Imitadora, você
             terá acesso ao Campo Sagrado do Chifre. Onde deverá acender 6 \"tochas\" para acessar a luta.",
        "Morgott, o Rei Agouro" => "<strong>Requisito:</strong> Ter duas Grandes Runas e ter acessado a Mesa Redonda, também é necessário derrotar o Sentinela da Árvore Dracônico que
         está guardando a entranda.<br/>
            Seguindo a ordem, os chefes que dropam as Grandes Runas são: Godrick, Rennala e Radahn.<br/>
            <strong>Localização:</strong> Leyndell, a Capital Real.",
        "Astel, Filho Natural da Escuridão" => "<strong>Requisito:</strong> Derrotar o Radahn.<br/>
            <strong>Acesso:</strong><br/>
            &emsp;Questa da Ranni:<br/>
            &emsp;&emsp;Após iniciar a quest (descrição do Radahn) e derrotar o Radahn, você deverá ir até Nokron e derrotar a Lágrima Imitadora. Então deverá pegar o item Lâmina de
             Matador de Dedos (Campo Noturno Sagrado) e entregá-lo a Ranni na Torre Pedrilhante de Ranni. Após entregar o item recarregue a área e volte a Ranni, logo depois vá até a
             torre de Renna suba as
             escadas e interaja com o portal, que levará você até o Rio Ainsel, Principal.<br/>
            &emsp;Sem quest:<br/>
            &emsp;&emsp;Na mesma área onde é encontrado o Espírito Ancestral Nobre você também pode chegar ao Aqueduto de Siofra onde está o chefe Gárgula Valente (a dupla de gárgulas)
             ao derrotar esse chefe entre no caixão que te levará até os Abismos da Raiz Profunda. Nos abismos, siga reto em direção as raízes até ver a cachoeira. Beirando a
              cachoeira, terá outro caixão que levará você até o Rio Ainsel, Principal.<br/>
            <strong>Depois de chegar no Rio Ainsel:</strong><br/>
            &emsp;O Rio Ainsel, Principal liga a Nokstella. Mais a frente de Nokstella, Cidade Eterna você chegará até o Lago de Podridão. Passando pelo lago, você chegará até um
             local com vários inimigos (aqueles \"insetos\" da podridão) nessa área terá um caixão que te levará para enfrentar o Astel.",
        "Rykard, Lorde Blasfemo" => "<strong>Localização:</strong> Mansão Vulcânica.<br/>
            <strong>Acesso:</strong><br/>
            &emsp;1- Seguir a quest da Tanith até o fim (invasões) e responder que quer conhecer o lorde dela.<br/>
            &emsp;2- Derrotar o Nobre da Pele Divina (acessado por uma parede ilusória em um dos quartos). Quando você chegar em um corredor com dois Homens-Serpente, no fim há uma
             sala com uma porta fechada a direita. Abra e suba as escadas em linha reta pela esquerda até chegar a uma varanda com um portão de teleporte.",
        "Fortissax, o Dragão Lich" => "<strong>Requisito:</strong> Pegar a Marca Amaldiçoada da Morte na Torre Divina de Liurnia. É necessário avançar na quest da Ranni (Descrição do
             Astel) até entregar a Lâmina de Matador de Dedos para conseguir o item Estátua Cariana Invertida.<br/>
            <strong>Acesso:</strong> Entregar a marca para a Fia após a luta contra os Campeões, nos Abismos da Raiz Profunda.",
        "Gigante de Fogo" => "<strong>Localização:</strong> Montanha dos Gigantes.",
        "Mohg, Lorde do Sangue" => "<strong>Requisito:</strong> Medalhão da Árvore Sacra. Uma outra opção pode ser seguir a quest do Varré.<br/>
            Quest do Varré:<br/>
            &emsp;Ir até a Igreja da Rosa em Liurnia para iniciar a quest. Conversando com ele, escolha a primeira opção \"Eles não pareciam certos\" e depois invada 3 mundos ou
             derrote o invasor em Platô Altus e volte até o Varré. Conversando com ele, escolha novamente a primeira opção \"Unja-me\" após pegar o item Favor do Lorde do Sangue vá
             até Os Quatro Campanários. Subindo tudo haverá um baú, pegue a chave dentro dele e use no primeiro campanário a esquerda (seguindo o caminho para descer) e use o portal.
             Derrotando o chefe, vá até a igreja onde inicia o jogo e interaja com o corpo da donzela no chão.<br/>
            Após isso volte até o Varré e converse com ele. Depois dele arrancar o seu dedo, converse novamente para ele te dar o item Medalha de Cavaleiro Sangue Puro.<br/><br/>
            Localização dos medalhões:<br/>
            &emsp;Parte Direita: Vilarejo dos Albináuricos, Liurnia (NPC disfarçado de pote. Após o primeiro \"perfumista\").<br/>
            &emsp;Parte Esquerda: Castelo Sol, Montanha dos Gigantes (Derrotar o Comandante Niall).<br/>
            <strong>Acesso:</strong> Usar o medalhão no Grande Elevador de Rold. O portal está a Noroeste (NW) das Ruínas de Yelough Anix. Ou, seguindo a quest do Varré, use a Medalha
             de Cavaleiro Sangue Puro, e você será teleportado para a entrada do Palácio de Mohgwyn.",
        "Maliketh, A Lâmina Negra" => "<strong>Requisito:</strong> Derrotar o Gigante de Fogo.<br/>
            <strong>Localização:</strong> Ruína de Farum Azula (Queimar a Térvore na graça da Forja dos Gigantes).",
        "Placidusax, o Lorde Dragão" => "<strong>Acesso:</strong> A partir da graça \"Lateral da Grande Ponte\", volte e desça o elevador. Passe pelos inimigos na parte com água.
             Saindo pela porta, siga reto em direção ao penhasco. Você verá uma \"plataforma\" abaixo. Desça completamente e deite no espaço onde não há ossos.",
        "Hoarah Loux, Guerreiro" => "<strong>Requisito:</strong> Derrotar o Maliketh.<br/>
            <strong>Localização:</strong> Leyndell, Capital das Cinzas",
        "Malenia, a Lâmina de Miquella" => "<strong>Requisito:</strong> Pegar o Medalhão da Árvore Sacra e usar no Grande Elevador de Rold para acessar o Campo de Neve Consagrado.<br/>
            <strong>Acesso:</strong> Concluir a Prisão Eterna (Evergaol) em Ordina, Cidade Sacramental.",
        "Radagon da Ordem Áurea/ Fera Prístina" => "<strong>Requisito:</strong> Derrotar o Hoarah Loux.<br/>
            <strong>Acesso:</strong> Da graça \"Trono Prístino\" siga em direção a árvore e toque na luz."
    );

    $chefesSOTE = array(
        "Fera Divina, o Leão Dançante" => "<strong>Acesso:</strong> A partir da graça Cruz dos Três Caminhos (antes da Grande Ponte de Ellac) siga para oeste (W) e suba as escadas.
             Antes da segunda escada há uma outra graça e dois NPC's.<br/>
            Suba o segundo lance de escadas para chegar a Belurat, Assentamento da Torre. Onde o chefe está no final/ topo.",
        "Rellana, Cavaleira das Luas Gêmeas" => "<strong>Acesso:</strong> Seguir reto após atravessar a Grande Ponte de Ellac, localizada a Norte (N)/ Nordeste (NE) da graça Cruz dos
             Três Caminhos.<br/>
            <strong>Localização:</strong> Castelo Ensis.",
        "Cavaleiro Pútrido" => "<strong>Requisito:</strong> Quebrar o feitiço de Miquella.<br/>
            <strong>Localização:</strong> Fissura dos Caixões de Pedra.<br/>
            <strong>Acesso:</strong> A partir da graça Frente do Castelo siga para sudeste (SE) e desça passando por um acampamento. Siga reto até ver os inimigos se batendo, então
             siga pelo caminho da esquerda. Chegando no lago de veneno continue sempre se mantendo a esquerda e no fim, em um lago com um carangueijo, entre numa caverna atrás da
             planta e siga até a próxima graça.<br/>
            Da graça Caverna do Rio Ellac, siga a esquerda e desça a cachoeira até ver o Golem da Fornalha. Passando pelo golem você chega na próxima graça.<br/>
            Da graça Costa Cerúlea, siga para o sul (S) do mapa até chegar em uma cratera e desça-a. Descendo toda cratera você chegará a graça A Fissura.",
        "Comandante Gaius" => "<strong>Localização:</strong> Fortaleza das Sombras. Armazém, Parte de Trás.<br/>
            <strong>Acesso:</strong> Ruínas de Moorth, leste da graça Cruz da Estrada Principal. A partir da graça das ruínas, siga para leste e passe pela direita de um pilar gigante.
             Logo após passar o pilar vire a esquerda e entre em um buraco no chão. No final, você chegará ao Vilarejo Bonny.<br/>
            No vilarejo, siga a leste até passar por duas pontes. Após isso, siga o caminho no chão até o fim. Na bifurcação, seguindo reto você chegará até a fortaleza seguindo a
             esquerda você chegará a Catedral de Manus Metyr.",
        "Avatar da Umbrárvore" => "<strong>Requisito:</strong> Girar a alavanca para remover a água da parte inferior da graça Entrada do Distrito da Igreja.<br/>
            <strong>Localização:</strong> Fortaleza das Sombras, Distrito da Igreja.<br/>
            <strong>Acesso:</strong> A partir da graça Capela Submersa (área abaixo de onde está o mecanismo da água) saia pelo oeste (W) vire a direita, siga reto e vire a esquerda
             para entrar em uma capela com um inimigo no fundo. Chegando onde esta o inimigo, vire a direita e siga reto até chegar a uma porta fechada.",
        "Messmer, o Empalador" => "<strong>Requisito:</strong> Puxar a alavanca próxima a graça Armazém, Sétimo Andar. A alavanca está seguindo reto dessa graça e pulando o muro
             no final onde tem um animal pendurado.<br/>
            <strong>Localização:</strong> Fortaleza das Sombras.<br/>
            <strong>Acesso:</strong> Subir pela estrutura central que moveu após puxar a alavanca.",
        "Romina, Santa do Broto" => "<strong>Localização:</strong> Antigas Ruínas de Rauh.<br/>
            <strong>Acesso:</strong> A partir da graça Torre Menor do Viaduto, siga reto até a beira do penhasco e desça na plataforma logo abaixo. Desça novamente até o riozinho e
             siga para a direita e depois reto até a primeira entrada a esquerda logo após virar a esquerda, vire a direita e verá uma grande \"sala\" com escorpiões-aranhas, siga reto
             até o buraco na parede. Passando por ele, vire a esquerda e abra a porta. Siga o caminho e caia na fonte de vento. Após cair siga reto (NW) e vire a esquerda.<br/>
            Após chegar na graça Antigas Ruínas de Rauh, Leste, siga na ponte e caia na ponte abaixo a direita. Caindo, siga reto até passar pela parte coberta e vire a direita até
             uma fonte de vento bloqueada e use a Algema de Margit para liberá-la. Depois de liberada pule olhando no sentido sudeste (SW) e siga reto beirando a parede a direita até
             a entrada. Entre e suba a escada a esquerda.",
        "Metyr, Mãe dos Dedos" => "<strong>Requisito:</strong> Quest do Ymir, encontrado na Catedral de Manus Metyr.<br/>
            <strong>Acesso:</strong> Abaixo do trono do Ymir, após tocar os dois sinos. Um está na Ruína de Dedos de Rhia e o outro na Ruína de Dedos de Dheo (É necessário ter o gesto
             \"Oh, mãe\" encontrado ao norte do Vilarejo Bonny e usar a direita da porta para o Comandante Gaius).",
        "Midra, Lorde da Chama Frenética" => "<strong>Requisito:</strong> Chegar ao fim das Catacumbas da Luz Negra e derrotar o Jori.<br/>
            <strong>Localização:</strong> Mansão de Midra, Floresta Abissal.",
        "Bayle, o Horror" => "<strong>Requisito:</strong> Derrotar o Homem-Dragão Ancião no Poço do Dragão.<br/>
            <strong>Localização:</strong> Pico Irregular.",
        "Radahn, Consorte de Miquella" => "<strong>Requisito:</strong> Derrotar o Messmer e a Romina. Queimar a árvore após a Romina com a Acendalha de Messmer.<br/>
            <strong>Localização:</strong> Enir-Ilim."
    );
?>
<?php
    if ($_SERVER['PHP_SELF'] == "/Chefes.php") {
        header("HTTP/1.0 404 Not Found");
        exit;
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
            &emsp;&emsp;1- Pegar as metades do Medalhão de Dectus. A primeira metade pode ser pega no Fort Haight (sudeste da Floresta Nebulosa  em Limgrave), a segunda metade é
             encontrada no Fort Faroth (penhascos ao sul de Dragonbarrow).<br/>
            &emsp;&emsp;2- Ativar o Elevador Grandioso de Dectus no nordeste de Liurnia.<br/>
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
             Matador de Dedos (Campo Noturno Sagrado) e entregá-lo a Ranni na Torre Pedrilhante de Ranni. Após entregar o item recarregue a área e volte a Ranni, logo depois vá até a torre de Renna suba as
             escadas e interaja com o portal, que levará você até o Rio Ainsel, Principal.<br/>
            &emsp;Sem quest:<br/>
            &emsp;&emsp;Na mesma área onde é encontrado o Espírito Ancestral Nobre você também pode chegar ao Aqueduto de Siofra onde está o chefe Gárgula Valente (a dupla de gárgulas)
             ao derrotar esse chefe entre no caixão que te levará até os Abismos da Raiz Profunda. Nos abismos, beirando a cachoeira, terá outro caixão que levará você até o Rio
             Ainsel, Principal.<br/>
            <strong>Depois de chegar no Rio Ainsel:</strong><br/>
            &emsp;O Rio Ainsel, Principal liga a Nokstella. Mais a frente de Nokstella, Cidade Eterna você chegará até o Lago de Podridão. Passando pelo lago, você chegará até um
             local com vários inimigos (aqueles \"insetos\" da podridão) nessa área terá um caixão que te levará para enfrentar o Astel.",
        "Rykard, Lorde Blasfemo" => "<strong>Localização:</strong> Mansão Vulcânica.<br/>
            <strong>Acesso:</strong><br/>
            &emsp;1- Seguir a quest da Tanith até o fim (invasões) e responder que quer conhecer o lorde dela.<br/>
            &emsp;2- Derrotar o Nobre da Pele Divina (acessado por uma parede ilusória em um dos quartos) e seguir até um corredor com três Homens-Serpente. Em uma das varandas para o
             lago de lava terá um portal que leva direto ao chefe.",
        "Fortissax, o Dragão Lich" => "<strong>Requisito:</strong> Pegar a Marca Amaldiçoada da Morte na Torre Divina de Liurnia. É necessário avançar na quest da Ranni (Descrição do Astel) até entregar a
         Lâmina de Matador de Dedos para conseguir o item Estátua Cariana Invertida.<br/>
            &emsp;Acesso: Entregar a marca para a Fia após a luta contra os Campeões, nos Abismos da Raiz Profunda.",
        "Gigante de Fogo" => "<strong>Localização:</strong> Montanha dos Gigantes.",
        "Mohg, Lorde do Sangue" => "<strong>Requisito:</strong> Medalhão da Árvore Sacra. Uma outra opção pode ser seguir a quest do Varré.<br/>
            Localização dos medalhões:<br/>
            &emsp;Parte Direita: Vilarejo dos Albináuricos, Liurnia.<br/>
            &emsp;Parte Esquerda: Castelo Sol, Montanha dos Gigantes.<br/>
            <strong>Acesso:</strong> Usar o medalhão no Grande Elevador de Rold. O portal está a Noroeste (NW) das Ruínas de Yelough Anix.<br/><br/>
            Quest do Varré:<br/>
            &emsp;Ir até a Igreja da Rosa em Liurnia para iniciar a quest. Conversando com ele, escolha a primeira opção \"Eles não pareciam certos\" e depois invada 3 mundos ou
             derrote o invasor em Platô Altus e volte até o Varré. Conversando com ele, escolha novamente a primeira opção \"Unja-me\" após pegar o item Favor do Lorde do Sangue vá
             até Os Quatro Campanários. Subindo tudo haverá um baú, pegue a chave dentro dele e use no primeiro campanário a esquerda (seguindo o caminho para descer) e use o portal.
             Derrotando o chefe, vá até a igreja onde inicia o jogo e interaja com o corpo da donzela no chão.<br/>
            Após isso volte até o Varré e converse com ele. Depois dele arrancar o seu dedo, converse novamente para ele te dar o item Medalha de Cavaleiro Sangue Puro. Usando este
             você será teleportado para a entrada do Palácio de Mohgwyn.",
        "Maliketh, A Lâmina Negra" => null,
        "Placidusax, o Lorde Dragão" => null,
        "Hoarah Loux, Guerreiro" => null,
        "Malenia, a Lâmina de Miquella" => null,
        "Radagon da Ordem Áurea/ Fera Prístina" => null
    );

    $chefesSOTE = array(
        "Nenhum valor" => null
    );
?>
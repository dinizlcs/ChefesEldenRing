<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Elden Ring- Lista de Chefes</title>

    <!-- JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <!-- CSS -->
    <link rel="stylesheet" href="css/layout.css">
    <link rel="stylesheet" href="css/listas.css">
</head>
<body>
    <div class="conteiner">
        <div id="jogoBase">
            <h1>Chefes do jogo base</h1>
            <p class="ajuda-clique">Clique no nome do chefe para fixar as informações.</p>
            <ol id="listaBase">
                <?php
                    require "Chefes.php";
                    gerarListaChefes($chefesBase)
                ?>
            </ol>
        </div>

        <div id="SOTE">
            <h1>Chefes da DLC (Shadow of the Erdtree)</h1>
            <p class="ajuda-clique">Clique no nome do chefe para fixar as informações.</p>
            <ol id="listaSOTE">
                <?php
                    gerarListaChefes($chefesSOTE)
                ?>
            </ol>
        </div>
    </div>
    <div id="limparStatus">
        <button id="btnLimparStatus">Limpar Status dos Chefes</button>
    </div>

    <!-- JAVASCRIPT -->
    <script src="js/funcionalidades.js"></script>
</body>
</html>
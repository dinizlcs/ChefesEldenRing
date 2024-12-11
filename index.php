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
            <ol id="listaBase">
                <?php
                    require "Chefes.php";

                    foreach ($chefesBase as $chefe => $informacoes){
                        if($informacoes === null) $informacoes = "Informações não encontradas.";

                        echo <<<EOD
                            <li data-nome="$chefe">
                                <button class="btnConcluir"></button><span class="nomeChefe">$chefe</span>
                                <p class="informacoes">$informacoes</p>
                            </li>
                        EOD;
                    }
                ?>
            </ol>
        </div>

        <div id="SOTE">
            <h1>Chefes da DLC (Shadow of the Erdtree)</h1>
            <ol id="listaSOTE">
                <?php
                    foreach($chefesSOTE as $chefe => $informacoes){
                        if($informacoes === null) $informacoes = "Informações não encontradas.";

                        echo <<<EOD
                            <li data-nome="$chefe">
                                <button class="btnConcluir"></button><span class="nomeChefe">$chefe</span>
                                <p class="informacoes">$informacoes</p>
                            </li>
                        EOD;
                    }
                ?>
            </ol>
        </div>
    </div>

    <!-- JAVASCRIPT -->
     <script src="js/funcionalidades.js"></script>
</body>
</html>
<?php
    class DadosChefes{
        public static function gerarListaChefes($defLista){
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
    }
?>
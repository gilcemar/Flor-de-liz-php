<?php
error_reporting(0);
include_once '../encodingStrings.php';
include_once '../controlador/controladorCalcado.php';
$params = count($_POST);

if ($params > 0) {

    $parametrosForm = $_POST;
    $controladorCalcado = new ControladorCalcado();
    $result = null;
    $chaves = array_keys($parametrosForm);
    $acao = $chaves[6];
    switch ($acao) {
        case $acao == "botaoExcCal":{
            $result = $controladorCalcado->excluirCalcado($parametrosForm['nomeCalc']);
            if ($result) {
                echo 'Calçado excluído com sucesso.';
            } else {
                echo 'Foda deu erro';
            }
            break;
        }
        case $acao=="botaoInsCal":{
            $result = $controladorCalcado->inserirCalcado($parametrosForm);

            if ($result) {
                echo 'Calçado cadastrado com sucesso.';
            } else {
                echo 'Foda deu erro';
            }

            break;
        }
        case $acao=="botaoPesqCal":{
            $result = $controladorCalcado->pesquisarCalcado($parametrosForm['nomeCalc']);

            if ($result) {
                echo $result;
            } else {
                echo 'Foda deu erro';
            }

            break;
        }
        case $acao=="botaoAltCal":{
            $result = $controladorCalcado->alterarCalcado($parametrosForm,12);

            if ($result) {
                echo 'Calçado alterado com sucesso.';
            } else {
                echo 'Foda deu erro';
            }

            break;
        }
        default:
            break;
    }
}
?>


<html>
    <head>
        <meta http-equiv="content-type" content="text/html;charset=utf-8" />
        <title></title>
    </head>
    <body>
        <form name="formCadCalc" action="cadastroCalcadoBACKUP.php" accept-charset="utf-8" method="POST" >
            <label for="nomeColecao" >Colecao:</label>
            <input id="nomeColecao" name="nomeColecao" value="" type="text" size="50">

            <label for="nomeCalc" >Nome do calçado:</label>
            <input id="nomeCalc" name="nomeCalc" value="" type="text" size="50">

            <label for="menorTam" >Qual o menor tamanho?</label>
            <input id="menorTam" name="menorTam" value="" type="text" size="50">


            <label for="maiorTam" >Qual o maior tamanho?</label>
            <input id="maiorTam" name="maiorTam" value="" type="text" size="50">


            <label for="cor" >Cor:</label>
            <input id="cor" name="cor" value="" type="text" size="50">


            <label for="precoCusto" >Qual o preço de custo?</label>
            <input id="precoCusto" name="precoCusto" value="" type="text" size="50">

            <input type="submit" name="botaoInsCal" value="Inserir calçado."></input>
            <input type="submit" name="botaoExcCal" value="Excluir calçado."></input>
            <input type="submit" name="botaoPesqCal" value="Selecionar calçado pelo nome."></input>
            <input type="submit" name="botaoAltCal" value="Alterar calçado"></input>
        </form>

    </body>
</html>


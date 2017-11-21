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
    $acao = $chaves[0];
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
            echo 'Nenhuma opção válida foi escolhida.';
            break;
    }
}
?>
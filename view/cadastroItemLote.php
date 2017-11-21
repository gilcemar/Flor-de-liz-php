<?php
error_reporting(E_ALL);
include_once '../encodingStrings.php';
include_once '../controlador/controladorItemLote.php';
$params = count($_POST);//mudar para a aplicação android

if ($params > 0) {
    //http://localhost/teste/view/cadastroCliente.php?XDEBUG_SESSION_START=netbeans-xdebug&cnpjLojaAnt=&cnpjLoja=minhaLoja&cpf=23456&clienteNome=zéninguém&nomeLoja=Lojademerda&botaoInsCli=inserir
    $parametrosForm = $_POST;//mudar para a aplicação android
    $controladorItemLote = new ControladorItemLote();
    $result = null;
    $chaves = array_keys($parametrosForm);
    $acao = $chaves[0];//reduzir para 8 quando colocar no método POST
    /*
     * O switch pega a informação da ação do botão e assim seleciona o método a ser requisitado.
     */
    switch ($acao) {
        case $acao == "botaoExcItemLote":{
            
            //http://localhost/teste/view/cadastroItemLote.php?botaoExcItemLote=excluir&codCalProd=1&idLote=3&tamCalc=35&quantProd=40&quantDispon=40&precoRev=500&XDEBUG_SESSION_START=netbeans-xdebug
            $result = $controladorItemLote->excluirItemLote($parametrosForm['codCalProd'], $parametrosForm['idLote']);
            if ($result) {
                echo 'Item do lote excluído com sucesso.';
            } else {
                echo 'Foda deu erro';
            }
            break;
        }
        case $acao=="botaoInsItemLote":{
            //http://localhost/teste/view/cadastroItemLote.php?botaoInsItemLote=inserir&codCalProd=&idLote=3&tamCalc=35&quantProd=40&quantDispon=40&precoRev=500&XDEBUG_SESSION_START=netbeans-xdebug
            $result = $controladorItemLote->inserirItemLote($parametrosForm);

            if ($result) {
                echo 'Item do lote inserido com sucesso.';
            } else {
                echo 'Foda deu erro';
            }

            break;
        }
        case $acao=="botaoPesqItemLote":{
            
            //http://localhost/teste/view/cadastroItemLote.php?botaoPesqItemLote=inserir&codCalProd=1&idLote=3&tamCalc=35&quantProd=40&quantDispon=40&precoRev=500&XDEBUG_SESSION_START=netbeans-xdebug
            $result = $controladorItemLote->pesquisarItemLote($parametrosForm['codCalProd'], $parametrosForm['idLote']);

            if ($result) {
                echo $result;
            } else {
                echo 'Foda deu erro';
            }

            break;
        }
        case $acao=="botaoAltItemLote":{
            
            //http://localhost/teste/view/cadastroItemLote.php?botaoAltItemLote=alterar&codCalProd=1&idLote=3&tamCalc=54&quantProd=55&quantDispon=55&precoRev=700&XDEBUG_SESSION_START=netbeans-xdebug
            $result = $controladorItemLote->alterarItemLote($parametrosForm);

            if ($result) {
                echo 'Item do lote alterado com sucesso.';
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
error_reporting(E_ALL);
?>

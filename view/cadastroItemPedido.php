<?php
error_reporting(E_ALL);
include_once '../encodingStrings.php';
include_once '../controlador/controladorItemPedido.php';
$params = count($_POST);//mudar para a aplicação android

if ($params > 0) {
    //http://localhost/teste/view/cadastroCliente.php?XDEBUG_SESSION_START=netbeans-xdebug&cnpjLojaAnt=&cnpjLoja=minhaLoja&cpf=23456&clienteNome=zéninguém&nomeLoja=Lojademerda&botaoInsCli=inserir
    $parametrosForm = $_POST;//mudar para a aplicação android
    $controladorItemPedido = new ControladorItemPedido();
    $result = null;
    $chaves = array_keys($parametrosForm);
    $acao = $chaves[0];//reduzir para 8 quando colocar no método POST
    /*
     * O switch pega a informação da ação do botão e assim seleciona o método a ser requisitado.
     */
    switch ($acao) {
        case $acao == "botaoExcItemPedido":{
            
            //http://localhost/teste/view/cadastroItemPedido.php?botaoExcItemPedido=botaoExcItemPedido&quantidadeItem=35&codigoProd=3&numeroPedido=3&XDEBUG_SESSION_START=netbeans-xdebug
            $result = $controladorItemPedido->excluirItemPedido($parametrosForm['codigoProd']);
            if ($result) {
                echo 'Item do pedido excluído com sucesso.';
            } else {
                echo 'Foda deu erro';
            }
            break;
        }
        case $acao=="botaoInsItemPedido":{
            //http://localhost/teste/view/cadastroItemPedido.php?botaoInsItemPedido=inserir&quantidadeItem=35&codigoProd=3&numeroPedido=3&XDEBUG_SESSION_START=netbeans-xdebug
            $result = $controladorItemPedido->inserirItemPedido($parametrosForm);

            if ($result) {
                echo 'Item do pedido inserido com sucesso.';
            } else {
                echo 'Foda deu erro';
            }

            break;
        }
        case $acao=="botaoPesqItemPedido":{
            
            //http://localhost/teste/view/cadastroItemPedido.php?botaoPesqItemPedido=pesquisar&quantidadeItem=35&codigoProd=3&numeroPedido=3&XDEBUG_SESSION_START=netbeans-xdebug
            $result = $controladorItemPedido->pesquisarItemPedido($parametrosForm['numeroPedido']);

            if ($result) {
                echo $result;
            } else {
                echo 'Foda deu erro';
            }

            break;
        }
        case $acao=="botaoAltItemPedido":{
            
            //http://localhost/teste/view/cadastroItemPedido.php?botaoAltItemPedido=botaoAltItemPedido&quantidadeItem=44&codigoProd=3&numeroPedido=3&XDEBUG_SESSION_START=netbeans-xdebug
            $result = $controladorItemPedido->alterarItemPedido($parametrosForm);

            if ($result) {
                echo 'Item do pedido alterado com sucesso.';
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

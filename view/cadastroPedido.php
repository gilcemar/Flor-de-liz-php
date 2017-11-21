<?php
error_reporting(E_ALL);
include_once '../encodingStrings.php';
include_once '../controlador/controladorPedido.php';
$params = count($_POST);//mudar para a aplicação android

if ($params > 0) {
    //http://localhost/teste/view/cadastroCliente.php?XDEBUG_SESSION_START=netbeans-xdebug&cnpjLojaAnt=&cnpjLoja=minhaLoja&cpf=23456&clienteNome=zéninguém&nomeLoja=Lojademerda&botaoInsCli=inserir
    $parametrosForm = $_POST;//mudar para a aplicação android
    $controladorPedido = new ControladorPedido();
    $result = null;
    $chaves = array_keys($parametrosForm);
    $acao = $chaves[0];//reduzir para 8 quando colocar no método POST
    /*
     * O switch pega a informação da ação do botão e assim seleciona o método a ser requisitado.
     */
    switch ($acao) {
        case $acao == "botaoExcPed":{
            
            //http://localhost/teste/view/cadastroPedido.php?botaoExcPed=excluir&descPedido=30&cnpjLoja=minhaLoja&cnpjLojaAnt=minhaLoja&idPedido=1&XDEBUG_SESSION_START=netbeans-xdebug
            $result = $controladorPedido->excluirPedido($parametrosForm['cnpjLoja'], $parametrosForm['idPedido']);
            if ($result) {
                echo 'Pedido excluído com sucesso.';
            } else {
                echo 'Foda deu erro';
            }
            break;
        }
        case $acao=="botaoInsPed":{
            //http://localhost/teste/view/cadastroPedido.php?botaoInsPed=inserir&descPedido=30&cnpjLoja=minhaLoja&cnpjLojaAnt=&idPedido=&XDEBUG_SESSION_START=netbeans-xdebug
            $result = $controladorPedido->inserirPedido($parametrosForm);

            if ($result) {
                echo 'Pedido: ' . $result . ' inserido com sucesso.';
            } else {
                echo 'Foda deu erro';
            }

            break;
        }
        case $acao=="botaoPesqPed":{
            
            //http://localhost/teste/view/cadastroPedido.php?botaoPesqPed=pesquisar&descPedido=30&cnpjLoja=minhaLoja&cnpjLojaAnt=&idPedido=1&XDEBUG_SESSION_START=netbeans-xdebug
            $result = $controladorPedido->pesquisarPedido($parametrosForm['cnpjLoja'], $parametrosForm['idPedido']);

            if ($result) {
                echo $result;
            } else {
                echo 'Foda deu erro';
            }

            break;
        }
        case $acao=="botaoAltPed":{
            
            //http://localhost/teste/view/cadastroPedido.php?botaoAltPed=alterar&descPedido=30&cnpjLoja=minhaLoja&cnpjLojaAnt=novaLoja&idPedido=1&XDEBUG_SESSION_START=netbeans-xdebug
            $result = $controladorPedido->alterarPedido($parametrosForm);

            if ($result) {
                echo 'Pedido da loja alterado com sucesso.';
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

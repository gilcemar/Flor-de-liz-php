<?php
error_reporting(E_ALL);
include_once '../encodingStrings.php';
include_once '../controlador/controladorCliente.php';
$params = count($_POST);//mudar para a aplicação android

if ($params > 0) {
    //http://localhost/teste/view/cadastroCliente.php?botaoInsCli=inserir&cnpjLojaAnt=&cnpjLoja=minhaLoja&cpf=23456&clienteNome=zéninguém&nomeLoja=Lojademerda&XDEBUG_SESSION_START=netbeans-xdebug
    $parametrosForm = $_POST;//mudar para a aplicação android
    $controladorCliente = new ControladorCliente();
    $result = null;
    $chaves = array_keys($parametrosForm);
    $acao = $chaves[0];//reduzir para 5 quando colocar no método POST
    /*
     * O switch pega a informação da ação do botão e assim seleciona o método a ser requisitado.
     */
    switch ($acao) {
        case $acao == "botaoExcCli":{
            //http://localhost/teste/view/cadastroCliente.php?botaoExcCli=excluir&cnpjLojaAnt=minhaLoja&cnpjLoja=novaLoja&cpf=23456&clienteNome=Joãoninguém&nomeLoja=Lojademerda&XDEBUG_SESSION_START=netbeans-xdebug
            $result = $controladorCliente->excluirCliente($parametrosForm['cnpjLoja']);
            if ($result) {
                echo 'Loja excluída com sucesso.';
            } else {
                echo 'Erro na exclusão.';
            }
            break;
        }
        case $acao=="botaoInsCli":{
            //http://localhost/teste/view/cadastroCliente.php?botaoInsCli=inserir&cnpjLojaAnt=&cnpjLoja=minhaLoja&cpf=23456&clienteNome=zéninguém&nomeLoja=Lojademerda&XDEBUG_SESSION_START=netbeans-xdebug
            $result = $controladorCliente->inserirCliente($parametrosForm);

            if ($result) {
                echo 'Loja cadastrada com sucesso.';
            } else {
                echo 'Erro no cadastro.';
            }

            break;
        }
        case $acao=="botaoPesqCli":{
            //http://localhost/teste/view/cadastroCliente.php?botaoPesqCli=pesquisar&cnpjLojaAnt=minhaLoja&cnpjLoja=novaLoja&cpf=23456&clienteNome=Joãoninguém&nomeLoja=Lojademerda&XDEBUG_SESSION_START=netbeans-xdebug
            $result = $controladorCliente->pesquisarCliente($parametrosForm['cnpjLoja']);

            if ($result) {
                echo $result;
            } else {
                echo 'Nenhum dado obtido na pesquisa.';
            }

            break;
        }
        case $acao=="botaoAltCli":{
            //http://localhost/teste/view/cadastroCliente.php?botaoAltCli=alterar&cnpjLojaAnt=minhaLoja&cnpjLoja=novaLoja&cpf=23456&clienteNome=Joãoninguém&nomeLoja=Lojademerda&XDEBUG_SESSION_START=netbeans-xdebug
            $result = $controladorCliente->alterarCliente($parametrosForm);

            if ($result) {
                echo 'Loja alterada com sucesso.';
            } else {
                echo 'Tentativa de alteração não obteve sucesso.';
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

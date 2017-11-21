<?php
error_reporting(E_ALL);
include_once '../encodingStrings.php';
include_once '../controlador/controladorTelefone.php';
$params = count($_POST);//mudar para a aplicação android

if ($params > 0) {
    //http://localhost/teste/view/cadastroCliente.php?XDEBUG_SESSION_START=netbeans-xdebug&cnpjLojaAnt=&cnpjLoja=minhaLoja&cpf=23456&clienteNome=zéninguém&nomeLoja=Lojademerda&botaoInsCli=inserir
    $parametrosForm = $_POST;//mudar para a aplicação android
    $controladorTelefone = new ControladorTelefone();
    $result = null;
    $chaves = array_keys($parametrosForm);
    $acao = $chaves[0];//reduzir para 8 quando colocar no método POST
    /*
     * O switch pega a informação da ação do botão e assim seleciona o método a ser requisitado.
     */
    switch ($acao) {
        case $acao == "botaoExcTel":{
            
            //http://localhost/teste/view/cadastroTelefone.php?botaoExcTel=excluir&numero=23235448&cnpj=minhaLoja&telAnt=&XDEBUG_SESSION_START=netbeans-xdebug
            $result = $controladorTelefone->excluirTelLoja($parametrosForm['cnpj']);
            if ($result) {
                echo 'Telefone excluído com sucesso.';
            } else {
                echo 'Erro na exclusão.';
            }
            break;
        }
        case $acao=="botaoInsTel":{
            //http://localhost/teste/view/cadastroTelefone.php?botaoInsTel=inserir&numero=32324584&cnpj=minhaLoja&telAnt=&XDEBUG_SESSION_START=netbeans-xdebug
            $result = $controladorTelefone->inserirTelLoja($parametrosForm);

            if ($result) {
                echo 'Telefone inserido com sucesso.';
            } else {
                echo 'Erro no cadastro.';
            }

            break;
        }
        case $acao=="botaoPesqTel":{
            
            //http://localhost/teste/view/cadastroTelefone.php?botaoPesqTel=pesquisar&numero=23235448&cnpj=minhaLoja&telAnt=&XDEBUG_SESSION_START=netbeans-xdebug
            $result = $controladorTelefone->pesquisarTelLoja($parametrosForm['cnpj']);

            if ($result) {
                echo $result;
            } else {
                echo 'Nenhum dado obtido na pesquisa.';
            }

            break;
        }
        case $acao=="botaoAltTel":{
            
            //http://localhost/teste/view/cadastroTelefone.php?botaoAltTel=alterar&numero=23235448&cnpj=minhaLoja&telAnt=32324584&XDEBUG_SESSION_START=netbeans-xdebug
            $result = $controladorTelefone->alterarTelLoja($parametrosForm);

            if ($result) {
                echo 'Telefone da loja alterado com sucesso.';
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

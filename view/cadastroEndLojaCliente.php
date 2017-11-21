<?php
error_reporting(E_ALL);
include_once '../encodingStrings.php';
include_once '../controlador/controladorEndLojaCliente.php';
$params = count($_POST);//mudar para a aplicação android

if ($params > 0) {
    //http://localhost/teste/view/cadastroCliente.php?XDEBUG_SESSION_START=netbeans-xdebug&cnpjLojaAnt=&cnpjLoja=minhaLoja&cpf=23456&clienteNome=zéninguém&nomeLoja=Lojademerda&botaoInsCli=inserir
    $parametrosForm = $_POST;//mudar para a aplicação android
    $controladorEndLojaCliente = new ControladorEndLojaCliente();
    $result = null;
    $chaves = array_keys($parametrosForm);
    $acao = $chaves[0];//reduzir para 8 quando colocar no método POST
    /*
     * O switch pega a informação da ação do botão e assim seleciona o método a ser requisitado.
     */
    switch ($acao) {
        case $acao == "botaoExcEndLoja":{
            
            //http://localhost/teste/view/cadastroEndLojaCliente.php?botaoExcEndLoja=excluir&rua=cangáia&bairro=éaBicha&cidade=rosinha&uf=SU&pais=bruzudanga&numero=854&idEnd=&cnpjLoja=minhaLoja&XDEBUG_SESSION_START=netbeans-xdebug
            $result = $controladorEndLojaCliente->excluirEndLoja($parametrosForm['cnpjLoja']);
            if ($result) {
                echo 'Endereço excluído com sucesso.';
            } else {
                echo 'Erro na exclusão.';
            }
            break;
        }
        case $acao=="botaoInsEndLoja":{
            //http://localhost/teste/view/cadastroEndLojaCliente.php?botaoInsEndLoja=inserir&rua=semNome&bairro=éoBicho&cidade=urubu&uf=SU&pais=bruzudanga&numero=454&idEnd=&cnpjLoja=minhaLoja&XDEBUG_SESSION_START=netbeans-xdebug
            $result = $controladorEndLojaCliente->inserirEndLoja($parametrosForm);

            if ($result) {
                echo 'Endereço inserido com sucesso.';
            } else {
                echo 'Erro no cadastro.';
            }

            break;
        }
        case $acao=="botaoPesqEndLoja":{
            
            //http://localhost/teste/view/cadastroEndLojaCliente.php?botaoPesqEndLoja=pesquisar&rua=cangáia&bairro=éaBicha&cidade=rosinha&uf=SU&pais=bruzudanga&numero=854&idEnd=&cnpjLoja=minhaLoja&XDEBUG_SESSION_START=netbeans-xdebug
            $result = $controladorEndLojaCliente->pesquisarEndLoja($parametrosForm['cnpjLoja']);

            if ($result) {
                echo $result;
            } else {
                echo 'Nenhum dado obtido na pesquisa.';
            }

            break;
        }
        case $acao=="botaoAltEndLoja":{
            
            //http://localhost/teste/view/cadastroEndLojaCliente.php?botaoAltEndLoja=alterar&rua=cangáia&bairro=éaBicha&cidade=rosinha&uf=SU&pais=bruzudanga&numero=854&idEnd=&cnpjLoja=minhaLoja&XDEBUG_SESSION_START=netbeans-xdebug
            $result = $controladorEndLojaCliente->alterarEndLoja($parametrosForm);

            if ($result) {
                echo 'Endereço da loja alterado com sucesso.';
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

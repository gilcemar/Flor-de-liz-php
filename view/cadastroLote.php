    <?php
error_reporting(E_ALL);
include_once '../encodingStrings.php';
include_once '../controlador/controladorLote.php';
$params = count($_POST);//mudar para a aplicação android

if ($params > 0) {
    //http://localhost/teste/view/cadastroCliente.php?XDEBUG_SESSION_START=netbeans-xdebug&cnpjLojaAnt=&cnpjLoja=minhaLoja&cpf=23456&clienteNome=zéninguém&nomeLoja=Lojademerda&botaoInsCli=inserir
    $parametrosForm = $_POST;//mudar para a aplicação android
    $controladorLote = new ControladorLote();
    $result = null;
    $chaves = array_keys($parametrosForm);
    $acao = $chaves[0];//reduzir para 8 quando colocar no método POST
    /*
     * O switch pega a informação da ação do botão e assim seleciona o método a ser requisitado.
     */
    switch ($acao) {
        case $acao == "botaoExcLote":{
            
            //http://localhost/teste/view/cadastroLote.php?botaoExcLote=excluir&codProduto=30&codProdutoAnt=16&dataProducao=08/11/2017&numeroLote=1&XDEBUG_SESSION_START=netbeans-xdebug
            $result = $controladorLote->excluirLote($parametrosForm['numeroLote']);
            if ($result) {
                echo 'Lote excluído com sucesso.';
            } else {
                echo 'Foda deu erro';
            }
            break;
        }
        case $acao=="botaoInsLote":{
            //http://localhost/teste/view/cadastroLote.php?botaoInsLote=inserir&codProduto=16&codProdutoAnt=&dataProducao=13/11/2017&numeroLote=&XDEBUG_SESSION_START=netbeans-xdebug
            $result = $controladorLote->inserirLote($parametrosForm);

            if ($result) {
                echo 'Loja com CNPJ: ' . $result . ' teve seu endereço inserido com sucesso.';
            } else {
                echo 'Foda deu erro';
            }

            break;
        }
        case $acao=="botaoPesqLote":{
            
            //http://localhost/teste/view/cadastroLote.php?botaoPesqLote=inserir&codProduto=16&codProdutoAnt=&dataProducao=13/11/2017&numeroLote=&XDEBUG_SESSION_START=netbeans-xdebug
            $result = $controladorLote->pesquisarLote($parametrosForm['numeroLote']);

            if ($result) {
                echo($result);
                
            } else {
                echo 'Foda deu erro';
            }

            break;
        }
        case $acao=="botaoAltLote":{
            
            //http://localhost/teste/view/cadastroLote.php?botaoAltLote=alterar&codProduto=30&codProdutoAnt=16&dataProducao=08/11/2017&numeroLote=1&XDEBUG_SESSION_START=netbeans-xdebug
            $result = $controladorLote->alterarLote($parametrosForm);

            if ($result) {
                echo 'Lote alterado com sucesso.';
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

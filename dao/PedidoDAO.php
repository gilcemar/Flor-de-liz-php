<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Cliente
 *
 * @author gilcemar
 */
include_once 'conexaoDao.php';
include '../model/Pedido.php';
include_once '../encodingStrings.php';
class PedidoDAO {
    
    /**
     * Função que fornece uma conexão com o banco de dados.
     * @return PDO objeto que representa uma conexão com o banco de dados.
     */
    public static function getConexaoBanco() {
        return ConexaoPDO::getInstance();
    }
    
    public function alterarPedido(Pedido $pedido) {
        //
        try {
            $desconto = addslashes($pedido->getDesconto());
            $cnpjLojaCliente = addslashes($pedido->getCnpjLojaCliente());
            $cnpjLojaClienteAnt = addslashes($pedido->getCnpjLojaClienteAnt());
            $idPedido = addslashes($pedido->getIdPedido());
            $idPedidoAnt = addslashes($pedido->getIdPedidoAnt());
            $pdo = PedidoDAO::getConexaoBanco();
            
            $consulta = 'UPDATE Pedido
                                  SET desconto = :desconto, 
                                      cnpjLojaCliente = :cnpjLojaCliente
                                  WHERE cnpjLojaCliente = :cnpjLojaClienteAnt AND
                                        idPedido = :idPedido;';
            
            $stmt = $pdo->prepare($consulta);
            $stmt->bindValue(':desconto', $desconto);
            $stmt->bindValue(':cnpjLojaCliente', $cnpjLojaCliente, PDO::PARAM_STR);
            $stmt->bindValue(':cnpjLojaClienteAnt', $cnpjLojaClienteAnt, PDO::PARAM_STR);
            $stmt->bindValue(':idPedido', $idPedido);
            
            $stmt->execute();

            $result = $stmt->rowCount();
            if($result>0){
                return $idPedido;
                
            }else
                return false;
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
    
    public function pesquisarPedido($cnpjLojaCliente,$idPedido) {
        try {
            
            $pdo = PedidoDAO::getConexaoBanco();
            $consulta = 'SELECT 
                            * 
                        FROM 
                            Pedido 
                        WHERE 
                            cnpjLojaCliente = :cnpjLojaCliente AND
                            idPedido = :idPedido';
            $stmt = $pdo->prepare($consulta);
            $stmt->bindValue(':cnpjLojaCliente', $cnpjLojaCliente);
            $stmt->bindValue(':idPedido', $idPedido);
                        
            $stmt->execute();
            $erros = $stmt->errorInfo();
            $dadosSelecionados = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $result = $stmt->rowCount();
            if($result>0){
                $resultJson = json_encode($dadosSelecionados);
                return $resultJson;
            }else
                return false;
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
    
    public function excluirPedido($cnpjLojaCliente, $idPedido) {
        try {
            
            $pdo = PedidoDAO::getConexaoBanco();
            $consulta = 'DELETE FROM 
                                    Pedido 
                                WHERE 
                                    cnpjLojaCliente = :cnpjLojaCliente AND
                                    idPedido = :idPedido';
            $stmt = $pdo->prepare($consulta);
            $stmt->bindValue(':cnpjLojaCliente', $cnpjLojaCliente);
            $stmt->bindValue(':idPedido', $idPedido);            
            $stmt->execute();

            $result = $stmt->rowCount();
            if($result>0){
                return true;
            }else
                return false;
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
    
    

    public function inserirPedido(Pedido $pedido) {
        
        //utf8_encode(addslashes($unidadeCusteio->getUnidadeCusteio()));
        try {
            
            $desconto = addslashes($pedido->getDesconto());
            $cnpjLojaCliente = addslashes($pedido->getCnpjLojaCliente());
            $cnpjLojaClienteAnt = addslashes($pedido->getCnpjLojaClienteAnt());
            $idPedido = addslashes($pedido->getIdPedido());
            $idPedidoAnt = addslashes($pedido->getIdPedidoAnt());
            
            $pdo = PedidoDAO::getConexaoBanco();
            $consulta = 'INSERT INTO 
                                    Pedido 
                                        (desconto, 
                                         cnpjLojaCliente) 
                                VALUES 
                                        (:desconto,
                                         :cnpjLojaCliente)';
            $stmt = $pdo->prepare($consulta);
            $stmt->bindValue(':desconto', $desconto);
            $stmt->bindValue(':cnpjLojaCliente', $cnpjLojaCliente, PDO::PARAM_STR);
            
            
            $stmt->execute();

            $result = $stmt->rowCount();
            if($result>0){
                return $cnpjLojaCliente;
            }else
                return false;
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
}

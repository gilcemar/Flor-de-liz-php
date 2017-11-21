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
include '../model/ItemPedido.php';
include_once '../encodingStrings.php';
class ItemPedidoDAO {
    
    /**
     * Função que fornece uma conexão com o banco de dados.
     * @return PDO objeto que representa uma conexão com o banco de dados.
     */
    public static function getConexaoBanco() {
        return ConexaoPDO::getInstance();
    }
    
    public function alterarItemPedido(ItemPedido $itemPedido) {
        //
        try {
            $quantItem = addslashes($itemPedido->getQuantItem());
            $codCalcProd = addslashes($itemPedido->getCodCalcProd());
            $idPedido = addslashes($itemPedido->getIdPedido());
            
            $pdo = ItemPedidoDAO::getConexaoBanco();
            
            $consulta = 'UPDATE ItemPedido
                                  SET quantItem = :quantItem
                                  WHERE codCalcProd = :codCalcProd AND 
                                        idPedido = :idPedido;';
            
            $stmt = $pdo->prepare($consulta);
            $stmt->bindValue(':quantItem', $quantItem);
            $stmt->bindValue(':codCalcProd', $codCalcProd);
            $stmt->bindValue(':idPedido', $idPedido);
            
            $stmt->execute();

            $result = $stmt->rowCount();
            if($result>0){
                return $codCalcProd;
                
            }else
                return false;
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
    
    public function pesquisarItemPedido($idPedido) {
        try {
            
            $pdo = ItemPedidoDAO::getConexaoBanco();
            $consulta = 'SELECT 
                            * 
                        FROM 
                            ItemPedido 
                        WHERE 
                            idPedido  = :idPedido';
            $stmt = $pdo->prepare($consulta);
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
    
    public function excluirItemPedido($codCalcProd) {
        try {
            
            $pdo = ItemPedidoDAO::getConexaoBanco();
            $consulta = 'DELETE FROM 
                                    ItemPedido 
                                WHERE 
                                    codCalcProd = :codCalcProd';
            $stmt = $pdo->prepare($consulta);
            $stmt->bindValue(':codCalcProd', $codCalcProd);
                        
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
    
    

    public function inserirItemPedido(ItemPedido $itemPedido) {
        
        //utf8_encode(addslashes($unidadeCusteio->getUnidadeCusteio()));
        try {
            
            $quantItem = addslashes($itemPedido->getQuantItem());
            $codCalcProd = addslashes($itemPedido->getCodCalcProd());
            $idPedido = addslashes($itemPedido->getIdPedido());
            
            $pdo = ItemPedidoDAO::getConexaoBanco();
            $consulta = 'INSERT INTO 
                                    ItemPedido 
                                        (quantItem, 
                                         idPedido,
                                         codCalcProd) 
                                VALUES 
                                        (:quantItem, 
                                         :idPedido,
                                         :codCalcProd)';
            $stmt = $pdo->prepare($consulta);
            $stmt->bindValue(':quantItem', $quantItem);
            $stmt->bindValue(':idPedido', $idPedido);
            $stmt->bindValue(':codCalcProd', $codCalcProd);
            
            
            
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
}

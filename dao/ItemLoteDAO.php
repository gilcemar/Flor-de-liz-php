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
include '../model/ItemLote.php';
include_once '../encodingStrings.php';
class ItemLoteDAO {
    
    /**
     * Função que fornece uma conexão com o banco de dados.
     * @return PDO objeto que representa uma conexão com o banco de dados.
     */
    public static function getConexaoBanco() {
        return ConexaoPDO::getInstance();
    }
    
    public function alterarItemLote(ItemLote $itemLote) {
        //
        try {
            $codCalcProd = addslashes($itemLote->getCodCalcProd());
            $idLote = addslashes($itemLote->getIdLote());
            $idLoteAnt = addslashes($itemLote->getIdLoteAnt());
            $tamCalc = addslashes($itemLote->getTamCalc());
            $quantCalcProd = addslashes($itemLote->getQuantCalProd());
            $quantCalcDispon = addslashes($itemLote->getQuantCalDispon());
            $precoRevenda = addslashes($itemLote->getPrecoRevenda());
            
            $pdo = ItemLoteDAO::getConexaoBanco();
            
            $consulta = 'UPDATE ItemLote
                                SET tamCalc = :tamCalc,
                                    quantCalcProd = :quantCalcProd,
                                    quantCalcDispon = :quantCalcDispon,
                                    precoRevenda = :precoRevenda
                                WHERE 
                                    idLote = :idLote AND
				     codCalcProd = :codCalcProd;';
            
            $stmt = $pdo->prepare($consulta);
            $stmt->bindValue(':tamCalc', $tamCalc);
            $stmt->bindValue(':quantCalcProd', $quantCalcProd);
            $stmt->bindValue(':quantCalcDispon', $quantCalcDispon);
            $stmt->bindValue(':precoRevenda', $precoRevenda);
            $stmt->bindValue(':idLote', $idLote);
	    $stmt->bindValue(':codCalcProd', $codCalcProd);
            
            $stmt->execute();

            $result = $stmt->rowCount();
            if($result>0){
                return $idLote;
                
            }else
                return false;
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
    
    public function pesquisarItemLote($codCalProd, $idLote) {
        try {
            
            $pdo = ItemLoteDAO::getConexaoBanco();
            $consulta = 'SELECT 
                            * 
                        FROM 
                            ItemLote 
                        WHERE 
                            idLote = :idLote';
            $stmt = $pdo->prepare($consulta);
            $stmt->bindValue(':idLote', $idLote);
                        
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
    
    public function excluirItemLote($codCalProd, $idLote) {
        try {
            
            $pdo = ItemLoteDAO::getConexaoBanco();
            $consulta = 'DELETE FROM 
                                    ItemLote 
                                WHERE 
                                    codCalcProd = :codCalcProd AND
                                    idLote = :idLote';
            $stmt = $pdo->prepare($consulta);
            $stmt->bindValue(':codCalcProd', $codCalProd);
            $stmt->bindValue(':idLote', $idLote);
                        
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
    
    

    public function inserirItemLote(ItemLote $itemLote) {
        
        //utf8_encode(addslashes($unidadeCusteio->getUnidadeCusteio()));
        try {
            
            $codCalcProd = addslashes($itemLote->getCodCalcProd());
            $idLote = addslashes($itemLote->getIdLote());
            $idLoteAnt = addslashes($itemLote->getIdLoteAnt());
            $tamCalc = addslashes($itemLote->getTamCalc());
            $quantCalcProd = addslashes($itemLote->getQuantCalProd());
            $quantCalcDispon = addslashes($itemLote->getQuantCalDispon());
            $precoRevenda = addslashes($itemLote->getPrecoRevenda());
            
            $pdo = ItemLoteDAO::getConexaoBanco();
            $consulta = 'INSERT INTO 
                                    ItemLote 
                                        (idLote, 
                                         tamCalc, 
                                         quantCalcProd, 
                                         quantCalcDispon, 
                                         precoRevenda) 
                                VALUES 
                                        (:idLote, 
                                         :tamCalc,
                                         :quantCalcProd,
                                         :quantCalcDispon,
                                         :precoRevenda)';
            $stmt = $pdo->prepare($consulta);
            $stmt->bindValue(':idLote', $idLote);
            $stmt->bindValue(':tamCalc', $tamCalc);
            $stmt->bindValue(':quantCalcProd', $quantCalcProd);
            $stmt->bindValue(':quantCalcDispon', $quantCalcDispon);
            $stmt->bindValue(':precoRevenda', $precoRevenda);
            
            
            $stmt->execute();

            $result = $stmt->rowCount();
            if($result>0){
                return $result;
            }else
                return false;
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
}

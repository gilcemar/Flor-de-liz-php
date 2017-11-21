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
include '../model/Lote.php';
include_once '../encodingStrings.php';
include_once '../formatador.php';
class LoteDAO {
    
    /**
     * Função que fornece uma conexão com o banco de dados.
     * @return PDO objeto que representa uma conexão com o banco de dados.
     */
    public static function getConexaoBanco() {
        return ConexaoPDO::getInstance();
    }
    
    public function alterarLote(Lote $lote) {
        //
        try {
            $codProd = addslashes($lote->getCodProd());
            $codProdAnt = addslashes($lote->getCodProdAnt());
            $dataProd = addslashes($lote->getDataProducao());
            $idLote = addslashes($lote->getIdLote());
            $dataProd = Formatador::dateToEn($dataProd);
            
            $pdo = LoteDAO::getConexaoBanco();
            
	    //é possível alterar em uma lote o produto produzido e a data em que foi produzido somente isso.
            $consulta = 'UPDATE Lote
                                SET codProd = :codProd, 
                                    dataProd = :dataProd
                                WHERE
                                    idLote = :idLote;';
            
            $stmt = $pdo->prepare($consulta);
            $stmt->bindValue(':codProd', $codProd);
            $stmt->bindValue(':dataProd', $dataProd);
            $stmt->bindValue(':idLote', $idLote);
            
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
    
    public function pesquisarLote($idLote) {
        try {
            
            $pdo = LoteDAO::getConexaoBanco();
            /*
            $consulta = 'SELECT 
                            codProd, dataProd, idLote 
                        FROM 
                            Lote 
                        WHERE 
                            idLote = :codProd
                        GROUPY BY 
                            codProd';
             * 
             */
            $consulta = 'SELECT 
                            dataProd, codProd, idLote 
                        FROM 
                            Lote 
                        WHERE 
                            idLote = :idLote
                        GROUP BY 
                            dataProd, codProd, idLote
                        ORDER BY
                            dataProd';
            $stmt = $pdo->prepare($consulta);
            $stmt->bindValue(':idLote', $idLote);
                        
            $stmt->execute();
            $erros = $stmt->errorInfo();
            $dadosSelecionados;
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                $row["dataProd"] = Formatador::dateToBr($row["dataProd"]);
                $dadosSelecionados[] = $row;
            }
                        
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
    
    public function excluirLote($idLote) {
        try {
            
            $pdo = LoteDAO::getConexaoBanco();
            $consulta = 'DELETE FROM 
                                    Lote
                                WHERE 
                                    idLote = :idLote';
            $stmt = $pdo->prepare($consulta);
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
    
    

    public function inserirLote(Lote $lote) {
        
        //utf8_encode(addslashes($unidadeCusteio->getUnidadeCusteio()));
        try {
            
            $codProd = addslashes($lote->getCodProd());
            $codProdAnt = addslashes($lote->getCodProdAnt());
            $dataProd = addslashes($lote->getDataProducao());
            
            $dataProd = Formatador::dateToEn($dataProd);
            $idLote = addslashes($lote->getIdLote());
            
            $pdo = LoteDAO::getConexaoBanco();
            $consulta = 'INSERT INTO 
                                    Lote
                                        (codProd, 
                                         dataProd) 
                                VALUES 
                                        (:codProd, 
                                         :dataProd)';
            $stmt = $pdo->prepare($consulta);
            $stmt->bindValue(':codProd', $codProd);
            $stmt->bindValue(':dataProd', $dataProd);
            
            
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

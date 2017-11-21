<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CalcadoDAO
 *
 * @author gilcemar
 */
include_once 'conexaoDao.php';
include '../model/Calcado.php';
include_once '../encodingStrings.php';
class CalcadoDAO {

    /**
     * Função que fornece uma conexão com o banco de dados.
     * @return PDO objeto que representa uma conexão com o banco de dados.
     */
    public static function getConexaoBanco() {
        return ConexaoPDO::getInstance();
    }
    
    public function alterarCalcado(Calcado $calcado) {
        try {
            
            $nomeCalc = addslashes($calcado->getNomeCal());
            $menorTam = $calcado->getMenorTam();
            $maiorTam = $calcado->getMaiorTam();
            $cor = $calcado->getCor();
            $nomeColecao = addslashes($calcado->getNomeColecao());
            $precoCusto = $calcado->getPrecoCusto();
            $id = $calcado->getIdCal();
            
            $pdo = CalcadoDAO::getConexaoBanco();
            $consult = 'UPDATE Calcado
                                  SET nomeCalc = :nomeCalc, 
                                      menorTam = :menorTam,
                                      maiorTam = :maiorTam,
                                      cor = :cor,
                                      nomeColecao = :nomeColecao,
                                      precoCusto = :precoCusto
                                  WHERE idCalcado = :id;';
            //$stmt = $pdo->prepare('INSERT INTO Calcado (nomeCalc, menorTam, maiorTam, cor, nomeColecao, precoCusto) VALUES (:nomeCalc, :menorTam, :maiorTam, :cor, :nomeColecao, :precoCusto)');
            $stmt = $pdo->prepare($consult);
            $stmt->bindValue(':nomeCalc', $nomeCalc, PDO::PARAM_STR);
            $stmt->bindValue(':menorTam', $menorTam);
            $stmt->bindValue(':maiorTam', $maiorTam);
            $stmt->bindValue(':cor', $cor);
            $stmt->bindValue(':nomeColecao', $nomeColecao, PDO::PARAM_STR);
            $stmt->bindValue(':precoCusto', $precoCusto);
            $stmt->bindValue(":id", $id);
            
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
    
    public function pesquisarCalcado($nomeCalc) {
        try {
            
            $pdo = CalcadoDAO::getConexaoBanco();
            
            $stmt = $pdo->prepare('SELECT * FROM Calcado WHERE nomeCalc = :nomeCalc');
            $stmt->bindValue(':nomeCalc', $nomeCalc);
                        
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
    
    public function excluirCalcado($nomeCalc) {
        try {
            
            $pdo = CalcadoDAO::getConexaoBanco();
            
            $stmt = $pdo->prepare('DELETE FROM Calcado WHERE nomeCalc = :nomeCalc');
            $stmt->bindValue(':nomeCalc', $nomeCalc);
                        
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
    
    

    public function inserirCalcado($calcado) {
        
        //utf8_encode(addslashes($unidadeCusteio->getUnidadeCusteio()));
        try {
            
            $nomeCalc = addslashes($calcado->getNomeCal());
            $menorTam = $calcado->getMenorTam();
            $maiorTam = $calcado->getMaiorTam();
            $cor = $calcado->getCor();
            $nomeColecao = addslashes($calcado->getNomeColecao());
            $precoCusto = $calcado->getPrecoCusto();
            
            $pdo = CalcadoDAO::getConexaoBanco();
            
            $stmt = $pdo->prepare('INSERT INTO Calcado (nomeCalc, menorTam, maiorTam, cor, nomeColecao, precoCusto) VALUES (:nomeCalc, :menorTam, :maiorTam, :cor, :nomeColecao, :precoCusto)');
            $stmt->bindValue(':nomeCalc', $nomeCalc, PDO::PARAM_STR);
            $stmt->bindValue(':menorTam', $menorTam);
            $stmt->bindValue(':maiorTam', $maiorTam);
            $stmt->bindValue(':cor', $cor);
            $stmt->bindValue(':nomeColecao', $nomeColecao, PDO::PARAM_STR);
            $stmt->bindValue(':precoCusto', $precoCusto);
            
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
}
    
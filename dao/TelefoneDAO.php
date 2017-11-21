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
include '../model/Telefone.php';
include_once '../encodingStrings.php';
class TelefoneDAO {
    
    /**
     * Função que fornece uma conexão com o banco de dados.
     * @return PDO objeto que representa uma conexão com o banco de dados.
     */
    public static function getConexaoBanco() {
        return ConexaoPDO::getInstance();
    }
    
    public function alterarTelLoja(Telefone $telefoneLoja) {
        //
        try {
            $numero = addslashes($telefoneLoja->getNumeroTelefone());
            $numeroAnt  = addslashes($telefoneLoja->getNumeroTelefoneAnt());
            $cnpjLoja = addslashes($telefoneLoja->getCnpjLojaCliente());
            
            
            $pdo = TelefoneDAO::getConexaoBanco();
            
            $consulta = 'UPDATE Telefone
                                  SET numero = :numero, 
                                      cnpjLojaCliente = :cnpjLojaCliente
                                  WHERE cnpjLojaCliente = :cnpjLojaCliente AND
                                        numero = :numeroAnt;';
            
            $stmt = $pdo->prepare($consulta);
            $stmt->bindValue(':numero', $numero, PDO::PARAM_STR);
            $stmt->bindValue(':cnpjLojaCliente', $cnpjLoja, PDO::PARAM_STR);
            $stmt->bindValue(':numeroAnt', $numeroAnt, PDO::PARAM_STR);
            
            $stmt->execute();

            $result = $stmt->rowCount();
            if($result>0){
                return $cnpjLoja;
                
            }else
                return false;
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
    
    public function pesquisarTelLoja($cnpjLojaCliente) {
        try {
            
            $pdo = TelefoneDAO::getConexaoBanco();
            $consulta = 'SELECT 
                            * 
                        FROM 
                            Telefone
                        WHERE 
                            cnpjLojaCliente = :cnpjLojaCliente';
            $stmt = $pdo->prepare($consulta);
            $stmt->bindValue(':cnpjLojaCliente', $cnpjLojaCliente);
                        
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
    
    public function excluirTelLoja($cnpjLojaCliente) {
        try {
            
            $pdo = TelefoneDAO::getConexaoBanco();
            $consulta = 'DELETE FROM 
                                    Telefone
                                WHERE 
                                    cnpjLojaCliente = :cnpjLojaCliente';
            $stmt = $pdo->prepare($consulta);
            $stmt->bindValue(':cnpjLojaCliente', $cnpjLojaCliente);
                        
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
    
    

    public function inserirTelLoja(Telefone $telefoneLoja) {
        
        //utf8_encode(addslashes($unidadeCusteio->getUnidadeCusteio()));
        try {
            
            $numero = addslashes($telefoneLoja->getNumeroTelefone());
            $cnpjLoja = addslashes($telefoneLoja->getCnpjLojaCliente());
            
            $pdo = TelefoneDAO::getConexaoBanco();
            $consulta = 'INSERT INTO 
                                    Telefone
                                        (numero, 
                                         cnpjLojaCliente) 
                                VALUES 
                                        (:numero, 
                                         :cnpjLojaCliente)';
            $stmt = $pdo->prepare($consulta);
            $stmt->bindValue(':numero', $numero);
            $stmt->bindValue(':cnpjLojaCliente', $cnpjLoja, PDO::PARAM_STR);
            
            
            $stmt->execute();

            $result = $stmt->rowCount();
            if($result>0){
                return $cnpjLoja;
            }else
                return false;
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
}

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
include '../model/Cliente.php';
include_once '../encodingStrings.php';
class ClienteDAO {
    
    /**
     * Função que fornece uma conexão com o banco de dados.
     * @return PDO objeto que representa uma conexão com o banco de dados.
     */
    public static function getConexaoBanco() {
        return ConexaoPDO::getInstance();
    }
    
    public function alterarCliente(Cliente $cliente) {
        try {
            $cnpjLojaClienteAntigo = addslashes($cliente->getCnpjLojaClienteAntigo());
            $cnpjLojaCliente = addslashes($cliente->getCnpjLojaCliente());
            $cpfCliente = addslashes($cliente->getCpfCliente());
            $nomeCliente = addslashes($cliente->getNomeCliente());
            $nomeLojaCliente = addslashes($cliente->getNomeLojaCliente());
            
            $pdo = ClienteDAO::getConexaoBanco();
            
            $consulta = 'UPDATE Cliente
                                  SET cnpjLojaCliente = :cnpjLojaCliente, 
                                      cpfCliente = :cpfCliente,
                                      nomeCliente = :nomeCliente,
                                      nomeLojaCliente = :nomeLojaCliente
                                  WHERE cnpjLojaCliente = :cnpjLojaClienteAntigo;';
            
            $stmt = $pdo->prepare($consulta);
            $stmt->bindValue(':cnpjLojaCliente', $cnpjLojaCliente, PDO::PARAM_STR);
            $stmt->bindValue(':cpfCliente', $cpfCliente, PDO::PARAM_STR);
            $stmt->bindValue(':nomeCliente', $nomeCliente, PDO::PARAM_STR);
            $stmt->bindValue(':nomeLojaCliente', $nomeLojaCliente, PDO::PARAM_STR);
            $stmt->bindValue(':cnpjLojaClienteAntigo', $cnpjLojaClienteAntigo, PDO::PARAM_STR);
            
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
    
    public function pesquisarCliente($cnpjLojaCliente) {
        try {
            
            $pdo = ClienteDAO::getConexaoBanco();
            $consulta = 'SELECT 
                            * 
                        FROM 
                            Cliente 
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
    
    public function excluirCliente($cnpjLojaCliente) {
        try {
            
            $pdo = ClienteDAO::getConexaoBanco();
            $consulta = 'DELETE FROM 
                                    Cliente 
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
    
    

    public function inserirCliente(Cliente $cliente) {
        
        //utf8_encode(addslashes($unidadeCusteio->getUnidadeCusteio()));
        try {
            
            $cnpjLojaCliente = addslashes($cliente->getCnpjLojaCliente());
            $cpfCliente = addslashes($cliente->getCpfCliente());
            $nomeCliente = addslashes($cliente->getNomeCliente());
            $nomeLojaCliente = addslashes($cliente->getNomeLojaCliente());
                        
            $pdo = ClienteDAO::getConexaoBanco();
            $consulta = 'INSERT INTO 
                                    Cliente 
                                        (cnpjLojaCliente, 
                                         cpfCliente, 
                                         nomeCliente, 
                                         nomeLojaCliente) 
                                VALUES 
                                        (:cnpjLojaCliente, 
                                         :cpfCliente,
                                         :nomeCliente,
                                         :nomeLojaCliente)';
            $stmt = $pdo->prepare($consulta);
            $stmt->bindValue(':cnpjLojaCliente', $cnpjLojaCliente, PDO::PARAM_STR);
            $stmt->bindValue(':cpfCliente', $cpfCliente, PDO::PARAM_STR);
            $stmt->bindValue(':nomeCliente', $nomeCliente, PDO::PARAM_STR);
            $stmt->bindValue(':nomeLojaCliente', $nomeLojaCliente, PDO::PARAM_STR);
            
            
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

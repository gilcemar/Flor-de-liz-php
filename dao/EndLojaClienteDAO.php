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
include '../model/EndLojaCliente.php';
include_once '../encodingStrings.php';
class EndLojaClienteDAO {
    
    /**
     * Função que fornece uma conexão com o banco de dados.
     * @return PDO objeto que representa uma conexão com o banco de dados.
     */
    public static function getConexaoBanco() {
        return ConexaoPDO::getInstance();
    }
    
    public function alterarEndLoja(EndLojaCliente $enderecoLoja) {
        //
        try {
            $rua = addslashes($enderecoLoja->getRua());
            $bairro = addslashes($enderecoLoja->getBairro());
            $cidade = addslashes($enderecoLoja->getCidade());
            $uf = addslashes($enderecoLoja->getUf());
            $pais = addslashes($enderecoLoja->getPais());
            $numero = addslashes($enderecoLoja->getNumero());
            $idEnd= addslashes($enderecoLoja->getIdEnd());
            $cnpjLoja= addslashes($enderecoLoja->getCnpjLojaCliente());
            
            $pdo = EndLojaClienteDAO::getConexaoBanco();
            
            $consulta = 'UPDATE EnderecoLojaCliente
                                  SET rua = :rua, 
                                      bairro = :bairro,
                                      cidade = :cidade,
                                      uf = :uf,
                                      pais = :pais,
                                      numero = :numero
                                  WHERE idEnd = :idEnd;';
            
            $stmt = $pdo->prepare($consulta);
            $stmt->bindValue(':rua', $rua, PDO::PARAM_STR);
            $stmt->bindValue(':bairro', $bairro, PDO::PARAM_STR);
            $stmt->bindValue(':cidade', $cidade, PDO::PARAM_STR);
            $stmt->bindValue(':uf', $uf, PDO::PARAM_STR);
            $stmt->bindValue(':pais', $pais, PDO::PARAM_STR);
            $stmt->bindValue(':numero', $numero);
            $stmt->bindValue(':idEnd', $idEnd, PDO::PARAM_STR);
            
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
    
    public function pesquisarEndLoja($cnpjLojaCliente) {
        try {
            
            $pdo = EndLojaClienteDAO::getConexaoBanco();
            $consulta = 'SELECT 
                            * 
                        FROM 
                            EnderecoLojaCliente 
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
    
    public function excluirEndLoja($cnpjLojaCliente) {
        try {
            
            $pdo = EndLojaClienteDAO::getConexaoBanco();
            $consulta = 'DELETE FROM 
                                    EnderecoLojaCliente 
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
    
    

    public function inserirEndLoja(EndLojaCliente $enderecoLoja) {
        
        //utf8_encode(addslashes($unidadeCusteio->getUnidadeCusteio()));
        try {
            
            $rua = addslashes($enderecoLoja->getRua());
            $bairro = addslashes($enderecoLoja->getBairro());
            $cidade = addslashes($enderecoLoja->getCidade());
            $uf = addslashes($enderecoLoja->getUf());
            $pais = addslashes($enderecoLoja->getPais());
            $numero = addslashes($enderecoLoja->getNumero());
            $idEnd= addslashes($enderecoLoja->getIdEnd());
            $cnpjLoja= addslashes($enderecoLoja->getCnpjLojaCliente());
            
            $pdo = EndLojaClienteDAO::getConexaoBanco();
            $consulta = 'INSERT INTO 
                                    EnderecoLojaCliente 
                                        (rua, 
                                         bairro, 
                                         cidade, 
                                         uf, 
                                         pais, 
                                         numero, 
                                         cnpjLojaCliente) 
                                VALUES 
                                        (:rua, 
                                         :bairro,
                                         :cidade,
                                         :uf,
                                         :pais,
                                         :numero,
                                         :cnpjLojaCliente)';
            $stmt = $pdo->prepare($consulta);
            $stmt->bindValue(':rua', $rua, PDO::PARAM_STR);
            $stmt->bindValue(':bairro', $bairro, PDO::PARAM_STR);
            $stmt->bindValue(':cidade', $cidade, PDO::PARAM_STR);
            $stmt->bindValue(':uf', $uf, PDO::PARAM_STR);
            $stmt->bindValue(':pais', $pais, PDO::PARAM_STR);
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

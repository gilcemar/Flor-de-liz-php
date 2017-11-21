<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include_once '../encodingStrings.php';
include_once '../dao/EndLojaClienteDAO.php';
include_once '../model/EndLojaCliente.php';


class ControladorEndLojaCliente {
    public function inserirEndLoja($parametrosPost) {
        
        $enderecoLoja = new EndLojaCliente();
        
        $enderecoLoja->setRua($parametrosPost['rua']);
        $enderecoLoja->setBairro($parametrosPost['bairro']);
        $enderecoLoja->setCidade($parametrosPost['cidade']);
        $enderecoLoja->setUf($parametrosPost['uf']);
        $enderecoLoja->setPais($parametrosPost['pais']);
        $enderecoLoja->setNumero($parametrosPost['numero']);
        $enderecoLoja->setIdEnd($parametrosPost['idEnd']);
        $enderecoLoja->setCnpjLojaCliente($parametrosPost['cnpjLoja']);
        
        $enderecoLojaDAO = new EndLojaClienteDAO();
        return $enderecoLojaDAO->inserirEndLoja($enderecoLoja);
        
    }
    
    public function excluirEndLoja($cnpjLoja) {
        $enderecoLojaDAO = new EndLojaClienteDAO();
        return $enderecoLojaDAO->excluirEndLoja($cnpjLoja);
    }
    
    public function pesquisarEndLoja($cnpjLoja) {
        $enderecoLojaDAO = new EndLojaClienteDAO();
        $result = $enderecoLojaDAO->pesquisarEndLoja($cnpjLoja);
        return $result;
    }
    
    public function alterarEndLoja($parametrosPost) {
        $enderecoLoja = new EndLojaCliente();
        
        $enderecoLoja->setRua($parametrosPost['rua']);
        $enderecoLoja->setBairro($parametrosPost['bairro']);
        $enderecoLoja->setCidade($parametrosPost['cidade']);
        $enderecoLoja->setUf($parametrosPost['uf']);
        $enderecoLoja->setPais($parametrosPost['pais']);
        $enderecoLoja->setNumero($parametrosPost['numero']);
        $enderecoLoja->setIdEnd($parametrosPost['idEnd']);
        $enderecoLoja->setCnpjLojaCliente($parametrosPost['cnpjLoja']);
        
        $enderecoLojaDAO = new EndLojaClienteDAO();
        return $enderecoLojaDAO->alterarEndLoja($enderecoLoja);
    }
}




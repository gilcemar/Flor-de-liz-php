<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include_once '../encodingStrings.php';
include_once '../dao/ClienteDAO.php';
include_once '../model/Cliente.php';


class ControladorCliente {
    public function inserirCliente($parametrosPost) {
        
        $cliente = new Cliente();
        
        $cliente->setCnpjLojaCliente($parametrosPost['cnpjLoja']);
        $cliente->setCpfCliente($parametrosPost['cpf']);
        $cliente->setNomeCliente($parametrosPost['clienteNome']);
        $cliente->setNomeLojaCliente($parametrosPost['nomeLoja']);
        $clienteDAO = new ClienteDAO();
        return $clienteDAO->inserirCliente($cliente);
        
    }
    
    public function excluirCliente($cnpjLoja) {
        $clienteDAO = new ClienteDAO();
        return $clienteDAO->excluirCliente($cnpjLoja);
    }
    
    public function pesquisarCliente($cnpjLoja) {
        $clienteDAO = new ClienteDAO();
        $result = $clienteDAO->pesquisarCliente($cnpjLoja);
        return $result;
    }
    
    public function alterarCliente($parametrosPost) {
        $cliente = new Cliente();
        $cliente->setCnpjLojaClienteAntigo($parametrosPost['cnpjLojaAnt']);
        $cliente->setCnpjLojaCliente($parametrosPost['cnpjLoja']);
        $cliente->setCpfCliente($parametrosPost['cpf']);
        $cliente->setNomeCliente($parametrosPost['clienteNome']);
        $cliente->setNomeLojaCliente($parametrosPost['nomeLoja']);
        $clienteDAO = new ClienteDAO();
        return $clienteDAO->alterarCliente($cliente);
    }
}




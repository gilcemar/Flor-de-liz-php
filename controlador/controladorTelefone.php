<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include_once '../encodingStrings.php';
include_once '../dao/TelefoneDAO.php';
include_once '../model/Telefone.php';


class ControladorTelefone{
    public function inserirTelLoja($parametrosPost) {
        
        $telefone = new Telefone();
        
        $telefone->setNumeroTelefone($parametrosPost['numero']);
        $telefone->setCnpjLojaCliente($parametrosPost['cnpj']);
        $telefone->setNumeroTelefoneAnt($parametrosPost['telAnt']);
        
        $telefoneDAO = new TelefoneDAO();
        return $telefoneDAO->inserirTelLoja($telefone);
        
    }
    
    public function excluirTelLoja($cnpjLoja) {
        $telefoneDAO = new TelefoneDAO();
        return $telefoneDAO->excluirTelLoja($cnpjLoja);
    }
    
    public function pesquisarTelLoja($cnpjLoja) {
        $telefoneDAO = new TelefoneDAO();
        $result = $telefoneDAO->pesquisarTelLoja($cnpjLoja);
        return $result;
    }
    
    public function alterarTelLoja($parametrosPost) {
        $telefone = new Telefone();
        
        $telefone->setNumeroTelefone($parametrosPost['numero']);
        $telefone->setCnpjLojaCliente($parametrosPost['cnpj']);
        $telefone->setNumeroTelefoneAnt($parametrosPost['telAnt']);
        
        $telefoneDAO = new TelefoneDAO();
        return $telefoneDAO->alterarTelLoja($telefone);
    }
}




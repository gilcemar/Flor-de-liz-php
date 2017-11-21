<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Telefone
 *
 * @author gilcemar
 */
class Telefone {
    private $cnpjLojaCliente;//chave estrangeira do cliente
    private $numeroTelefone;
    private $numeroTelefoneAnt;
    
    function getNumeroTelefoneAnt() {
        return $this->numeroTelefoneAnt;
    }

    function setNumeroTelefoneAnt($numeroTelefoneAnt) {
        $this->numeroTelefoneAnt = $numeroTelefoneAnt;
    }

        
    function getCnpjLojaCliente() {
        return $this->cnpjLojaCliente;
    }

    function getNumeroTelefone() {
        return $this->numeroTelefone;
    }

    function setCnpjLojaCliente($cnpjLojaCliente) {
        $this->cnpjLojaCliente = $cnpjLojaCliente;
    }

    function setNumeroTelefone($numeroTelefone) {
        $this->numeroTelefone = $numeroTelefone;
    }


    
}

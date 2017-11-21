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
class Cliente {
    private $cnpjLojaClienteAntigo, $cnpjLojaCliente, $cpfCliente, $nomeCliente, $nomeLojaCliente;
    
    function getCnpjLojaClienteAntigo() {
        return $this->cnpjLojaClienteAntigo;
    }

    function setCnpjLojaClienteAntigo($cnpjLojaClienteAntigo) {
        $this->cnpjLojaClienteAntigo = $cnpjLojaClienteAntigo;
    }

        function getCnpjLojaCliente() {
        return $this->cnpjLojaCliente;
    }

    function getCpfCliente() {
        return $this->cpfCliente;
    }

    function getNomeCliente() {
        return $this->nomeCliente;
    }

    function getNomeLojaCliente() {
        return $this->nomeLojaCliente;
    }

    function setCnpjLojaCliente($cnpjLojaCliente) {
        $this->cnpjLojaCliente = $cnpjLojaCliente;
    }

    function setCpfCliente($cpfCliente) {
        $this->cpfCliente = $cpfCliente;
    }

    function setNomeCliente($nomeCliente) {
        $this->nomeCliente = $nomeCliente;
    }

    function setNomeLojaCliente($nomeLojaCliente) {
        $this->nomeLojaCliente = $nomeLojaCliente;
    }


}

<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of EndLojaCliente
 *
 * @author gilcemar
 */
class EndLojaCliente {
    private $idEnd, $cnpjLojaCliente, $numero, $pais, $uf, $cidade, $bairro, $rua;
    
    function getIdEnd() {
        return $this->idEnd;
    }

    function getCnpjLojaCliente() {
        return $this->cnpjLojaCliente;
    }

    function getNumero() {
        return $this->numero;
    }

    function getPais() {
        return $this->pais;
    }

    function getUf() {
        return $this->uf;
    }

    function getCidade() {
        return $this->cidade;
    }

    function getBairro() {
        return $this->bairro;
    }

    function getRua() {
        return $this->rua;
    }

    function setIdEnd($idEnd) {
        $this->idEnd = $idEnd;
    }

    function setCnpjLojaCliente($cnpjLojaCliente) {
        $this->cnpjLojaCliente = $cnpjLojaCliente;
    }

    function setNumero($numero) {
        $this->numero = $numero;
    }

    function setPais($pais) {
        $this->pais = $pais;
    }

    function setUf($uf) {
        $this->uf = $uf;
    }

    function setCidade($cidade) {
        $this->cidade = $cidade;
    }

    function setBairro($bairro) {
        $this->bairro = $bairro;
    }

    function setRua($rua) {
        $this->rua = $rua;
    }


}

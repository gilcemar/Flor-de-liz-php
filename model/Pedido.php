<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Pedido
 *
 * @author gilcemar
 */
class Pedido {
    private $idPedido;//chave primária de autoincremento.
    private $cnpjLojaCliente;//chave estrangeira do cliente
    private $desconto;
    private $idPedidoAnt;
    private $cnpjLojaClienteAnt;
    
    function getIdPedidoAnt() {
        return $this->idPedidoAnt;
    }

    function getCnpjLojaClienteAnt() {
        return $this->cnpjLojaClienteAnt;
    }

    function setIdPedidoAnt($idPedidoAnt) {
        $this->idPedidoAnt = $idPedidoAnt;
    }

    function setCnpjLojaClienteAnt($cnpjLojaClienteAnt) {
        $this->cnpjLojaClienteAnt = $cnpjLojaClienteAnt;
    }

        
    function getIdPedido() {
        return $this->idPedido;
    }

    function getCnpjLojaCliente() {
        return $this->cnpjLojaCliente;
    }

    function getDesconto() {
        return $this->desconto;
    }

    function setIdPedido($idPedido) {
        $this->idPedido = $idPedido;
    }

    function setCnpjLojaCliente($cnpjLojaCliente) {
        $this->cnpjLojaCliente = $cnpjLojaCliente;
    }

    function setDesconto($desconto) {
        $this->desconto = $desconto;
    }


}

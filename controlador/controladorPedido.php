<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include_once '../encodingStrings.php';
include_once '../dao/PedidoDAO.php';
include_once '../model/Pedido.php';


class ControladorPedido {
    public function inserirPedido($parametrosPost) {
        
        $pedido = new Pedido();
        
        $pedido->setDesconto($parametrosPost['descPedido']);
        $pedido->setCnpjLojaCliente($parametrosPost['cnpjLoja']);
        $pedido->setCnpjLojaClienteAnt($parametrosPost['cnpjLojaAnt']);
        $pedido->setIdPedido($parametrosPost['idPedido']);
        $pedido->setIdPedidoAnt($parametrosPost['idPedidoAnt']);
        
        $pedidoDAO = new PedidoDAO();
        return $pedidoDAO->inserirPedido($pedido);
        
    }
    
    public function excluirPedido($cnpjLoja, $idPedido) {
        $pedidoDAO = new PedidoDAO();
        return $pedidoDAO->excluirPedido($cnpjLoja, $idPedido);
    }
    
    public function pesquisarPedido($cnpjLoja, $idPedido) {
        $pedidoDAO = new PedidoDAO();
        $result = $pedidoDAO->pesquisarPedido($cnpjLoja, $idPedido);
        return $result;
    }
    
    public function alterarPedido($parametrosPost) {
        $pedido = new Pedido();
        
        $pedido->setDesconto($parametrosPost['descPedido']);
        $pedido->setCnpjLojaCliente($parametrosPost['cnpjLoja']);
        $pedido->setCnpjLojaClienteAnt($parametrosPost['cnpjLojaAnt']);
        $pedido->setIdPedido($parametrosPost['idPedido']);
        $pedido->setIdPedidoAnt($parametrosPost['idPedidoAnt']);
        
        $pedidoDAO = new PedidoDAO();
        return $pedidoDAO->alterarPedido($pedido);
    }
}




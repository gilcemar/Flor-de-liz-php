<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include_once '../encodingStrings.php';
include_once '../dao/ItemPedidoDAO.php';
include_once '../model/ItemPedido.php';


class ControladorItemPedido {
    public function inserirItemPedido($parametrosPost) {
        
        $itemPedido = new ItemPedido();
        
        $itemPedido->setQuantItem($parametrosPost['quantidadeItem']);
        $itemPedido->setCodCalcProd($parametrosPost['codigoProd']);
        $itemPedido->setIdPedido($parametrosPost['numeroPedido']);
        
        $itemPedidoDAO = new ItemPedidoDAO();
        return $itemPedidoDAO->inserirItemPedido($itemPedido);
        
    }
    
    public function excluirItemPedido($codCalcProd) {
        $itemPedidoDAO = new ItemPedidoDAO();
        return $itemPedidoDAO->excluirItemPedido($codCalcProd);
    }
    
    public function pesquisarItemPedido($idPedido) {
        $itemPedidoDAO = new ItemPedidoDAO();
        $result = $itemPedidoDAO->pesquisarItemPedido($idPedido);
        return $result;
    }
    
    public function alterarItemPedido($parametrosPost) {
        
        $itemPedido = new ItemPedido();
        
        $itemPedido->setQuantItem($parametrosPost['quantidadeItem']);
        $itemPedido->setCodCalcProd($parametrosPost['codigoProd']);
        $itemPedido->setIdPedido($parametrosPost['numeroPedido']);
        
        $itemPedidoDAO = new ItemPedidoDAO();
        return $itemPedidoDAO->alterarItemPedido($itemPedido);
    }
}




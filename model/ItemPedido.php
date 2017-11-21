<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ItemPedido
 *
 * @author gilcemar
 */
class ItemPedido {
    private $idPedido;//chave estrangeira do Pedido
    private $codCalcProd;//chave estrangeira do item contido em um lote de produção
    private $quantItem;
    
    function getIdPedido() {
        return $this->idPedido;
    }

    function getCodCalcProd() {
        return $this->codCalcProd;
    }

    function getQuantItem() {
        return $this->quantItem;
    }

    function setIdPedido($idPedido) {
        $this->idPedido = $idPedido;
    }

    function setCodCalcProd($codCalcProd) {
        $this->codCalcProd = $codCalcProd;
    }

    function setQuantItem($quantItem) {
        $this->quantItem = $quantItem;
    }


}

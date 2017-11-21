<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ItemLote
 *
 * @author gilcemar
 */
class ItemLote {
    private $codCalcProd;//chave primária de autoincremento, só serve para quando for pesquisado.
    private $idLote;//chave estrangeira do lote produzido. Serve para vincular o item ao lote.
    private $idLoteAnt;
    private $tamCalc;
    private $quantCalProd;
    private $quantCalDispon;
    private $precoRevenda;
    
    function getIdLoteAnt() {
        return $this->idLoteAnt;
    }

    function setIdLoteAnt($idLoteAnt) {
        $this->idLoteAnt = $idLoteAnt;
    }

        
    function getCodCalcProd() {
        return $this->codCalcProd;
    }

    function getIdLote() {
        return $this->idLote;
    }

    function getTamCalc() {
        return $this->tamCalc;
    }

    function getQuantCalProd() {
        return $this->quantCalProd;
    }

    function getQuantCalDispon() {
        return $this->quantCalDispon;
    }

    function getPrecoRevenda() {
        return $this->precoRevenda;
    }

    function setCodCalcProd($codCalcProd) {
        $this->codCalcProd = $codCalcProd;
    }

    function setIdLote($idLote) {
        $this->idLote = $idLote;
    }

    function setTamCalc($tamCalc) {
        $this->tamCalc = $tamCalc;
    }

    function setQuantCalProd($quantCalProd) {
        $this->quantCalProd = $quantCalProd;
    }

    function setQuantCalDispon($quantCalDispon) {
        $this->quantCalDispon = $quantCalDispon;
    }

    function setPrecoRevenda($precoRevenda) {
        $this->precoRevenda = $precoRevenda;
    }


}

<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include_once '../encodingStrings.php';
include_once '../dao/ItemLoteDAO.php';
include_once '../model/ItemLote.php';


class ControladorItemLote {
    public function inserirItemLote($parametrosPost) {
        
        $itemLote = new ItemLote();
        
        $itemLote->setCodCalcProd($parametrosPost['codCalProd']);
        $itemLote->setIdLote($parametrosPost['idLote']);
        $itemLote->setTamCalc($parametrosPost['tamCalc']);
        $itemLote->setQuantCalProd($parametrosPost['quantProd']);
        $itemLote->setQuantCalDispon($parametrosPost['quantDispon']);
        $itemLote->setPrecoRevenda($parametrosPost['precoRev']);
        
        $itemLoteDAO = new ItemLoteDAO();
        return $itemLoteDAO->inserirItemLote($itemLote);
        
    }
    
    public function excluirItemLote($codCalProd, $idLote) {
        $itemLoteDAO = new ItemLoteDAO();
        return $itemLoteDAO->excluirItemLote($codCalProd, $idLote);
    }
    
    public function pesquisarItemLote($codCalProd, $idLote) {
        $itemLoteDAO = new ItemLoteDAO();
        $result = $itemLoteDAO->pesquisarItemLote($codCalProd, $idLote);
        return $result;
    }
    
    public function alterarItemLote($parametrosPost) {
        $itemLote = new ItemLote();
        
        $itemLote->setCodCalcProd($parametrosPost['codCalProd']);
        $itemLote->setIdLote($parametrosPost['idLote']);
        $itemLote->setIdLoteAnt($parametrosPost['idLoteAnt']);
        $itemLote->setTamCalc($parametrosPost['tamCalc']);
        $itemLote->setQuantCalProd($parametrosPost['quantProd']);
        $itemLote->setQuantCalDispon($parametrosPost['quantDispon']);
        $itemLote->setPrecoRevenda($parametrosPost['precoRev']);
        
        
        $itemLoteDAO = new ItemLoteDAO();
        return $itemLoteDAO->alterarItemLote($itemLote);
    }
}




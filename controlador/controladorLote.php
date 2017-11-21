<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include_once '../encodingStrings.php';
include_once '../dao/LoteDAO.php';
include_once '../model/Lote.php';


class ControladorLote {
    public function inserirLote($parametrosPost) {
        
        $lote = new Lote();
        
        $lote->setCodProd($parametrosPost['codProduto']);
        $lote->setCodProdAnt($parametrosPost['codProdutoAnt']);
        $lote->setDataProducao($parametrosPost['dataProducao']);
        $lote->setIdLote($parametrosPost['numeroLote']);
        
        $loteDAO = new LoteDAO();
        return $loteDAO->inserirLote($lote);
        
    }
    
    public function excluirLote($idLote) {
        $loteDAO = new LoteDAO();
        return $loteDAO->excluirLote($idLote);
    }
    
    public function pesquisarLote($idLote) {
        $loteDAO = new LoteDAO();
        $result = $loteDAO->pesquisarLote($idLote);
        return $result;
    }
    
    public function alterarLote($parametrosPost) {
        
        $lote = new Lote();
        
        $lote->setCodProd($parametrosPost['codProduto']);
        $lote->setCodProdAnt($parametrosPost['codProdutoAnt']);
        $lote->setDataProducao($parametrosPost['dataProducao']);
        $lote->setIdLote($parametrosPost['numeroLote']);
        
        $loteDAO = new LoteDAO();
        return $loteDAO->alterarLote($lote);
    }
}




<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Lote
 *
 * @author gilcemar
 */
class Lote {
    private $idLote;//chave primária de autoincremento
    private $codProd;//chave estrangeira do código da marca de calçado cadastrada.
    private $dataProducao;//o item contido no lote terá sua data de produção vinculada ao lote.
    private $codProdAnt;//código original no caso de se desejar mudar o código do produto.
    
    function getCodProdAnt() {
        return $this->codProdAnt;
    }

    function setCodProdAnt($codProdAnt) {
        $this->codProdAnt = $codProdAnt;
    }

        function getIdLote() {
        return $this->idLote;
    }

    function getCodProd() {
        return $this->codProd;
    }

    function getDataProducao() {
        return $this->dataProducao;
    }

    function setIdLote($idLote) {
        $this->idLote = $idLote;
    }

    function setCodProd($codProd) {
        $this->codProd = $codProd;
    }

    function setDataProducao($dataProducao) {
        $this->dataProducao = $dataProducao;
    }


}

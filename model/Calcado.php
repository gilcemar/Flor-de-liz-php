<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Calcado
 *
 * @author gilcemar
 */
include_once '../encodingStrings.php';
class Calcado {
    private $nomeCal, $menorTam, $maiorTam, $cor, $nomeColecao, $precoCusto, $idCal;

    
    function getIdCal() {
        return $this->idCal;
    }
    function getNomeCal() {
        return $this->nomeCal;
    }

    function getMenorTam() {
        return $this->menorTam;
    }

    function getMaiorTam() {
        return $this->maiorTam;
    }

    function getCor() {
        return $this->cor;
    }

    function getNomeColecao() {
        return $this->nomeColecao;
    }

    function getPrecoCusto() {
        return $this->precoCusto;
    }
    function setIdCal($idCal){
    	$this->idCal = $idCal;
    }

    function setNomeCal($nomeCal) {
        $this->nomeCal = $nomeCal;
    }

    function setMenorTam($menorTam) {
        $this->menorTam = $menorTam;
    }

    function setMaiorTam($maiorTam) {
        $this->maiorTam = $maiorTam;
    }

    function setCor($cor) {
        $this->cor = $cor;
    }

    function setNomeColecao($nomeColecao) {
        $this->nomeColecao = $nomeColecao;
    }

    function setPrecoCusto($precoCusto) {
        $this->precoCusto = $precoCusto;
    }


    
}

<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include_once '../encodingStrings.php';
include_once '../dao/CalcadoDAO.php';
include_once '../model/Calcado.php';
include_once '../model/Colecao.php';

class ControladorCalcado {
    public function inserirCalcado($parametrosPost) {
        
        $calcado = new Calcado();
        
        $calcado->setNomeColecao($parametrosPost['nomeColecao']);
        $calcado->setNomeCal($parametrosPost['nomeCalc']);
        $calcado->setMenorTam($parametrosPost['menorTam']);
        $calcado->setMaiorTam($parametrosPost['maiorTam']);
        $calcado->setPrecoCusto($parametrosPost['precoCusto']);
        $calcado->setCor($parametrosPost['cor']);
	$calcado->setIdCal($parametrosPost['idCalc']);
        $calcadoDAO = new CalcadoDAO();
        return $calcadoDAO->inserirCalcado($calcado);
        
    }
    
    public function excluirCalcado($nomeCalcado) {
        $calcadoDAO = new CalcadoDAO();
        return $calcadoDAO->excluirCalcado($nomeCalcado);
    }
    
    public function pesquisarCalcado($nomeCalc) {
        $calcadoDAO = new CalcadoDAO();
        $result = $calcadoDAO->pesquisarCalcado($nomeCalc);
        //$calcadoDAO->alterarCalcado($calcado, $id);
        return $result;
    }
    
    public function alterarCalcado($parametrosPost, $id) {
        $calcado = new Calcado();
        
        $calcado->setNomeColecao($parametrosPost['nomeColecao']);
        $calcado->setNomeCal($parametrosPost['nomeCalc']);
        $calcado->setMenorTam($parametrosPost['menorTam']);
        $calcado->setMaiorTam($parametrosPost['maiorTam']);
        $calcado->setPrecoCusto($parametrosPost['precoCusto']);
        $calcado->setCor($parametrosPost['cor']);
        $calcado->setIdCal($parametrosPost['idCalc']);
        $calcadoDAO = new CalcadoDAO();
        return $calcadoDAO->alterarCalcado($calcado);
    }
}




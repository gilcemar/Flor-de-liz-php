<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Formatador
 *
 * @author gilcemar e naliane
 */
include_once 'encodingStrings.php';

class Formatador {

    /**
     * Função para formatar data no formato americano para o formato brasileiro.
     * O parâmetro $data se refere a data no formato americano.
     * @param <String> $data
     * @return <String>
     */
    public static function dateToBr($data) {
        $data = explode("-", $data);
        return $data[2] . "/" . $data[1] . "/" . $data[0];
    }

    /**
     * Função para formatar data no formato brasileiro para o formato americano.
     * O parâmetro $data se refere a data no formato americano.
     * @param <String> $data
     * @return <String>
     */
    public static function dateToEn($data) {
        $data = explode("/", $data);
        return $data[2] . "-" . $data[1] . "-" . $data[0];
    }

    

}

?>
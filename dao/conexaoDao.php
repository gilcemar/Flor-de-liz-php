<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of conexaoDao
 *
 * @author gilcemar
 */
error_reporting(0);
include_once '../encodingStrings.php';

class ConexaoPDO extends PDO {

    private static $instancia = null;

    function __construct($dsn, $user, $senha) {
        parent::__construct($dsn, $user, $senha);
    }

    /**
     * Função que cria uma conexão com o banco de dados
     * @return PDO objeto que representa a conexão com o banco de dados.
     */
    public static function getInstance() {

        $host = "localhost";
        $port = "3306";
        $dbname = "androidS";
        $usuario = "root";



        if (!isset(self::$instancia)) {
            try {
                self::$instancia = new ConexaoPDO("mysql:host=$host;port=$port;dbname=$dbname", $usuario, "", array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
                self::$instancia->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                /**
                 * O trecho abaixo é importante pois faz com que os resultados vão para o banco de dados com
                 * os acentos.
                 */
                self::$instancia->query("SET NAMES 'utf8'");
                self::$instancia->query("SET character_set_connection = utf8");
                self::$instancia->query("SET character_set_client = utf8");
                self::$instancia->query("SET character_set_results = utf8");
            } catch (Exception $ex) {
                echo $ex->getMessage();
            }
        }
        return self::$instancia;
    }

}

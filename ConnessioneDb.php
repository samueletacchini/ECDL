<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ConnessioneDb
 *
 * @author Tacco
 */
class ConnessioneDb extends MySQLi {

    function __construct() {
        parent::__construct('127.0.0.1', 'root', '', 'ecdl');
        if ($this->connect_error) {
            die('Connessione fallita: ' . $this->connect_error);
        }
    }

//metodo che esegue una query SQL e termina in caso di errore
//visualizzando messaggio di errore e testo query
//    function query($query) {
//        $ris = parent::query($query);
//        if ($this->error) 
//        {
//            die("Query fallita: {$this->error} query=$query");
//        }
//        return $ris;
//    }
}
